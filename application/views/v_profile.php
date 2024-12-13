<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>

    <!-- Main Content-->
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <?= $this->session->flashdata('Edited'); ?>
            </div>
        </div>
        <div class="shadow card mt-5 mb-5" style="width: 68rem; height: 38rem;">
            <div class="row g-0">
                <div class="col-md-4 d-flex flex-column align-items-center">
                    <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="img-fluid rounded-start m-5" alt="...">
                    <div class="container-fluid display-flex justfiy-content-center">
                        <h1 class="text-center"><b>ADMIN 1</b></h1>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h1 class="card-title">Account Settings</h1>
                        <form action="">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="username">Name </label>
                                    <input class="form-control" id="username" placeholder="<?= $user['name']; ?>" type="text" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="userGender">Gender </label>
                                    <input class="form-control" id="userGender" placeholder="<?= $user['gender']; ?>" type="text" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="userAddress">Address</label>
                                <input type="text" class="form-control" id="userAddress" placeholder="<?= $user['address']; ?>" readonly>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="PoB">Place of Birth </label>
                                    <input class="form-control" id="PoB" placeholder="<?= $user['PoB']; ?>" type="text" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="DoB">Date of Birth </label>
                                    <input class="form-control" id="DoB" type="text" placeholder="<?= $user['DoB']; ?>" readonly>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="userEmail">Email </label>
                                    <input class="form-control" id="userEmail" placeholder="<?= $user['email']; ?>" type="email" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="PhoneNum">Phone Number</label>
                                    <input class="form-control" id="PhoneNum" placeholder="<?= $user['phone_num']; ?>" type="text" readonly>
                                </div>
                            </div>
                        </form>
                        <div class="container d-flex flex-row-reverse">
                            <a href="<?= base_url('index.php/profile/editProfile'); ?>" class="btn btn-primary">
                                <li class="fa-solid fa-pen"></li> Edit Profile
                            </a>
                            <button class="btn btn-danger mx-3" data-bs-toggle="modal" data-bs-target="#DeleteUser">
                                <li class="fa-solid fa-trash"></li> Delete Account
                            </button>
                        </div>
                        <div class="modal fade" id="DeleteUser" tabindex="-1" aria-labelledby="DeleteUser" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-dark" id="DeleteUser">Delete User?</h1>
                                    </div>
                                    <div class="modal-body">
                                        All your data and account details will be deleted permanently
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary">Cancel</button>
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    <script src="<?php echo base_url(); ?>asssets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url(); ?>assets/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/demo/chart-pie-demo.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/demo/chart-bar-demo.js"></script>
</body>

</html>