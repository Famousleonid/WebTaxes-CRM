<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Note extends Component
{
    public $count;
    public $navbar;

    public function render()
    {
        $this->count = \App\Message::where('receiver', auth()->id())->where('is_seen',false)->count() ;

        $count = $this->count;
        $navbar = $this->navbar;

        return view('livewire.note' , compact('count', 'navbar'));
    }
}
