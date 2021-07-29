@extends('cabinet.master')

@section('link')
    <style>
        .containerXXX {
            display: flex;
            justify-content: space-between;
            width: 120px;
        }

        .containerXXX .circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(45deg, #15378a 0%, #3c4ab0 35%, #a6e7ff 100%);
            box-shadow: inset 0 0 0 2px rgba(255, 255, 255, 0.3);
            transform: translateX(0);
            z-index: 2;
        }

        .containerXXX .circle:nth-child(1) {
            animation: move-1 2s infinite;
        }

        .containerXXX .circle:nth-child(3) {
            animation: move-3 2s infinite;
        }

        @keyframes move-1 {
            0% {
                z-index: 3;
                transform: translateX(0);
            }
            25% {
                z-index: 3;
                transform: translateX(15px);
            }
            50% {
                z-index: 3;
                transform: translateX(0);
            }
            50.1% {
                z-index: 1;
                transform: translateX(0);
            }
            75% {
                z-index: 1;
                transform: translateX(15px);
            }
            100% {
                z-index: 1;
                transform: translateX(0);
            }
        }

        @keyframes move-3 {
            0% {
                z-index: 1;
                transform: translateX(0);
            }
            25% {
                z-index: 1;
                transform: translateX(-15px);
            }
            50% {
                z-index: 1;
                transform: translateX(0);
            }
            50.1% {
                z-index: 3;
                transform: translateX(0);
            }
            75% {
                z-index: 3;
                transform: translateX(-15px);
            }
            100% {
                z-index: 3;
                transform: translateX(0);
            }
        }
    </style>

@endsection

@section('content')


        <div class="container bg-white shadow mt-3 p-3 col-md-8 firm-border">
        <div>
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12 row">
                        <div class="font-weight-bolder">Payment details for</div>
                        <div class="text-primary">&nbsp;&nbsp;{{$firm->company_name}}</div>
                    </div>
                </div>
            </div>

            <form action="{{ route('stripe.charge') }}" method="post" id="payment-form">
                @csrf
                <div class="form-group">
                    <p><input class="form-control" type="email" name="email" placeholder="{{Auth::user()->email}}" value="{{Auth::user()->email}}" readonly/></p>
                    <p><input type="number" id="amount" class="form-control" type="text" name="amount" placeholder="Enter Amount" autocomplete="off"/></p>
                    <p><input class="form-control" type="text" name="description" placeholder="Description"/></p>
                    <p><input class="form-control" type="email" name="receipt_email" placeholder="which mail to send the receipt to.."/></p>
                    <p><input type="text" name="firm_id" hidden value="{{$firm->id}}"/></p>
                    <label for="card-element">
                        Credit or debit card
                    </label>
                    <div id="card-element" class="border rounded px-3 py-2 "></div>
                    <div id="card-errors" role="alert"></div>
                </div>
                <div class="card-footer row ">
                    <div  id="but-spin"class="col-4">
                        <button  class="btn btn-primary">
                            <span id="button-text">Submit Payment</span>
                            <span id="badge" class="badge badge-danger ml-1 span_view"></span>
                        </button>
                    </div>
                    <div class="but-ret  col-2 ml-auto">
                        <a href="{{ route('payment') }}" class="btn btn-info btn-block">Return</a>
                    </div>
                    <div id="spinner" class="containerXXX d-none">
                        <div class="circle"></div>
                        <div class="circle"></div>
                        <div class="circle"></div>
                    </div>
                </div>
            </form>


        </div>

        <div class="container border shadow w-75 mt-5 text-center bg-white">
            <h4>for test payment use card 4242 4242 4242 4242</h4>
            <h4>CVC can be anything</h4>

        </div>




@endsection()

@section('scripts')

    <script src="https://js.stripe.com/v3/"></script>

    <script type="text/javascript">
        // Show a spinner on payment submission
        let loading = function (isLoading) {
            if (isLoading) {
                document.querySelector("#spinner").classList.remove("d-none");
                document.querySelector("#but-spin").classList.add("d-none");
                document.querySelector(".but-ret").classList.add("d-none");
            } else {
                document.querySelector("#spinner").classList.add("d-none");
                document.querySelector("#button-text").classList.remove("d-none");
                document.querySelector(".but-ret").classList.remove("d-none");
            }
        };

       //  loading(true);


        let publishable_key = " {{ config('setting.stripe_public') }} ";

        let stripe = Stripe(publishable_key, {locale: 'en'});
        let elements = stripe.elements();
        let style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        let card = elements.create('card', {style: style});
        card.mount('#card-element');

        card.addEventListener('change', function (event) {
            let displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        let form = document.getElementById('payment-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            stripe.createToken(card).then(function (result) {
                if (result.error) {
                    let errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    loading(true);
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            let form = document.getElementById('payment-form');
            let hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            form.submit();
        }

        $('#amount').on("input", function (ev) {
            $('.span_view').text('$ ' + ($(ev.target).val()) / 100)
        });


    </script>
@endsection




