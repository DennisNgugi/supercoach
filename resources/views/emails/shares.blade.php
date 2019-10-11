<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from themesdesign.in/zinzer_1/horizontal/pages-invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Jun 2019 08:47:49 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <meta content="Admin Dashboard" name="description">
    <meta content="ThemeDesign" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- App Icons -->
    <link rel="shortcut icon" href="assets/images/favicon.ico"><!-- App css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
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
                                <h4 class="page-title m-0">Invoice</h4>
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
                                        <h4 class="float-right font-16"><strong>Order # 12345</strong></h4>
                                        <h3 class="m-t-0"><img src="assets/images/logo_dark.png" alt="logo" height="28"></h3>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6"><address><strong>Billed To:</strong><br>John Smith<br>1234 Main<br>Apt. 4B<br>Springfield, ST 54321</address></div>
                                        <div class="col-6 text-right"><address><strong>Shipped To:</strong><br>Kenny Rigdon<br>1234 Main<br>Apt. 4B<br>Springfield, ST 54321</address></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 m-t-30"><address><strong>Payment Method:</strong><br>Visa ending **** 4242<br>jsmith@email.com</address></div>
                                        <div class="col-6 m-t-30 text-right"><address><strong>Order Date:</strong><br>October 7, 2016<br><br></address></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="panel panel-default">
                                        <div class="p-2">
                                            <h3 class="panel-title font-20"><strong>Order summary</strong></h3>
                                        </div>
                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <td><strong>#</strong></td>
                                                            <td class="text-center"><strong>Amount</strong></td>
                                                            <td class="text-center"><strong>Date issued</strong></td>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($shares as $s)
                                                        <tr>

                                                            <td class="text-center">{{$s->id}}</td>
                                                            <td class="text-center">{{$s->amount}}</td>
                                                            <td class="text-right">{{$s->created_at}}</td>
                                                        </tr>
                                                        @endforeach
                                                        <tr>
                                                          <td class="no-line text-right"><h4 class="m-0">$685.99</h4></td>
                                                        </tr>
                                                    </tbody>

                                                </table>
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
