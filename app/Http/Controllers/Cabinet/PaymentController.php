<?php

namespace App\Http\Controllers\Cabinet;

use App\Firm;
use App\Http\Controllers\Controller;
use App\Payment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        $firms = User::find($userId)->Firms;

        return view('cabinet.profile.payment-firm', compact('user', 'firms'));
    }

    public function check($firm)
    {

        $firm = Firm::find($firm);

        Log::channel('taxlog')->info($firm->company_name . ' пришел на оплату');

        return view('cabinet.profile.payment', compact('firm'));

    }

    public function charge(Request $request)
    {
        $firm = Firm::find($request->firm_id);

        $amount = $request->amount;
        $amount = (int)$amount;
        $name = $firm->company_name;
        $bn = $firm->business_number;
        $email = Auth::user()->email;
        $phone = $firm->contact_phone;

        $receipt_email = $request->receipt_email;
        if ($receipt_email == "")
            $receipt_email = $firm->contact_email;

        $description = $request->description;
        if ($description == "")
            $description = '..the client did not fill in this field..';

        try {

            Stripe::setApiKey(config('setting.stripe_secret'));

            $customer = Customer::create(array(
                'email' => $email,
                'name' => $name,
                'phone' => $phone,
                'description' => 'Business number: ' . $bn,
                'source' => $request->stripeToken,
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => $amount,
                'currency' => config('setting.stripe_currency'),
                'description' => $description,
                'receipt_email' => $receipt_email,

            ));

            if( $charge->status == 'succeeded') {

                Payment::create([
                    'firm_id' => $firm->id,
                    'stripe_id' => $charge['id'],
                    'payer_email' => $receipt_email,
                    'amount' => $charge['amount'],
                    'currency' => $charge['currency'],
                    'description' => $description
                ]);

                $old_sum = $firm->sum;
                $current_sum = $old_sum + $charge['amount'];
                $firm->update(['sum' => $current_sum]);

            }

            return back()->with('success', 'Charge successful. '. '  ' . $charge->status);

        } catch
        (\Exception $ex) {
            return back()->with('error', $ex->getMessage() );
        }

    }

    public function bill($firm_id)
    {
        $user = Auth::user();
        $pays= Payment::where('firm_id', $firm_id)->get();
        $firm = Firm::find($firm_id);

        return view('cabinet.profile.payment-bill',compact('firm','user', 'pays'));
    }

    public function score()
    {

       Log::channel('taxlog')->info('Выставляем счета');

        $firms = Firm::all();

        foreach ($firms as $firm) {


           $f_name_tariff = $firm->tariff->name;
           $f_tariff_cost = json_decode($firm->tariff_json)->price_tax;
           $month = Carbon::now()->format('F.Y');
           $description = "The monthly payment for {$month} was written off at the rate {$f_name_tariff} in the amount of {$f_tariff_cost} CAD.";

//           dump($firm->id);

            Payment::create([
                'firm_id' => (int)$firm->id,
                'amount' => (float)($f_tariff_cost) * (-100),
                'currency' => 'CAD',
                'description' => $description
            ]);

            $old_sum = $firm->sum;
            $current_sum = $old_sum + (float)($f_tariff_cost) * (-100);
            $firm->update(['sum' => $current_sum]);

        }

        return view('cabinet.profile.payment-score',compact('firms'));
    }

    public function mix()
    {

        Log::channel('taxlog')->info('сверяем счета');

        $firms = Firm::all();
        $pay = Payment::all();

        foreach ($firms as $firm) {

            $current_sum = 0;
            $pay = Payment::where('firm_id', $firm->id)->get();

               foreach ($pay as $n) {
                    $current_sum += $n->amount;
               }

            $firm->update(['sum' => $current_sum]);
        }

        $userId = Auth::user()->id;
        $user = User::find($userId);


        return view('cabinet.profile.payment-firm',compact('firms', 'user'));
    }

}
