<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTariffsTable extends Migration
{

    public function up()
    {
        Schema::create('tariffs', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 50);
            $table->integer('price')->default(0)->unsigned();
            $table->string('row1', 50)->nullable();
            $table->string('row2', 50)->nullable();
            $table->string('row3', 50)->nullable();
            $table->string('row4', 50)->nullable();
            $table->string('row5', 50)->nullable();
            $table->string('row6', 50)->nullable();
            $table->string('row7', 50)->nullable();
            $table->string('row8', 50)->nullable();
            $table->string('row9', 50)->nullable();
            $table->string('row10', 50)->nullable();
            $table->string('row11', 50)->nullable();
            $table->string('description')->nullable();
            $table->tinyInteger('visible')->default(0);
            $table->string('slug', 100)->unique();

            $table->integer('taxAll')->nullable();

            $table->integer('accounts_payable_01_10_vendors')->nullable();
            $table->integer('accounts_payable_11_20_vendors')->nullable();
            $table->integer('accounts_payable_21_30_vendors')->nullable();
            $table->integer('accounts_payable_31_40_vendors')->nullable();
            $table->integer('accounts_payable_41_50_vendors')->nullable();

            $table->integer('accounts_receivable_01_10_customers')->nullable();
            $table->integer('accounts_receivable_11_20_customers')->nullable();
            $table->integer('accounts_receivable_21_30_customers')->nullable();
            $table->integer('accounts_receivable_31_40_customers')->nullable();
            $table->integer('accounts_receivable_41_50_customers')->nullable();

            $table->integer('accounts_reconciliation')->nullable();

            $table->integer('payroll_services_how_many')->nullable();
            $table->integer('payroll_services_weekly')->nullable();
            $table->integer('payroll_services_bi_weekly')->nullable();
            $table->integer('payroll_services_semi_monthly')->nullable();
            $table->integer('payroll_services_monthly')->nullable();
            $table->integer('payroll_services_yearly')->nullable();

            $table->integer('inventory_accounting')->nullable();
            $table->integer('payroll_tax_preparation_and_filing')->nullable();
            $table->integer('cost_accounting')->nullable();

            $table->integer('gst_hst_preparation_and_filing_monthly')->nullable();
            $table->integer('gst_hst_preparation_and_filing_quarterly')->nullable();
            $table->integer('gst_hst_preparation_and_filing_yearly')->nullable();


            $table->integer('financial_statements_reparation_monthly')->nullable();
            $table->integer('financial_statements_reparation_quarterly')->nullable();
            $table->integer('financial_statements_reparation_yearly')->nullable();

            $table->integer('corporate_tax_preparation_and_filing_monthly')->nullable();
            $table->integer('corporate_tax_preparation_and_filing_quarterly')->nullable();
            $table->integer('corporate_tax_preparation_and_filing_yearly')->nullable();

            // Personal tax preparation and filing (title =>,Taxpayer =>,Spouse =>,Dependant 1 =>,Dependant 2 =>,Dependant 3 =>)

            $table->integer('t1_general_taxpayer')->nullable();
            $table->integer('t1_general_spouse')->nullable();
            $table->integer('t1_general_dependant1')->nullable();
            $table->integer('t1_general_dependant2')->nullable();
            $table->integer('t1_general_dependant3')->nullable();

            $table->integer('general_income_taxpayer')->nullable();
            $table->integer('general_income_spouse')->nullable();
            $table->integer('general_income_dependant1')->nullable();
            $table->integer('general_income_dependant2')->nullable();
            $table->integer('general_income_dependant3')->nullable();

            $table->integer('child_care_expenses_taxpayer')->nullable();
            $table->integer('child_care_expenses_spouse')->nullable();
            $table->integer('child_care_expenses_dependant1')->nullable();
            $table->integer('child_care_expenses_dependant2')->nullable();
            $table->integer('child_care_expenses_dependant3')->nullable();

            $table->integer('moving_expenses_taxpayer')->nullable();
            $table->integer('moving_expenses_spouse')->nullable();
            $table->integer('moving_expenses_dependant1')->nullable();
            $table->integer('moving_expenses_dependant2')->nullable();
            $table->integer('moving_expenses_dependant3')->nullable();

            $table->integer('spousal_support_taxpayer')->nullable();
            $table->integer('spousal_support_spouse')->nullable();
            $table->integer('spousal_support_dependant1')->nullable();
            $table->integer('spousal_support_dependant2')->nullable();
            $table->integer('spousal_support_dependant3')->nullable();

            $table->integer('deductible_employment_exp_taxpayer')->nullable();
            $table->integer('deductible_employment_exp_spouse')->nullable();
            $table->integer('deductible_employment_exp_dependant1')->nullable();
            $table->integer('deductible_employment_exp_dependant2')->nullable();
            $table->integer('deductible_employment_exp_dependant3')->nullable();

            $table->integer('investment_income_taxpayer')->nullable();
            $table->integer('investment_income_spouse')->nullable();
            $table->integer('investment_income_dependant1')->nullable();
            $table->integer('investment_income_dependant2')->nullable();
            $table->integer('investment_income_dependant3')->nullable();

            $table->integer('investment_deductions_taxpayer')->nullable();
            $table->integer('investment_deductions_spouse')->nullable();
            $table->integer('investment_deductions_dependant1')->nullable();
            $table->integer('investment_deductions_dependant2')->nullable();
            $table->integer('investment_deductions_dependant3')->nullable();

            $table->integer('rental_income_taxpayer')->nullable();
            $table->integer('rental_income_spouse')->nullable();
            $table->integer('rental_income_dependant1')->nullable();
            $table->integer('rental_income_dependant2')->nullable();
            $table->integer('rental_income_dependant3')->nullable();

            $table->integer('self_employment_income_taxpayer')->nullable();
            $table->integer('self_employment_income_spouse')->nullable();
            $table->integer('self_employment_income_dependant1')->nullable();
            $table->integer('self_employment_income_dependant2')->nullable();
            $table->integer('self_employment_income_dependant3')->nullable();

            $table->integer('self_employment_deductions_taxpayer')->nullable();
            $table->integer('self_employment_deductions_spouse')->nullable();
            $table->integer('self_employment_deductions_dependant1')->nullable();
            $table->integer('self_employment_deductions_dependant2')->nullable();
            $table->integer('self_employment_deductions_dependant3')->nullable();

            $table->integer('self_employment_hst_taxpayer')->nullable();
            $table->integer('self_employment_hst_spouse')->nullable();
            $table->integer('self_employment_hst_dependant1')->nullable();
            $table->integer('self_employment_hst_dependant2')->nullable();
            $table->integer('self_employment_hst_dependant3')->nullable();

            $table->integer('rrsp_prpp_contributions_taxpayer')->nullable();
            $table->integer('rrsp_prpp_contributions_spouse')->nullable();
            $table->integer('rrsp_prpp_contributions_dependant1')->nullable();
            $table->integer('rrsp_prpp_contributions_dependant2')->nullable();
            $table->integer('rrsp_prpp_contributions_dependant3')->nullable();

            $table->integer('tuition_amount_taxpayer')->nullable();
            $table->integer('tuition_amount_spouse')->nullable();
            $table->integer('tuition_amount_dependant1')->nullable();
            $table->integer('tuition_amount_dependant2')->nullable();
            $table->integer('tuition_amount_dependant3')->nullable();

            $table->integer('other_credits_taxpayer')->nullable();
            $table->integer('other_credits_spouse')->nullable();
            $table->integer('other_credits_dependant1')->nullable();
            $table->integer('other_credits_dependant2')->nullable();
            $table->integer('other_credits_dependant3')->nullable();

            $table->integer('foreign_reporting_taxpayer')->nullable();
            $table->integer('foreign_reporting_spouse')->nullable();
            $table->integer('foreign_reporting_dependant1')->nullable();
            $table->integer('foreign_reporting_dependant2')->nullable();
            $table->integer('foreign_reporting_dependant3')->nullable();

            $table->integer('non_resident_income_taxpayer')->nullable();
            $table->integer('non_resident_income_spouse')->nullable();
            $table->integer('non_resident_income_dependant1')->nullable();
            $table->integer('non_resident_income_dependant2')->nullable();
            $table->integer('non_resident_income_dependant3')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tariffs');
    }
}
