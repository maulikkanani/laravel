<?php

// app/database/seeds/UserTableSeeder.php


class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'name'     => 'Chris Sevilleja',
			'username' => 'sevilayha',
			'email'    => 'chris@scotch.io',
			'password' => Hash::make('awesome'),
		));
                User::create(array(
			'name'     => 'Maulik kanai',
			'username' => 'test',
			'email'    => 'chris@scotch.io',
			'password' => Hash::make('test'),
		));
	}

}