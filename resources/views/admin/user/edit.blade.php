@extends('admin.master')

@section('links')
    <style>
        input[type="checkbox"] {
            width: 80px;
            height: 40px;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: #f08282;
            outline: none;
            border-radius: 50px;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, .2);
            transition: 0.5s;
            position: relative;
        }

        input:checked[type="checkbox"] {
            background: #42a50d;
        }

        input[type="checkbox"]::before {
            content: '';
            position: absolute;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 1px solid darkgray;
            top: 0;
            left: 0;
            background: #fff;
            transform: scale(1.1);
            box-shadow: 0 2px 5px rgba(0, 0, 0, .2);
            transition: 0.5s;
        }

        input:checked[type="checkbox"]::before {
            left: 40px;
        }

    </style>
@endsection



@section('content')

    <section class="container content-header firm-border shadow bg-white">
        <div class="container-fluid">

            <div class="card-header">
                <h3 class="card-title text-bold">Editing "{{$user->name}}" &nbsp;&nbsp;&nbsp; {{$user->email}}</h3>
            </div>

            <form role="form" method="post" action="{{route('user.update',['user' => $user->id])}}">
                @csrf
                @method('PUT')
                <div class="card-body">

                    <div class="form-group">

                        <div class="form-group">
                            <label class="col-sm-1 col-form-label">Name</label>
                            <div class="col-sm-11"><input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}"></div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-1 col-form-label">Phone</label>
                            <div class="col-sm-11"><input type="text" name="phone" maxlength="15" class="form-control @error('price') is-invalid @enderror" value="{{$user->phone}}"></div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-sm-1 col-form-label">Address</label>
                            <div class="col-sm-11"><input type="text" name="address" class="form-control @error('price') is-invalid @enderror" value="{{$user->address}}"></div>
                        </div>

                        <div class="form-group row ">
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-1 ml-3 ">
                                        <input type="checkbox" name="is_admin" value="1" @if($user->is_admin) checked @endif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div class="col-4 text-primary ml-4 ">
                                        <h4>&nbsp;Administrator</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1 ml-3">
                                        <input type="checkbox" name="role" value="1" @if($user->role) checked @endif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div class="col-4 text-primary  ml-4 ">
                                        <h4>&nbsp;Manager</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1 ml-3 ">
                                        <input type="checkbox" name="chat" value="1" @if($user->chat) checked @endif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div class="col-4 text-primary  ml-4 ">
                                        <h4>&nbsp;Chat</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                @if($avatar === 0)
                                    <div class="col-sm-2 offset-1"><img class="img-circle" src="{{ asset('img/noimage2.png') }}" width="150" alt="User profile picture"></div>
                                @else
                                    <div class="col-sm-2 offset-1"><img class="img-circle" src="{{ route('showAvatar', ['userId'=>$user->id]) }}" width="100" alt="User profile picture"></div>
                                @endif
                            </div>


                        </div>


                    </div>

                </div>
                <div class="card-footer row">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    <div class="col-md-2 ml-auto">
                        <a href="{{route('user.index')}}" class="btn btn-info btn-block">Return to user list</a>
                    </div>
                </div>
            </form>

        </div>
    </section>

@endsection


