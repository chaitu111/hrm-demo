@extends('admin.adminlayouts.adminlayout')

@section('head')

	<!-- BEGIN PAGE LEVEL STYLES -->
	{{HTML::style('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}
	{{HTML::style('assets/global/plugins/bootstrap-datepicker/css/datepicker3.css')}}
	<!-- END PAGE LEVEL STYLES -->
@stop


@section('mainarea')

        			<!-- BEGIN PAGE HEADER-->
<h3 class="page-title" xmlns="http://www.w3.org/1999/html">
        			Employee Details
        			</h3>
        			<div class="page-bar">
        				<ul class="page-breadcrumb">
        					<li>
        						<i class="fa fa-home"></i>
        						<a href="index.html">Home</a>
        						<i class="fa fa-angle-right"></i>
        					</li>
        					<li>
        						<a href="{{route('admin.employees.index')}}">Employees</a>
        						<i class="fa fa-angle-right"></i>
        					</li>
        					<li>
                                <a href="">Edit Employee </a>

                            </li>
        				</ul>
        			</div>
        			<!-- END PAGE HEADER-->
        			<div class="clearfix">
        			</div>
        			<div class="row ">
        				<div class="col-md-6 col-sm-6">
        					<div class="portlet box purple-wisteria">
        						<div class="portlet-title">
        							<div class="caption">
        								<i class="fa fa-calendar"></i>Personal Details
        							</div>
        							<div class="actions">

        								<a href="javascript:;"  onclick="$('#personal_details_form').submit();" data-loading-text="Updating..."  class="demo-loading-btn btn btn-sm btn-default ">
        								<i class="fa fa-save" ></i> Save </a>
        							</div>
        						</div>


        						<div class="portlet-body">


                                {{--------------------Personal Info Form--------------------------------------------}}

        							{{Form::open(['method' => 'PATCH','route'=> ['admin.employees.update', $employee->employeeID],'class'   =>  'form-horizontal','id'  =>  'personal_details_form','files'=>true])}}
        							<input type="hidden" name="updateType" class="form-control" value="personalInfo">

                                     @if(Session::get('successPersonal'))
                                            <div class="alert alert-success"><i class="fa fa-check"></i> {{ Session::get('successPersonal') }}</div>
                                     @endif


                                      @if (Session::get('errorPersonal'))

                                             <div class="alert alert-danger alert-dismissable ">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                 @foreach (Session::get('errorPersonal') as $error)
                                                     <p><strong><i class="fa fa-warning"></i></strong> {{ $error }}</p>
                                                 @endforeach
                                             </div>
                                      @endif




        								<div class="form-body">
                            <div class="form-group ">
        										<label class="control-label col-md-3">Photo</label>
        										<div class="col-md-9">
        											<div class="fileinput fileinput-new" data-provides="fileinput">
        												<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
        												 {{HTML::image("/profileImages/{$employee->profileImage}",'ProfileImage')}}
                                                         <input type="hidden" name="hiddenImage" value="{{$employee->profileImage}}">
        												</div>
        												<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
        												</div>
        												<div>
        													<span class="btn default btn-file">
        													<span class="fileinput-new">
        													Select image </span>
        													<span class="fileinput-exists">
        													Change </span>
        													<input type="file" name="profileImage">
        													</span>
        													<a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
        													Remove </a>
        												</div>
        											</div>

        											<div class="clearfix margin-top-10">
                                                            <span class="label label-danger">
                                                            NOTE! </span> Image Size must be (872px by 724px)

                                                        </div>
        											</div>
        										</div>
        									<div class="form-group">
        										<label class="col-md-3 control-label">Name<span class="required">* </span></label>
        										<div class="col-md-9">
        											<input type="text" name="fullName" class="form-control" value="{{$employee->fullName}}">
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="col-md-3 control-label">Father's Name</label>
        										<div class="col-md-9">
        											<input type="text" name="fatherName" class="form-control" value="{{$employee->fatherName}}">
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="control-label col-md-3">Date of Birth</label>
        										<div class="col-md-3">
        											<div class="input-group input-medium date date-picker"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
        												<input type="text" class="form-control" name="date_of_birth" readonly value="@if(empty($employee->date_of_birth))@else{{date('d-m-Y',strtotime($employee->date_of_birth))}}@endif" >
        												<span class="input-group-btn">
        												<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
        												</span>
        											</div>
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="col-md-3 control-label">Gender</label>
        										<div class="col-md-9">
        											<select class="form-control" name="gender">

        												<option value="male" @if($employee->gender=='male') selected @endif>Male</option>
        												<option value="female"  @if($employee->gender=='female') selected @endif>Female</option>
        											</select>
        										</div>
        									</div>

        									<div class="form-group">
        										<label class="col-md-3 control-label">Phone</label>
        										<div class="col-md-9">
        											<input type="text" name="mobileNumber" class="form-control" value="{{$employee->mobileNumber}}">
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="col-md-3 control-label">Address</label>
        										<div class="col-md-9">
        											<textarea name="localAddress" class="form-control" rows="3">{{$employee->localAddress}}</textarea>
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="col-md-3 control-label">Permanent Address</label>
        										<div class="col-md-9">
        											<textarea name="permanentAddress" class="form-control" rows="3">{{$employee->permanentAddress}}</textarea>
        										</div>
        									</div>
        									<h4><strong>Account Login</strong></h4>
        									<div class="form-group">
                                                    <label class="col-md-3 control-label">Email<span class="required">* </span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="email" class="form-control" value="{{$employee->email}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Password</label>
                                                    <div class="col-md-9">
                                                        <input type="hidden" name="oldpassword" value="{{$employee->password}}">
                                                        <input type="text" name="password" class="form-control">
                                                    </div>
                                                </div>
        								</div>
        							{{Form::close()}}
        						</div>
        					</div>
        				</div>
        				<div class="col-md-6 col-sm-6">
        					<div class="portlet box red-sunglo">
        						<div class="portlet-title">
        							<div class="caption">
        								<i class="fa fa-calendar"></i>Company Details
        							</div>
        							<div class="actions">
        								<a href="javascript:;" onclick="UpdateDetails('{{$employee->employeeID}}','company');return false" data-loading-text="Updating..." class="demo-loading-btn-ajax btn btn-sm btn-default ">
        								<i class="fa fa-save"></i> Save </a>
        							</div>
        						</div>
        						<div class="portlet-body">

        						{{--------------------Company Form--------------------------------------------}}
        							{{Form::open(['class'   =>  'form-horizontal','id'  =>  'company_details_form'])}}
        							<input type="hidden" name="updateType" class="form-control" value="company">
                                    <div id="alert_company">
                                                {{--INLCUDE ERROR MESSAGE BOX--}}
                                                   @include('admin.common.error')
                                                   {{--END ERROR MESSAGE BOX--}}
                                    </div>

        								<div class="form-body">
        									<div class="form-group">
        										<label class="col-md-3 control-label">Employee ID<span class="required">* </span></label>
        										<div class="col-md-9">
        											<input type="text" name="employeeID" class="form-control" readonly value="{{$employee->employeeID}}">
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="col-md-3 control-label">Department<span class="required">* </span></label>
        										<div class="col-md-9">
        											 {{ Form::select('department', $department,$designation->deptID,['class' => 'form-control select2me','id'=>'department','onchange'=>'dept();return false;']) }}
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="col-md-3 control-label">Designation<span class="required">* </span></label>
        										<div class="col-md-9">

        											 <select  class="select2me form-control" name="designation" id="designation" >

                                                     </select>
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="control-label col-md-3">Date of Joining</label>
        										<div class="col-md-3">
        											<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
        												<input type="text" class="form-control" name="joiningDate" readonly value="@if(empty($employee->joiningDate))00-00-0000 @else {{date('d-m-Y',strtotime($employee->joiningDate))}} @endif">
        												<span class="input-group-btn">
        												<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
        												</span>
        											</div>
        										</div>
        									</div>
        									<div class="form-group">
                                                    <label class="control-label col-md-3">Exit Date</label>
                                                    <div class="col-md-3">
                                                        <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                            <input type="text" class="form-control" name="exit_date" readonly value="@if(empty($employee->exit_date)) @else {{date('d-m-Y',strtotime($employee->exit_date))}} @endif">
                                                            <span class="input-group-btn">
                                                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                	<div class="form-group">
														<label class="control-label col-md-3">Status</label>
														<div class="col-md-3">
															   <input  type="checkbox" value="active" onchange="remove_exit();" class="make-switch" name="status" @if($employee->status=='active')checked	@endif data-on-color="success" data-on-text="Active" data-off-text="Inactive" data-off-color="danger">
														</div>
														<div class="col-md-6">
														  (<strong>Note:</strong>Status active will remove the exit date)
														</div>
													</div>

        									<hr>
        									<h4><strong>Salary  ( <i class="fa {{$setting->currency_icon}}"></i> )</strong></h4>

                                         @foreach($employee->getSalary as $salary)
                                         <div id="salary{{$salary->id}}">
                                              <div class="form-group" >
                                                    <div class="col-md-5">
                                                        <input type="text" class="form-control" name="type[{{$salary->id}}]" value="{{$salary->type}}">
                                                     </div>

                                                    <div class="col-md-5">
                                                        <input type="text" class="form-control" name="salary[{{$salary->id}}]" value="{{$salary->salary}}">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <a class="btn btn-sm red" onclick="del('{{$salary->id}}','{{$salary->type}}')"><i class="fa fa-trash"></i> </a>

                                                    </div>
                                                </div>
                                                </div>
                                         @endforeach
                                 <a class="" data-toggle="modal" href="#static">
                                         Add Salary
                                                <i class="fa fa-plus"></i> </a>
        								</div>
        							{{Form::close()}}


        							{{----------------Company Form end -------------}}

        						</div>
        					</div>

        					<div class="portlet box red-sunglo">
        						<div class="portlet-title">
        							<div class="caption">
        								<i class="fa fa-calendar"></i>Bank Account Details
        							</div>
        							<div class="actions">
        								<a href="javascript:;" onclick="UpdateDetails('{{$employee->employeeID}}','bank');return false" data-loading-text="Updating..."  class="demo-loading-btn-ajax btn btn-sm btn-default ">
        								<i class="fa fa-save"></i> Save </a>
        							</div>
        						</div>
        						<div class="portlet-body">

        						{{--------------------Bank Account Form--------------------------------------------}}
        							{{Form::open(['class'   =>  'form-horizontal','id'  =>  'bank_details_form'])}}
        							<input type="hidden" name="updateType" class="form-control" value="bank">

        							<div id="alert_bank"></div>
        								<div class="form-body">
        									<div class="form-group">
        										<label class="col-md-3 control-label">Account Holder Name</label>
        										<div class="col-md-9">
        											<input type="text" name="accountName" class="form-control" value="{{$bank_details->accountName or ''}}">
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="col-md-3 control-label">Account Number</label>
        										<div class="col-md-9">
        											<input type="text" name="accountNumber" class="form-control" value="{{$bank_details->accountNumber or ''}}">
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="col-md-3 control-label">Bank Name</label>
        										<div class="col-md-9">
        											<input type="text" name="bank" class="form-control" value="{{$bank_details->bank or ''}}">
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="col-md-3 control-label">IFSC Code</label>
        										<div class="col-md-9">
        											<input type="text" name="ifsc" class="form-control" value="{{$bank_details->ifsc or ''}}">
        										</div>
        									</div>

       									    <div class="form-group">
        										<label class="col-md-3 control-label">PAN Number</label>
        										<div class="col-md-9">
        											<input type="text" name="pan" class="form-control" value="{{$bank_details->pan or ''}}">
        										</div>
        									</div>

        									<div class="form-group">
        										<label class="col-md-3 control-label">Branch</label>
        										<div class="col-md-9">
        											<input type="text" name="branch" class="form-control" value="{{$bank_details->branch or '' }}">
        										</div>
        									</div>
        								</div>
        							{{Form::close()}}
        						{{-------------------Bank Account Form end-----------------------------------------}}


        						</div>
        					</div>
        				</div>
        			</div>
        			<div class="clearfix">
        			<div class="row ">
        				<div class="col-md-12 col-sm-12">
        					<div class="portlet box purple-wisteria">
        						<div class="portlet-title">
        							<div class="caption">
        								<i class="fa fa-calendar"></i>Documents
        							</div>
        							<div class="actions">
        								<button onclick="$('#documents_details_form').submit();"  data-loading-text="Updating..."  class="demo-loading-btn btn btn-sm btn-default ">
        								<i class="fa fa-save" ></i> Save </button>
        							</div>
        						</div>
        						<div class="portlet-body">
        							<div class="portlet-body">
                                {{--------------------Documents Info Form--------------------------------------------}}

                                    {{Form::open(['method' => 'PATCH','route'=> ['admin.employees.update', $employee->employeeID],'class'   =>  'form-horizontal','id'  =>  'documents_details_form','files'=>true])}}
                                    <input type="hidden" name="updateType" class="form-control" value="documents">

                                     @if(Session::get('successDocuments'))
                                            <div class="alert alert-success"><i class="fa fa-check"></i> {{ Session::get('successDocuments') }}</div>
                                     @endif

                                     @if(Session::get('errorDocuments'))
                                         <div class="alert alert-danger"><i class="fa fa-warning"></i> {{ Session::get('errorDocuments') }}</div>
                                     @endif

        								<div class="form-body">
        									<div class="form-group">
        										<label class="control-label col-md-2">Resume</label>
        										<div class="col-md-5">
        											<div class="fileinput fileinput-new" data-provides="fileinput">
        												<div class="input-group input-large">
        													<div class="form-control uneditable-input" data-trigger="fileinput">
        														<i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename">
        														</span>
        													</div>
        													<span class="input-group-addon btn default btn-file">
        													<span class="fileinput-new">
        													Select file </span>
        													<span class="fileinput-exists">
        													Change </span>
        													<input type="file" name="resume">
        													</span>
        													<a href="#" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
        													Remove </a>
        												</div>
        											</div>
        										</div>
        										<div class="col-md-3">
        										@if(isset($documents['resume']))
        											<a href="https://docs.google.com/viewer?url={{URL::to('employee_documents/resume/'.$documents['resume'])}}" target="_blank" class="btn purple">View Resume</a>
        										@endif
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="control-label col-md-2">Offer Letter</label>
        										<div class="col-md-5">
        											<div class="fileinput fileinput-new" data-provides="fileinput">
        												<div class="input-group input-large">
        													<div class="form-control uneditable-input" data-trigger="fileinput">
        														<i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename">
        														</span>
        													</div>
        													<span class="input-group-addon btn default btn-file">
        													<span class="fileinput-new">
        													Select file </span>
        													<span class="fileinput-exists">
        													Change </span>
        													<input type="file" name="offerLetter">
        													</span>
        													<a href="#" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
        													Remove </a>
        												</div>
        											</div>
        										</div>
        										<div class="col-md-3">
        										     @if(isset($documents['offerLetter']))
        											    <a href="https://docs.google.com/viewer?url={{URL::to('employee_documents/offerLetter/'.$documents['offerLetter'])}}" target="_blank" class="btn purple">Offer Letter</a>
        											@endif
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="control-label col-md-2">Joining Letter</label>
        										<div class="col-md-5">
        											<div class="fileinput fileinput-new" data-provides="fileinput">
        												<div class="input-group input-large">
        													<div class="form-control uneditable-input" data-trigger="fileinput">
        														<i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename">
        														</span>
        													</div>
        													<span class="input-group-addon btn default btn-file">
        													<span class="fileinput-new">
        													Select file </span>
        													<span class="fileinput-exists">
        													Change </span>
        													<input type="file" name="joiningLetter">
        													</span>
        													<a href="#" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
        													Remove </a>
        												</div>
        											</div>
        										</div>
        										<div class="col-md-3">
        										@if(isset($documents['joiningLetter']))
        											<a href="https://docs.google.com/viewer?url={{URL::to('employee_documents/joiningLetter/'.$documents['joiningLetter'])}}" target="_blank" class="btn purple">View Joining Letter</a>
        										@endif
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="control-label col-md-2">Contract and Agreement</label>
        										<div class="col-md-5">
        											<div class="fileinput fileinput-new" data-provides="fileinput">
        												<div class="input-group input-large">
        													<div class="form-control uneditable-input" data-trigger="fileinput">
        														<i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename">
        														</span>
        													</div>
        													<span class="input-group-addon btn default btn-file">
        													<span class="fileinput-new">
        													Select file </span>
        													<span class="fileinput-exists">
        													Change </span>
        													<input type="file" name="contract">
        													</span>
        													<a href="#" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
        													Remove </a>
        												</div>
        											</div>
        										</div>
        										<div class="col-md-3">
        										 @if(isset($documents['contract']))
        											<a href="https://docs.google.com/viewer?url={{URL::to('employee_documents/contract/'.$documents['contract'])}}" target="_blank"  class="btn purple">View Contract</a>
        										@endif
        										</div>
        									</div>
        									<div class="form-group">
        										<label class="control-label col-md-2">ID Proof</label>
        										<div class="col-md-5">
        											<div class="fileinput fileinput-new" data-provides="fileinput">
        												<div class="input-group input-large">
        													<div class="form-control uneditable-input" data-trigger="fileinput">
        														<i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename">
        														</span>
        													</div>
        													<span class="input-group-addon btn default btn-file">
        													<span class="fileinput-new">
        													Select file </span>
        													<span class="fileinput-exists">
        													Change </span>
        													<input type="file" name="IDProof">
        													</span>
        													<a href="#" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
        													Remove </a>
        												</div>
        											</div>
        										</div>
        										<div class="col-md-3">
        										@if(isset($documents['IDProof']))
        											<a href="https://docs.google.com/viewer?url={{URL::to('employee_documents/IDProof/'.$documents['IDProof'])}}" target="_blank"  class="btn purple">View ID Proof</a>
        										@endif
        										</div>
        									</div>
        								</div>
        							</form>

        						</div>
        					</div>
        				</div>
        			</div>
        			<div class="clearfix">
        			</div>
        		</div>

                         {{-------------DELETE MODAL CALLING------------}}
                            @include('admin.common.delete')
                        {{---------------DELETE MODAL CALLING END--------}}

{{------------------------------------NEW SALARY ADD MODALS--------------------------------}}

     			<div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title"><strong>New Salary</strong></h4>
                            </div>
                            <div class="modal-body">
                                <div class="portlet-body form">

                            <!-------------- BEGIN FORM------------>
                                {{Form::open(array('route'=>"admin.salary.store",'class'=>'form-horizontal ','method'=>'POST'))}}
                                <input   type="hidden" name="employeeID" value="{{$employee->employeeID}}"/>

                                    <div class="form-body">

                                        <div class="form-group">
                                             <div class="col-md-6">
                                                <input class="form-control form-control-inline" name="type" type="text" value="" placeholder="Type"/>
                                             </div>
										 </div>
										 <div class="form-group">
                                            <div class="col-md-6">
                                                <input class="form-control form-control-inline"  type="text" name="salary" placeholder="Salary"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" data-loading-text="Updating..."  class="demo-loading-btn btn green"><i class="fa fa-check"></i> Submit</button>

                                            </div>
                                        </div>
                                    </div>
                                    {{ Form::close() }}
                                 <!-- -----------END FORM-------->
                                </div>
                             </div>
                                    <!-- END EXAMPLE TABLE PORTLET-->
                        </div>

                        </div>
                    </div>
                </div>

 {{------------------------------------END NEW SALARY ADD MODALS--------------------------------------}}

@stop



@section('footerjs')


<!-- BEGIN PAGE LEVEL PLUGINS -->
    {{ HTML::script('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}
    {{ HTML::script("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js")}}
    {{ HTML::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}
    {{ HTML::script('assets/admin/pages/scripts/components-pickers.js')}}

<!-- END PAGE LEVEL PLUGINS -->




<script>
        jQuery(document).ready(function() {
           ComponentsPickers.init();
            dept();

        });


      function dept(){

                  $.getJSON("{{ route('admin.departments.ajax_designation')}}",
                  { deptID: $('#department').val() },
                  function(data) {
                       var model = $('#designation');
                             model.empty();
                       var selected='';
                       var match= {{ $employee->designation}};
                      $.each(data, function(index, element) {
                          if(element.id==match)selected='selected';
                          else selected='';
                          model.append("<option value='"+element.id+"' "+selected+">" + element.designation + "</option>");
                      });

                 });


            }

// Javascript function to update the company info and Bank Info
       function UpdateDetails(id,type){

           var  form_id = '';
           var alert_div = '';

            if(type=='bank')
            {
                form_id     = '#bank_details_form';
                alert_div   =  '#alert_bank'

            }else
            {
                form_id     = '#company_details_form';
                alert_div   =   '#alert_company';
            }
           $(alert_div).html('<div class="alert alert-info"><span class="fa fa-info"></span> Submitting..</div>');
					var url = "{{ route('admin.employees.update',':id') }}";
					url = url.replace(':id',id);
              $.ajax({
                             type: "PATCH",
                             url : url,
                             dataType: 'json',
                             data: $(form_id).serialize()

                     }).done( function( response ) {
                         $(alert_div).html('');
                         if(response.status == "success")
                         {
                               $(alert_div).html('<div class="alert alert-success alert-dismissable"><button class="close" data-close="alert"></button><span class="fa fa-check"></span> '+response.msg+'</div>');

                         }else if(response.status == "error")
                         {
							 var arr = response.msg;
							 var alert ='';
							 $.each(arr, function(index, value)
							 {
								 if (value.length != 0)
								 {
									alert += '<p><span class="fa fa-warning"></span> '+ value+ '</p>';

								 }
							 });

							 $(alert_div).append('<div class="alert alert-danger alert-dismissable"><button class="close" data-close="alert"></button> '+alert+'</div>');
                         }
                     });
       }

function del(id,type)
		{

            var alert_div   =   '#alert_company';
			$('#deleteModal').appendTo("body").modal('show');
			$('#info').html('Are you sure ! You want to delete <strong>'+type+'</strong> Salary??.');
			$("#delete").click(function()
			{
				var url = "{{ route('admin.salary.destroy',':id') }}";
				url = url.replace(':id',id);
			 $.ajax({

				type: "DELETE",
				url : url,
				dataType: 'json',
				data: {"id":id}

				}).done(function(response)
				  {
					 if(response.success == "deleted")
					 {
							$('#deleteModal').modal('hide');
							$('#salary'+id).remove();
							$(alert_div).html('<div class="alert alert-success alert-dismissable"><button class="close" data-close="alert"></button><span class="fa fa-check"></span> '+response.msg+'</div>');
					 }
				 });
			})

			}

	function remove_exit()
	{
		if($("input[name=status]:checked").val() == "active"){
			$("input[name=exit_date]").val("");
		}
	}


	$("input[name=exit_date]").change(function () {
	  $("input[name=status]").bootstrapSwitch('state',false);

	});
    </script>

@if(Session::get('successDocuments'))
    {{--Move to bottom of page if success comes from documents--}}
    <script>
            $("html, body").animate({ scrollTop: $(document).height() }, 2000);
    </script>
 @endif

@stop
