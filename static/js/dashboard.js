jQuery(document).ready(function ($) {
	let draftPostOffset = 0;
	let publishedPostOffset = 0;
	let currentUserTokenEl = document.getElementById("current-user-token");
	let currentUserToken = parseInt(currentUserTokenEl.innerText);

	// Get table of posts
	const draftPostTable = document.querySelector(".draft-posts-table");
	const publishedPostTable = document.querySelector(".published-posts-table");
	const featuredPostTable = document.querySelector(".featured-posts-table");

	// initially load the draft posts
	fetchPosts("get_draft_posts", draftPostOffset, function (error, response) {
		if (!error) {
			renderPosts(response, "draft", draftPostTable);

			draftPostOffset = draftPostOffset + response.length;

			if (response.length === 10) {
				$(".draft-load-btn-wrapper").fadeIn();
			}
		}
		// Handle error with an else clause
	});

	// initially load the published posts
	fetchPosts(
		"get_published_posts",
		publishedPostOffset,
		function (error, response) {
			if (!error) {
				renderPosts(response, "published", publishedPostTable);

				publishedPostOffset = publishedPostOffset + response.length;

				if (response.length === 10) {
					$(".published-load-btn-wrapper").fadeIn();
				}
			}
			// Handle error with an else clause
		}
	);

	// Load draft posts on button click
	$("#draft-load-btn").on("click", function (e) {
		e.preventDefault();
		$("#draft-load-btn .spinner-border").fadeIn();

		fetchPosts("get_draft_posts", draftPostOffset, function (error, response) {
			$("#draft-load-btn .spinner-border").fadeOut();

			if (!error) {
				renderPosts(response, "draft", draftPostTable);

				draftPostOffset = draftPostOffset + response.length;

				if (response.length < 10) {
					$("#draft-load-btn").prop("disabled", true);
				}
			}
			// Handle error with an else clause
		});
	});

	// Load Published posts on button click
	$("#published-load-btn").on("click", function (e) {
		e.preventDefault();
		$("#published-load-btn .spinner-border").fadeIn();

		fetchPosts(
			"get_published_posts",
			publishedPostOffset,
			function (error, response) {
				$("#published-load-btn .spinner-border").fadeOut();

				if (!error) {
					renderPosts(response, "published", publishedPostTable);

					publishedPostOffset = publishedPostOffset + response.length;

					if (response.length < 10) {
						$("#published-load-btn").prop("disabled", true);
					}
				}
				// Handle error with an else clause
			}
		);
	});

	// Fetches posts from server
	function fetchPosts(action, offset, callback) {
		$.ajax({
			url: ajaxurl,
			type: "POST",
			data: {
				action,
				offset,
			},
			success: function (response) {
				callback(null, response);
			},
			error: function (xhr, status, error) {
				callback(error, null);
			},
		});
	}

	// Publish the draft posts
	function publishPost(post, button, tr) {
		// Check if the user has enough tokens to publish the post

		if (currentUserToken < 5) {
			alert(
				"You do not have enough coin to publish your competition, please buy token."
			);
			return;
		}

		button.innerText = "Publishing...";

		var data = {
			action: "publish_post",
			post_id: post.id,
		};

		$.ajax({
			url: ajaxurl,
			type: "POST",
			data,
			success: function (response) {
				const recentlyPublishedPost = createPostComponent(post, "published");
				publishedPostTable.prepend(recentlyPublishedPost);
				tr.remove();
				currentUserToken = currentUserToken - 5;
				currentUserTokenEl.innerHTML = currentUserToken.toString();
			},
			error: function (xhr, status, error) {
				console.log(error);
			},
		});
	}

	// Make the published posts featured
	function makeFeatured(post, button, tr) {
		// Check if the user has enough tokens to publish the post

		if (currentUserToken < 10) {
			alert(
				"You do not have enough coin to make your competition Featured, please buy token."
			);
			return;
		}

		button.innerText = "Making...";

		var data = {
			action: "make_featured_post",
			post_id: post.id,
		};

		$.ajax({
			url: ajaxurl,
			type: "POST",
			data,
			success: function (response) {
				const recentFeaturedPost = createPostComponent(post, "featured");

				featuredPostTable.prepend(recentFeaturedPost);

				tr.remove();

				currentUserToken = currentUserToken - 10;
				currentUserTokenEl.innerHTML = currentUserToken.toString();
			},
			error: function (xhr, status, error) {
				console.log(error);
			},
		});
	}

	// Render posts
	function renderPosts(posts, postType, parent) {
		posts.forEach(function (post) {
			const postComponent = createPostComponent(post, postType);
			parent.appendChild(postComponent);
		});
	}

	// Create a post component
	function createPostComponent(post, postType) {
		const tr = document.createElement("tr");

		const postTitle = document.createElement("td");
		postTitle.innerText = post.title;

		const postBtn = document.createElement("td");
		const button = document.createElement("button");
		button.className =
			postType === "draft"
				? "btn btn-primary btn-small"
				: "btn btn-success btn-small";
		button.innerText = postType === "draft" ? "Publish" : "Make Featured";
		postBtn.appendChild(button);

		tr.appendChild(postTitle);

		if (postType === "featured" || postType === "published") {
			const postExp = document.createElement("td");
			postExp.innerText = post.expires;
			tr.appendChild(postExp);
		}

		if (postType === "draft" || postType === "published") {
			tr.appendChild(postBtn);
		}

		if (postType === "draft") {
			button.addEventListener("click", function () {
				publishPost(post, button, tr);
			});
		}

		if (postType === "published") {
			button.addEventListener("click", function () {
				makeFeatured(post, button, tr);
			});
		}

		return tr;
	}
});
