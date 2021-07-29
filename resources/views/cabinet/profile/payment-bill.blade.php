@extends('cabinet.master')

@section('content')

    <div class="container shadow firm-border">
        <div class="tab-content">
            <div class="row bg-white pt-4">

                <div class="col-2">
                    <h4>Payment list</h4><span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </div>
                <div class="col-4">
                    <h4 style="color: #007BFF;">User: {{$firm->company_name}}</h4><span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </div>
                <div class="col-4 fon">
                    @if ($firm->sum < 0 )
                        <h4 class="text-bold text-danger">&nbsp;&nbsp;&nbsp;&nbsp;$&nbsp;{{$firm->sum/100}} </h4>
                    @else
                        <h4 class="text-bold" style="color: #376A2A">&nbsp;&nbsp;&nbsp;&nbsp;$&nbsp;{{$firm->sum/100}} </h4>
                    @endif

                </div>
                <div class="col-2 mb-2">
                    <a href="{{ URL::previous() }}" class="btn btn-info btn-block">Return</a>
                </div>

                <hr>

                <div class="box-body table-responsive  p-3">
                    @if(count($pays))

                        <table id="billT" class="table table-bordered table-hover table-striped ">
                            <thead>
                            <tr>
                                <th>Created Date</th>
                                <th>Payer email</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Currency</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($pays as $pay)
                                <tr>
                                    <td>{{$pay->created_at->format('d.m.Y')}}</td>
                                    <td>{{$pay->payer_email}}</td>

                                    @if ($pay->amount/100 < 0 )
                                        <td class="text-center  text-bold text-danger">{{number_format($pay->amount/100,2)}}</td>
                                    @else
                                        <td class="text-center text-bold" style="color: #376A2A">{{number_format($pay->amount/100,2)}}</td>
                                    @endif

                                    <td class="text-center">{{$pay->currency}}</td>
                                    <td>{{$pay->description}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th></th>
                                <th  style="text-align:right">Total:</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>

                    @else
                        <h3>Payment not found</h3>
                    @endif
                </div>

            </div>
        </div>

        @endsection

        @section('scripts')

            <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', function () {

                    let mainTable = $('#billT').DataTable({
                        "AutoWidth": true,
                        "scrollY": "600px",
                        "scrollX": false,
                        "scrollCollapse": true,
                        "paging": false,
                        "ordering": true,
                        "info": true,
                        "footerCallback": function ( row, data, start, end, display ) {
                            let api = this.api();

                            let intVal = function ( i ) {
                                return typeof i === 'string' ?
                                    i.replace(/[\$,]/g, '')*1 :
                                    typeof i === 'number' ?
                                        i : 0;
                            };

                            let total = api
                                .column( 2)
                                .data()
                                .reduce( function (a, b) {
                                    return intVal(a) + intVal(b);
                                }, 0 );

                            // Update footer
                            $( api.column( 2 ).footer() ).html(
                                '$ '+ total.toFixed(2)
                            );
                        }
                    });
                });

            </script>

@endsection




