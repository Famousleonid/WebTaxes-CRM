@extends('admin.master')

@section('links')
    <style>
        .avatar {
            height: 40px;
            width: 40px;
        }

        .list-group-item:hover, .list-group-item:focus {
            background: rgba(24, 32, 23, 0.37);
            cursor: pointer;
        }

        .chatbox {
            height: 80vh !important;
            overflow-y: scroll;
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
            padding: 10px;
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

        .link:hover {
            list-style: none !important;
            text-decoration: none;
        }

        .online-icon {
            font-size: 11px !important;
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

<div class="container">
    @if(Auth()->user()->chat)
        @livewire('admin-chat', ['users' => $users, 'messages' => $messages ?? null ])
    @else
        @livewire('chat', ['messages' => $messages ?? null])
    @endif
</div>

@endsection
