function closeModal() {
	let container = document.querySelector(".modal-open")
	let backdrop = document.querySelector(".modal-backdrop")
	let modal = document.querySelector(".modal")

	modal.classList.remove("show")
	backdrop.classList.remove("show")

	setTimeout(function() {
		container.removeChild(backdrop)
		container.removeChild(modal)
	}, 200)
}