<?php

class StickyController extends \BaseController {

    protected $layout="layouts.main";
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{       
                $results=Sticky::where('user_id','=', Auth::user()->id)->orderBy('id', 'DESC')->get();
		$this->layout->content=View::make('sticky.show') 
                                       ->with('results',$results);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function showsticky()
	{
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function addnew()
	{
                $sticky=new Sticky;
                $sticky->sitck_data='';
                $sticky->user_id= Auth::user()->id;
                $sticky->save();
                $stickid=$sticky->id;
                return View::make('sticky.add')
                                     ->with('stickid', $stickid);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
                $sticky = Sticky::find(Input::get('id'));
		$sticky->sitck_data=Input::get('data');
                $sticky->save();
                exit;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
            Sticky::destroy(Input::get('id'));
            return Input::get('id');
	}

}