@extends('admin.adminlayouts.adminlayout')

@section('head')


@stop

@section('mainarea')

			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			    {{$pageTitle}}
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="{{route('admin.dashboard.index')}}">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="{{route('admin.leavetypes.index')}}">LeaveTypes</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Leave Types</a>
					</li>
				</ul>
			
			</div>
			<!-- END PAGE HEADER-->

			 <div id="load">
                        {{--INLCUDE ERROR MESSAGE BOX--}}
                               @include('admin.common.error')
                       {{--END ERROR MESSAGE BOX--}}
                   </div>
			<!-- BEGIN PAGE CONTENT-->

			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->

                   <a class="btn green" data-toggle="modal" href="#static">
									Add New Leave Type
                    <i class="fa fa-plus"></i> </a>

                         <hr>
					<div class="portlet box blue">

						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-users"></i>LeaveTypes List
							</div>
							<div class="tools">
							</div>
						</div>

						<div class="portlet-body">
					<div class="note note-info">
							<p>
								{{Lang::get('messages.noteLeaveTypes')}}
							</p>
					</div>
							<table class="table table-striped table-bordered table-hover" >
							<thead>
							<tr>
								<th> # </th>
								<th> Leave </th>
								<th> Number of Leaves </th>
								<th> Action </th>

							</tr>
							</thead>
							<tbody>
					
                        @foreach ($leaveTypes as $leaveType)
                            <tr id="row{{ $leaveType->id }}">
                                <td> {{ $leaveType->id }}</td>
                                <td> {{ $leaveType->leaveType }}</td>
                                <td> {{ $leaveType->num_of_leave }}</td>


                                <td class="">
                                    <a class="btn purple" data-toggle="modal" href="#edit_static" onclick="showEdit({{$leaveType->id}},'{{ $leaveType->leaveType }}','{{ $leaveType->num_of_leave }}')">
                                        <i class="fa fa-edit"></i> View/Edit
                                    </a>
                                    <a class="btn red" href="javascript:;"
                                      onclick="del({{$leaveType->id}},'{{ $leaveType->leaveType }}')"><i class="fa fa-trash"></i> Delete</a>
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

    {{-------------------------- Add MODALS -----------------}}

         			<div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h4 class="modal-title"><strong>Leave</strong></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="portlet-body form">

                                                                						<!-- BEGIN FORM-->
                                    {{Form::open(array('route'=>"admin.leavetypes.store",'class'=>'form-horizontal ','method'=>'POST'))}}


                                        <div class="form-body">

                                            <div class="form-group">
                                                 <div class="col-md-6">
                                                    <input class="form-control form-control-inline input-medium date-picker" name="leaveType" type="text" value="" placeholder="LeaveType"/>

                                                 </div>
                                            <div class="col-md-6">
                                                    <input class="form-control form-control-inline input-medium date-picker" name="num_of_leave" type="text" value="" placeholder="Number of leaves in a year"/>

                                                 </div>
                                            </div>



                                     </div>

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" data-loading-text="Submitting..." class="demo-loading-btn btn green"><i class="fa fa-check"></i> Submit</button>

                                            </div>
                                        </div>
                                    </div>
                                        {{ Form::close() }}
                                     <!-- END FORM-->
                                 </div>
                                        </div>
                                        <!-- END EXAMPLE TABLE PORTLET-->
                         </div>

                      </div>
                     </div>
                    </div>

{{--------------------------   End Add MODALS ------------------}}


{{--------------------------EDIT MODALS-----------------}}

             			<div id="edit_static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title"><strong><i class="fa fa-edit"></i> Edit LeaveTypes</strong></h4>
                                            </div>
                                            <div class="modal-body">
                                        <div class="portlet-body form">

                                                        <!-- BEGIN FORM-->


                                    {{ Form::open(['method' => 'PATCH', 'class'=>'form-horizontal','id'=>'edit_form']) }}

                                        <div class="form-body">


                                              <div class="form-group">
                                                  <div class="col-md-6">
                                                     <input class="form-control form-control-inline " name="leaveType" id="edit_leaveType" type="text" value="" placeholder="LeaveType" />
                                                  </div>
                                                  <div class="col-md-6">
                                                       <input class="form-control form-control-inline " name="num_of_leave" id="edit_num_of_leave" type="text" value="" placeholder="Number Of Leave" />
                                                    </div>
                                             </div>
                                     </div>

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" data-loading-text="Updating..." class="demo-loading-btn btn green"><i class="fa fa-edit"></i> Update</button>

                                            </div>
                                        </div>
                                    </div>
                                        {{ Form::close() }}
                                     <!-- END FORM-->
                                 </div>
                                        </div>
                                        <!-- END EXAMPLE TABLE PORTLET-->
                            </div>

                        </div>
                    </div>
                    </div>

  {{------------------------EDIT MODALS---------------------}}



			{{--DELETE MODAL CALLING--}}
                            @include('admin.common.delete')
             {{--DELETE MODAL CALLING END--}}

@stop


@section('footerjs')



	<script>
	function del(id,name)
    		{

    			$('#deleteModal').appendTo("body").modal('show');
    			$('#info').html('Are you sure ! You want to delete <strong>'+name+'</strong> ??');
    			$("#delete").click(function()
    			{
    				var url = "{{ route('admin.leavetypes.destroy',':id') }}";
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
    		                 	 		$("html, body").animate({ scrollTop: 0 }, "slow");
    		                  	   		$('#deleteModal').modal('hide');
    		                 	  		$('#row'+id).closest('tr').remove();
    		                 	  		$('#load').html("<p class='alert alert-success text-center'><strong>"+name +"</strong> Successfully Deleted</p>");
    		                  	 }
    		           		 });
    				})

    			}
   function showEdit(id,leaveType,num)
    {
    	var url = "{{ route('admin.leavetypes.update',':id') }}";
    	url = url.replace(':id',id);
//        Change action of the Edit
            $('#edit_form').attr('action',url );
            $("#edit_leaveType").val(leaveType);
            $("#edit_num_of_leave").val(num);

    }
</script>
@stop
	