<?php

class UsersController extends \BaseController {


	public function getIndex(){
		//returen Response::make("Hello");
		//return Response::json(array('name' => 'Steve', 'state' => 'CA'));
		//return Response::json(User::all(array("id",'name')));
		//$users = User::paginate(5);
		//return View::make("users.index")->with('users',$users);

		return UserTest::paginate(5);
		
	}

	public function postCreate(){

		//print_r(Input::all());
		if(Input::has('email','name')){
			/*User::create(array(
				'name' => Input::get('name'),
				'email'=>Input::get('email')
				));*/
			$user = new UserTest ;
			$user->name = Input::get("name");
			$user->email = Input::get("email");
			$user->save();
			return Response::json(array('success' =>true));
		}
		//print_r(Input::get());
		//print_r($_GET);
	}

	public function deleteDelete($id){

		$user = UserTest::find($id);

		$user->delete();
		return Response::json(array('success' =>true));
	}

	public function postUpdate(){
		if(Input::has('email','name','id')){
			$user = UserTest::find(Input::get("id")) ;
			$user->name = Input::get("name");
			$user->email = Input::get("email");
			$user->save();
			return Response::json(array('success' =>true));
		}
		//print_r(Input::get());
		//print_r($_GET);
	}

	// /**
	//  * Display a listing of the resource.
	//  *
	//  * @return Response
	//  */
	// public function index()
	// {
	// 	//
	// }

	// /**
	//  * Show the form for creating a new resource.
	//  *
	//  * @return Response
	//  */
	// public function create()
	// {
	// 	//
	// }

	// /**
	//  * Store a newly created resource in storage.
	//  *
	//  * @return Response
	//  */
	// public function store()
	// {
	// 	//
	// }

	// /**
	//  * Display the specified resource.
	//  *
	//  * @param  int  $id
	//  * @return Response
	//  */
	// public function show($id)
	// {
	// 	//
	// }

	// /**
	//  * Show the form for editing the specified resource.
	//  *
	//  * @param  int  $id
	//  * @return Response
	//  */
	// public function edit($id)
	// {
	// 	//
	// }

	// /**
	//  * Update the specified resource in storage.
	//  *
	//  * @param  int  $id
	//  * @return Response
	//  */
	// public function update($id)
	// {
	// 	//
	// }

	// /**
	//  * Remove the specified resource from storage.
	//  *
	//  * @param  int  $id
	//  * @return Response
	//  */
	// public function destroy($id)
	// {
	// 	//
	// }

}