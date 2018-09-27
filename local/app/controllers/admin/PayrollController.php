<?php
/*
 * Attendance Controller of Admin Panel
 */
class PayrollController extends \AdminBaseController {


    public function __construct()
    {
        parent::__construct();
        $this->data['payrollOpen']     = 'active open';
        $this->data['pageTitle']       =      'Payroll';
    }


/*
 * This is the view page of attendance.
 */
	public function index()
	{
		//$this->data['attendances']          =   Attendance::all();
        //$this->data['viewAttendanceActive'] =   'active';
        //$this->data['date']     = date('Y-m-d');
        //$this->data['employees']            =   Employee::where('status','=','active')->get();
        //$this->data['leaves'] = PayRoll::absentEveryEmployee();
	
		// Office Working Hours
		$offc_in_time    =  strtotime('09.30 AM'); 
		$offc_out_time   =  strtotime('06.00 PM'); 
		
		$date           =   date('d');
        $month          =   date('m');
        $year           =   date('Y');
		

		$employees            =   Employee::where('status','=','active')->get();
	    $absentess            =   [];
		
        foreach($employees  as $employee)
        {		
			
			$Absent           =   Attendance::select('*')
											->where('status','=','absent')
											->where('employeeID','=',$employee->employeeID)
											->where('YEAR(date)','=',$year)
											->where('MONTH(date)','=',$month)
											->get();
											
			$Present          =   Attendance::select('*')
		                                  ->where('status','=','present')
		                                  ->where('employeeID','=',$employee->employeeID)
										  ->where('YEAR(date)','=',$year)
										  ->where('MONTH(date)','=',$month)
		                                  ->get();
										  							          
			 foreach($Absent as $Abs)
			 {
			    $absentess[$employee->employeeID][$Abs->leaveType][] = $Abs->leaveType;
		     }
			 
			 foreach($Present as $Prs)
			 {
			    if($offc_in_time < strtotime($Prs->in_time.' AM'))
				{
					$absentess[$employee->employeeID]['Late'][] = $Prs->in_time;
				} 
				
				//echo $offc_in_time.'====='.strtotime($Prs->in_time.' AM').'======';	
		     } 
        }
		echo '<pre>'; print_r($absentess); echo '</pre>';		
		//echo '<pre>'; print_r($this->data['leaves']); echo '</pre>';
		//return View::make('admin.payroll.index', $this->data);
	}
	
	/**
	 * Remove the specified attendance from storage.
	 */
	public function destroy($id)
	{
		Attendance::destroy($id);
		return Redirect::route('admin.payroll.index');
	}
}
