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
						<a href="#">Expense</a>
						<i class="fa "></i>
					</li>

				</ul>
			
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div id="load">

                     {{--INLCUDE ERROR MESSAGE BOX--}}
                      @include('admin.common.error')
                     {{--END ERROR MESSAGE BOX--}}

                    </div>

					<a href="{{ route('admin.expenses.create')}}" class="btn green">
                                    Add New expense Item <i class="fa fa-plus"></i>
                      </a>
                    <hr>
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-database"></i>Expense List
							</div>

						</div>

						<div class="portlet-body">

							<table class="table table-striped table-bordered table-hover" id="expenses">
							<thead>
							<tr>
								<th>
									 ID.
								</th>
								<th>
									 Item Name
								</th>
								<th>
									 Purchase From
								</th>
								<th>
									 Purchase Date
								</th>
								<th>
                                     Price ( <span class="fa {{$setting->currency_icon}}"></span> )
                                </th>
								<th>
									 Action
								</th>
							</tr>
							</thead>
							<tbody>
					

							<tr >
                                <td>{{-- ID --}}</td>
                                <td>{{-- Item Name --}}</td>
                                <td>{{-- Purchase Date --}}</td>
                                <td>{{-- Purchase From --}}</td>
                                <td>{{-- Price --}}</td>
                                <td>{{-- Action --}} </td>
                            </tr>

							
					
							</tbody>
							</table>
							{{--<a class="btn purple" href="{{ URL::to('admin/expenses/'.$expense->id.'/edit/') }}"><i class="fa fa-edit"></i> View/Edit</a>--}}

                                          						{{--<a class="btn red" href="javascript:;" onclick="del({{$expense->id}},'{{ $expense->itemName }}')"><i class="fa fa-trash"></i> Delete</a>--}}
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

<!-- END PAGE LEVEL PLUGINS -->

	<script>


    	$('#expenses').dataTable( {
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": "{{ URL::route("admin.ajax_expenses") }}",
                    "aaSorting": [[ 1, "asc" ]],
                    "aoColumns": [
                        { 'sClass': 'center', "bSortable": true  },
                        { 'sClass': 'center', "bSortable": true },
                        { 'sClass': 'center', "bSortable": true },
                        { 'sClass': 'center', "bSortable": true },
                        { 'sClass': 'center', "bSortable": true },
                        { 'sClass': 'center', "bSortable": false }
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



		function del(id,name)
		{

			$('#deleteModal').appendTo("body").modal('show');
			$('#info').html('Are you sure ! You want to delete <strong>'+name+'</strong> ??');
			$("#delete").click(function()
			{
					 $.ajax({

		                type: "DELETE",
		                url : "{{ URL::to('admin/expenses/"+id+"') }}",
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
	