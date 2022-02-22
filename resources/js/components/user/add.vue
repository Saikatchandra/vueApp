<template>
  <div>
        <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Category add</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Category add</li>
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
                  <h3 class="card-title">Add new Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form  @submit.prevent="saveCategory" @keydown="form.onKeydown($event)">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">User Name</label>
                      <input
                        type="text"
                        class="form-control"
                        name="name"
                        v-model="name"
                        id="exampleInputEmail1"
                        placeholder="Enter User name"
                      />
                      <div v-if = "errors && errors.title">{{errors.name[0]}}</div>
                      <!-- <div
                        v-if="form.errors.has('cat_name')"
                        v-html="form.errors.get('cat_name')"
                      /> -->
                    </div>
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
      errors: {},
    }
  },
  
  methods:{
    saveUser(){
     let form = new FormData;
          form.append('name', this.name);
        
            
              axios.post("/saveUser",form)
                .then((res) => {
                    console.log(res);
                    this.$router.push("/userList");
                    Toast.fire({
                        icon: "success",
                        title: "User Added successfully",
                    });
                })
                .catch((error) => {
                    console.log(error);
                    this.errors = error.response.data.errors;
                });
    }
  }


};
</script>

<style lang="scss" scoped>
</style>