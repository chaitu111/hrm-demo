<?php

class Payroll extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];


	// Don't forget to fill this array
	protected $fillable =   [];

    protected $table    =   'attendance';
    protected $guarded  =   ['id'];


    public static  function absentEveryEmployee()
    {
        $employees            =   Employee::where('status','=','active')->get();
	    $absentess            =   [];
        foreach($employees  as $employee)
        {		
			$Absent           =   Attendance::select('*')
		                                  ->where('status','=','absent')
		                                  ->where('employeeID','=',$employee->employeeID)
										  //->groupBy('leaveType')
		                                  ->get()->toArray();;
										  
			//echo '<pre>'; print_r($Absent); echo '</pre>';					  
            //  Total of All leaves
            //$absentess[$employee->employeeID]['total']    =   array_sum($absentess[$employee->employeeID]);
			
			 foreach($Absent as $Abs)
			 {
			    $absentess[$employee->employeeID][$Abs->leaveType] = $Abs->leaveType;
				//$absentess[$employee->employeeID][$Abs->leaveType]['count'] = count($absentess[$employee->employeeID][$Abs->leaveType]);
		     } 
        }
        return $absentess;
    }
}