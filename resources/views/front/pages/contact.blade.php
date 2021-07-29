<style>
    .btn-input-contact {
        padding: 8px 20px 8px 20px;
        border: none;
        border-radius: 100px;
        background-color: #0FC0FC;
        color: white;
        font-weight: 700;
    }

    .btn-input-second {
        padding: 8px 20px 8px 20px;
        border: none;
        border-radius: 100px;
        background-color: #0FC0FC;
        color: white;
        font-weight: 700;
    }

    .btn-input-second:hover {
        color: white;
    }

    .btn-input-contact:hover {
        background-color: #0F8EFF;
        color: white;
    }

    .run-txt {
        margin: 0px 0px 5px 5px;
    }

    .stay-txt {
        margin: 0px 0px 15px 3px;
        font-size: 0.7rem;
        color: #8d8d8d;
    }

    .img-pic {
        display: flex;
        justify-content: center;
        align-items: center;
        width: auto;
        height: 405px;
        overflow: hidden;
        object-fit: fill;
    }

    .operator-pic {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .label {
        margin: 40px 0px 0px 15px;
        font-weight: 700;
    }

    .error {
        border: 1px solid rgb(245, 129, 216);
    }

    .errorContact {
        color: rgb(245, 129, 216);
        font-weight: normal;
        font-size: 0.8rem;
        margin-left: 10px;
    }

    .success-contact {
        color: #2e8825;
        font-size: 1.3rem;
        font-weight: bold;
        margin-left: 40px;
    }

    .success-contact-err {
        color: #FF0000;
        font-size: 1.2rem;
        font-weight: bold;
        margin-left: 0px;
    }

</style>

<section id="about-contact" class="bg-white p-5">
    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-6">
                <div class="run-txt">
                    <span id="contact-pic-text"></span>
                </div>
                <div class="stay-txt">
                    <span>Please fill out the form and we will be in contact with you shortly.</span>
                </div>

                <div class="img-pic">
                    <img src="{{asset('img/call-centre.jpg')}}" class="operator-pic">
                </div>
                <br>
                <span class="success-contact"></span>
                <span class="success-contact-err"></span>
            </div>

            <div class="col-12 col-lg-6 shadow-lg border-3">

                <form class="contact" method="POST">

                    <div class="container">

                        <div class="form-group ">
                            <label class="label">
                                Your Name
                                <br>
                                <span class="span-input-contact">
                                <input id="input-contact" class="form-control" type="text" size="40">
                                </span>
                            </label>
                        </div>
                        <div class="form-group ">
                            <label class="label">
                                Your Email <span class="errorContact"></span>
                                <br>
                                <span class="span-input-contact">
                                <input id="email-contact" class="form-control" type="text" size="40">
                                </span>
                            </label>
                        </div>
                        <div class="form-group ">
                            <label class="label">
                                Your Message
                                <br>
                                <span class="span-input-contact">
                                <textarea id="area-contact" class="form-control" cols="43" rows="6"></textarea>
                                </span>
                            </label>
                        </div>
                        <button id="btn-contact" class="btn btn-input-contact shadow" type="button">
                            &nbsp;SEND
                        </button>
                        <div class="spinner-contact btn btn-input-second shadow d-none" type="button">
                            <span class=" spinner-border spinner-border-sm " role="status" aria-hidden="true"></span>
                            &nbsp;Wait...
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

