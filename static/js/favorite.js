function addEventListenerToFavoriteBtn() {
	const favoriteBtns = document.querySelectorAll(".favorite-btn");
	favoriteBtns.forEach((btn) =>
		btn.addEventListener("click", (event) => {
			console.log("clicked");
		})
	);
}

addEventListenerToFavoriteBtn();
