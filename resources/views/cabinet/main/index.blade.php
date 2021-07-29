@extends('cabinet.master')

@section('content')

    <div class="container ">
        <div class="row">
            <div class="col-4">
                <div class="">
                    <div class="card card-primary card-outline shadow ">
                        <div class="card-body box-profile ">
                            <div class="text-center ">
                                @if($avatar === 0)
                                    <img class="img-circle" src="{{ asset('img/noimage2.png') }}" width="150" alt="User profile picture">
                                @else
                                    <img class="img-circle" src="{{ route('showAvatar', ['userId'=>$user->id]) }}" width="150" alt="User profile picture">
                                @endif

                            </div>
                            <h3 class="profile-username text-center">{{$user->name}}</h3>
                            {{--                    <p class="text-muted text-center">Software Engineer</p>--}}
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Phone</b> <br> <a class="float-right">{{$user->phone}}</a>
                                </li>

                                <li class="list-group-item">
                                    <b>Email</b> <br><a class="float-right">{{$user->email}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Address</b> <br> <a class="float-right">{{$user->address}}</a>
                                </li>

                            </ul>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                                Send mail admin
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 row">
                <div class="col-12 mt-3 pl-5">
                    <h5 class="text-center">Detailed training</h5>
                    <div class="container mt-1">
                        <video width="593" height="332" src="{{asset('img/webtaxes.mp4')}}" title="" controls="controls"></video>
                    </div>
                </div>
                <div class="col-12 mt-3 pl-5">
                    <h5 class="text-center">Information for relax</h5>
                    <div class="container mt-3 ">
                        <iframe class="shadow" width="593" height="332" src="https://www.youtube.com/embed/f79-58hLLXs" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>

        {{------------------------------- Modal ---------------------------------}}

        <div class="modal fade shadow " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <form action="{{route('sendMail')}}" method="POST">
                <div class="modal-dialog">
                    <div class="modal-content firm-border ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Send mail Admin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        @csrf
                        <div class="modal-body">
                            <input type="number" class="form-control" name="from_user" value="{{Auth::user()->id}}" hidden>
{{--                            <input type="number" class="form-control" name="to_user" value="2" hidden> --}}{{--    value - id="admin"     --}}
                            <textarea name="message" class="form-control fill-input @error('message') is-invalid @enderror" placeholder="text message" required cols="5" rows="3"></textarea>
                        </div>

                        <div class="modal-footer">

                            <x-buttonSpinner class="fill btn-primary d-none" title="press button" text="Send message"></x-buttonSpinner>

                            <button type="button" class="btn btn-info float-right " data-dismiss="modal">Cancel</button>

                        </div>

                    </div>
                </div>
            </form>
        </div> <!-- Modal -->


        <script>

            // input = document.querySelector('.fill-input')
            // key_btn = document.querySelector('.fill')
            // input.oninput = function () {
            //     if (input.value) {
            //         key_btn.classList.remove('d-none')
            //     } else {
            //         key_btn.classList.add('d-none')
            //     }
            // }

            input=document.querySelector(".fill-input");
            key_btn=document.querySelector(".fill");
            input.oninput=function(){
                input.value?key_btn.classList.remove("d-none"):key_btn.classList.add("d-none")};


        </script>


@endsection
