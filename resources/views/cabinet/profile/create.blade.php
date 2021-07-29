@extends('cabinet.master')

@section('content')

    <div class="container">
        <div class="card  shadow firm-border">
            <div class="">


            <ul class="nav nav-tabs" style="background-color: #F4F6F9; border-right: none;">
                <li class="nav-item"><a class="nav-link active" href="#create_firms" data-toggle="tab">Create company</a></li>
                <li class="nav-item"><a class="nav-link" href="#create_scan_firm" data-toggle="tab">Helper</a></li>
            </ul>

            <div class="card-body pt-0">
                <form id="createForm" class="createForm" role="form" method="post" action="{{route('firms.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="tab-content">
                        <div class="active tab-pane" id="create_firms">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <h3 class="card-title text-info font-weight-bold">Create company</h3>
                                </div>

                                <div class="card-body row" id="create_div_inputs">
                                    <div class="form-group col-md-7 mb-1">
                                        <label for="company_name">Company Name (required)</label>
                                        <input type="text" name="company_name" id="company_name" class="form-control @error('company_name') is-invalid @enderror" placeholder="Enter Company name ">
                                    </div>
                                    <div class="form-group col-md-4 mb-1">
                                        <label for="business_number">Business Number (required)</label>
                                        <input type="text" name="business_number" id="business_number" maxlength="15" class="form-control @error('business_number') is-invalid @enderror" placeholder="999999999RC0001">
                                    </div>
                                    <div class="form-group col-md-12 mb-2">
                                        <small>Main business activity</small>
                                        <input type="text" name="main_business_activity" id="main_business_activity" maxlength="15" class="form-control @error('main_business_activity') is-invalid @enderror" placeholder="">
                                    </div>

                                    <div class=" col-12 border  mb-2 border-info rounded">
                                        <div class="card-header p-1">
                                            <h3 class="card-title text-info">Director</h3>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <small class="form-text text-muted">First name</small>
                                                <input type="text" name="director_first_name" id="director_first_name" class="form-control @error('director_first_name') is-invalid @enderror" placeholder="first name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <small class="form-text text-muted">Last name</small>
                                                <input type="text" name="director_last_name" id="director_last_name" class="form-control @error('director_last_name') is-invalid @enderror" placeholder="last name">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <small class="form-text text-muted">Email</small>
                                                <input type="text" name="director_email" id="director_email" class="form-control @error('director_email') is-invalid @enderror" placeholder="email">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <small class="form-text text-bold">Phone (required)</small>
                                                <input type="text" name="director_phone" data-tel-input id="director_phone" maxlength="15" class="form-control @error('director_phone') is-invalid @enderror" placeholder="phone">
                                            </div>
                                        </div>
                                    </div>

                                    <div class=" col-12 border border-info rounded">
                                        <div class="card-header row p-1">
                                            <div class="col-md-4">
                                                <h3 class="card-title text-info">The contact person</h3>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="checkbox" id="director_contact_same" name="copyFields"><span style='font-size: 12px;'>&nbsp;&nbsp;&nbsp; check the box if the director and contact person are the same</span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <small class="form-text text-muted">First name</small>
                                                <input type="text" name="contact_first_name" id="contact_first_name" class="form-control @error('contact_first_name') is-invalid @enderror" placeholder="first name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <small class="form-text text-muted">Last name</small>
                                                <input type="text" name="contact_last_name" id="contact_last_name" class="form-control @error('contact_last_name') is-invalid @enderror" placeholder="last name">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <small class="form-text text-muted">Email</small>
                                                <input type="text" name="contact_email" id="contact_email" class="form-control @error('contact_email') is-invalid @enderror" placeholder="email">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <small class="form-text text-muted">Phone</small>
                                                <input type="text" name="contact_phone" data-tel-input id="contact_phone" maxlength="15" class="form-control @error('contact_phone') is-invalid @enderror" placeholder="phone">
                                            </div>
                                        </div>
                                    </div>

                                    <div id="div_tariff" class="form-group col-md-12 row div_tariff">
                                        <div class="col-md-2"><label class="col-form-label">Tariff (required)</label></div>
                                        <div class="col-md-3"><a href="{{route('price')}}" class="nav-link" onclick=>Choose a tariff</a></div>
                                        <div id="NameTariffDiv" class="col-md-5 col-form-label"></div>
                                    </div>
                                    <input type="text" hidden name="tariff_id" id="tariff_id">
                                    <input type="text" hidden name="user_id" id="user_id" value="{{$user->id}}">
                                    <input type="text" hidden name="tariff_json" id="tariff_json">
                                    <div class="form-group container">
                                        <div class="card-body col-md-11">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <button id="ntSaveFormsSubmit" type="submit" class="btn btn-primary btn-block ntSaveFormsSubmit">Save</button>
                                                </div>
{{--                                                <div class="col-md-2">--}}
{{--                                                    <a href="{{ URL::previous() }}" class="btn btn-info btn-block">Return</a>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="create_scan_firm">
                            <div class="card-header p-3 mt-3 mb-3">
                                <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To add additional files (such as scans of constituent documents), </h4>
                                <h4>use the "Profile" menu item where and select the required company.</h4>
                            </div>
                            {{--                            @include('component.add-scan-doc')--}}
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection()

@section('scripts')

    <script src="{{asset('js/jquery.maskedinput.min.js')}}"></script>

    <script>

        // $('input[data-tel-input]').mask("999-999-9999");

        document.getElementById("NameTariffDiv").innerText = "";
        let MainTariff = JSON.parse(decrypt(localStorage.getItem('MainUser')));
        if (MainTariff) {
            document.getElementById("NameTariffDiv").innerHTML = "<span style='text-indent: 5px;'>&nbsp;&nbsp;selected tariff: &nbsp;&nbsp;</span><b>" + MainTariff.iPrice + "<span style='text-indent: 30px;'>&nbsp;&nbsp;&nbsp; $</span>" + MainTariff.price_tax + "</b>";
            document.getElementById("tariff_id").value = MainTariff.id;
            Json_field = JSON.stringify(MainTariff);
            document.getElementById("tariff_json").value = Json_field;
        }


        // запоминает в сессию состояние и значение input -------------------------------------------------------------

        document.addEventListener("DOMContentLoaded", function () {

            const form = document.getElementById('createForm');
            const formFields = form.elements;

            formFields.forEach(function (e) {
                if (e.type === 'checkbox') {
                    if (sessionStorage.getItem(e.name) === 'true') {
                        $('#director_contact_same').attr("checked", "checked");
                    } else {
                        $('#director_contact_same').removeAttr("checked");
                    }
                    copyContact();
                } else {
                    if (e.value === '') e.value = window.sessionStorage.getItem(e.name);
                }
                e.addEventListener('input', function () {
                    if (e.type === 'checkbox') {
                        window.sessionStorage.setItem(e.name, e.checked);
                    } else {
                        window.sessionStorage.setItem(e.name, e.value);
                    }
                })
            })
        });

        document.addEventListener("DOMContentLoaded", () => {
            $('#director_contact_same').click(function () {
                copyContact();
            });
        });

        function copyContact() {
            if ($('#director_contact_same').is(':checked')) {
                $('#contact_first_name').val($('#director_first_name').val());
                $('#contact_last_name').val($('#director_last_name').val());
                $('#contact_phone').val($('#director_phone').val());
                $('#contact_email').val($('#director_email').val());
            } else {
                $('#contact_first_name').val("");
                $('#contact_last_name').val("");
                $('#contact_phone').val("");
                $('#contact_email').val("");
            }
        }


        function check1() {
            if ($('#company_name').val() === "") {
                $(('#company_name')).addClass('is-invalid');
                setTimeout("$(('#company_name')).removeClass('is-invalid')", 3000);
                return false;
            } else {
                return true
            }
        }

        function check2() {
            if ($('#business_number').val() === "") {
                $(('#business_number')).addClass('is-invalid');
                setTimeout("$(('#business_number')).removeClass('is-invalid')", 3500);
                return false;
            } else {
                return true;
            }

        }

        function check3() {
            if ($('#director_phone').val() === "") {
                $(('#director_phone')).addClass('is-invalid');
                setTimeout("$(('#director_phone')).removeClass('is-invalid')", 4500);
                return false;
            } else {
                return true
            }
        }

        function check4() {
            if ($('#tariff_id').val() === "") {
                $(('#div_tariff')).addClass('div_error');
                setTimeout("$(('#div_tariff')).removeClass('div_error')", 5500);
                return false;
            } else {
                return true
            }
        }

        document.getElementById("ntSaveFormsSubmit").addEventListener("click", function (event) {
            let form = document.getElementById("createForm");
            check1();
            check2();
            check3();
            check4();
            if (!(check1() && check2() && check3() && check4())) {
                event.preventDefault();
            } else {
                form.submit();
            }
        });


    </script>
@endsection




