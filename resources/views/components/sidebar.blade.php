<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.html">
				<img src="{{ asset('assets/images/logo.png') }}" alt="" class="dark-logo">
				<img src="{{ asset('assets/images/logo.png') }}" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
						</a>
						
					</li>
                    @if (Auth::user()->type === 'admin')
                    <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
                            
							<span class="micon dw dw-edit2"></span><span class="mtext">Courses & batch</span>
						</a>
						<ul class="submenu">
                            <li><a href="{{ route('batch.index') }}">Batch</a></li>
							<li><a href="{{  route('course.index')  }}">Courses</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Students</span>
						</a>
						<ul class="submenu">
							<li><a href="basic-table.html">Students</a></li>
							<li><a href="datatable.html">Batch wise Students</a></li>
                            <li><a href="datatable.html">Students Attendance</a></li>
						</ul>
					</li>
					<li>
						<a href="{{  route('instructor.index')  }}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user"></span><span class="mtext">Instructors</span>
						</a>
					</li>
                    <li>
						<a href="{{ route('workshop.index') }}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-deal"></span><span class="mtext">Workshop</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-list3"></span><span class="mtext">Course Materials</span>
						</a>
						<ul class="submenu">
							<li>
                                <a href="{{ route('lesson.index') }}" class="dropdown-toggle no-arrow">
									<span class="micon dw dw dw-notepad-1"></span><span class="mtext">Programme Shedule</span>
								</a>
							</li>	
                            <li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle">
                                    
									<span class="micon dw dw-analytics-11"></span><span class="mtext">Course works</span>
								</a>
								<ul class="submenu child">
									<li><a href="{{ route('course-work.index') }}">Add Course Work</a></li>
									<li><a href="javascript:;">Student Submitted Course Work</a></li>
								</ul>
							</li>
                            <li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle">
									<span class="micon dw dw-presentation-2"></span><span class="mtext">Exams</span>
								</a>
								<ul class="submenu child">
									<li><a href="{{ route('mcq-exam.index') }}">MCQ Exams</a></li>
									<li><a href="{{ route('paper-exam.index') }}">Paper Paper Exams</a></li>
                                    <li><a href="{{ route('verbal-exam.index') }}">Online Verbal Exams</a></li>
								</ul>
							</li>
							<li>
                                <a href="{{ route('tute.index') }}" class="dropdown-toggle no-arrow">
									<span class="micon dw dw dw-notepad-1"></span><span class="mtext">Class Tute</span>
								</a>
							</li>	
						</ul>
					</li>

                    <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-wallet-1"></span><span class="mtext">Payments</span>
						</a>
						<ul class="submenu">
 
							<li>
                                <a href="{{ route('payment.index') }}" class="dropdown-toggle no-arrow">
									Bank payments
								</a>
                            </li>
                            <li>
                                <a href="javascript:;" class="dropdown-toggle no-arrow">
									Online payments
								</a>
                            </li>    
						</ul>
					</li>
                     <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
                            
							<span class="micon dw dw-money-2"></span><span class="mtext">Expense</span>
						</a>
						<ul class="submenu">
 
                            <li>
                                <a href="{{ route('expence.index') }}" class="dropdown-toggle no-arrow">
									Add Expense
								</a>
                            </li> 
                            <li>
                                <a href="javascript:;" class="dropdown-toggle no-arrow">
									Payment Report
								</a>
                            </li>   
						</ul>
					</li>

					<li>
						<a href="{{ route('certificate.index') }}" class="dropdown-toggle no-arrow">
                            
							<span class="micon dw dw-certificate"></span><span class="mtext">Certificate</span>
						</a>
					</li>
					<li>
						<a href="chat.html" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-chat3"></span><span class="mtext">Coupon</span>
						</a>
					</li>
					<li>
						<a href="invoice.html" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-settings"></span><span class="mtext">Settings</span>
						</a>
					</li>
                    @elseif (Auth::user()->type === 'instructor')

                    @else
					<li>
						<a href="sitemap.html" class="dropdown-toggle no-arrow">
                            
							<span class="micon dw dw-edit2"></span><span class="mtext">Edit My Profile</span>
						</a>
					</li>

					<li>
						<a href="sitemap.html" class="dropdown-toggle no-arrow">
                            
							<span class="micon dw dw-certificate"></span><span class="mtext">Results</span>
						</a>
					</li>
					<li>
						<a href="chat.html" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-chat3"></span><span class="mtext">Group Chat</span>
						</a>
					</li>
                    <li>
						<a href="sitemap.html" class="dropdown-toggle no-arrow">
                            
							<span class="micon dw dw-money-2"></span><span class="mtext">My Payments</span>
						</a>
					</li>
					<li>
						<a href="invoice.html" class="dropdown-toggle no-arrow">
                            
							<span class="micon dw dw-user-3"></span><span class="mtext">My Attendance</span>
						</a>
					</li>
                    @endif
					
				
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>
