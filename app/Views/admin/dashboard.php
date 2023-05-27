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
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
