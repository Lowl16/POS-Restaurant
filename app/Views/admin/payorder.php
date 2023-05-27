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
            <h3 class="card-title">Payment's Information</h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <form action="<?= base_url(); ?>payment/save" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="form-group mt-3">
                        <label for="order_id">Order ID</label>
                        <input type="number" name="order_id" id="order_id" class="form-control" value="<?= isset($data['id']) ? $data['id'] : ''?>" readonly style="cursor: not-allowed;">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="form-group mt-3">
                        <label>Order Date</label>
                        <input type="text" class="form-control" value="<?= isset($data['order_date']) ? $data['order_date'] : ''?>" readonly style="cursor: not-allowed;">
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mx-3" style="background-color: gray">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="form-group mt-3">
                        <label for="user_id">Costumer ID</label>
                        <input type="number" name="user_id" id="user_id" class="form-control" value="<?= isset($data['user_id']) ? $data['user_id'] : ''?>" readonly style="cursor: not-allowed;">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="form-group mt-3">
                        <label>Customer Name</label>
                        <input type="text" class="form-control" value="<?= isset($data['username']) ? $data['username'] : ''?>" readonly style="cursor: not-allowed;">
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mx-3" style="background-color: gray">
            <div class="row">
            <div class="col-md-6">
                <div class="card-body">
                    <div class="form-group mt-3">
                    <label for="pay_method">Payment Method</label>
                    <select class="form-control select2" style="width: 100%;" id="pay_method" name="pay_method" required>
                        <option value="" disabled selected>-- Choose Payment Method --</option>
                        <option value="Cash">Cash</option>
                        <option value="Gopay">Gopay</option>
                    </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <div class="form-group mt-3">
                    <label for="pay_amount">Amount (Rp)</label>
                    <input type="number" name="pay_amount" id="pay_amount" class="form-control" value="<?= isset($data['price']) ? $data['price'] * $data['product_quantity'] : ''?>" readonly style="cursor: not-allowed;">
                    </div>
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