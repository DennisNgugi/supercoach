<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('member','MemberController');
Route::apiResource('vehicle','VehicleController');
Route::apiResource('loan','LoanController');
Route::apiResource('guarantor','GuarantorController');
Route::apiResource('share','ShareController');

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
