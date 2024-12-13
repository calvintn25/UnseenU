<!DOCTYPE html>
<html lang="en">
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
<div class="card shadow mb-4">

    <div class="card-body">
        <a href="newInv" class="btn btn-primary mb-4"><i class="fa-solid fa-plus"></i> New Invoice</a>
        <div class="table-responsive" id="printContent">
            <table class="table table-striped rounded" id="dataTable" width="100%">
                <thead>
                    <tr>
                        <th>Invoice#</th>
                        <th>Customer Name</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Invoice#</th>
                        <th>Customer Name</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr class="g-5">
                        <td>1234567</td>
                        <td>Kennedi Yeo</td>
                        <td>29/11/24</td>
                        <td><span class="badge badge-pill badge-success">Done</span></td>
                        <td>Rp. 30.000</td>
                        <td>
                            <button class="btn btn-primary" type="button">
                                <i class="fa-solid fa-eye"></i> View
                            </button> |
                            <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#DeleteItem">
                                <i class="fa-solid fa-trash"></i> Delete
                            </button> |
                            <button class="btn btn-info" type="button">
                                <i class="fa-solid fa-print"></i> Print
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>1234567</td>
                        <td>Account Payable</td>
                        <td>29/11/24</td>
                        <td><span class="badge badge-pill badge-success">Done</span></td>
                        <td>Rp. 30.000</td>
                        <td>
                            <button class="btn btn-primary" type="button">
                                <i class="fa-solid fa-eye"></i> View
                            </button> |
                            <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#DeleteItem">
                                <i class="fa-solid fa-trash"></i> Delete
                            </button> |
                            <button class="btn btn-info" type="button">
                                <i class="fa-solid fa-print"></i> Print
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>1234567</td>
                        <td>Account Payable</td>
                        <td>29/11/24</td>
                        <td><span class="badge badge-pill badge-success">Done</span></td>
                        <td>Rp. 30.000</td>
                        <td>
                            <button class="btn btn-primary" type="button">
                                <i class="fa-solid fa-eye"></i> View
                            </button> |
                            <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#DeleteItem">
                                <i class="fa-solid fa-trash"></i> Delete
                            </button> |
                            <button class="btn btn-info" type="button">
                                <i class="fa-solid fa-print"></i> Print
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>1234567</td>
                        <td>Account Payable</td>
                        <td>29/11/24</td>
                        <td><span class="badge badge-pill badge-success">Done</span></td>
                        <td>Rp. 30.000</td>
                        <td>
                            <button class="btn btn-primary" type="button">
                                <i class="fa-solid fa-eye"></i> View
                            </button> |
                            <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#DeleteItem">
                                <i class="fa-solid fa-trash"></i> Delete
                            </button> |
                            <button class="btn btn-info" type="button">
                                <i class="fa-solid fa-print"></i> Print
                            </button>
                        </td>
                    </tr>
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

<body>

</body>

</html>