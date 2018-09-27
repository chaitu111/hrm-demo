<?php

class AdminBaseController extends Controller {

    protected  $data = [];


    public function __construct()
    {

        $this->data['setting']      = Setting::all()->first();

	    if(!isset($this->data['setting']) && count($this->data['setting'])==0){
		    die('Database not uploaded.Please Upload the database');
	    }
	    if(count($this->data['setting'])){

	    }
	    $this->data['loggedAdmin']  = Auth::admin()->get();
	    $this->data['pending_applications']   = Attendance::where('application_status','=','pending')->get();

    }


	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
