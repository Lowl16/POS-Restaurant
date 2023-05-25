<!-- Main content -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>
<body>
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
                <?= csrf_field(); ?>
                <div class="card-body">
                    <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                    <label for="size">Size</label>
                    <select class="form-control select2" id="size" name="size" required>
                    <option value="" disabled selected>-- Choose Size --</option>
                    <option value="Small (2 Person)">Small (2 Person)</option>
                    <option value="Medium (4 Person)">Medium (4 Person)</option>
                    <option value="Large (6 Person)">Large (6 Person)</option>
                    </select>
                    </div>
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

    <script>
        $(function () {
        //Initialize Select2 Elements
            $('.select2').select2({
                theme: 'bootstrap4'
            })
        })
        </script>
    <script src="/assets/plugins/select2/js/select2.full.min.js"></script>
</body>
</html>