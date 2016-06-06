<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);

        Model::reguard();
    }
}

class UserTableSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

            DB::table('users')->insert([
                array(
                    'name'=>'Nguyễn Huy Hoàng', 
                    'email'=>'huyhoang1194@gmail.com', 
                    'password'=>bcrypt('123456'), 
                    'role_id'=>'1', 
                    'key_active'=>'1'
                )]);
        Model::reguard();
    }
}
