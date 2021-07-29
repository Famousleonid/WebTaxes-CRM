// ---------------------------- Массив с итоговыми данными --------------------

    PRICEConstructor = makePriceConstructor(iData);

    let massConst = {
        taxAll: 0, accPay: 0, accRec: 0, accCil: 0, paySum: 0, invAcc: 0, payTax: 0, cosAcc: 0, gstHst: 0, finRep: 0, corTax: 0, perTax: 0
    };

    massConst.taxAll = PRICEConstructor.taxAll;

    function summ() {
        let summ = massConst.accPay + massConst.accRec + massConst.accCil + massConst.paySum + massConst.invAcc + massConst.payTax +
            massConst.cosAcc + massConst.gstHst + massConst.finRep + massConst.corTax + massConst.perTax + massConst.taxAll;

        $('#summ-constr').text(summ.toFixed(2));
    }

    let mus = {
        t1_Gen: {}, GenInc: {}, ChlExp: {}, movExp: {}, spoSup: {}, dedEmp: {}, invInc: {}, invDed: {}, renInc: {}, selInc: {}, selDed: {},
        selEmp: {}, conBut: {}, tuiAmo: {}, othCre: {}, forRep: {}, nonRes: {}
    };

    function mus_summ() {
        massConst.perTax = 0;
        for (let k in mus) {
            for (let kk in mus[k]) {
                massConst.perTax += (mus[k][kk]);
            }
        }
        $('.summ-tax-per').text(massConst.perTax);
        MainUser.perTax = massConst.perTax;
        summ();
    }

    summ();

// ---------------------------------- Service Object ---- Do not write! ------------------------------------

 window.MainUser = {
        iPrice: "",
        taxAll: 0,                           // Prefix Tax
        accPay: {},                          // Accounts Payable
        accRec: {},                          // Accounts Receivable
        accCil: 0,                           // Accounts Reconciliation
        paySum: 0,                           // Payroll Services Summa/month
        paySer: {},                          // Payroll Services
        invAcc: 0,                           // Inventory Accounting
        payTax: 0,                           // Payroll Tax Preparation and filing
        cosAcc: 0,                           // Cost Accounting
        gstHst: {},                          // GST/HST preparation and filing
        finRep: {},                          // Financial Statements reparation
        corTax: {},                          // Corporate tax preparation and filing
        perTax: 0,                           // Personal tax preparation and filing
        t1_Gen: {},
        GenInc: {},
        ChlExp: {},
        movExp: {},
        spoSup: {},
        dedEmp: {},
        invInc: {},
        invDed: {},
        renInc: {},
        selInc: {},
        selDed: {},
        selEmp: {},
        conBut: {},
        tuiAmo: {},
        othCre: {},
        forRep: {},
        nonRes: {},
    };

    document.addEventListener("DOMContentLoaded", function () {

        // -------------------------- Hover price --------------------------------------
        $('.combo-light').hover(function () {
            $('.num-light').toggleClass('animated infinite bounce slower')
        });
        $('.combo-base').hover(function () {
            $('.num-base').toggleClass('animated infinite bounce slower')
        });
        $('.combo-advanced').hover(function () {
            $('.num-advance').toggleClass('tada')
        });

        // -------------------------- Accounts Payable ----------------------------------------

        $('#acc-payable').on('click', function (event) {
            event.stopPropagation();
            if ($('#acc-payable').is(':checked')) {
                $('.modal-accounts-pay').fadeIn();
            } else {
                $('.modal-accounts-pay').fadeOut();
                $('.ch-select-pay').text('');
                massConst.accPay = 0;
                MainUser.accPay = {};
                summ();
            }
            $('#modal-accounts-pay').prop('selectedIndex', 0);

        });
        $('#modal-accounts-pay').change(function () {
            let optionSelected = $('option:selected', this).text();
            let newNum = PRICEConstructor.accPay[optionSelected];
            $('.ch-select-pay').text(optionSelected);
            massConst.accPay = Number(newNum);
            MainUser.accPay[optionSelected] = Number(newNum);
            $('.modal-accounts-pay').fadeOut();
            summ();
        });

        // -------------------------- Accounts Receivable ----------------------------------------

        $('#acc-rec').on('click', function (event) {
            event.stopPropagation();
            if ($('#acc-rec').is(':checked')) {
                $('.modal-accounts-rec').fadeIn();
            } else {
                $('.modal-accounts-rec').fadeOut();
                $('.ch-select-rec').text('');
                massConst.accRec = 0;
                MainUser.accRec = {};
                summ();
            }
            $('#modal-accounts-rec').prop('selectedIndex', 0);
        });
        $('#modal-accounts-rec').change(function () {
            let optionSelected = $('option:selected', this).text();
            let newNum = PRICEConstructor.accRec[optionSelected];
            $('.ch-select-rec').text(optionSelected);
            massConst.accRec = Number(newNum);
            MainUser.accRec[optionSelected] = Number(newNum);
            $('.modal-accounts-rec').fadeOut();
            summ();
        });

        // -------------------------- Accounts Reconciliation--------------------------------------

        $('#acc-cil').on('click', function (event) {
            event.stopPropagation();
            if ($('#acc-cil').is(':checked')) {
                massConst.accCil = PRICEConstructor.accCil;
                MainUser.accCil = PRICEConstructor.accCil;
            } else {
                massConst.accCil = 0;
                MainUser.accCil = 0;
            }
            summ();
        });
        // -------------------------- paySer  select constructor--------------------------------------

        $('#pay-ser').on('click', function (event) {
            event.stopPropagation();
            if ($('#pay-ser').is(':checked')) {
                $('.modal-payroll').fadeIn();
            } else {
                $('.modal-payroll').fadeOut();
                $('.ch-select-ser').text('');
                $("#pay-tax").prop("checked", false);
                massConst.paySer = 0;
                massConst.paySum = 0;
                massConst.payTax = 0;
                MainUser.paySer = {};
                MainUser.payTax = 0;
                summ();
            }
            $('#modal-payroll').prop('selectedIndex', 0);

        });

        $('#modal-payroll').change(function () {
            let optionSelected = $('option:selected', this).text();
            let newNum = PRICEConstructor.paySer[optionSelected];
            let priceinput = PRICEConstructor.paySer['how many'];
            let enterinput = $('#ph').val();
            enterinput = Number(enterinput);
            if (enterinput === 0) {
                enterinput = 1
            }
            $('.ch-select-ser').text("  " + enterinput + " per  " + optionSelected);

            massConst.paySum = (priceinput * enterinput * newNum) / 12;
            MainUser.paySum = massConst.paySum.toFixed(2);
            MainUser.paySer['period'] = optionSelected;
            MainUser.paySer['How many'] = enterinput;
            // MainUser.paySer['payPerson'] = priceinput;


            $('#ph').val('');
            $('.modal-payroll').fadeOut();
            summ();
        });

        // -------------------------- invAcc  select constructor--------------------------------------

        $('#inv-acc').on('click', function (event) {

            event.stopPropagation();
            if ($('#inv-acc').is(':checked')) {
                massConst.invAcc = PRICEConstructor.invAcc;
                MainUser.invAcc = PRICEConstructor.invAcc;
            } else {
                massConst.invAcc = 0;
                MainUser.invAcc = 0;
            }
            summ();
        });

        // -------------------------- payTax select constructor--------------------------------------

        $('#pay-tax').on('click', function (event) {
            event.stopPropagation();

            if ($('#pay-ser').is(':checked')) {
                if ($('#pay-tax').is(':checked')) {
                    massConst.payTax = PRICEConstructor.payTax;
                    MainUser.payTax = PRICEConstructor.payTax;
                } else {
                    massConst.payTax = 0;
                    MainUser.payTax = 0;
                }
                summ();
            } else {

                $("#pay-ser").prop("checked", true);
                $('.modal-payroll').fadeIn();
                massConst.payTax = PRICEConstructor.payTax;
                MainUser.payTax = PRICEConstructor.payTax;
                summ();
            }
        });

        // -------------------------- cosAcc --------- Each select constructor--------------------------------------
        $('#cos-acc').on('click', function (event) {

            event.stopPropagation();
            if ($('#cos-acc').is(':checked')) {
                massConst.cosAcc = PRICEConstructor.cosAcc;
                MainUser.cosAcc = PRICEConstructor.cosAcc;
            } else {
                massConst.cosAcc = 0;
                MainUser.cosAcc = 0;
            }
            summ();
        });

        // -------------------------- gstHst --------- Each select constructor--------------------------------------

        $('#gst-hst').on('click', function (event) {
            event.stopPropagation();
            if ($('#gst-hst').is(':checked')) {
                $('.modal-gst').fadeIn();
            } else {
                $('.modal-gst').fadeOut();
                $('.ch-select-gst').text('');
                massConst.gstHst = 0;
                MainUser.gstHst = {};
                summ();
            }
            $('#modal-gst').prop('selectedIndex', 0);
        });
        $('#modal-gst').change(function () {
            let optionSelected = $('option:selected', this).text();
            let newNum = PRICEConstructor.gstHst[optionSelected];
            $('.ch-select-gst').text(optionSelected);
            massConst.gstHst = Number(newNum);
            MainUser.gstHst[optionSelected] = Number(newNum);
            $('.modal-gst').fadeOut();
            summ();
        });

        // -------------------------- finRep ----------Each select constructor--------------------------------------
        $('#fin-rep').on('click', function (event) {
            event.stopPropagation();
            if ($('#fin-rep').is(':checked')) {
                $('.modal-fin').fadeIn();
            } else {
                $('.modal-fin').fadeOut();
                $('.modal-corp').fadeOut();
                $('.ch-select-fin').text('');
                $("#cor-tax").prop("checked", false);
                massConst.finRep = 0;
                massConst.corTax = 0;
                MainUser.finRep = {};
                MainUser.corTax = {};
                summ();
            }
            $('#modal-fin').prop('selectedIndex', 0);

        });
        $('#modal-fin').change(function () {
            let optionSelected = $('option:selected', this).text();
            let newNum = PRICEConstructor.finRep[optionSelected];
            // $('.ch-select-fin').text(optionSelected);
            massConst.finRep = Number(newNum);
            MainUser.finRep[optionSelected] = Number(newNum);
            $('.modal-fin').fadeOut();
            summ();

        });

        // -------------------------- corTax ----------Each select constructor--------------------------------------
        $('#cor-tax').on('click', function (event) {
            event.stopPropagation();
            if ($('#fin-rep').is(':checked')) {
                if ($('#cor-tax').is(':checked')) {
                    $('.modal-corp').fadeIn();
                } else {
                    $('.modal-corp').fadeOut();
                    $('.ch-select-cor').text('');
                    massConst.corTax = 0;
                    MainUser.corTax = {};
                    summ();
                }
                $('#modal-corp').change(function () {
                    let optionSelected = $('option:selected', this).text();
                    let newNum = PRICEConstructor.corTax[optionSelected];
                    $('.ch-select-cor').text(optionSelected);
                    massConst.corTax = Number(newNum);
                    MainUser.corTax[optionSelected] = Number(newNum);
                    $('.modal-corp').fadeOut();
                    summ();
                });
            } else {
                $("#fin-rep").prop("checked", true);
                $('.modal-fin').fadeIn();
                $("#cor-tax").prop("checked", false);
            }
            $('#modal-corp').prop('selectedIndex', 0);
        });

        // -------------------------- perTax ----------Each select constructor--------------------------------------

        $('#personal-tax').on('click', function (event) {
            event.stopPropagation();

            if ($('#personal-tax').is(':checked')) {
                $('.modal-personal-tax').fadeIn();
                $('.shadow').fadeIn();

                $('.input_pers').on('click', function () {
                    let putstr = $(this).attr('data-target');
                    putstr_split = putstr.split('.');
                    let putstr1 = putstr_split[0];
                    let putstr2 = putstr_split[1];
                    let t_num = PRICEConstructor[putstr1][putstr2];
                    if ($(this).is(':checked')) {
                        mus[putstr1][putstr2] = Number(t_num);
                        MainUser[putstr1][putstr2] = Number(t_num);

                    } else {
                        delete mus[putstr1][putstr2];
                        delete MainUser[putstr1][putstr2];

                    }
                    mus_summ();
                });
            } else {
                $('.modal-personal-tax').fadeOut();
            }

        });
// -------------------------------- Shadow Modal win Peraonal Tax ---------------------------

        $('.shadow, #btn-personal-tax').on('click', function () {
            $('.shadow').fadeOut();
            $('.modal-personal-tax').fadeOut();
            $("#personal-tax").prop("checked", false);
        });

        // ------------------------------ ToolTip -------------------------------------
        tooltip('.info,.info-personal', 20, -275);
        tooltip('.info-left', 20, -275);

        function tooltip(div, mY, mX) {
            $(div).mousemove(function (eventObject) {
                let show_div = $(this).attr('data-toggle');
                $(show_div).css({"top": eventObject.pageY + mY, "left": eventObject.pageX + mX}).show();
            }).mouseout(function () {
                let show_div = $(this).attr('data-toggle');
                $(show_div).css({"top": 0, "left": 0}).hide();
            });
        }

        // ---------------------------------------------------------------------------
        jQuery(function ($) {
            $('#personal-table').stacktable()
        });

    }); // end of document.ready()


