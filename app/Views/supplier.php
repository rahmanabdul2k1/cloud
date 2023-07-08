<div class="container mt-3">
    <div class="row">
        <form action="<?= site_url('supplier') ?>" method="post" class="row g-3">
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
                <label for="exampleFormControlInput1" class="form-label">Name <span style="color: red;">*</span></label>
                <input type="text" name="sup_name" class="form-control" id="exampleFormControlInput1" placeholder="Name">
                <?php if ($validation->getError('sup_name')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('sup_name'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-4 mt-3">
                <label for="exampleFormControlInput2" class="form-label">Email <span style="color: red;">*</span></label>
                <input type="email" name="sup_email" class="form-control" id="exampleFormControlInput2" placeholder="Email">
                <?php if ($validation->getError('sup_email')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('sup_email'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-4 mt-3">
                <label for="exampleFormControlInput3" class="form-label">Mobile <span style="color: red;">*</span></label>
                <input type="number" name="sup_phone" class="form-control" id="exampleFormControlInput3" placeholder="Mobile">
                <?php if ($validation->getError('sup_phone')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('sup_phone'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-4 mt-3">
                <label for="exampleFormControlInput4" class="form-label">Currency <span style="color: red;">*</span></label>
                <input type="number" name="sup_rupee" class="form-control" id="exampleFormControlInput4" placeholder="Rupee">
                <?php if ($validation->getError('sup_rupee')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('sup_rupee'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-4 mt-3">
                <label for="exampleFormControlInput5" class="form-label">GST No</label>
                <input type="text" name="sup_gst" class="form-control" id="exampleFormControlInput5" placeholder="Tax">
                <?php if ($validation->getError('sup_gst')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('sup_gst'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-4 mt-3">
                <label for="exampleFormControlInput5" class="form-label">Address</label>
                <textarea class="form-control" rows="7" name="sup_address"></textarea>
                <?php if ($validation->getError('sup_address')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('sup_address'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-4 mt-3">
                <label for="exampleFormControlInput6" class="form-label">City</label>
                <input type="text" name="sup_city" class="form-control" id="exampleFormControlInput6" placeholder="City">
                <?php if ($validation->getError('sup_city')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('sup_city'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-4 mt-3">
                <label for="exampleFormControlInput7" class="form-label">Pincode</label>
                <input type="number" name="sup_pincode" class="form-control" id="exampleFormControlInput7" placeholder="Pincode">
                <?php if ($validation->getError('sup_pincode')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('sup_pincode'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-4 mt-3">
                <label for="exampleFormControlInput8" class="form-label">Branch</label>
                <input type="text" name="sup_branch" class="form-control" id="exampleFormControlInput8" placeholder="Branch">
                <?php if ($validation->getError('sup_branch')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('sup_branch'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-4 mt-3">
                <label for="exampleFormControlInput9" class="form-label">Account Number</label>
                <input type="text" name="sup_account" class="form-control" id="exampleFormControlInput9" placeholder="Account Number">
                <?php if ($validation->getError('sup_account')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('sup_account'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-4 mt-3">
                <label for="exampleFormControlInput10" class="form-label">IFSC Code</label>
                <input type="text" name="sup_ifsc" class="form-control" id="exampleFormControlInput10" placeholder="IFSC Code">
                <?php if ($validation->getError('sup_ifsc')) { ?>
                    <span style="color:red">
                        <?= $error = $validation->getError('sup_ifsc'); ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-lg-4 mt-3">
                <label for="exampleFormControlInput3" class="form-label">Status</label>
                <select class="form-select" name="sup_status" aria-label="Default select example">
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
if (!empty($supplier)) {
?>
    <div class="container mt-5 mb-5">
        <div class="row table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Rupee</th>
                        <th scope="col">GST</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">Pincode</th>
                        <th scope="col">Branch</th>
                        <th scope="col">Account</th>
                        <th scope="col">IFSC</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($supplier as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $value['sname'] ?></td>
                            <td><?= $value['email'] ?></td>
                            <td><?= $value['phone'] ?></td>
                            <td><?= $value['rupee'] ?></td>
                            <td><?= $value['gst'] ?></td>
                            <td><?= $value['address'] ?></td>
                            <td><?= $value['city'] ?></td>
                            <td><?= $value['pincode'] ?></td>
                            <td><?= $value['branch'] ?></td>
                            <td><?= $value['account'] ?></td>
                            <td><?= $value['ifsc'] ?></td>
                            <td><?= $value['status'] ?></td>
                            <td><a href="<?= site_url('sup_edit/') . $value['sup_id'] ?>" class="btn btn-primary"><i class="bi bi-wrench"></i></a></td>
                            <td><a href="<?= site_url('supplier/') . $value['sup_id'] ?>" class="btn btn-danger"><i class="bi bi-trash3"></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>