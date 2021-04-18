<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
        	[
				'name' => 'Cashier',
        	],
        	[
        		'name' => 'Casino Admin',
        	],
        	[
        		'name' => 'Owner',
        	],
        	[
        		'name' => 'Super User',
        	],
        ];

        foreach ($roles as $key => $value) {
        	Role::create($value);
        }
    }
}
