<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tariff;
use App\Post;
use App\Contact;
use Mail;

class FrontController extends Controller
{

    public function index()
    {
        $posts = Post::where('visible', 1)->get();

        return view('front.pages.index', compact('posts'));
    }

    public function main_price()
    {

        $light = Tariff::where('visible', 1)->where('name', 'Light')->first();
        $base = Tariff::where('visible', 1)->where('name', 'Base')->first();
        $advanced = Tariff::where('visible', 1)->where('name', 'Advanced')->first();
        $constructor = Tariff::where('visible', 1)->where('name', 'Constructor')->first();
        $flag = '';

        return view('front.pages.main_price', compact('light', 'base', 'advanced', 'constructor','flag'));
    }

    public function price()
    {
        $light = Tariff::where('visible', 1)->where('name', 'Light')->first();
        $base = Tariff::where('visible', 1)->where('name', 'Base')->first();
        $advanced = Tariff::where('visible', 1)->where('name', 'Advanced')->first();
        $constructor = Tariff::where('visible', 1)->where('name', 'Constructor')->first();
        $flag = 'edit';

        return view('front.pages.main_price', compact('light', 'base', 'advanced', 'constructor','flag'));

    }

    public function request(Request $request)
    {
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['message'] = $request->message;
        $data['ip'] = request()->ip();
        $data['agent'] = $request->header('User-Agent');

        Contact::create($data);

        // Email notification

        $sender = $request;
        $sender->subject = 'Contact webTaxes ';

        Mail::send('mail.contact', ['sender' => $sender], function ($message) use ($sender) {
            $message->from($sender->email, $sender->name);
            $message->to(config('setting.mail_admin'));
            $message->subject($sender->subject);
        });

        if (Mail::failures()) {
            return response()->json('Error: ');
        }
        return response()->json('Success: ');

    }

}
