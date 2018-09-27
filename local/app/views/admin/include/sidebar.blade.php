<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>


			  {{---------------------------------------Dashboard-------------------------------}}
				<li class="start {{ $dashboardActive or ''}}">
					<a href="{{URL::to('admin')}}">
					<i class="fa fa-home"></i>
					<span class="title">{{Lang::get('menu.dashboard')}}</span>
					<span class="selected"></span>
					</a>
				</li>
			     {{---------------------------------------/Dashboard-------------------------------}}


		      {{---------------------------------------Employees-------------------------------}}
				<li class="{{ $employeesOpen or ''}}">
					<a href="javascript:;">
					<i class="fa fa-users"></i>
					<span class="title">{{Lang::get('menu.employees')}}</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li class="{{ $employeesActive or ''}}">
							<a href="{{route('admin.employees.index')}}">
							<i class="fa fa-users"></i>
							{{Lang::get('menu.employeeList')}}</a>
						</li>

						
					</ul>
				</li>
              {{---------------------------------------/Employees-------------------------------}}


              {{---------------------------------------Department-------------------------------}}
				    <li class="{{ $departmentOpen or ''}}">
                					<a href="javascript:;">
                					<i class="fa fa-briefcase"></i>
                					<span class="title">{{Lang::get('menu.department')}}</span>
                					<span class="arrow "></span>
                					</a>
                					<ul class="sub-menu">
                						<li class="{{ $departmentActive or ''}}">
                							<a href="{{route('admin.departments.index')}}">
                							<i class="fa fa-briefcase"></i>
                							{{Lang::get('menu.departmentList')}} </a>
                						</li>


                					</ul>
                    </li>
              {{---------------------------------------Settings-------------------------------}}

              {{---------------------------------------Awards-------------------------------}}
                    <li class="{{ $awardsOpen or ''}}">
                                <a href="javascript:;">
                                <i class="fa fa-trophy"></i>
                                <span class="title">{{Lang::get('menu.award')}}</span>
                                <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="{{ $awardsActive or ''}}">
                                        <a href="{{route('admin.awards.index')}}">
                                        <i class="fa  fa-gift"></i>
                                        {{Lang::get('menu.awardList')}}</a>
                                    </li>
                                </ul>
                            </li>
            {{---------------------------------------/Awards-------------------------------}}



              {{---------------------------------------Expense-------------------------------}}
                    <li class="{{ $expensesOpen or ''}}">
                                <a href="javascript:;">
                                <i class="fa fa-money"></i>
                                <span class="title">{{Lang::get('menu.expense')}}</span>
                                <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="{{ $inventoryActive or ''}}">
                                        <a href="{{route('admin.expenses.index')}}">
                                        <i class="fa  fa-money"></i>
                                        {{Lang::get('menu.expenseList')}}</a>
                                    </li>


                                </ul>
                     </li>
              {{---------------------------------------/Expense-------------------------------}}


             {{---------------------------------------Holidays-------------------------------}}
                    <li class="{{ $holidayOpen or ''}}">
                                <a href="javascript:;">
                                <i class="fa fa-send"></i>
                                <span class="title">{{Lang::get('menu.holiday')}}</span>
                                <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="{{ $holidayActive or ''}}">
                                        <a href="{{route('admin.holidays.index')}}">
                                        <i class="fa  fa-calendar"></i>
                                        {{Lang::get('menu.holidayList')}}</a>
                                    </li>


                                </ul>
                    </li>
              {{---------------------------------------/Holiday-------------------------------}}


                  {{---------------------------------------Attendance-------------------------------}}
                  <li class="{{ $attendanceOpen or ''}}">
                           <a href="javascript:;">
                           <i class="fa fa-user"></i>
                           <span class="title">{{Lang::get('menu.attendance')}}</span>
                           <span class="arrow "></span>
                           </a>
                           <ul class="sub-menu">
                               <li class="{{ $markAttendanceActive or ''}}">
                                   <a href="{{route('admin.attendances.create')}}">
                                   <i class="fa  fa-check"></i>
                                   Mark Attendance</a>
                               </li>
                                <li class="{{ $viewAttendanceActive or ''}}">
                                       <a href="{{route('admin.attendances.index')}}">
                                       <i class="fa  fa-eye"></i>
                                       {{Lang::get('menu.viewAttendance')}}</a>
                                   </li>
                               <li class="{{ $leaveTypeActive or ''}}">
                                      <a href="{{route('admin.leavetypes.index')}}">
                                      <i class="fa fa-sitemap"></i>
                                      {{Lang::get('menu.leaveTypes')}}</a>
                                  </li>
                           </ul>
                     </li>

                  {{---------------------------------------/Attendance-------------------------------}}

                  {{---------------------------------------Leave Applications-------------------------------}}
                  <li class="{{ $leaveApplicationOpen or ''}}">
                           <a href="javascript:;">
                           <i class="fa fa-rocket"></i>
                           <span class="title">{{Lang::get('menu.leaveApplication')}}</span>
                           <span class="arrow "></span>
                           </a>
                           <ul class="sub-menu">
                               <li class="{{ $leaveApplicationActive or ''}}">
                                   <a href="{{route('admin.leave_applications.index')}}">
                                   <i class="fa fa-rocket"></i>
                                   {{Lang::get('menu.leaveApplicationList')}}</a>
                               </li>

                           </ul>
                     </li>

                  {{---------------------------------------/Attendance-------------------------------}}
				  
				  
				   {{---------------------------------------PAYROLL-------------------------------}}
					<li class="{{ $payrollOpen or ''}}">
                           <a href="javascript:;">
                           <i class="fa fa-rocket"></i>
                           <span class="title">PAYROLL</span>
                           <span class="arrow "></span>
                           </a>
                           <ul class="sub-menu">
                               <li class="{{ $payrollActive or ''}}">
                                   <a href="{{route('admin.payroll.index')}}">
                                   <i class="fa fa-rocket"></i>
                                   PAYROLL</a>
                               </li>

                           </ul>
                     </li>

			     {{---------------------------------------/PAYROLL-------------------------------}}



                  {{---------------------------------------Notice Board-------------------------------}}
                      <li class="{{ $noticeBoardOpen or ''}}">
                                 <a href="javascript:;">
                                 <i class="fa fa-clipboard"></i>
                                 <span class="title">{{Lang::get('menu.noticeBoard')}}</span>
                                 <span class="arrow "></span>
                                 </a>
                                 <ul class="sub-menu">
                                     <li class="{{ $noticeBoardActive or ''}}">
                                         <a href="{{route('admin.noticeboards.index')}}">
                                         <i class="fa fa-clipboard"></i>
                                         {{Lang::get('menu.noticeBoard')}}</a>
                                     </li>


                                 </ul>
                    </li>

                {{---------------------------------------/Notice Board-------------------------------}}


                  {{---------------------------------------Settings-------------------------------}}
                      <li class="{{ $settingOpen or ''}}">
                                 <a href="javascript:;">
                                 <i class="fa fa-cogs"></i>
                                 <span class="title">{{Lang::get('menu.settings')}}</span>
                                 <span class="arrow "></span>
                                 </a>
                                 <ul class="sub-menu">
                                     <li class="{{ $settingActive or ''}}">
                                         <a href="{{route('admin.settings.edit','setting')}}">
                                         <i class="fa  fa-cog"></i>
                                        {{Lang::get('menu.generalSetting')}}</a>
                                     </li>

                                     <li class="{{ $profileSettingActive or ''}}">
                                            <a href="{{route('admin.profile_settings.edit',Auth::admin()->get()->id)}}">
                                            <i class="fa fa-user"></i>
                                            {{Lang::get('menu.profileSetting')}}</a>
                                      </li>
                                     <li class="{{ $notificationSettingActive or ''}}">
                                         <a href="{{route('admin.notificationSettings.edit',Auth::admin()->get()->id)}}">
                                         <i class="fa fa-bell"></i>
                                         {{Lang::get('menu.notificationSetting')}}</a>
                                   </li>
                                 </ul>
                    </li>

                {{---------------------------------------/Settings-------------------------------}}


				</li>
			
		
		
		
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->