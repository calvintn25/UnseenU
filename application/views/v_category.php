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
                $('#AddCatg').modal('show');
            });
        </script>
    <?php endif; ?>

    <div class="modal fade" id="AddCatg" tabindex="-1" role="dialog" aria-labelledby="AddNewCatg" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Category</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <?= form_open_multipart('index.php/category/addNewCatg'); ?>
                        <div class="form-group">
                            <label for="category_id" class="form-label">Category Id</label>
                            <input type="text" id="category_id" name="category_id" class="form-control" value="<?= isset($next) ? $next : ''; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="catg" class="form-label">Category</label>
                            <input type="text" id="catg" name="catg" class="form-control">
                            <?php echo form_error('catg', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-row mb-3">
                            <div class="form-group col-md-12">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose File</label>
                            </div>
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddCatg"><i class="fa-solid fa-plus"></i> New Category</button>
        </div>
        <div class="card-body">
            <div class="table-responsive custom-table mx-4" id="printContent">
                <table class="table table-striped" id="dataTable" width="90%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Category Id</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Category Id</th>
                            <th>Name</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($categories as $category) : ?>
                            <tr>
                                <td><?= htmlspecialchars($category->category_id) ?></td>
                                <td><?= htmlspecialchars($category->category) ?></td>
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
                    var addCustModal = new bootstrap.Modal(document.getElementById('AddCatg'));
                    addCatgModal.show();
                <?php endif; ?>

                $('.custom-file-input').on('change', function() {
                    let fileName = $(this).val().split('\\').pop();
                    $(this).next('.custom-file-label').addClass("selected").html(fileName);
                });
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