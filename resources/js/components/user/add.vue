<template>
   <div>
        <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">User add</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">User add</li>
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
                  <h3 class="card-title">add User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
              <form role="form" @submit.prevent = 'userSave' enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-7 right-border">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for=""> Name</label>
                                     <input type="text" class="form-control" id="" v-model="form.name" placeholder="Enter Name" name="name">
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
                                     <input type="text" class="form-control" id="exampleInputEmail1" v-model="form.email" placeholder="Enter Email"
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
                                    <select type="text" class="form-control" id="exampleInputEmail1" v-model="form.roles"
                                    :class="{ 'is-invalid': form.errors.has('roles') } " name="roles">
                                  
                                    <option :value="role.id" v-for="role in getRoleList" :key="role.id">{{role.name}}</option>
                                    </select>
                                        <has-error :form="form" field="roles"></has-error>
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
                                    <has-error :form="form" field="password"></has-error>
                                    </div>

                                    
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Confirm Password</label>
                                     <input type="password" class="form-control" id="exampleInputEmail1" v-model="form.cpassword" placeholder="Confirm Password"
                                    :class="{ 'is-invalid': form.errors.has('cpassword') } " name="cpassword">
                                    <has-error :form="form" field="cpassword"></has-error>
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
                <!-- /.card-body -->

               
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
  name: "Save",

  mounted(){
      this.$store.dispatch('getRoleList')
    },
    computed:{
      getRoleList(){
       
        return this.$store.getters.roleList
      }


    },

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

  methods: {
    
    userSave () {
      // Submit the form via a POST request
      this.form.post('/saveUser')
        .then((response) => {
           this.$router.push('/userList');
           Toast.fire({
            icon: 'success',
            title: 'User added successfully'
          })
           
       }).catch((error)=>{
          console.log(error);
       });
    },

    goBack(){
      this.$router.push('/user');
    },

  }

}
</script>

<style>
 .right-border{
     border-right:1px solid black;
 }
</style>