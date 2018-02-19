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
        DB::table('roles')->insert([
            'user_id' => 1,
            'name'    => 'admin',
            'slug'    => 'admin',
        ]);
        
        DB::table('roles')->insert([
            'user_id' => 2,
            'name'    => 'user',
            'slug'    => 'user',
        ]);
        
        DB::table('roles')->insert([
            'user_id' => 3,
            'name'    => 'artist',
            'slug'    => 'artist',
        ]);
    }
}
