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

<style>
    .table-responsive {
    overflow-x: auto;
    }
</style>

<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">List of Cashier</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
            <a class="btn btn-success mb-3" href="<?= base_url('cashier/create')?>"><i class="fa-solid fa-plus"></i> Add Cashier</a>
            <table id="cashier" class="table table-striped table-hover">
                <thead>
                <tr class="bg-gradient bg-dark text-light">
                    <th class="text-center">#</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if(count($list) > 0): ?>
                    <?php $i = 1; ?>
                    <?php foreach($list as $row): ?>
                        <tr>
                            <th class="p-1 align-middle text-center"><?= $i++ ?></th>
                            <td class="p-1 align-middle text-center"><?= $row->username ?></td>
                            <td class="p-1 align-middle text-center"><?= $row->email ?></td>
                            <td class="p-1 align-middle text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="<?= base_url('cashier/edit/'.$row->id) ?>" class="btn btn-warning rounded-left" title="Update Cashier"><i class="fa fa-edit"></i> Update</a>
                                    <a href="<?= base_url('cashier/delete/'.$row->id) ?>" onclick="if(confirm('Are you sure to delete this cashier details?') === false) event.preventDefault()" class="btn btn-danger rounded-right" title="Delete Cashier"><i class="fa fa-trash"></i> Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
            </div>
            </div>
            <!-- /.card-body -->

        </div>
        </div>
    </div>
</div>
</section>

<script>
  $(function () {
    $("#cashier").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#cashier_wrapper .col-md-6:eq(0)');
  });
</script>