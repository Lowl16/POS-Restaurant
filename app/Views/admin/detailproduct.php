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

<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Product's Information</h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <div class="row">
            <div class="col-md-8">
                <div class="card-body">
                    <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?= isset($data['name']) ? $data['name'] : '' ?>" readonly style="cursor: not-allowed;">
                    </div>
                    <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Price" value="<?= isset($data['price']) ? $data['price'] : '' ?>" readonly style="cursor: not-allowed;">
                    </div>
                    <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" rows="3" placeholder="Description" id="description" name="description" readonly style="cursor: not-allowed;"><?= isset($data['description']) ? $data['description'] : '' ?></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ml-md-n3 ml-0">
                <div class="card-body">
                <?php if (isset($data['image'])) : ?>
                    <div class="form-group text-center">
                    <label class="d-block">Image</label>
                    <div class="image-container">
                        <img src="<?= base_url($data['image']) ?>" alt="Current Image" class="img-fluid" width="275">
                        <input type="hidden" name="current_image" value="<?= $data['image'] ?>">
                    </div>
                    </div>
                <?php endif; ?>
                </div>
            </div>
            </div>
            <div class="card-footer">
            <a href="<?= base_url('product/edit/'.(isset($data['id']) ? $data['id'] : '')) ?>" class="btn btn-warning rounded" title="Edit Product"><i class="fa fa-edit"></i> Update</a>
            <a href="<?= base_url('product/delete/'.(isset($data['id']) ? $data['id'] : '')) ?>" class="btn btn-danger rounded ml-1" onclick="if(confirm('Are you sure to delete this product details?') === false) event.preventDefault()" title="Delete Product"><i class="fa fa-trash"></i> Delete</a>
            <a href="<?= base_url('product/index/') ?>"  class="btn btn-primary rounded ml-1" title="Back to List"><i class="fa fa-angle-left"></i> Back to List</a>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
</script>