<?php

class DashboardController extends \BaseController {

	public function __construct()
    {

        parent::__construct();
        $this->data['pageTitle']   =   'Dashboard';

        $this->data['employeeID']  =   Auth::employees()->get()->employeeID;

	    $this->data['leaveTypes']  =    Attendance::leaveTypesEmployees();
	    $this->data['leaveTypeWithoutHalfDay']   =   Attendance::leaveTypesEmployees('halfday');
//        Total leaves except
	    $total_leave    =   Leavetype::where('leaveType','<>','half day')->sum('num_of_leave');

        $this->data['leaveLeft']   =    array_sum(Attendance::absentEmployee($this->data['employeeID'])).'/'.$total_leave;
        $this->data['employee']    =    Employee::find(Auth::employees()->get()->id);
        $this->data['holidays']    =    Holiday::orderBy('date','ASC')->remember(10,'holiday_cache')->get();
        $this->data['awards']      =    Award::select('*')->orderBy('created_at','desc')->get();
        $this->data['attendance']  =    Attendance::where('employeeID', '=',$this->data['employeeID'])
                                                        ->where(function($query)
                                                        {
                                                            $query->where('application_status','=','approved')
                                                                  ->orWhere('application_status','=',null)
                                                                  ->orWhere('status','=','present');
                                                        })
                                                    ->get();
        $this->data['attendance_count']   = Attendance::attendanceCount($this->data['employeeID']);

        $this->data['current_month_birthdays']   = Employee::currentMonthBirthday();



    }



	public function index()
	{
        $this->data['homeActive']         =    'active';

        $this->data['noticeboards']       =     Noticeboard::where('status','=','active')->orderBy('created_at','DESC')->get();

        $this->data['holiday_color']      = ['info','error','success','pending',''];
        $this->data['holiday_font_color'] = ['blue','red','green','yellow','dark'];


        return View::make('front.employeeDashboard',$this->data);
	}

//	show leave Page
	public function leave()
	{
        $this->data['leaveActive'] =    'active';

        $this->data['attendance']         = Attendance::where('employeeID', '=',  $this->data['employeeID'] )->get();

        return View::make('front.leave',$this->data);
	}


	public function  notice_ajax($id)
	{
        $notice                   =    Noticeboard::find($id);
        $output['title']          =   $notice->title;
        $output['description']    =   $notice->description;

        return Response::json($output,200);
	}

    //	Submitting the leave request from Employee
	public function leave_store()
    {

        $input = Input::all();

        if ($input['date'][0] == '') {
            Session::flash('error_leave', ['<strong>Error!</strong> Please select the date']);
            return Redirect::route('front.leave');
        }

        foreach ($input['date'] as $index => $value) {
            if (empty($value)) continue;
            try {

                Attendance::create([
                    'employeeID' => $this->data['employeeID'],
                    'date' => date('Y-m-d', strtotime($value)),
                    'status' => 'absent',
                    'leaveType' => $input['leaveType'][$index],
                    'halfDayType' => ($input['leaveType'][$index]=='half day')?$input['halfleaveType'][$index]:null,
                    'reason' =>   $input['reason'][$index],
                    'application_status' => 'pending',
                    'applied_on' => date('Y-m-d', time())
                ]);

                $this->data['dates'][$index] = date('d-M-Y', strtotime($value));
                $this->data['leaveType'][$index] = $input['leaveType'][$index];
                $this->data['reason'][$index] = $input['reason'][$index];

            } catch (Exception $e) {

                Session::flash('error_leave', ['<strong>Error!</strong> You have already applied leave for the particular date']);
                return Redirect::route('front.leave');
            }

        }

//        Send email to all admins
        $admins = Admin::select('email')->get()->toArray();
        foreach ($admins as $admin){
            Mail::send('emails.leave_request', $this->data, function ($message) use ($admin) {
                $message->from(Auth::employees()->get()->email, Auth::employees()->get()->fullName);
                $message->to($admin['email'])
                    ->subject('Leave Request - ' . $this->data['setting']->website);
            });
        }
        Session::flash('success_leave','<strong>Success!</strong> Leave request is send to the HR Manger.You will be notified soon.');
        return Redirect::route('front.leave');


    }


    //Datatable ajax request
    public function ajaxApplications()
    {

        $result = Attendance::select('id','date','leaveType','reason','applied_on','application_status','halfDayType')
            ->where('employeeID','=',$this->data['employeeID'])
            ->whereNotNull('application_status')
            ->orderBy('applied_on','desc');

        return Datatables::of($result)
            ->edit_column('date',function($row){
                return date('d-M-Y',strtotime($row->date));
            })
            ->edit_column('applied_on',function($row){
                return date('d-M-Y',strtotime($row->applied_on));
            })
	        ->edit_column('leaveType',function($row){
		        $leave = ($row->leaveType=='half day')?$row->leaveType.'-'.$row->halfDayType:$row->leaveType;
		        return $leave;
	        })
            ->edit_column('reason',function($row){
	            return    strip_tags(Str::limit($row->reason,50));

            })
            ->edit_column('application_status',function($row)
            {
                $color = [
                    'pending'   =>  'warning',
                    'approved'  =>  'success',
                    'rejected'  =>  'danger'
                ];

                return "<span class='label label-{$color[$row->application_status]}'>{$row->application_status}</span>";
            })
	        ->remove_column('halfDayType')
            ->add_column('edit', '
                        <button  class="btn-u btn-u-blue" data-toggle="modal" data-target=".show_notice" onclick="show_application({{ $id }});return false;" ><i class="fa fa-eye"></i> View</button>
                         ')
            ->make();
    }

	public  function changePasswordModal()
	{
		return View::make('front.change_password_modal',$this->data);
	}


    public function change_password()
    {

        $validator = Validator::make($input = Input::all(), Employee::rules('password'));

        if ($validator->fails())
        {
            $output['status']   =   'error';
            $output['msg']      =   $validator->getMessageBag()->toArray();

        }else{

            $employee = Employee::find(Auth::employees()->get()->id);
            $employee->password =   Hash::make($input['password']);
            $employee->save();
            //        Send change password email
            Mail::send('emails.changePassword', $this->data, function($message)
            {
                $message->from($this->data['setting']->email, $this->data['setting']->name);

                $message->to(Auth::employees()->get()->email, Auth::employees()->get()->fullName)
                    ->subject('Change Password - '.$this->data['setting']->website);
            });

            $output['status']   =   'success';
            $output['msg']      =   '<strong>Success ! </strong>Password changed successfully';
        }


        return Response::json($output,200);


    }

// Ajax leave application view show
    public function show($id)
    {

        $this->data['leave_application']    =   Attendance::find($id);
       return View::make('front.leave_modal_show',$this->data);
    }



}