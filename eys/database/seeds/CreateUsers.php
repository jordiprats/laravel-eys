<?php

use Illuminate\Database\Seeder;

class CreateUsers extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert([
      'name' => 'customer',
      'email' => 'customer@eys',
      'password' => Hash::make('customer'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ]);

    // attach to customer role
    DB::table('role_user')->insert([
      'user_id' => '1',
      'role_id' => '3',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ]);
  }
}
