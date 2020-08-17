<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert
        ([
            'firstname'=>'Admin',
            'lastname'=>'ADMIN',
            'email'=>'admin@admin.com',
            'phone'=>'0000000000',
            'role'=>'admin',
            'password'=>Hash::make('admin'),
        ]);

        DB::table('users')->insert
        ([
            'firstname'=>'Nicolas',
            'lastname'=>'COULOT',
            'email'=>'nico@nico.com',
            'phone'=>'9999999999',
            'role'=>'admin',
            'password'=>Hash::make('qwertyuiop'),
        ]);

        DB::table('users')->insert
        ([
            'firstname'=>'Jimi',
            'lastname'=>'HENDRIX',
            'email'=>'jimi@hendrix.com',
            'phone'=>'1111111111',
            'role'=>'guest',
            'password'=>Hash::make('qwertyuiop'),
        ]);

        DB::table('users')->insert
        ([
            'firstname'=>'Janis',
            'lastname'=>'JOPLIN',
            'email'=>'janis@joplin.com',
            'phone'=>'2222222222',
            'role'=>'member',
            'password'=>Hash::make('qwertyuiop'),
        ]);

        // factory(App\User::class, 10)->create();

    }
}
