jQuery(document).ready(function ($) {
	$(".featured-competitions").slick({
		dots: true,
		infinite: true,
		autoplay: true,
		arrows: false,
		speed: 150,
	});
});

(function ($) {
	"use strict";
	$(document).ready(function () {
		function wc_filter_function(page_num) {
			var category = $(".wc-filter-lottery-category").val();
			var price = $(".wc-filter-lottery-price").val();
			var text = $(".wc-filter-lottery-text").val();

			if (page_num) {
				var paged = page_num;
			} else {
				var paged = "";
			}

			console.log(paged);
			var ajaxurl = wc_ajax_object.ajax_url;

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
					} else {
						$(".wc-lottery-items-wrapper").html(response);
					}
				},
				error: function () {
					console.log("Error occurred");
				},
			});
		}

		$(".wc-filter-lottery-category").change(function () {
			wc_filter_function();
		});

		$(".wc-filter-lottery-price").change(function () {
			wc_filter_function();
		});
		$(".wc-filter-lottery-text").on("keypress", function () {
			wc_filter_function();
		});

		$(".wc-pagination>.page-numbers").click(function () {
			wc_filter_function($(this).text());
			$(this).addClass("current").siblings().removeClass("current");
		});

		$(".wc-pagination>.page-numbers").click(function (event) {
			event.preventDefault();
		});
	});
})(jQuery);
