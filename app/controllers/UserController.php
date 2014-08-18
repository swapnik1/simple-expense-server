<?php

class UserController extends \BaseController {

	protected $user;

	public function __construct(User $user){
		$this->user = $user;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return User::all();
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(){
		$input = Input::all();
		if(!$this->user->fill($input)->isValid()){
			// Invalid user
			return null;
		}

		// hash password
		$input['password'] = Hash::make($input['password']);
		
		// Refill attributes with updated input
		$this->user->fill($input);

		// Save the user to database
		$this->user->save();
		
		return $this->user;
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return User::findOrFail($id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);
	}


}
