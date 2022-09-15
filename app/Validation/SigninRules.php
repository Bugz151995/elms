<?php

namespace App\Validation;

use App\Models\AccountModel;

class SigninRules {
  public function user_exists(string $str, string $fields, array $data) : bool {
    $model = model(AccountModel::class);

    $user = $model->where('username', $data['username'])->where('role', 'admin')->first();

    return (!$user) ? false : true;
  }

  public function password_matches(string $str, string $fields, array $data) : bool {
    $model = model(AccountModel::class);

    $user = $model->where('username', $data['username'])->where('role', 'admin')->first();
    
    return (!$user) ? false : password_verify($data['password'], $user['password']);
  }

  public function login_attempt(string $str) {
    $throttler = \Config\Services::throttler();
    $allow = $throttler->check(base_url().'login', 3, MINUTE);

    return $allow;
  }
}