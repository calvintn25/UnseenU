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

    <style>
        .custom-logo {
            height: 100px;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <h1 class="text-primary">NEW INVOICE</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="custom-logo img-fluid rounded-circle ml-n5 mt-5" alt="...">
            </div>

            <div class="col-md-4">
                <form action="">
                    <div class="form-group">
                        <label for="noInv" class="form-label">Invoice#</label>
                        <input type="text" class="form-control" name="noInv" id="noInv" value="<?= isset($next) ? $next : ''; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="invDate" class="form-label">Date</label>
                        <input type="date" class="form-control" name="invDate" id="invDate" value="">
                    </div>

                    <div class="form-group">
                        <label for="custName" class="form-label">Customer</label>
                        <select name="custName" id="custName" class="form-control">
                            <option value="" selected>Choose Customer</option>
                            <?php if ($customer != NULL): ?>
                                <?php foreach ($customer as $cust) : ?>
                                    <option value="<?= $cust['cust_id']; ?>"><?= $cust['cust_name']; ?></option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="">No Customer</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4 mb-4 ml-auto mr-n4">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-floppy-disk"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
    <div class="modal fade" id="newItem" tabindex="-1" role="dialog" style="overflow: hidden;">
        <div id="liveAlertPlaceholder"></div>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <select id="item" class="form-control" onchange="updatePrice()">
                                <option value="" selected>Select Item</option>
                                <?php foreach ($productdetails as $product) : ?>
                                    <option value="<?= $product->ItemId ?>" data-price="<?= $product->Price; ?>"><?= $product->ItemName ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="qty">Quantity</label>
                                <input type="number" class="form-control" id="qty">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="price" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="totalPrice">Total Price</label>
                            <input type="text" class="form-control" id="totalPrice" readonly>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="liveAlertBtn"><i class="fa-solid fa-plus"></i> Add</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card body">
            <div class="table-responsive">
                <table class="table table-striped" width="100%" cellspacing="0">
                    <thead>
                        <th>Item Id</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </thead>

                    <tfoot>
                        <th>Item Id</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td colspan="5" class="text-center">
                                <button class="btn btn-primary" id="addItemButton" data-bs-toggle="modal" data-bs-target="#newItem">Insert Item</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row mx-1">

        <!-- Subtotal Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Subtotal</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 9.600.000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Diskon / Tax Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Diskon / Tax</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. xxx.xxx</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Diskon / Tax / Total Qty</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. xxx.xxx</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Diskon / Tax / Total Qty</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. xxx.xxx</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
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

    <script type="text/javascript">
        document.querySelector('.modal-footer .btn-primary').addEventListener('click', function() {
            const selectedItem = document.getElementById('item');
            const itemQty = document.getElementById('qty');
            const itemPrice = document.getElementById('price');
            const totalPriceInput = document.getElementById('totalPrice');

            const itemId = selectedItem.value;
            const itemName = selectedItem.options[selectedItem.selectedIndex].text;
            const quantity = itemQty.value;
            const price = itemPrice.value;
            const totalPrice = totalPriceInput.value;

            const tableBody = document.querySelector('table tbody');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
                        <td>${itemId}</td>
                        <td>${itemName}</td>
                        <td>${quantity}</td>
                        <td>${price}</td>
                        <td>${totalPrice}</td>
                        `;

            tableBody.appendChild(newRow);
            const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
            const appendAlert = (message, type) => {
                const wrapper = document.createElement('div')
                wrapper.innerHTML = [
                    `<div class="alert alert-${type} alert-dismissible" role="alert">`,
                    `   <div>${message}</div>`,
                    '   <button type="button" class="close" data-bs-dismiss="alert"><span aria-hidden="true">&times;</span></button>',
                    '</div>'
                ].join('')

                alertPlaceholder.append(wrapper)
            }

            const alertTrigger = document.getElementById('liveAlertBtn')
            if (alertTrigger) {
                alertTrigger.addEventListener('click', () => {
                    appendAlert('Item Succesfully added', 'success')
                })
            }


            selectedItem.value = '';
            itemQty.value = '';
            itemPrice.value = '';
            totalPriceInput.value = '';



        })

        function updatePrice() {
            const selectElement = document.getElementById('item');
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const priceField = document.getElementById('price');

            const price = selectedOption.getAttribute('data-price');

            priceField.value = price;

            totalPrice();
        }

        function totalPrice() {
            const selectElement = document.getElementById('item');
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const priceField = document.getElementById('price');
            const totalPriceField = document.getElementById('totalPrice');
            const qtyField = document.getElementById('qty');

            const price = parseFloat(priceField.value);
            const qty = parseInt(qtyField.value);


            if (isNaN(price) || isNaN(qty) || qty <= 0) {
                totalPriceField.value = '';
            } else {
                totalPriceField.value = price * qty;
            }

            document.getElementById('qty').addEventListener('input', totalPrice);
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