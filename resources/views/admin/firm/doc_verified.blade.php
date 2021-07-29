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

        <div class="row m-3">
            <div class="col-7">
                <h5 style="color: #007BFF;"> Company: {{$firm->company_name}}</h5>
            </div>
            <div class="col-2 ml-auto">
                <a href="{{route('firm.index')}}" class="btn btn-info ">return</a>
            </div>
        </div>

        <div id="viewAllPosition" >

            <table class="table table-bordered  table-hover w-100 mt-4">
                <thead>

                <th>Name</th>
                <th class="text-center">pic</th>
                <th class="text-center">veryfied</th>
                <th class="text-center">download</th>
                <th class="text-center">created</th>
                <th class="text-center">remove</th>

                </thead>
                <tbody>
                <tr>
                    <td colspan="6" class="bg-gradient-info"><span style="font-weight: bold;">Articles incorporation</span></td>
                </tr>
                @if($articles_incorporation && $articles_incorporation->count())
                    @php $mediaName = 'articles_incorporation' @endphp
                    @foreach($articles_incorporation as $ai)
                        <tr class="text-center">
                            <td class="text-left">{{ $ai->file_name }}</td>
                            <td><img class="thumb_pic"
                                     src="{{ route('image.show.thumb', ['mediaId'=>$ai->id, 'firmId'=>$firm->id, $mediaName]) }}"
                                     alt="Picture"
                                     data-mediaid="{{$ai->id}}"
                                     data-firmId="{{$firm->id}}"
                                     data-mediaName="{{$mediaName}}">
                            </td>

                            @if($ai->verified)
                                <td class="text-center">
                                    <a href="{{route('image.verified',['mediaId'=>$ai->id])}}">
                                        <img src="{{asset('img/ok.png')}}" width="30px" alt="">
                                    </a>
                                </td>
                            @else
                                <td class="text-center"><a href="{{route('image.verified',['mediaId'=>$ai->id])}}">
                                        <img src="{{asset('img/icon_no.png')}}" width="15px" alt="">
                                    </a>
                                </td>
                            @endif

                            <td><a href="{{route('image.download_file',['mediaId'=>$ai->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>
                            <td>{{ $ai->created_at->format('d.m.Y') }}</td>
                            @if(!$ai->verified)
                                <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$ai->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
                            @else
                                <td class="text-center" style="font-size: 12px;color: darkgray;">indelible</td>
                            @endif
                        </tr>
                    @endforeach
                @endif
                <tr>
                    <td colspan="6" class="bg-gradient-info"><span style="font-weight: bold;">Business number registration</span></td>
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

                            @if($bn->verified)
                                <td class="text-center">
                                    <a href="{{route('image.verified',['mediaId'=>$bn->id])}}">
                                        <img src="{{asset('img/ok.png')}}" width="30px" alt="">
                                    </a>
                                </td>
                            @else
                                <td class="text-center"><a href="{{route('image.verified',['mediaId'=>$bn->id])}}">
                                        <img src="{{asset('img/icon_no.png')}}" width="15px" alt="">
                                    </a>
                                </td>
                            @endif

                            <td><a href="{{route('image.download_file',['mediaId'=>$bn->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>
                            <td>{{ $bn->created_at->format('d.m.Y') }}</td>
                            @if(!$bn->verified)
                                <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$bn->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
                            @else
                                <td class="text-center" style="font-size: 12px;color: darkgray;">indelible</td>
                            @endif
                        </tr>
                    @endforeach
                @endif
                <tr>
                    <td colspan="6" class="bg-gradient-info"><span style="font-weight: bold;">Shareholders</span></td>
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

                            @if($sh->verified)
                                <td class="text-center">
                                    <a href="{{route('image.verified',['mediaId'=>$sh->id])}}">
                                        <img src="{{asset('img/ok.png')}}" width="30px" alt="">
                                    </a>
                                </td>
                            @else
                                <td class="text-center"><a href="{{route('image.verified',['mediaId'=>$sh->id])}}">
                                        <img src="{{asset('img/icon_no.png')}}" width="15px" alt="">
                                    </a>
                                </td>
                            @endif

                            <td><a href="{{route('image.download_file',['mediaId'=>$sh->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>

                            <td>{{ $sh->created_at->format('d.m.Y') }}</td>
                            @if(!$sh->verified)
                                <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$sh->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
                            @else
                                <td class="text-center" style="font-size: 12px;color: darkgray;">indelible</td>
                            @endif
                        </tr>
                    @endforeach
                @endif
                <tr>
                    <td colspan="6" class="bg-gradient-info"><span style="font-weight: bold;">Director information</span></td>
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

                            @if($di->verified)
                                <td class="text-center">
                                    <a href="{{route('image.verified',['mediaId'=>$di->id])}}">
                                        <img src="{{asset('img/ok.png')}}" width="30px" alt="">
                                    </a>
                                </td>
                            @else
                                <td class="text-center"><a href="{{route('image.verified',['mediaId'=>$di->id])}}">
                                        <img src="{{asset('img/icon_no.png')}}" width="15px" alt="">
                                    </a>
                                </td>
                            @endif

                            <td><a href="{{route('image.download_file',['mediaId'=>$di->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>
                            <td>{{ $di->created_at->format('d.m.Y') }}</td>
                            @if(!$di->verified)
                                <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$di->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
                            @else
                                <td class="text-center" style="font-size: 12px;color: darkgray;">indelible</td>
                            @endif
                        </tr>
                    @endforeach
                @endif
                <tr>
                    <td colspan="6" class="bg-gradient-info"><span style="font-weight: bold;">Resolutions</span></td>
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

                            @if($rs->verified)
                                <td class="text-center">
                                    <a href="{{route('image.verified',['mediaId'=>$rs->id])}}">
                                        <img src="{{asset('img/ok.png')}}" width="30px" alt="">
                                    </a>
                                </td>
                            @else
                                <td class="text-center"><a href="{{route('image.verified',['mediaId'=>$rs->id])}}">
                                        <img src="{{asset('img/icon_no.png')}}" width="15px" alt="">
                                    </a>
                                </td>
                            @endif

                            <td><a href="{{route('image.download_file',['mediaId'=>$rs->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>
                            <td>{{ $rs->created_at->format('d.m.Y') }}</td>
                            @if(!$rs->verified)
                                <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$rs->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
                            @else
                                <td class="text-center" style="font-size: 12px;color: darkgray;">indelible</td>
                            @endif
                        </tr>
                    @endforeach
                @endif
                <tr>
                    <td colspan="6" class="bg-gradient-info"><span style="font-weight: bold;">Articles amalgamation</span></td>
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

                            @if($aa->verified)
                                <td class="text-center">
                                    <a href="{{route('image.verified',['mediaId'=>$aa->id])}}">
                                        <img src="{{asset('img/ok.png')}}" width="30px" alt="">
                                    </a>
                                </td>
                            @else
                                <td class="text-center"><a href="{{route('image.verified',['mediaId'=>$aa->id])}}">
                                        <img src="{{asset('img/icon_no.png')}}" width="15px" alt="">
                                    </a>
                                </td>
                            @endif

                            <td><a href="{{route('image.download_file',['mediaId'=>$aa->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>
                            <td>{{ $aa->created_at->format('d.m.Y') }}</td>
                            @if(!$aa->verified)
                                <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$aa->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
                            @else
                                <td class="text-center" style="font-size: 12px;color: darkgray;">indelible</td>
                            @endif
                        </tr>
                    @endforeach
                @endif
                <tr>
                    <td colspan="6" class="bg-gradient-info"><span style="font-weight: bold;">Notice change address</span></td>
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

                            @if($nc->verified)
                                <td class="text-center">
                                    <a href="{{route('image.verified',['mediaId'=>$nc->id])}}">
                                        <img src="{{asset('img/ok.png')}}" width="30px" alt="">
                                    </a>
                                </td>
                            @else
                                <td class="text-center"><a href="{{route('image.verified',['mediaId'=>$nc->id])}}">
                                        <img src="{{asset('img/icon_no.png')}}" width="15px" alt="">
                                    </a>
                                </td>
                            @endif

                            <td><a href="{{route('image.download_file',['mediaId'=>$nc->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>
                            <td>{{ $nc->created_at->format('d.m.Y') }}</td>
                            @if(!$nc->verified)
                                <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$nc->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
                            @else
                                <td class="text-center" style="font-size: 12px;color: darkgray;">indelible</td>
                            @endif
                        </tr>
                    @endforeach
                @endif
                <tr>
                    <td colspan="6" class="bg-gradient-info"><span style="font-weight: bold;">Last t2</span></td>
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

                            @if($lt->verified)
                                <td class="text-center">
                                    <a href="{{route('image.verified',['mediaId'=>$lt->id])}}">
                                        <img src="{{asset('img/ok.png')}}" width="30px" alt="">
                                    </a>
                                </td>
                            @else
                                <td class="text-center"><a href="{{route('image.verified',['mediaId'=>$lt->id])}}">
                                        <img src="{{asset('img/icon_no.png')}}" width="15px" alt="">
                                    </a>
                                </td>
                            @endif

                            <td><a href="{{route('image.download_file',['mediaId'=>$lt->id, 'firmId'=>$firm->id, 'mediaName'=>$mediaName])}}" download>Download</a></td>
                            <td>{{ $lt->created_at->format('d.m.Y') }}</td>
                            @if(!$lt->verified)
                                <td><a href="{{ route('mediaDelete',['firmId'=>$firm->id,'mediaId'=>$lt->id]) }}" class="btn btn-link remove_image" style="font-size: 12px;">Remove</a></td>
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

