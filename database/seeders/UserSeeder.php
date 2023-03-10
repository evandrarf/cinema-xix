<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    //
    User::create([
      'name' => 'Admin1',
      'role' => 'admin',
      'username' => 'admin1',
      'password' => HASH::make('admin1'),
    ]);

    User::create([
      'name' => 'Admin2',
      'role' => 'admin',
      'username' => 'admin2',
      'password' => HASH::make('admin2'),
    ]);

    User::create([
      'name' => 'User1',
      'role' => 'user',
      'username' => 'user1',
      'password' => HASH::make('user1'),
    ]);
  }
}
