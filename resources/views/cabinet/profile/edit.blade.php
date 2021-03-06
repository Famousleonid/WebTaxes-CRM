@extends('cabinet.master')

@section('link')

    <style>
        .view_tariff:hover {
            cursor: pointer;
        }
        .modal-dialog{
            min-width: 50%;
        }
    </style>

@endsection

@section('content')

    {{------------------------------------ View tariff -- modal --------------------}}
    <div class="modal fade" id="modalTariff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modalTariff-body p-5" ></div>
            </div>
        </div>
    </div>
    {{--------------------------------------------------------------------------------}}


    <div class="container">
        <div class="card shadow firm-border mt-2">
            <div>
                <ul class="nav nav-tabs" style="background-color: #F4F6F9; border-right: none;">
                    <li class="nav-item"><a class="nav-link active" href="#create_firms" data-toggle="tab">Company editing</a></li>
                    <li class="nav-item"><a class="nav-link" href="#create_scan_firm" data-toggle="tab">Helper</a></li>
                </ul>
                <div class="card-body pt-0">
                    <div class="tab-content">
                        <div class="active tab-pane" id="create_firms">
                            <form id="change_edit_form" role="form" method="post" action="{{route('firms.update',['firm' => $firm->id])}}">
                                @csrf
                                @method('PUT')
                                <div class="col-md-12">
                                    <div class="card-header">
                                        <h3 class="card-title text-info font-weight-bold">Edit company</h3>
                                        @if($firm->verified)
                                            <span style="color:green;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;After verification by the administrator, some fields cannot be changed</span>
                                        @endif
                                    </div>
                                    <div class="card-body row" id="create_div_inputs">            {{--    style="background-color: #F4F6F9;"--}}
                                        <div class="form-group col-md-7 mb-1">
                                            <label for="company_name">Company Name (required)</label>
                                            @if($firm->verified)
                                                <input style="color:green;" disabled type="text" name="company_name" class="form-control" value="{{$firm->company_name}}">
                                                <input style="color:green;" hidden type="text" name="company_name" class="form-control" value="{{$firm->company_name}}">
                                            @else
                                                <input type="text" name="company_name" id="company_name" class="form-control @error('company_name') is-invalid @enderror" placeholder="Enter Company name " value="{{$firm->company_name}}">
                                            @endif

                                        </div>
                                        <div class="form-group col-md-4 mb-1">
                                            <label for="business_number">Business Number (required)</label>
                                            @if($firm->verified)
                                                <input style="color:green;" disabled type="text" name="business_number" class="form-control" value="{{$firm->business_number}}">
                                                <input style="color:green;" hidden type="text" name="business_number" class="form-control" value="{{$firm->business_number}}">
                                            @else
                                                <input type="text" name="business_number" id="business_number" maxlength="15" class="form-control @error('business_number') is-invalid @enderror" placeholder="999999999RC0001" value="{{$firm->business_number}}">
                                            @endif
                                        </div>
                                        <div class="form-group col-md-12 mb-2">
                                            <small>Main business activity</small>
                                            <input type="text" name="main_business_activity" id="main_business_activity" maxlength="15" class="form-control @error('main_business_activity') is-invalid @enderror" placeholder="" value="{{$firm->main_business_activity}}">
                                        </div>

                                        <div class=" col-12 border mb-2 border-info rounded">
                                            <div class="card-header p-1">
                                                <h3 class="card-title text-info">Director</h3>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <small class="form-text text-muted">First name</small>
                                                    <input type="text" name="director_first_name" id="director_first_name" class="form-control @error('director_first_name') is-invalid @enderror" placeholder="first name" value="{{$firm->director_first_name}}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <small class="form-text text-muted">Last name</small>
                                                    <input type="text" name="director_last_name" id="director_last_name" class="form-control @error('director_last_name') is-invalid @enderror" placeholder="last name" value="{{$firm->director_last_name}}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <small class="form-text text-muted">Email</small>
                                                    <input type="text" name="director_email" id="director_email" class="form-control @error('director_email') is-invalid @enderror" placeholder="email" value="{{$firm->director_email}}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <small class="form-text text-bold">Phone (required)</small>
                                                    <input type="text" name="director_phone" data-tel-input id="director_phone" maxlength="15" class="form-control @error('director_phone') is-invalid @enderror" placeholder="phone" value="{{$firm->director_phone}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" col-12 border border-info rounded">
                                            <div class="card-header row p-1">
                                                <div class="col-md-4 ">
                                                    <h3 class="card-title text-info">The contact person</h3>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <small class="form-text text-muted">First name</small>
                                                    <input type="text" name="contact_first_name" id="contact_first_name" class="form-control @error('contact_first_name') is-invalid @enderror" placeholder="first name" value="{{$firm->contact_first_name}}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <small class="form-text text-muted">Last name</small>
                                                    <input type="text" name="contact_last_name" id="contact_last_name" class="form-control @error('contact_last_name') is-invalid @enderror" placeholder="last name" value="{{$firm->contact_last_name}}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <small class="form-text text-muted">Email</small>
                                                    <input type="text" name="contact_email" id="contact_email" class="form-control @error('contact_email') is-invalid @enderror" placeholder="email" value="{{$firm->contact_email}}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <small class="form-text text-muted">Phone</small>
                                                    <input type="text" name="contact_phone" data-tel-input id="contact_phone" maxlength="15" class="form-control @error('contact_phone') is-invalid @enderror" placeholder="phone" value="{{$firm->contact_phone}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12 row">

                                            @if(!$firm->verified)
                                                <div class="col-md-2"><label class="col-form-label">Tariff (required)</label></div>
                                                <div class="col-md-3"><a href="{{route('price')}}" id="change_current_tariff" class="nav-link view_tariff">change current tariff</a></div>
                                            @else
                                                <div class="col-md-2"><label class="col-form-label" style="color:green;">Tariff is verified</label></div>
                                                <div class="col-md-3"><span class="nav-link" style="color:green;">cannot be changed</span></div>
                                            @endif

                                            <div id="NameTariffDiv" class="col-md-5 col-form-label"></div>
                                            <div class="col-2"><span id="view_current_tariff" class="nav-link view_tariff" data-toggle="modal" data-target="#modalTariff" style="color:#007BFF;">view tariff</span></div>

                                        </div>

                                        <input type="text" hidden name="tariff_id" id="tariff_id" value="{{$firm->tariff_id}}">
                                        <input type="text" hidden name="user_id" id="user_id" value="{{$user->id}}">
                                        <input type="text" hidden name="tariff_json" id="tariff_json">

                                        <div class="form-group container">
                                            <div class="card-body col-md-11">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <button type="submit" class="btn btn-primary btn-block ">Save</button>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="{{route('profile')}}" class="btn btn-info btn-block">Return</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="create_scan_firm">
                            <div class="card-header p-3 mt-3 mb-3">
                                <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To add/edit additional files (such as scans of constituent documents), </h4>
                                <h4>use the "Profile" menu item where and select the required company.</h4>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @endsection

        @section('scripts')

            <script type="text/javascript" src="{{asset('assets/js/view-table-tarif.js')}}"></script>
            {{--    <script src="{{asset('js/jquery.maskedinput.min.js')}}"></script>--}}

            <script>

                // ???????????????????? ?? ???????????? ?????????????????? ?? ???????????????? input -------------------------------------------------------------
                document.addEventListener("DOMContentLoaded", function () {

                    const form = document.getElementById('change_edit_form');
                    const formFields = form.elements;

                    formFields.forEach(function (e) {

                        if (window.sessionStorage.getItem(e.name)) e.value = window.sessionStorage.getItem(e.name, e.value);

                        e.addEventListener('input', function () {
                            window.sessionStorage.setItem(e.name, e.value);
                        })
                    });
                    // -------------------------------------------------------------


                    $('#view_current_tariff').click(function () {
                        $('.div_tariff').show('100');
                        $('.fon_modal_tariff').show('fast');
                    });

                    $(document).mouseup(function (e) {  // ?????????????? ?????????? ???? ??????-??????????????????
                        let div = $(".div_tariff");
                        let fon = $('.fon_modal_tariff');
                        if (!div.is(e.target) && div.has(e.target).length === 0) { // ?? ???? ???? ?????? ???????????????? ??????????????????
                            div.hide();
                            fon.hide();
                        }
                    });

                    // $('input[data-tel-input]').mask("999-999-9999");

                    $('#change_current_tariff').click(function () {
                        sessionStorage.setItem('select_tariff', 'edit');
                    });

                    document.getElementById("NameTariffDiv").innerText = "";

                    let MainTariff = "";
                    let url = '{{ url()->previous() }}';

                    if (url.includes("profile")) {
                        MainTariff = JSON.parse(@json($firm->tariff_json));
                    } else {
                        MainTariff = JSON.parse(decrypt(localStorage.getItem('MainUser')));
                    }

                    if (MainTariff) {
                        document.getElementById("NameTariffDiv").innerHTML = "<span style='text-indent: 5px;'>&nbsp;&nbsp;selected tariff: &nbsp;&nbsp;</span><b>" + MainTariff.iPrice + "<span style='text-indent: 30px;'>&nbsp;&nbsp;&nbsp; $</span>" + MainTariff.price_tax + "</b>";
                        document.getElementById("tariff_id").value = MainTariff.id;
                        Json_field = JSON.stringify(MainTariff);
                        document.getElementById("tariff_json").value = Json_field;
                    }

                    // viewPrice(Json_field, '.div_tariff');
                    viewPrice(MainTariff, '.modalTariff-body');

                });

            </script>

@endsection
