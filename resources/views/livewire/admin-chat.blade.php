<div>
    <div class="row justify-content-center pt-3">

        <div class="col-md-4 firm-border">
            <div class="card shadow">
                <div class="card-header">Users</div>
                @if($users->count() > 0)
                    <div class="card-body chatbox p-0">
                        <ul class="list-group list-group-flush" wire:poll.5s="render">
                            @foreach($users as $user)
                                @if($user->id == Auth()->user()->id)
                                    @continue
                                @endif
                                @php
                                    $not_seen = \App\Message::where('user_id', $user->id)->where('receiver', auth()->id())->where('is_seen', false)->get() ?? null
                                @endphp
                                <a wire:click="getUser({{ $user->id }})" class="text-dark link">
                                    <li class="list-group-item" id="user_{{ $user->id }}">
                                        @php
                                            $avatar = $user->getMedia('avatar')->first(); // ->getUrl('thumb');
                                            if(!$avatar) $avatar = 0  @endphp
                                        @if($avatar === 0)
                                            <img class="img-fluid avatar" src="{{asset('/img/persone.png')}}" alt="">
                                        @else
                                            <img class="img-circle" src="{{ route('showAvatar', ['userId'=>$user->id]) }}" width="40" alt="User avatar">
                                        @endif
                                        @if($user->isOnline()) <i class="fa fa-circle text-success online-icon"></i> @endif {{ $user->name }}
                                        @if(filled($not_seen)) <div class="badge badge-danger rounded">{{ $not_seen->count() }}</div>@endif
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                @else
                    Users not found
                @endif
            </div>
        </div>


        {{----------------------------------------------------------- Вторая часть экрана с чатом  ------------------------------------------}}

        <div class="col-md-8 firm-border " wire:poll.3s="mountData">
            <div class="card shadow">
                <div class="card-header text-bold">
                    @if($sender)
                        {{ $sender->name}}
                    @else
                        Select a user to see the chat
                    @endif
                </div>

                <div class="card-body message-box">
                    @if(filled($messages))
                        @foreach($messages as $message)
                            <div class="single-message @if($message->user_id !== auth()->id()) received @else sent @endif">
                                {{--                                <p class="font-weight-bolder my-0">{{ $message->user->name }}</p>--}}
                                <p class="my-0">{{ $message->message }}</p>
                                @if($message->created_at->diffInSeconds( Carbon\Carbon::now()) < 3600)
                                    <div class="text-right border-success s-font"><small class="text-muted w-100">{{ $message->created_at->diff( Carbon\Carbon::now())->format(' %i min ')  }}</small></div>
                                @elseif($message->created_at->diffInSeconds( Carbon\Carbon::now()) >= 3600 and $message->created_at->diffInSeconds( Carbon\Carbon::now()) < 604800)
                                    <div class="text-right border-success s-font"><small class="text-muted w-100">{{ $message->created_at->format('D H:i')  }}</small></div>
                                @elseif($message->created_at->diffInSeconds( Carbon\Carbon::now()) >= 604800)
                                    <div class="text-right border-success s-font"><small class="text-muted w-100">{{ $message->created_at->format('j F H:i')}}</small></div>
                                @endif
                            </div>
                        @endforeach
                    @else
                        No messages to show
                    @endif
                </div>

                @if($sender)
                    <div class="card-footer">
                        <form wire:submit.prevent="SendMessage">
                            <div class="row">
                                <div class="col-md-7">
                                    <input wire:model="message" class="form-control input shadow-none w-100 d-inline-block" placeholder="Type a message" required>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-primary d-inline-block w-100"><i class="far fa-paper-plane"></i>&nbsp;&nbsp; Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif

            </div>
        </div>

    </div>
</div>
