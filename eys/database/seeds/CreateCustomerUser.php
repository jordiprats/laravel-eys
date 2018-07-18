<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CreateCustomerUser extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert([
      'id' => 2,
      'name' => 'customer',
      'email' => 'customer@eys',
      'password' => Hash::make('customer'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ]);

    // attach to customer rule
    DB::table('role_user')->insert([
      'user_id' => '2',
      'role_id' => '4',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ]);
  }
}
