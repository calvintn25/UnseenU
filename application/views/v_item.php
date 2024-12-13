<div class="container">
  <span>
    <h1 class="text-primary">Item List</h1>
  </span>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <?= $this->session->flashdata('ItemDeleted'); ?>
    </div>
  </div>
</div>

<div class="d-flex flex-row-reverse m-4 mt-n5">
  <a href="<?= base_url('index.php/item/add'); ?>" class="btn btn-info">
    <i class="fa-solid fa-plus"></i> Add Item
  </a>
  <a href="<?= base_url('index.php/item/print'); ?>" class="btn btn-secondary mx-2">
    <i class="fa-solid fa-print"></i> Print
  </a>
</div>

<div class="container">
  <div class="row row-cols-1 row-cols-md-3 g-4">

    <!-- Item Cards with Modals -->
    <?php foreach ($items as $item): ?>
      <div class="col mb-4">
        <div class="card h-100">
          <img src="<?= base_url('assets/img/item/') . $item->Image ?>" class="card-img-top" alt="Item Image">
          <div class="card-body">
            <h5 class="card-text">
              <?= htmlspecialchars($item->ItemName); ?>
              <button class="btn d-flex ml-auto mt-n4 btn-sm btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-ellipsis"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="<?= base_url('index.php/item/editItem/' . $item->ItemId); ?>">Edit Item</a></li>
                <li>
                  <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#DeleteItem<?= $item->ItemId; ?>">
                    <span class="text-danger">Delete Item</span>
                  </button>
                </li>
              </ul>
            </h5>
            <h5 class="card-title"><?= htmlspecialchars($item->Price); ?></h5>
          </div>
        </div>
      </div>

      <!-- Unique Delete Modal for Each Item -->
      <div class="modal fade" id="DeleteItem<?= $item->ItemId; ?>" tabindex="-1" aria-labelledby="DelItem<?= $item->ItemId; ?>" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5 text-dark" id="DelItem<?= $item->ItemId; ?>">Delete Data?</h1>
            </div>
            <div class="modal-body">
              This can't be undone.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <a href="<?= base_url('index.php/item/deleteItem/' . $item->ItemId); ?>" class="btn btn-danger">Delete</a>
            </div>
          </div>
        </div>
      </div>

    <?php endforeach; ?>

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