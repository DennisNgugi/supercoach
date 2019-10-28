<template >
  <div>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mt-3">Loan amortization schedule</h4>
                    </div>
                    <div class="col-md-4">
                        <div class="float-right d-none d-md-block">
                          <!-- <router-link class="btn btn-primary"to="/member/create">Download report</router-link> -->

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


                    <div class="table-rep-plugin">
                        <div class="table-responsive b-0" data-pattern="priority-columns">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Installments</th>
                                <th>Payment date</th>
                                <th>Principal</th>
                                  <th>Interest</th>
                                    <th>Penalty</th>
                                      <th>Totals</th>
                                      <th>Paid amount</th>
                                <th>Loan balance</th>
                              </tr>
                            </thead>
                            <tbody>

                              <tr v-for="(p,index) in amortization" @key="index">
                                <td>{{index+1}}</td>
                                <td v-if="p.instalment == null">__</td>
                                <td v-else>{{p.instalment}}</td>
                                <td v-if="p.payment_date == null">__</td>
                                <td v-else>{{p.payment_date}}</td>
                                <td v-if="p.principal == null">__</td>
                                <td v-else>{{p.principal|formatNumber}}</td>
                                <td v-if="p.interest == null">__</td>
                                <td v-else>{{p.interest|formatNumber}}</td>
                                <td v-if="p.penalty == null">__</td>
                                <td v-else>{{p.penalty|formatNumber}}</td>
                                <td v-if="p.totals == null">__</td>
                                <td v-else>{{p.totals|formatNumber}}</td>
                                <td v-if="p.paid_amount == null">__</td>
                                <td v-else>{{p.paid_amount|formatNumber}}</td>
                                <td v-if="p.loan_balance == null">__</td>
                                <td v-else>{{p.loan_balance|formatNumber}}</td>

                                <td>
                                <!-- <router-link :to="{name: 'member_edit', params: { id: p.id }}" class="btn btn-primary btn-sm">Edit</router-link> -->


                                      <input type="submit" @click.prevent="disable(p.id)" class="btn btn-danger btn-sm" value="Delete">
                                      <!-- <router-link :to="{name: 'member_show', params: { id: p.id }}" class="btn btn-info btn-sm">View</router-link> -->
                                    </td>
                              </tr>
                            </tbody>
                          </table>

                        </div>
                    </div>
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

            amortization: [],
            //post: {}
        }
    },
    mounted: function() {
        this.fetchMemberAmortization();
    },


    methods: {

      fetchMemberAmortization:function(){
        let url = `/api/myloan/${this.$route.params.id}`;
        this.axios.get(url)
            .then((response) => {
                this.amortization = response.data;
            });
      },
        disable(id) {
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {

                // if (result.value) {
                //   let uri = `/api/member/${id}`;
                //   this.axios.delete(uri).then(response => {
                //       //this.posts.splice(this.posts.indexOf(id), 1);
                //       this.fetchData();
                //   });
                //     swal.fire(
                //         'Deleted!',
                //         'Member has been deleted.',
                //         'success'
                //     )
                // }
            }).
            catch(()=>{
              swal("Failed","There was something wrong","warning");
            })


        }
    }
}
</script>

<style lang="css" scoped>
</style>
