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
    <link href="https://unpkg.com/swiper/swiper-bundle.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ea590c57b3.js" crossorigin="anonymous"></script>
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .custom-size {
            height: 50px;
            width: 50px;
            margin-top: 0;
        }
    </style>
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
                                <a class="nav-link text-blue-600" aria-current="page" href="<?= base_url('index.php/homePage'); ?>">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-blue-600" href="<?= base_url('index.php/newsNdeals'); ?>">News & Deals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active text-blue-600" href="<?= base_url('index.php/series'); ?>">Character</a>
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
                    <?php
                    $cart = $this->cart->contents();
                    $ItemQty = 0;
                    foreach ($cart as $key => $value) {
                        $ItemQty = $ItemQty + $value['qty'];
                    }
                    ?>
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cart-shopping fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter"><?= $ItemQty ?></span>
                        </a>
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">

                            <h6 class="dropdown-header">
                                <i class="fas fa-cart-shopping fa-fw"></i>
                                <span>CART</span>
                            </h6>
                            <?php foreach ($cart as $key => $details) {
                                $img = $this->model_item->get_data_byid($details['id']);
                            ?>
                                <a class="dropdown-item d-flex align-items-center">
                                    <div class="mr-3">
                                        <img src="<?= base_url('assets/img/item/' . $img['Image']); ?>" alt="" class="custom-size">
                                    </div>
                                    <div>
                                        <h8 class="dropdown-item-title">
                                            <?= $details['name'] ?>
                                        </h8>
                                        <span class="text-sm"><?= $details['qty'] ?> X <?= $details['price'] ?></span> <br />
                                        </><span class="text-sm text-muted">Rp. <?= $this->cart->format_number($details['subtotal']) ?></span>
                                    </div>
                                </a>
                            <?php } ?>
                            <a class="dropdown-item text-center small text-primary" href="#"><span>View Cart <i class="fa-solid fa-chevron-right"></i></span></a>
                            <a class="dropdown-item text-center small text-primary" href="#"> <span>Check Out <i class="fa-solid fa-chevron-right"></i></span></a>
                        </div>
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
                            <a class="dropdown-item" href="profile">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="profile/changePW">
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