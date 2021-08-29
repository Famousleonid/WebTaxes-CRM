@extends('admin.master')

@section('links')
    <style>
        input[type="checkbox"] {
            width: 60px;
            height: 30px;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: #b8babe;
            outline: none;
            border-radius: 50px;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, .2);
            transition: 0.5s;
            position: relative;
        }

        input:checked[type="checkbox"] {
            background: #42b605;
        }

        input[type="checkbox"]::before {
            content: '';
            position: absolute;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 1px solid darkgray;
            top: 0;
            left: 0;
            background: #fff;
            transform: scale(1.1);
            box-shadow: 0 2px 5px rgba(0, 0, 0, .2);
            transition: 0.5s;
        }

        input:checked[type="checkbox"]::before {
            left: 30px;
        }


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


    <section class="container firm-border shadow bg-white mt-3">

        <div class="container-fluid">

            <div class="card-header">
                <h4 class="text-primary text-bold">Editing: &nbsp;&nbsp;&nbsp;"{{$firm->company_name}}"</h4>
            </div>

            <form id="changeForm" role="form" method="post" action="{{route('firm.update',['firm' => $firm->id])}}">
                @csrf
                @method('PUT')
                <div class="card-body form-group">

                    <div class="form-group mb-1 row">
                        <label class="col-3 col-form-label">company name</label>
                        <div class="col-9"><input type="text" name="company_name" maxlength="250" class="form-control @error('company_name') is-invalid @enderror" value="{{$firm->company_name}}"></div>
                    </div>
                    <div class="form-group mb-1 row">
                        <label class="col-3 col-form-label">business number</label>
                        <div class="col-3"><input type="text" name="business_number" maxlength="15" class="form-control @error('business_number') is-invalid @enderror" value="{{$firm->business_number}}"></div>
                    </div>
                    <div class="form-group mb-1 row">
                        <label class="col-3 col-form-label">company address</label>
                        <div class="col-9"><input type="text" name="company_address" maxlength="250" class="form-control @error('company_address') is-invalid @enderror" value="{{$firm->company_address}}"></div>
                    </div>
                    <div class="form-group mb-1 row">
                        <label class="col-3 col-form-label">director first name</label>
                        <div class="col-9"><input type="text" name="director_first_name" maxlength="250" class="form-control @error('director_first_name') is-invalid @enderror" value="{{$firm->director_first_name}}"></div>
                    </div>
                    <div class="form-group mb-1 row">
                        <label class="col-3 col-form-label">director last name</label>
                        <div class="col-9"><input type="text" name="director_last_name" maxlength="250" class="form-control @error('director_last_name') is-invalid @enderror" value="{{$firm->director_last_name}}"></div>
                    </div>
                    <div class="form-group mb-1 row">
                        <label class="col-3 col-form-label">director phone</label>
                        <div class="col-4"><input type="text" name="director_phone" maxlength="16" class="form-control @error('director_phone') is-invalid @enderror" value="{{$firm->director_phone}}"></div>
                    </div>
                    <div class="form-group mb-1 row">
                        <label class="col-3 col-form-label">director email</label>
                        <div class="col-9"><input type="text" name="director_email" maxlength="100" class="form-control @error('director_email') is-invalid @enderror" value="{{$firm->director_email}}"></div>
                    </div>
                    <div class="form-group mb-1 row">
                        <label class="col-3 col-form-label">contact first name</label>
                        <div class="col-9"><input type="text" name="contact_first_name" maxlength="250" class="form-control @error('contact_first_name') is-invalid @enderror" value="{{$firm->contact_first_name}}"></div>
                    </div>
                    <div class="form-group mb-1 row">
                        <label class="col-3 col-form-label">contact last name</label>
                        <div class="col-9"><input type="text" name="contact_last_name" maxlength="250" class="form-control @error('contact_last_name') is-invalid @enderror" value="{{$firm->contact_last_name}}"></div>
                    </div>
                    <div class="form-group mb-1 row">
                        <label class="col-3 col-form-label">contact phone</label>
                        <div class="col-4"><input type="text" name="contact_phone" maxlength="16" class="form-control @error('contact_phone') is-invalid @enderror" value="{{$firm->contact_phone}}"></div>
                    </div>
                    <div class="form-group mb-1 row">
                        <label class="col-3 col-form-label">contact email</label>
                        <div class="col-9"><input type="text" name="contact_email" maxlength="100" class="form-control @error('contact_email') is-invalid @enderror" value="{{$firm->contact_email}}"></div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label class="col-3 col-form-label">main business activity</label>
                        <div class="col-9"><input type="text" name="main_business_activity" maxlength="250" class="form-control @error('main_business_activity') is-invalid @enderror" value="{{$firm->main_business_activity}}"></div>
                    </div>

                    <div class="form-group row mb-1">
                        <div class="ml-3 col-1">
                            <input type="checkbox" name="verified" value="1" @if($firm->verified) checked @endif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="text-primary col-2">
                            <h4>Verified</h4>
                        </div>

                        <div class="col-2"><a href="{{route('price')}}" id="change_current_tariff" class="nav-link view_tariff">change tariff</a></div>
                        <div id="NameTariffDiv" class="col-4 col-form-label"></div>

                        <div class="col-2"><span id="view_current_tariff" class="nav-link view_tariff" data-toggle="modal" data-target="#modalTariff" style="color:#007BFF;">view tariff</span></div>

                    </div>

                    <input type="text" hidden name="tariff_id" id="tariff_id" value="{{$firm->tariff_id}}">
                    <input type="text" hidden name="tariff_json" id="tariff_json">

                    <div class="card-footer row pt-0">
                        <div class="col-md-3">
                            <button id="submit_form_admin1" type="submit" class="btn btn-primary btn-block">Save</button>
                        </div>
                        <div class="col-md-2 ml-auto">
                            <a id="submit_form_admin2" href="{{ route('firm.index') }}" class="btn btn-info btn-block">Return</a>
                        </div>
                    </div>

                </div>
            </form>

        </div>




    </section>

@endsection

@section('scripts')

    <script type="text/javascript" src="{{asset('assets/js/view-table-tarif.js')}}"></script>






    <script>

        $('#submit_form_admin1').click(function () {
            window.sessionStorage.clear()
        });

        $('#submit_form_admin2').click(function () {
            window.sessionStorage.clear()
        });

        // запоминает в сессию состояние и значение input -------------------------------------------------------------

        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById('changeForm');
            const formFields = form.elements;

            formFields.forEach(function (e) {
                if (sessionStorage.getItem(e.name)) e.value = window.sessionStorage.getItem(e.name, e.value);
                e.addEventListener('input', function () {
                    window.sessionStorage.setItem(e.name, e.value);
                })
            })
        });
        // -------------------------------------------------------------


        $('#view_current_tariff').click(function () {
            $('.div_tariff').show('100');
            $('.fon_modal_tariff').show('fast');
        });

        $(document).mouseup(function (e) {  // событие клика по веб-документу
            let div = $(".div_tariff");
            let fon = $('.fon_modal_tariff');
            if (!div.is(e.target) && div.has(e.target).length === 0) { // и не по его дочерним элементам
                div.hide();
                fon.hide();
            }
        });


        $('#change_current_tariff').click(function () {
            sessionStorage.setItem('select_tariff', 'edit');
        });

        let MainTariff = "";
        let url = '{{ url()->previous() }}';

        if (url.includes("admin")) {
            MainTariff = JSON.parse(@json($firm->tariff_json));
        } else {
            MainTariff = JSON.parse(localStorage.getItem('MainUser'));
        }


        if (MainTariff) {
            document.getElementById("NameTariffDiv").innerHTML = "<span style='text-indent: 5px;'>&nbsp;&nbsp;selected tariff: &nbsp;&nbsp;</span><b>" + MainTariff.iPrice + "<span style='text-indent: 30px;'>&nbsp;&nbsp;&nbsp; $</span>" + MainTariff.price_tax + "</b>";
            document.getElementById("tariff_id").value = MainTariff.id;
            Json_field = JSON.stringify(MainTariff);
            document.getElementById("tariff_json").value = Json_field;
        }

        viewPrice(MainTariff, '.modalTariff-body');

    </script>
@endsection


