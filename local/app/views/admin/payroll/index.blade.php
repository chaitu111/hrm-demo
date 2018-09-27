@extends('admin.adminlayouts.adminlayout')

@section('head')
	<!-- BEGIN PAGE LEVEL STYLES -->
	{{HTML::style("assets/global/plugins/bootstrap-datepicker/css/datepicker3.css")}}
	{{HTML::style("assets/global/plugins/select2/select2.css")}}
	{{HTML::style("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css")}}
	<!-- END PAGE LEVEL STYLES -->
@stop


@section('mainarea')

			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			{{$pageTitle}} <small>Employee List</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="{{route('admin.dashboard.index')}}">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="{{route('admin.attendances.index')}}">Payroll</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Payroll</a>
					</li>
				</ul>
			
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->

			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div id="load">

                            @if(Session::get('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif

                    </div>

                    <div class="row">
                                   <div class="col-md-3">

                             {{Form::open(['route'=>["admin.attendances.create"],'class'=>'form-horizontal','method'=>'GET'])}}

                                    <div class="input-group input-medium date date-picker"   data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                           <input type="text" class="form-control" name="date" readonly placeholder="select Date">
                                           <span class="input-group-btn">
                                           <button data-loading-text="Redirecting..." class="demo-loading-btn btn blue" type="submit"><i class="fa fa-calendar"></i> Edit</button>
                                           </span>
                                       </div>
                                     {{Form::close()}}

                                         </div>
                                   <div class="col-md-offset-6 col-md-3 ">

                                    <a href="{{route('admin.attendances.create')}}" data-loading-text="Redirecting..." class="demo-loading-btn btn green">
                                         Mark Todays Payroll <i class="fa fa-plus"></i>
                                         </a>


                                    </div>


                       </div>


                         <hr>
					<div class="portlet box blue">

						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-users"></i>Payroll Summary
							</div>
							<div class="tools">
							</div>
						</div>

						<div class="portlet-body">

							<table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
							<tr>
								<th> EmployeeID </th>
								<th class="text-center"> Image </th>
								<th> Name </th>
								<th> Leaves </th>
								<th> Salary </th>
								<th> Status</th>
								<th> Action </th>
							</tr>
							</thead>
							<tbody>
					
                        @foreach ($employees as $employee)
                            <tr id="row{{ $employee->employeeID }}">
                                <td> {{ $employee->employeeID }}</td>
                                <td class="text-center"> {{HTML::image("/profileImages/{$employee->profileImage}",'ProfileImage',['height'=>'100px'])}} </td>
                                <td> {{ $employee->fullName }} </td>

                                 <td>
                                 <ul>
                                 <table width="80%">
                                  @foreach($leaves[$employee->employeeID] as $index=>$leave)
                                 <tr>
                                 	<td ><strong> {{ucfirst($index)}}</strong>: </td>
                                 	<td > {{ $leave }} </td>
                                 </tr>
                                 @endforeach
                                 </table>
                                  {{--@foreach($leaves[$employee->employeeID] as $index=>$leave)--}}

                                     {{--<li> <strong>{{ucfirst($index)}}</strong>:  {{ $leave }}</li>--}}

                                  {{--@endforeach--}}
                                   </ul>
                                  </td>
								  
								<td> saaa </td>
								
                                <td>
                                    @if($employee->status=='active')
                                        <span class="label label-sm label-success"> {{ $employee->status }} </span>
                                    @else
                                        <span class="label label-sm label-danger"> {{ $employee->status }} </span>
                                     @endif
                                </td>
                                <td class="">
                                    <a class="btn purple" href="{{route('admin.attendances.show',$employee->employeeID) }}">
                                        <i class="fa fa-eye"></i> View
                                    </a>
                                   </td>
                            </tr>
                        @endforeach
							
					
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
					
				</div>
			</div>
			<!-- END PAGE CONTENT-->

			{{--DELETE MODAL CALLING--}}
                            @include('admin.common.delete')
             {{--DELETE MODAL CALLING END--}}

@stop


@section('footerjs')

<!-- BEGIN PAGE LEVEL PLUGINS -->
	{{ HTML::script("assets/global/plugins/select2/select2.min.js")}}
	{{ HTML::script("assets/global/plugins/datatables/media/js/jquery.dataTables.min.js")}}
	{{ HTML::script("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js")}}
    {{ HTML::script("assets/admin/pages/scripts/table-managed.js")}}
    {{HTML::script("assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js")}}
    {{HTML::script("assets/admin/pages/scripts/components-pickers.js")}}

<!-- END PAGE LEVEL PLUGINS -->

	<script>
	jQuery(document).ready(function() {
        ComponentsPickers.init();
	   TableManaged.init();
	});
	</script>

@stop
	