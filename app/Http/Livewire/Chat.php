<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class Chat extends Component
{
    public $message = '';
    public $user;
    public $messages;
    public $admin_chat;
    public $not_seen;

    public function render()
    {
        $adm_chat = User::where('chat',true)->first();
        if($adm_chat){
            $this->admin_chat  = $adm_chat;
        }else{
            $this->admin_chat  = User::where('is_admin',true)->first();
        }

        return view('livewire.chat', [
            'messages' => $this->messages,
            'admin_chat' => $this->admin_chat,
        ]);
    }

    public function mountData()
    {
        $this->user = Auth()->user();

        $this->messages = \App\Message::where('user_id', $this->user->id)
            ->orWhere('receiver', $this->user->id)
            ->orderBy('id', 'DESC')
            ->get();

        $not_seen = \App\Message::where('receiver', auth()->id());
        $not_seen->update(['is_seen' => true]);

    }

    public function SendMessage()
    {
        $new_message = new \App\Message();
        $new_message->message = $this->message;
        $new_message->user_id = auth()->id();
        $new_message->receiver = $this->admin_chat->id;
        $new_message->save();
        $this->reset(['message']);
    }

}
