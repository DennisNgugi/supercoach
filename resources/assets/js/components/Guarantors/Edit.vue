<template >
  <div>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">Guarantors</h4>
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
                    <h4 class="mt-0 header-title">Add Guarantor</h4>
                    <!-- <p class="text-muted m-b-30 font-14">Here are examples of </p> -->
                    <form @submit.prevent="add">

                      <div :class="['form-group row',allerrors.guarantor ? 'has-error' : '']">
                            <label class="col-sm-2 col-form-label">Guarantor name</label>

                            <div class="col-sm-10">
                                <select type="text" id="guarantor" v-model="post.guarantor" class="form-control" placeholder="">
                                  <option value="">Choose guarantor</option>
                                  <option value=""></option>
                                </select>
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
    </div><!-- end row -->

  </div>
</template>

<script>
export default {

    data() {
        return {

            guarantor: [],

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

    },

    methods: {

        fetchCategory: function() {
            console.log('Fetching data....');

            this.axios.get('/api/category').then((response) => {
                //  console.log(response.data);
                this.category = response.data.data;
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
            axios.post('/api/products', form)
                .then((response) => {
                    self.allerrors = [];
                    self.post.guarantor = '';
                    self.post.amount = '';
                    self.post.date = '';


                    toast.fire({
                        type: 'success',
                        title: 'Guarantor added successfully'
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
