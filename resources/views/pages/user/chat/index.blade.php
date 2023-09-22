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
									<li class="breadcrumb-item"><a href="{{ currentHome() }}">Home</a></li>
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
										<ul id="chat-list">
											<!-- Chat messages will be dynamically loaded here -->
										</ul>
									</div><div id="mCSB_5_scrollbar_vertical" class="mCSB_scrollTools mCSB_5_scrollbar mCS-dark-2 mCSB_scrollTools_vertical mCSB_scrollTools_onDrag_expand" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_5_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; display: block; height: 26px; max-height: 188.75px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>
									<div class="chat-footer">
										
										<div class="chat_text_area" style="margin-left: 30px;">
											<textarea id="messageInput" placeholder="Type your message…"></textarea>
											<input type="hidden" name="bid" value="{{ Auth::user()->batch }}" />
											<input type="hidden" name="index_number" value="{{ Auth::user()->index_number }}" />
										</div>
										<div class="chat_send">
											<button class="btn btn-link" type="submit" id="sendMessage"><i class="icon-copy ion-paper-airplane"></i></button>
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

<script>
$(document).ready(function() {
    // Function to load chat messages
	function reloadChatList() {
		location.reload(); // This will refresh the entire page
	}

    // Automatically reload the chat list every 5 seconds (adjust the interval as needed)
    

    function loadChatMessages() {
        $.ajax({
            url: '/getChatMessages', // Replace with your actual route
            method: 'GET',
            success: function(response) {
				displayChatMessages(response); 
                console.log(response); // Display chat messages on success
            },
            error: function(error) {
                console.error(error);
            }
        });
    }

    // Function to display chat messages
    function displayChatMessages(messages) {
    var chatList = $('#chat-list'); // Get the chat list by its ID

    messages.forEach(function (message) {
        var listItem = $('<li class="clearfix"></li>');

        // Create the HTML structure based on the message data
        var htmlContent = '';
        if (message.index_number === "{{ Auth::user()->index_number }}") {
            htmlContent += '<li class="clearfix admin_chat">';
        } else {
            htmlContent += '<li class="clearfix">';
        }
        htmlContent += '<span class="chat-img">';
        htmlContent += '<img src="{{ asset('assets/images/hd_dp.jpg') }}" alt="" class="mCS_img_loaded">';
        htmlContent += '</span>';
        htmlContent += '<div class="chat-body clearfix">';
        htmlContent += '<p>' + message.msg + '</p>';
        
        // Format the created_at timestamp
        var createdAt = new Date(message.created_at);
        var formattedCreatedAt = createdAt.toLocaleString('en-US', { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit', hour12: true });
        
        htmlContent += '<div class="chat_time">' + formattedCreatedAt + ' - ' + message.fname + ' '+ message.lname
             + '</div>';
        htmlContent += '</div>';
        htmlContent += '</li>';

        listItem.html(htmlContent);
        chatList.append(listItem);
    });
}


    // Load chat messages when the page loads
    loadChatMessages();
});

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("sendMessage").addEventListener("click", function () {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Include the CSRF token in the AJAX request headers
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        // Get the message from the textarea
        var message = document.getElementById("messageInput").value;
        var bid = document.querySelector('input[name="bid"]').value;
        var indexNumber = document.querySelector('input[name="index_number"]').value;

        // AJAX request to save the message and additional data to the database
        $.ajax({
            type: "POST",
            url: "/chat", // Replace with your actual route
            data: {
                message: message,
                bid: bid,
                index_number: indexNumber
            },
            success: function (response) {
                // Append the new chat message to the chat list
               location.reload();

                // Clear the input field
                document.getElementById("messageInput").value = '';
            },
            error: function (error) {
                console.error(error);
            }
        });
    });
});


</script>

@endsection 	