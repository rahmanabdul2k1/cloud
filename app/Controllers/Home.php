<?php

namespace App\Controllers;

use App\Models\UnitModel;
use App\Models\ItemModel;
use App\Models\ProductModel;
use App\Models\SupplierModel;

class Home extends BaseController
{
    public function index()
    {
        $unit = new UnitModel();
        $page_name['page_title'] = 'Unit';
        if ($this->request->is('get')) {
            $details['unit'] = db_connect()->query("SELECT *, IF(unit_status = 1, 'Active', 'Deactive') AS status FROM unit")->getResultArray();
            return view('header', $page_name)
                . view('unit', $details)
                . view('footer');
        } else if ($this->request->is('post')) {
            $rules = [
                'unit_name' => 'required|alpha_space',
                'unit_status' => 'numeric',
            ];
            if ($this->validate($rules)) {
                $data = [
                    'unit_name' => $this->request->getVar('unit_name'),
                    'unit_status' => $this->request->getVar('unit_status'),
                ];
                if ($unit->insert($data)) {
                    session()->setFlashdata('status', 'Data Inserted Successfully!');
                    session()->setFlashdata('color', 'alert-success');
                    return redirect('/');
                } else {
                    session()->setFlashdata('status', 'Something Wrong!');
                    session()->setFlashdata('color', 'alert-danger');
                    return redirect('/');
                }
            } else {
                $details['validation'] = $this->validator;
                return view('header', $page_name)
                    . view('unit', $details)
                    . view('footer');
            }
        }
    }

    public function edit_unit($id)
    {
        $unit = new UnitModel();
        $page_name['page_title'] = 'Edit Unit';
        if ($this->request->is('post')) {
            $rules = [
                'unit_name' => 'required|alpha_space',
                'unit_status' => 'numeric',
            ];
            if ($this->validate($rules)) {
                $data = [
                    'unit_name' => $this->request->getVar('unit_name'),
                    'unit_status' => $this->request->getVar('unit_status'),
                ];
                if ($unit->update($id, $data)) {
                    session()->setFlashdata('status', 'Data Updated Successfully!');
                    session()->setFlashdata('color', 'alert-success');
                    return redirect('/');
                } else {
                    session()->setFlashdata('status', 'Something Wrong!');
                    session()->setFlashdata('color', 'alert-danger');
                    return redirect('/');
                }
            } else {
                $data['unit'] = $unit->find($id);
                $data['validation'] = $this->validator;
                return view('header', $page_name)
                    . view('edit_unit', $data)
                    . view('footer');
            }
        } else {
            $data['unit'] = $unit->find($id);
            return view('header', $page_name)
                . view('edit_unit', $data)
                . view('footer');
        }
    }

    public function delete_unit($id)
    {
        $unit = new UnitModel();
        $unit->delete($id);
        return redirect("/");
    }

    public function item()
    {
        $item = new ItemModel();
        $page_name['page_title'] = 'Item';
        if ($this->request->is('get')) {
            $details['item'] = db_connect()->query("SELECT *, IF(item_status = 1, 'Active', 'Deactive') AS `status` FROM `item`")->getResultArray();
            return view('header', $page_name)
                . view('item', $details)
                . view('footer');
        } else if ($this->request->is('post')) {
            $rules = [
                'item_name' => 'required|alpha_space',
                'item_code' => 'required|alpha_numeric_space',
                'item_status' => 'numeric',
            ];
            if ($this->validate($rules)) {
                $item = new ItemModel();
                $data = [
                    'item_name' => $this->request->getVar('item_name'),
                    'item_code' => $this->request->getVar('item_code'),
                    'item_status' => $this->request->getVar('item_status'),
                ];
                if ($item->insert($data)) {
                    session()->setFlashdata('status', 'Data Inserted Successfully!');
                    session()->setFlashdata('color', 'alert-success');
                    return redirect('item');
                } else {
                    session()->setFlashdata('status', 'Something Wrong!');
                    session()->setFlashdata('color', 'alert-danger');
                    return redirect('item');
                }
            } else {
                $details['validation'] = $this->validator;
                return view('header', $page_name)
                    . view('item', $details)
                    . view('footer');
            }
        }
    }

    public function edit_item($id)
    {
        $item = new ItemModel();
        $page_name['page_title'] = 'Edit Item';
        if ($this->request->is('post')) {
            $rules = [
                'item_name' => 'required|alpha_space',
                'item_code' => 'required|alpha_numeric_space',
                'item_status' => 'numeric',
            ];
            if ($this->validate($rules)) {
                $item = new ItemModel();
                $data = [
                    'item_name' => $this->request->getVar('item_name'),
                    'item_code' => $this->request->getVar('item_code'),
                    'item_status' => $this->request->getVar('item_status'),
                ];
                if ($item->update($id, $data)) {
                    session()->setFlashdata('status', 'Data Updated Successfully!');
                    session()->setFlashdata('color', 'alert-success');
                    return redirect('item');
                } else {
                    session()->setFlashdata('status', 'Something Wrong!');
                    session()->setFlashdata('color', 'alert-danger');
                    return redirect('item');
                }
            } else {
                $data['item'] = $item->find($id);
                $data['validation'] = $this->validator;
                return view('header', $page_name)
                    . view('edit_item', $data)
                    . view('footer');
            }
        } else {
            $data['item'] = $item->find($id);
            return view('header', $page_name)
                . view('edit_item', $data)
                . view('footer');
        }
    }

    public function delete_item($id)
    {
        $item = new ItemModel();
        $item->delete($id);
        return redirect("item");
    }

    public function product()
    {
        $product = new ProductModel();
        $unit_model = new UnitModel();
        $item_model = new ItemModel();
        $details['unit'] = $unit_model->where('unit_status', '1')->findAll();
        $details['item'] = $item_model->where('item_status', '1')->findAll();
        $details['product'] = db_connect()->query("SELECT *, IF(pro_status = 1, 'Active', 'Deactive') AS product_status, IF(pro_consumable = 1, 'Yes', 'No') AS consumable FROM product JOIN item ON item.item_id = product.pro_item JOIN unit ON unit.unit_id = product.pro_unit")->getResultArray();
        $page_name['page_title'] = 'Product';
        if ($this->request->is('get')) {
            return view('header', $page_name)
                . view('product', $details)
                . view('footer');
        } else if ($this->request->is('post')) {
            $rules = [
                'pitem' => 'required',
                'pname' => 'required',
                'punit' => 'required',
                'min_qty' => 'numeric|permit_empty',
                'max_qty' => 'numeric|permit_empty',
                'consumable' => 'numeric|permit_empty',
                'pstatus' => 'numeric',
                'pspecify' => 'alpha_numeric_space|permit_empty',
                'premark' => 'alpha_numeric_space|permit_empty',
                'pimg' => 'is_image[pimg]|uploaded[pimg]|ext_in[pimg,jpg]',
            ];
            if ($this->validate($rules)) {
                $img = $this->request->getFile('pimg');
                $name = $img->getName();
                $img->move(FCPATH . 'uploads/', $name);
                $data = [
                    'pro_item' => $this->request->getVar('pitem'),
                    'pro_name' => $this->request->getVar('pname'),
                    'pro_unit' => $this->request->getVar('punit'),
                    'min_qty' => $this->request->getVar('min_qty'),
                    'max_qty' => $this->request->getVar('max_qty'),
                    'pro_consumable' => $this->request->getVar('consumable'),
                    'pro_status' => $this->request->getVar('pstatus'),
                    'pro_specify' => $this->request->getVar('pspecify'),
                    'pro_remarks' => $this->request->getVar('premark'),
                    'pro_img' => $name,
                ];
                if ($product->insert($data)) {
                    session()->setFlashdata('status', 'Data Inserted Successfully!');
                    session()->setFlashdata('color', 'alert-success');
                    return redirect('product');
                } else {
                    session()->setFlashdata('status', 'Something Wrong!');
                    session()->setFlashdata('color', 'alert-danger');
                    return redirect('product');
                }
            } else {

                $details['validation'] = $this->validator;
                return view('header', $page_name)
                    . view('product', $details)
                    . view('footer');
            }
        }
    }

    public function edit_product($id)
    {
        $product = new ProductModel();
        $unit_model = new UnitModel();
        $item_model = new ItemModel();
        $details['unit'] = $unit_model->findAll();
        $details['item'] = $item_model->findAll();
        $page_name['page_title'] = 'Edit Product';
        if ($this->request->is('post')) {
            $rules = [
                'pitem' => 'required',
                'pname' => 'required',
                'punit' => 'required',
                'min_qty' => 'numeric|permit_empty',
                'max_qty' => 'numeric|permit_empty',
                'consumable' => 'numeric|permit_empty',
                'pstatus' => 'numeric',
                'pspecify' => 'alpha_numeric_space|permit_empty',
                'premark' => 'alpha_numeric_space|permit_empty',
                'pimg' => 'is_image[pimg]|uploaded[pimg]|ext_in[pimg,jpg]',
            ];
            if ($this->validate($rules)) {
                if ($this->request->getFile('pimg') != '') {
                    $img = $this->request->getFile('pimg');
                    $name = $img->getName();
                    $img->move(FCPATH . 'uploads/', $name);
                    $data = [
                        'pro_item' => $this->request->getVar('pitem'),
                        'pro_name' => $this->request->getVar('pname'),
                        'pro_unit' => $this->request->getVar('punit'),
                        'min_qty' => $this->request->getVar('min_qty'),
                        'max_qty' => $this->request->getVar('max_qty'),
                        'pro_consumable' => $this->request->getVar('consumable'),
                        'pro_status' => $this->request->getVar('pstatus'),
                        'pro_specify' => $this->request->getVar('pspecify'),
                        'pro_remarks' => $this->request->getVar('premark'),
                        'pro_img' => $name,
                    ];
                } else {
                    $data = [
                        'pro_item' => $this->request->getVar('pitem'),
                        'pro_name' => $this->request->getVar('pname'),
                        'pro_unit' => $this->request->getVar('punit'),
                        'min_qty' => $this->request->getVar('min_qty'),
                        'max_qty' => $this->request->getVar('max_qty'),
                        'pro_consumable' => $this->request->getVar('consumable'),
                        'pro_status' => $this->request->getVar('pstatus'),
                        'pro_specify' => $this->request->getVar('pspecify'),
                        'pro_remarks' => $this->request->getVar('premark'),
                    ];
                }
                if ($product->update($id, $data)) {
                    session()->setFlashdata('status', 'Data Updated Successfully!');
                    session()->setFlashdata('color', 'alert-success');
                    return redirect('product');
                } else {
                    session()->setFlashdata('status', 'Something Wrong!');
                    session()->setFlashdata('color', 'alert-danger');
                    return redirect('product');
                }
            } else {
                $details['product'] = $product->find($id);
                $details['validation'] = $this->validator;
                return view('header', $page_name)
                    . view('edit_product', $details)
                    . view('footer');
            }
        } else {
            $details['product'] = $product->find($id);
            return view('header', $page_name)
                . view('edit_product', $details)
                . view('footer');
        }
    }

    public function delete_product($id)
    {
        $product = new ProductModel();
        $product->delete($id);
        return redirect("product");
    }

    public function supplier()
    {
        $supplier = new SupplierModel();
        $page_name['page_title'] = 'Supplier';
        if ($this->request->is('get')) {
            $details['supplier'] = db_connect()->query("SELECT *, IF(supplier_status = 1, 'Active', 'Deactive') AS status FROM supplier")->getResultArray();
            return view('header', $page_name)
                . view('supplier', $details)
                . view('footer');
        } else if ($this->request->is('post')) {
            $rules = [
                'sup_name' => 'required|alpha_space',
                'sup_email' => 'required|valid_email',
                'sup_phone' => 'required|numeric|min_length[10]|max_length[10]',
                'sup_rupee' => 'required|numeric',
                'sup_gst' => 'alpha_numeric|permit_empty',
                'sup_address' => 'permit_empty',
                'sup_city' => 'alpha|permit_empty',
                'sup_pincode' => 'numeric|permit_empty',
                'sup_branch' => 'alpha|permit_empty',
                'sup_account' => 'alpha_numeric|permit_empty',
                'sup_ifsc' => 'alpha_numeric|permit_empty',
                'sup_status' => 'numeric',
            ];
            if ($this->validate($rules)) {
                $data = [
                    'sname' => $this->request->getVar('sup_name'),
                    'email' => $this->request->getVar('sup_email'),
                    'phone' => $this->request->getVar('sup_phone'),
                    'rupee' => $this->request->getVar('sup_rupee'),
                    'gst' => $this->request->getVar('sup_gst'),
                    'address' => $this->request->getVar('sup_address'),
                    'city' => $this->request->getVar('sup_city'),
                    'pincode' => $this->request->getVar('sup_pincode'),
                    'branch' => $this->request->getVar('sup_branch'),
                    'account' => $this->request->getVar('sup_account'),
                    'ifsc' => $this->request->getVar('sup_ifsc'),
                    'supplier_status' => $this->request->getVar('sup_status'),
                ];
                if ($supplier->insert($data)) {
                    session()->setFlashdata('status', 'Data Inserted Successfully!');
                    session()->setFlashdata('color', 'alert-success');
                    return redirect('supplier');
                } else {
                    session()->setFlashdata('status', 'Something Wrong!');
                    session()->setFlashdata('color', 'alert-danger');
                    return redirect('supplier');
                }
            } else {
                $data['validation'] = $this->validator;
                return view('header', $page_name)
                    . view('supplier', $data)
                    . view('footer');
            }
        }
    }

    public function edit_supplier($id)
    {
        $supplier = new SupplierModel();
        $page_name['page_title'] = 'Edit Supplier';
        if ($this->request->is('post')) {
            $rules = [
                'sup_name' => 'required|alpha_space',
                'sup_email' => 'required|valid_email',
                'sup_phone' => 'required|numeric|min_length[10]|max_length[10]',
                'sup_rupee' => 'required|numeric',
                'sup_gst' => 'alpha_numeric|permit_empty',
                'sup_address' => 'permit_empty',
                'sup_city' => 'alpha|permit_empty',
                'sup_pincode' => 'numeric|permit_empty',
                'sup_branch' => 'alpha|permit_empty',
                'sup_account' => 'alpha_numeric|permit_empty',
                'sup_ifsc' => 'alpha_numeric|permit_empty',
                'sup_status' => 'numeric',
            ];
            if ($this->validate($rules)) {
                $data = [
                    'sname' => $this->request->getVar('sup_name'),
                    'email' => $this->request->getVar('sup_email'),
                    'phone' => $this->request->getVar('sup_phone'),
                    'rupee' => $this->request->getVar('sup_rupee'),
                    'gst' => $this->request->getVar('sup_gst'),
                    'address' => $this->request->getVar('sup_address'),
                    'city' => $this->request->getVar('sup_city'),
                    'pincode' => $this->request->getVar('sup_pincode'),
                    'branch' => $this->request->getVar('sup_branch'),
                    'account' => $this->request->getVar('sup_account'),
                    'ifsc' => $this->request->getVar('sup_ifsc'),
                    'supplier_status' => $this->request->getVar('sup_status'),
                ];
                if ($supplier->update($id, $data)) {
                    session()->setFlashdata('status', 'Data Inserted Successfully!');
                    session()->setFlashdata('color', 'alert-success');
                    return redirect('supplier');
                } else {
                    session()->setFlashdata('status', 'Something Wrong!');
                    session()->setFlashdata('color', 'alert-danger');
                    return redirect('supplier');
                }
            } else {
                $data['supplier'] = $supplier->find($id);
                $data['validation'] = $this->validator;
                return view('header', $page_name)
                    . view('edit_supplier', $data)
                    . view('footer');
            }
        } else {
            $data['supplier'] = $supplier->find($id);
            return view('header', $page_name)
                . view('edit_supplier', $data)
                . view('footer');
        }
    }

    public function delete_supplier($id)
    {
        $supplier = new SupplierModel();
        $supplier->delete($id);
        return redirect("supplier");
    }
}
