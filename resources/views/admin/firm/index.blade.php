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

    <style>
        td.hover {
            cursor: pointer;
        }
    </style>

    @include('components.delete');

    <section class="container-fluid pl-3 pr-3 mt-2">

        <div class="card firm-border p-2 bg-white shadow">

            <div class="card-header row align-items-center p-2">
                <div class="col-4">
                    <h3 class="card-title text-bold">List of companies ( {{count($firms)}} item ) </h3>
                </div>
                <div class="col-4">
                    <a id="admin_new_firm_create" href="{{route('create.firm')}}" class=""><img src="{{asset('img/plus.png')}}" width="50px" alt="" data-toggle="tooltip" data-placement="top" title="Add new company"></a>
                </div>

                <div class="card-tools ml-auto pr-2">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>


            <div class="card-body p-0 pt-2">

                <div class="box-body ">
                    @if(count($firms))

                        <table id="show-firm" class="table-sm table-bordered table-striped table-hover " style="width:100%;">

                            <thead>
                            <tr>
                                <th class="text-center" data-orderable="false">№</th>
                                <th hidden>Id</th>
                                <th>Name</th>
                                <th>Business number</th>
                                <th class="text-center">Verified</th>
                                <th>Client</th>
                                <th>Tarif</th>
                                <th class="text-center">Sum</th>
                                <th class="text-center" data-orderable="false">Edit</th>
                                <th class="text-center" data-orderable="false">Doc verify</th>
                                <th class="text-center" data-orderable="false">Check verify</th>
                                <th class="text-center" data-orderable="false">Send report</th>
                                <th class="text-center" data-orderable="false">Payment list</th>
                                <th class="text-center">create Date</th>
                                <th class="text-center" data-orderable="false">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($firms as $firm)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td hidden>{{$firm->id}}</td>
                                    <td>{{$firm->company_name}}</td>
                                    <td>{{$firm->business_number}}</td>

                                    @if($firm->verified)
                                        <td class="text-center"><img src="{{asset('img/ok.png')}}" width="30px" alt=""></td>
                                    @else
                                        <td class="text-center"><img src="{{asset('img/icon_no.png')}}" width="15px" alt=""></td>
                                    @endif

                                    <td>{{$firm->user->name}}</td>
                                    <td>{{$firm->tariff->name}}</td>

                                    @if($firm->sum < 0)
                                        <td class="text-center text-bold text-danger">{{number_format($firm->sum/100, 2)}}</td>
                                    @else
                                        <td class="text-center text-bold" style="color: #376A2A">{{number_format($firm->sum/100, 2)}}</td>
                                    @endif

                                    <td class="text-center">
                                        <a href="{{route('firm.edit', ['firm' => $firm->id])}}"><img src="{{asset('img/set.png')}}" width="30px" alt=""></a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('docVerify', ['firm' => $firm->id])}}"><img src="{{asset('img/case.webp')}}" width="35px" alt=""></a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('checkVerify', ['firm' => $firm->id])}}"><img src="{{asset('img/kassa1.png')}}" width="35px" alt=""></a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('send.report', ['firm' => $firm->id]) }}"><img src="{{asset('img/send4.png')}}" width="30" alt=""></a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('bill',['firm' => $firm->id])}}"><img src="{{asset('img/list.webp')}}" width="30px" alt=""></a>
                                    </td>
                                    <td class="text-center"><span style="display: none">{{$firm->created_at->format('Ymd')}}</span>{{$firm->created_at->format('d.m.Y')}}</td>
                                    <td class="text-center">
                                        <form action="{{route('firm.destroy', ['firm' => $firm->id])}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete company" data-message="Are you sure you want to delete this company ?">
                                                <i class="glyphicon glyphicon-trash"></i> Delete
                                            </button>
                                        </form>
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

    </section>



@endsection

@section('scripts')
    <script>

        $('#admin_new_firm_create').click(function () {
            window.sessionStorage.clear()
            window.localStorage.clear()
            sessionStorage.setItem('select_tariff', 'edit')
        });



        let mainTable = $('#show-firm').DataTable({
            "AutoWidth": true,
            "scrollY": "600px",
            "scrollX": false,
            "scrollCollapse": true,
            "paging": false,
            "ordering": true,
            "info": false,
        });

        // $('td').on('mouseenter mouseleave', function () {
        //     let i = this.cellIndex;
        //     if (i === 4) {
        //         $(this).toggleClass('hover')
        //     }
        // });


        // delete form confirm
        document.addEventListener('DOMContentLoaded', function () {

            $('#confirmDelete').on('show.bs.modal', function (e) {
                $message = $(e.relatedTarget).attr('data-message');
                $(this).find('.modal-body p').text($message);
                $title = $(e.relatedTarget).attr('data-title');
                $(this).find('.modal-title').text($title);

                // Pass form reference to modal for submission on yes/ok
                let form = $(e.relatedTarget).closest('form');
                $(this).find('.modal-footer #confirm').data('form', form);
            });
            $('#confirmDelete').find('.modal-footer #confirm').on('click', function () {
                $(this).data('form').submit();
            });
        });

    </script>
@endsection
