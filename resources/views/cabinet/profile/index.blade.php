@extends('cabinet.master')

@section('link')
    <style>
        th {
            font-size: 0.8rem;
        }
    </style>

    <link rel="stylesheet" href="{{asset('assets/plugins/jquery.fancybox.min.css')}}">

@endsection

@section('content')


    <div class="container">
        <div class="card shadow firm-border">
            <div class="">

                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#firms" data-toggle="tab">Firms</a></li>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Personal info</a></li>
                    <li class="nav-item"><a class="nav-link" href="#reset" data-toggle="tab">Reset password</a></li>
                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Helper</a></li>
                </ul>

                <div class="card-body">
                    <div class="tab-content">

                        <div class="active tab-pane" id="firms">
                            <h5>Number of organizations: {{count($firms)}}</h5>
                            <div class="box-body table-responsive">

                                @if(count($firms))

                                    <table class="table table-bordered table-hover text-nowrap table-striped">

                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            @if($firms->first()->tariff !== NULL)
                                                <th>Tariff</th> @endif
                                            <th class="text-center">State account</th>
                                            <th class="text-center">Edit info</th>
                                            <th class="text-center">Add/edit <br> constituent <br> document</th>
                                            <th class="text-center">Verified Admin</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($firms as $firm)
                                            <tr class="">
                                                <td>{{$firm->company_name}}</td>
                                                @if($firm->tariff !== NULL)
                                                    <td>{{$firm->tariff->name}} ${{ json_decode($firm->tariff_json)->price_tax }}</td>
                                                @endif
                                                @if($firm->sum < 0)
                                                    <td class="text-center text-bold text-danger">{{number_format($firm->sum/100, 2)}}</td>
                                                @else
                                                    <td class="text-center text-bold" style="color: #376A2A">{{number_format($firm->sum/100, 2)}}</td>
                                                @endif

                                                <td>
                                                    <div id="edit_info_btn" class="text-center"><a href="{{route('firms.edit', ['firm' => $firm->id]) }}"><img src="{{asset('img/set.png')}}" width="30px" alt=""></a></div>
                                                </td>
                                                <td>
                                                    <div class="text-center"><a href="{{route('edit_constituent.documents', ['firmId' => $firm->id]) }}"><img src="{{asset('img/case.webp')}}" width="35px" alt=""></a></div>
                                                </td>
                                                @if($firm->verified)
                                                    <td class="text-center"><img src="{{asset('img/ok.png')}}" width="30px" alt=""></td>
                                                @else
                                                    <td class="text-center"><img src="{{asset('img/icon_no.png')}}" width="15px" alt=""></td>
                                                @endif

                                            </tr>
                                        @endforeach

                                        </tbody>

                                    </table>
                                @else
                                    <p>Organizations not created</p>
                                @endif

                            </div>
                        </div>

                        <div class="tab-pane" id="settings">
                            <div class="card-header">
                                <h3 class="card-title">Editing:&nbsp;&nbsp;</h3>
                                <b><span>{{$user->name}}</span></b>
                                <span>&nbsp;&nbsp;&nbsp;email:&nbsp;&nbsp;</span>
                                <b><span>{{$user->email}}</span></b>
                            </div>

                            <form role="form" method="post" action="{{route('users.update',['user' => $user->id])}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10"><input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10"><input type="text" name="phone" maxlength="15" class="form-control @error('phone') is-invalid @enderror" value="{{$user->phone}}"></div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10"><input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{$user->address}}"></div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-sm-2 col-form-label">Avatar</label>
                                        <div class="col-sm-7 mt-3"><input id="avatar" type="file" class="filepond" name="avatar"></div>

                                        @if($avatar === 0)
                                            <div class="col-sm-2 offset-1"><img class="img-circle"  src="{{ asset('img/noimage2.png') }}"  width="150" alt="User profile picture"></div>
                                        @else
                                            <div class="col-sm-2 offset-1"><img class="img-circle"  src="{{ route('showAvatar', ['userId'=>$user->id]) }}"  width="100" alt="User profile picture"></div>
                                        @endif

                                    </div>
                                </div>
                                <div class="card-footer">

                                    <x-buttonSpinner class="btn-primary" title="press button" text="Save"></x-buttonSpinner>

                                </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="reset">

                            <div class="container">
                                <div class="row justify-content-center mt-4 mb-4">
                                    <div class="col-md-8">
                                        <div class="card shadow firm-border">
                                            <div class="card-header">{{ __('Reset Password') }}</div>

                                            <div class="card-body">
                                                @if (session('status'))
                                                    <div class="alert alert-success" role="alert">
                                                        {{ session('status') }}
                                                    </div>
                                                @endif

                                                <form method="POST" action="{{ route('password.email') }}">
                                                    @csrf

                                                    <div class="form-group row">
                                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                            @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-0">
                                                        <div class="col-md-6 offset-md-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                {{ __('Send Password Reset Link') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="tab-pane" id="timeline">
                            <div class="timeline-body row">
                                <h5 style='text-indent: 30px;'>If you want to remove or change the tariff of the company -
                                    contact the site administrator. (see "Send mail Admin") </h5> <span>tab "Main page"</span>
                                <h5 style='text-indent: 30px;'>For questions about closing your account, you also need to contact the site administrator.
                                    (see "Send mail Admin") </h5> <span>tab "Main page"</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        @endsection

        @section('scripts')

            <script src="{{asset('js/jquery.fancybox.min.js')}}"></script>

            <script type="text/javascript">

                $('#edit_info_btn a').click(function () {
                    window.sessionStorage.clear()
                });

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
