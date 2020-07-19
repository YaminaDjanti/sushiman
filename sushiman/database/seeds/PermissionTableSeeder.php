<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $permissions = [
          'Utilisateurs-liste',
          'Utilisateurs-créer',
          'Utilisateurs-éditer',
          'Utilisateurs-supprimer',
        ];


        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }


        /*Comand run for enter in db
        php artisan db:seed --class=PermissionTableSeeder


        */
    }
}