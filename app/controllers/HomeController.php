<?php

class HomeController extends BaseController {
	/*public function getIndex()
	{
		return View::make('bbb');
	}*/

	public function getIndex()
	{
		

		$items = Auth::user()->items;
		return View::make('home',array(

				'items'=>$items
			));
	}

	public function postIndex()
	{
		$id= Input::get('id');
		$name= Input::get('item_name'.$id);
		$userId=Auth::user()->id;
		$item = Item::findOrFail($id);
		if($item->owner_id==$userId)
		{
			$item->mark($name);
		}
		return Redirect::route('home');
		
	}

	public function getdone( $id)
	{
		$userId=Auth::user()->id;
		$item = Item::findOrFail($id);
		$item->done = true;
		$item->save();
		return Redirect::route('home');	
	}


	public function getnew(){
		return View::make('new');
	}


	public function postnew(){
	$roles = array('name'=>'required|min:3|max:200');
	$validator = Validator::make(Input::all(),$roles);
	$userid=Auth::user()->id;
	if($validator->fails()){
		return Redirect::route('new')->withErrors($validator);
	}
	$item = new Item;
	$item->name = Input::get('name');

	$item->owner_id=$userid;
	$item->save();
	return Redirect::route('home');
	}

	public function getdelete(Item $task){
		if($task->owner_id == Auth::user()->id){
		$task->delete();	
		}
		
		return Redirect::route('home');
	}
	public function getregister(){
		return View::make('register');

	}

	public function postregister(){
		/*$roles = array('name'=>'required|min:3|max:200');
	$validator = Validator::make(Input::all(),$roles);
	if($validator->fails()){
		return Redirect::route('register')->withErrors($validator);
	}*/
	$user = new User;
	$user->name=Input::get('username');
	$user->password=Hash::make(Input::get('password'));
	$user->email=Input::get('email');
	$user->save();
	return Redirect::route('login');

		
	}

	public function getlogout(){
		Auth::logout();
		return Redirect::route('home');
	}




}
