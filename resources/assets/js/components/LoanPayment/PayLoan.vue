<template >
  <div>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">Loans</h4>
                    </div>
                    <div class="col-md-4">
                        <div class="float-right d-none d-md-block">
                            <div class="dropdown"><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-settings mr-1"></i> Settings</button>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated"><a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something
                                        else here</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary mini-stat text-white">
                <div class="p-3 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">Amount Loaned</h6>
                        <h4 class="mb-3 mt-0 float-right">{{loan.amount}}</h4>
                    </div>
                    <!-- <div><span class="badge badge-light text-info">+11% </span><span class="ml-2">From previous period</span></div> -->
                </div>

            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-info mini-stat text-white">
                <div class="p-3 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">Initial Interest</h6>
                        <h4 class="mb-3 mt-0 float-right">{{loan.interest_rate}}%</h4>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning mini-stat text-white">
                <div class="p-3 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">Duration</h6>
                        <h4 class="mb-3 mt-0 float-right">{{loan.duration}} months</h4>
                    </div>
                </div>

            </div>
        </div>
        <!-- <div class="col-xl-3 col-md-6">
            <div class="card bg-success mini-stat text-white">
                <div class="p-3 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">Product Sold</h6>
                        <h4 class="mb-3 mt-0 float-right">1890</h4>
                    </div>
                    <div><span class="badge badge-light text-info">+89% </span><span class="ml-2">From previous period</span></div>
                </div>
                <div class="p-3">
                    <div class="float-right"><a href="#" class="text-white-50"><i class="mdi mdi-briefcase-check h5"></i></a></div>
                    <p class="font-14 m-0">Last : 1776</p>
                </div>
            </div>
        </div> -->
    </div><!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Pay Loan</h4>
                    <!-- <p class="text-muted m-b-30 font-14">Here are examples of </p> -->
                    <form @submit.prevent="add">

                      <fieldset>

                        <div :class="['form-group row',allerrors.amt ? 'has-error' : '']">

                            <label class="col-sm-2 col-form-label">Amount</label>
                            <div class="col-sm-10">
                                <input type="text" id="date" v-model="post.amt" class="form-control" placeholder="">
                                <span v-if="allerrors.amt" :class="['label label-danger']"><p style="color:red;">{{ allerrors.amt[0]}}</p></span>

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                  <input type="submit" id="loan_submit" class="btn btn-success btn-round" value="Submit">
                            </div>
                    </div>
                    </fieldset>

                    </form>



                </div>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->

    <div class="row">

      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-body">
            <h4 class="mt-0 header-title">
              Payment Details
            </h4>
            <div class="table-rep-plugin">
                <div class="table-responsive b-0" data-pattern="priority-columns">
                  <table class="table table-striped">
                    <thead>
                      <tr>

                        <th>Installments</th>


                        <th>Amount paid</th>
                        <th>New Interest rate (p.m)</th>
                        <th>Duration(months)</th>
                          <th>Date paid</th>

                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                        <td>{{loan.loan_id}}</td>
                        <td>{{loan.amount}}</td>
                        <td>{{loan.interest_rate}}</td>
                        <td>{{loan.duration}}</td>

                        </tr>

                    </tbody>
                  </table>

                </div>
            </div>
          </div>

        </div>
      </div>

    </div>

  </div>
</template>

<script>
export default {

    data() {
        return {

            loan:{},
            post: {
                amt: '',


            },
            allerrors: [],
        }
    },
    mounted: function() {
      this.fetchLoanInformation();

    },

    methods: {

fetchLoanInformation: function() {
            console.log('Fetching data....');
              let url = `/api/payloan/${this.$route.params.id}`;
            this.axios.get(url).then((response) => {
                //  console.log(response.data);
                this.loan = response.data;
            }).catch((error) => {
                console.log(error);
            })
        },
        add: function() {

            let self = this;
            form = new FormData();


            form.append('amt', self.post.amt);



            //let params = Object.assign({}, self.post);
              let url = `/api/payloan/${this.$route.params.id}`;
            axios.post(url, form)
                .then((response) => {
                    self.allerrors = [];
                    self.post.amt = '';


                    toast.fire({
                        type: 'success',
                        title: 'Loan paid successfully'
                    })
                    //flash('post added Succesfully', 'success');
                })
                .catch((error) => {
                    self.allerrors = error.response.data.errors;
                });
            return;
        },
    }
}
</script>


<style lang="css" scoped>
</style>
