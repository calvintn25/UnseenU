<!DOCTYPE html>
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
    <div class="container mt-4 mb-5">
        <h2 class="text-primary mb-4">Edit Item</h2>
        <p class="text-muted">Fill out the details below to Edit a item to the inventory.</p>

        <?= form_open_multipart('index.php/inventory/editInventory/' . $item['ItemId']); ?>
        <div class="row">

            <!-- Left Column: Item Details -->
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Item Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="ItemId">Item ID</label>
                            <input type="text" class="form-control" name="ItemId" id="ItemId" value="<?= htmlspecialchars($item['ItemId']) ?>" type="text" readonly>
                            <?= form_error('ItemId', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="ItemName">Item Name</label>
                            <input type="text" class="form-control" name="ItemName" id="ItemName" value="<?= htmlspecialchars($item['ItemName']) ?>" readonly>
                            <?= form_error('ItemName', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="Category">Category</label>
                            <input type="text" class="form-control" name="Category" id="Category" value="<?= htmlspecialchars($item['Categories']) ?>" readonly>
                            <?= form_error('Category', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Pricing & Stock -->
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Pricing & Stock</h5>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="COMS">Cost of Merchandise Sold</label>
                            <input type="text" class="form-control" name="COMS" id="COMS" value="<?= htmlspecialchars($item['COMS']) ?>" ">
                            <?= form_error('COMS', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class=" form-group">
                            <label for="stock">Stock</label>
                            <input type="text" class="form-control" name="Stock" id="Stock" value="<?= htmlspecialchars($item['Stock']) ?>" ">
                            <?= form_error('Stock', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

        <!-- Action Buttons -->
        <div class=" d-flex justify-content-end">
                            <a href="<?= base_url('index.php/inventory'); ?>" class="btn btn-secondary btn-lg mx-2">Cancel</a>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fa-solid fa-floppy-disk"></i> Save Item
                            </button>
                        </div>
                        </form>
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
                        function previewImage(event) {
                            const preview = document.getElementById('preview');
                            preview.style.display = 'block';
                            preview.src = URL.createObjectURL(event.target.files[0]);
                        }
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