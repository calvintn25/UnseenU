<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .custom-table {
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <?php if (isset($show_modal) && $show_modal): ?>
        <script type="text/javascript">
            // This will automatically open the modal when validation fails
            $(document).ready(function() {
                $('#AddCust').modal('show');
            });
        </script>
    <?php endif; ?>

    <div class="modal fade" id="AddCust" tabindex="-1" role="dialog" aria-labelledby="AddNewCust" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Customer</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="<?php echo base_url('index.php/customer/addNew'); ?>" method="post">
                            <div class="form-group">
                                <label for="cust_id" class="form-label">Customer Id</label>
                                <input type="text" id="cust_id" name="cust_id" class="form-control" value="<?= isset($next) ? $next : ''; ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="cust" class="form-label">Customer Name</label>
                                <input type="text" id="cust" name="cust" class="form-control">
                                <?php echo form_error('cust', '<div class="text-danger">', '</div>'); ?>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4 w-50 mx-auto">
        <div class="card-header d-flex flex-row-reverse">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddCust"><i class="fa-solid fa-plus"></i> New Customer</button>
        </div>
        <div class="card-body">
            <div class="table-responsive custom-table mx-4" id="printContent">
                <table class="table table-striped" id="dataTable" width="90%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Customer Id</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Customers Id</th>
                            <th>Name</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($customer as $cust) : ?>
                            <tr>
                                <td><?= htmlspecialchars($cust->cust_id) ?></td>
                                <td><?= htmlspecialchars($cust->cust_name) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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

            <script>
                <?php if (!empty($show_modal) && $show_modal == true): ?>
                    var addCustModal = new bootstrap.Modal(document.getElementById('AddCust'));
                    addCustModal.show();
                <?php endif; ?>
            </script>

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

</body>

</html>