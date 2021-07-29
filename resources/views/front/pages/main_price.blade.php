@extends('front.master')

@section('link')

    <link rel="stylesheet" href="{{asset('assets/plugins/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/stacktable.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <style>
        #i-menu {
            background: rgba(100, 100, 100, 0.8);
            position: relative;
        }

        .item-price { /* --- Navigation  Menu --- */
            border-radius: 30px;
            padding: 0;
            margin-top: 10px;
            box-shadow: 0px 0px 50px 5px white;
        }

        .item-contact {
            display: none;
        }

        .item-faq {
            margin-right: 50px;
        }
    </style>

@endsection

@if($flag !== 'edit')
    @include('components.menu')
@endif

@section('content')



    <!---------------------------------------- Main Block  Combo ------------------->
    <div class="container-fluid" style="background-color: #F4F6F9">
        <div class="container-lg combo-price mt-2">
            <div class="shadow"></div>
            <h2 class="price-title animated bounce">Pricing Packages </h2>
            <div class="row wrap-combo justify-content-around ">
                <!--------------------------------- Modal Choise Block  ---------------->
                <div class="modal-accounts-pay">
                    <select id="modal-accounts-pay" class="select-css" size="6">
                        <option value="" selected disabled>Accounts Payable</option>
                        <option value="">01-10 vendors</option>
                        <option value="">11-20 vendors</option>
                        <option value="">21-30 vendors</option>
                        <option value="">31-40 vendors</option>
                        <option value="">41-50 vendors</option>
                    </select>
                </div>

                <div class="modal-accounts-rec">
                    <select id="modal-accounts-rec" class="select-css" size="6" name="">
                        <option value="" selected disabled>Accounts Receivable</option>
                        <option value="">01-10 customers</option>
                        <option value="">11-20 customers</option>
                        <option value="">21-30 customers</option>
                        <option value="">31-40 customers</option>
                        <option value="">41-50 customers</option>
                    </select>
                </div>
                <div class="modal-payroll">
                    <label for="ph"><input type="number" min="1" required id="ph">
                        <span class="ph">&nbsp;How Many Employees?&nbsp;</span></label><br>
                    <select id="modal-payroll" class="select-css" size="6" name="">
                        <option value="" selected disabled>Pay Frequency</option>
                        <option value="">weekly</option>
                        <option value="">bi-weekly</option>
                        <option value="">semi-monthly</option>
                        <option value="">monthly</option>
                        <option value="">yearly</option>
                    </select>
                </div>
                <div class="modal-gst">
                    <select id="modal-gst" class="select-css" size="4" name="">
                        <option value="" selected disabled>GST/HST</option>
                        <option value="">monthly</option>
                        <option value="">quarterly</option>
                        <option value="">yearly</option>
                    </select>
                </div>
                <div class="modal-fin">
                    <select id="modal-fin" class="select-css" size="4" name="">
                        <option value="" selected disabled>Reparation</option>
                        <option value="">monthly</option>
                        <option value="">quarterly</option>
                        <option value="">yearly</option>
                    </select>
                </div>
                <div class="modal-corp">
                    <select id="modal-corp" class="select-css" size="4" name="">
                        <option value="" selected disabled>Corporate Tax</option>
                        <option value="">monthly</option>
                        <option value="">quarterly</option>
                        <option value="">yearly</option>
                    </select>
                </div>
                <!-- ---------------------------------- Constructor ------------------------>
                @if($constructor)
                    <div class="col-11 col-lg item-combo combo-constr">
                        <div class="item1 price-constructor">Constructor</div>
                        <div class="item2 -constr">
                            <div class="num-price2 num-constr" style="height: 50%">$<span id="summ-constr"></span></div>
                            <div class="num-price3" style="height: 20%"><span>/month</span></div>
                        </div>
                        <div class="choise">
                            <!------------------------------ Bookkepeng --------------------------->
                            <div class="book">
                                <h4 class="book-title">Bookkeeping</h4>
                                <label id="acc-pay" class="container1">{{$constructor->row1}}<img alt="" class="info" src="{{asset('img/icons/info.png')}}" data-toggle="#tt11"> <span class="ch-select-pay"></span>
                                    <input id="acc-payable" type="checkbox"><span class="checkmark"></span>
                                </label>
                                <label class="container1">{{$constructor->row2}}<img alt="" class="info" src="{{asset('img/icons/info.png')}}" data-toggle="#tt12"><span class="ch-select-rec"></span>
                                    <input id="acc-rec" type="checkbox"><span class="checkmark"></span>
                                </label>
                                <label class="container1">{{$constructor->row3}}<img alt="" class="info" src="{{asset('img/icons/info.png')}}" data-toggle="#tt13">
                                    <input id="acc-cil" type="checkbox"><span class="checkmark"></span>
                                </label>
                                <label class="container1">{{$constructor->row4}}<img alt="" class="info" src="{{asset('img/icons/info.png')}}" data-toggle="#tt14"><span class="ch-select-ser"></span>
                                    <input id="pay-ser" type="checkbox"><span class="checkmark"></span>
                                </label>
                                <label class="container1">{{$constructor->row5}}<img alt="" class="info" src="{{asset('img/icons/info.png')}}" data-toggle="#tt15">
                                    <input id="inv-acc" type="checkbox"><span class="checkmark"></span>
                                </label>
                            </div>
                            <!------------------------------Accounting --------------------------->
                            <div class="account">
                                <h4 class="book-title">Accounting</h4>
                                <label class="container1">{{$constructor->row6}}<img alt="" class="info"
                                                                                     src="{{asset('img/icons/info.png')}}" data-toggle="#tt16"><input id="pay-tax" type="checkbox"><span
                                        class="checkmark"></span>
                                </label>
                                <label class="container1">{{$constructor->row7}}<img alt="" class="info" src="{{asset('img/icons/info.png')}}"
                                                                                     data-toggle="#tt17">
                                    <input id="cos-acc" type="checkbox"><span class="checkmark"></span>
                                </label>
                                <label class="container1">{{$constructor->row8}}<img alt="" class="info"
                                                                                     src="{{asset('img/icons/info.png')}}" data-toggle="#tt18"><span class="ch-select-gst"></span>
                                    <input id="gst-hst" type="checkbox"><span class="checkmark"></span>
                                </label>
                                <label class="container1">{{$constructor->row9}}<img alt="" class="info"
                                                                                     src="{{asset('img/icons/info.png')}}" data-toggle="#tt19"><span class="ch-select-fin"></span>
                                    <input id="fin-rep" type="checkbox"><span class="checkmark"></span>
                                </label>

                            </div>
                            <!------------------------------- Taxation --------------------------->
                            <div class="taxation">
                                <h4 class="book-title">Taxation</h4>
                                <label class="container1">{{$constructor->row10}}<img alt="" class="info" src="{{asset('img/icons/info.png')}}"
                                                                                      data-toggle="#tt110"> <span class="ch-select-cor"></span>
                                    <input id="cor-tax" type="checkbox"><span class="checkmark"></span><br>
                                </label>
                                <label class="container1">{{$constructor->row11}}&nbsp;&nbsp;&nbsp;&nbsp;$<span class="summ-tax-per"></span><img alt="" class="info" src="{{asset('img/icons/info.png')}}"
                                                                                                                                                 data-toggle="#tt111">
                                    <input id="personal-tax" type="checkbox"><span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="wrap-btn-price">
                            <a id="btn-constructor" type="submit" class="btn-price">ORDER</a>
                        </div>
                    </div>
                @endif
            <!-- ----------------------------------- Light etc ------------------------>
                @if($light)
                    <div class="col-11 col-lg item-combo combo-light">
                        <div class="item1 price-light">Light</div>
                        <div class="item2">
                            <div class="num-price2 num-light" style="height: 50%">$<span id="sum_tax_light">{{$light->price}} </span></div>
                            <div class="num-price3" style="height: 20%"><span>/month</span></div>
                        </div>
                        <div class="item3">
                            <p class="p3">{{$light->row1}}<img alt="" class="info" src="{{asset('img/icons/info.png')}}" data-toggle="#tt21"></p>
                            <p class="p3">{{$light->row2}}<img alt="" class="info" src="{{asset('img/icons/info.png')}}" data-toggle="#tt22"></p>
                            <p class="p3">{{$light->row3}}<img alt="" class="info" src="{{asset('img/icons/info.png')}}" data-toggle="#tt23"></p>
                            <p class="p3">{{$light->row4}}<img alt="" class="info" src="{{asset('img/icons/info.png')}}" data-toggle="#tt24"></p>
                            <p class="p3">{{$light->row5}}</p>
                            <p class="p3">{{$light->row6}}</p>
                            <p class="p3">{{$light->row7}}</p>
                            <br>
                            <img class="sova-img" src="{{asset('img/sova0.png')}}" alt="">
                        </div>
                        <div class="wrap-btn-price">
                            <a id="btn-light" type="submit" class="btn-price">ORDER</a>
                        </div>
                    </div>
                @endif
            <!-- ---------------------------------- Base etc------------------------------>
                @if($base)
                    <div class="col-11 col-lg item-combo combo-base">
                        <div class="item1 price-base">Base</div>
                        <div class="item2">
                            <div class="num-price2 num-base" style="height: 50%">$<span id="sum_tax_base">{{$base->price}}</span></div>
                            <div class="num-price3" style="height: 20%"><span>/month</span></div>
                        </div>
                        <div class="item3">
                            <p class="p3 p3-title">All options from "Light"</p>
                            <p class="p3">{{$base->row1}}<img alt="" class="info" src="{{asset('img/icons/info.png')}}" data-toggle="#tt31"></p>
                            <p class="p3">{{$base->row2}}<img alt="" class="info" src="{{asset('img/icons/info.png')}}" data-toggle="#tt32"></p>
                            <p class="p3">{{$base->row3}}<img alt="" class="info" src="{{asset('img/icons/info.png')}}" data-toggle="#tt33"></p>
                            <p class="p3">{{$base->row4}}<img alt="" class="info" src="{{asset('img/icons/info.png')}}" data-toggle="#tt34"></p>
                            <p class="p3">{{$base->row5}}<img alt="" class="info" src="{{asset('img/icons/info.png')}}" data-toggle="#tt35"></p>
                            <p class="p3">{{$base->row6}}<img alt="" class="info" src="{{asset('img/icons/info.png')}}" data-toggle="#tt36"></p>
                            <p class="p3">{{$base->row7}}</p>

                            <br>
                            <img alt="" class="sova-img" src="{{asset('img/sova0.png')}}">
                        </div>
                        <div class="wrap-btn-price">
                            <a id="btn-base" type="submit" class="btn-price">ORDER</a>
                        </div>
                    </div>
                @endif
            <!-- -------------------------------- Advanced etc ------------------------->
                @if($advanced)
                    <div class="col-11 col-lg item-combo combo-advanced">
                        <div class='rotate-block'>
                            <h5 class='simple-ribbon'>Hit for sale</h5>
                        </div>
                        <div class="item1 price-advanced"><span>Advanced</span>
                        </div>
                        <div class="item2">
                            <div class="num-price2 num-advance" style="height: 50%">$<span id="sum_tax_advanced">{{$advanced->price}} </span></div>
                            <div class="num-price3" style="height: 20%"><span>/month</span></div>
                        </div>
                        <div class="item3">
                            <p class="p3 p3-title">All options from "Base"</p>
                            <p class="p3">{{$advanced->row1}}<img alt="" class="info info-left" src="{{asset('img/icons/info.png')}}" data-toggle="#tt41"></p>
                            <p class="p3">{{$advanced->row2}}<img alt="" class="info info-left" src="{{asset('img/icons/info.png')}}" data-toggle="#tt42"></p>
                            <p class="p3">{{$advanced->row3}}<img alt="" class="info info-left" src="{{asset('img/icons/info.png')}}" data-toggle="#tt43"></p>
                            <p class="p3">{{$advanced->row4}}<img alt="" class="info info-left" src="{{asset('img/icons/info.png')}}" data-toggle="#tt44"></p>
                            <p class="p3">{{$advanced->row5}}<img alt="" class="info info-left" src="{{asset('img/icons/info.png')}}" data-toggle="#tt45"></p>
                            <p class="p3">{{$advanced->row6}}</p>
                            <br>
                            <img alt="" class="sova-img" src="{{asset('img/sova0.png')}}">
                        </div>
                        <div class="wrap-btn-price">
                            <a id="btn-advanced" type="submit" class="btn-price">ORDER</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="modal-personal-tax">
            <div style="padding: 10px;">

                <h4 style="display: inline;">Personal Tax</h4>
                <div class="summ-view">$<span class="summ-tax-per"></span></div>
            </div>
            <table id="personal-table">
                <tr>
                    <th></th>
                    <th>Taxpayer</th>
                    <th>Spouse</th>
                    <th>Dependant 1</th>
                    <th>Dependant 2</th>
                    <th>Dependant 3</th>
                </tr>
                <tr>
                    <td class="hi">T1 general</td>
                    <td><input type="checkbox" class="input_pers" data-target="t1_Gen.tax"></td>
                    <td><input type="checkbox" class="input_pers" data-target="t1_Gen.spo"></td>
                    <td><input type="checkbox" class="input_pers" data-target="t1_Gen.d1"></td>
                    <td><input type="checkbox" class="input_pers" data-target="t1_Gen.d2"></td>
                    <td><input type="checkbox" class="input_pers" data-target="t1_Gen.d3"></td>
                </tr>
                <tr>
                    <td class="hi">General Income<img alt="" class="info-personal" src="{{asset('img/icons/info.png')}}" data-toggle="#tt52"></td>
                    <td><input type="checkbox" class="input_pers" data-target="GenInc.tax"></td>
                    <td><input type="checkbox" class="input_pers" data-target="GenInc.spo"></td>
                    <td><input type="checkbox" class="input_pers" data-target="GenInc.d1"></td>
                    <td><input type="checkbox" class="input_pers" data-target="GenInc.d2"></td>
                    <td><input type="checkbox" class="input_pers" data-target="GenInc.d3"></td>
                </tr>
                <tr>
                    <td class="hi">Child Care Expenses<img alt="" class="info-personal" src="{{asset('img/icons/info.png')}}" data-toggle="#tt53"></td>
                    <td><input type="checkbox" class="input_pers" data-target="ChlExp.tax"></td>
                    <td><input type="checkbox" class="input_pers" data-target="ChlExp.spo"></td>
                    <td><input type="checkbox" class="input_pers" data-target="ChlExp.d1"></td>
                    <td><input type="checkbox" class="input_pers" data-target="ChlExp.d2"></td>
                    <td><input type="checkbox" class="input_pers" data-target="ChlExp.d3"></td>
                </tr>
                <tr>
                    <td class="hi">Moving Expenses<img alt="" class="info-personal" src="{{asset('img/icons/info.png')}}" data-toggle="#tt54"></td>
                    <td><input type="checkbox" class="input_pers" data-target="movExp.tax"></td>
                    <td><input type="checkbox" class="input_pers" data-target="movExp.spo"></td>
                    <td><input type="checkbox" class="input_pers" data-target="movExp.d1"></td>
                    <td><input type="checkbox" class="input_pers" data-target="movExp.d2"></td>
                    <td><input type="checkbox" class="input_pers" data-target="movExp.d3"></td>
                </tr>
                <tr>
                    <td class="hi">Spousal support<img alt="" class="info-personal" src="{{asset('img/icons/info.png')}}" data-toggle="#tt55"></td>
                    <td><input type="checkbox" class="input_pers" data-target="spoSup.tax"></td>
                    <td><input type="checkbox" class="input_pers" data-target="spoSup.spo"></td>
                    <td><input type="checkbox" class="input_pers" data-target="spoSup.d1"></td>
                    <td><input type="checkbox" class="input_pers" data-target="spoSup.d2"></td>
                    <td><input type="checkbox" class="input_pers" data-target="spoSup.d3"></td>
                </tr>
                <tr>
                    <td class="hi">Deductible Employment Exp<img alt="" class="info-personal" src="{{asset('img/icons/info.png')}}"
                                                                 data-toggle="#tt56"></td>
                    <td><input type="checkbox" class="input_pers" data-target="dedEmp.tax"></td>
                    <td><input type="checkbox" class="input_pers" data-target="dedEmp.spo"></td>
                    <td><input type="checkbox" class="input_pers" data-target="dedEmp.d1"></td>
                    <td><input type="checkbox" class="input_pers" data-target="dedEmp.d2"></td>
                    <td><input type="checkbox" class="input_pers" data-target="dedEmp.d3"></td>
                </tr>
                <tr>
                    <td class="hi">Investment Income<img alt="" class="info-personal" src="{{asset('img/icons/info.png')}}" data-toggle="#tt57">
                    </td>
                    <td><input type="checkbox" class="input_pers" data-target="invInc.tax"></td>
                    <td><input type="checkbox" class="input_pers" data-target="invInc.spo"></td>
                    <td><input type="checkbox" class="input_pers" data-target="invInc.d1"></td>
                    <td><input type="checkbox" class="input_pers" data-target="invInc.d2"></td>
                    <td><input type="checkbox" class="input_pers" data-target="invInc.d3"></td>
                </tr>
                <tr>
                    <td class="hi">Investment Deductions<img alt="" class="info-personal" src="{{asset('img/icons/info.png')}}" data-toggle="#tt58">
                    </td>
                    <td><input type="checkbox" class="input_pers" data-target="invDed.tax"></td>
                    <td><input type="checkbox" class="input_pers" data-target="invDed.spo"></td>
                    <td><input type="checkbox" class="input_pers" data-target="invDed.d1"></td>
                    <td><input type="checkbox" class="input_pers" data-target="invDed.d2"></td>
                    <td><input type="checkbox" class="input_pers" data-target="invDed.d3"></td>
                </tr>
                <tr>
                    <td class="hi">Rental Income<img alt="" class="info-personal" src="{{asset('img/icons/info.png')}}" data-toggle="#tt59"></td>
                    <td><input type="checkbox" class="input_pers" data-target="renInc.tax"></td>
                    <td><input type="checkbox" class="input_pers" data-target="renInc.spo"></td>
                    <td><input type="checkbox" class="input_pers" data-target="renInc.d1"></td>
                    <td><input type="checkbox" class="input_pers" data-target="renInc.d2"></td>
                    <td><input type="checkbox" class="input_pers" data-target="renInc.d3"></td>
                </tr>
                <tr>
                    <td class="hi">Self-Employment Income<img alt="" class="info-personal" src="{{asset('img/icons/info.png')}}"
                                                              data-toggle="#tt510"></td>
                    <td><input type="checkbox" class="input_pers" data-target="selInc.tax"></td>
                    <td><input type="checkbox" class="input_pers" data-target="selInc.spo"></td>
                    <td><input type="checkbox" class="input_pers" data-target="selInc.d1"></td>
                    <td><input type="checkbox" class="input_pers" data-target="selInc.d2"></td>
                    <td><input type="checkbox" class="input_pers" data-target="selInc.d3"></td>
                </tr>
                <tr>
                    <td class="hi">Self-Employment Deductions<img alt="" class="info-personal" src="{{asset('img/icons/info.png')}}"
                                                                  data-toggle="#tt511"></td>
                    <td><input type="checkbox" class="input_pers" data-target="selDed.tax"></td>
                    <td><input type="checkbox" class="input_pers" data-target="selDed.spo"></td>
                    <td><input type="checkbox" class="input_pers" data-target="selDed.d1"></td>
                    <td><input type="checkbox" class="input_pers" data-target="selDed.d2"></td>
                    <td><input type="checkbox" class="input_pers" data-target="selDed.d3"></td>
                </tr>
                <tr>
                    <td class="hi">Self-Employment HST<img alt="" class="info-personal" src="{{asset('img/icons/info.png')}}" data-toggle="#tt512">
                    </td>
                    <td><input type="checkbox" class="input_pers" data-target="selEmp.tax"></td>
                    <td><input type="checkbox" class="input_pers" data-target="selEmp.spo"></td>
                    <td><input type="checkbox" class="input_pers" data-target="selEmp.d1"></td>
                    <td><input type="checkbox" class="input_pers" data-target="selEmp.d2"></td>
                    <td><input type="checkbox" class="input_pers" data-target="selEmp.d3"></td>
                </tr>
                <tr>
                    <td class="hi">RRSP/PRPP Contributions<img alt="" class="info-personal" src="{{asset('img/icons/info.png')}}"
                                                               data-toggle="#tt513"></td>
                    <td><input type="checkbox" class="input_pers" data-target="conBut.tax"></td>
                    <td><input type="checkbox" class="input_pers" data-target="conBut.spo"></td>
                    <td><input type="checkbox" class="input_pers" data-target="conBut.d1"></td>
                    <td><input type="checkbox" class="input_pers" data-target="conBut.d2"></td>
                    <td><input type="checkbox" class="input_pers" data-target="conBut.d3"></td>
                </tr>
                <tr>
                    <td class="hi">Tuition amount<img alt="" class="info-personal" src="{{asset('img/icons/info.png')}}" data-toggle="#tt514"></td>
                    <td><input type="checkbox" class="input_pers" data-target="tuiAmo.tax"></td>
                    <td><input type="checkbox" class="input_pers" data-target="tuiAmo.spo"></td>
                    <td><input type="checkbox" class="input_pers" data-target="tuiAmo.d1"></td>
                    <td><input type="checkbox" class="input_pers" data-target="tuiAmo.d2"></td>
                    <td><input type="checkbox" class="input_pers" data-target="tuiAmo.d3"></td>
                </tr>
                <tr>
                    <td class="hi">Other Credits<img alt="" class="info-personal" src="{{asset('img/icons/info.png')}}" data-toggle="#tt515"></td>
                    <td><input type="checkbox" class="input_pers" data-target="othCre.tax"></td>
                    <td><input type="checkbox" class="input_pers" data-target="othCre.spo"></td>
                    <td><input type="checkbox" class="input_pers" data-target="othCre.d1"></td>
                    <td><input type="checkbox" class="input_pers" data-target="othCre.d2"></td>
                    <td><input type="checkbox" class="input_pers" data-target="othCre.d3"></td>
                </tr>
                <tr>
                    <td class="hi">Forein Reporting<img alt="" class="info-personal" src="{{asset('img/icons/info.png')}}" data-toggle="#tt516">
                    </td>
                    <td><input type="checkbox" class="input_pers" data-target="forRep.tax"></td>
                    <td><input type="checkbox" class="input_pers" data-target="forRep.spo"></td>
                    <td><input type="checkbox" class="input_pers" data-target="forRep.d1"></td>
                    <td><input type="checkbox" class="input_pers" data-target="forRep.d2"></td>
                    <td><input type="checkbox" class="input_pers" data-target="forRep.d3"></td>
                </tr>
                <tr>
                    <td class="hi">Non-resident Income<img alt="" class="info-personal" src="{{asset('img/icons/info.png')}}" data-toggle="#tt517">
                    </td>
                    <td><input type="checkbox" class="input_pers" data-target="nonRes.tax"></td>
                    <td><input type="checkbox" class="input_pers" data-target="nonRes.spo"></td>
                    <td><input type="checkbox" class="input_pers" data-target="nonRes.d1"></td>
                    <td><input type="checkbox" class="input_pers" data-target="nonRes.d2"></td>
                    <td><input type="checkbox" class="input_pers" data-target="nonRes.d3"></td>
                </tr>
            </table>
            <div class="wrap-price-p">
                <a href="#" id="btn-personal-tax" type="submit" class="btn-price-personal">accept</a>
            </div>
        </div>
        <hr>

        <div id="tt11" class="ttip">&nbsp;&nbsp; 11 Tooltip</div>
        <div id="tt12" class="ttip">&nbsp;&nbsp; 12 Tooltip</div>
        <div id="tt13" class="ttip">&nbsp;&nbsp; 13 Tooltip</div>
        <div id="tt14" class="ttip">&nbsp;&nbsp; 14 Tooltip</div>
        <div id="tt15" class="ttip">&nbsp;&nbsp; 15 Tooltip</div>
        <div id="tt16" class="ttip">&nbsp;&nbsp; 16 Tooltip</div>
        <div id="tt17" class="ttip">&nbsp;&nbsp; 17 Tooltip</div>
        <div id="tt18" class="ttip">&nbsp;&nbsp; 18 Tooltip</div>
        <div id="tt19" class="ttip">&nbsp;&nbsp; 19 Tooltip</div>
        <div id="tt110" class="ttip">&nbsp;&nbsp; 110 Tooltip</div>
        <div id="tt111" class="ttip">&nbsp;&nbsp; 111 Tooltip</div>
        <div id="tt21" class="ttip">&nbsp;&nbsp; 21 Tooltip</div>
        <div id="tt22" class="ttip">&nbsp;&nbsp; 22 Tooltip</div>
        <div id="tt23" class="ttip">&nbsp;&nbsp; 23 Tooltip</div>
        <div id="tt24" class="ttip">&nbsp;&nbsp; 24 Tooltip</div>
        <div id="tt31" class="ttip">&nbsp;&nbsp; 31 Tooltip</div>
        <div id="tt32" class="ttip">&nbsp;&nbsp; 32 Tooltip</div>
        <div id="tt33" class="ttip">&nbsp;&nbsp; 33 Tooltip</div>
        <div id="tt34" class="ttip">&nbsp;&nbsp; 34 Tooltip</div>
        <div id="tt35" class="ttip">&nbsp;&nbsp; 35 Tooltip</div>
        <div id="tt36" class="ttip">&nbsp;&nbsp; 36 Tooltip</div>
        <div id="tt41" class="ttip">&nbsp;&nbsp; 41 Tooltip</div>
        <div id="tt42" class="ttip">&nbsp;&nbsp; 42 Tooltip</div>
        <div id="tt43" class="ttip">&nbsp;&nbsp; 43 Tooltip</div>
        <div id="tt44" class="ttip">&nbsp;&nbsp; 44 Tooltip</div>
        <div id="tt45" class="ttip">&nbsp;&nbsp; 45 Tooltip</div>
        <div id="tt51" class="ttip">&nbsp;&nbsp;</div>
        <div id="tt52" class="ttip">&nbsp; T4, T4E, T5007, T4RSP, T4RIF</div>
        <div id="tt53" class="ttip">&nbsp; Caregivers, daycare centres, day camps and day sports schools, overnight sports
            schools
        </div>
        <div id="tt54" class="ttip">&nbsp; Mark other family members besides the customer only if they moved separately
        </div>
        <div id="tt55" class="ttip">&nbsp; Mark just who made or received the support</div>
        <div id="tt56" class="ttip">&nbsp; T2200</div>
        <div id="tt57" class="ttip">&nbsp; T3, T5, T4PS, T5013, T5008</div>
        <div id="tt58" class="ttip">&nbsp; Dispose of property or investments during the year</div>
        <div id="tt59" class="ttip">&nbsp; Live in, personal-use and investment properties</div>
        <div id="tt510" class="ttip">&nbsp; Or Business Income, T4A</div>
        <div id="tt511" class="ttip">&nbsp; We will keep the bookkeeping and fill out the appropriate tax forms</div>
        <div id="tt512" class="ttip">&nbsp; Preparation and File</div>
        <div id="tt513" class="ttip">&nbsp; Home buyers's plan or Lifelong learning plan repaid</div>
        <div id="tt514" class="ttip">&nbsp; T2202, Student loan</div>
        <div id="tt515" class="ttip">&nbsp; Medical expenses. Donations, Political Contribution, Clime the first-time home
            buyer's amount
        </div>
        <div id="tt516" class="ttip">&nbsp; T1135, mark just who own the property with a total cost more than CAN$100,000
        </div>
        <div id="tt517" class="ttip">&nbsp; Non-resident Income in Canada, form S216</div>

    </div>

    @if($flag === 'edit')
        <div class="text-center p-4">
            <a href="{{url()->previous()}}" class="btn btn-primary">Come back</a>
        </div>
    @endif



@endsection

@section('scripts')

    <script type="text/javascript" src="{{asset('assets/plugins/stacktable.js')}}"></script>

    <script>
        window.iData = @json($constructor);
        window.iLight = @json($light);
        window.iBase = @json($base);
        window.iAdvanced = @json($advanced);
    </script>


    <script type="text/javascript" src="{{asset('assets/js/config-price.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/price.js')}}"></script>

    <script>
        // ---------------------------------- Local Storage push ORDER --------------------------------------

        document.addEventListener("DOMContentLoaded", function () {

            $('#btn-constructor').on('click', function () {
                MainUser.iPrice = "constructor";
                MainUser.id = iData.id;
                MainUser.price_tax = $('#summ-constr').text();
                localStorage.setItem('MainUser', encrypt(JSON.stringify(MainUser)));
                if (sessionStorage.getItem('select_tariff') === 'edit') {
                    sessionStorage.removeItem('select_tariff');
                    window.location.href = '{{ URL::previous() }}';
                } else {
                    window.location.href = '{{route('firms.create')}}';
                }
            });
            $('#btn-light').on('click', function () {
                MainUser.iPrice = "light";
                MainUser.id = iLight.id;
                MainUser.price_tax = $('#sum_tax_light').text();
                localStorage.setItem('MainUser', encrypt(JSON.stringify(MainUser)));
                if (sessionStorage.getItem('select_tariff') === 'edit') {
                    sessionStorage.removeItem('select_tariff');
                    window.location.href = '{{ URL::previous() }}';
                } else {
                    window.location.href = '{{route('firms.create')}}';
                }
            });
            $('#btn-base').on('click', function () {
                MainUser.iPrice = "base";
                MainUser.id = iBase.id;
                MainUser.price_tax = $('#sum_tax_base').text();
                localStorage.setItem('MainUser', encrypt(JSON.stringify(MainUser)));
                if (sessionStorage.getItem('select_tariff') === 'edit') {
                    sessionStorage.removeItem('select_tariff');
                    window.location.href = '{{ URL::previous() }}';
                } else {
                    window.location.href = '{{route('firms.create')}}';
                }
            });
            $('#btn-advanced').on('click', function () {
                MainUser.iPrice = "advanced";
                MainUser.id = iAdvanced.id;
                MainUser.price_tax = $('#sum_tax_advanced').text();
                localStorage.setItem('MainUser', encrypt(JSON.stringify(MainUser)));
                if (sessionStorage.getItem('select_tariff') === 'edit') {
                    sessionStorage.removeItem('select_tariff');
                    window.location.href = '{{ URL::previous() }}';
                } else {
                    window.location.href = '{{route('firms.create')}}';
                }
            });
        });


    </script>

@endsection


