<template lang="html">
  <div>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mt-3">loans</h4>
                    </div>
                    <div class="col-md-4">
                      <router-link class="btn btn-primary"to="/loan/create">Add new Loan</router-link>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <!-- <h4 class="mt-0 header-title">Example</h4>
                    <p class="text-muted m-b-30 font-14">This is an experimental awesome solution for responsive tables with complex data.</p> -->
                    <div class="table-rep-plugin">
                        <div class="table-responsive b-0" data-pattern="priority-columns">
                          <table class="table table-hover table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Loan ID</th>
                                <th>Member name</th>

                                <th>Loan amount</th>
                                <th>Interest rate (p.m)</th>
                                <th>Duration(months)</th>
                                <th>Date issued</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>

                              <tr v-for="(p,index) in posts" @key="index">
                                <td>{{index+1}}</td>
                                <td>{{p.loan_id}}</td>
                                <td>{{p.name}}</td>
                                <td>{{p.amount}}</td>
                                <td>{{p.interest_rate}}</td>
                                <td>{{p.duration}}</td>
                                <td>{{p.date|date}}</td>
                                <td><span class="badge badge-pill badge-success">{{p.status}}</span></td>



                                <td>
                                  <router-link :to="{name: 'loan_pay', params: { id: p.id }}" class="btn btn-info btn-sm">Pay loan</router-link>
                                  <router-link :to="{name: 'loan_edit', params: { id: p.id }}" class="btn btn-secondary btn-sm">Guarantor</router-link>

                                <router-link :to="{name: 'loan_edit', params: { id: p.id }}" class="btn btn-primary btn-sm">Edit</router-link>

                                <input type="submit" @click.prevent="disable(p.id)" class="btn btn-danger btn-sm" value="Delete">
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
            posts: [],
            post: {}
        }
    },
    mounted: function() {
        this.fetchData();
    },


    methods: {

        fetchData: function() {
            console.log('Fetching data....');

            this.axios.get('/api/loan').then((response) => {
                //  console.log(response.data);
                this.posts = response.data;
            }).catch((error) => {
                console.log(error);
            })
        },
        disable(id) {
            swal.fire({
                title: 'Are you sure?',
              //  text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {

                if (result.value) {
                  let uri = `/api/loan/${id}`;
                  this.axios.delete(uri).then(response => {
                      //this.posts.splice(this.posts.indexOf(id), 1);
                      this.fetchData();
                  });
                    swal.fire(
                        'Deleted!',
                        'Loan has been deleted.',
                        'success'
                    )
                }
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
