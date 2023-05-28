<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3><?= $customerRowCount ?></h3>

            <h4>Customers</h4>
            </div>
            <div class="icon">
            <i class="ion fa-solid fa-users"></i>
            </div>
            <a href="<?= base_url('customer')?>" class="small-box-footer">More info ... <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
            <h3><?= $productRowCount ?></h3>

            <h4>Products</h4>
            </div>
            <div class="icon">
            <i class="ion fa-solid fa-bowl-food"></i>
            </div>
            <a href="<?= base_url('product')?>" class="small-box-footer">More info ... <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
            <h3><?= $orderRowCount ?></h3>

            <h4>Orders</h4>
            </div>
            <div class="icon">
            <i class="ion fa-solid fa-basket-shopping"></i>
            </div>
            <a href="<?= base_url('orders')?>" class="small-box-footer">More info ... <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
            <h3>Rp. <?= number_format($salesCount->pay_amount, 0, ',', '.') ?></h3>

            <h4>Sales</h4>
            </div>
            <div class="icon">
            <i class="ion fa-solid fa-money-bill-trend-up"></i>
            </div>
            <a href="<?= base_url('payments')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Restaurant Reports</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
            <a class="btn btn-success mb-3" href="<?= base_url('dashboard/generate')?>"><i class="fa-solid fa-plus"></i> Generate Report</a>
            <div class="table-responsive">
            <table id="report" class="table table-striped table-hover">
                <thead>
                <tr class="bg-gradient bg-dark text-light">
                    <th class="text-center">#</th>
                    <th class="text-center">Cashier Count</th>
                    <th class="text-center">Customer Count</th>
                    <th class="text-center">Table Count</th>
                    <th class="text-center">Product Count</th>
                    <th class="text-center">Order Count</th>
                    <th class="text-center">Order Paid</th>
                    <th class="text-center">Order Pending</th>
                    <th class="text-center">Order Unpaid</th>
                    <th class="text-center">Total Sales</th>
                    <th class="text-center">Report Date</th>
                </tr>
                </thead>
                <tbody>
                <?php if(count($list) > 0): ?>
                    <?php $i = 1; ?>
                    <?php foreach($list as $row): ?>
                        <tr>
                            <th class="p-1 align-middle text-center"><?= $i++ ?></th>
                            <td class="p-1 align-middle text-center"><?= $row->cashier_count ?></td>
                            <td class="p-1 align-middle text-center"><?= $row->customer_count ?></td>
                            <td class="p-1 align-middle text-center"><?= $row->table_count ?></td>
                            <td class="p-1 align-middle text-center"><?= $row->product_count ?></td>
                            <td class="p-1 align-middle text-center"><?= $row->order_count ?></td>
                            <td class="p-1 align-middle text-center"><?= $row->order_paid ?></td>
                            <td class="p-1 align-middle text-center"><?= $row->order_pending ?></td>
                            <td class="p-1 align-middle text-center"><?= $row->order_unpaid ?></td>
                            <td class="p-1 align-middle text-center"><?= $row->total_sales ?></td>
                            <td class="p-1 align-middle text-center"><?= $row->report_date ?></td>
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
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>

<script>
  $(function () {
    $("#report").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#report_wrapper .col-md-6:eq(0)');
  });
</script>