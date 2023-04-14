(function ($) {
	"use strict";
	$(document).ready(function () {
		// initialize slick slider plugin
		$(".featured-competitions").slick({
			dots: true,
			infinite: true,
			autoplay: true,
			arrows: false,
			speed: 150,
		});
		// define ajax url
		var ajaxurl = wc_ajax_object.ajax_url;

		// scaffold the wc filter function
		function wc_filter_function(page_num) {
			var category = $(".wc-filter-lottery-category").val();
			var price = $(".wc-filter-lottery-price").val();
			var text = $(".wc-filter-lottery-text").val();

			var paged = page_num ? page_num : "";

			$.ajax({
				url: ajaxurl,
				type: "post",
				data: {
					action: "load_posts_by_category",
					category: category,
					price: price,
					text: text,
					paged: paged,
				},

				beforeSend: function () {
					if (page_num) {
						$(".wc-lottery-items-inner").html("Loading...");
					} else {
						$(".wc-lottery-items-wrapper").html("Loading...");
					}
				},
				success: function (response) {
					if (page_num) {
						$(".wc-lottery-items-inner").html(response);
						init_pagination();
						init_favorite_buttons();
					} else {
						$(".wc-lottery-items-wrapper").html(response);
						init_pagination();
						init_favorite_buttons();
					}
				},
				error: function () {
					console.log("Error occurred");
				},
			});
		}

		// Load initial contents
		wc_filter_function();

		// Add event listeners to filter
		$(".wc-filter-lottery-category").change(function () {
			wc_filter_function();
		});

		$(".wc-filter-lottery-price").change(function () {
			wc_filter_function();
		});
		$(".wc-filter-lottery-text").on("keypress", function () {
			wc_filter_function();
		});

		// Scaffold pagination init function
		function init_pagination() {
			$(".wc-pagination>.page-numbers").click(function () {
				wc_filter_function($(this).text());
				$(this).addClass("current").siblings().removeClass("current");
			});

			$(".wc-pagination>.page-numbers").click(function (event) {
				event.preventDefault();
			});
		}

		// Scaffold init favorite buttons

		function init_favorite_buttons() {
			const favoriteBtns = document.querySelectorAll(".favorite-btn");

			favoriteBtns.forEach(function (btn) {
				btn.addEventListener("click", function (event) {
					btn.setAttribute("disabled", true);

					const data = {
						action: "make_favorite",
						postId: btn.dataset.postId,
					};

					$.ajax({
						url: ajaxurl,
						type: "post",
						data,
						success: function (response) {
							btn.innerHTML = '<i class="fa-solid fa-heart"></i>';
						},
						error: function () {
							console.log("Error occurred");
						},
					});
				});
			});
		}
	});
})(jQuery);
