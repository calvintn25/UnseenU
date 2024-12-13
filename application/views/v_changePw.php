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
        <div class="card shadow mt-5 mb-5 mx-auto" style="max-width: 600px;">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Change Password</h3>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('PWchanged'); ?>
                <form action="<?= base_url('index.php/profile/changePW'); ?>" method="post">
                    <!-- Row 1 -->
                    <div class="form-row mb-3">
                        <label for="CurrentPw">Current Password</label>
                        <input class="form-control" id="CurrentPw" name="CurrentPw" type="password">
                        <?= form_error('CurrentPw', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <!-- Address -->
                    <div class="form-group mb-3">
                        <label for="NewPW1">New Password</label>
                        <input class="form-control" id="NewPW1" name="NewPW1" type="password">
                        <?= form_error('NewPW1', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>

                    <div class="form-group mb-3">
                        <label for="NewPW2">Repeat Password</label>
                        <input class="form-control" id="NewPW2" name="NewPW2" type="password">
                        <?= form_error('NewPW2', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>


                    <div class="row d-flex justify-content-end">
                        <a href="<?= base_url('index.php/profile'); ?>" class="btn btn-secondary mr-2">
                            <i class="fa-solid fa-ban"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary mx-3">
                            <i class="fa-solid fa-floppy-disk"></i> Save Password
                        </button>
                    </div>
                </form>
            </div>

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

    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

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