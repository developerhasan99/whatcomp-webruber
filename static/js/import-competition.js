/**
 * Name: whatcomp-admin.js
 * Description: This whatcomp-admin.js file includes al javascript codes for whatcomp plugin.
 * Author: Mehedi Hasan
 * Created on: Tue Mar 28 2023
 */

function extractDomain(url) {
	let domain;
	//find & remove protocol (http, ftp, etc.) and get domain
	if (url.indexOf("://") > -1) {
		domain = url.split("/")[2];
	} else {
		domain = url.split("/")[0];
	}
	//find & remove port number
	domain = domain.split(":")[0];
	//find & remove query string
	domain = domain.split("?")[0];
	return domain;
}

function isUrl(str) {
	const pattern = new RegExp(
		"^(https?:\\/\\/)?" + // protocol
			"((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|" + // domain name
			"((\\d{1,3}\\.){3}\\d{1,3}))" + // OR ip (v4) address
			"(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*" + // port and path
			"(\\?[;&a-z\\d%_.~+=-]*)?" + // query string
			"(\\#[-a-z\\d_]*)?$",
		"i"
	); // fragment locator
	return pattern.test(str);
}

const listings = [];

const importForm = document.getElementById("import-form");
importForm.onsubmit = function (event) {
	event.preventDefault();

	// validate information
	const siteUrl = event.target.site_url.value;
	const consumerKey = event.target.consumer_key.value;
	const consumerSecret = event.target.consumer_secrete.value;

	// Check if the url is valid
	if (!isUrl(siteUrl)) {
		alert("Please enter a valid site url!");
		return;
	}

	// Check if the consumer key is valid
	if (consumerKey.length !== 43 || !consumerKey.includes("ck_")) {
		alert("Please enter a valid consumer key!");
		return;
	}

	// Check if the consumer secret is valid
	if (consumerSecret.length !== 43 || !consumerSecret.includes("cs_")) {
		alert("Please enter a valid consumer secret!");
		return;
	}

	//Extract only domain name
	const domain = extractDomain(siteUrl);

	const reqBody = {
		action: "whatcomp_ajax_function",
		data: {
			domain,
			consumerKey,
			consumerSecret,
		},
	};

	// Send data to server
	jQuery(document).ready(function ($) {
		// Show loader animation
		$(".import-form-card").fadeOut();
		$(".credentials-error").fadeOut();
		$(".importing-loader").fadeIn();
		// Send the AJAX request
		$.ajax({
			url: ajaxurl, // the WordPress AJAX endpoint
			type: "POST",
			data: reqBody,
			success: function (response) {
				if (response.status === "success") {
					// Hide the progress bar and show the form
					$(".importing-loader").fadeOut();
					$(".imported-competitions-card").fadeIn();
					// Handle the response from the server
					if (
						typeof response.message === "object" &&
						response.message.length > 0
					) {
						console.log(response);
						const listItems = response.message.map(function (title, index) {
							return `<tr>
										<td>${index + 1}</td>
										<td>${title}</td>
									</tr>`;
						});
						$(".imported-competitions").html(listItems);
					}
				} else {
					$(".importing-loader").fadeOut();
					// Handle errors
					$(".credentials-error").fadeIn();
					$(".import-form-card").fadeIn();
				}
			},
			error: function (xhr, status, error) {
				$(".importing-loader").fadeOut();
				// Handle errors
				$(".credentials-error").fadeIn();
				$(".import-form-card").fadeIn();
			},
		});
	});
};
