<?php

class UserExpenseController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Expense::all();
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		return "In Create".$id;
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($user_id)
	{
		$user = User::findOrFail($user_id);
		
		$input = Input::all();
		
		if(!$this->expense->fill($input)->isValid()){
			// Error
			return null;
		}

		$user->expenses()->save($this->expense);
		
		return $this->expense;
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Expense::findOrFail($id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Expense::destroy($id);
	}


}
