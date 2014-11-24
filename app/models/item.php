<?php

class Item extends Eloquent{



	public function mark($name){

		// $this->done = $this->done ? false : true;
		$this->name = $name;
		$this->save();
	}

	
}