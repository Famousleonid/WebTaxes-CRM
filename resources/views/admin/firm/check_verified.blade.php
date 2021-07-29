@extends('admin.master')

@section('links')
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

    <div class="container shadow firm-border bg-white mt-2 p-2">

        <div class="row m-1">
            <div class="col-9">
                <h4 class="text-primary text-bold">Invoices</h4><h5 style="color: #007BFF;"> Company: {{$firm->company_name}}</h5>
            </div>
            <div class="col-2 ml-auto">
                <a href="{{route('firm.index')}}" class="btn btn-info ">return</a>
            </div>
        </div>

        <div id="viewAllPosition">

            <table id="invoiceT" class="table table-bordered  table-hover w-100 mt-4">
                <thead>

                <th>Name</th>
                <th class="text-center">pic</th>
                <th class="text-center">veryfied</th>
                <th class="text-center">download</th>
                <th class="text-center">created</th>
                <th class="text-center">remove</th>

                </thead>
                <tbody>
                @if($invoices && $invoices->count())
                    @php $mediaName = 'invoices' @endphp
                    @foreach($invoices as $in)
                        <tr class="text-center">
                            <td class="text-left">{{ $in->file_name }}</td>
                            <td><img class="thumb_pic"
                                     src="{{ route('image.show.thumb', ['mediaId'=>$in->id, 'firmId'=>$firm->id, $mediaName]) }}"
                                     alt="Picture"
                                     data-mediaid="{{$in->id}}"
                                     data-firmId="{{$firm->id}}"
                                     data-mediaName="{{$mediaName}}">
                            </td>

                            @if($in->verified)
                                <td class="text-center">
                                    <a href="{{route('image.verified',['mediaId'=>$in->id])}}">
                                        <img src="{{asset('img/ok.png')}}" width="30px" alt="">
                                    </a>
                                </td>
                            @else
                                <td class="text-center"><a href="{{route('image.verified',['mediaId'=>$in->id])}}">
                                        <img src="{{asset('img/icon_no.png')}}" width="15px" alt="">
                                    </a>
                                </td>
                            @endif

                            <td><a href="{{route('image.download_file',['mediaId'=>$in->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>
                            <td>{{ $in->created_at->format('d.m.Y') }}</td>
                            @if(!$in->verified)
                                <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$in->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
                            @else
                                <td class="text-center" style="font-size: 12px;color: darkgray;">indelible</td>
                            @endif
                        </tr>
                    @endforeach
                @endif


                </tbody>
            </table>
        </div>


    </div>


@endsection

@section('scripts')

    <script src="{{asset('assets/admin/js/jquery.fancybox.min.js')}}"></script>


    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {

            let mainTable = $('#invoiceT').DataTable({
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

                let out = "<img  src='{{ route('image.show.pic',['mediaId'=> ':Id', 'firmId'=>':fId', ':nId']) }}'>";

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

