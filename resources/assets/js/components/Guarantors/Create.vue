<template >
  <div>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">Guarantors for loan applied by ({{this.loanee}})</h4>
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
        <div class="col-md-6">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Add Guarantor</h4>
                    <!-- <p class="text-muted m-b-30 font-14">Here are examples of </p> -->
                    <form @submit.prevent="add" autocomplete="off">

                      <div :class="['form-group row',allerrors.guarantor ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Guarantor name</label>

                            <div class="col-sm-10">
                                <!-- <select type="text" id="guarantor" v-model="post.guarantor" class="form-control" placeholder="">
                                  <option value="">Choose guarantor</option>
                                  <option value=""></option>
                                </select> -->
                                <v-select  v-model="post.guarantor" label="name" :options="member" :reduce="member => member.id" />

                                <span v-if="allerrors.guarantor" :class="['label label-danger']"><p style="color:red;">{{ allerrors.guarantor[0]}}</p></span>

                            </div>
                            <!--div class="col-sm-2">
                              <span id="loader">
                                <i class="fa fa-spinner fa-x fa-spin"></i>
                              </span>
                            </div-->

                        </div>

                        <div :class="['form-group row',allerrors.amount ? 'has-error' : '']">

                            <label class="col-sm-2 col-form-label">Amount</label>
                            <div class="col-sm-10">
                                <input type="text" id="amount" v-model="post.amount" class="form-control" placeholder="">
                                <span v-if="allerrors.amount" :class="['label label-danger']"><p style="color:red;">{{ allerrors.amount[0]}}</p></span>

                            </div>
                        </div>
                        <div :class="['form-group row',allerrors.date ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                                <input type="date" id="date" v-model="post.date" class="form-control" placeholder="">
                                <span v-if="allerrors.date" :class="['label label-danger']"><p style="color:red;">{{ allerrors.date[0]}}</p></span>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="submit" class="btn btn-success btn-round" value="Submit">
                            </div>
                    </div>



                    </form>

                </div>
            </div>
        </div><!-- end col -->
        <div class="col-md-6">
            <div class="card m-b-30">
                <div class="card-body">
                    <!-- <h4 class="mt-0 header-title">Example</h4>
                    <p class="text-muted m-b-30 font-14">This is an experimental awesome solution for responsive tables with complex data.</p> -->
                    <div class="table-rep-plugin">
                        <div class="table-responsive b-0" data-pattern="priority-columns">
                          <table class="table  table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Guarantor</th>

                                <th>Amount</th>
                                  <th>Date</th>


                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>

                              <tr v-for="(p,index) in guarantors" @key="index">
                                <td>{{index+1}}</td>

                                <td>{{p.name}}</td>
                                <td>{{p.amount|formatNumber}}</td>
                                <td>{{p.date|date}}</td>

                          <td>

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

            guarantors: [],
            member:[],
            loanee:this.$route.params.name,
            post: {
                guarantor: '',
                amount:'',
                date: '',


            },
            allerrors: [],
        }
    },
    mounted: function() {
        this.fetchGuarantor();
        this.fetchMember();
    },

    methods: {

        fetchMember: function() {
            console.log('Fetching data....');

            this.axios.get('/api/member').then((response) => {
                //  console.log(response.data);
                this.member = response.data.data;
            }).catch((error) => {
                console.log(error);
            })
        },

                fetchGuarantor: function() {
                    console.log('Fetching data....');
                    let uri = `/api/guarantor/${this.$route.params.id}`;
                    this.axios.get(uri).then((response) => {
                        //  console.log(response.data);
                        this.guarantors = response.data;
                    }).catch((error) => {
                        console.log(error);
                    })
                },

        add: function() {

            let self = this;
            form = new FormData();
            form.append('guarantor', self.post.guarantor);
            form.append('amount', self.post.amount);

            form.append('date', self.post.date);

            //let params = Object.assign({}, self.post);
            let url = `/api/guarantor/create/${this.$route.params.id}`;
            this.axios.post(url, form)
                .then((response) => {
                    self.allerrors = [];
                    self.post.guarantor = '';
                    self.post.amount = '';
                    self.post.date = '';
                    this.fetchGuarantor();

                    toast.fire({
                        type: 'success',
                        title: 'Guarantor added successfully'
                    })
                    //flash('post added Succesfully', 'success');
                })
                .catch((error) => {
                    self.allerrors = error.response.data.errors;
                    toast.fire({
                        type: 'error',
                        title: 'Guarantor not added. Please check your inputs!'
                    })
                });
            return;
        },
        disable(id) {
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete record!'
            }).then((result) => {

                if (result.value) {
                  let uri = `/api/guarantor/delete/${id}`;
                  this.axios.delete(uri).then(response => {
                      this.guarantors.splice(this.guarantors.indexOf(id), 1);
                      this.fetchGuarantor();
                  });
                    swal.fire(
                        'Deleted!',
                        'Guarantor has been removed from this loan.',
                        'success'
                    )
                }
            }).
            catch(()=>{
              toast.fire({
                  type: 'error',
                  title: 'Guarantor not deleted!'
              })
            })


        },
    }
}
</script>


<style lang="css" scoped>
</style>
