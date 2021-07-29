@extends('admin.master')

@section('content')

    <section class="container">

        <div class="card firm-border bg-white p-3 shadow mt-3">

            <div class="card-header">

                <h3 class="card-title text-bold">List tariff ({{count($tariffs)}} items)</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>

            </div>

            <div class="card-body">
                <div class="box-body table-responsive">

                    @if(count($tariffs))

                        <table class="table table-bordered table-striped table-hover text-nowrap">

                            <tbody>
                            <tr>
                                <th class="text-center">№</th>
                                <th>Name</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">visible</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Add copy</th>
                                <th class="text-center">date of creation</th>
                                <th class="text-center">Delete</th>
                            </tr>


                            @foreach ($tariffs as $tariff)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>{{$tariff->name}}</td>
                                    <td class="text-center">{{$tariff->price}}</td>
                                    <td style="white-space: pre-wrap">{{$tariff->description}}</td>
                                    <td class="text-center">@if($tariff->visible)   <i class="far fa-eye  nav-icon"> @endif</td>
                                    <td class="text-center"><a href="{{route('tariff.edit', ['tariff' => $tariff->id, 'add'=>'0']) }}"><img src="{{asset('img/set.png')}}" width="30" alt=""></a></td>
                                    <td class="text-center"><a href="{{route('tariff.edit', ['tariff' => $tariff->id, 'add'=>'1']) }}"><img src="{{asset('img/plus.png')}}" width="30" alt=""></a></td>
                                    <td class="text-center">{{$tariff->created_at->format('d.m.Y')}}</td>
                                    <td class="text-center">
                                        <form action="{{route('tariff.destroy', ['tariff' => $tariff->id])}}"
                                              method="post" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Confirm delete')">
                                                <i class="glyphicon glyphicon-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                    @else
                        <p>Tariffs not created</p>
                        <a href="{{route('tariff.create')}}" class="btn btn-info btn-sm float-left mr-1"><i
                                class="fas fa-plus"></i></a>
                    @endif

                </div>
            </div>

        </div>

    </section>
@endsection

