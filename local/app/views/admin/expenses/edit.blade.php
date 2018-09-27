@extends('admin.adminlayouts.adminlayout')

@section('head')
    <!-- BEGIN PAGE LEVEL STYLES -->
    {{ HTML::style("assets/global/plugins/bootstrap-datepicker/css/datepicker3.css") }}
    {{ HTML::style("assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css") }}
    <!-- BEGIN THEME STYLES -->
@stop


@section('mainarea')

			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Expenses Edit page
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="{{route('admin.dashboard.index')}}">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="{{ route('admin.expenses.index') }}">expense</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="">Edit Item</a>
					</li>
				</ul>
			
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->

                {{--INLCUDE ERROR MESSAGE BOX--}}
                @include('admin.common.error')
                {{--END ERROR MESSAGE BOX--}}


					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Edit item
							</div>
							<div class="tools">
							</div>
						</div>

						<div class="portlet-body form">

						<!-- BEGIN FORM-->
						{{Form::open(array('route'=>["admin.expenses.update",$expense->id],'class'=>'form-horizontal form-bordered','method'=>'PATCH','files'=>true))}}


                                    <div class="form-body">

                                        <div class="form-group">
                                        <label class="col-md-2 control-label">Item Name: <span class="required"> * </span></label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="itemName" placeholder="Item Name" value="{{ $expense->itemName }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                             <label class="col-md-2 control-label">Purchase From: </label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="purchaseFrom" placeholder="Purchase From" value="{{ $expense->purchaseFrom }}" >
                                            </div>
                                        </div>

                                          <div class="form-group">
                                                    <label class="col-md-2 control-label">Purchase Date:  </label>
                                                        <div class="col-md-6">
                                                            <div class="input-group input-medium date date-picker"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                                       <input type="text" class="form-control" name="purchaseDate" readonly value="{{date('d-m-Y',strtotime($expense->purchaseDate));}}">
                                                                   <span class="input-group-btn">
                                                                   <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                                   </span>
                                                                   </div>
                                                        </div>
                                           </div>

                                     <div class="form-group">
                                        <label class="col-md-2 control-label">Amount price:<span class="required">  * </span></label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="price" placeholder="Price of Item" value="{{ $expense->price }}">
                                                </div>
                                     </div>

                                     <div class="form-group">
                                                    <label class="col-md-2 control-label">Attach Bill:</label>
                                                    <input type="hidden" name="billhidden" value="{{$expense->bill}}">
                                                    <div class="col-md-6">
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
                                                                           <input type="file" name="bill">
                                                                           </span>
                                                                           <a href="#" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
                                                                           Remove </a>
                                                                       </div>

                                                               </div>
                                                    </div>
                                                    <div class="col-md-4">

                                                    @if($expense->bill!='')
                                                            <a href="https://docs.google.com/viewer?url={{URL::to('expense/bills/'.$expense->bill)}}" target="_blank"  class="btn purple">View Bill</a>
                                                     @endif
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
			<!-- END PAGE CONTENT-->



@stop

@section('footerjs')

<!-- BEGIN PAGE LEVEL PLUGINS -->
{{ HTML::script("assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js") }}
{{ HTML::script("assets/admin/pages/scripts/components-pickers.js") }}
{{ HTML::script("assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js") }}
<!-- END PAGE LEVEL PLUGINS -->
<script>
jQuery(document).ready(function() {

           ComponentsPickers.init();


        });
</script>
@stop