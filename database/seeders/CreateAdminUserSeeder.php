<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
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
            'email_verified_at' =>Carbon::now(),

        ]);

        /* $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]); */
    }
}
