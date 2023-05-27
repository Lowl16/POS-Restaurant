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
            <h3 class="card-title">Select on Any Product to Make an Order</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
            <div class="table-responsive">
            <table id="order" class="table table-striped table-hover">
                <thead>
                <tr class="bg-gradient bg-dark text-light">
                    <th class="text-center">#</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if(count($list) > 0): ?>
                    <?php $i = 1; ?>
                    <?php foreach($list as $row): ?>
                        <tr>
                            <th class="p-1 align-middle text-center"><?= $i++ ?></th>
                            <td class="p-1 align-middle text-center"><?= $row->name ?></td>
                            <td class="p-1 align-middle text-center">Rp. <?= number_format($row->price, 0, ',', '.') ?></td>
                            <td class="p-1 align-middle text-center"><img src="<?= base_url($row->image) ?>" alt="Product Image" style="max-width: 100px;"></td>
                            <td class="p-1 align-middle text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="<?= base_url('order/create/').$row->id ?>" class="btn btn-primary rounded" title="Place Order"><i class="fa-solid fa-cart-shopping"></i> Place Order</a>
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
    $("#order").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#order_wrapper .col-md-6:eq(0)');
  });
</script>