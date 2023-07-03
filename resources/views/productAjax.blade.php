<!DOCTYPE html>
<html>

<head>
    <title>CRUD</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">ZIMO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Create New Product Button -->
        <div class="text-right mb-2">
            <a class="btn btn-success" href="javascript:void(0)" id="createNewProduct">Create New Product</a>
        </div>







        <!-- Yajra DataTable -->
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Country</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>







        {{-- <!-- Graph Container -->
        <div id="chartContainer"></div>
    </div> --}}






        <!-- Ajax Model for Create/Edit Product -->
        <div class="modal fade" id="ajaxModel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeading"></h4>
                    </div>
                    <div class="modal-body">
                        <!-- Product Form -->
                        <form id="productForm" name="productForm" class="form-horizontal">
                            @csrf
                            <input type="hidden" name="product_id" id="product_id">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" id="email" name="email" required placeholder="Enter Email" class="form-control">
                                    <div class="invalid-feedback">
                                        Please provide a valid email address.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone_number" class="col-sm-2 control-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="tel" id="phone_number" name="phone_number" required placeholder="Enter Phone Number" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country" class="col-sm-2 control-label">Country</label>
                                <div class="col-sm-10">
                                    <input type="text" id="country" name="country" required placeholder="Enter Country" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes</button>
                                </div>
                            </div>
                        </form>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>









        <script type="text/javascript">
            $(function() {
                /* Pass Header Token */
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });








                /* Render DataTable */
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('products-ajax-crud.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'phone_number',
                            name: 'phone_number'
                        },
                        {
                            data: 'country',
                            name: 'country'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });










                // /* Fetch User Data by Country */
                // $.ajax({
                //     url: "{{ route('products-ajax-crud.usersByCountry') }}",
                //     type: "GET",
                //     dataType: 'json',
                //     success: function(data) {
                //         /* Process the data and create the graph */
                //         var dataPoints = [];
                //         for (var country in data) {
                //             dataPoints.push({
                //                 label: country,
                //                 y: data[country]
                //             });
                //         }

                //         var chart = new CanvasJS.Chart("chartContainer", {
                //             theme: "light2",
                //             animationEnabled: true,
                //             title: {
                //                 text: "Registered Users by Country"
                //             },
                //             data: [{
                //                 type: "column",
                //                 dataPoints: dataPoints
                //             }]
                //         });

                //         chart.render();
                //     },
                //     error: function(data) {
                //         console.log('Error:', data);
                //     }
                // });

                // /* Redirect to User Data by Country */
                // var chart = chart; // Assuming you have a CanvasJS chart instance called 'chart'
                // chart.addEventListener("click", function(e) {
                //     // Check if a data point is clicked
                //     if (typeof e.dataPoint !== "undefined") {
                //         var country = e.dataPoint.label;
                //         window.location.href = "/user-data/" + country;
                //     }
                // });








                /* Create New Product Button Click Event */
                $('#createNewProduct').click(function() {
                    $('#saveBtn').val("create-product");
                    $('#product_id').val('');
                    $('#productForm').trigger("reset");
                    $('#modelHeading').html("Create New Product");
                    $('#ajaxModel').modal('show');
                });








                /* Product Form Submit Event */
                $('#saveBtn').click(function(e) {
                    e.preventDefault();
                    $(this).html('Saving...');

                    $.ajax({
                        data: $('#productForm').serialize(),
                        url: "{{ route('products-ajax-crud.store') }}",
                        type: "POST",
                        dataType: 'json',
                        success: function(response) {
                            $('#productForm').trigger("reset");
                            $('#ajaxModel').modal('hide');
                            table.draw();
                            $('#saveBtn').html('Save');
                        },
                        error: function(data) {
                            console.log('Error:', data);
                            $('#saveBtn').html('Save');
                        }
                    });
                });





                
                /* Edit Product Button Click Event */
                $('body').on('click', '.editProduct', function() {
                    var product_id = $(this).data('id');
                    $.get("{{ route('products-ajax-crud.index') }}" + '/' + product_id + '/edit', function(
                    data) {
                        $('#modelHeading').html("Edit Product");
                        $('#saveBtn').val("edit-product");
                        $('#ajaxModel').modal('show');
                        $('#product_id').val(data.id);
                        $('#name').val(data.name);
                        $('#email').val(data.email);
                        $('#phone_number').val(data.phone_number);
                        $('#country').val(data.country);
                    })
                });

                /* Delete Product Button Click Event */
                $('body').on('click', '.deleteProduct', function() {
                    var product_id = $(this).data("id");
                    if (confirm("Are you sure you want to delete this product?")) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('products-ajax-crud.store') }}" + '/' + product_id,
                            success: function(data) {
                                table.draw();
                            },
                            error: function(data) {
                                console.log('Error:', data);
                            }
                        });
                    }
                });
            });
        </script>
</body>

</html>
