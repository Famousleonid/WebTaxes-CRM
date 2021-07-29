<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminChat extends Component
{
    public $message = '';
    public $messages;
    public $users;
    public $clicked_user;
    public $admin_chat;
    public $sender;
    public $not_seen;

    public function render()
    {
        $adm_chat = User::where('chat',true)->first();
        if($adm_chat){
            $this->admin_chat  = $adm_chat;
        }else{
            $this->admin_chat  = User::where('is_admin',true)->first();
        }

        $this->users = User::all();

        return view('livewire.admin-chat', [
            'users' => $this->users,
            'messages' => $this->messages,
        ]);
    }

    public function mountData()
    {
        if (isset($this->sender->id)) {
            $this->messages = \App\Message::where('user_id', $this->sender->id)
                ->orWhere('receiver', $this->sender->id)
                ->orderBy('id', 'DESC')
                ->get();
        }
        if (isset($this->sender->id)) {
            $not_seen = \App\Message::where('user_id', $this->sender->id)->where('receiver', $this->admin_chat->id);
            $not_seen->update(['is_seen' => true]);
        }

    }

    public function SendMessage()
    {
        $new_message = new \App\Message();
        $new_message->message = $this->message;
        $new_message->user_id = $this->admin_chat->id;
        $new_message->receiver = $this->sender->id;
        $new_message->save();
        $this->reset(['message']);
    }

    public function getUser($user_id)
    {
        $this->sender = User::find($user_id);
        $this->clicked_user = User::find($user_id);

        $this->messages = \App\Message::where('user_id', $user_id)
            ->orWhere('receiver', $user_id)
            ->orderBy('id', 'DESC')
            ->get();

    }


}
