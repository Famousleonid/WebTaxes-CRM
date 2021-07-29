@extends('cabinet.master')

@section('content')

    <div class="container bg-white shadow firm-border">
        <div class="card-body">

            <div class="row mb-3 border-bottom">
                <div class="col-2">
                    <img class="ml-5" src="{{asset('img/sova.png')}}" width="125px" alt="">
                </div>
                <div class="col-2 border-bottom text-center pt-4">
                    <h4> &nbsp;&nbsp;Reports for:</h4>&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <div class="col border-bottom pt-4">
                    <h4 style="color: #007BFF;"> {{$user->name}}</h4>
                </div>
            </div>


            <div class="">
                <div class="active tab-pane" id="firms">
                    <h6>Number of organizations: {{count($firms)}}</h6>
                </div>

                @if(count($firms))
                    <table class="table-sm table-bordered table-hover text-nowrap table-striped" style="width: 100%">
                        <tbody>
                        <tr>
                            <th>Name</th>
                            <th class="text-center">Created Date</th>
                            <th class="text-center">Show reports</th>
                        </tr>
                        @foreach ($firms as $firm)
                            <tr>
                                <td>{{$firm->company_name}}</td>
                                <td class="text-center">{{$firm->created_at->format('d.m.Y')}}</td>
                                <td class="text-center">
                                    <a href="{{route('show.report', ['firmId' => $firm->id]) }}">
                                        <img src="{{asset('img/rep.jpg')}}" width="40" alt=""></img>
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




@endsection
