<div class="container mt-3">
    <div class="row">
        <form action="<?= site_url('product') ?>" method="post" class="row g-3" enctype="multipart/form-data">
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

            <div class="col-lg-4 mt-3">
                <label for="exampleFormControlInput1" class="form-label">Item Group <span style="color: red;">*</span></label>
                <select class="form-select" name="pitem" aria-label="Default select example">
                    <option selected hidden disabled>-- Select --</option>
                    <?php
                    foreach ($item as $key => $value) {
                    ?>
                        <option value="<?= $value['item_id'] ?>"><?= $value['item_name'] ?></option>
                    <?php } ?>
                </select>
                <?php if ($validation->getError('pitem')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('pitem'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-4 mt-3">
                <label for="exampleFormControlInput2" class="form-label">Product Name <span style="color: red;">*</span></label>
                <input type="text" name="pname" class="form-control" id="exampleFormControlInput2" placeholder="Product Name">
                <?php if ($validation->getError('pname')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('pname'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-4 mt-3">
                <label for="exampleFormControlInput3" class="form-label">Unit of Measurement <span style="color: red;">*</span></label>
                <select class="form-select" name="punit" aria-label="Default select example">
                    <option selected hidden disabled>-- Select --</option>
                    <?php
                    foreach ($unit as $key => $value) {
                    ?>
                        <option value="<?= $value['unit_id'] ?>"><?= $value['unit_name'] ?></option>
                    <?php } ?>
                </select>
                <?php if ($validation->getError('punit')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('punit'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-4 mt-3">
                <label for="exampleFormControlInput4" class="form-label">Minimum Qty</label>
                <input type="number" name="min_qty" class="form-control" id="exampleFormControlInput4">
                <?php if ($validation->getError('min_qty')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('min_qty'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-4 mt-3">
                <label for="exampleFormControlInput5" class="form-label">Maximum Qty</label>
                <input type="number" name="max_qty" class="form-control" id="exampleFormControlInput5">
                <?php if ($validation->getError('max_qty')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('max_qty'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-4 mt-3">
                <label for="exampleFormControlInput6" class="form-label">Is the Product Consumables?</label>
                <div class="row">
                    <div class="col-lg-2">
                        <input class="form-check-input" type="radio" name="consumable" value="1" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Yes
                        </label>
                    </div>
                    <div class="col-lg-2">
                        <input class="form-check-input" type="radio" name="consumable" value="0" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            No
                        </label>
                    </div>
                </div>
                <?php if ($validation->getError('consumable')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('consumable'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-4 mt-3">
                <label for="formFile" class="form-label">Attachment <span style="color: red;">* jpg only</span></label>
                <input class="form-control" type="file" name="pimg">
                <?php if ($validation->getError('pimg')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('pimg'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-4 mt-3">
                <label for="exampleFormControlInput3" class="form-label">Status</label>
                <select class="form-select" name="pstatus" aria-label="Default select example">
                    <option selected value="1">Active</option>
                    <option value="0">De-active</option>
                </select>
            </div>

            <div class="col-lg-6 mt-3">
                <label for="exampleFormControlInput5" class="form-label">Specification</label>
                <textarea class="form-control" rows="7" name="pspecify"></textarea>
                <?php if ($validation->getError('pspecify')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('pspecify'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-6 mt-3">
                <label for="exampleFormControlInput5" class="form-label">Remarks</label>
                <textarea class="form-control" rows="7" name="premark"></textarea>
                <?php if ($validation->getError('premark')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('premark'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-12 text-center">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
<?php
if (!empty($product)) {
?>
    <div class="container mt-5">
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Item Group</th>
                        <th scope="col">Name</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Min Qty</th>
                        <th scope="col">Max Qty</th>
                        <th scope="col">Consumable</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Specification</th>
                        <th scope="col">Remarks</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($product as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $value['item_name'] ?></td>
                            <td><?= $value['pro_name'] ?></td>
                            <td><?= $value['unit_name'] ?></td>
                            <td><?= $value['min_qty'] ?></td>
                            <td><?= $value['max_qty'] ?></td>
                            <td><?= $value['consumable'] ?></td>
                            <td><img width="100" src="<?= base_url() ?>uploads/<?= $value['pro_img'] ?>"/></td>
                            <td><?= $value['product_status'] ?></td>
                            <td><?= $value['pro_specify'] ?></td>
                            <td><?= $value['pro_remarks'] ?></td>
                            <td><a href="<?= site_url('pro_edit/') . $value['pro_id'] ?>" class="btn btn-primary"><i class="bi bi-wrench"></i></a></td>
                            <td><a href="<?= site_url('product/') . $value['pro_id'] ?>" class="btn btn-danger"><i class="bi bi-trash3"></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>