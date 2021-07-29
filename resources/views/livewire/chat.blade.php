<div class="row justify-content-center pt-3">
    <div class="col-md-11">
        <div class="card shadow firm-border bg-white" wire:poll="mountData">

            <div class="card-header text-bold">
                @if($admin_chat->isOnline())
                    <i class="fa fa-circle text-success"></i> <span>&nbsp;&nbsp;Administrator online</span>
                @else
                    <i class="fa fa-circle text-danger"></i> <span>&nbsp;&nbsp;Administrator </span>
                @endif
            </div>

            <div class="card-body message-box">
                @if(filled($messages))
                    @foreach($messages as $message)
                        <div class="single-message @if($message->user_id !== auth()->id()) received @else sent @endif">
                       {{-- <p class="font-weight-bolder my-0">{{ $message->user->name }}</p>--}}
                            <p class="my-0 t-font">{{ $message->message }}</p>
                            @if($message->created_at->diffInSeconds( Carbon\Carbon::now()) < 3600)
                                <div class="text-right border-success s-font"><small class="text-muted w-100">{{ $message->created_at->diff( Carbon\Carbon::now())->format(' %i min ')  }}</small></div>
                            @elseif($message->created_at->diffInSeconds( Carbon\Carbon::now()) >= 3600 and $message->created_at->diffInSeconds( Carbon\Carbon::now()) < 604800)
                                <div class="text-right border-success s-font"><small class="text-muted w-100">{{ $message->created_at->format('D H:i')  }}</small></div>
                            @elseif($message->created_at->diffInSeconds( Carbon\Carbon::now()) >= 604800)
                                <div class="text-right border-success s-font"><small class="text-muted w-100">{{ $message->created_at->format('D j F H:i')}}</small></div>
                            @endif
                        </div>
                    @endforeach
                @else
                    No messages to show
                @endif
            </div>

            <div class="card-footer">
                <form wire:submit.prevent="SendMessage">
                    <div class="row">
                        <div class="col-md-7">
                            <input wire:model="message" class="form-control input shadow-none w-100 d-inline-block" placeholder="Type a message" required>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary d-inline-block w-100"><i class="far fa-paper-plane"></i> Send</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
