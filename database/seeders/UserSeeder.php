<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
  public function run() {
    User::create([
      'name' => 'Joe Smith',
      'email' => 'joe@gmail.com',
      'password' => Hash::make('qqqqqqqq'),
    ]);
    User::create([
      'name' => 'Jim Raynor',
      'email' => 'jim.raynor@gmail.com',
      'password' => Hash::make('qqqqqqqq'),
    ]);
  }
}
