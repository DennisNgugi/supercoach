<template lang="html">
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
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Pay Loan</h4>
                    <!-- <p class="text-muted m-b-30 font-14">Here are examples of </p> -->
                    <form @submit.prevent="add">

                      <fieldset>
                        <legend>Loan Information</legend>
                        <div class="table-rep-plugin">
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                              <table class="table table-hover table-striped">
                                <thead>
                                  <tr>

                                    <th>Loan ID</th>


                                    <th>Loan amount</th>
                                    <th>Interest rate (p.m)</th>
                                    <th>Duration(months)</th>

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
