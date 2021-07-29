
// -------------------------- Price List of services -------------------------------
   makePriceConstructor = function (iData) {

     return PRICEConstructor = {
        taxAll: iData.taxAll,                                                   //  Prefix Tax
        accPay: {                                                               //  Accounts Payable
            '01-10 vendors': iData.accounts_payable_01_10_vendors,
            '11-20 vendors': iData.accounts_payable_11_20_vendors,
            '21-30 vendors': iData.accounts_payable_21_30_vendors,
            '31-40 vendors': iData.accounts_payable_31_40_vendors,
            '41-50 vendors': iData.accounts_payable_41_50_vendors
        },
        accRec: {                     // Accounts Receivable
            '01-10 customers': iData.accounts_receivable_01_10_customers,
            '11-20 customers': iData.accounts_receivable_11_20_customers,
            '21-30 customers': iData.accounts_receivable_21_30_customers,
            '31-40 customers': iData.accounts_receivable_31_40_customers,
            '41-50 customers': iData.accounts_receivable_41_50_customers
        },
        accCil: iData.accounts_reconciliation,                             // Accounts Reconciliation
        paySer: {                                                          // Payroll Services
            'how many': iData.payroll_services_how_many,                      // for each
            'weekly': iData.payroll_services_weekly,
            'bi-weekly': iData.payroll_services_bi_weekly,
            'semi-monthly': iData.payroll_services_semi_monthly,
            'monthly': iData.payroll_services_monthly,
            'yearly': iData.payroll_services_yearly
        },
        invAcc: iData.inventory_accounting,                                  // Inventory Accounting
        payTax: iData.payroll_tax_preparation_and_filing,                  // Payroll Tax Preparation and filing
        cosAcc: iData.cost_accounting,                                    // Cost Accounting
        gstHst: {                                                         // GST/HST preparation and filing
            'monthly': iData.gst_hst_preparation_and_filing_monthly,
            'quarterly': iData.gst_hst_preparation_and_filing_quarterly,
            'yearly': iData.gst_hst_preparation_and_filing_yearly
        },
        finRep: {                                                         // Financial Statements reparation
            'monthly': iData.financial_statements_reparation_monthly,
            'quarterly': iData.financial_statements_reparation_quarterly,
            'yearly': iData.financial_statements_reparation_yearly
        },
        corTax: {                                                        // Corporate tax preparation and filing
            'monthly': iData.corporate_tax_preparation_and_filing_monthly,
            'quarterly': iData.corporate_tax_preparation_and_filing_quarterly,
            'yearly': iData.corporate_tax_preparation_and_filing_yearly
        },

        // Personal tax preparation and filing (title:,Taxpayer:,Spouse:,Dependant 1:,Dependant 2:,Dependant 3:)

        t1_Gen: {'tax': iData.t1_general_taxpayer, 'spo': iData.t1_general_spouse, 'd1': iData.t1_general_dependant1, 'd2': iData.t1_general_dependant2, 'd3': iData.t1_general_dependant3},                 // T1 general
        GenInc: {'tax': iData.general_income_taxpayer, 'spo': iData.general_income_spouse, 'd1': iData.general_income_dependant1, 'd2': iData.general_income_dependant2, 'd3': iData.general_income_dependant3},             // General Income
        ChlExp: {'tax': iData.child_care_expenses_taxpayer, 'spo': iData.child_care_expenses_spouse, 'd1': iData.child_care_expenses_dependant1, 'd2': iData.child_care_expenses_dependant2, 'd3': iData.child_care_expenses_dependant3},        // Child Care Expenses
        movExp: {'tax': iData.moving_expenses_taxpayer, 'spo': iData.moving_expenses_spouse, 'd1': iData.moving_expenses_dependant1, 'd2': iData.moving_expenses_dependant2, 'd3': iData.moving_expenses_dependant3},            // Moving Expenses
        spoSup: {'tax': iData.spousal_support_taxpayer, 'spo': iData.spousal_support_spouse, 'd1': iData.spousal_support_dependant1, 'd2': iData.spousal_support_dependant2, 'd3': iData.spousal_support_dependant3},            // Spousal support
        dedEmp: {'tax': iData.deductible_employment_exp_taxpayer, 'spo': iData.deductible_employment_exp_spouse, 'd1': iData.deductible_employment_exp_dependant1, 'd2': iData.deductible_employment_exp_dependant2, 'd3': iData.deductible_employment_exp_dependant3},  // Deductible Employment Exp
        invInc: {'tax': iData.investment_income_taxpayer, 'spo': iData.investment_income_spouse, 'd1': iData.investment_income_dependant1, 'd2': iData.investment_income_dependant2, 'd3': iData.investment_income_dependant3},          // Investment Income
        invDed: {'tax': iData.investment_deductions_taxpayer, 'spo': iData.investment_deductions_spouse, 'd1': iData.investment_deductions_dependant1, 'd2': iData.investment_deductions_dependant2, 'd3': iData.investment_deductions_dependant3},      // Investment Deductions
        renInc: {'tax': iData.rental_income_taxpayer, 'spo': iData.rental_income_spouse, 'd1': iData.rental_income_dependant1, 'd2': iData.rental_income_dependant2, 'd3': iData.rental_income_dependant3},              // Rental Income
        selInc: {'tax': iData.self_employment_income_taxpayer, 'spo': iData.self_employment_income_spouse, 'd1': iData.self_employment_income_dependant1, 'd2': iData.self_employment_income_dependant2, 'd3': iData.self_employment_income_dependant3},     // Self-Employment Income
        selDed: {'tax': iData.self_employment_deductions_taxpayer, 'spo': iData.self_employment_deductions_spouse, 'd1': iData.self_employment_deductions_dependant1, 'd2': iData.self_employment_deductions_dependant2, 'd3': iData.self_employment_deductions_dependant3}, // Self-Employment Deductions
        selEmp: {'tax': iData.self_employment_hst_taxpayer, 'spo': iData.self_employment_hst_spouse, 'd1': iData.self_employment_hst_dependant1, 'd2': iData.self_employment_hst_dependant2, 'd3': iData.self_employment_hst_dependant3},        // Self-Employment HST
        conBut: {'tax': iData.rrsp_prpp_contributions_taxpayer, 'spo': iData.rrsp_prpp_contributions_spouse, 'd1': iData.rrsp_prpp_contributions_dependant1, 'd2': iData.rrsp_prpp_contributions_dependant2, 'd3': iData.rrsp_prpp_contributions_dependant3},    // RRSP/PRPP Contributions
        tuiAmo: {'tax': iData.tuition_amount_taxpayer, 'spo': iData.tuition_amount_spouse, 'd1': iData.tuition_amount_dependant1, 'd2': iData.tuition_amount_dependant2, 'd3': iData.tuition_amount_dependant3},             // Tuition amount
        othCre: {'tax': iData.other_credits_taxpayer, 'spo': iData.other_credits_spouse, 'd1': iData.other_credits_dependant1, 'd2': iData.other_credits_dependant2, 'd3': iData.other_credits_dependant3},              // Other Credits
        forRep: {'tax': iData.foreign_reporting_taxpayer, 'spo': iData.foreign_reporting_spouse, 'd1': iData.foreign_reporting_dependant1, 'd2': iData.foreign_reporting_dependant2, 'd3': iData.foreign_reporting_dependant3},          // Forein Reporting
        nonRes: {'tax': iData.non_resident_income_taxpayer, 'spo': iData.non_resident_income_spouse, 'd1': iData.non_resident_income_dependant1, 'd2': iData.non_resident_income_dependant2, 'd3': iData.non_resident_income_dependant3},        // Non-resident Income

    }
}

