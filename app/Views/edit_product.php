<div class="container mt-3">
    <div class="row">
        <form action="<?= site_url('pro_edit/' . $product['pro_id']) ?>" method="post" class="row g-3" enctype="multipart/form-data">
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
                    <?php
                    foreach ($item as $key => $value) {
                    ?>
                        <option <?php if ($product['pro_item'] == $value['item_id']) { ?> selected <?php } ?> value="<?= $value['item_id'] ?>"><?= $value['item_name'] ?></option>
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
                <input type="text" name="pname" value="<?= $product['pro_name'] ?>" class="form-control" id="exampleFormControlInput2" placeholder="Product Name">
                <?php if ($validation->getError('pname')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('pname'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-4 mt-3">
                <label for="exampleFormControlInput3" class="form-label">Unit of Measurement <span style="color: red;">*</span></label>
                <select class="form-select" name="punit" aria-label="Default select example">
                    <?php
                    foreach ($unit as $key => $value) {
                    ?>
                        <option <?php if ($product['pro_unit'] == $value['unit_id']) { ?> selected <?php } ?> value="<?= $value['unit_id'] ?>"><?= $value['unit_name'] ?></option>
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
                <input type="number" value="<?= $product['min_qty'] ?>" name="min_qty" class="form-control" id="exampleFormControlInput4">
                <?php if ($validation->getError('min_qty')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('min_qty'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-4 mt-3">
                <label for="exampleFormControlInput5" class="form-label">Maximum Qty</label>
                <input type="number" value="<?= $product['max_qty'] ?>" name="max_qty" class="form-control" id="exampleFormControlInput5">
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
                        <input class="form-check-input" type="radio" name="consumable" value="1" id="flexRadioDefault1" <?php if ($product['pro_consumable'] == 1) { ?> checked <?php } ?>>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Yes
                        </label>
                    </div>
                    <div class="col-lg-2">
                        <input class="form-check-input" type="radio" name="consumable" value="0" id="flexRadioDefault2" <?php if ($product['pro_consumable'] == 0) { ?> checked <?php } ?>>
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
                <label class="form-label">Attachment <span style="color: red;">* jpg only</span>
                    <input type="file" name="pimg" style="display: none;">
                    <img src="<?= base_url() ?>/uploads/<?= $product['pro_img'] ?>" alt="Profile" height="120" title="Upload new profile image">
                </label>
                <?php if ($validation->getError('pimg')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('pimg'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-4 mt-3">
                <label for="exampleFormControlInput3" class="form-label">Status</label>
                <select class="form-select" name="pstatus" aria-label="Default select example">
                    <option <?php if ($product['pro_status'] == 1) { ?> selected <?php } ?> value="1">Active</option>
                    <option <?php if ($product['pro_status'] == 0) { ?> selected <?php } ?> value="0">De-active</option>
                </select>
            </div>

            <div class="col-lg-6 mt-3">
                <label for="exampleFormControlInput5" class="form-label">Specification</label>
                <textarea class="form-control" rows="7" value="<?= $product['pro_specify'] ?>" name="pspecify"></textarea>
                <?php if ($validation->getError('pspecify')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('pspecify'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-6 mt-3">
                <label for="exampleFormControlInput5" class="form-label">Remarks</label>
                <textarea class="form-control" rows="7" value="<?= $product['pro_remarks'] ?>" name="premark"></textarea>
                <?php if ($validation->getError('premark')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('premark'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-12 text-center">
                <button class="btn btn-primary" type="submit">Submit</button>
                <a href="<?= site_url("product") ?>" class="btn btn-dark">Back</a>
            </div>
        </form>
    </div>
</div>