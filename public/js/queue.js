$(document).ready(function() {
	$('.details').DataTable({
	    "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
	    iDisplayLength: -1,
	    "bDestroy": true
	});


	setInterval(function() { 
		var activeTab = $('.queues').find('.active').data('id');
		console.log(activeTab);
		axios.post('/realtime-queue', {
			activeTab:activeTab
		})
			.then(function (response) {
				$('.ult').html(response.data);
			})
			.catch(function (error) {
			// handle error
			console.log(error);
			})
			.then(function () {
			// always executed
			});

	}, 2000);

	setInterval(function() {
		axios.get('/client-realtime', {
		})
			.then(function (response) {
				$('.client').html(response.data);
			})
			.catch(function (error) {
			// handle error
			console.log(error);
			})
			.then(function () {
			// always executed
			});

	}, 2000);
	
	$('.edit-master').click(function() {
	    var dt = $(this).data('data')
	    var action = $(this).data('url')
	    $('#updateID').val(dt.masterID)
	    $('#updateID').closest('.form-line').addClass('focused')
	    $('#edit-name').val(dt.patientName)
	    $('#edit-name').closest('.form-line').addClass('focused')
	    $('#edit-doc').val(dt.doctorInCharge)
	    $('#edit-doc').closest('.form-line').addClass('focused')
	    $('#edit-checkup').val(dt.checkupDescription)
	    $('#edit-checkup').closest('.form-line').addClass('focused')
	    $('#edit-date').val(dt.checkupDate)
	    $('#edit-date').closest('.form-line').addClass('focused')
	})
});