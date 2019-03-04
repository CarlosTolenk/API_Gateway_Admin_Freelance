<?php

use Illuminate\Database\Seeder;
use App\Role;


class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = "doc_basic";
        $role->description = 'Access to all basic functions of a plant doctor and consultations';
        $role->save(); 

        $role = new Role();
        $role->name = "doc_module_stats";
        $role->description = 'Access to have statics of patients and diseases registered by the final diagnoses';
        $role->save();
    }
}
