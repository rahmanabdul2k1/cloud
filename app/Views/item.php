<div class="container mt-3">
    <div class="row">
        <form action="<?= site_url('item') ?>" method="post" class="row g-3">
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
                <input type="text" name="item_name" class="form-control" id="exampleFormControlInput1" placeholder="Item Name">
                <?php if ($validation->getError('item_name')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('item_name'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-4">
                <label for="exampleFormControlInput2" class="form-label">Short Code <span style="color: red;">*</span></label>
                <input type="text" name="item_code" class="form-control" id="exampleFormControlInput2" placeholder="Short Code">
                <?php if ($validation->getError('item_code')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('item_code'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-4">
                <label for="exampleFormControlInput3" class="form-label">Status</label>
                <select class="form-select" name="item_status" aria-label="Default select example">
                    <option selected value="1">Active</option>
                    <option value="0">De-active</option>
                </select>
            </div>
            <div class="col-12 text-center">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
<?php
if (!empty($item)) {
?>
    <div class="container mt-5">
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Item Code</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($item as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $value['item_name'] ?></td>
                            <td><?= $value['item_code'] ?></td>
                            <td><?= $value['status'] ?></td>
                            <td><a href="<?= site_url('item_edit/') . $value['item_id'] ?>" class="btn btn-primary"><i class="bi bi-wrench"></i></a></td>
                            <td><a href="<?= site_url('item/') . $value['item_id'] ?>" class="btn btn-danger"><i class="bi bi-trash3"></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>