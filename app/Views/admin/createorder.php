<!-- Main content -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<!-- Font Awesome -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">

<!-- Select2 -->
<link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Order's Information</h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <form action="<?= base_url(); ?>order/save" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="form-group mt-3">
                        <label for="user_id">Customer Name</label>
                        <select name="user_id" id="user_id" class="form-control select2" required>
                        <option value="" disabled selected>-- Choose Customer --</option>
                        <?php foreach ($customers as $i) : ?>
                            <option value="<?= $i['id'] ?>" <?= !empty($request->getPost('user_id')) && $request->getPost('user_id') == $i['id'] ? 'selected' : '' ?>><?= $i['username'] ?></option>
                        <?php endforeach ?>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="form-group mt-3">
                        <label>Customer ID</label>
                        <input type="text" id="customer_id" class="form-control" value="" readonly style="cursor: not-allowed;">
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mx-3" style="background-color: gray">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="form-group">
                        <label for="table_id">Table Name</label>
                        <select name="table_id" id="table_id" class="form-control select2" required>
                        <option value="" disabled selected>-- Choose Table --</option>
                        <?php foreach ($tables as $i) : ?>
                            <option value="<?= $i['id'] ?>" <?= !empty($request->getPost('table_id')) && $request->getPost('table_id') == $i['id'] ? 'selected' : '' ?>><?= $i['name'] ?></option>
                        <?php endforeach ?>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="form-group">
                        <label>Table Size</label>
                        <input type="text" id="table_size" class="form-control" value="" readonly style="cursor: not-allowed;">
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mx-3" style="background-color: gray">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="form-group">
                        <input type="hidden" name="product_id" id="product_id" value="<?= isset($product['id']) ? $product['id'] : ''?>">
                        <label>Product Name</label>
                        <input type="text" class="form-control" placeholder="Name" value="<?= isset($product['name']) ? $product['name'] : '' ?>" readonly style="cursor: not-allowed;">
                        </div>
                        <div class="form-group">
                        <label>Product Price</label>
                        <input type="number" class="form-control" placeholder="Price" value="<?= isset($product['price']) ? $product['price'] : '' ?>" readonly style="cursor: not-allowed;">
                        </div>
                        <div class="form-group">
                        <label for="product_quantity">Product Quantity</label>
                        <input type="number" class="form-control" name="product_quantity" id="product_quantity" placeholder="Quantity" required>
                        </div>
                        <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" rows="3" placeholder="Description" readonly style="cursor: not-allowed;"><?= isset($product['description']) ? $product['description'] : '' ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ml-md-n3 ml-0">
                    <div class="card-body">
                    <?php if (isset($product['image'])) : ?>
                        <div class="form-group text-center">
                        <label class="d-block">Product Image</label>
                        <div class="image-container">
                            <img src="<?= base_url($product['image']) ?>" alt="Current Image" class="img-fluid" width="275">
                            <input type="hidden" name="current_image" value="<?= $product['image'] ?>">
                        </div>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div> 
        </div>
        </div>
    </div>
    </div>
</section>

<script>
    $(function () {
    //Initialize Select2 Elements
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    })

    $('#user_id').on('change', function() {
        var selectedCustomerId = $(this).val();
        $('#customer_id').val(selectedCustomerId);
    });

    $('#table_id').on('change', function() {
        var selectedTableId = $(this).val();
        var selectedTableSize = getTableSizeById(selectedTableId);
        $('#table_size').val(selectedTableSize);
    });

    function getTableSizeById(tableId) {
        var tableSize = '';

        // Send AJAX request to retrieve table size based on table ID
        $.ajax({
            url: 'get_table_size.php', // Ganti dengan URL endpoint yang sesuai untuk mengambil data dari database
            type: 'POST',
            data: { table_id: tableId },
            async: false,
            success: function(response) {
                tableSize = response;
            },
            error: function() {
                console.log('Error occurred while fetching table size.');
            }
        });

        return tableSize;
    }
</script>
<script src="/assets/plugins/select2/js/select2.full.min.js"></script>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Add event listener to update the label text when a file is selected
    $(document).ready(function() {
    $('.custom-file-input').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName);
        readURL(this);
    });

    // Function to preview the selected image
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-preview').html('<img src="' + e.target.result + '" alt="Preview Image" width="100">');
                $('#image-preview-label').show();
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            $('#image-preview').empty();
            $('#image-preview-label').hide();
        }
    }
    });
</script> -->