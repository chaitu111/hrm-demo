@extends('admin.adminlayouts.adminlayout')

@section('head')

	
	<!-- BEGIN PAGE LEVEL STYLES -->

	{{HTML::style("assets/global/plugins/bootstrap-datepicker/css/datepicker3.css")}}

	<!-- END PAGE LEVEL STYLES -->

@stop


@section('mainarea')

     <!-- BEGIN PAGE HEADER-->
     			<h3 class="page-title">
     			{{$pageTitle}} <small>Holidays List</small>
     			</h3>
     			<div class="page-bar">
     				<ul class="page-breadcrumb">
     					<li>
     						<i class="fa fa-home"></i>
     						<a href="{{route('admin.dashboard.index')}}">Home</a>
     						<i class="fa fa-angle-right"></i>
     					</li>
     					<li>
     						<a href="#">Holidays</a>
     						<i class="fa fa-angle-right"></i>
     					</li>
     					<li>
     						<a href="#">Holidays list of {{ date('Y') }} </a>
     					</li>
     				</ul>

     			</div>
     			<!-- END PAGE HEADER-->
     			<!-- BEGIN PAGE CONTENT-->

            <div id="load">
            {{--INLCUDE ERROR MESSAGE BOX--}}
                   @include('admin.common.error')
           {{--END ERROR MESSAGE BOX--}}
            </div>


            <div class="row">
                <div class="col-md-3"><a class="btn green" data-toggle="modal" href="#static">
                                      									Add Holidays
                                      			<i class="fa fa-plus"></i> </a></div>
                <div class="col-md-offset-6 col-md-3 ">
                    @if($number_of_sundays>$holidays_in_db)
                    <a class="btn green" href="{{URL::to('admin/holidays/mark_sunday ')}}">
                                      					Mark All Sunday Holiday
                        <i class="fa fa-check"></i> </a>
                    @endif

                 </div>

            </div>

			<hr>
     			<div class="row">
     				<div class="col-md-3">
     					<ul class="ver-inline-menu tabbable margin-bottom-10">
                         @foreach($months as $month)
                            <li @if($month == $currentMonth) class="active" @endif >
                                    <a data-toggle="tab" href="#{{ $month }}">
                                    <i class="fa fa-calendar"></i> {{ $month }} </a>
                                    <span class="after">
                                    </span>
                             </li>
     					@endforeach

     					</ul>
     				</div>
     				<div class="col-md-9">
     					<div class="tab-content">
     					  @foreach($months as $month)
     						<div id="{{$month}}" class="tab-pane @if($month == $currentMonth) active @endif">
     						<div class="portlet box blue">
                            						<div class="portlet-title">
                            							<div class="caption">
                            								<i class="fa fa-calendar"></i>{{$month}}
                            							</div>

                            						</div>
                            						<div class="portlet-body">
                            							<div class="table-scrollable">
                            								<table class="table table-hover">
                            								<thead>
                            								<tr>
                            									<th> # </th>
                            									<th> Date </th>
                            									<th> Occasion </th>
                            									<th> Day </th>
                            									<th> Action </th>
                            								</tr>
                            								</thead>
                            								<tbody>
                            								@if(isset($holidaysArray[$month]))

                                                                @for($i=0;$i<count($holidaysArray[$month]['date']);$i++)

                                                                <tr id="row{{ $holidaysArray[$month]['id'][$i] }}">
                                                                    <td> {{($i+1)}} </td>
                                                                    <td> {{ $holidaysArray[$month]['date'][$i] }} </td>
                                                                    <td> {{ $holidaysArray[$month]['ocassion'][$i] }} </td>
                                                                    <td> {{ $holidaysArray[$month]['day'][$i] }} </td>
                                                                    <td>
                                                                        <button type="button" onclick="del('{{ $holidaysArray[$month]['id'][$i] }}',' {{ $holidaysArray[$month]['date'][$i] }}')" href="#" class="btn btn-xs red">
                                                                           <i class="fa fa-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                 </tr>
                                                                @endfor
                            								@endif

                            								</tbody>
                            								</table>
                            							</div>
                            						</div>
                            	</div>
     						</div>
     					@endforeach


     					</div>
     				</div>
     			</div>
     			<!-- END PAGE CONTENT-->

     			{{--Add Holidays MODALS--}}

     			<div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                								<div class="modal-dialog">
                									<div class="modal-content">
                										<div class="modal-header">
                											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                											<h4 class="modal-title"><strong>Holidays</strong></h4>
                										</div>
                										<div class="modal-body">
                											<div class="portlet-body form">

                                                            						<!-- BEGIN FORM-->
                                {{Form::open(array('route'=>"admin.holidays.store",'class'=>'form-horizontal ','method'=>'POST'))}}


                                    <div class="form-body">

                                        <div class="form-group">
                                             <div class="col-md-6">
                                                <input class="form-control form-control-inline input-medium date-picker" data-date-format="dd-mm-yyyy" name="date[0]" type="text" value="" placeholder="Date"/>

                                             </div>
                                            <div class="col-md-6">
                                                    <input class="form-control form-control-inline"  type="text" name="occasion[0]" placeholder="Occasion"/>
                                            </div>
                                        </div>
                                         <div id="insertBefore"></div>
                                        <button type="button" id="plusButton" class="btn btn-sm green form-control-inline">
                                                        Add More <i class="fa fa-plus"></i>
                                        </button>

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

     			{{--Add Holidays MODALS--}}

    {{--DELETE MODAL CALLING--}}
                    @include('admin.common.delete')
                {{--DELETE MODAL CALLING END--}}

@stop

@section('footerjs')

  {{--Page Level JS--}}
    {{HTML::script("assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js")}}
    {{HTML::script("assets/admin/pages/scripts/components-pickers.js")}}
  {{--Page Level js end--}}
    <script>
            jQuery(document).ready(function() {

               ComponentsPickers.init();
            });

            var $insertBefore = $('#insertBefore');
            var $i = 0;
            $('#plusButton').click(function(){
              $i = $i+1;
              $(' <div class="form-group"> ' +
               '<div class="col-md-6"><input class="form-control form-control-inline input-medium date-picker'+$i+'" name="date['+$i+']" type="text" value="" placeholder="Date"/></div>' +
               '<div class="col-md-6"><input class="form-control form-control-inline" name="occasion['+$i+']" type="text" value="" placeholder="Occasion"/></div>' +
                '</div>').insertBefore($insertBefore);
				$.fn.datepicker.defaults.format = "dd-mm-yyyy";
                 $('.date-picker'+$i).datepicker();
            });

function del(id,date)
		{

			$('#deleteModal').appendTo("body").modal('show');
			$('#info').html('Are you sure ! You want to delete <strong>'+date+'</strong> ??');
			$("#delete").click(function()
			{
				var url = "{{ route('admin.holidays.destroy',':id') }}";
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
