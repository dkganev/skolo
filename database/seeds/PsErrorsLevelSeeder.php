<?php

use Illuminate\Database\Seeder;
use App\Models\PsErrorLevels;

class PsErrorsLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [
    		[
    			'err_level' => 0,
    			'level_str' => 'E_SILENT'
    		],[
    			'err_level' => 1,
    			'level_str' => 'E_WARN'
    		],[
    			'err_level' => 2,
    			'level_str' => 'E_SPLASH'
    		],[
    			'err_level' => 3,
    			'level_str' => 'E_ERROR'
    		],[
    			'err_level' => 4,
    			'level_str' => 'E_PANIC'
    		]
    	];

    	foreach ($data as $d)
		{
			PsErrorLevels::create($d);
		}

    }
}
