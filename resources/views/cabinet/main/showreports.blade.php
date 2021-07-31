@extends('cabinet.master')

@section('link')
    <link rel="stylesheet" href="{{asset('assets/plugins/jquery.fancybox.min.css')}}">
@endsection


@section('content')
    <style>
        table td {
            padding: 3px 0 3px 5px !important;
            vertical-align: middle !important;
        }

        .thumb_pic:hover {
            cursor: pointer;
        }
    </style>

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
                    <h4 style="color: #007BFF;"> {{$firm->company_name}}</h4>
                </div>
                <div class="col-2 ml-auto pt-3">
                    <a href="{{route('reports') }}" class="btn btn-info ">return</a>
                </div>
            </div>


            <div class="">
                <div class="active tab-pane" id="firms">
                    <h6>Number of reports: {{count($reports)}}</h6>
                </div>

                @if(count($reports))
                    <table id="show_reports" class="table-sm table-bordered table-hover text-nowrap table-striped" style="width: 100%">
                        <thead>
                        <tr>
                            <th class="text-center">Year</th>
                            <th class="text-center">Name of file</th>
                            <th class="text-center" data-orderable="false">Image document</th>
                            <th class="text-center" data-orderable="false">Download document</th>
                            <th class="text-center">Date created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $mediaName = "reports" @endphp
                        @foreach ($reports as $i)
                            <tr class="text-center">
                                <td>{{ $i->created_at->format('m.Y') }}</td>
                                <td class="text-left">{{ $i->file_name }}</td>
                                <td>
                                    <img class="thumb_pic"
                                         src="{{ route('image.show.thumb',['mediaId'=>$i->id, 'firmId'=>$firm->id, $mediaName]) }}"
                                         alt="Picture"
                                         data-mediaid="{{$i->id}}"
                                         data-firmId="{{$firm->id}}"
                                         data-mediaName="{{$mediaName}}">
                                </td>
                                <td><a href="{{route('image.download_file',['mediaId'=>$i->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>
                                <td><span style="display: none">{{$i->created_at->format('Ymd')}}</span>{{ $i->created_at->format('d.m.Y') }}</td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Reports not found</p>
                @endif
            </div>
        </div>


@endsection
@section('scripts')

    <script src="{{asset('js/jquery.fancybox.min.js')}}"></script>


    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {


            let mainTable = $('#show_reports').DataTable({
                "AutoWidth": true,
                "scrollY": "600px",
                "scrollX": false,
                "scrollCollapse": true,
                "paging": false,
                "ordering": true,
                "info": true,
            });


            let data_tbl = document.querySelectorAll('.thumb_pic')

            $('table').on('click', '.thumb_pic', function () {

                let id = $(this).attr('data-mediaId');
                let name = $(this).attr('data-mediaName');
                let firm = $(this).attr('data-firmId');

                let out = "<img src='{{ route('image.show.pic',['mediaId'=> ':Id', 'firmId'=>':fId', ':nId']) }}'>";

                out = out.replace(':Id', id);
                out = out.replace(':fId', firm);
                out = out.replace(':nId', name);

                $.fancybox.open((out), {
                    protect: true,

                });
            })


        });


    </script>

@endsection
