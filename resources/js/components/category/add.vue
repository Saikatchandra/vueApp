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
                <form
                  @submit.prevent="saveCategory"
                  @keydown="form.onKeydown($event)"
                >
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Name</label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="form.cat_name"
                        name="cat_name"
                        id="exampleInputEmail1"
                        placeholder="Enter category name"
                      />
                      <div
                        v-if="form.errors.has('cat_name')"
                        v-html="form.errors.get('cat_name')"
                      />
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                      Submit
                    </button>
                    <router-link to="/category" class="btn btn-warning">
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
export default {};
</script>

<style lang="scss" scoped>
</style>