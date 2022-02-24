<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new User([
        'name' => 'Metin ERBEK',
        'email' => 'metinerbek@yopmail.com',
        'password' => Hash::make('123123'),
      ]);
      $user->save();

      /*
      DB::table('users')->insert([
          'name' => 'Metin ERBEK',
          'email' => 'metinerbek@yopmail.com',
          'password' => Hash::make('123123'),
      ]);
      */

    }
}
