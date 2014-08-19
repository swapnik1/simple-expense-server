<?php

class UserExpenseController extends \BaseController {

	protected $expense;
	
	public function __construct(Expense $expense){
		$this->expense = $expense;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($user_id)
	{
		$user = User::findOrFail($user_id);
		return $user->expenses;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($user_id)
	{
		return View::make('expenses.create')->with(['user'=>$user_id]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($user_id)
	{
		$user = User::findOrFail($user_id);
		
		$input = Input::only('name','amount','description','occurred_at');

		if(!$this->expense->fill($input)->isValid()){
			// Error
			return $input;
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
	public function show($user_id,$id)
	{
		return Expense::findOrFail($id);
	}
	/**
	 * Updates an existing expense
	 * @param  int  $id
	 * @return Response
	 */
	public function update($user_id,$id){
		$this->expense = Expense::find($id);
		$input = Input::only('name','amount','description','occurred_at');
		if(!$this->expense->fill($input)->isValid()){
			// Error
			return $input;
		}
		$this->expense->save();
		return $this->expense;
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($user_id,$id)
	{
		Expense::destroy($id);
	}


}
