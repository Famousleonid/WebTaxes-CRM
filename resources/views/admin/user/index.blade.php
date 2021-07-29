@extends('admin.master')

@section('content')



    <div class="container-fluid pl-3 pr-3 pt-2">

        <div class="card shadow firm-border bg-white mt-2">

            <div class="card-header">
                <h3 class="card-title text-bold">list of users ( {{count($users)}} items )</h3>
                <span class="text-danger">&nbsp;&nbsp;&nbsp; RED name </span><span>this is an unconfirmed email</span>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>

            <div class="card-body">
                <div class="box-body table-responsive">

                    @if(count($users))

                        <table id="user-list" class="table-sm table-bordered table-striped table-hover " style="width:100%;">

                            <thead>
                            <tr>
                                <th class="text-center" data-orderable="false">№</th>
                                <th data-orderable="false">Send mail</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th style="width: 100px">Phone</th>
                                <th class="text-center">Online</th>
                                <th class="text-center">Admin</th>
                                <th class="text-center">Manager</th>
                                <th class="text-center">Chat</th>
                                <th class="text-center" data-orderable="false">Edit</th>
                                <th style="width: 100px" class="text-center">Create Date</th>
                                <th class="text-center" data-orderable="false">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td class="text-center">
                                        <a href="{{route('AdminMailShow', ['user_id' => $user->id] )}}" class="btn" ><img src="{{asset('img/notesend.png')}}" width="35" alt=""></a>
                                    </td>
                                    @if(!$user->email_verified_at)
                                        <td class="text-danger">{{$user->name}}</td>
                                    @else
                                        <td>{{$user->name}}</td>
                                    @endif
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td class="text-center">
                                        @if ( $user->isOnline())<img src="{{asset('img/online.jpg')}}" width="30px" alt="">@endif
                                    </td>

                                    <td class="text-center">
                                        @if($user->is_admin)<i class="fas fa-lg fa-crown text-primary"></i>@endif
                                    </td>
                                    <td class="text-center">
                                        @if($user->role)<i class="fas fa-lg fa-user text-purple"></i>@endif
                                    </td>
                                    <td class="text-center">
                                        @if($user->chat)<i class="fas fa-lg fa-keyboard text-success"></i>@endif
                                    </td>

                                    <td class="text-center">
                                        <a href="{{route('user.edit', ['user' => $user->id]) }}"><img src="{{asset('img/set.png')}}" width="30" alt=""></a>
                                    </td>
                                    <td class="text-center"><span style="display: none">{{$user->created_at->format('Ymd')}}</span>{{$user->created_at->format('d.m.Y')}}</td>
                                    <td class="text-center">
                                        <div>
                                            <form action="{{route('user.destroy', ['user' => $user->id])}}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete User" data-message="Are you sure you want to delete this user ?">
                                                    <i class="glyphicon glyphicon-trash"></i> Delete
                                                </button>

                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    @else
                        <p>No user created</p>
                    @endif
                </div>
            </div>
        </div>
    </div>


    @include('components.delete');

@endsection

@section('scripts')
    <script>
        let userTable = $('#user-list').DataTable({
            "AutoWidth": true,
            "scrollY": "600px",
            "scrollCollapse": true,
            "paging": false,
            "ordering": true,
            "info": false,
        });

        document.addEventListener('DOMContentLoaded', function () {

            // delete form confirm

            $('#confirmDelete').on('show.bs.modal', function (e) {
                $message = $(e.relatedTarget).attr('data-message');
                $(this).find('.modal-body p').text($message);
                $title = $(e.relatedTarget).attr('data-title');
                $(this).find('.modal-title').text($title);

                // Pass form reference to modal for submission on yes/ok
                var form = $(e.relatedTarget).closest('form');
                $(this).find('.modal-footer #confirm').data('form', form);
            });
            $('#confirmDelete').find('.modal-footer #confirm').on('click', function () {
                $(this).data('form').submit();
            });
        });

        $('#noteModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })

        $('#spinner-btn').click(function () {
            $('.spinner-loading').removeClass('d-none');
        });


    </script>
@endsection
