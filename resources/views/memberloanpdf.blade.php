<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <meta content="Admin Dashboard" name="description">
    <meta content="ThemeDesign" name="author"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Loader -->


    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box d-print-none">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <p class="page-title m-0">Date printed: {{\Carbon\Carbon::now()->toFormattedDateString()}}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div><!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">

                                    <div class="invoice-title">
                                        <!-- <h4 class="float-right font-16"><strong>Order # 12345</strong></h4> -->
                                        <h3 class="m-t-0 text-center">
                                          <!-- <img src="assets/images/logo_dark.png" alt="logo" height="28"> -->
                                          Supercoach Sacco
                                        </h3>
                                    </div>
                                    <hr>
                                    <div class="col-md-4">
                                      <div class="row">
                                        <h6 class="my-4">Loan report</h6>

                                      </div>
                                      <div class="row mb-1">
                                        <b>Name : {{$show[0]->name}}</b> <br>

                                      </div>
                                      <div class="row mb-1">
                                        <b>Membership no : {{$show[0]->number}}</b>
                                      </div>


                                    </div>

                                    <div class="col-md-4">

                                    </div>




                                </div>
                            </div>
                            <div class="row">
                              <h6 class="my-2 text-center">LOAN SUMMARY</h6>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="panel panel-default">
                                        <div class="p-2">
                                            <h3 class="panel-title font-20"></h3>
                                        </div>
                                        <div class="">
                                            <div class="table-responsive">
                                                <table id="loanSummary" class="table">


                                                  <tbody>
                                                    <tr>
                                                      <td>Loan ID</td>
                                                      <td>{{$show[0]->loan_id}}</td>

                                                    </tr>
                                                    <tr>
                                                      <td>Loan Amount</td>
                                                      <td>{{number_format($show[0]->amount,2)}}</td>
                                                    </tr>
                                                    <tr>
                                                      <td>Interest rate</td>
                                                      <td>{{$show[0]->interest_rate}}</td>
                                                    </tr>
                                                    <tr>
                                                      <td>Duration (months)</td>
                                                      <td>{{$show[0]->duration}}</td>
                                                    </tr>
                                                    <tr>
                                                      <td>Date issued</td>
                                                      <td>{{ \Carbon\Carbon::parse($show[0]->date)->format('d M Y') }}</td>
                                                    </tr>

                                                  </tbody>

                                                </table>



                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div><!-- end row -->
                            <div class="row">
                              <h6 class="my-2 text-center">LOAN DETAILS</h5>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="panel panel-default">
                                        <div class="p-2">
                                            <h3 class="panel-title font-20"></h3>
                                        </div>
                                        <div class="">
                                            <div class="table-responsive">
                                                <table id="loanTable" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center"><strong>#</strong></th>
                                                            <th class="text-center"><strong>Instalment</strong></th>
                                                            <th class="text-center"><strong>Principal</strong></th>
                                                            <th class="text-center"><strong>Interest</strong></th>
                                                            <th class="text-center"><strong>Penalty</strong></th>
                                                            <th class="text-center"><strong>Totals</strong></th>
                                                            <th class="text-center"><strong>Paid</strong></th>
                                                            <th class="text-center"><strong>Balance</strong></th>
                                                            <th class="text-center"><strong>Payment date</strong></th>



                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      <?php $count = 1; ?>
                                                        @foreach ($amortization as $s)
                                                        <tr>

                                                            <td class="text-center">{{$count}}</td>
                                                            @if($s->instalment != "")
                                                            <td class="text-center">{{number_format($s->instalment,2)}}</td>
                                                            @else
                                                            <td class="text-center">__</td>
                                                            @endif
                                                            @if($s->principal != "")
                                                            <td class="text-center">{{number_format($s->principal,2)}}</td>
                                                            @else
                                                            <td class="text-center">__</td>
                                                            @endif
                                                            @if($s->interest != "")
                                                            <td class="text-center">{{number_format($s->interest,2)}}</td>
                                                            @else
                                                            <td class="text-center">__</td>
                                                            @endif
                                                            @if($s->penalty != "")
                                                            <td class="text-center">{{number_format($s->penalty,2)}}</td>
                                                            @else
                                                            <td class="text-center">__</td>
                                                            @endif
                                                            @if($s->totals != "")
                                                            <td class="text-center">{{number_format($s->totals,2)}}</td>
                                                            @else
                                                            <td class="text-center">__</td>
                                                            @endif
                                                            @if($s->paid_amount != "")
                                                            <td class="text-center">{{number_format($s->paid_amount,2)}}</td>
                                                            @else
                                                            <td class="text-center">__</td>
                                                            @endif
                                                            @if($s->loan_balance != "")
                                                            <td class="text-center">{{number_format($s->loan_balance,2)}}</td>
                                                            @else
                                                            <td class="text-center">__</td>
                                                            @endif

                                                            @if($s->payment_date != "")
                                                            <td class="text-center">{{ \Carbon\Carbon::parse($s->payment_date)->format('d-M-Y') }}</td>
                                                            @else
                                                            <td class="text-center">__</td>
                                                            @endif
                                                        </tr>
                                                        <?php $count++; ?>
                                                        @endforeach

                                                    </tbody>

                                                </table>


                                        <style>
                                        html{
                                          height: 100%;
                                          width:100%;
                                        }
                                        #loanTable {
                                        font-family: 'Nunito Sans', sans-serif;
                                        font-size:10px;
                                        border-collapse: collapse;
                                        width: 100%;
                                      }
                                      #loanSummary {
                                      font-family: 'Nunito Sans', sans-serif;
                                      font-size:10px;
                                      border-collapse: collapse;
                                      width: 100%;
                                    }
                                        #loanSummary td {
                                          border: 1px solid #ddd;
                                        }
                                        #loanTable tr:nth-child(even){
                                          background-color: #f2f2f2;
                                        }
                                        #loanSummary tr:nth-child(even){
                                          background-color: #f2f2f2;
                                        }

                                        th {
                                          background-color: #4CAF50;
                                          height: 25px;
                                          color: white;
                                          }
                                          #loanTable tbody tr td {
                                            height: 20px;
                                            vertical-align: bottom;
                                          }
                                          #loanSummary tbody tr td {
                                            height: 20px;
                                            vertical-align: bottom;
                                          }
                                        </style>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div><!-- end row -->
                        </div>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end wrapper -->
    <!-- Footer -->

    <!-- jQuery  -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
