<?php

namespace App\Http\Controllers\Cabinet;

use App\Contact;
use App\Firm;
use App\Http\Controllers\Controller;
use App\Tariff;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Spatie\Valuestore\Valuestore;

class CabinetController extends Controller
{

    public function cabinet()
    {
        if (!Auth::check())
            return redirect()->back();

        $user = Auth::user();
        $avatar = $user->getMedia('avatar')->first(); // ->getUrl('thumb');

         if(!$avatar) {
             $avatar = 0;
         }

        if ($user->email_verified_at){
            return view('cabinet.main.index', compact( 'user', 'avatar'));
        }else {
            return view('cabinet.master_none_verification', compact( 'user'));
        }
    }

    public function profile()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
        }else{
            return redirect()->back()->with('status', 'Not authenticated');;
        }

        $user = User::find($userId);

        $avatar = $user->getMedia('avatar')->first(); // ->getUrl('thumb');

        if(!$avatar) {
            $avatar = 0;
        }

        $firms = User::find($userId)->Firms;;

        return view('cabinet.profile.index', compact('user' , 'firms','avatar'));
    }

    public function selectFirm () {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        $firms = User::find($userId)->Firms;
        return view('cabinet.profile.selectFirm', compact( 'firms','user'));
    }

    public function reports()
    {
        if (!Auth::check())
            return redirect()->back();

        $user = Auth::user();
        $firms = $user->Firms;;

        return view('cabinet.main.reports', compact( 'user', 'firms'));

    }

    public function showReport($firmId) {

        $firm = Firm::find($firmId);
        $reports = $firm->getMedia('reports');

        return view('cabinet.main.showreports', compact( 'firm', 'reports'));

    }

    public function sendMail (Request $request)
    {

        $from_user = User::find($request->from_user);

        $sender = $request;

        $sender->subject = 'Notification from user webTaxes ';
        $sender->email = $from_user->email;
        $sender->name = $from_user->name;

        Mail::send('mail.notify', ['sender' => $sender], function($message) use ($sender) {
            $message->from($sender->email, $sender->name);
            $message->to(config('setting.mail_admin'));
            $message->subject($sender->subject);
        });


        return redirect()->back()->with('success', 'Mail sent successfully');
    }



}
