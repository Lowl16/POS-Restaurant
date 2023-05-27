<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="MartDevelopers Inc">
    <title>Restaurant Point Of Sale </title>
    <!-- Favicon -->
    <base href="<?= base_url('assets') ?>/">
    <link href="css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.js"></script>
    <style>
        body {
            margin-top: 20px;
        }
    </style>
</head>
</style>
<body>
    <div class="container">
        <div class="row">
            <div id="Receipt" class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                <?php if(count($list) > 0): ?>
                    <?php foreach($list as $row): ?>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <address>
                                    <strong>POS Restaurant</strong>
                                    <br>
                                    127-0-0-1
                                    <br>
                                    Politeknik Negeri Jakarta
                                    <br>
                                    (+021) 7270036
                                </address>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                                <p>
                                    <em>Date: <?= date('d/M/Y g:i', strtotime($row->order_date)); ?></em>
                                </p>
                                <p>
                                    <em class="text-success">Receipt #: <?= $row->id; ?></em>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-center">
                                <h2>Receipt</h2>
                                <br>
                            </div>
                            </span>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th class="text-center">Unit Price</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="col-md-6"><em> <?= $row->product_name; ?> </em></h4>
                                        </td>
                                        <td class="col-md-2" style="text-align: center"> <?= $row->product_quantity; ?></td>
                                        <td class="col-md-2 text-center">Rp. <?= number_format($row->price, 0, ',', '.') ?></td>
                                        <td class="col-md-2 text-center">Rp. <?= number_format($row->price * $row->product_quantity, 0, ',', '.') ?></td>
                                    </tr>
                                    <tr>
                                        <td>  </td>
                                        <td>  </td>
                                        <td class="text-right">
                                            <p>
                                                <strong>Subtotal:</strong>
                                            </p>
                                        </td>
                                        <td class="text-center">
                                            <p>
                                                <strong>Rp. <?= number_format($row->price * $row->product_quantity, 0, ',', '.') ?></strong>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>  </td>
                                        <td>  </td>
                                        <td class="text-right">
                                            <p><strong>Total:</strong></p>
                                        </td>
                                        <td class="text-center text-danger">
                                            <p><strong>Rp. <?= number_format($row->price * $row->product_quantity, 0, ',', '.') ?></strong></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div> 
            <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                <button id="print" onclick="printContent('Receipt');" class="btn btn-success btn-lg text-justify btn-block">
                    Print <span class="fas fa-print"></span>
                </button>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    function printContent(el) {
        var restorepage = $('body').html();
        var printcontent = $('#' + el).clone();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
    }
</script>