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
            <h3 class="card-title">Customer's Information</h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <form action="<?= base_url(); ?>customer/save" method="POST">
            <input type="hidden" name="id" value="<?= isset($data['id']) ? $data['id'] : '' ?>">
            <?= csrf_field(); ?>
            <div class="card-body">
                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="form-group">
                    <div class="card mb-4 mt-2">
                        <div class="card-header bg-danger border-bottom-0 rounded-top">
                            <h3 class="card-title text-white"><strong>Update customer failed!</strong></h3>
                        </div>
                        <div class="card-body mb-n3  border border-top-0 rounded-bottom">
                            <?php echo session()->getFlashdata('error'); ?>
                        </div>
                    </div>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= isset($data['username']) ? $data['username'] : '' ?>" placeholder="Username" required>
                </div>
                <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= isset($data['email']) ? $data['email'] : '' ?>" placeholder="Email" required>
                </div>
                <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Passsword" required>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= base_url('customer/index/') ?>"  class="btn btn-primary rounded ml-1 float-right" title="Back to List"><i class="fa fa-angle-left"></i> Back to List</a>
            </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</section>