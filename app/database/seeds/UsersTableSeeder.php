<?php
class UsersTableSeeder extends Seeder{
	public function run(){
		DB::table('users')->delete();


		$users=array(
			array(
					'name'=>'Ahmad',
					'password'=>Hash::make('ahmad'),
					'email'=>'ahmad@ahmad.com'
				),
			array(
			 	'name' =>'muhamad' ,
			 	'passwrd'=>Hash::make('mohamad'),
			 	'email'=>'mohamad@mohamad.com'
			  ));
		DB::table('users')->insert($users);
	}
}