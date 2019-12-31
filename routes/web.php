<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('member','MemberController');
Route::get('/member/edit/{id}','MemberController@edit');
Route::resource('vehicle','VehicleController');
Route::get('/vehicle/edit/{id}','VehicleController@edit');
Route::resource('loan','LoanController');

// show loan information including amortization schedule
Route::get('/loan/view/{id}','LoanController@show');

//Route::apiResource('guarantor','GuarantorController');
// Route::get('/guarantor/edit/{id}','GuarantorController@edit');
Route::resource('share','ShareController');
Route::get('/share/edit/{id}','ShareController@edit');

// Add guarantor to loan
Route::post('/guarantor/create/{id}','GuarantorController@store');
// Fetch guarantor on each loan
Route::get('/guarantor/{id}','GuarantorController@index');
// Delete guarantor from loan
Route::delete('/guarantor/delete/{id}','GuarantorController@destroy');

Route::post('payloan/{id}','LoanPaymentController@payloan');
Route::get('payloan/{id}','LoanPaymentController@loan_pay_view');
Route::get('membershares/{id}','MemberController@membershares');
Route::get('memberloan/{id}','MemberController@memberloan');

Route::get('/share/report','ReportController@filter');

Route::get('/dashboardshares','DashboardController@dashboardShares');
Route::get('/dashboardwithdrawalshares','DashboardController@dashboardWithdrawalShares');
Route::get('/dashboardloans','DashboardController@dashboardLoans');

Route::get('/totalshares','DashboardController@totalShares');
Route::get('/totalvehicles','DashboardController@totalVehicles');
Route::get('/totalmembers','DashboardController@totalMembers');
Route::get('/totalloans','DashboardController@totalLoans');

// monthly report
Route::get('/month','DashboardController@month');
// yearly report
Route::get('/monthly','DashboardController@monthly');

// pdf download for all shares
Route::get('/download/shares','DashboardController@downloadShares');
// pdf download for all withdrawal shares
Route::get('/download/withdraw/shares','DashboardController@downloadWithdrawalShares');

// pdf download for all individual shares
Route::get('/individual/shares/{id}','DashboardController@individualShares');
// pdf download for individual loans
Route::get('/individual/loan/{id}/{loanID}','DashboardController@individualLoan');
// pdf download for all individual withdrawn shares
Route::get('/individual/withdrawn/shares/{id}','DashboardController@individualWithdrawnShares');
// pdf download for monthly shares
Route::get('/monthly/shares','DashboardController@monthlySharesDownload');
// withdraw shares
Route::post('/share/withdraw','WithdrawSharesController@store');
Route::get('/sharewithdrawal','WithdrawSharesController@withdrawalshares');
Route::delete('/sharewithdrawal/{id}','WithdrawSharesController@destroy');

// individual member shares total
Route::get('/member/share','WithdrawSharesController@membershares');
// individual member shares summary
Route::get('/memberwithdrawnshares/{id}','MemberController@memberwithdrawnshares');
// yearly dividends for each member
Route::get('dividends/{id}','MemberController@dividends');
// monthly contributed shares for each member
Route::get('monthlydividends/{id}','MemberController@monthlydividends');
// Upload amortization schedule in excel format to database
Route::post('/schedule/{id}','AmortizationController@store');
// get amortization schedule for loan applied by each member
Route::get('/myloan/{id}','MemberController@memberamortizationschedule');

Route::get('/admin/{any}', function () {
  return view('layouts.admin');
})->where('any', '.*');

// Route::get('/loanview',function(){
//   return view('memberloanpdf');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
