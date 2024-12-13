<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</head>

<body>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Navbar -->
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="" alt=".">
                        UnseenU
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="nav nav-underline">
                            <li class="nav-item">
                                <a class="nav-link text-blue-600" aria-current="page" href="<?= base_url('index.php/homePage') ?>">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-blue-600" href="<?= base_url('index.php/newsNdeals') ?>">News & Deals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-blue-600" href="<?= base_url('index.php/series') ?>">Character</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-blue-600">Disabled</a>
                            </li>

                            <li>
                                <form class="d-flex mt-3 mx-5" role="search">
                                    <input class="form-control rounded-start-pill border-end-0" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-secondary opacity-50 rounded-end-pill border-start-0" type="submit">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>

                <ul class="navbar-nav">
                    <li class="nav-item mx-2 cart-margin">
                        <a href="" class="btn btn-outline-primary px-3 py-2 rounded-pill">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </li>
                    <!-- Nav Item - User Information -->
                    <li class="nav-item no-arrow dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span>
                            <img class="img-profile rounded-circle"
                                src="<?= base_url('assets/img/profile/') . $user['image'] ?>">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-end shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?= base_url('index.php/profile/userProfile') ?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="profile/UserchangePW">
                                <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                                Change Password
                            </a>
                            <hr class="sidebar-divider my-1">
                            <a class="dropdown-item" href="<?= base_url('index.php/auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>

            </nav>
            <!-- End of Topbar -->


            <!-- Bootstrap core JavaScript-->
            <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="<?php echo base_url(); ?>assets/js/demo/chart-area-demo.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/demo/chart-pie-demo.js"></script>

            <!-- Add this before the Bootstrap JS file -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>