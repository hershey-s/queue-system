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
	

});