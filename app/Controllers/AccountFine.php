<?php

namespace App\Controllers;

use \App\Models\AccountFineModel;

class AccountFine extends BaseController
{
    protected $helpers = ['form'];  

    /**
     * deletes an account fine data
     * 
     * @return string
     */
    public function delete()
    {
        $user = model(AccountFineModel::class);

        if ($this->validate(['account_fine_id' => 'required'])) {
            $user->delete(['account_fine_id' => $this->request->getPost('account_fine_id')]);

            session()->setFlashdata('success', 'The user fine data was successfully deleted.');

            session()->setFlashdata('warning', 'Please be cautious when deleting a data.');

            return redirect()->to('/user_fines');
        }

        return redirect()->back()->with('validation', $this->validator);
    }
}
