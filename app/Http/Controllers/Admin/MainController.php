<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Firm;
use App\Http\Controllers\Controller;
use App\User;
//use App\Notifications\NoticeDB;
use App\Visit;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class MainController extends Controller
{

    public function index()
    {

        $users = User::all();
        $i = 0;
        foreach ($users as $user) {
            if ($user->isOnline()) {
                $i++;
            }
        }

        $visit = Visit::whereDate('created_at', Carbon::today())->count();

        $params = [
            'firmCount' => Firm::count(),
            'userCount' => User::count(),
            'useronline' => $i,
            'visit' => $visit,
        ];

        return view('admin.index.index')->with($params);
    }

    public function  adminProfile()
    {
        $admin = Auth::user();
        $avatar = $admin->getMedia('avatar')->first(); // ->getUrl('thumb');

        if(!$avatar) $avatar = 0;

        return view('admin.index.profile',compact('admin','avatar'));
    }


    public function stat()
    {
        $period = config('setting.visit_day_view', 180);
        $period =  ($period < 60) ? 60 : $period;


        for ($i = 0; $i < $period; $i++) {
            $day[$i] = Carbon::now()->subDays($i)->format('d.m.y');
        };
        $day = array_reverse($day);

        $visits = Visit::whereDate('created_at', '>', Carbon::now()->subDays($period))->orderBy('created_at', 'DESC')->get();

        for ($i = $period-1; $i >= 0; $i--) {
            $pageMain[] = Visit::whereDate('created_at', '=', Carbon::now()->subDays($i))->where('page', 'main')->count();
            $pagePrice [] = Visit::whereDate('created_at', '=', Carbon::now()->subDays($i))->where('page', 'price')->count();
            $pageHow_it_work [] = Visit::whereDate('created_at', '=', Carbon::now()->subDays($i))->where('page', 'how-it-work')->count();
            $pageFaq [] = Visit::whereDate('created_at', '=', Carbon::now()->subDays($i))->where('page', 'faq')->count();
            $pageCabinet [] = Visit::whereDate('created_at', '=', Carbon::now()->subDays($i))->where('page', 'cabinet')->count();
            $pageProfile [] = Visit::whereDate('created_at', '=', Carbon::now()->subDays($i))->where('page', 'profile')->count();
            $pagePayment [] = Visit::whereDate('created_at', '=', Carbon::now()->subDays($i))->where('page', 'payment')->count();
            $pageReport [] = Visit::whereDate('created_at', '=', Carbon::now()->subDays($i))->where('page', 'report')->count();
        }

        return view('admin.index.stat', compact('visits'))
            ->with('day', $day)
            ->with('period', $period)
            ->with('main', json_encode($pageMain, JSON_NUMERIC_CHECK))
            ->with('price', json_encode($pagePrice, JSON_NUMERIC_CHECK))
            ->with('how_it_work', json_encode($pageHow_it_work, JSON_NUMERIC_CHECK))
            ->with('faq', json_encode($pageFaq, JSON_NUMERIC_CHECK))
            ->with('cabinet', json_encode($pageCabinet, JSON_NUMERIC_CHECK))
            ->with('profile', json_encode($pageProfile, JSON_NUMERIC_CHECK))
            ->with('payment', json_encode($pagePayment, JSON_NUMERIC_CHECK))
            ->with('report', json_encode($pageReport, JSON_NUMERIC_CHECK));

    }

    public function showContact()
    {
        $contacts = Contact::all();
        return view('admin.index.contact', compact('contacts'));
    }

    public function deleteContact($id)
    {
        Contact::find($id)->delete();

        return redirect()->back()->with('success', 'Сontact deleted');
    }


    public function adminMailShow ($user)
    {
        $user = User::findorfail($user);

        return view('admin.user.mail', compact('user'));
    }


    public function adminMailSend (Request $request,$user_id)
    {

        $sender = User::findorfail($user_id);

        $request->validate([
            'message' => 'required',
        ]);

        $sender->message = $request->message;

        Mail::send('mail.admin', ['sender' => $sender], function($message) use ($sender) {
            $message->from(config('setting.mail_admin'));
            $message->to($sender->email, $sender->name);
            $message->subject('Mail from Admin webTaxes ');
        });

        return redirect()->route('user.index')->with('success', 'Mail sent successfully');
    }

    public function changePassword(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        if ( ! Hash::check( $request->old_password, $user->password ) )
        {
            return back()
                ->with('error', 'Old password is not correct');
        }

        $user->update([
            'password' => Hash::make( $request->password )
        ]);

        return redirect()
            ->route('admin.profile')
            ->with('message', 'Change successfully');

    }


}
