<div class="container mt-3">
    <div class="row">
        <form action="<?= site_url('item_edit/') . $item['item_id'] ?>" method="post" class="row g-3">
            <?php
            $session = \Config\Services::session();
            $validation = \Config\Services::validation();
            if (session()->getFlashdata('status') !== NULL) { ?>
                <div class="alert <?= session()->getFlashdata('color') ?> alert-dismissible fade show" role="alert">
                    <strong><?= session()->getFlashdata('status') ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                $session->remove($_SESSION['color']);
                $session->remove($_SESSION['status']);
            } ?>

            <div class="col-lg-4">
                <label for="exampleFormControlInput1" class="form-label">Name <span style="color: red;">*</span></label>
                <input type="text" name="item_name" class="form-control" id="exampleFormControlInput1" value="<?= $item['item_name'] ?>" placeholder="Item Name">
                <?php if ($validation->getError('item_name')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('item_name'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-4">
                <label for="exampleFormControlInput2" class="form-label">Short Code <span style="color: red;">*</span></label>
                <input type="text" name="item_code" class="form-control" id="exampleFormControlInput2" value="<?= $item['item_code'] ?>" placeholder="Short Code">
                <?php if ($validation->getError('item_code')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('item_code'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-4">
                <label for="exampleFormControlInput3" class="form-label">Status</label>
                <select class="form-select" name="item_status" aria-label="Default select example">
                    <option <?php if ($item['item_status'] == 1) { ?> selected <?php } ?> value="1">Active</option>
                    <option <?php if ($item['item_status'] == 0) { ?> selected <?php } ?> value="0">De-active</option>
                </select>
            </div>
            <div class="col-12 text-center">
                <button class="btn btn-primary" type="submit">Submit</button>
                <a href="<?= site_url("item") ?>" class="btn btn-dark">Back</a>
            </div>
        </form>
    </div>
</div>