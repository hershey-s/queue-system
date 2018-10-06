

//DataTables Per Page Display
$(document).ready(function(){
    // $('.table').DataTable({
    //     "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
    //     iDisplayLength: -1
    // });
});

//Logout

$('#logoutLink').click(function(){
	$('#logoutForm').submit();
});

function logout(){
	$('#logoutForm').submit();
}

$('#logoutLink').click(function(){
	$('#logoutForm2').submit();
});

function logout2(){
	$('#logoutForm2').submit();
}

$('#logoutLink').click(function(){
    $('#logoutForm3').submit();
});

function logout3(){
    $('#logoutForm3').submit();
}

$(document).ready(function(){

	var obj = new Date();
	var mon = obj.getMonth() + 1; //months from 1-12
	var day = obj.getDate();
	var yrs = obj.getFullYear();
	var hrs = obj.getHours();
    var min = obj.getMinutes();
    var sec = obj.getSeconds();
  	var apm = hrs >= 12 ? 'pm' : 'am';
  	    hrs = hrs % 12;
  	    hrs = hrs ? hrs : 12; // the hour '0' should be '12'
  	    min = ('0'+min).slice(-2);
	var completedate = yrs + "-" + mon + "-" + day;
	var completetime = hrs + "." + min + "." + sec + apm;

	$('.btnView').click(function(){
	    var id = $(this).attr("id");
	    var request = $.ajax({
	        url: '/ClientDetails?id='+id,
	        type: "GET",
	        //data: {"_token": $('meta[name="csrf-token"]').attr('content')},
	        contentType: false,       
	        cache: false,      
	        processData:false,   
	        beforeSend: function(data){
	            // loading animations kahit ano
	        },
	        success: function(data){
	        	
			    $('#dataModal').html(request.responseText);
			    $('#dataModal').modal("show");
			    var filename = $('#HH').html() + ' ' + completedate/* + ' at ' + completetime*/;
			    $('.table').DataTable({
			        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        			iDisplayLength: -1,
			        dom: 'Blfrtip',
			        buttons: [
			            { extend: 'copyHtml5', title: filename, text: "Copy Data" }, 
			            { extend: 'excelHtml5', title: filename, text: "Export to Excel" }, 
			            { extend: 'pdfHtml5', orientation: 'landscape', pageSize: 'a4', title: filename, text: "Export to PDF" }, 
			            { extend: 'print', orientation: 'landscape', pageSize: 'a4', title: filename}
			        ]
			    });
			},
	        error: function(data){
	            var errors = "";
	            for(datos in data.responseJSON){
	                errors += data.responseJSON[datos]+'\n';
	            }
	            alert(errors);
	        }
	    });
	});

	// $('.AddRedFlag').click(function(){
	//     var id = $(this).attr("id");
	//     var request = $.ajax({
	//         url: '/WriteReport?id='+id,
	//         type: "GET",
	//         contentType: false,       
	//         cache: false,      
	//         processData:false,   
	//         beforeSend: function(data){
	//             // loading animations kahit ano
	//         },
	//         success: function(data){
	// 		    $('#dataModal').html(request.responseText);
	// 		    $('#dataModal').modal("show");
	// 		},
	//         error: function(data){
	//             var errors = "";
	//             for(datos in data.responseJSON){
	//                 errors += data.responseJSON[datos]+'\n';
	//             }
	//             alert(errors);
	//         }
	//     });
	// });


//SHOW AJAX MODAL FOR ADDING REDFLAGS
	$('.AddRedFlag').click(function(){
		var id = $(this).attr("id");
		var request = $.ajax({
		url: '/WriteReport?id='+id,
	        type: "GET",
	        contentType: false,       
	        cache: false,      
	        processData:false,   
	        beforeSend: function(data){
	            // loading animations kahit ano
	        },
	        success: function(data){
				$('#dataModal').html(request.responseText);
			    $('#dataModal').modal("show");
			    $('#add').click(function(e){
			    	e.preventDefault();
			    	$.ajax({
			    		type: 'GET',
			    		url: '/adddd',
			    		data: {
			    			'clientid':   $('#clientid').val(),
			    			'clientname': $('#clientname').val(),
			    			'reason':     $('#reasonid').val(),
			    			'remarks':    $('#remarks').val(),
			    			'riskrating': $('#saveform input[name=riskrating]:checked').val(),
			    			'cutoffdate': $('#cutoffdate').val(),
			    			'insertedby': $('#insertedby').val(),
			    		},
			    		success: function(data){
							if((data.errors)){
								alert("Error! Reason, Remarks or Risk Rating is empty.");
							}
							else{
								$('.error').remove();
								$('#add').hide();
								$("hr").hide();
								var title = $('#clientname').val();
								$("#modaltitle").text(title+' has been marked as suspiscous.');
								console.log(data);
							}
			    			
			    		},
			    		error: function(data){
					        var errors = "";
					        for(datos in data.responseJSON){
					            errors += data.responseJSON[datos]+'\n';
					        }
					        alert(errors);
					    }
			    	});
			    });
			},
	        error: function(data){
	            var errors = "";
	            for(datos in data.responseJSON){
	                errors += data.responseJSON[datos]+'\n';
	            }
	            alert(errors);
	        }
		});

	});

	
});


// var dtTbl = tbl.DataTable({
//     dom: 'Bt',
//     buttons: [{
//             extend: "pdfHtml5",
//             title: "Report",
//             customize: function(doc) {
//                 console.log(doc.content)
//                 doc.content.splice(0, 0, {
//                     margin: [12, 0, 0, 12],
//                     alignment: "center",
//                 });

//                 doc.content[2].table.widths = ["*", "*", "*"];
//             }]
//     })

			 //    $('#add').click(function(event){
				// 	event.preventDefault();
				// 	$.ajax({
				// 		type: "POST",
				// 		url: "/adddd",
				// 		data: {
				// 			'_token': $('input[name=_token]').val(),
				// 			'ClientID': $('inpunt[name=clientid').val(),
				// 			'ClientName': $('inpunt[name=clientname').val(),
				// 			'ReasonSTRID': $('inpunt[name=reason').val(),
				// 			'ReasonCode': $('inpunt[name=reasoncode').val(),
				// 			'ReasonDescription': $('inpunt[name=reasondescription').val(),
				// 			'Remarks': $('inpunt[name=remarks').val(),
				// 			'RiskRating': $('inpunt[name=riskrating').val(),
				// 			'CutOffDate': $('inpunt[name=cutoffdate').val(),
				// 			'InsertedBy': $('inpunt[name=insertedby').val(),
				// 		},
				// 		success: function(data){
							// if((data.errors)){
							// 	$('.error').removeClass('hidden');
							// 	$('.error').text(data.errors.clientid);
							// 	$('.error').text(data.errors.clientname);
							// 	$('.error').text(data.errors.reason);
							// 	$('.error').text(data.errors.remarks);
							// 	$('.error').text(data.errors.cutoffdate);
							// }
							// else{
							// 	$('.error').remove();
							// }
				// 		}
				// 	});
				// });