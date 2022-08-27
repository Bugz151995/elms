<?php

namespace App\Controllers;

use \App\Models\AccountModel;
use \App\Models\StudentModel;

class Account extends BaseController
{
    protected $helpers = ['form'];  

    /**
     * creates a book data
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
            // test route if success
            // TODO: remove later
            // add success data to the page when it reloads and capture it through a js plguin of success popup
            return redirect()->to('/registered_users');
        }

        // return redirect()->to('/user_fines');
    }

    /**
     * creates a book data
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
            // test route if success
            // TODO: remove later
            // add success data to the page when it reloads and capture it through a js plguin of success popup
            return redirect()->to('/registered_users');
        }

        // return redirect()->to('/user_fines');
    }

    

    /**
     * creates a book data
     * 
     * @return string
     */
    public function delete()
    {
        $account = model(AccountModel::class);

        if ($this->validate(['account_id' => 'required'])) {            
            $account->delete(['account_id' => $this->request->getPost('account_id')]);
            // test route if success
            // TODO: remove later
            // add success data to the page when it reloads and capture it through a js plguin of success popup
            return redirect()->to('/registered_users');
        }

        // return redirect()->to('/user_fines');
    }
}
