@extends('admin.adminlayouts.adminlayout')

@section('head')
	<!-- BEGIN PAGE LEVEL STYLES -->
	{{HTML::style("assets/global/plugins/select2/select2.css")}}
	{{HTML::style("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css")}}
	<!-- END PAGE LEVEL STYLES -->

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
						<a href="#">awards</a>
						<i class="fa "></i>
					</li>

				</ul>

			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->

									<div class="row">
                        				<div class="col-md-6">

				 <a class="btn green" data-toggle="modal" href="{{URL::to('admin/awards/create')}}">
                                        Add New Award
                <i class="fa fa-plus"></i> </a>
                                        </div>
                        				<div class="col-md-6 form-group text-right">

                        				<span id="load_notification"></span>
                        					 <input  type="checkbox"  onchange="ToggleEmailNotification('award_notification');return false;" class="make-switch" name="award_notification" @if($setting->award_notification==1)checked	@endif data-on-color="success" data-on-text="Yes" data-off-text="No" data-off-color="danger">
                        					<strong>Email Notification</strong><br>


                        				</div>
                                     </div>
                                     <hr>
			<div class="row">
				<div class="col-md-12">

					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div id="load">

					@if(Session::get('success'))
					    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

					</div>
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-trophy"></i>awards List
							</div>
							<div class="tools">
							</div>
						</div>

						<div class="portlet-body">


							<table class="table table-striped table-bordered table-hover" id="awards">
							<thead>
							<tr>
								<th> Hidden ID </th>
								<th> EmployeeID </th>
								<th> Awardee Name </th>
								<th> Award </th>
								<th> Gift </th>
								<th> Hidden Month </th>
								<th> For the Month </th>


								<th> Action </th>
							</tr>
							</thead>
							<tbody>
                        <tr >
                                <td>{{-- Hidden ID --}}</td>
                                <td>{{-- EmployeeID --}}</td>
                                <td>{{-- Awardee Name --}}</td>
                                <td>{{-- Award --}} </td>
                                <td>{{-- Gift --}}</td>
                                <td>{{-- HIdden Month --}}</td>
                                <td>{{-- Month --}}</td>

                                <td>{{-- Action --}} </td>
                            </tr>



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
  {{HTML::script("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js")}}
	{{ HTML::script("assets/global/plugins/datatables/media/js/jquery.dataTables.min.js")}}
	{{ HTML::script("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js")}}

<!-- END PAGE LEVEL PLUGINS -->

	<script>


        	$('#awards').dataTable( {
                        "bProcessing": true,
                        "bServerSide": true,
                        "sAjaxSource": "{{ route("admin.ajax_awards") }}",
                        "aaSorting": [[ 1, "asc" ]],
                        "aoColumns": [
                            { 'sClass': 'center', "bSortable": true  },
                            { 'sClass': 'center', "bSortable": true  },
                            { 'sClass': 'center', "bSortable": true },
                            { 'sClass': 'center', "bSortable": true },
                            { 'sClass': 'center', "bSortable": true },
                            { 'sClass': 'center', "bSortable": true },
                            { 'sClass': 'center', "bSortable": true },
                            { 'sClass': 'center', "bSortable": false }


                        ],
                        "columnDefs": [
                                    {
                                        "targets": [ 0 ],
                                        "visible": false,
                                        "searchable": false
                                    },{
									  "targets": [ 5 ],
									  "visible": false,
									  "searchable": true
								  }
                                    ],
                        "lengthMenu": [
										[5, 15, 20, -1],
										[5, 15, 20, "All"] // change per page values here
									],
                        "sPaginationType": "full_numbers",
                        "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
                            var row = $(nRow);
                            row.attr("id", 'row'+aData['0']);
                        }

             });



		function del(id,awardeeName,award)
		{

			$('#deleteModal').appendTo("body").modal('show');
			$('#info').html('Are you sure ! You want to delete <strong>'+award+'</strong> given to <strong>'+awardeeName+'</strong>??');
			$("#delete").click(function()
			{
					var url = "{{ route('admin.awards.destroy',':id') }}";
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
		                  	   		 $('#row'+id).fadeOut(500);

		                 	  		$('#load').html("<p class='alert alert-success text-center'><strong>"+name +"</strong> Successfully Deleted</p>");
		                  	 }
		           		 });
				})

			}
</script>
@stop
	