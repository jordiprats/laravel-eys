<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CreateDemoTicket extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('tickets')->insert([
      'user_id' => 1,
      'team_id' => 1,
      'subject' => 'Demo ticket',
      'description' => 'bla bla bla bla',
      'visibility' => 'published',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ]);
  }
}
