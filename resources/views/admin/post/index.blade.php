@extends('admin.master')

@section('content')

    <div class="container firm-border shadow mt-3 p-0">

        <div class="card">
            <div class="card-header ">

                <h4 class="card-title text-bold">List of articles ( {{count($posts) }} items )</h4>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">

                <!-------------------------------------/.card-body---------------------------------------------------------------------------------->

                <div class="box-body table-responsive">

                    @if(count($posts))

                        <table class="table table-bordered table-hover ">

                            <tbody>
                            <tr>
                                <th>Name</th>
                                <th class="text-center">Visible</th>
                                <th class="text-center">date of created</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delete</th>
                            </tr>

                            @foreach ($posts as $post)
                                <tr>

                                    <td>{{$post->title}}</td>
                                    <td class="text-center">@if($post->visible)   <i class="far fa-eye  nav-icon"> @endif</td>
                                    <td class="text-center">{{$post->created_at->format('d.m.Y')}}</td>

                                    <td class="text-center">
                                        <a href="{{route('post.edit', ['post' => $post->id]) }}"><img src="{{asset('img/set.png')}}" width="30" alt=""></a>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{route('post.destroy', ['post' => $post->id])}}" method="post" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirm delete?')">
                                                <i class="glyphicon glyphicon-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    @else
                        <p>No posts created</p>
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection


