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
            <h3 class="card-title">List of Product</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
            <a class="btn btn-success mb-3" href="<?= base_url('product/create')?>"><i class="fa-solid fa-plus"></i> Add Product</a>
            <div class="table-responsive">
            <table id="example2" class="table table-striped table-hover">
                <colgroup>
                <col width="5%">
                <col width="30%">
                <col width="10%">
                <col width="30%">
                <col width="25%">
                </colgroup>
                <thead>
                <tr class="bg-gradient bg-dark text-light">
                    <th class="py-1 text-center">#</th>
                    <th class="py-1 text-center">Name</th>
                    <th class="py-1 text-center">Price</th>
                    <th class="py-1 text-center">Image</th>
                    <th class="py-1 text-center">Action</th>
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
                                    <a href="<?= base_url('product/detail/').$row->id ?>" class="btn btn-primary rounded-left" title="Product Details"><i class="fa-solid fa-eye"></i> Read</a>
                                    <a href="<?= base_url('product/edit/'.$row->id) ?>" class="btn btn-warning rounded-0" title="Edit Product"><i class="fa fa-edit"></i> Update</a>
                                    <a href="<?= base_url('product/delete/'.$row->id) ?>" onclick="if(confirm('Are you sure to delete this product details?') === false) event.preventDefault()" class="btn btn-danger rounded-right" title="Delete Product"><i class="fa fa-trash"></i> Delete</a>
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