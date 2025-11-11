<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


//このファイル内でDB::記法を使えるようにする
use Illuminate\Support\Facades\DB;

//このファイル内でHashクラスを使えるようにする
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //初期ユーザーのデータを登録
        DB::table('users')->insert([
            ['username' => 'Nao',
            'email' => 'abc@gmail.com',
            'password' => Hash::make('password123')],
        ]);
    }
}
