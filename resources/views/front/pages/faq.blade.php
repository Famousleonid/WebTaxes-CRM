@extends('front.master')

@section('link')
    <style>
        #i-menu {
            background: rgba(100, 100, 100, 0.8);
            position: relative;
        }

        .item-faq {
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

        .faq-sova {
            position: absolute;
            left: 28%;
            width: 50%;
            opacity: 0.1;
        }

        p {
            margin-left: 30px;
            text-align: justify;
        }

    </style>
@endsection

@include('components.menu')

@section('content')

    <div class="container p-5">
        <div class=""><img src="{{asset('img/sova-fon.png')}}" class="faq-sova"></div>
        <br>
        <h5>Q1. How could I connect with you?</h5>
        <p>- You can contact us by e-mail, on the website contact form by typing or recording a message.
            We will be in touch with you within 12 hours.</p>
        <br>
        <h5>Q2. My device does not have a microphone. How could I send you a verbal message?</h5>
        <p>- You can use any cellphone with an internet connection</p>
        <br>
        <h5>Q3. I’m self-employed in Saskatoon and I have a small farm business. Could I use your services?</h5>
        <p>- Yes, you could use our services from anywhere in Canada where there is an internet connection .</p>
        <br>
        <h5>Q4. If I would like to request an online meeting, how will it work?</h5>
        <p>- You will receive an invitation to an online meeting by the email address you provided. Online meeting
            will be done in zoom. Please indicate your preferred meeting time when requesting.
        </p>
        <br>
        <h5>Q5. How could I calculate the cost of a separate service, for example – Payroll?</h5>
        <p>- Click on Pricing on the main navigate menu at the top of the Home page. Click on Bookkeeping, and then
            choose Payroll. Fill out blank fields click on Calculate. When calculating the cost of several separate
            services, the total cost will be indicated at the end of each section.</p>
        <br>
        <h5>Q6. How often would you send me e-mails, if I register?</h5>
        <p>- We will contact you just regarding your case and we do not send any news, offers, ets.</p>
        <br>
        <h5>Q7. When I calculate a price on the website, does it automatically mean that I signed a contract with you?</h5>
        <p>- No, it just means that you would like to know our price for the service.</p>
        <br><br>
    </div>

@endsection
