@extends('admin.master')

@section('links')
    <link rel="stylesheet" href="{{asset('assets/plugins/jquery.fancybox.min.css')}}">
    <style>

    </style>
@endsection

@section('content')


    <div class="container mt-2 mb-2">

        <div class="card shadow firm-border">
            <div class="card-body pt-0">

                <div class="card-header">
                    <h3 class="card-title">Editing:&nbsp;&nbsp;</h3>
                    <b><span>{{$admin->name}}</span></b>
                    <span>&nbsp;&nbsp;&nbsp;email:&nbsp;&nbsp;</span>
                    <b><span>{{$admin->email}}</span></b>
                </div>
                <form method="post" action="{{route('users.update',['user' => $admin->id, "admin" => true])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="text" name="admin" value="1" hidden>
                    <div class="card-body pb-0">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label required">Name</label>
                            <div class="col-sm-10"><input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$admin->name}}"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10"><input type="text" name="phone" maxlength="15" class="form-control @error('phone') is-invalid @enderror" value="{{$admin->phone}}"></div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10"><input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{$admin->address}}"></div>
                        </div>
                        <div class="form-group row m-0">
                            <label class="col-sm-2 col-form-label">Avatar</label>
                            <div class="col-sm-7 mt-3"><input id="avatar" type="file" class="filepond" name="avatar"></div>

                            @if($avatar === 0)
                                <div class="col-sm-2 offset-1"><img class="img-circle" src="{{ asset('img/noimage2.png') }}" width="150" alt="User profile picture"></div>
                            @else
                                <div class="col-sm-2 offset-1"><img class="img-circle" src="{{ route('showAvatar', ['userId'=>$admin->id]) }}" width="100" alt="User profile picture"></div>
                            @endif

                        </div>
                    </div>
                    <div class="ml-3">

                        <x-buttonSpinner class="btn-primary" title="press button" text="&nbsp;Save&nbsp;"></x-buttonSpinner>

                    </div>

                </form>
            </div>
        </div>

        <div class="card shadow firm-border">
            <div class="card-body">
                @if ( session()->has('message') )
                    <div class="alert alert-success alert-dismissible">
                        {{ session()->get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form method="POST" action="{{ route('pass', Auth::user() ) }}" class="mb-3">
                    @csrf
                    @method("PUT")
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label required" for="old_password">Old password</label>
                            <input type="password" name="old_password" class="form-control col-sm-10" id="old_password">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label required" for="password">New password</label>
                            <input type="password" name="password" class="form-control col-sm-10" id="password">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label required" for="password_confirmation" style="font-size: 15px">Confirm password</label>
                            <input type="password" name="password_confirmation" class="form-control col-sm-10" id="password_confirmation">
                        </div>
                        <div class="mt-4">
                            <x-buttonSpinner class="btn-primary" title="press button" text="&nbsp;Change Password&nbsp;"></x-buttonSpinner>
                        </div>
                    </div>
                </form>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>

    </div>



@endsection

@section('scripts')

    <script src="{{asset('js/jquery.fancybox.min.js')}}"></script>

    <script type="text/javascript">

        // ------------------------------FilePond Lib ------------------------------------------------

        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateSize,
        );

        let inputElement = document.getElementById('avatar')
        FilePond.create(inputElement)
        FilePond.setOptions({
            server: {
                process: {
                    url: '{{ route('filepondStoreScan') }}',
                },
                revert: {
                    url: '{{ route('filepondDeleteScan') }}',
                    'method': 'post'
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token()}}'
                }
            },
            imagePreviewMaxHeight: 100,
            instantUpload: true,
            allowImagePreview: 'true',
            processFiles: false,
            mimeType: "multipart/form-data",
            maxFiles: '1',
            labelIdle: "Drag & Drop your Avatar or Browse",

            onprocessfiles: () => {
                console.log('все файлы загружены');
                // $('.message_start').addClass('d-none');
                // $('.message_maindocument').removeClass('d-none');
                // $('.upload-maindocument').removeClass('disabled');
            },
        });


    </script>
@endsection
