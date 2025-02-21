<x-header/>

    <x-sidebar/>
 
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
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> Create </button>
                  </div>
                 
                    <table id="example" class="table-wrapper table table-striped nowrap" style="width:100%">
                      <thead>
                        <tr>
                          <th class="lead-info">
                            <h6>Image</h6>
                          </th>
                          <th class="lead-email">
                            <h6>Name</h6>
                          </th>
                          <th class="lead-phone">
                            <h6>Email</h6>
                          </th>
                          <th class="lead-company">
                            <h6>Phone</h6>
                          </th>
                          <th>
                            <h6>Action</h6>
                          </th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <tbody>
                      @foreach($customers as $customer)
                        <tr>
                          <td class="min-width">
                            <div class="lead">
                             
                              <div class="lead-text">
                              <img src="{{ asset('uploads/' . $customer->image) }}" alt="Media" width="100">
                              </div>
                            </div>
                          </td>
                          <td class="min-width">
                            <p><a href="#0">{{ $customer->name }}</a></p>
                          </td>
                          <td class="min-width">
                            <p><a href="#0">{{ $customer->email }}</a></p>
                          </td>
                         
                          <td class="min-width">
                            <p>{{ $customer->phone }}</p>
                          </td>
                          <td>
                            <div class="action">
                            <a href="{{ URL::to('deletcustomers', $customer->id) }}" class="text-danger"  onclick="return confirm('Are you sure you want to delete this Customer?')">
                                <i class="lni lni-trash-can"></i>
                            </a>
                            </div>
                          </td>
                        </tr>
                    
                 
                     @endforeach
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
        <form action="{{ URL::to('/addcustomers') }}" method="POST" enctype="multipart/form-data">
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
                <input type="number" class="form-control" name="phone" placeholder="Phone" required />
                </div>
                
                <div class="col-lg-6">
                <input type="text" class="form-control" name="city" placeholder="city" required />
                </div>

                <div class="col-lg-6">
                <input class="form-control" type="file" name="image" id="formFile" />
                </div>
                <div class="col-lg-6">
                  <label class="form-label">Address</label>
                   <textarea class="form-control desiri derty2" name="address" required></textarea>
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
