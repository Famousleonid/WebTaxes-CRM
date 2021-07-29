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


    <section class="container pl-2 pr-2">

        <div class="card firm-border p-2 bg-white shadow">

            <div class="card-header row align-items-center p-2">
                <div class="col-4">
                    <h3 class="card-title text-bold text-danger">List of DELETED companies &nbsp;&nbsp;</h3><span class="text-bold">( {{count($del_firms)}} item )</span>
                </div>
                <div class="card-tools ml-auto pr-2">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>


            <div class="card-body p-0 pt-2">

                <div class="box-body ">
                    @if(count($del_firms))

                        <table id="show-firm" class="table-sm table-bordered table-striped table-hover " style="width:100%;">

                            <thead>
                            <tr>
                                <th class="text-center" data-orderable="false">N</th>
                                <th hidden>Id</th>
                                <th>Name</th>
                                <th>Business number</th>
                                <th class="text-center">Deleted Date</th>
                                <th class="text-center" data-orderable="false">Restore</th>
                                <th class="text-center text-danger" data-orderable="false">Permanent removal</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=0; @endphp
                            @foreach ($del_firms as $firm)
                                @php $i++; @endphp
                                <tr>
                                    <td>{{$i}}</td>
                                    <td hidden>{{$firm->id}}</td>
                                    <td>{{$firm->company_name}}</td>
                                    <td>{{$firm->business_number}}</td>
                                    <td class="text-center"><span style="display: none">{{$firm->deleted_at->format('Ymd')}}</span>{{$firm->deleted_at->format('d.m.Y')}}</td>
                                    <td class="text-center">
                                        <a href="{{ route('restoreFirm', ['firm' => $firm->id]) }}" class=""><img src="{{asset('img/restore.png')}}" width="30px" alt=""></a>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{route('permanentDestroy', ['firm' => $firm->id])}}"  method="POST" class="">
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

        let mainTable = $('#show-firm').DataTable({
            "AutoWidth": true,
            "scrollY": "600px",
            "scrollX": false,
            "scrollCollapse": true,
            "paging": false,
            "ordering": true,
            "info": false,
        });


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
