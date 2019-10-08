<template lang="html">
  <div>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">Members</h4>
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
                    <!-- <h4 class="mt-0 header-title">Example</h4>
                    <p class="text-muted m-b-30 font-14">This is an experimental awesome solution for responsive tables with complex data.</p> -->
                    <div class="table-rep-plugin">
                        <div class="table-responsive b-0" data-pattern="priority-columns">
                          <table class="table table-hover table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Member name</th>
                                <th>Mobile</th>
                                  <th>Email</th>
                                    <th>National ID</th>
                                      <th>Date Registered</th>

                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>

                              <tr v-for="(p,index) in posts" @key="index">
                                <td>{{index+1}}</td>
                                <td>
                                  <img :src="'/images/' +p.image" class="rounded-circle mb-3" height="70px" width="70px" alt="">
                                </td>
                                <td>{{p.name}}</td>
                                <td>{{p.mobile}}</td>
                                <td>{{p.email}}</td>
                                <td>{{p.national_id}}</td>
                                <td>{{p.registration_date|date}}</td>


                                <td>
                                <router-link :to="{name: 'member_edit', params: { id: p.id }}" class="btn btn-primary btn-sm">Edit</router-link>
                                </td>
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

            this.axios.get('/api/member').then((response) => {
                //  console.log(response.data);
                this.posts = response.data;
            }).catch((error) => {
                console.log(error);
            })
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

                if (result.value) {
                  let uri = `/api/member/${id}`;
                  this.axios.delete(uri).then(response => {
                    //  this.posts.splice(this.posts.indexOf(id), 1);
                      this.fetchData();
                  });
                    swal.fire(
                        'Deleted!',
                        'Member has been deleted.',
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
