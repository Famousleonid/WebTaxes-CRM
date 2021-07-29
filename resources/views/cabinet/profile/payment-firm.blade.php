@extends('cabinet.master')

@section('content')

    <div class="container bg-white shadow firm-border">
        <div class="card-body">
            <div class="">

                <div class="row p-3">
                    <h4>Make payment</h4>&nbsp;&nbsp;&nbsp;&nbsp;<h4 style="color: #007BFF;">User: {{$user->name}}</h4>
                </div>

            <div class="">
                <div class="active tab-pane" id="firms">
                    <h6>Number of organizations: {{count($firms)}}</h6>
                </div>

                    @if(count($firms))
                        <table class="table table-bordered table-hover text-nowrap table-striped ">
                            <tbody>
                            <tr>
                                <th class="">Name</th>
                                <th class="">Business number</th>
                                <th class="text-center">Account amount</th>
                                <th class="text-center">Pay</th>
                                <th class="text-center">Payment list</th>

                            </tr>
                            @foreach ($firms as $firm)
                                <tr>
                                    <td>{{$firm->company_name}}</td>
                                    <td>{{$firm->business_number}}</td>

                                    @if($firm->sum < 0)
                                        <td class="text-center text-bold text-danger">{{number_format($firm->sum/100, 2)}}</td>
                                    @else
                                        <td class="text-center text-bold" style="color: #376A2A">{{number_format($firm->sum/100, 2)}}</td>
                                    @endif

                                    <td class="text-center" style="padding:10px 20px 0 20px">
                                        <a href="{{route('check',['firm' => $firm->id])}}">
                                            <img src="{{asset('img/card.png')}}" width="35px" alt="">
                                        </a>
                                    </td>
                                    <td class="text-center" style="padding:10px 20px 0 20px">
                                        <a href="{{route('bill',['firm' => $firm->id])}}">
                                            <img src="{{asset('img/list.webp')}}" width="30px" alt="">
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
