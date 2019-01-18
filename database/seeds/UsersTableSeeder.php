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
        $user = App\User::create([
            'name' =>'admin admin',
            'email' =>'admin@mail.ru',
            'password'=>bcrypt('password'),
            'admin'=> 1,
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/default_avatar.jpg',
            'about' =>'lorem ipsum dolor',
            'instagram' => 'instagram.com',
            'youtube' => 'youtube.com',
        ]);
    }
}
