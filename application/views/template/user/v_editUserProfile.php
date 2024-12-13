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
        <div class="card shadow mt-5 mb-5 mx-auto" style="max-width: 768px;">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Edit Profile</h3>
            </div>
            <div class="card-body">
                <?= form_open_multipart('index.php/profile/editUserProfile'); ?>
                <!-- Row 1 -->
                <div class="form-row mb-3">
                    <div class="form-group col-md-6">
                        <label for="username">Name</label>
                        <input class="form-control" id="name" name="name" value="<?= htmlspecialchars($user['name']); ?>" type="text">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-6 mt-4">
                        <div class="form-check form-check-inline ml-5">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check ml-5">
                            <input class="form-check-input" type="radio" name="gender" id="Notsay" value="Prefer Not To Say" checked>
                            <label class="form-check-label" for="Notsay">Prefer Not to Say</label>
                        </div>
                    </div>
                </div>
                <!-- Address -->
                <div class="form-group mb-3">
                    <label for="userAddress">Address</label>
                    <input class="form-control" id="address" name="address" value="<?= htmlspecialchars($user['address']); ?>" type="text">
                    <?= form_error('address', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <!-- Row 2 -->
                <div class="form-row mb-3">
                    <div class="form-group col-md-6">
                        <label for="PoB">Place of Birth</label>
                        <input class="form-control" id="PoB" name="PoB" value="<?= htmlspecialchars($user['PoB']); ?>" type="text">
                        <?= form_error('PoB', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="DoB">Date of Birth</label>
                        <input class="form-control" id="DoB" name="DoB" value="<?= htmlspecialchars($user['DoB']); ?>" type="text">
                        <?= form_error('DoB', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <!-- Row 3 -->
                <div class="form-row mb-3">
                    <div class="form-group col-md-6">
                        <label for="userEmail">Email</label>
                        <input class="form-control" id="userEmail" name="userEmail" value="<?= htmlspecialchars($user['email']); ?>" type="email" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="PhoneNum">Phone Number</label>
                        <input class="form-control" id="phone_num" name="phone_num" value="<?= htmlspecialchars($user['phone_num']); ?>" type="text">
                        <?= form_error('phone_num', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="form-group col-md-3">
                        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                    </div>
                    <div class="form-group col-md-9">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose File</label>
                    </div>

                </div>
                <div class="d-flex float-end">
                    <a href="<?= base_url('index.php/profile/userProfile'); ?>" class="btn btn-secondary mr-2">
                        <i class="fa-solid fa-ban"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-primary mx-3">
                        <i class="fa-solid fa-floppy-disk"></i> Save Profile
                    </button>

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