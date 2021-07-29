@extends('front.master')

@section('link')
    <style>
        #i-menu {
            background: rgba(100, 100, 100, 0.8);
            position: relative;
        }

        .howitwork-ss:hover {
            cursor: pointer;
        }

        .item-howitwork { /* --- Navigation Menu --- */
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

        .howitwork-sova { /* --- Sova --- */
            position: absolute;
            left: 28%;
            width: 40%;
            opacity: 0.1;
        }

        .howitwork-ss-foto { /* --- Main block --- */
            position: absolute;
            display: none;
            top: 180px;
            left: 35%;
        }

    </style>

@endsection

@include('components.menu')

@section('content')

    <div class="howitwork-ss-foto"><img src="{{asset('img/ii.webp')}}" width="280"></div>

    <div class="container p-5">

        <div class=""><img src="{{asset('img/sova-fon.png')}}" class="howitwork-sova"></div>

        <br>
        <h4>At the beginning of each month</h4><br>

        <p class="ml-4 text-justify">We gather your statements, receipts and other information we may need to do your bookkeeping and provide you with
            accurate financial statements.</p>

        <p class="ml-4 text-justify">Sync your bank accounts with QuickBooks Online and your transactions will automatically be synced for quick and
            easy processing.</p>

        <p class="ml-4 text-justify"><b><span class="howitwork-ss">Simply take pictures</span></b> of your receipts using your mobile phone and Receipt Bank and
            they automatically get uploaded to your QuickBooks Online file for processing.</p>

        <br>
        <h4>During the month</h4><br>

        <p class="ml-4 text-justify">Each month, our team of bookkeepers categorizes your transactions, reconciles your accounts and produces your
            financial statements in a timely manner. We also make any necessary adjustments to your books to ensure they are
            tax-compliant.</p>

        <p class="ml-4 text-justify">We may need your assistance to properly categorize your transactions. We’ll send you a message, clearly stating
            what we require, and you let us know where it belongs.</p>

        <p class="ml-4 text-justify">You may also have questions for us about your books. Simply send us a message or give us a call and we will get
            back to you within one business day.</p>

        <br>
        <h4>At the end of the month</h4><br>

        <p class="ml-4 text-justify">You will be advised when your bookkeeping has been completed and will be provided with any financial statements
            you require.</p>

        <p class="ml-4 text-justify">Are you ready to make the change? Simply call our office or send us an email to get started.</p>
        <br><br>
    </div>

    <script>
        window.onload = function () {
            jQuery('.howitwork-ss').hover(function ($) {
                jQuery('.howitwork-ss-foto').toggle('slow');
            });
        };
    </script>

@endsection




