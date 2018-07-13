<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    $this->call(CreateRoles::class);
    $this->call(CreateAdminUser::class);
    $this->call(CreateTeams::class);
  }
}
