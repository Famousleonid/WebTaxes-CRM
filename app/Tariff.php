<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * App\Tariff
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property string|null $row1
 * @property string|null $row2
 * @property string|null $row3
 * @property string|null $row4
 * @property string|null $row5
 * @property string|null $row6
 * @property string|null $row7
 * @property string|null $row8
 * @property string|null $row9
 * @property string|null $row10
 * @property string|null $row11
 * @property string|null $description
 * @property int $visible
 * @property string $slug
 * @property int|null $taxAll
 * @property int|null $accounts_payable_01_10_vendors
 * @property int|null $accounts_payable_11_20_vendors
 * @property int|null $accounts_payable_21_30_vendors
 * @property int|null $accounts_payable_31_40_vendors
 * @property int|null $accounts_payable_41_50_vendors
 * @property int|null $accounts_receivable_01_10_customers
 * @property int|null $accounts_receivable_11_20_customers
 * @property int|null $accounts_receivable_21_30_customers
 * @property int|null $accounts_receivable_31_40_customers
 * @property int|null $accounts_receivable_41_50_customers
 * @property int|null $accounts_reconciliation
 * @property int|null $payroll_services_how_many
 * @property int|null $payroll_services_weekly
 * @property int|null $payroll_services_bi_weekly
 * @property int|null $payroll_services_semi_monthly
 * @property int|null $payroll_services_monthly
 * @property int|null $payroll_services_yearly
 * @property int|null $inventory_accounting
 * @property int|null $payroll_tax_preparation_and_filing
 * @property int|null $cost_accounting
 * @property int|null $gst_hst_preparation_and_filing_monthly
 * @property int|null $gst_hst_preparation_and_filing_quarterly
 * @property int|null $gst_hst_preparation_and_filing_yearly
 * @property int|null $financial_statements_reparation_monthly
 * @property int|null $financial_statements_reparation_quarterly
 * @property int|null $financial_statements_reparation_yearly
 * @property int|null $corporate_tax_preparation_and_filing_monthly
 * @property int|null $corporate_tax_preparation_and_filing_quarterly
 * @property int|null $corporate_tax_preparation_and_filing_yearly
 * @property int|null $t1_general_taxpayer
 * @property int|null $t1_general_spouse
 * @property int|null $t1_general_dependant1
 * @property int|null $t1_general_dependant2
 * @property int|null $t1_general_dependant3
 * @property int|null $general_income_taxpayer
 * @property int|null $general_income_spouse
 * @property int|null $general_income_dependant1
 * @property int|null $general_income_dependant2
 * @property int|null $general_income_dependant3
 * @property int|null $child_care_expenses_taxpayer
 * @property int|null $child_care_expenses_spouse
 * @property int|null $child_care_expenses_dependant1
 * @property int|null $child_care_expenses_dependant2
 * @property int|null $child_care_expenses_dependant3
 * @property int|null $moving_expenses_taxpayer
 * @property int|null $moving_expenses_spouse
 * @property int|null $moving_expenses_dependant1
 * @property int|null $moving_expenses_dependant2
 * @property int|null $moving_expenses_dependant3
 * @property int|null $spousal_support_taxpayer
 * @property int|null $spousal_support_spouse
 * @property int|null $spousal_support_dependant1
 * @property int|null $spousal_support_dependant2
 * @property int|null $spousal_support_dependant3
 * @property int|null $deductible_employment_exp_taxpayer
 * @property int|null $deductible_employment_exp_spouse
 * @property int|null $deductible_employment_exp_dependant1
 * @property int|null $deductible_employment_exp_dependant2
 * @property int|null $deductible_employment_exp_dependant3
 * @property int|null $investment_income_taxpayer
 * @property int|null $investment_income_spouse
 * @property int|null $investment_income_dependant1
 * @property int|null $investment_income_dependant2
 * @property int|null $investment_income_dependant3
 * @property int|null $investment_deductions_taxpayer
 * @property int|null $investment_deductions_spouse
 * @property int|null $investment_deductions_dependant1
 * @property int|null $investment_deductions_dependant2
 * @property int|null $investment_deductions_dependant3
 * @property int|null $rental_income_taxpayer
 * @property int|null $rental_income_spouse
 * @property int|null $rental_income_dependant1
 * @property int|null $rental_income_dependant2
 * @property int|null $rental_income_dependant3
 * @property int|null $self_employment_income_taxpayer
 * @property int|null $self_employment_income_spouse
 * @property int|null $self_employment_income_dependant1
 * @property int|null $self_employment_income_dependant2
 * @property int|null $self_employment_income_dependant3
 * @property int|null $self_employment_deductions_taxpayer
 * @property int|null $self_employment_deductions_spouse
 * @property int|null $self_employment_deductions_dependant1
 * @property int|null $self_employment_deductions_dependant2
 * @property int|null $self_employment_deductions_dependant3
 * @property int|null $self_employment_hst_taxpayer
 * @property int|null $self_employment_hst_spouse
 * @property int|null $self_employment_hst_dependant1
 * @property int|null $self_employment_hst_dependant2
 * @property int|null $self_employment_hst_dependant3
 * @property int|null $rrsp_prpp_contributions_taxpayer
 * @property int|null $rrsp_prpp_contributions_spouse
 * @property int|null $rrsp_prpp_contributions_dependant1
 * @property int|null $rrsp_prpp_contributions_dependant2
 * @property int|null $rrsp_prpp_contributions_dependant3
 * @property int|null $tuition_amount_taxpayer
 * @property int|null $tuition_amount_spouse
 * @property int|null $tuition_amount_dependant1
 * @property int|null $tuition_amount_dependant2
 * @property int|null $tuition_amount_dependant3
 * @property int|null $other_credits_taxpayer
 * @property int|null $other_credits_spouse
 * @property int|null $other_credits_dependant1
 * @property int|null $other_credits_dependant2
 * @property int|null $other_credits_dependant3
 * @property int|null $foreign_reporting_taxpayer
 * @property int|null $foreign_reporting_spouse
 * @property int|null $foreign_reporting_dependant1
 * @property int|null $foreign_reporting_dependant2
 * @property int|null $foreign_reporting_dependant3
 * @property int|null $non_resident_income_taxpayer
 * @property int|null $non_resident_income_spouse
 * @property int|null $non_resident_income_dependant1
 * @property int|null $non_resident_income_dependant2
 * @property int|null $non_resident_income_dependant3
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Firm[] $firms
 * @property-read int|null $firms_count
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereAccountsPayable0110Vendors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereAccountsPayable1120Vendors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereAccountsPayable2130Vendors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereAccountsPayable3140Vendors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereAccountsPayable4150Vendors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereAccountsReceivable0110Customers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereAccountsReceivable1120Customers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereAccountsReceivable2130Customers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereAccountsReceivable3140Customers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereAccountsReceivable4150Customers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereAccountsReconciliation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereChildCareExpensesDependant1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereChildCareExpensesDependant2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereChildCareExpensesDependant3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereChildCareExpensesSpouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereChildCareExpensesTaxpayer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereCorporateTaxPreparationAndFilingMonthly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereCorporateTaxPreparationAndFilingQuarterly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereCorporateTaxPreparationAndFilingYearly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereCostAccounting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereDeductibleEmploymentExpDependant1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereDeductibleEmploymentExpDependant2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereDeductibleEmploymentExpDependant3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereDeductibleEmploymentExpSpouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereDeductibleEmploymentExpTaxpayer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereFinancialStatementsReparationMonthly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereFinancialStatementsReparationQuarterly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereFinancialStatementsReparationYearly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereForeignReportingDependant1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereForeignReportingDependant2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereForeignReportingDependant3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereForeignReportingSpouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereForeignReportingTaxpayer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereGeneralIncomeDependant1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereGeneralIncomeDependant2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereGeneralIncomeDependant3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereGeneralIncomeSpouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereGeneralIncomeTaxpayer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereGstHstPreparationAndFilingMonthly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereGstHstPreparationAndFilingQuarterly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereGstHstPreparationAndFilingYearly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereInventoryAccounting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereInvestmentDeductionsDependant1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereInvestmentDeductionsDependant2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereInvestmentDeductionsDependant3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereInvestmentDeductionsSpouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereInvestmentDeductionsTaxpayer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereInvestmentIncomeDependant1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereInvestmentIncomeDependant2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereInvestmentIncomeDependant3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereInvestmentIncomeSpouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereInvestmentIncomeTaxpayer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereMovingExpensesDependant1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereMovingExpensesDependant2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereMovingExpensesDependant3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereMovingExpensesSpouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereMovingExpensesTaxpayer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereNonResidentIncomeDependant1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereNonResidentIncomeDependant2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereNonResidentIncomeDependant3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereNonResidentIncomeSpouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereNonResidentIncomeTaxpayer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereOtherCreditsDependant1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereOtherCreditsDependant2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereOtherCreditsDependant3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereOtherCreditsSpouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereOtherCreditsTaxpayer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff wherePayrollServicesBiWeekly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff wherePayrollServicesHowMany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff wherePayrollServicesMonthly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff wherePayrollServicesSemiMonthly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff wherePayrollServicesWeekly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff wherePayrollServicesYearly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff wherePayrollTaxPreparationAndFiling($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereRentalIncomeDependant1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereRentalIncomeDependant2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereRentalIncomeDependant3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereRentalIncomeSpouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereRentalIncomeTaxpayer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereRow1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereRow10($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereRow11($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereRow2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereRow3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereRow4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereRow5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereRow6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereRow7($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereRow8($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereRow9($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereRrspPrppContributionsDependant1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereRrspPrppContributionsDependant2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereRrspPrppContributionsDependant3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereRrspPrppContributionsSpouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereRrspPrppContributionsTaxpayer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereSelfEmploymentDeductionsDependant1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereSelfEmploymentDeductionsDependant2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereSelfEmploymentDeductionsDependant3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereSelfEmploymentDeductionsSpouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereSelfEmploymentDeductionsTaxpayer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereSelfEmploymentHstDependant1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereSelfEmploymentHstDependant2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereSelfEmploymentHstDependant3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereSelfEmploymentHstSpouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereSelfEmploymentHstTaxpayer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereSelfEmploymentIncomeDependant1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereSelfEmploymentIncomeDependant2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereSelfEmploymentIncomeDependant3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereSelfEmploymentIncomeSpouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereSelfEmploymentIncomeTaxpayer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereSpousalSupportDependant1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereSpousalSupportDependant2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereSpousalSupportDependant3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereSpousalSupportSpouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereSpousalSupportTaxpayer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereT1GeneralDependant1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereT1GeneralDependant2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereT1GeneralDependant3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereT1GeneralSpouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereT1GeneralTaxpayer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereTaxAll($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereTuitionAmountDependant1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereTuitionAmountDependant2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereTuitionAmountDependant3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereTuitionAmountSpouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereTuitionAmountTaxpayer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereVisible($value)
 * @mixin \Eloquent
 */
class Tariff extends Model
{

    use Sluggable;

    protected $fillable = ['name', 'price', 'visible',
        'row1', 'row2', 'row3', 'row4', 'row5', 'row6', 'row7', 'row8', 'row9', 'row10', 'row11',
        'description',
        'visible',
        'slug',

        'taxAll',
        'accounts_payable_01_10_vendors',
        'accounts_payable_11_20_vendors',
        'accounts_payable_21_30_vendors',
        'accounts_payable_31_40_vendors',
        'accounts_payable_41_50_vendors',

        'accounts_receivable_01_10_customers',
        'accounts_receivable_11_20_customers',
        'accounts_receivable_21_30_customers',
        'accounts_receivable_31_40_customers',
        'accounts_receivable_41_50_customers',

        'accounts_reconciliation',

        'payroll_services_how_many',
        'payroll_services_weekly',
        'payroll_services_bi_weekly',
        'payroll_services_semi_monthly',
        'payroll_services_monthly',
        'payroll_services_yearly',

        'inventory_accounting',
        'payroll_tax_preparation_and_filing',
        'cost_accounting',

        'gst_hst_preparation_and_filing_monthly',
        'gst_hst_preparation_and_filing_quarterly',
        'gst_hst_preparation_and_filing_yearly',


        'financial_statements_reparation_monthly',
        'financial_statements_reparation_quarterly',
        'financial_statements_reparation_yearly',

        'corporate_tax_preparation_and_filing_monthly',
        'corporate_tax_preparation_and_filing_quarterly',
        'corporate_tax_preparation_and_filing_yearly',

        't1_general_taxpayer',
        't1_general_spouse',
        't1_general_dependant1',
        't1_general_dependant2',
        't1_general_dependant3',

        'general_income_taxpayer',
        'general_income_spouse',
        'general_income_dependant1',
        'general_income_dependant2',
        'general_income_dependant3',

        'child_care_expenses_taxpayer',
        'child_care_expenses_spouse',
        'child_care_expenses_dependant1',
        'child_care_expenses_dependant2',
        'child_care_expenses_dependant3',

        'moving_expenses_taxpayer',
        'moving_expenses_spouse',
        'moving_expenses_dependant1',
        'moving_expenses_dependant2',
        'moving_expenses_dependant3',

        'spousal_support_taxpayer',
        'spousal_support_spouse',
        'spousal_support_dependant1',
        'spousal_support_dependant2',
        'spousal_support_dependant3',

        'deductible_employment_exp_taxpayer',
        'deductible_employment_exp_spouse',
        'deductible_employment_exp_dependant1',
        'deductible_employment_exp_dependant2',
        'deductible_employment_exp_dependant3',

        'investment_income_taxpayer',
        'investment_income_spouse',
        'investment_income_dependant1',
        'investment_income_dependant2',
        'investment_income_dependant3',

        'investment_deductions_taxpayer',
        'investment_deductions_spouse',
        'investment_deductions_dependant1',
        'investment_deductions_dependant2',
        'investment_deductions_dependant3',

        'rental_income_taxpayer',
        'rental_income_spouse',
        'rental_income_dependant1',
        'rental_income_dependant2',
        'rental_income_dependant3',

        'self_employment_income_taxpayer',
        'self_employment_income_spouse',
        'self_employment_income_dependant1',
        'self_employment_income_dependant2',
        'self_employment_income_dependant3',

        'self_employment_deductions_taxpayer',
        'self_employment_deductions_spouse',
        'self_employment_deductions_dependant1',
        'self_employment_deductions_dependant2',
        'self_employment_deductions_dependant3',

        'self_employment_hst_taxpayer',
        'self_employment_hst_spouse',
        'self_employment_hst_dependant1',
        'self_employment_hst_dependant2',
        'self_employment_hst_dependant3',

        'rrsp_prpp_contributions_taxpayer',
        'rrsp_prpp_contributions_spouse',
        'rrsp_prpp_contributions_dependant1',
        'rrsp_prpp_contributions_dependant2',
        'rrsp_prpp_contributions_dependant3',

        'tuition_amount_taxpayer',
        'tuition_amount_spouse',
        'tuition_amount_dependant1',
        'tuition_amount_dependant2',
        'tuition_amount_dependant3',

        'other_credits_taxpayer',
        'other_credits_spouse',
        'other_credits_dependant1',
        'other_credits_dependant2',
        'other_credits_dependant3',

        'foreign_reporting_taxpayer',
        'foreign_reporting_spouse',
        'foreign_reporting_dependant1',
        'foreign_reporting_dependant2',
        'foreign_reporting_dependant3',

        'non_resident_income_taxpayer',
        'non_resident_income_spouse',
        'non_resident_income_dependant1',
        'non_resident_income_dependant2',
        'non_resident_income_dependant3'
    ];


    public function sluggable()
    {
        return [
            'slug' => ['source' => 'name']
        ];
    }

    public function firms()
    {
        return $this->hasMany(Firm::class);

    }


}
