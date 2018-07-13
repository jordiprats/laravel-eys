<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CreateTeams extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
   public function run()
   {
     DB::table('teams')->insert([
       'name' => "MySQL team",
       'created_at' => Carbon::now(),
       'updated_at' => Carbon::now()
     ]);
     DB::table('teams')->insert([
       'name' => "PostgreSQL team",
       'created_at' => Carbon::now(),
       'updated_at' => Carbon::now()
     ]);
   }
}
