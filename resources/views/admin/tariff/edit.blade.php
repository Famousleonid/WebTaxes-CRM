@extends('admin.master')

@section('content')

    <section class="content-header">
        <div class="container firm-border p-3 bg-white shadow">

            <div class="row">
                <div class="col-sm-6">
                    <h4 class="card-title">Editing a tariff "{{$tariff->name}}"</h4>
                </div>
            </div>

            <form role="form" method="post" action="{{route('tariff.update',['tariff' => $tariff->id, 'add'=>'1'])}}">
                @csrf
                @method('PUT')

                <div class="card-footer row">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary"> Save</button>
                    </div>
                    <div class="col-md-2 ml-auto">
                        <a href="{{ URL::previous() }}" class="btn btn-info btn-block">Return</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">

                        <label class="col-sm-1 col-form-label">Name</label>
                        <div class="col-sm-11">
                            <div class="col-sm-11 form-group">
                                <input type="text" name="name" disabled class="form-control @error('name') is-invalid @enderror" value="{{$tariff->name}}">
                                <input type="text" name="name" hidden value="{{$tariff->name}}">
                            </div>
                        </div>
                        <label class="col-sm-1 col-form-label ">Price $</label>
                        <div class="col-sm-11 form-group"><input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{$tariff->price}}"></div>
                        <label class="col-sm-4 col-form-label">Description (remark only for myself)</label>
                        <div class="col-sm-8"><input type="text" name="description" class="form-control"></div>
                        <div class="col-sm-8"><br><label style="color:blue;"><input type="checkbox" name="visible" value="1" @if($tariff->visible) checked @endif"> Visible</label></div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Content</label>
                        <div class="col-sm-10"><input type="text" name="row1" class="form-control" placeholder="-" value="{{$tariff->row1}}"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row2" class="form-control" placeholder="-" value="{{$tariff->row2}}"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row3" class="form-control" placeholder="-" value="{{$tariff->row3}}"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row4" class="form-control" placeholder="-" value="{{$tariff->row4}}"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row5" class="form-control" placeholder="-" value="{{$tariff->row5}}"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row6" class="form-control" placeholder="-" value="{{$tariff->row6}}"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row7" class="form-control" placeholder="-" value="{{$tariff->row7}}"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row8" class="form-control" placeholder="-" value="{{$tariff->row8}}"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row9" class="form-control" placeholder="-" value="{{$tariff->row9}}"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row10" class="form-control" placeholder="-" value="{{$tariff->row10}}"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row11" class="form-control" placeholder="-" value="{{$tariff->row11}}"></div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div><!-- /.container-fluid -->
    </section>

@endsection


