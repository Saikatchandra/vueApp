<template>
  <div>
        <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">User update</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">User update</li>
              </ol>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->

      <section class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Update User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form  @submit.prevent="updateUser">
                  <!-- <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">User Name</label>
                      <input
                        type="text"
                        class="form-control"
                        name="name"
                        v-model="name"
                        id="exampleInputEmail1"
                        placeholder="Enter name"
                      />
                       <div v-if = "errors && errors.details">{{errors.name[0]}}</div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">User email</label>
                      <input
                        type="text"
                        class="form-control"
                        name="email"
                        v-model="email"
                        id="exampleInputEmail1"
                        placeholder="Enter email"
                      />
                       <div v-if = "errors && errors.details">{{errors.email[0]}}</div>
                    </div>
                    
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-3">
                      Submit
                    </button>
                    <router-link to="/userList" class="btn btn-warning">
                      Back</router-link
                    >
                  </div> -->

                    <div class="card-body">
                    <div class="row">
                        <div class="col-7 right-border">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for=""> Name</label>
                                     <input type="text" class="form-control" id="" v-model="name" placeholder="Enter Name" name="name">
                                    <!-- <has-error :form="form" field="name"></has-error> -->
                                     <!-- <div v-if = "errors && errors.name">{{errors.name[0]}}</div> -->
                                       <div
                        v-if="form.errors.has('name')"
                        v-html="form.errors.get('name')"
                      />
                                    </div>
                                </div>

                                 <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1"> Email</label>
                                     <input type="text" class="form-control" id="exampleInputEmail1" v-model="email" placeholder="Enter Email"
                                    :class="{ 'is-invalid': form.errors.has('email') } " name="email">
                                    <has-error :form="form" field="email"></has-error>
                                     <div v-if = "errors && errors.email">{{errors.email[0]}}</div>
                                    </div>
                                </div>

                            </div>


                             <div class="row">
                                <div class="col-md-12">
                                     <div class="form-group">
                                    <label for="exampleInputEmail1">Select Role</label>
                                    <select type="text" class="form-control" id="exampleInputEmail1" v-model="roles" name="roles">
                                  
                                    <option :value="role.id" v-for="role in getRoleList" :key="role.id">{{role.name}}</option>
                                    </select>
                                        <!-- <has-error :form="form" field="roles"></has-error> -->
                                    </div>
                                </div>

                            </div>

                           

                        </div>

                        <div class="col-md-5">

                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                     <input type="password" class="form-control" id="exampleInputEmail1" v-model="form.password" placeholder="Enter Password"
                                    :class="{ 'is-invalid': form.errors.has('password') } " name="password">
                                    <!-- <has-error :form="form" field="password"></has-error> -->
                                    </div>

                                    
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Confirm Password</label>
                                     <input type="password" class="form-control" id="exampleInputEmail1" v-model="form.cpassword" placeholder="Confirm Password"
                                    :class="{ 'is-invalid': form.errors.has('cpassword') } " name="cpassword">
                                    <!-- <has-error :form="form" field="cpassword"></has-error> -->
                                    </div>
                                </div>

                            </div>

                             <div class="row">
                                <div class="col-md-12">
                                   <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-sm btn-primary mr-2">Submit</button>
                                    <router-link to="/userList" class="btn btn-sm btn-danger">
                      Back</router-link
                    >
                                    </div>
                                </div>

                            </div>
                            
                            
                        </div>
                    </div>
                  
                </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>

      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  </div>
</template>

<script>
import Form from "vform";
export default {
  name: "add",

  data () {
    return {
      // Create a new form instance
      form: new Form({
        name: '',
        email:'',
        password:'',
        cpassword:'',
        roles:'',
      })
    }
  },


  mounted() {
    this.$store.dispatch('getRoleList')
  },

  computed: {
    getRoleList() {
      return this.$store.getters.roleList;
    },
  },



  created() {
     axios
      .get("/getUserById/" + this.$route.params.userId)
      .then((res) => {
        console.log(res);
        this.name = res.data.userById.name;
        this.email = res.data.userById.email;
        this.roles = res.data.userById.roles;
        this.form.password = ''
      })
      .catch((e) => {
        console.log(e);
      });
  },

  
  
  methods:{
    updateUser() {
       let form = new FormData;
          form.append('name', this.name);
          form.append('email', this.email);
          form.append('roles', this.roles);
          form.append('password', this.password);
          form.append('cpassword', this.cpassword);
         
            axios.post(`/updateUser/${this.$route.params.userId}`,form)
                .then((res) => {
                    console.log(res);
                    this.$router.push("/userList");
                    Toast.fire({
                        icon: "success",
                        title: "User updated successfully",
                    });
                })
                .catch((error) => {
                    console.log(error);
                    this.errors = error.response.data.errors;
                });
    },
  }


};
</script>

<style lang="scss" scoped>
</style>