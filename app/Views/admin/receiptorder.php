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
            <h3 class="card-title">List of Orders Receipts (Paid Orders)</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
            <div class="table-responsive">
            <table id="receipt" class="table table-striped table-hover">
                <thead>
                <tr class="bg-gradient bg-dark text-light">
                    <th class="text-center">#</th>
                    <th class="text-center">Customer</th>
                    <th class="text-center">Table</th>
                    <th class="text-center">Product</th>
                    <th class="text-center">Unit Price</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Total Price</th>
                    <th class="text-center">Date</th>
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
                            <td class="p-1 align-middle text-center"><?= $row->table_name ?></td>
                            <td class="p-1 align-middle text-center"><?= $row->product_name ?></td>
                            <td class="p-1 align-middle text-center">Rp. <?= number_format($row->price, 0, ',', '.') ?></td>
                            <td class="p-1 align-middle text-center"><?= $row->product_quantity ?></td>
                            <td class="p-1 align-middle text-center">Rp. <?= number_format($row->price * $row->product_quantity, 0, ',', '.') ?></td>
                            <td class="p-1 align-middle text-center"><?= $row->order_date ?></td>
                            <td class="p-1 align-middle text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="<?= base_url('order/generate/').$row->id ?>" class="btn btn-primary rounded" title="Print Receipt"><i class="fa-solid fa-print"></i> Print Receipt</a>
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
    $("#receipt").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#receipt_wrapper .col-md-6:eq(0)');
  });
</script>