<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(PsErrorsLevelSeeder::class);
        $this->call(PsErrorsListSeeder::class);
    }
}
zz