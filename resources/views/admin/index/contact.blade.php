@extends('admin.master')

@section('content')

    <div class="container bg-white shadow firm-border mt-3">
        <div class="card-body">

            <h5>Contact for Admin  ( {{$contacts->count()}} ) pieces</h5>

            <table id="show-contact" class="table table-bordered table-hover table-striped  bg-light">
                <thead>
                <tr>
                    <th>Name </th>
                    <th>email </th>
                    <th>text </th>
                    <th style="display: none">date </th>
                    <th class="text-center">ago</th>
                    <th class="text-center">delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td style="color: #008080">{{ $contact->name }}</td>
                        <td style="color: #008080">{{ $contact->email }}</td>
                        <td style="color: #008080">{{ $contact->message }}</td>
                        <td style="display: none"><span style="display: none">{{$contact->created_at->format('Ymd')}}</span></td>
                        <td nowrap style="color: #008080" class="text-center">
                            @if($contact->created_at->diffInSeconds( Carbon\Carbon::now()) < 3600)
                                {{ $contact->created_at->diff( Carbon\Carbon::now())->format(' %i min ')  }}
                            @elseif($contact->created_at->diffInSeconds( Carbon\Carbon::now()) >= 3600 and $contact->created_at->diffInSeconds( Carbon\Carbon::now()) < 86400)
                                {{ $contact->created_at->diff( Carbon\Carbon::now())->format('  %hh %im ')  }}
                            @elseif($contact->created_at->diffInSeconds( Carbon\Carbon::now()) >= 86400)
                                {{ $contact->created_at->diff( Carbon\Carbon::now())->format(' %dd  %hh ')  }}
                            @endif
                        </td>
                        <td nowrap class="text-center" style="font-size: 0.8rem;">
                            <a href="{{route('deleteContact', ['id' => $contact->id ])}} ">
                                remove
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
        $('#show-contact').dataTable({
            "scrollY": "600px",
            "scrollCollapse": true,
            "paging": false,
            "ordering": true,
            "order": [ 3, "desc" ],
            "info": false,
        });

    </script>
@endsection


