@extends('admin.master')

@section('links')

@endsection

@section('content')

    <section class="container content-header firm-border shadow bg-white">
        <div class="container-fluid">

            <div class="card-header">
                <h3 class="card-title text-bold text-primary">Mail to: "{{$user->name}}" &nbsp;&nbsp;&nbsp; {{$user->email}}</h3>
            </div>

            <form method="post" action="{{route('AdminMailSend',['user_id' => $user->id])}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <input type="number" class="form-control" name="from_user" value="{{Auth::user()->id}}" hidden>
                        <textarea name="message" class="form-control " required cols="5" rows="3"></textarea>
                    </div>
                </div>
                <div class="card-footer row">
                    <div class="col-md-2">
                        <x-buttonSpinner class="fill btn-primary " title="press button" text="Send mail"></x-buttonSpinner>
                    </div>
                    <div class="col-md-2 ml-auto">
                        <a href="{{ URL::previous() }}" class="btn btn-info btn-block">Return</a>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection


