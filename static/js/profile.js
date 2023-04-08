jQuery(document).ready(function ($) {
	$(".update-avatar-btn").click(function () {
		$(".avatar-upload-form-wrapper").fadeIn();
	});

	// Handler for avatar upload form submission
	$(".profile-pic-uploader").on("submit", function (event) {
		event.preventDefault();

		$(".importing-loader").fadeIn();
		// Get the selected file
		var file_data = $("#avatar").prop("files")[0];

		// Create a new FormData object
		var form_data = new FormData();
		form_data.append("action", "upload_user_avatar");
		form_data.append("avatar", file_data);

		// Make an AJAX request to upload the user avatar
		$.ajax({
			url: ajaxurl,
			type: "POST",
			data: form_data,
			contentType: false,
			processData: false,
			success: function (response) {
				$(".profile_pic_success").fadeIn();
				$(".profile_pic").attr("src", response.profile_pic);
				$(".importing-loader").fadeOut();
			},
		});
	});

	$("#profile-details").on("submit", function (event) {
		event.preventDefault();

		$(".importing-loader").fadeIn();

		const firstName = event.target.firstName.value;
		const lastName = event.target.lastName.value;
		const email = event.target.email.value;
		const instagramUsername = event.target.instagramUsername.value;

		const data = {
			action: "update_profile_details",
			firstName,
			lastName,
			email,
			instagramUsername,
		};

		$.ajax({
			url: ajaxurl,
			type: "POST",
			data,
			success: function (response) {
				$(".importing-loader").fadeOut();
				$(".profile_details_success").fadeIn();
			},
		});
	});
});
