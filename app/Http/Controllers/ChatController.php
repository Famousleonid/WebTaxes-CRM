<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    public function adminIndex() {

        $users = User::where('chat', false)->orderBy('id', 'DESC')->get();

//        if ($users) {
//            $messages = Message::where('user_id', auth()->id())->orWhere('receiver', auth()->id())->orderBy('id', 'DESC')->get();
//        }

        return view('admin.chat.index', [
            'users' => $users,
            'messages' => $messages ?? null
        ]);
    }

    public function index() {

        $user = Auth()->user();
        $admin_chat = User::where('is_admin',true)->where('chat',true)->first();
        $messages = Message::where('user_id', auth()->id())->orWhere('receiver', auth()->id())->orderBy('id', 'DESC')->get();

        return view('cabinet.chat.index', [
            'user' => $user,
            'admin_chat' => $admin_chat,
            'messages' => $messages ?? null
        ]);
    }
}
