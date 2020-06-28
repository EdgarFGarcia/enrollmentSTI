<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            'name'                  => "Admin",
            'description'           => "Nothing",
            'created_at'            => date('Y-m-d')
        ]);
        DB::table('roles')->insert([
            'name'                  => "Faculty",
            'description'           => "Nothing",
            'created_at'            => date('Y-m-d')
        ]);
        DB::table('roles')->insert([
            'name'                  => "Accounting",
            'description'           => "Nothing",
            'created_at'            => date('Y-m-d')
        ]);
        DB::table('roles')->insert([
            'name'                  => "Student",
            'description'           => "Nothing",
            'created_at'            => date('Y-m-d')
        ]);
        DB::table('roles')->insert([
            'name'                  => "Others",
            'description'           => "Nothing",
            'created_at'            => date('Y-m-d')
        ]);
    }
}
