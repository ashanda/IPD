<div class="header-search">

			@if (empty(notice()))
				
			@else
			<div class="row">
				<div class="col-md-12">
					<div class="d-flex justify-content-between align-items-center breaking-news bg-white">
						<div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-danger py-2 text-white px-1 news"><span class="d-flex align-items-center">&nbsp;Notice</span></div>
						
						<marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"> 
							@foreach ( notice() as $notice)
								<a href="#" style="font-weight: 600;">{{ $notice->notice }}</a> 
								<span class="dot"></span>
								
							@endforeach
						</marquee>
					</div>
				</div>
    		</div>
			@endif	

     </div>