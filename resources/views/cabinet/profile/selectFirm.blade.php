@extends('cabinet.master')

@section('content')

    <div class="container bg-white shadow firm-border">
        <div class="card-body">
            <div class="">

                <div class="row mb-3">
                    <h4>Scan Documents</h4>&nbsp;&nbsp;&nbsp;&nbsp;<h4 style="color: #007BFF;">User: {{$user->name}}</h4>
                </div>


                <div class="">
                    <div class="active tab-pane" id="firms">
                        <h6>Number of organizations: {{count($firms)}}</h6>
                    </div>

                    @if(count($firms))
                        <table class="table table-bordered table-hover text-nowrap table-striped ">
                            <tbody>
                            <tr>
                                <th>Name</th>
                                @if($firms->first()->tariff !== NULL)
                                    <th>Tariff</th> @endif
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($firms as $firm)
                                <tr>
                                    <td>{{$firm->company_name}}</td>
                                    @if($firm->tariff !== NULL)
                                        <td>{{$firm->tariff->name}} @endif</td>
                                        <td>{{$firm->created_at->format('d.m.Y')}}</td>

                                        <td style="padding:10px 20px 0px 20px;">
                                            <a href="{{route('invoice.index', ['firmId' => $firm->id]) }}">
                                                <img src="{{asset('img/scan6.jpg')}}" width="50" height="40" data-toggle="tooltip" title="Add Documents"></img>
                                            </a>
                                        </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Organizations not created</p>
                    @endif
                </div>
            </div>
        </div>

@endsection





