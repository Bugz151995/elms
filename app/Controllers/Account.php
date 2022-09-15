<?php

namespace App\Controllers;

use \App\Models\AccountModel;
use \App\Models\StudentModel;

class Account extends BaseController
{
    protected $helpers = ['form'];

    /**
     * signout from the system
     * @return string
     */
    public function signout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    /**
     * signin to the system
     * @return string
     */
    public function signin()
    {
        $validation = \Config\Services::validation();
        $model = model(AccountModel::class);

        if (!$this->validate($validation->getRuleGroup('signin_rules')))
            return view('signin', ['validation' => $this->validator]);

        $admin = $model->join('admin_tbl', 'admin_tbl.admin_id = account_tbl.admin_id')->where('username', $this->request->getPost('username'))->where('role', 'admin')->first();

        session()->set('fname', $admin['fname']);
        session()->set('mname', $admin['mname']);
        session()->set('lname', $admin['lname']);

        return redirect()->to('/home');
    }

    /**
     * creates an account data
     * 
     * @return string
     */
    public function create()
    {
        $account = model(AccountModel::class);
        $student = model(StudentModel::class);

        $rules = [
            'student_id' => 'required',
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'class' => 'required',
            'username' => 'required',
            'password' => 'required',
            'password_conf' => 'required',
        ];

        if ($this->validate($rules)) {
            $student->save([
                'student_id' => $this->request->getPost('student_id'),
                'fname' => $this->request->getPost('fname'),
                'mname' => $this->request->getPost('mname'),
                'lname' => $this->request->getPost('lname'),
                'class_id' => $this->request->getPost('class'),
            ]);

            $account->save([
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'student_id' => $this->request->getPost('student_id')
            ]);

            session()->setFlashdata('success', 'A new user was successfully created.');

            return redirect()->to('/registered_users');
        }

        return redirect()->back()->with('validation', $this->validator);
    }

    /**
     * updates an account data
     * 
     * @return string
     */
    public function update()
    {
        $account = model(AccountModel::class);
        $student = model(StudentModel::class);

        $rules = [
            'student_id' => 'required',
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'class' => 'required',
            'username' => 'required'
        ];

        if ($this->validate($rules)) {
            $student->save([
                'id' => $this->request->getPost('id'),
                'student_id' => $this->request->getPost('student_id'),
                'fname' => $this->request->getPost('fname'),
                'mname' => $this->request->getPost('mname'),
                'lname' => $this->request->getPost('lname'),
                'class_id' => $this->request->getPost('class'),
            ]);

            $account->save([
                'account_id' => $this->request->getPost('account_id'),
                'username' => $this->request->getPost('username'),
                'student_id' => $this->request->getPost('student_id')
            ]);

            session()->setFlashdata('success', 'The User data was successfully saved.');

            return redirect()->to('/registered_users');
        }

        return redirect()->back()->with('validation', $this->validator);
    }



    /**
     * deletes an account data
     * 
     * @return string
     */
    public function delete()
    {
        $account = model(AccountModel::class);

        if ($this->validate(['account_id' => 'required'])) {
            $account->delete(['account_id' => $this->request->getPost('account_id')]);

            session()->setFlashdata('success', 'The User data was successfully deleted.');

            session()->setFlashdata('warning', 'Please be cautious when deleting a data.');

            return redirect()->to('/registered_users');
        }

        return redirect()->back()->with('validation', $this->validator);
    }
}
