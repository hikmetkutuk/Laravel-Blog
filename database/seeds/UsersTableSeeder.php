<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run() {
          $user = App\User::create([
              'name' => 'Hikmet',
              'email' => 'hikmetkutuk@email.com',
              'password' => bcrypt('19051905'),
              'admin' => 1
          ]);

          App\Profile::create([
              'user_id' => $user->id,
              'avatar' => 'uploads/avatars/user.png',
              'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
              'instagram' => 'instagram.com',
              'youtube' => 'youtube.com'
          ]);
    }
}
