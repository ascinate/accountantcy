<x-header/>

    <!-- ======== sidebar-nav start =========== -->
    <x-sidebar/>
  
      <!-- ========== header end ========== -->

      <!-- ========== table components start ========== -->
      <section class="table-components">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Tables</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="#0">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Tables
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->

          <!-- ========== tables-wrapper start datatable ========== -->
          <div class="tables-wrapper">
            <div class="row">
              <div class="col-lg-12">
                
                <div class="card-style mb-30">
                  <div class="d-flex align-items-center w-100 justify-content-between">
                      <div class="ledt-divtyu">
                        <h6 class="mb-10">User list</h6>
                        <p class="text-sm mb-20">
                          For basic styling—light padding and only horizontal
                          dividers—use the class table.
                        </p>
                      </div>
                      <a href="{{ URL::to('role/create') }}" class="btn btn-primary" > Create </a>
                  </div>
                 
                    <table id="example" class="table-wrapper table table-striped nowrap" style="width:100%">
                      <thead>
                        <tr>
                          <th class="lead-info">
                            <h6>Name</h6>
                          </th>
                          <th class="lead-email">
                            <h6>Email</h6>
                          </th>
                          <th class="lead-phone">
                            <h6>Role</h6>
                          </th>
                          <th class="lead-company">
                            <h6>Warehouse</h6>
                          </th>
                          <th>
                            <h6>Action</h6>
                          </th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <tbody>
                      
                        <tr>
                          <td class="min-width">
                            <div class="lead">
                             
                              <div class="lead-text">
                              
                              </div>
                            </div>
                          </td>
                          <td class="min-width">
                            
                          </td>
                          <td class="min-width">
                            
                          </td>
                          <td class="min-width">
                          
                          </td>
                          <td>
                            <div class="action">
                             <a href="#" class="text-danger"  onclick="return confirm('Are you sure you want to delete this User?')">
                                <i class="lni lni-trash-can"></i>
                            </a>
                            </div>
                          </td>
                        </tr>
                    
                 
                  
                      </tbody>
                    </table>
                    <!-- end table -->
                 
                </div>
                <!-- end card -->
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->

            
            <!-- end row -->
          </div>
          <!-- ========== tables-wrapper end ========== -->
        </div>
        <!-- end container -->
      </section>
      <!-- ========== table components end ========== -->

   <x-footer/>