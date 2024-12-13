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
    <script src="https://kit.fontawesome.com/ea590c57b3.js" crossorigin="anonymous"></script>
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">UnseenU</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="inventory">
                    <i class="fas fa-fw fa-boxes-stacked"></i>
                    <span>Inventory</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="item">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Item</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="customer">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Customer</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="category">
                    <i class="fas fa-fw fa-layer-group"></i>
                    <span>Category</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#journal"
                    aria-expanded="true" aria-controls="journal">
                    <i class="fas fa-fw fa-receipt"></i>
                    <span>Journal</span>
                </a>
                <div id="journal" class="collapse"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="invoice">Sales Invoice</a>
                        <a class="collapse-item" href="newInv">New Invoice</a>
                        <a class="collapse-item" href="">Activity</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Accounts
            </div>

            <li class="nav-item">
                <a class="nav-link" href="manageUser">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Manage User</span>
                </a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Add this before the Bootstrap JS file -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Bootstrap core JavaScript-->

        <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="<?php echo base_url(); ?>assets/js/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/demo/chart-pie-demo.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>

</html>