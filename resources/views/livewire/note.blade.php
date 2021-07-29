<div class="d-inline" wire:poll.5s="render">
    @if($count !== 0)
        @if(!$navbar)
            <span class="badge badge-danger view-badge">{{$count}}</span>
        @else
            <span class="badge badge-danger navbar-badge">{{$count}}</span>
        @endif
    @endif
</div>
