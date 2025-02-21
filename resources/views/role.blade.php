<x-header/>

    <!-- ======== sidebar-nav start =========== -->
    <x-sidebar/>
  
      <!-- ========== header end ========== -->

   
      <h4>Create Role</h4>
    <form action="{{ URL::to('roles') }}" method="POST">
      @csrf
        <!-- Name and Description -->
        <div>
            <label for="roleName">Role Name</label>
            <input type="text" id="roleName" name="role_name" placeholder="Enter role name">
        </div>
        <div>
            <label for="roleDescription">Role Description</label>
            <textarea id="roleDescription" name="role_description" rows="3" placeholder="Enter role description"></textarea>
        </div>

        <h5>Assign Permissions</h5>
        <!-- Permissions Checkbox List -->
        <div>
            <input type="checkbox" id="dashboard" name="permissions[]" value="Dashboard">
            <label for="dashboard">Dashboard</label>
        </div>
        <div>
            <input type="checkbox" id="users" name="permissions[]" value="Users">
            <label for="users">Users</label>
        </div>
        <div>
            <input type="checkbox" id="roles" name="permissions[]" value="Roles">
            <label for="roles">Roles</label>
        </div>
        <div>
            <input type="checkbox" id="products" name="permissions[]" value="Products">
            <label for="products">Products</label>
        </div>
        <div>
            <input type="checkbox" id="category" name="permissions[]" value="Category">
            <label for="category">Category</label>
        </div>
        <div>
            <input type="checkbox" id="brand" name="permissions[]" value="Brand">
            <label for="brand">Brand</label>
        </div>
        <div>
            <input type="checkbox" id="unit" name="permissions[]" value="Unit">
            <label for="unit">Unit</label>
        </div>
        <div>
            <input type="checkbox" id="warehouse" name="permissions[]" value="Warehouse">
            <label for="warehouse">Warehouse</label>
        </div>
        <div>
            <input type="checkbox" id="adjustments" name="permissions[]" value="Adjustments">
            <label for="adjustments">Adjustments</label>
        </div>
        <div>
            <input type="checkbox" id="transfers" name="permissions[]" value="Transfers">
            <label for="transfers">Transfers</label>
        </div>
        <div>
            <input type="checkbox" id="sales" name="permissions[]" value="Sales">
            <label for="sales">Sales</label>
        </div>
        <div>
            <input type="checkbox" id="purchases" name="permissions[]" value="Purchases">
            <label for="purchases">Purchases</label>
        </div>
        <div>
            <input type="checkbox" id="quotations" name="permissions[]" value="Quotations">
            <label for="quotations">Quotations</label>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit">Create Role</button>
        </div>
    </form>





      <!-- ========== table components end ========== -->

      <!-- ========== footer start =========== -->
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 order-last order-md-first">
              <div class="copyright text-center text-md-start">
                <p class="text-sm">
                  Designed and Developed by
                  <a href="https://plainadmin.com" rel="nofollow" target="_blank">
                    PlainAdmin
                  </a>
                </p>
              </div>
            </div>
            <!-- end col-->
            <div class="col-md-6">
              <div class="terms d-flex justify-content-center justify-content-md-end">
                <a href="#0" class="text-sm">Term & Conditions</a>
                <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
              </div>
            </div>
          </div>
          <!-- end row -->
        </div>
        <!-- end container -->
      </footer>
      <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="row gy-4">
                 <div class="col-lg-6">
                   <input type="text" class="form-control" placeholder="First Name"/>
                 </div>
                 <div class="col-lg-6">
                  <input type="text" class="form-control" placeholder="Email"/>
                 </div>
                 <div class="col-lg-6">
                  <input type="password" class="form-control" placeholder="Password"/>
                 </div>
                 <div class="col-lg-6">
                  <input class="form-control" type="file" id="formFile">
                 </div>
                 <div class="col-lg-12">
                   <button type="button" class="btn btn-primary"> Submit </button>
                 </div>
              </div>
          </div>
         
        </div>
      </div>
    </div> -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Record</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ URL::to('/add-record') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
            <div class="row gy-4">
                <div class="col-lg-6">
                <input type="text" class="form-control" name="name" placeholder="First Name" required />
                </div>
                <div class="col-lg-6">
                <input type="email" class="form-control" name="email" placeholder="Email" required />
                </div>
                <div class="col-lg-6">
                <input type="password" class="form-control" name="password" placeholder="Password" required />
                </div>
                
                <div class="col-lg-6">
                <select class="form-control" name="role" required>
                    <option value="" disabled selected>Choose Role</option>
                    <option value="Admin">Admin</option>
                    <option value="Manager">Manager</option>
                    <option value="Staff">Staff</option>
                </select>
                </div>
                <div class="col-lg-6">
                <select class="form-control" name="status" required>
                    <option value="" disabled selected>Choose Status</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
                </div>
                <div class="col-lg-6">
                <input class="form-control" type="file" name="profile_image" id="formFile" />
                </div>
                <div class="col-lg-4">
                <p>Access warehouses</p>
                <select class="form-control" name="warehouse" required>
                    <option value="" disabled selected>Choose Warehouse</option>
                    <option value="Warehouse 1">Warehouse 1</option>
                    <option value="Warehouse 2">Warehouse 2</option>
                    <option value="Warehouse 3">Warehouse 3</option>
                </select>
                </div>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
    </div>


    <!-- ========= All Javascript files linkup ======== -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/js/dynamic-pie-chart.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>
    <script src="assets/js/jvectormap.min.js"></script>
    <script src="assets/js/world-merc.js"></script>
    <script src="assets/js/polyfill.js"></script>
    <script src="assets/js/main.js"></script>

    
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>

    <script>
          new DataTable('#example', {
              responsive: true
          });
    </script>
  </body>
</html>
