<?php
class ItemsTableSeeder extends Seeder{
	public function run(){
		DB::table('items')->delete();


		$items=array(
			array(
					'owner_id'=>2,
					'name'=>'make milk',
					'done'=>false
				),
			array(
					'owner_id'=>2,
					'name'=>'go out side',
					'done'=>true
				),
			array(
					'owner_id'=>3,
					'name'=>'eat meat',
					'done'=>false
				),
			array(
					'owner_id'=>3,
					'name'=>'call sami',
					'done'=>true
				),
			array(
					'owner_id'=>3,
					'name'=>'see the sea',
					'done'=>false
				),
			 );
		DB::table('items')->insert($items);
	}
}