<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use DB;
use PDF;
use Carbon\Carbon;
class MonthlyShares extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'month:shares';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email to show summary of the shares transacted on a monthly basis';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        //$monthlyShares = DB::table('shares')->get();
        $currentYear = date('Y');
        $date = Carbon::now();
        $show = DB::table('shares')
      ->whereRaw('YEAR(created_at) = ?',[$currentYear])
      ->select(DB::raw('SUM(amount) as total_amount,MONTHNAME( created_at ) as month'))
    //  ->orderBy(DB::raw('MONTHNAME(created_at) ASC'))
      ->groupBy(DB::raw('MONTHNAME(created_at) ASC'))->get();

      $pdf = PDF::loadView('monthlysharespdf', compact('show'))->setPaper('a4','potrait');
       $download = 'Monthly report'.'-'.$date.'.'.'pdf';
         Mail::to('denongugi16@gmail.com')->send(new SendMailable($download));
    }
}
