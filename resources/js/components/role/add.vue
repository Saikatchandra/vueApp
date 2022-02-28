<template>
  <div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Role add</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Role add</li>
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
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add new Role</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form
                  @submit.prevent="saveRole"
                  @keydown="form.onKeydown($event)"
                >
                  <div class="row">
                    <div class="col-md-4">
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Role Name</label>
                          <input
                            type="text"
                            class="form-control"
                            name="name"
                            v-model="form.name"
                            id="exampleInputEmail1"
                            placeholder="Enter name"
                          />
                          <div
                            v-if="form.errors.has('name')"
                            v-html="form.errors.get('name')"
                          />
                        </div>
                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary mr-3">
                          Submit
                        </button>
                        <router-link to="/roleList" class="btn btn-warning">
                          Back</router-link
                        >
                        <!-- <button type="submit" @click="goBack" class="btn btn-warning">Back</button> -->
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="card">
                        <div class="card-header">
                          <div class="row">
                            <div class="col-md-3">delete</div>
                            <div class="col-md-3">Edit</div>
                            <div class="col-md-3">Add</div>
                            <div class="col-md-3">List</div>
                          </div>

                        </div>
                        <div class="row">
                          <div class="col-md-3" v-for = "permission in getPermissionList" :key = "permission.id" >
                            <div class="row">
                              <div class="col-md-3">
                                <div class="form-group">
                                  <input
                                    type="checkbox"
                                    class="form-control"
                                    name="permission"
                                    v-model="form.permission"
                                    id=""
                                    :value = "permission.id"
                                  />
                                  <div
                                    v-if="form.errors.has('permission')"
                                    v-html="form.errors.get('permission')"
                                  />
                                </div>
                              </div>
                              <div class="col-md-9">
                                {{ permission.name }}
                              </div>
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

  data: () => ({
    form: new Form({
      name: "",
      permission: [],
    }),
  }),
  

  mounted() {
    this.$store.dispatch("getPermissionList");
  },
  computed: {
    getPermissionList() {
      return this.$store.getters.permissionList;
    },
  },

  methods: {
    saveRole() {
      this.form
        .post("/saveRole")
        .then((res) => {
          console.log(res);
          this.$router.push("/roleList");
          Toast.fire({
            icon: "success",
            title: "Role Added successfully",
          });
        })
        .catch((e) => {
          console.log(e);
        });
    },
  },
};
</script>

<style lang="scss" scoped>
</style>