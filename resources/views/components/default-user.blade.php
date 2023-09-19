@section('preload')

@endsection

<div class="main-container">
		<div class="pd-ltr-20">
			<div class="row">
				<div class="col-xl-12 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Payment</h2>
						<div class="row">		
					<div class="col-md-7 pl-10">
                        @if (lastPay() != 2 )
                           <form method="POST" action="{{ route('paycourse') }}" enctype="multipart/form-data">
							@csrf
						<div class="form-group">
							<label>Course</label>
							<input class="form-control" type="text" value="{{ $course->cname }}" readonly="">
							<input name="course_id" value="{{ $course->id}}" type="hidden">
						</div>
						
	


						<div class="form-group">
							<div class="row">
							  <div class="col-md-6 col-sm-12">
								<label class="weight-600">Choose payment type</label>
								<div class="custom-control custom-radio mb-5">
									<input type="radio" id="bank" value="bank" name="customRadio" class="custom-control-input">
									<label class="custom-control-label" for="bank">Bank Payment</label>
								</div>
								<div class="custom-control custom-radio mb-5">
									<input type="radio" id="bank_coupen" value="bank_coupen" name="customRadio" class="custom-control-input">
									<label class="custom-control-label" for="bank_coupen">I have a Coupen Code</label>
								</div>
								<div class="custom-control custom-radio mb-5">
									<input type="radio" id="online" value="Online" name="customRadio" class="custom-control-input">
									<label class="custom-control-label" for="online">Online</label>
								</div>
								
							</div>
							</div>
						</div>
						<input type="hidden" name="amount" value="{{ $course->fee }}" id="">
						{{ 'Course Fee Rs:'.$course->fee }}
						<div class="form-group" id="receiptField">
							<label>Upload recipt</label>
							<input type="file" name="slip" class="form-control-file form-control height-auto" >
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Click and Pay</button>
						</div>
					</form>
					</div>
					<div class="col-md-5">
						<P id="bankField">සාමාන්‍ය පන්ති ගාස්තු ගෙවූ දරුවන් පමණක් බැංකු රිසිට් පත මෙතනින් upload කරන්න. පන්ති ගාස්තු සදහා සහන (Discounts/Offers) ලැබූ සිසුන් එම bank receipt පත 0123456789 අංකයට නම , LMS NAME එකෙහි register වූ දුරකතන අංකය , විෂය සහ ගුරුවරයා , ඒ ඒ විෂයට ගෙවූ ගාස්තුව වෙන වෙනම සදහන් කර WhatsApp කරන්න.සාමාන්‍ය පන්ති ගාස්තු ගෙවන දරුවන් සම්බන්ධ වන විෂයන් ඉදිරියේ හරි ලකුණු යොදා (click on the relevant tick box) මෙහි bank receipt පතෙහි photo එකක් හෝ screenshot එකක් upload කරන්න. (Pdf file upload කල නොහැක)</P>
					</div>    
                        @else
                         </div> 
                            </div>
                        
                        <h3>Please wait. </h3>
                        <h3>Your last upload slip admin review</h3>   

                    @endif
					
					
					</div>
				</div>

			</div>
			@if (Auth::user()->type === 'user')
				{{-- @include('components.hurray') --}}
			@else
				
			@endif
			
			

			
 
 @section('scripts')

<script>
$(document).ready(function() {
    // Initially hide the element with class "bank"
    $("#bankField").hide();
            // Also, hide the "Upload receipt" field
    $("#receiptField").hide();

    // Listen for changes in the radio buttons
    $('input[type=radio][name=customRadio]').change(function() {
        if (this.value === 'Online') {
            // If "Online" is selected, hide the element with class "bank"
            $("#bankField").hide();
            // Also, hide the "Upload receipt" field
            $("#receiptField").hide();
        } else {
            // If "Bank Payment full" is selected, show the element with class "bank"
            $("#bankField").show();
            // Show the "Upload receipt" field
            $("#receiptField").show();
        }
    });
});
</script>



 @endsection         