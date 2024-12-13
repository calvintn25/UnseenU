<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UnseenU</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body>

    <div class="container mx-n1">
        <span>
            <h1 class="text-primary">Inventory</h1>
        </span>
    </div>

    <div class="d-flex flex-row-reverse m-4 mt-n5">
        <a href="<?= base_url('index.php/inventory/print'); ?>" class="btn btn-secondary mx-2">
            <li class="fa-solid fa-print"></li> Print
        </a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive" id="printContent">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Item Id</th>
                            <th>Name</th>
                            <th>Categories</th>
                            <th>COMS</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Item Id</th>
                            <th>Name</th>
                            <th>Categories</th>
                            <th>COMS</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($items as $item): ?>
                            <!-- Details Modal-->
                            <div class="modal fade" id="Itemdetails_<?= $item->ItemId ?>" tabindex="-1" role="dialog" aria-labelledby="ItemdetailsLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Product Details</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <!-- Image on the left -->
                                                    <div class="col-md-4 my-auto">
                                                        <img src="<?= base_url('assets/img/item/') . $item->Image; ?>" class="img-fluid rounded-start" alt="...">
                                                    </div>
                                                    <!-- Form fields on the right -->
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="Pname">Product Name</label>
                                                            <input type="text" class="form-control" id="Pname" placeholder="<?= $item->ItemName; ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Pcategories">Categories</label>
                                                            <input type="text" class="form-control" id="Pcategories" placeholder="<?= $item->Categories; ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Pstock">Stock</label>
                                                            <input type="text" class="form-control" id="Pstock" placeholder="<?= $item->Stock; ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <tr>
                                    <td><?= htmlspecialchars($item->ItemId); ?></td>
                                    <td><?= htmlspecialchars($item->ItemName); ?></td>
                                    <td><?= htmlspecialchars($item->Categories); ?></td>
                                    <td><?= htmlspecialchars($item->COMS); ?></td>
                                    <td><?= htmlspecialchars($item->Stock); ?></td>
                                    <td>
                                        <a href="<?= base_url('index.php/inventory/editInventory/') . $item->ItemId; ?>" class="btn btn-primary me-2" type="button">
                                            <i class="fa-solid fa-pen"></i> Edit
                                        </a> |
                                        <button class="btn btn-secondary ms-2" data-bs-toggle="modal" data-bs-target="#Itemdetails_<?= $item->ItemId ?>" type="button">
                                            <i class="fa-solid fa-eye"></i> Details
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('index.php/auth/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url(); ?>assets/js/demo/datatables-demo.js"></script>

    <script type="text/javascript">
        function printContent() {
            const printContents = document.getElementById('dataTable').outerHTML;

            const printWindow = window.open('', '', 'height=600,width=800');

            printWindow.document.write(`
                <html>
                <head>
                    <title>Print</title>
                    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
                    <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
                </head>
                <body>
                    ${printContents}
                </body>
                </html>
            `);

            // Close the document stream
            printWindow.document.close();

            // Give some time for styles to load, then print
            printWindow.onload = function() {
                printWindow.print();
                printWindow.close();
            };
        }
    </script>


</body>

</html>