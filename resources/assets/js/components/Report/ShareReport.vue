<template >
  <div>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mt-3">Shares report</h4>
                    </div>
                    <div class="col-md-4">
                        <div class="float-right d-none d-md-block">
                          <!-- <router-link class="btn btn-primary"to="/share/create">Add shares</router-link> -->

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
              <form class="" @submit="filterShares">
                <div class="form-group">
                  <label for="">Choose member</label>
                  <select v-model="form.member_name" class="form-control" name="member">
                    <option value="">Choose member</option>
                    <option v-for="p in members" v-bind:value="p.id" >{{p.name}}</option>
                  </select>
                </div>

                <div class="form-group">
                  <input type="submit" name="" class="btn btn-secondary btn-sm" value="Generate" >

                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
    <div v-if="showFilter == true">
      <div class="row">
          <div class="col-12">
              <div class="card m-b-30">
                  <div class="card-body">
                      <h2 class="mt-0 header-title text-center">Supercoach sacco Limited</h2>
                      <p class="text-muted m-b-30 font-18 text-center">Shares report.</p>
                      <!-- <p class="text-muted m-b-30 font-18 text-center">{{this.form.member_name}}</p> -->
                      <div class="table-rep-plugin">
                          <div class="table-responsive b-0" data-pattern="priority-columns">
                            <table class="table table-hover table-striped">
                              <thead>
                                <tr>
                                  <th>#</th>


                                  <th>Shares amount</th>

                                  <th>Payment Date</th>

                                </tr>
                              </thead>
                              <tbody>

                                <tr v-for="(p,index) in dummy" @key="index">
                                  <td>{{index+1}}</td>


                                  <td>{{p.amount}}</td>

                                  <td>{{p.payment_date|date}}</td>




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
    <div v-if="showFilter == false">
      <div class="row">
          <div class="col-12">
              <div class="card m-b-30">
                  <div class="card-body">
                      <h2 class="mt-0 header-title text-center">Supercoach sacco Limited</h2>
                      <p class="text-muted m-b-30 font-18 text-center">Shares report.</p>
                      <p class="text-muted m-b-30 font-18 text-center">{{this.form.member_name}}</p>
                      <div class="table-rep-plugin">
                          <div class="table-responsive b-0" data-pattern="priority-columns">
                            <table class="table table-hover table-striped">
                              <thead>
                                <tr>
                                  <th>#</th>


                                  <th>Shares amount</th>

                                  <th>Payment Date</th>

                                </tr>
                              </thead>
                              <tbody>

                                <tr v-for="(p,index) in posts" @key="index">
                                  <td>{{index+1}}</td>


                                  <td>{{p.amount}}</td>

                                  <td>{{p.payment_date|date}}</td>




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
  </div>
</template>

<script>
export default {

    data() {
        return {
            posts: [],
            members:[],
            post: {},
            form:{
              member_id:''
            },
            showFilter:false,
            dummy:[]
        }
    },
    mounted: function() {
        this.fetchData();
        this.fetchMember();
    },


    methods: {
      filterShares:function(){
          fetch('api/share/report?q='+this.form.member_id)
          .then(response => response.json())
          .then(response =>{
            this.dummy = response
            this.form.member_id=''
            this.showFilter = true
          }).
          catch(error =>{
            console.log(error)
          });
      },
      fetchMember: function() {
          console.log('Fetching data....');

          this.axios.get('/member').then((response) => {
              //  console.log(response.data);
              this.members = response.data.data;
          }).catch((error) => {
              console.log(error);
          })
      },
        fetchData: function() {
            console.log('Fetching data....');

            this.axios.get('/share').then((response) => {
                //  console.log(response.data);
                this.posts = response.data;
            }).catch((error) => {
                console.log(error);
            })
        },

    }
}
</script>

<style lang="css" scoped>
</style>
