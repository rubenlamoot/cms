<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\User::class, 50)->create();
        DB::insert('insert into users(name, email, password)
        values (?,?,?)', ['Tom', 'vanhoutte.tom@gmail.com', bcrypt(123456)]);
    }
}

/** andere methode om te crypten */
//hash::make();
