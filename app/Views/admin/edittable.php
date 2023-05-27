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
            <h3 class="card-title">Table's Information</h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <form action="<?= base_url(); ?>table/save" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= isset($data['id']) ? $data['id'] : '' ?>">
            <?= csrf_field(); ?>
            <div class="card-body">
                <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?= isset($data['name']) ? $data['name'] : '' ?>" required>
                </div>
                <div class="form-group">
                <label for="size">Size</label>
                <select class="form-control" id="size" name="size" required>
                <option value="Small (2 Person)" <?= isset($data['size']) && $data['size'] == 'Small (2 Person)' ? 'selected' : '' ?>>Small (2 Person)</option>
                <option value="Medium (4 Person)" <?= isset($data['size']) && $data['size'] == 'Medium (4 Person)' ? 'selected' : '' ?>>Medium (4 Person)</option>
                <option value="Large (6 Person)" <?= isset($data['size']) && $data['size'] == 'Large (6 Person)' ? 'selected' : '' ?>>Large (6 Person)</option>
                </select>
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
</section>