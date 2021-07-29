@extends('cabinet.master')

@section('content')

    <div class="container bg-white shadow firm-border">
        <div class="card-body">
            <div class="">
                <h5>Notification at Admin</h5>

                <table id="show-notification" class="table table-bordered table-hover table-striped  bg-light">
                    <thead>
                    <tr>
                        <th></th>
                        <th>notification ( {{$notifications->count()}} ) pieces</th>
                        <th>ago</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($notifications as $notification)
                        <tr>
                            <td nowrap><i class="fas fa-envelope mr-2"> Admin</i></td>
                            <td style="color: #008080">{{ $notification->data['text'] }}</td>
                            <td nowrap style="color: #008080">
                                @if($notification->created_at->diffInSeconds( Carbon\Carbon::now()) < 3600)
                                    {{ $notification->created_at->diff( Carbon\Carbon::now())->format(' %i min ')  }}
                                @elseif($notification->created_at->diffInSeconds( Carbon\Carbon::now()) >= 3600 and $notification->created_at->diffInSeconds( Carbon\Carbon::now()) < 86400)
                                    {{ $notification->created_at->diff( Carbon\Carbon::now())->format('  %hh %im ')  }}
                                @elseif($notification->created_at->diffInSeconds( Carbon\Carbon::now()) >= 86400)
                                    {{ $notification->created_at->diff( Carbon\Carbon::now())->format(' %dd  %hh ')  }}
                                @endif
                            </td>
                            <td nowrap class="p-2" style="font-size: 0.7rem;">
                                <a href="#" class="float-right mark-as-read" data-id="{{ $notification->id }}">
                                    Mark as read
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endsection

        @section('scripts')

            <script>
                $('#show-notification').dataTable({
                    "scrollY": "500px",
                    "scrollCollapse": true,
                    "paging": false,
                    "ordering": false,
                    "info": false,
                });

                function sendMarkRequest(id = null) {
                    return $.ajax("{{ route('markNotification') }}", {
                        method: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id
                        }
                    });
                }

                $(function () {
                    $('.mark-as-read').click(function () {
                        let request = sendMarkRequest($(this).data('id'));
                        request.done(() => {
                            location.reload();
                        });
                    });

                    // $('#mark-all').click(function () {
                    //     let request = sendMarkRequest();
                    //     request.done(() => {
                    //        location.reload();
                    //     })
                    // });
                });

            </script>
@endsection


