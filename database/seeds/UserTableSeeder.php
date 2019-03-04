<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_doc_basic = Role::where('name', 'doc_basic')->first();
        $role_doc_module_stats = Role::where('name', 'doc_module_stats')->first();

        $user = new User();
        $user->name = "Doctor Basic";
        $user->email = "doctor@mail.com";
        $user->password = bcrypt('query');
        $user->save();
        $user->roles()->attach($role_doc_basic);

        $user = new User();
        $user->name = "Doctor Stats";
        $user->email = "doctorstats@mail.com";
        $user->password = bcrypt('query');
        $user->save();
        $user->roles()->attach($role_doc_module_stats);
    }
}
