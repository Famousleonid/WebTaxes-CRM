@extends('cabinet.master')

@section('link')
    <link rel="stylesheet" href="{{asset('assets/plugins/jquery.fancybox.min.css')}}">
@endsection

@section('content')
    <style>
        table td, th {
            padding: 3px 3px 3px 3px !important;
        }

        .thumb_pic:hover {
            cursor: pointer;
        }

        #viewAllPosition {
            display: none;
            position: absolute;
            width: 97%;
            background-color: white;
            border: 1px solid #0b2e13;
            padding: 30px 10px 30px 10px;
            margin-right: 10px;
            margin-left: 10px;
        }

    </style>

    <section>

        <div class="container">

            <div class="card-header p-2 row ">
                <div class="ml-3 col-5"><h4>{{$firm->company_name}} </h4></div>
                <div class="col-5 ">
                    <button id="allPosition" class="btn btn-default shadow font-italic">Click to expand/closed view all positions</button>
                </div>
                <div class="col-1">
                    <a href="{{route('profile')}}" class="btn btn-info shadow">return</a>
                </div>
            </div><!-- /.card-header  company name  and button  All position-->
            {{---------------------------------------------------------------------------------------------------------------------------}}

            <div id="viewAllPosition" class="container shadow" style="z-index:99">

                <table class="table table-bordered  table-hover w-100 mt-4">
                    <tr>
                        <td colspan="5"><span style="font-weight: bold;">Articles incorporation</span></td>
                    </tr>
                    @if($articles_incorporation && $articles_incorporation->count())
                        @php $mediaName = 'articles_incorporation' @endphp
                        @foreach($articles_incorporation as $ai)
                            <tr class="text-center">
                                <td class="text-left">{{ $ai->file_name }}</td>
                                <td><img class="thumb_pic"
                                         src="{{ route('image.show.thumb',['mediaId'=>$ai->id, 'firmId'=>$firm->id, $mediaName]) }}"
                                         alt="Picture"
                                         data-mediaid="{{$ai->id}}"
                                         data-firmId="{{$firm->id}}"
                                         data-mediaName="{{$mediaName}}">
                                </td>
                                <td><a href="{{route('image.download_file',['mediaId'=>$ai->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>
                                <td>{{ $ai->created_at->format('d.m.Y') }}</td>
                                @if(!$ai->verified)
                                    <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$ai->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
                                @else
                                    <td class="text-center" data-toggle="tooltip"  title = "Verified by admin" style="font-size: 12px;color: darkgray;">indelible</td>
                                @endif
                            </tr>
                        @endforeach
                    @endif
                    <tr>
                        <td colspan="5"><span style="font-weight: bold;">Business number registration</span></td>
                    </tr>
                    @if($business_number_registration && $business_number_registration->count())
                        @php $mediaName = 'business_number_registration' @endphp
                        @foreach($business_number_registration as $bn)
                            <tr class="text-center">
                                <td class="text-left">{{ $bn->file_name }}</td>
                                <td>
                                    <img class="thumb_pic"
                                         src="{{ route('image.show.thumb',['mediaId'=>$bn->id, 'firmId'=>$firm->id, $mediaName]) }}"
                                         alt="Picture"
                                         data-mediaid="{{$bn->id}}"
                                         data-firmId="{{$firm->id}}"
                                         data-mediaName="{{$mediaName}}">
                                </td>
                                <td><a href="{{route('image.download_file',['mediaId'=>$bn->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>
                                <td>{{ $bn->created_at->format('d.m.Y') }}</td>
                                @if(!$bn->verified)
                                    <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$bn->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
                                @else
                                    <td class="text-center" data-toggle="tooltip"  title = "Verified by admin" style="font-size: 12px;color: darkgray;">indelible</td>
                                @endif
                            </tr>
                        @endforeach
                    @endif
                    <tr>
                        <td colspan="5"><span style="font-weight: bold;">Shareholders</span></td>
                    </tr>
                    @if($shareholders && $shareholders->count())
                        @php $mediaName = 'shareholders' @endphp
                        @foreach($shareholders as $sh)
                            <tr class="text-center">
                                <td class="text-left">{{ $sh->file_name }}</td>
                                <td>
                                    <img class="thumb_pic"
                                         src="{{ route('image.show.thumb',['mediaId'=>$sh->id, 'firmId'=>$firm->id, $mediaName]) }}"
                                         alt="Picture"
                                         data-mediaid="{{$sh->id}}"
                                         data-firmId="{{$firm->id}}"
                                         data-mediaName="{{$mediaName}}">
                                </td>
                                <td><a href="{{route('image.download_file',['mediaId'=>$sh->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>

                                <td>{{ $sh->created_at->format('d.m.Y') }}</td>
                                @if(!$sh->verified)
                                    <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$sh->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
                                @else
                                    <td class="text-center" data-toggle="tooltip"  title = "Verified by admin" style="font-size: 12px;color: darkgray;">indelible</td>
                                @endif
                            </tr>
                        @endforeach
                    @endif
                    <tr>
                        <td colspan="5"><span style="font-weight: bold;">Director information</span></td>
                    </tr>
                    @if($director_information && $director_information->count())
                        @php $mediaName = 'director_information' @endphp
                        @foreach($director_information as $di)
                            <tr class="text-center">
                                <td class="text-left">{{ $di->file_name }}</td>
                                <td>
                                    <img class="thumb_pic"
                                         src="{{ route('image.show.thumb',['mediaId'=>$di->id, 'firmId'=>$firm->id, $mediaName]) }}"
                                         alt="Picture"
                                         data-mediaid="{{$di->id}}"
                                         data-firmId="{{$firm->id}}"
                                         data-mediaName="{{$mediaName}}">
                                </td>
                                <td><a href="{{route('image.download_file',['mediaId'=>$di->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>
                                <td>{{ $di->created_at->format('d.m.Y') }}</td>
                                @if(!$di->verified)
                                    <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$di->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
                                @else
                                    <td class="text-center" data-toggle="tooltip"  title = "Verified by admin" style="font-size: 12px;color: darkgray;">indelible</td>
                                @endif
                            </tr>
                        @endforeach
                    @endif
                    <tr>
                        <td colspan="5"><span style="font-weight: bold;">Resolutions</span></td>
                    </tr>
                    @if($resolutions && $resolutions->count())
                        @php $mediaName = 'resolutions' @endphp
                        @foreach($resolutions as $rs)
                            <tr class="text-center">
                                <td class="text-left">{{ $rs->file_name }}</td>
                                <td>
                                    <img class="thumb_pic"
                                         src="{{ route('image.show.thumb',['mediaId'=>$rs->id, 'firmId'=>$firm->id, $mediaName]) }}"
                                         alt="Picture"
                                         data-mediaid="{{$rs->id}}"
                                         data-firmId="{{$firm->id}}"
                                         data-mediaName="{{$mediaName}}">
                                </td>
                                <td><a href="{{route('image.download_file',['mediaId'=>$rs->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>
                                <td>{{ $rs->created_at->format('d.m.Y') }}</td>
                                @if(!$rs->verified)
                                    <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$rs->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
                                @else
                                    <td class="text-center" data-toggle="tooltip"  title = "Verified by admin" style="font-size: 12px;color: darkgray;">indelible</td>
                                @endif
                            </tr>
                        @endforeach
                    @endif
                    <tr>
                        <td colspan="5"><span style="font-weight: bold;">Articles amalgamation</span></td>
                    </tr>
                    @if($articles_amalgamation && $articles_amalgamation->count())
                        @php $mediaName = 'articles_amalgamation' @endphp
                        @foreach($articles_amalgamation as $aa)
                            <tr class="text-center">
                                <td class="text-left">{{ $aa->file_name }}</td>
                                <td>
                                    <img class="thumb_pic"
                                         src="{{ route('image.show.thumb',['mediaId'=>$aa->id, 'firmId'=>$firm->id, $mediaName]) }}"
                                         alt="Picture"
                                         data-mediaid="{{$aa->id}}"
                                         data-firmId="{{$firm->id}}"
                                         data-mediaName="{{$mediaName}}">
                                </td>
                                <td><a href="{{route('image.download_file',['mediaId'=>$aa->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>
                                <td>{{ $aa->created_at->format('d.m.Y') }}</td>
                                @if(!$aa->verified)
                                    <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$aa->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
                                @else
                                    <td class="text-center" data-toggle="tooltip"  title = "Verified by admin" style="font-size: 12px;color: darkgray;">indelible</td>
                                @endif
                            </tr>
                        @endforeach
                    @endif
                    <tr>
                        <td colspan="5"><span style="font-weight: bold;">Notice change address</span></td>
                    </tr>
                    @if($notice_change_address && $notice_change_address->count())
                        @php $mediaName = 'notice_change_address' @endphp
                        @foreach($notice_change_address as $nc)
                            <tr class="text-center">
                                <td class="text-left">{{ $nc->file_name }}</td>
                                <td>
                                    <img class="thumb_pic"
                                         src="{{ route('image.show.thumb',['mediaId'=>$nc->id, 'firmId'=>$firm->id, $mediaName]) }}"
                                         alt="Picture"
                                         data-mediaid="{{$nc->id}}"
                                         data-firmId="{{$firm->id}}"
                                         data-mediaName="{{$mediaName}}">
                                </td>
                                <td><a href="{{route('image.download_file',['mediaId'=>$nc->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>
                                <td>{{ $nc->created_at->format('d.m.Y') }}</td>
                                @if(!$nc->verified)
                                    <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$nc->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
                                @else
                                    <td class="text-center" data-toggle="tooltip"  title = "Verified by admin" style="font-size: 12px;color: darkgray;">indelible</td>
                                @endif
                            </tr>
                        @endforeach
                    @endif
                    <tr>
                        <td colspan="5"><span style="font-weight: bold;">Last t2</span></td>
                    </tr>
                    @if($last_t2 && $last_t2->count())
                        @php $mediaName = 'last_t2' @endphp
                        @foreach($last_t2 as $lt)
                            <tr class="text-center">
                                <td class="text-left">{{ $lt->file_name }}</td>
                                <td>
                                    <img class="thumb_pic"
                                         src="{{ route('image.show.thumb',['mediaId'=>$lt->id, 'firmId'=>$firm->id, $mediaName]) }}"
                                         alt="Picture"
                                         data-mediaid="{{$lt->id}}"
                                         data-firmId="{{$firm->id}}"
                                         data-mediaName="{{$mediaName}}">
                                </td>
                                <td><a href="{{route('image.download_file',['mediaId'=>$lt->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>
                                <td>{{ $lt->created_at->format('d.m.Y') }}</td>
                                @if(!$lt->verified)
                                    <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$lt->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
                                @else
                                    <td class="text-center" data-toggle="tooltip"  title = "Verified by admin" style="font-size: 12px;color: darkgray;">indelible</td>
                                @endif
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>

            {{---------------------------------------------------------------------------------------------------------------------------}}

            <div class="container-fluid mt-1 pl-4 pr-4">
                <div class="bg-white p-0 shadow rounded">
                    <button class="btn btn-link btn-block text-left border-bottom " type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                        <span style="font-weight: bold;">Articles incorporation</span>
                    </button>
                </div>

                <div id="collapse1" class="card-header p-0 collapse multi-collapse" style="background-color: #F4F6F9;">

                    <div class="container row align-items-center mt-1 allposition" style="background-color: #F4F6F9;">
                        <div class="offset-1 col-5 mt-1" style="border: 1px dashed lightblue">
                            <form method="POST" id="articles_incorporation" enctype="multipart/form-data" action="{{route('addMediaScan', ['firmId'=> $firm->id ])}}">
                                @csrf
                                <input type="file" class="filepond filepond-input"  data-allow-reorder="true"
                                       data-max-file-size="4MB"
                                       name="articles_incorporation">
                                <input type="text" name="name_doc" value="articles_incorporation" hidden>
                            </form>
                        </div>
                        <div class="col-6 text-center">
                            <p class="message_maindocument d-none">We have verified that the files are tested and meet the requirements. Click "Upload to storage" to save them to the database.</p>
                            <p class="message_start">Select files to download before clicking on</p>
                            <button form="articles_incorporation" class="btn btn-primary align-item-center disabled upload-to-storage upload-maindocument"><span class="spinner-loading spinner-border spinner-border-sm d-none"></span>&nbsp;&nbsp;Upload to storage</button>
                        </div>
                    </div>

                    <div class="container col-md-12 mt-2 bg-white">
                        @if($articles_incorporation && $articles_incorporation->count())
                            <table class="table table-bordered  table-hover w-100 mt-4">
                                <th class="text-center">Name of file</th>
                                <th class="text-center">Image document</th>
                                <th class="text-center">Download document</th>
                                <th class="text-center">Date created</th>
                                <th class="text-center">Remove</th>

                                @php $mediaName = 'articles_incorporation' @endphp

                                @foreach($articles_incorporation as $ai)

                                    <tr class="text-center">
                                        <td class="text-left">{{ $ai->file_name }}</td>

                                        <td>
                                            <img class="thumb_pic"
                                                 src="{{ route('image.show.thumb',['mediaId'=>$ai->id, 'firmId'=>$firm->id, $mediaName]) }}"
                                                 alt="Picture"
                                                 data-mediaid="{{$ai->id}}"
                                                 data-firmId="{{$firm->id}}"
                                                 data-mediaName="{{$mediaName}}">
                                        </td>
                                        <td><a href="{{route('image.download_file',['mediaId'=>$ai->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>

                                        <td>{{ $ai->created_at->format('d.m.Y') }}</td>
                                        @if(!$ai->verified)
                                            <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$ai->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
                                        @else
                                            <td class="text-center" data-toggle="tooltip"  title = "Verified by admin" style="font-size: 12px;color: darkgray;">indelible</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>

                </div>
            </div> {{--  articles_incorporation  ai --}}

            <div class="container-fluid mt-1 pl-4 pr-4">
                <div class="bg-white p-0 shadow rounded">
                    <button class="btn btn-link btn-block text-left border-bottom " type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                        <span style="font-weight: bold;">Business number registration</span>
                    </button>
                </div>
                <div id="collapse2" class="card-header p-0 collapse multi-collapse" style="background-color: #F4F6F9;">

                    <div class="container row align-items-center mt-1 allposition" style="background-color: #F4F6F9;">
                        <div class="offset-1 col-5 mt-1" style="border: 1px dashed lightblue">
                            <form method="POST" id="business_number_registration" enctype="multipart/form-data" action="{{route('addMediaScan', ['firmId'=> $firm->id ])}}">
                                @csrf
                                <input type="file" class="filepond filepond-input"  data-allow-reorder="true"
                                       data-max-file-size="4MB"
                                       name="business_number_registration">
                                <input type="text" name="name_doc" value="business_number_registration" hidden>
                            </form>
                        </div>
                        <div class="col-6 text-center">
                            <p class="message_maindocument d-none">We have verified that the files are tested and meet the requirements. Click "Upload to storage" to save them to the database.</p>
                            <p class="message_start">Select files to download before clicking on</p>
                            <button form="business_number_registration" class="btn btn-primary align-item-center disabled upload-to-storage upload-maindocument"><span class="spinner-loading spinner-border spinner-border-sm d-none"></span>&nbsp;&nbsp;Upload to storage</button>
                        </div>
                    </div>

                    <div class="container col-md-12 mt-2 bg-white">
                        @if($business_number_registration && $business_number_registration->count())
                            <table class="table table-bordered  table-hover w-100 mt-4">
                                <th class="text-center">Name of file</th>
                                <th class="text-center">Image document</th>
                                <th class="text-center">Download document</th>
                                <th class="text-center">Date created</th>
                                <th class="text-center">Remove</th>

                                @php $mediaName = 'business_number_registration' @endphp

                                @foreach($business_number_registration as $bn)

                                    <tr class="text-center">
                                        <td class="text-left">{{ $bn->file_name }}</td>
                                        <td>
                                            <img class="thumb_pic"
                                                 src="{{ route('image.show.thumb',['mediaId'=>$bn->id, 'firmId'=>$firm->id, $mediaName]) }}"
                                                 alt="Picture"
                                                 data-mediaid="{{$bn->id}}"
                                                 data-firmId="{{$firm->id}}"
                                                 data-mediaName="{{$mediaName}}">
                                        </td>
                                        <td><a href="{{route('image.download_file',['mediaId'=>$bn->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>
                                        <td>{{ $bn->created_at->format('d.m.Y') }}</td>
                                        @if(!$bn->verified)
                                            <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$bn->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
                                        @else
                                            <td class="text-center" data-toggle="tooltip"  title = "Verified by admin" style="font-size: 12px;color: darkgray;">indelible</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div> {{-- business_number_registration bn--}}

            <div class="container-fluid mt-1 pl-4 pr-4">
                <div class="bg-white p-0 shadow rounded">
                    <button class="btn btn-link btn-block text-left border-bottom " type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                        <span style="font-weight: bold;">Shareholders</span>
                    </button>
                </div>
                <div id="collapse3" class="card-header p-0 collapse multi-collapse" style="background-color: #F4F6F9;">

                    <div class="container row align-items-center mt-1 allposition" style="background-color: #F4F6F9;">
                        <div class="offset-1 col-5 mt-1" style="border: 1px dashed lightblue">
                            <form method="POST" id="shareholders" enctype="multipart/form-data" action="{{route('addMediaScan', ['firmId'=> $firm->id ])}}">
                                @csrf
                                <input type="file" class="filepond filepond-input"  data-allow-reorder="true"
                                       data-max-file-size="4MB"
                                       name="shareholders">
                                <input type="text" name="name_doc" value="shareholders" hidden>
                            </form>
                        </div>
                        <div class="col-6 text-center">
                            <p class="message_maindocument d-none">We have verified that the files are tested and meet the requirements. Click "Upload to storage" to save them to the database.</p>
                            <p class="message_start">Select files to download before clicking on</p>
                            <button form="shareholders" class="btn btn-primary align-item-center disabled upload-to-storage upload-maindocument"><span class="spinner-loading spinner-border spinner-border-sm d-none"></span>&nbsp;&nbsp;Upload to storage</button>
                        </div>
                    </div>

                    <div class="container col-md-12 mt-2 bg-white">
                        @if($shareholders && $shareholders->count())
                            <table class="table table-bordered  table-hover w-100 mt-4">
                                <th class="text-center">Name of file</th>
                                <th class="text-center">Image document</th>
                                <th class="text-center">Download document</th>
                                <th class="text-center">Date created</th>
                                <th class="text-center">Remove</th>

                                @php $mediaName = 'shareholders' @endphp

                                @foreach($shareholders as $sh)
                                    <tr class="text-center">
                                        <td class="text-left">{{ $sh->file_name }}</td>

                                        <td>
                                            <img class="thumb_pic"
                                                 src="{{ route('image.show.thumb',['mediaId'=>$sh->id, 'firmId'=>$firm->id, $mediaName]) }}"
                                                 alt="Picture"
                                                 data-mediaid="{{$sh->id}}"
                                                 data-firmId="{{$firm->id}}"
                                                 data-mediaName="{{$mediaName}}">
                                        </td>
                                        <td><a href="{{route('image.download_file',['mediaId'=>$sh->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>

                                        <td>{{ $sh->created_at->format('d.m.Y') }}</td>
                                        @if(!$sh->verified)
                                            <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$sh->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
                                        @else
                                            <td class="text-center" data-toggle="tooltip"  title = "Verified by admin" style="font-size: 12px;color: darkgray;">indelible</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div> {{--  shareholders  sh --}}

            <div class="container-fluid mt-1 pl-4 pr-4">
                <div class="bg-white p-0 shadow rounded">
                    <button class="btn btn-link btn-block text-left border-bottom " type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                        <span style="font-weight: bold;">Director information</span>
                    </button>
                </div>
                <div id="collapse4" class="card-header p-0 collapse multi-collapse" style="background-color: #F4F6F9;">

                    <div class="container row align-items-center mt-1 allposition" style="background-color: #F4F6F9;">
                        <div class="offset-1 col-5 mt-1" style="border: 1px dashed lightblue">
                            <form method="POST" id="director_information" enctype="multipart/form-data" action="{{route('addMediaScan', ['firmId'=> $firm->id ])}}">
                                @csrf
                                <input type="file" class="filepond filepond-input"  data-allow-reorder="true"
                                       data-max-file-size="4MB"
                                       name="director_information">
                                <input type="text" name="name_doc" value="director_information" hidden>
                            </form>
                        </div>
                        <div class="col-6 text-center">
                            <p class="message_maindocument d-none">We have verified that the files are tested and meet the requirements. Click "Upload to storage" to save them to the database.</p>
                            <p class="message_start">Select files to download before clicking on</p>
                            <button form="director_information" class="btn btn-primary align-item-center disabled upload-to-storage upload-maindocument"><span class="spinner-loading spinner-border spinner-border-sm d-none"></span>&nbsp;&nbsp;Upload to storage</button>
                        </div>
                    </div>

                    <div class="container col-md-12 mt-2 bg-white">
                        @if($director_information && $director_information->count())
                            <table class="table table-bordered  table-hover w-100 mt-4">
                                <th class="text-center">Name of file</th>
                                <th class="text-center">Image document</th>
                                <th class="text-center">Download document</th>
                                <th class="text-center">Date created</th>
                                <th class="text-center">Remove</th>

                                @php $mediaName = 'director_information' @endphp

                                @foreach($director_information as $di)
                                    <tr class="text-center">
                                        <td class="text-left">{{ $di->file_name }}</td>
                                        <td>
                                            <img class="thumb_pic"
                                                 src="{{ route('image.show.thumb',['mediaId'=>$di->id, 'firmId'=>$firm->id, $mediaName]) }}"
                                                 alt="Picture"
                                                 data-mediaid="{{$di->id}}"
                                                 data-firmId="{{$firm->id}}"
                                                 data-mediaName="{{$mediaName}}">
                                        </td>
                                        <td><a href="{{route('image.download_file',['mediaId'=>$di->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>


                                        <td>{{ $di->created_at->format('d.m.Y') }}</td>
                                        @if(!$di->verified)
                                            <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$di->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
                                        @else
                                            <td class="text-center" data-toggle="tooltip"  title = "Verified by admin" style="font-size: 12px;color: darkgray;">indelible</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div> {{--  director_information  di --}}

            <div class="container-fluid mt-1 pl-4 pr-4">
                <div class="bg-white p-0 shadow rounded">
                    <button class="btn btn-link btn-block text-left border-bottom " type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                        <span style="font-weight: bold;">Resolutions</span>
                    </button>
                </div>
                <div id="collapse5" class="card-header p-0 collapse multi-collapse" style="background-color: #F4F6F9;">

                    <div class="container row align-items-center mt-1 allposition" style="background-color: #F4F6F9;">
                        <div class="offset-1 col-5 mt-1" style="border: 1px dashed lightblue">
                            <form method="POST" id="resolutions" enctype="multipart/form-data" action="{{route('addMediaScan', ['firmId'=> $firm->id ])}}">
                                @csrf
                                <input type="file" class="filepond filepond-input"  data-allow-reorder="true"
                                       data-max-file-size="4MB"
                                       name="resolutions">
                                <input type="text" name="name_doc" value="resolutions" hidden>
                            </form>
                        </div>
                        <div class="col-6 text-center">
                            <p class="message_maindocument d-none">We have verified that the files are tested and meet the requirements. Click "Upload to storage" to save them to the database.</p>
                            <p class="message_start">Select files to download before clicking on</p>
                            <button form="resolutions" class="btn btn-primary align-item-center disabled upload-to-storage upload-maindocument"><span class="spinner-loading spinner-border spinner-border-sm d-none"></span>&nbsp;&nbsp;Upload to storage</button>
                        </div>
                    </div>

                    <div class="container col-md-12 mt-2 bg-white">
                        @if($resolutions && $resolutions->count())
                            <table class="table table-bordered  table-hover w-100 mt-4">
                                <th class="text-center">Name of file</th>
                                <th class="text-center">Image document</th>
                                <th class="text-center">Download document</th>
                                <th class="text-center">Date created</th>
                                <th class="text-center">Remove</th>

                                @php $mediaName = 'resolutions' @endphp

                                @foreach($resolutions as $rs)
                                    <tr class="text-center">
                                        <td class="text-left">{{ $rs->file_name }}</td>

                                        <td>
                                            <img class="thumb_pic"
                                                 src="{{ route('image.show.thumb',['mediaId'=>$rs->id, 'firmId'=>$firm->id, $mediaName]) }}"
                                                 alt="Picture"
                                                 data-mediaid="{{$rs->id}}"
                                                 data-firmId="{{$firm->id}}"
                                                 data-mediaName="{{$mediaName}}">
                                        </td>
                                        <td><a href="{{route('image.download_file',['mediaId'=>$rs->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>


                                        <td>{{ $rs->created_at->format('d.m.Y') }}</td>
                                        @if(!$rs->verified)
                                            <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$rs->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
                                        @else
                                            <td class="text-center" data-toggle="tooltip"  title = "Verified by admin" style="font-size: 12px;color: darkgray;">indelible</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div> {{--  resolutions  rs --}}

            <div class="container-fluid mt-1 pl-4 pr-4">
                <div class="bg-white p-0 shadow rounded">
                    <button class="btn btn-link btn-block text-left border-bottom " type="button" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                        <span style="font-weight: bold;">Articles amalgamation</span>
                    </button>
                </div>
                <div id="collapse6" class="card-header p-0 collapse multi-collapse" style="background-color: #F4F6F9;">

                    <div class="container row align-items-center mt-1 allposition" style="background-color: #F4F6F9;">
                        <div class="offset-1 col-5 mt-1" style="border: 1px dashed lightblue">
                            <form method="POST" id="articles_amalgamation" enctype="multipart/form-data" action="{{route('addMediaScan', ['firmId'=> $firm->id ])}}">
                                @csrf
                                <input type="file" class="filepond filepond-input"  data-allow-reorder="true"
                                       data-max-file-size="4MB"
                                       name="articles_amalgamation">
                                <input type="text" name="name_doc" value="articles_amalgamation" hidden>
                            </form>
                        </div>
                        <div class="col-6 text-center">
                            <p class="message_maindocument d-none">We have verified that the files are tested and meet the requirements. Click "Upload to storage" to save them to the database.</p>
                            <p class="message_start">Select files to download before clicking on</p>
                            <button form="articles_amalgamation" class="btn btn-primary align-item-center disabled upload-to-storage upload-maindocument"><span class="spinner-loading spinner-border spinner-border-sm d-none"></span>&nbsp;&nbsp;Upload to storage</button>
                        </div>
                    </div>

                    <div class="container col-md-12 mt-2 bg-white">
                        @if($articles_amalgamation && $articles_amalgamation->count())
                            <table class="table table-bordered  table-hover w-100 mt-4">
                                <th class="text-center">Name of file</th>
                                <th class="text-center">Image document</th>
                                <th class="text-center">Download document</th>
                                <th class="text-center">Date created</th>
                                <th class="text-center">Remove</th>

                                @php $mediaName = 'articles_amalgamation' @endphp

                                @foreach($articles_amalgamation as $aa)
                                    <tr class="text-center">
                                        <td class="text-left">{{ $aa->file_name }}</td>

                                        <td>
                                            <img class="thumb_pic"
                                                 src="{{ route('image.show.thumb',['mediaId'=>$aa->id, 'firmId'=>$firm->id, $mediaName]) }}"
                                                 alt="Picture"
                                                 data-mediaid="{{$aa->id}}"
                                                 data-firmId="{{$firm->id}}"
                                                 data-mediaName="{{$mediaName}}">
                                        </td>
                                        <td><a href="{{route('image.download_file',['mediaId'=>$aa->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>


                                        <td>{{ $aa->created_at->format('d.m.Y') }}</td>
                                        @if(!$aa->verified)
                                            <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$aa->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
                                        @else
                                            <td class="text-center" data-toggle="tooltip"  title = "Verified by admin" style="font-size: 12px;color: darkgray;">indelible</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div> {{--  articles_amalgamation  aa --}}

            <div class="container-fluid mt-1 pl-4 pr-4">
                <div class="bg-white p-0 shadow rounded">
                    <button class="btn btn-link btn-block text-left border-bottom " type="button" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                        <span style="font-weight: bold;">Notice change address</span>
                    </button>
                </div>
                <div id="collapse7" class="card-header p-0 collapse multi-collapse" style="background-color: #F4F6F9;">

                    <div class="container row align-items-center mt-1 allposition" style="background-color: #F4F6F9;">
                        <div class="offset-1 col-5 mt-1" style="border: 1px dashed lightblue">
                            <form method="POST" id="notice_change_address" enctype="multipart/form-data" action="{{route('addMediaScan', ['firmId'=> $firm->id ])}}">
                                @csrf
                                <input type="file" class="filepond filepond-input"  data-allow-reorder="true"
                                       data-max-file-size="4MB"
                                       name="notice_change_address">
                                <input type="text" name="name_doc" value="notice_change_address" hidden>
                            </form>
                        </div>
                        <div class="col-6 text-center">
                            <p class="message_maindocument d-none">We have verified that the files are tested and meet the requirements. Click "Upload to storage" to save them to the database.</p>
                            <p class="message_start">Select files to download before clicking on</p>
                            <button form="notice_change_address" class="btn btn-primary align-item-center disabled upload-to-storage upload-maindocument"><span class="spinner-loading spinner-border spinner-border-sm d-none"></span>&nbsp;&nbsp;Upload to storage</button>
                        </div>
                    </div>

                    <div class="container col-md-12 mt-2 bg-white">
                        @if($notice_change_address && $notice_change_address->count())
                            <table class="table table-bordered  table-hover w-100 mt-4">
                                <th class="text-center">Name of file</th>
                                <th class="text-center">Image document</th>
                                <th class="text-center">Download document</th>
                                <th class="text-center">Date created</th>
                                <th class="text-center">Remove</th>

                                @php $mediaName = 'notice_change_address' @endphp

                                @foreach($notice_change_address as $nc)
                                    <tr class="text-center">
                                        <td class="text-left">{{ $nc->file_name }}</td>

                                        <td>
                                            <img class="thumb_pic"
                                                 src="{{ route('image.show.thumb',['mediaId'=>$nc->id, 'firmId'=>$firm->id, $mediaName]) }}"
                                                 alt="Picture"
                                                 data-mediaid="{{$nc->id}}"
                                                 data-firmId="{{$firm->id}}"
                                                 data-mediaName="{{$mediaName}}">
                                        </td>
                                        <td><a href="{{route('image.download_file',['mediaId'=>$nc->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>

                                        <td>{{ $nc->created_at->format('d.m.Y') }}</td>
                                        @if(!$nc->verified)
                                            <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$nc->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
                                        @else
                                            <td class="text-center" data-toggle="tooltip"  title = "Verified by admin" style="font-size: 12px;color: darkgray;">indelible</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div> {{--  notice_change_address  nc --}}

            <div class="container-fluid mt-1 pl-4 pr-4">
                <div class="bg-white p-0 shadow rounded">
                    <button class="btn btn-link btn-block text-left border-bottom " type="button" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                        <span style="font-weight: bold;">Last t2</span>
                    </button>
                </div>
                <div id="collapse8" class="card-header p-0 collapse multi-collapse" style="background-color: #F4F6F9;">

                    <div class="container row align-items-center mt-1 allposition" style="background-color: #F4F6F9;">
                        <div class="offset-1 col-5 mt-1" style="border: 1px dashed lightblue">
                            <form method="POST" id="last_t2" enctype="multipart/form-data" action="{{route('addMediaScan', ['firmId'=> $firm->id ])}}">
                                @csrf
                                <input type="file" class="filepond filepond-input" data-allow-reorder="true"
                                       data-max-file-size="4MB"
                                       name="last_t2">
                                <input type="text" name="name_doc" value="last_t2" hidden>
                            </form>
                        </div>
                        <div class="col-6 text-center">
                            <p class="message_maindocument d-none">We have verified that the files are tested and meet the requirements. Click "Upload to storage" to save them to the database.</p>
                            <p class="message_start">Select files to download before clicking on</p>
                            <button form="last_t2" class="btn btn-primary align-item-center disabled upload-to-storage upload-maindocument"><span class="spinner-loading spinner-border spinner-border-sm d-none"></span>&nbsp;&nbsp;Upload to storage</button>
                        </div>
                    </div>
                    <div class="container col-md-12 mt-2 bg-white">
                        @if($last_t2 && $last_t2->count())
                            <table class="table table-bordered  table-hover w-100 mt-4">
                                <th class="text-center">Name of file</th>
                                <th class="text-center">Image document</th>
                                <th class="text-center">Download document</th>
                                <th class="text-center">Date created</th>
                                <th class="text-center">Remove</th>

                                @php $mediaName = 'last_t2' @endphp

                                @foreach($last_t2 as $lt)
                                    <tr class="text-center">
                                        <td class="text-left">{{ $lt->file_name }}</td>

                                        <td>
                                            <img class="thumb_pic"
                                                 src="{{ route('image.show.thumb',['mediaId'=>$lt->id, 'firmId'=>$firm->id, $mediaName]) }}"
                                                 alt="Picture"
                                                 data-mediaid="{{$lt->id}}"
                                                 data-firmId="{{$firm->id}}"
                                                 data-mediaName="{{$mediaName}}">
                                        </td>
                                        <td><a href="{{route('image.download_file',['mediaId'=>$lt->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>

                                        <td>{{ $lt->created_at->format('d.m.Y') }}</td>
                                        @if(!$lt->verified)
                                            <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$lt->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
                                        @else
                                            <td class="text-center" data-toggle="tooltip"  title = "Verified by admin" style="font-size: 12px;color: darkgray;">indelible</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div> {{--  last_t2  lt --}}

        </div>
    </section>

@endsection

@section('scripts')
    <script src="{{asset('assets/admin/js/jquery.fancybox.min.js')}}"></script>
    <script>

        document.addEventListener('DOMContentLoaded', function () {

                $('#allPosition').click(function () {
                     $('#viewAllPosition').fadeToggle();

                });

                $('.remove_image, .upload-to-storage').click(function () {
                    $('.spinner-loading').removeClass('d-none');
                });

                // ------------------------------FilePond Lib ------------------------------------------------

                FilePond.registerPlugin(
                    FilePondPluginImagePreview,
                    FilePondPluginFileValidateSize,
                );

                const inputElements = document.querySelectorAll('.filepond-input');

                Array.from(inputElements).forEach(inputElement => {
                    FilePond.create(inputElement)
                });

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
                    // instantUpload: true,
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
            },
        );


        $(".thumb_pic").on('click', function () {

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

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })


    </script>
@endsection
