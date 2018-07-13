<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CreateAdminUser extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert([
      'name' => 'admin',
      'email' => 'admin',
      'password' => Hash::make('admin'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ]);

    // attach to all roles
    DB::table('role_user')->insert([
      'user_id' => '1',
      'role_id' => '1',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ]);
    DB::table('role_user')->insert([
      'user_id' => '1',
      'role_id' => '2',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ]);
    DB::table('role_user')->insert([
      'user_id' => '1',
      'role_id' => '3',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ]);
  }
}
