<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'iqraa',
            'nom'  => 'iqraa',
            'prenom' =>'iqraa',
        	'email' => 'iqraa@gmail.com',
        	'password' => bcrypt('987654321'),
            'role_name'=>'Admin',

        ]);

        /* $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]); */
    }
}
