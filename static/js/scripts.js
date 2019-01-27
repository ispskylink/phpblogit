$(document).ready(function(){
	// When user clicks on submit comment to add comment under post
	$(document).on('click', '#submit_comment', function(e) {
		
		e.preventDefault();
		
		var comment_text = $('#comment_text').val();
		var post_id = $('input[name=post_id]').val();
		var user_id = $('input[name=user_id]').val();

		var url = $('#comment_form').attr('action');
		// Stop executing if not value is entered
		if (comment_text == "" ) {
			alert("Введите текст для комментария");
			return;
		}
	
		$.ajax({
			url: url,
			type: "POST",
			data: {
				comment_text: comment_text,
				user_id: user_id,
				post_id:post_id,
				comment_posted: 1
			},
			success: function(data){
			//	alert(data);
				if (data === "error") {
					alert('Что-то пошло не так при добавлении комментария. Пробуй еще раз!');
				} else {
					var response = JSON.parse(data);
					$('#comments-wrapper').prepend(response.comment)
					$('#comments_count').text(response.comments_count); 
					$('#comment_text').val('');
				}
			}
		});
	});
	// When user clicks on submit reply to add reply under comment
	$(document).on('click', '.reply-btn', function(e){
		e.preventDefault();
		// Get the comment id from the reply button's data-id attribute
		var comment_id = $(this).data('id');
		// show/hide the appropriate reply form (from the reply-btn (this), go to the parent element (comment-details)
		// and then its siblings which is a form element with id comment_reply_form_ + comment_id)
		$(this).parent().siblings('form#comment_reply_form_' + comment_id).toggle(500);
		$(document).on('click', '.submit-reply', function(e){
			e.preventDefault();
			// elements
			
			var reply_textarea = $(this).siblings('textarea'); // reply textarea element
			var reply_text = $(this).siblings('textarea').val();
			var url = $(this).parent().attr('action');
			var user_id = $('input[name=user_id]').val();
			var comment_id = $(this).closest('form').data('id');
			
			$.ajax({
				url: url,
				type: "POST",
				data: {
					comment_id: comment_id,
					user_id: user_id,
					reply_text: reply_text,
					reply_posted: 1
				},
				success: function(data){
					if (data === "error") {
						alert('Что-то пошло не так при добавлении отзыва. Пробуй еще раз!');
					} else {
						$('.replies_wrapper_' + comment_id).append(data);
						reply_textarea.val('');
					}
				}
			});
		});
	});
});