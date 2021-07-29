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

    <div class="container">

        <div class="card bg-white firm-border mb-1">

            <div class="row ">
                <div class="col-7">
                    <h5 style="color: #007BFF;"> Company: {{$firm->company_name}}</h5>
                </div>
                <div class="col-2 ml-auto ">
                    <a href="{{route('selectFirm') }}" class="btn btn-info ">return</a>
                </div>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>

            </div>
            <div class="card-body collaps" id="divbody" style="width: 100%; padding: 0px 10px 0px 10px;">

                <div style="width: 100%; padding: 5px; border: 1px solid #CED4DA;">
                    <div class="container row align-items-center mt-1" style="background-color: #F4F6F9;">
                        <div class="offset-1 col-5 mt-1" style="border: 1px dashed lightblue">
                            <form method="POST" id="invoices" enctype="multipart/form-data" action="{{route('addMediaScan', ['firmId'=> $firm->id ])}}">
                                @csrf
                                <input id="filepond-scan" type="file" class="filepond" data-allow-reorder="true"
                                       data-max-file-size="4MB"
                                       name="invoices">
                                <input type="text" name="name_doc" value="invoices" hidden>
                            </form>
                        </div>
                        <div class="col-6 text-center">
                            <p class="message_maindocument d-none">We have verified that the files are tested and meet the requirements. Click "Upload to storage" to save them to the database.</p>
                            <p class="message_start">Select files to download before clicking on</p>

                            <button form="invoices" class="btn btn-primary align-item-center disabled upload-to-storage upload-maindocument"><span id="spinner-loading" class="spinner-border spinner-border-sm d-none"></span>&nbsp;&nbsp;Upload to storage</button>

                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="container col-md-12  mb-5 p-1 bg-white shadow firm-border card-body ">
            @if($invoices && $invoices->count())

                <table id="invoice-tbl" class="table  table-invoices table-bordered table-hover w-100 mt-4">
                    <thead>
                    <tr>
                        <th class="text-center">Year</th>
                        <th class="text-center">Name of file</th>
                        <th class="text-center" data-orderable="false">Image document</th>
                        <th class="text-center" data-orderable="false">Download document</th>
                        <th class="text-center">Date created</th>
                        <th class="text-center" data-orderable="false">Remove</th>
                    </tr>
                    </thead>

                    @php $mediaName = 'invoices' @endphp

                    <tbody>

                    @foreach($invoices as $i)

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

                            <td>{{ $i->created_at->format('d.m.Y') }}</td>
                            @if(!$i->verified)
                                <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$i->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
                            @else
                                <td class="text-center" data-toggle="tooltip" title="Verified by admin" style="font-size: 12px;color: darkgray;">indelible</td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        @endsection

        @section('scripts')

            <script src="{{asset('assets/admin/js/jquery.fancybox.min.js')}}"></script>


            <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', function () {


                    let mainTable = $('#invoice-tbl').DataTable({
                        "AutoWidth": true,
                        "scrollY": "600px",
                        "scrollX": false,
                        "scrollCollapse": true,
                        "paging": false,
                        "ordering": true,
                        "info": true,
                    });


                    $('.remove_image, .upload-to-storage').click(function () {
                        $('#spinner-loading').removeClass('d-none');
                    });

                    // ------------------------------FilePond Lib ------------------------------------------------

                    FilePond.registerPlugin(
                        FilePondPluginImagePreview,
                        FilePondPluginFileValidateSize,
                    );

                    let inputElement = document.getElementById('filepond-scan')

                    FilePond.create(inputElement)

                    FilePond.setOptions({
                        server: {
                            process: {
                                url: '{{ route('filepondStoreScan') }}',
                            },
                            revert: {
                                url: '{{ route('filepondDeleteScan') }}',
                                'method': 'post'
                            },
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token()}}'
                            }
                        },
                        imagePreviewMaxHeight: 100,
                        instantUpload: true,
                        allowMultiple: true,
                        allowImagePreview: 'true',
                        processFiles: false,
                        mimeType: "multipart/form-data",
                        maxFiles: '10',
                        // labelIdle: "My label",

                        onprocessfiles: () => {
                            // console.log('все файлы загружены');
                            $('.message_start').addClass('d-none');
                            $('.message_maindocument').removeClass('d-none');
                            $('.upload-maindocument').removeClass('disabled');
                        },
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

                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                })


            </script>

@endsection
