<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Crud extends BaseController
{
    public function create()
    {
        $data['title'] = 'Create Users';
        return view('crud/create', $data);
    }

    public function store()
    {
        $model = new UserModel();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = array(
                "userFullName" => $this->request->getPost("username"),
                "userEmail" => $this->request->getPost("email"),
                "userPassword" => $this->request->getPost("password"),
                "userStatus" => $this->request->getPost('status'),
                "userCreatedDate" => date('d-m-Y h:i:s'),
                "userUpdatedDate" => "NOT UPDATED YET"
            );
            $addUser = $model->save($data);
            if ($addUser) {
                return redirect()->to(base_url('read'))->with('message', 'User Added Successfully');
            } else {
                return redirect()->to(base_url('/create'))->with('message', 'Oops!! Some Error Occurred....');
            }
        } else {
            http_response_code(404);
        }
    }

    public function read()
    {
        $model = new UserModel();
        $data['getAllUsers'] = $model->findAll();
        $data['title'] = 'Read Users';
        return view('crud/read', $data);
    }
    public function update($id)
    {
        $model = new UserModel();
        $data['getUserDataById'] = $model->find($id);
        $data['title'] = 'Update Users';
        return view('crud/update', $data);
    }

    public function edit($id)
    {
        $model = new UserModel();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = array(
                "userFullName" => $this->request->getPost("username"),
                "userEmail" => $this->request->getPost("email"),
                "userPassword" => $this->request->getPost("password"),
                "userStatus" => $this->request->getPost('status'),
                "userUpdatedDate" => date('d-m-Y h:i:sa')
            );
            $editUser = $model->update($id, $data);
            if ($editUser) {
                return redirect()->to(base_url('read'))->with('message', 'User Updated Successfully');
            } else {
                return redirect()->to(base_url('/update/' . $id))->with('message', 'Oops!! Some Error Occurred....');
            }
        } else {
            http_response_code(404);
        }
    }
    public function delete($id)
    {
        $model = new UserModel();
        $deleteUser = $model->delete($id);
        if ($deleteUser) {
            return redirect()->to(base_url('read'))->with('message', 'User Deleted Successfully');
        } else {
            return redirect()->to(base_url('/read'))->with('message', 'Oops!! Some Error Occurred....');
        }
    }
}
