@extends('front.master')

@section('content')

    @include('components.menu')

    <!------------------------------------- Main PIC ------------------------------>
    <div class="wrap-main--pic">

        <div class="main-banner text-center pb-10">
            <span class="main-banner-m">Cloud</span><br>
            <span id="typing"></span><br><br>
            <span class="main-banner-t">Offering custom payroll, accounts payable, accounts receivable, and full-cycle
            bookkeeping services; professional accounting service; <br>tax preparation and filing for individuals and
            businesses.</span><br>
        </div>

    </div>

    <!--------------------------------------section ---------------------------->
    @include('front.pages.jumbotron')
    <!------------------------------------- Partners  -------------------------->
    @include('front.pages.partners')
    <!----------------------------------Post ----------------------------------->
    @include('front.pages.posts')
    <!-------------------------------- Contact section ------------------------->
    @include('front.pages.contact')
    <!-------------------------------------------------------------------------->


@endsection

@section('scripts')

    <script src="{{asset('assets/plugins/typed.min.js')}}"></script>
    <script src="{{asset('assets/js/front-index.js')}}"></script>


    <script>


{{--        // -------------------------------- write contact on base  ---------------------------}}
{{--        $(document).ready(function () {--}}

{{--            $('.contact').find("input[type=text],  textarea").each(function () {--}}
{{--                if (!$(this).val()) {--}}
{{--                    $(this).attr("placeholder", "Type your text here")--}}
{{--                }--}}
{{--            });--}}
{{--            checkEmailContact();--}}

{{--            $('#btn-contact').click(function (e) {--}}
{{--                e.preventDefault();--}}

{{--                let nameCo = controlName();--}}
{{--                let emailCo = controlEmail();--}}
{{--                let textCo = controlText();--}}

{{--                if (nameCo && emailCo && textCo) {--}}

{{--                    let con_name = $('#input-contact').val();--}}
{{--                    let con_email = $('#email-contact').val();--}}
{{--                    let con_text = $('#area-contact').val();--}}

{{--                    $('.spinner-contact').removeClass('d-none');--}}
{{--                    $('#btn-contact').addClass('d-none');--}}

{{--                    $.ajax({--}}
{{--                        type: 'POST',--}}
{{--                        url: "{{ route('front.request') }}",--}}
{{--                        data: {--}}
{{--                            name: con_name,--}}
{{--                            email: con_email,--}}
{{--                            message: con_text,--}}
{{--                            _token: '{!! csrf_token() !!}'--}}
{{--                        },--}}
{{--                        success: function (data) {--}}

{{--                            $('.spinner-contact').addClass('d-none');--}}
{{--                            $('#btn-contact').removeClass('d-none');--}}

{{--                            $('.success-contact').text(data + ' We accepted your appeal!');--}}
{{--                            setTimeout(("$('.success-contact').text('')"), 5000);--}}

{{--                            $('#input-contact').val('');--}}
{{--                            $('#email-contact').val('')--}}
{{--                            $('#area-contact').val('');--}}
{{--                            $('#email-contact').removeClass('error');--}}
{{--                        },--}}
{{--                        error: function (data) {--}}

{{--                            $('.spinner-contact').addClass('d-none');--}}
{{--                            $('#btn-contact').removeClass('d-none');--}}

{{--                            $('.success-contact-err').text('An unexpected error occurred. Please try again later.');--}}
{{--                            setTimeout(("$('.success-contact-err').text('')"), 5000);--}}
{{--                            // console.log('error', data);--}}
{{--                        },--}}
{{--                        complete: function (data) {--}}
{{--                            // console.log('complete', data);--}}
{{--                        }--}}
{{--                    });--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}

{{--        function controlName() {--}}
{{--            if ($('#input-contact').val() === "") {--}}
{{--                $(('#input-contact')).addClass('error');--}}
{{--                setTimeout("$(('#input-contact')).removeClass('error')", 1000);--}}
{{--                return false;--}}
{{--            } else {--}}
{{--                return true--}}
{{--            }--}}
{{--        }--}}

{{--        function controlEmail() {--}}
{{--            if ($('#email-contact').val() === "" || $('#email-contact').hasClass('error')) {--}}
{{--                $(('#email-contact')).addClass('error');--}}
{{--                setTimeout("$(('#email-contact')).removeClass('error')", 2000);--}}
{{--                return false;--}}
{{--            } else {--}}
{{--                return true;--}}
{{--            }--}}

{{--        }--}}

{{--        function controlText() {--}}
{{--            if ($('#area-contact').val() === "") {--}}
{{--                $(('#area-contact')).addClass('error');--}}
{{--                setTimeout("$(('#area-contact')).removeClass('error')", 3000);--}}
{{--                return false;--}}
{{--            } else {--}}
{{--                return true--}}
{{--            }--}}
{{--        }--}}

{{--        function checkEmailContact() {--}}

{{--            $('#email-contact').bind('input', function () {--}}
{{--                const pattern = /^[a-z0-9_-]+@[a-z0-9-]+\.([a-z]{1,6}\.)?[a-z]{2,6}$/i;--}}
{{--                let mail = $('#email-contact');--}}

{{--                if (mail.val().search(pattern) === 0) {--}}
{{--                    $('.errorContact').text('');--}}
{{--                    $('#email-contact').removeClass('error');--}}
{{--                    return true;--}}
{{--                } else {--}}
{{--                    // setTimeout(("$('.errorContact').text('')"), 5000);--}}
{{--                    $('#email-contact').addClass('error');--}}
{{--                    $('.errorContact').text('email must match the pattern: sample@examle.com')--}}
{{--                    return false;--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}





    // https://developers.google.com/closure/compiler/docs/gettingstarted_api


        $(document).ready(function(){$(".contact").find("input[type=text],  textarea").each(function(){$(this).val()||$(this).attr("placeholder","Type your text here")});
            checkEmailContact();$("#btn-contact").click(function(a){a.preventDefault();a=controlName();var b=controlEmail(),c=controlText();
                a&&b&&c&&(a=$("#input-contact").val(),b=$("#email-contact").val(),c=$("#area-contact").val(),$(".spinner-contact").removeClass("d-none"),$("#btn-contact").addClass("d-none"),$.ajax({type:"POST",url:"{{ route('front.request') }}",
            data:{name:a,email:b,message:c,_token:"{!! csrf_token() !!}"},success:function(d){$(".spinner-contact").addClass("d-none");$("#btn-contact").removeClass("d-none");
                    $(".success-contact").text(d+" We accepted your appeal!");setTimeout("$('.success-contact').text('')",5E3);$("#input-contact").val("");$("#email-contact").val("");
                    $("#area-contact").val("");$("#email-contact").removeClass("error")},error:function(d){$(".spinner-contact").addClass("d-none");$("#btn-contact").removeClass("d-none");
                    $(".success-contact-err").text("An unexpected error occurred. Please try again later.");
                setTimeout("$('.success-contact-err').text('')",5E3)},complete:function(d){}}))})});
        function controlName(){return""===$("#input-contact").val()?($("#input-contact").addClass("error"),setTimeout("$(('#input-contact')).removeClass('error')",1E3),!1):!0}function controlEmail(){return""===$("#email-contact").val()||$("#email-contact").hasClass("error")?($("#email-contact").addClass("error"),setTimeout("$(('#email-contact')).removeClass('error')",2E3),!1):!0}
        function controlText(){return""===$("#area-contact").val()?($("#area-contact").addClass("error"),setTimeout("$(('#area-contact')).removeClass('error')",3E3),!1):!0}
        function checkEmailContact(){$("#email-contact").bind("input",function(){if(0===$("#email-contact").val().search(/^[a-z0-9_-]+@[a-z0-9-]+\.([a-z]{1,6}\.)?[a-z]{2,6}$/i))return $(".errorContact").text(""),$("#email-contact").removeClass("error"),!0;
            $("#email-contact").addClass("error");$(".errorContact").text("email must match the pattern: sample@examle.com");return!1})};


    </script>

@endsection
