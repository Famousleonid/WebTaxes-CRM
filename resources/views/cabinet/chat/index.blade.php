@extends('cabinet.master')

@section('link')
<style>
    .avatar {
        height: 40px;
        width: 40px;
    }
    .message-box {
        height: 70vh !important;
        overflow-y: scroll;
        display: flex;
        flex-direction: column-reverse;
    }
    .single-message {
        background: #f1f0f0;
        border-radius: 12px;
        padding: 12px;
        margin-bottom: 10px;
        width: fit-content;
    }
    .received {
        margin-right: auto !important;
    }
    .sent {
        margin-left: auto !important;
        background: #3490dc;
        color: white !important;
    }
    .sent small {
        color: white !important;
    }
    .t-font{
        font-size: 1.2rem;
    }
    .s-font {
        font-size: 0.9rem;
    }
</style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container">
            @livewire('chat', ['user' => $user, 'admin_chat' => $admin_chat, 'messages' => $messages])
        </div>

@endsection
