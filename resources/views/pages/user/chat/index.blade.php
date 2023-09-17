@extends('layouts.app')

@section('content')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Chat</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Chat</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="bg-white border-radius-4 box-shadow mb-30">
					<div class="row no-gutters">
						
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="chat-detail">
								<div class="chat-profile-header clearfix">
									<div class="left">
										<div class="clearfix">
											<div class="chat-profile-photo">
												<img src="{{ asset('assets/images/hd_dp.jpg') }}" alt="">
											</div>
											<div class="chat-profile-name">
												<h3>{{ Auth::user()->fname .' '.auth::user()->lname }}</h3>
												
											</div>
										</div>
									</div>
									
								</div>
								<div class="chat-box">
									<div class="chat-desc customscroll mCustomScrollbar _mCS_5"><div id="mCSB_5" class="mCustomScrollBox mCS-dark-2 mCSB_vertical mCSB_inside" style="max-height: none;" tabindex="0"><div id="mCSB_5_container" class="mCSB_container" style="position: relative; top: 0px; left: 0px;" dir="ltr">
										<ul>
											<li class="clearfix admin_chat">
												<span class="chat-img">
													<img src="vendors/images/chat-img2.jpg" alt="" class="mCS_img_loaded">
												</span>
												<div class="chat-body clearfix">
													<p>Maybe you already have additional info?</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix admin_chat">
												<span class="chat-img">
													<img src="vendors/images/chat-img2.jpg" alt="" class="mCS_img_loaded">
												</span>
												<div class="chat-body clearfix">
													<p>It is to early to provide some kind of estimation here. We need user stories.</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix">
												<span class="chat-img">
													<img src="vendors/images/chat-img1.jpg" alt="" class="mCS_img_loaded">
												</span>
												<div class="chat-body clearfix">
													<p>We are just writing up the user stories now so will have requirements for you next week. We are just writing up the user stories now so will have requirements for you next week.</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix">
												<span class="chat-img">
													<img src="vendors/images/chat-img1.jpg" alt="" class="mCS_img_loaded">
												</span>
												<div class="chat-body clearfix">
													<p>Essentially the brief is for you guys to build an iOS and android app. We will do backend and web app. We have a version one mockup of the UI, please see it attached. As mentioned before, we would simply hand you all the assets for the UI and you guys code. If you have any early questions please do send them on to myself. Ill be in touch in coming days when we have requirements prepared. Essentially the brief is for you guys to build an iOS and android app. We will do backend and web app. We have a version one mockup of the UI, please see it attached. As mentioned before, we would simply hand you all the assets for the UI and you guys code. If you have any early questions please do send them on to myself. Ill be in touch in coming days when we have.</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix admin_chat">
												<span class="chat-img">
													<img src="vendors/images/chat-img2.jpg" alt="" class="mCS_img_loaded">
												</span>
												<div class="chat-body clearfix">
													<p>Maybe you already have additional info?</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix admin_chat">
												<span class="chat-img">
													<img src="vendors/images/chat-img2.jpg" alt="" class="mCS_img_loaded">
												</span>
												<div class="chat-body clearfix">
													<p>It is to early to provide some kind of estimation here. We need user stories.</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix">
												<span class="chat-img">
													<img src="vendors/images/chat-img1.jpg" alt="" class="mCS_img_loaded">
												</span>
												<div class="chat-body clearfix">
													<p>We are just writing up the user stories now so will have requirements for you next week. We are just writing up the user stories now so will have requirements for you next week.</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix">
												<span class="chat-img">
													<img src="vendors/images/chat-img1.jpg" alt="" class="mCS_img_loaded">
												</span>
												<div class="chat-body clearfix">
													<p>Essentially the brief is for you guys to build an iOS and android app. We will do backend and web app. We have a version one mockup of the UI, please see it attached. As mentioned before, we would simply hand you all the assets for the UI and you guys code. If you have any early questions please do send them on to myself. Ill be in touch in coming days when we have requirements prepared. Essentially the brief is for you guys to build an iOS and android app. We will do backend and web app. We have a version one mockup of the UI, please see it attached. As mentioned before, we would simply hand you all the assets for the UI and you guys code. If you have any early questions please do send them on to myself. Ill be in touch in coming days when we have.</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix upload-file">
												<span class="chat-img">
													<img src="vendors/images/chat-img1.jpg" alt="" class="mCS_img_loaded">
												</span>
												<div class="chat-body clearfix">
													<div class="upload-file-box clearfix">
														<div class="left">
															<img src="vendors/images/upload-file-img.jpg" alt="" class="mCS_img_loaded">
															<div class="overlay">
																<a href="#">
																	<span><i class="fa fa-angle-down"></i></span>
																</a>
															</div>
														</div>
														<div class="right">
															<h3>Big room.jpg</h3>
															<a href="#">Download</a>
														</div>
													</div>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix upload-file admin_chat">
												<span class="chat-img">
													<img src="vendors/images/chat-img2.jpg" alt="" class="mCS_img_loaded">
												</span>
												<div class="chat-body clearfix">
													<div class="upload-file-box clearfix">
														<div class="left">
															<img src="vendors/images/upload-file-img.jpg" alt="" class="mCS_img_loaded">
															<div class="overlay">
																<a href="#">
																	<span><i class="fa fa-angle-down"></i></span>
																</a>
															</div>
														</div>
														<div class="right">
															<h3>Big room.jpg</h3>
															<a href="#">Download</a>
														</div>
													</div>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
										</ul>
									</div><div id="mCSB_5_scrollbar_vertical" class="mCSB_scrollTools mCSB_5_scrollbar mCS-dark-2 mCSB_scrollTools_vertical mCSB_scrollTools_onDrag_expand" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_5_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; display: block; height: 26px; max-height: 188.75px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>
									<div class="chat-footer">
										
										<div class="chat_text_area" style="margin-left: 30px;">
											<textarea placeholder="Type your message…"></textarea>
										</div>
										<div class="chat_send">
											<button class="btn btn-link" type="submit"><i class="icon-copy ion-paper-airplane"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	 @endsection           
@section('scripts')


@endsection 	