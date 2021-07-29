@extends('admin.master')

@section('content')


    <section class="content-header">
        <div class="container firm-border p-3 bg-white shadow">
            <div class="row">

                <div class="col-sm-6">
                    <h4 class="card-title">Editing a tariff "Constructor"</h4>
                </div>
            </div>


            <form role="form" method="post" action="{{route('tariff.update',['tariff' => $tariff->id, 'add'=>'1'])}}">
                @csrf
                @method('PUT')

                <div class="card-footer row">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary"> Save</button>
                    </div>
                    <div class="col-md-2 ml-auto">
                        <a href="{{ URL::previous() }}" class="btn btn-info btn-block">Return</a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Name</label>
                        <div class="col-sm-11">
                            <input type="text" name="name" disabled class="form-control @error('name') is-invalid @enderror" value="{{$tariff->name}}">
                            <input type="text" name="name" hidden value="{{$tariff->name}}">
                        </div>
                        <label class="col-sm-1 col-form-label">Price $</label>
                        <div class="col-sm-11"><input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{$tariff->price}}"></div>
                        <label class="col-sm-4 col-form-label">Description (remark only for myself)</label>
                        <div class="col-sm-8"><input type="text" name="description" class="form-control"></div>
                        <div class="col-sm-8"><br><label style="color:blue;"><input type="checkbox" name="visible" value="1" @if($tariff->visible) checked @endif"> Visible</label></div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Content</label>
                        <div class="col-sm-10"><input type="text" name="row1" class="form-control" placeholder="-" value="{{$tariff->row1}}"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row2" class="form-control" placeholder="-" value="{{$tariff->row2}}"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row3" class="form-control" placeholder="-" value="{{$tariff->row3}}"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row4" class="form-control" placeholder="-" value="{{$tariff->row4}}"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row5" class="form-control" placeholder="-" value="{{$tariff->row5}}"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row6" class="form-control" placeholder="-" value="{{$tariff->row6}}"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row7" class="form-control" placeholder="-" value="{{$tariff->row7}}"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row8" class="form-control" placeholder="-" value="{{$tariff->row8}}"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row9" class="form-control" placeholder="-" value="{{$tariff->row9}}"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row10" class="form-control" placeholder="-" value="{{$tariff->row10}}"></div>
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><input type="text" name="row11" class="form-control" placeholder="-" value="{{$tariff->row11}}"></div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Prefix Tax</label>
                        <div class="col-sm-10"><input type="number" name="taxAll" class="form-control" value="{{$tariff->taxAll}}"></div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Accounts payable 01-10 vendors</label>
                        <div class="col-sm-8"><input type="number" name="accounts_payable_01_10_vendors" class="form-control" value="{{$tariff->accounts_payable_01_10_vendors}}"></div>
                        <label class="col-sm-4 col-form-label">Accounts payable 11-20 vendors</label>
                        <div class="col-sm-8"><input type="number" name="accounts_payable_11_20_vendors" class="form-control" value="{{$tariff->accounts_payable_11_20_vendors}}"></div>
                        <label class="col-sm-4 col-form-label">Accounts payable 21-30 vendors</label>
                        <div class="col-sm-8"><input type="number" name="accounts_payable_21_30_vendors" class="form-control" value="{{$tariff->accounts_payable_21_30_vendors}}"></div>
                        <label class="col-sm-4 col-form-label">Accounts payable 31-40 vendors</label>
                        <div class="col-sm-8"><input type="number" name="accounts_payable_31_40_vendors" class="form-control" value="{{$tariff->accounts_payable_31_40_vendors}}"></div>
                        <label class="col-sm-4 col-form-label">Accounts payable 41-50 vendors</label>
                        <div class="col-sm-8"><input type="number" name="accounts_payable_41_50_vendors" class="form-control" value="{{$tariff->accounts_payable_41_50_vendors}}"></div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Accounts receivable 01-10 customers</label>
                        <div class="col-sm-8"><input type="number" name="accounts_receivable_01_10_customers" class="form-control" value="{{$tariff->accounts_receivable_01_10_customers}}"></div>
                        <label class="col-sm-4 col-form-label">Accounts receivable 11-20 customers</label>
                        <div class="col-sm-8"><input type="number" name="accounts_receivable_11_20_customers" class="form-control" value="{{$tariff->accounts_receivable_11_20_customers}}"></div>
                        <label class="col-sm-4 col-form-label">Accounts receivable 21-30 customers</label>
                        <div class="col-sm-8"><input type="number" name="accounts_receivable_21_30_customers" class="form-control" value="{{$tariff->accounts_receivable_21_30_customers}}"></div>
                        <label class="col-sm-4 col-form-label">Accounts receivable 31-40 customers</label>
                        <div class="col-sm-8"><input type="number" name="accounts_receivable_31_40_customers" class="form-control" value="{{$tariff->accounts_receivable_31_40_customers}}"></div>
                        <label class="col-sm-4 col-form-label">Accounts receivable 41-50 customers</label>
                        <div class="col-sm-8"><input type="number" name="accounts_receivable_41_50_customers" class="form-control" value="{{$tariff->accounts_receivable_41_50_customers}}"></div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Accounts reconciliation</label>
                        <div class="col-sm-8"><input type="number" name="accounts_reconciliation" class="form-control" value="{{$tariff->accounts_reconciliation}}"></div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Payroll services how many</label>
                        <div class="col-sm-8"><input type="number" name="payroll_services_how_many" class="form-control" value="{{$tariff->payroll_services_how_many}}"></div>
                        <label class="col-sm-4 col-form-label">Payroll services weekly</label>
                        <div class="col-sm-8"><input type="number" name="payroll_services_weekly" class="form-control" value="{{$tariff->payroll_services_weekly}}"></div>
                        <label class="col-sm-4 col-form-label">Payroll services bi_weekly</label>
                        <div class="col-sm-8"><input type="number" name="payroll_services_bi_weekly" class="form-control" value="{{$tariff->payroll_services_bi_weekly}}"></div>
                        <label class="col-sm-4 col-form-label">Payroll services semi-monthly</label>
                        <div class="col-sm-8"><input type="number" name="payroll_services_semi_monthly" class="form-control" value="{{$tariff->payroll_services_semi_monthly}}"></div>
                        <label class="col-sm-4 col-form-label">Payroll services monthly</label>
                        <div class="col-sm-8"><input type="number" name="payroll_services_monthly" class="form-control" value="{{$tariff->payroll_services_monthly}}"></div>
                        <label class="col-sm-4 col-form-label">Payroll services yearly</label>
                        <div class="col-sm-8"><input type="number" name="payroll_services_yearly" class="form-control" value="{{$tariff->payroll_services_yearly}}"></div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Inventory accounting</label>
                        <div class="col-sm-8"><input type="number" name="inventory_accounting" class="form-control" value="{{$tariff->inventory_accounting}}"></div>
                        <label class="col-sm-4 col-form-label">Payroll tax preparation and filing</label>
                        <div class="col-sm-8"><input type="number" name="payroll_tax_preparation_and_filing" class="form-control" value="{{$tariff->payroll_tax_preparation_and_filing}}"></div>
                        <label class="col-sm-4 col-form-label">Cost accounting</label>
                        <div class="col-sm-8"><input type="number" name="cost_accounting" class="form-control" value="{{$tariff->cost_accounting}}"></div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Gst hst preparation and filing monthly</label>
                        <div class="col-sm-8"><input type="number" name="gst_hst_preparation_and_filing_monthly" class="form-control" value="{{$tariff->gst_hst_preparation_and_filing_monthly}}"></div>
                        <label class="col-sm-4 col-form-label">Gst hst preparation and filing quarterly</label>
                        <div class="col-sm-8"><input type="number" name="gst_hst_preparation_and_filing_quarterly" class="form-control" value="{{$tariff->gst_hst_preparation_and_filing_quarterly}}"></div>
                        <label class="col-sm-4 col-form-label">Gst hst preparation and filing yearly</label>
                        <div class="col-sm-8"><input type="number" name="gst_hst_preparation_and_filing_yearly" class="form-control" value="{{$tariff->gst_hst_preparation_and_filing_yearly}}"></div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Financial statements reparation monthly</label>
                        <div class="col-sm-7"><input type="number" name="financial_statements_reparation_monthly" class="form-control" value="{{$tariff->financial_statements_reparation_monthly}}"></div>
                        <label class="col-sm-5 col-form-label">Financial statements reparation quarterly</label>
                        <div class="col-sm-7"><input type="number" name="financial_statements_reparation_quarterly" class="form-control" value="{{$tariff->financial_statements_reparation_quarterly}}"></div>
                        <label class="col-sm-5 col-form-label">Financial statements reparation yearly</label>
                        <div class="col-sm-7"><input type="number" name="financial_statements_reparation_yearly" class="form-control" value="{{$tariff->financial_statements_reparation_yearly}}"></div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Corporate tax preparation and filing monthly</label>
                        <div class="col-sm-7"><input type="number" name="corporate_tax_preparation_and_filing_monthly" class="form-control" value="{{$tariff->corporate_tax_preparation_and_filing_monthly}}"></div>
                        <label class="col-sm-5 col-form-label">Corporate tax preparation and filing quarterly</label>
                        <div class="col-sm-7"><input type="number" name="corporate_tax_preparation_and_filing_quarterly" class="form-control" value="{{$tariff->corporate_tax_preparation_and_filing_quarterly}}"></div>
                        <label class="col-sm-5 col-form-label">Corporate tax preparation and filing yearly</label>
                        <div class="col-sm-7"><input type="number" name="corporate_tax_preparation_and_filing_yearly" class="form-control" value="{{$tariff->corporate_tax_preparation_and_filing_yearly}}"></div>
                    </div>

                    <div class="form-group">
                        <table class="table table-striped table-hover text-nowrap table-sm ">
                            <thead>
                            <tr>
                                <th scope="col">Personal Tax</th>
                                <th scope="col">Taxpayer</th>
                                <th scope="col">Spouse</th>
                                <th scope="col">Dependant 1</th>
                                <th scope="col">Dependant 2</th>
                                <th scope="col">Dependant 3</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">T1 general</th>
                                <td><input type="number" name="t1_general_taxpayer" class="form-control" value="{{$tariff->t1_general_taxpayer}}"></td>
                                <td><input type="number" name="t1_general_spouse" class="form-control" value="{{$tariff->t1_general_spouse}}"></td>
                                <td><input type="number" name="t1_general_dependant1" class="form-control" value="{{$tariff->t1_general_dependant1}}"></td>
                                <td><input type="number" name="t1_general_dependant2" class="form-control" value="{{$tariff->t1_general_dependant2}}"></td>
                                <td><input type="number" name="t1_general_dependant3" class="form-control" value="{{$tariff->t1_general_dependant3}}"></td>
                            </tr>
                            <tr>
                                <th scope="row">General Income</th>
                                <td><input type="number" name="general_income_taxpayer" class="form-control" value="{{$tariff->general_income_taxpayer}}"></td>
                                <td><input type="number" name="general_income_spouse" class="form-control" value="{{$tariff->general_income_spouse}}"></td>
                                <td><input type="number" name="general_income_dependant1" class="form-control" value="{{$tariff->general_income_dependant1}}"></td>
                                <td><input type="number" name="general_income_dependant2" class="form-control" value="{{$tariff->general_income_dependant2}}"></td>
                                <td><input type="number" name="general_income_dependant3" class="form-control" value="{{$tariff->general_income_dependant3}}"></td>
                            </tr>
                            <tr>
                                <th scope="row">Child Care Expenses</th>
                                <td><input type="number" name="child_care_expenses_taxpayer" class="form-control" value="{{$tariff->child_care_expenses_taxpayer}}"></td>
                                <td><input type="number" name="child_care_expenses_spouse" class="form-control" value="{{$tariff->child_care_expenses_spouse}}"></td>
                                <td><input type="number" name="child_care_expenses_dependant1" class="form-control" value="{{$tariff->child_care_expenses_dependant1}}"></td>
                                <td><input type="number" name="child_care_expenses_dependant2" class="form-control" value="{{$tariff->child_care_expenses_dependant2}}"></td>
                                <td><input type="number" name="child_care_expenses_dependant3" class="form-control" value="{{$tariff->child_care_expenses_dependant3}}"></td>
                            </tr>
                            <tr>
                                <th scope="row">Moving Expenses</th>
                                <td><input type="number" name="moving_expenses_taxpayer" class="form-control" value="{{$tariff->moving_expenses_taxpayer}}"></td>
                                <td><input type="number" name="moving_expenses_spouse" class="form-control" value="{{$tariff->moving_expenses_spouse}}"></td>
                                <td><input type="number" name="moving_expenses_dependant1" class="form-control" value="{{$tariff->moving_expenses_dependant1}}"></td>
                                <td><input type="number" name="moving_expenses_dependant2" class="form-control" value="{{$tariff->moving_expenses_dependant2}}"></td>
                                <td><input type="number" name="moving_expenses_dependant3" class="form-control" value="{{$tariff->moving_expenses_dependant3}}"></td>
                            </tr>
                            <tr>
                                <th scope="row">Spousal support</th>
                                <td><input type="number" name="spousal_support_taxpayer" class="form-control" value="{{$tariff->spousal_support_taxpayer}}"></td>
                                <td><input type="number" name="spousal_support_spouse" class="form-control" value="{{$tariff->spousal_support_spouse}}"></td>
                                <td><input type="number" name="spousal_support_dependant1" class="form-control" value="{{$tariff->spousal_support_dependant1}}"></td>
                                <td><input type="number" name="spousal_support_dependant2" class="form-control" value="{{$tariff->spousal_support_dependant2}}"></td>
                                <td><input type="number" name="spousal_support_dependant3" class="form-control" value="{{$tariff->spousal_support_dependant3}}"></td>
                            </tr>
                            <tr>
                                <th scope="row">Deductible Employment Exp</th>
                                <td><input type="number" name="deductible_employment_exp_taxpayer" class="form-control" value="{{$tariff->deductible_employment_exp_taxpayer}}"></td>
                                <td><input type="number" name="deductible_employment_exp_spouse" class="form-control" value="{{$tariff->deductible_employment_exp_spouse}}"></td>
                                <td><input type="number" name="deductible_employment_exp_dependant1" class="form-control" value="{{$tariff->deductible_employment_exp_dependant1}}"></td>
                                <td><input type="number" name="deductible_employment_exp_dependant2" class="form-control" value="{{$tariff->deductible_employment_exp_dependant2}}"></td>
                                <td><input type="number" name="deductible_employment_exp_dependant3" class="form-control" value="{{$tariff->deductible_employment_exp_dependant3}}"></td>
                            </tr>
                            <tr>
                                <th scope="row">Investment Income</th>
                                <td><input type="number" name="investment_income_taxpayer" class="form-control" value="{{$tariff->investment_income_taxpayer}}"></td>
                                <td><input type="number" name="investment_income_spouse" class="form-control" value="{{$tariff->investment_income_spouse}}"></td>
                                <td><input type="number" name="investment_income_dependant1" class="form-control" value="{{$tariff->investment_income_dependant1}}"></td>
                                <td><input type="number" name="investment_income_dependant2" class="form-control" value="{{$tariff->investment_income_dependant2}}"></td>
                                <td><input type="number" name="investment_income_dependant3" class="form-control" value="{{$tariff->investment_income_dependant3}}"></td>
                            </tr>
                            <tr>
                                <th scope="row">Investment Deductions</th>
                                <td><input type="number" name="investment_deductions_taxpayer" class="form-control" value="{{$tariff->investment_deductions_taxpayer}}"></td>
                                <td><input type="number" name="investment_deductions_spouse" class="form-control" value="{{$tariff->investment_deductions_spouse}}"></td>
                                <td><input type="number" name="investment_deductions_dependant1" class="form-control" value="{{$tariff->investment_deductions_dependant1}}"></td>
                                <td><input type="number" name="investment_deductions_dependant2" class="form-control" value="{{$tariff->investment_deductions_dependant2}}"></td>
                                <td><input type="number" name="investment_deductions_dependant3" class="form-control" value="{{$tariff->investment_deductions_dependant3}}"></td>
                            </tr>
                            <tr>
                                <th scope="row">Rental Income</th>
                                <td><input type="number" name="rental_income_taxpayer" class="form-control" value="{{$tariff->rental_income_taxpayer}}"></td>
                                <td><input type="number" name="rental_income_spouse" class="form-control" value="{{$tariff->rental_income_spouse}}"></td>
                                <td><input type="number" name="rental_income_dependant1" class="form-control" value="{{$tariff->rental_income_dependant1}}"></td>
                                <td><input type="number" name="rental_income_dependant2" class="form-control" value="{{$tariff->rental_income_dependant2}}"></td>
                                <td><input type="number" name="rental_income_dependant3" class="form-control" value="{{$tariff->rental_income_dependant3}}"></td>
                            </tr>
                            <tr>
                                <th scope="row">Self-Employment Income</th>
                                <td><input type="number" name="self_employment_income_taxpayer" class="form-control" value="{{$tariff->self_employment_income_taxpayer}}"></td>
                                <td><input type="number" name="self_employment_income_spouse" class="form-control" value="{{$tariff->self_employment_income_spouse}}"></td>
                                <td><input type="number" name="self_employment_income_dependant1" class="form-control" value="{{$tariff->self_employment_income_dependant1}}"></td>
                                <td><input type="number" name="self_employment_income_dependant2" class="form-control" value="{{$tariff->self_employment_income_dependant2}}"></td>
                                <td><input type="number" name="self_employment_income_dependant3" class="form-control" value="{{$tariff->self_employment_income_dependant3}}"></td>
                            </tr>
                            <tr>
                                <th scope="row">Self-Employment Deductions</th>
                                <td><input type="number" name="self_employment_deductions_taxpayer" class="form-control" value="{{$tariff->self_employment_deductions_taxpayer}}"></td>
                                <td><input type="number" name="self_employment_deductions_spouse" class="form-control" value="{{$tariff->self_employment_deductions_spouse}}"></td>
                                <td><input type="number" name="self_employment_deductions_dependant1" class="form-control" value="{{$tariff->self_employment_deductions_dependant1}}"></td>
                                <td><input type="number" name="self_employment_deductions_dependant2" class="form-control" value="{{$tariff->self_employment_deductions_dependant2}}"></td>
                                <td><input type="number" name="self_employment_deductions_dependant3" class="form-control" value="{{$tariff->self_employment_deductions_dependant3}}"></td>
                            </tr>
                            <tr>
                                <th scope="row">Self-Employment HST</th>
                                <td><input type="number" name="self_employment_hst_taxpayer" class="form-control" value="{{$tariff->self_employment_hst_taxpayer}}"></td>
                                <td><input type="number" name="self_employment_hst_spouse" class="form-control" value="{{$tariff->self_employment_hst_spouse}}"></td>
                                <td><input type="number" name="self_employment_hst_dependant1" class="form-control" value="{{$tariff->self_employment_hst_dependant1}}"></td>
                                <td><input type="number" name="self_employment_hst_dependant2" class="form-control" value="{{$tariff->self_employment_hst_dependant2}}"></td>
                                <td><input type="number" name="self_employment_hst_dependant3" class="form-control" value="{{$tariff->self_employment_hst_dependant3}}"></td>
                            </tr>
                            <tr>
                                <th scope="row">RRSP/PRPP Contributions</th>
                                <td><input type="number" name="rrsp_prpp_contributions_taxpayer" class="form-control" value="{{$tariff->rrsp_prpp_contributions_taxpayer}}"></td>
                                <td><input type="number" name="rrsp_prpp_contributions_spouse" class="form-control" value="{{$tariff->rrsp_prpp_contributions_spouse}}"></td>
                                <td><input type="number" name="rrsp_prpp_contributions_dependant1" class="form-control" value="{{$tariff->rrsp_prpp_contributions_dependant1}}"></td>
                                <td><input type="number" name="rrsp_prpp_contributions_dependant2" class="form-control" value="{{$tariff->rrsp_prpp_contributions_dependant2}}"></td>
                                <td><input type="number" name="rrsp_prpp_contributions_dependant3" class="form-control" value="{{$tariff->rrsp_prpp_contributions_dependant3}}"></td>
                            </tr>
                            <tr>
                                <th scope="row">Tuition amount</th>
                                <td><input type="number" name="tuition_amount_taxpayer" class="form-control" value="{{$tariff->tuition_amount_taxpayer}}"></td>
                                <td><input type="number" name="tuition_amount_spouse" class="form-control" value="{{$tariff->tuition_amount_spouse}}"></td>
                                <td><input type="number" name="tuition_amount_dependant1" class="form-control" value="{{$tariff->tuition_amount_dependant1}}"></td>
                                <td><input type="number" name="tuition_amount_dependant2" class="form-control" value="{{$tariff->tuition_amount_dependant2}}"></td>
                                <td><input type="number" name="tuition_amount_dependant3" class="form-control" value="{{$tariff->tuition_amount_dependant3}}"></td>
                            </tr>
                            <tr>
                                <th scope="row">Other Credits</th>
                                <td><input type="number" name="other_credits_taxpayer" class="form-control" value="{{$tariff->other_credits_taxpayer}}"></td>
                                <td><input type="number" name="other_credits_spouse" class="form-control" value="{{$tariff->other_credits_spouse}}"></td>
                                <td><input type="number" name="other_credits_dependant1" class="form-control" value="{{$tariff->other_credits_dependant1}}"></td>
                                <td><input type="number" name="other_credits_dependant2" class="form-control" value="{{$tariff->other_credits_dependant2}}"></td>
                                <td><input type="number" name="other_credits_dependant3" class="form-control" value="{{$tariff->other_credits_dependant3}}"></td>
                            </tr>
                            <tr>
                                <th scope="row">Forein Reporting</th>
                                <td><input type="number" name="foreign_reporting_taxpayer" class="form-control" value="{{$tariff->foreign_reporting_taxpayer}}"></td>
                                <td><input type="number" name="foreign_reporting_spouse" class="form-control" value="{{$tariff->foreign_reporting_spouse}}"></td>
                                <td><input type="number" name="foreign_reporting_dependant1" class="form-control" value="{{$tariff->foreign_reporting_dependant1}}"></td>
                                <td><input type="number" name="foreign_reporting_dependant2" class="form-control" value="{{$tariff->foreign_reporting_dependant2}}"></td>
                                <td><input type="number" name="foreign_reporting_dependant3" class="form-control" value="{{$tariff->foreign_reporting_dependant3}}"></td>
                            </tr>
                            <tr>
                                <th scope="row">Non-resident Income</th>
                                <td><input type="number" name="non_resident_income_taxpayer" class="form-control" value="{{$tariff->non_resident_income_taxpayer}}"></td>
                                <td><input type="number" name="non_resident_income_spouse" class="form-control" value="{{$tariff->non_resident_income_spouse}}"></td>
                                <td><input type="number" name="non_resident_income_dependant1" class="form-control" value="{{$tariff->non_resident_income_dependant1}}"></td>
                                <td><input type="number" name="non_resident_income_dependant2" class="form-control" value="{{$tariff->non_resident_income_dependant2}}"></td>
                                <td><input type="number" name="non_resident_income_dependant3" class="form-control" value="{{$tariff->non_resident_income_dependant3}}"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </section>

@endsection


