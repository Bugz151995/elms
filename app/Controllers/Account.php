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
	 * updates an account data
	 * 
	 * @return string
	 */
	public function update()
	{
		$account_tbl = model(AccountModel::class);
		$student_tbl = model(StudentModel::class);

		if ($this->validate([
			'fname' => 'required',
			'mname' => 'required',
			'lname' => 'required',
			'class' => 'required',
			'username' => 'required'
		])) {
			$student_tbl->save([
				'student_id' => $this->request->getPost('student_id'),
				'fname' => $this->request->getPost('fname'),
				'mname' => $this->request->getPost('mname'),
				'lname' => $this->request->getPost('lname'),
				'class_id' => $this->request->getPost('class')
			]);

			$account_tbl->save([
				'account_id' => $this->request->getPost('account_id'),
				'username' => $this->request->getPost('username')
			]);

			session()->setFlashdata('success', 'The User information was successfully saved.');

			return redirect()->to('/registered_users');
		}

		return redirect()->back()->with('validation', $this->validator);
	}

	public function changePassword()
	{
		$account_tbl = model(AccountModel::class);

		if ($this->validate([
			'password' => 'required|matches[password_conf]',
			'password_conf' => 'required|matches[password]'
		])) {
			$account_tbl->save([
				'account_id' => $this->request->getPost('account_id'),
				'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
			]);

			session()->setFlashdata('success', 'The User password was successfully updated.');

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
