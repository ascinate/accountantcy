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
          <div class="separator-breadcrumb border-top"></div>

<div id="section_purchase_list">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="text-end mb-3">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> Create </button>
              
          </div>

          <div class="table-responsive">
            <table id="purchase_table" class="display table table_height">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Date</th>
                  <th>Ref</th>
                  <th>Supplier</th>
                  <th>Warehouse</th>
                  <th>Grand Total</th>
                  <th>Paid</th>
                  <th>Due</th>
                  <th>Payment Status</th>
                  <th class="not_show">Action</th>
                </tr>
              </thead>
                <tbody>
                      @php
                      $i=0;
                      @endphp
                 
                      @foreach($purchases as $purchase)
                     
                        <tr>
                          <td class="min-width">
                            <div class="lead">
                             
                              <div class="lead-text">
                              <p><a href="#0">{{ "#".++$i }}</a></p>
                              </div>
                            </div>
                          </td>
                          <td class="min-width">
                          <p>{{ $purchase->date }}</p>
                          </td>
                          <td class="min-width">
                          <p>{{ $purchase->supplier_name ?? 'No Supplier' }}</p>
                          </td>
                         
                          <td class="min-width">
                          <p>{{ $purchase->warehouse_name ?? 'No Warehouse' }}</p>
                          </td>

                          <td class="min-width">
                          <p></p>
                          </td>

                          <td class="min-width">
                          <p></p>
                          </td>

                          <td class="min-width">
                          <p></p>
                          </td>

                          <td class="min-width">
                          <p></p>
                          </td>

                          <td class="min-width">
                          <p>{{ "Unpaid" }}</p>
                          </td>
                         
                          <td>
                            <div class="action">
                            <a href="{{ URL::to('deletepurchases', $purchase->id) }}" class="text-danger"  onclick="return confirm('Are you sure you want to delete this purchase?')">
                                <i class="lni lni-trash-can"></i>
                            </a>
                            </div>
                          </td>
                        </tr>
                    
                 
                     @endforeach
                      </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        console.log("Script Loaded!");

        $("#productSearch").on("keyup", function () {
            console.log("Keyup Event Fired!"); // Debugging Step
            let query = $(this).val().trim();

            if (query.length > 1) {
                $.ajax({
                    url: "{{ route('products.search') }}",
                    type: "GET",
                    data: { query: query },
                    success: function (response) {
                        console.log("Response Received:", response);
                        let dropdown = $("#productDropdown");
                        let tableBody = $("#productTable");
                        dropdown.empty().show();
                        tableBody.empty();

                        if (response.length > 0) {
                            response.forEach((product) => {
                                dropdown.append(`<li><a class="dropdown-item product-item" href="#" data-id="${product.id}">${product.name}</a>
                                </li>`);
                            });
                            tableBody.append(`
                                <tr>
                                    <td colspan="6" class="text-center">No data available</td>
                                </tr>
                            `);
                        } else {
                            dropdown.append('<li class="dropdown-item text-center">No results found</li>');
                            tableBody.append(`
                                <tr>
                                    <td colspan="6" class="text-center">No data available</td>
                                </tr>
                            `);
                        }
                    },
                    error: function () {
                        alert("Error fetching products. Please try again.");
                    }
                });
            } else {
                $("#productDropdown").hide();
                $("#productTable").empty().append(`
                    <tr>
                        <td colspan="6" class="text-center">No data available</td>
                    </tr>
                `);
            }
        });

        $(document).on("click", ".product-item", function (e) {
            e.preventDefault();
            let selectedProduct = $(this).text();
            let productId = $(this).data('id');
            $("#productSearch").val(selectedProduct);
            $("#productDropdown").hide();

            $('input[name="product_id"]').val(productId);

            $.ajax({
                url: "{{ route('products.search') }}",
                type: "GET",
                data: { query: selectedProduct },
                success: function (response) {
                    let tableBody = $("#productTable");
                    tableBody.empty();
                    if (response.length > 0) {
                        response.forEach((product, index) => {
                            tableBody.append(`
                                <tr id="product-row-${index}">
                                    <td>${index+1}</td>
                                    
                                    <td>${product.name}</td>
                                    <td id="unit-cost-${index}">${product.price}</td>
                                    <td>${product.stock_alert ?? 'N/A'}</td>
                                    <td> <div class="d-flex align-items-center">
                                     <span class="increment-decrement btn btn-light rounded-circle" onclick="decrement(${index}, ${product.price})">-</span>
                                      <input id="quantity-${index}" class="fw-semibold cart-qty m-0 px-2" type="number" min="0" value="1" oninput="updateSubtotal(${index}, ${product.price})">
                                      <span class="increment-decrement btn btn-light rounded-circle" onclick="increment(${index}, ${product.price})">+</span>
                                  </div></td>
                                     <td>
                                        ${product.unit_sale ?? 'N/A'}
                                    </td>
                                     <td>
                                        ${product.gst ?? 'N/A'}
                                    </td>
                                     <td id="subtotal-${index}">
                                        ${product.price ?? 'N/A'}
                                    </td>
                                     
                                    <td>
                              <a href="#" class="text-success" >
                                <i class="lni lni-pencil"></i>
                            </a> 

                            <a href="{{ URL::to('deletepurchases', $purchase->id) }}" class="text-danger"  onclick="return confirm('Are you sure you want to delete this purchase?')">
                                <i class="lni lni-trash-can"></i>
                            </a> 
                                    </td>
                                </tr>
                            `);
                            document.getElementById("grand_total").innerText = product.price;
                            
                            
                        });

                        
                       
                    }
                    
                    
                    else {
                        tableBody.append(`
                            <tr>
                                <td colspan="6" class="text-center">No data available</td>
                            </tr>
                        `);
                    }
                }
            });
        });
    });
</script>
<script>
  function increment(index, price) {
    let input = document.getElementById("quantity-" + index);
    input.value = parseInt(input.value) + 1;
    updateSubtotal(index, price);
  }

  function decrement(index, price) {
    let input = document.getElementById("quantity-" + index);
    if (parseInt(input.value) > 1) {
      input.value = parseInt(input.value) - 1;
      updateSubtotal(index, price);
    } else {
      input.value = 0;
      document.getElementById("subtotal-" + index).innerText = "0.00";
      updateGrandTotal();
    }
  }

  function updateSubtotal(index, price) {
    let quantity = document.getElementById("quantity-" + index).value;
    let subtotal = document.getElementById("subtotal-" + index);
    
    subtotal.innerText = (parseFloat(price) * parseInt(quantity)).toFixed(2);
    updateGrandTotal();
  }

  function updateGrandTotal() {
    let subtotals = document.querySelectorAll("[id^='subtotal-']");
    let grandTotal = 0;
    subtotals.forEach(sub => {
      grandTotal += parseFloat(sub.innerText) || 0;
    });
    document.getElementById("grand_total").innerText = grandTotal.toFixed(2);
  }

  window.onload = updateGrandTotal; 
</script>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ URL::to('/addpurchases') }}" method="POST">
                @csrf
                <div class="modal-body">
                  <div class="cmvb-div bg-white p-4">
                      <div class="row gy-4">
                          <div class="col-lg-6">
                          
                          <input type="date" class="form-control" name="date"  required />
                          </div>
                        
                          <div class="col-lg-6">
                            <select class="form-control" name="category" required>
                                <option value="" disabled selected>Choose Supplier</option>
                                @foreach ($suppliers as $supplier)
                                  <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="col-lg-6">
                            <select class="form-control" name="brand" required>
                                <option value="" disabled selected>Choose Warehouse</option>
                                @foreach ($warehouses as $warehouse)
                                  <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                @endforeach
                            </select>
                          </div>
                      
                        
                      </div>
                  </div>

                  <div class="input-group mb-3">
                            <span class="input-group-text bg-light"><i class="bi bi-search"></i></span>
                            <input type="text" id="productSearch" class="form-control" placeholder="Scan/Search Product by code or name">
                            
                  </div>

                  <div class="input-group mb-3">
                      
                      <ul id="productDropdown" class="dropdown-menu w-100"></ul>
                      </div>
                      <div class="table-responsive">
                          <table class="table table-bordered">
                              <thead class="table-light">
                                  <tr>
                                      <th>#</th>
                                      <th>Product Name</th>
                                      <th>Net Unit Cost</th>
                                      <th>Current Stock</th>
                                      <th>Qty</th>
                                      <th>Discount</th>
                                      <th>Tax</th>
                                      <th>Subtotal</th>
                                      <th>Action</th>
                                      
                                  </tr>
                              </thead>
                              <tbody id="productTable">
                                  <tr>
                                      <td colspan="6" class="text-center">No data available</td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>

                      <div class="offset-md-9 col-md-3 mt-4">
                      <table class="table table-striped table-sm">
                      <tbody>
                        <tr>
                          <td class="bold">Order Tax:</td>
                          <td><span id="order-tax">0.00</span></td>
                          <td v-else><span id="discount">(0.00%)</span></td>
                        </tr>
                        <tr>
                          <td class="bold">Discount:</td>
                          <td v-if="purchase.discount_type == 'fixed'"><span id="discount">0.00</span></td>
                          
                        </tr>
                        <tr>
                          <td class="bold">Shipping:</td>
                          <td><span id="shipping">0.00</span></td>
                        </tr>
                        <tr>
                          <td>
                            <span class="font-weight-bold">Grand Total:</span>
                          </td>
                        
                          <td><span id="grand_total"></span></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="cmvb-div bg-white p-4">
                    <div class="row gy-4">
                    
                    
                      <div class="col-lg-6 standard-only">
                        <input type="number" class="form-control" name="tax" placeholder="Order Tax(%)" required />
                      </div>

                  
                      <div class="col-lg-6 standard-only variable-only">
                        <input type="number" class="form-control" name="discount" placeholder="Discount" required />
                        <select class="form-control" id="inputGroupSelect02"
                          @change="Calcul_Total()" v-model="purchase.discount_type">
                          <option value="fixed">Fixed</option>
                          <option value="percent">Percent %</option>
                        </select>
                      </div>

                    
                      <div class="col-lg-6 standard-only variable-only">
                        <input type="number" class="form-control" name="shipping" placeholder="Shipping" required />
                      </div>

                      <div class="col-lg-6">
                          <label class="form-label">Please provide any details</label>
                          <textarea class="form-control desiri derty2" name="otherdetails" required></textarea>
                      </div>

                    
                    
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
