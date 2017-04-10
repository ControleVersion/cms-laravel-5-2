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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
		//reset the users
		DB::table('users')->truncate();
		
		//gerar um usuario de exemplo
		DB::table('users')->insert([
			[
				'name'=> 'Administrador',
				'email'=> 'robertomelo822@gmail.com',
				'password'=>bcrypt('123456')
			]
		]);
    }
}
