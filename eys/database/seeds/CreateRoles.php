<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CreateRoles extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('roles')->insert([
      'name' => "Student",
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ]);
    DB::table('roles')->insert([
      'name' => "Admin",
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ]);
    DB::table('roles')->insert([
      'name' => "Instructor",
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ]);
  }
}
