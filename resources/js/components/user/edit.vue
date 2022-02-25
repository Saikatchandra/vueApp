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
                  <div class="card-body">
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
                    <!-- <div class="form-group">
                      <label for="exampleInputEmail1">User password</label>
                      <input
                        type="text"
                        class="form-control"
                        name="password"
                        v-model="password"
                        id="exampleInputEmail1"
                        placeholder="Enter password"
                      />
                       <div v-if = "errors && errors.details">{{errors.password[0]}}</div>
                    </div> -->
                    <!-- <div class="form-group">
                      <label for="exampleInputEmail1">Role</label>
                     
                      <select name="roles" v-model = "roles" id="" class="form-control" >
                        <option value="">sdfsdf</option>
                        
                      </select>
                      <div v-if = "errors && errors.title">{{errors.name[0]}}</div>
                     
                    </div> -->
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-3">
                      Submit
                    </button>
                    <router-link to="/userList" class="btn btn-warning">
                      Back</router-link
                    >
                    <!-- <button type="submit" @click="goBack" class="btn btn-warning">Back</button> -->
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

  data() {
    return {
      name: '',
      email: '',
      // password: '',
      // roles: '',
      errors: {},
    }
  },

  created() {
     axios
      .get("/getUserById/" + this.$route.params.userId)
      .then((res) => {
        console.log(res);
        this.name = res.data.userById.name;
        this.email = res.data.userById.email;
      })
      .catch((e) => {
        console.log(e);
      });
  },

  // mounted() {
  //     axios.get('/getCategoryById/'+this.$route.params.categoryId).then((res) => {
  //         console.log(res);
  //         this.form.fill(res.data.categoryById);
  //     }).catch((e) => {
  //         console.log(e);
  //     })
  // },
  
  methods:{
    updateUser() {
       let form = new FormData;
          form.append('name', this.name);
          form.append('email', this.email);
         
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