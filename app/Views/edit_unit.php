<div class="container mt-3">
    <div class="row">
        <form action="<?= site_url('unit_edit/' . $unit['unit_id']) ?>" method="post" class="row g-3">
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

            <div class="col-lg-6">
                <label for="exampleFormControlInput1" class="form-label">Name <span style="color: red;">*</span></label>
                <input type="text" name="unit_name" class="form-control" id="exampleFormControlInput1" value="<?= $unit['unit_name'] ?>" placeholder="Unit">
                <?php if ($validation->getError('unit_name')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('unit_name'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-6">
                <label for="exampleFormControlInput2" class="form-label">Status</label>
                <select class="form-select" name="unit_status" aria-label="Default select example">
                    <option <?php if ($unit['unit_status'] == 1) { ?> selected <?php } ?> value="1">Active</option>
                    <option <?php if ($unit['unit_status'] == 0) { ?> selected <?php } ?> value="0">De-active</option>
                </select>
            </div>

            <div class="col-12 text-center">
                <button class="btn btn-primary" type="submit">Submit</button>
                <a href="<?= site_url("/") ?>" class="btn btn-dark">Back</a>
            </div>
        </form>
    </div>
</div>