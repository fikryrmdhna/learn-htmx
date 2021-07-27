function closeModal() {
	let container = document.getElementById("modals-here")
	let backdrop = document.getElementById("modal-backdrop")
	let modal = document.getElementById("modal")

	modal.classList.remove("show")
	backdrop.classList.remove("show")

	setTimeout(function() {
		container.removeChild(backdrop)
		container.removeChild(modal)
	}, 200)
}

$(document).ready(function(){
	$('.edit-button').on('click', function(){
		$('#editModal').modal('show')
		// alert($(this).data('id'))

		let id = $(this).data('id');
		let activity = $('#' + id).children('td[data-target="activity"]').text()

		$('#activity-val').val(activity)
	})

	$('#editSave').on('click', function(){
		let id = $('#editId').val(),
			activity = $('#activity-val').val();

		$.ajax({
			url :'edit.php',
			method : 'post',
			data: {activity:activity},
			success : function(response){
				// console.log(response)
				$('#' + id).children('td[data-target="activity"]').text()
			}
		})
	});
});