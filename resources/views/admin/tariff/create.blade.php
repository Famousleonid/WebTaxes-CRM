@extends('admin.master')

@section('content')

    <section class="content-header">
        <div class="container firm-border p-3 bg-white shadow">

            <div class="row">
                <div class="col-sm-6">
                    <h4>Create tariff page</h4>
                </div>
            </div>

            <form role="form" method="post" action="{{route('tariff.store')}}">
                @csrf

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
                        <div class="col-sm-11 form-group">
                            <select  required name="name" class="form-control @error('name') is-invalid @enderror">
                                <option disabled selected >Select Tariff name</option>
                                <option value="Light">Light</option>
                                <option value="Base">Base</option>
                                <option value="Advanced">Advanced</option>
                            </select>
                        </div>

                        <label class="col-sm-1 col-form-label">Price $</label>
                        <div class="col-sm-11 form-group"><input type="number" name="price" class="form-control @error('price') is-invalid @enderror"></div>

                        <label class="col-sm-4 col-form-label">Description (remark only for myself)</label>
                        <div class="col-sm-8"><input type="text" name="description" class="form-control"></div>

                        <div class="col-sm-8"><br><label style="color:blue;"><input type="checkbox" name="visible" value="1"> Visible</label></div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Content</label>
                        <div class="col-sm-10"><input type="text" name="row1" class="form-control" placeholder="-"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row2" class="form-control" placeholder="-"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row3" class="form-control" placeholder="-"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row4" class="form-control" placeholder="-"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row5" class="form-control" placeholder="-"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row6" class="form-control" placeholder="-"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row7" class="form-control" placeholder="-"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row8" class="form-control" placeholder="-"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row9" class="form-control" placeholder="-"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row10" class="form-control" placeholder="-"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row11" class="form-control" placeholder="-"></div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </section>



@endsection

