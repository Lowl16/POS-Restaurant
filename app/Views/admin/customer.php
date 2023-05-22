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
                <h3 class="card-title">List of Customer</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a class="btn btn-success mb-3" href="<?= base_url('customer/create')?>"><i class="fa-solid fa-plus"></i> Add Customer</a>
                <table id="example2" class="table table-striped table-hover">
                  <colgroup>
                  <col width="5%">
                    <col width="30%">
                    <col width="25%">
                    <col width="30%">
                  </colgroup>
                  <thead>
                  <tr class="bg-gradient bg-dark text-light">
                        <th class="py-1 text-center">#</th>
                        <th class="py-1 text-center">Username</th>
                        <th class="py-1 text-center">Email</th>
                        <th class="py-1 text-center">Action</th>
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
                                        <a href="<?= base_url('customer/edit/'.$row->id) ?>" class="btn btn-warning rounded-left" title="Edit Customer"><i class="fa fa-edit"></i> Update</a>
                                        <a href="<?= base_url('customer/delete/'.$row->id) ?>" onclick="if(confirm('Are you sure to delete this customer details?') === false) event.preventDefault()" class="btn btn-danger rounded-right" title="Delete Customer"><i class="fa fa-trash"></i> Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
    </div>
</section>
<!-- jQuery -->

            <!-- /.card -->
            