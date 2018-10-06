//////////////////////////////////////////// MULTIPLE TABLES TO EXCEL ///////////////////////////////////////////////
//////////////////////////////////////////// MULTIPLE TABLES TO EXCEL ///////////////////////////////////////////////


var array1 = new Array();
    var array2 = new Array();
    var n = 11;
    for ( var x=1; x<=n; x++ ) {
        array1[x-1] = x;
        array2[x-1] = x + 'th';
    }

    var tablesToExcel = (function () {
        var uri = 'data:application/vnd.ms-excel;base64,'
        , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets>'
        , templateend = '</x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head>'
        , body = '<body>'
        , tablevar = '<table>{table'
        , tablevarend = '}</table><br><br>'
        , bodyend = '</body></html>'
        , worksheet = '<x:ExcelWorksheet><x:Name>'
        , worksheetend = '</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet>'
        , worksheetvar = '{worksheet'
        , worksheetvarend = '}'
        , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))) }
        , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }
        , wstemplate = ''
        , tabletemplate = '';

        return function (table, name, filename) {
            var tables = table;

            for (var i = 0; i < tables.length; ++i) {
                wstemplate += worksheet + worksheetvar + i + worksheetvarend + worksheetend;
                tabletemplate += tablevar + i + tablevarend;
            }

            var allTemplate = template + wstemplate + templateend;
            var allWorksheet = body + tabletemplate + bodyend;
            var allOfIt = allTemplate + allWorksheet;

            var ctx = {};
            for (var j = 0; j < tables.length; ++j) {
                ctx['worksheet' + j] = name[j];
            }

            for (var k = 0; k < tables.length; ++k) {
                var exceltable;
                var tableLoop = new Array();
                tableLoop = "AMLDataTable" + k;
                tableID = tableLoop.toString();
                if (!tables[k].nodeType) exceltable = document.getElementById(tableID);
                // if (!tables[k].nodeType) exceltable = document.getElementById(tables[k]);
                ctx['table' + k] = exceltable.innerHTML;
            }
            window.location.href = uri + base64(format(allOfIt, ctx));
        }
    })();



////////////////////////////////////// FETCHING EMAIL RECIPIENTS //////////////////////////////////////////////////
////////////////////////////////////// FETCHING EMAIL RECIPIENTS //////////////////////////////////////////////////


function fetchReceiver(r){
	var fetch = $.ajax({
		type: 'post',
		data: {
			'_token': $('input[name=_token]').val(),
			'emailtype': $('#emailtype').val(),
		},
		url: '/fetchemail',
		beforeSend: function(data){
	    },
		success: function(data){
			var emailvalue = fetch.responseText;
			var type = $("#emailtype").val();
			$("#email").val(emailvalue.replace(/['"]+/g, ''));
			if($("#email").val() == ''){
				$("#saveemail").html("Add New " + type + " Email");
			}
			else{
				$("#saveemail").html(type + " Email Already Exists! Edit!");
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
}


$(document).ready(function(){


///////////////////////////////////// ADDING EMAIL RECIPIENTS //////////////////////////////////////
///////////////////////////////////// ADDING EMAIL RECIPIENTS //////////////////////////////////////


	$("#emailtype").change(function() {
	  	if ($(this).val() == 'Admin') {
	    	$("#epassword").removeAttr("disabled");
	    	$("#epassword").removeAttr("style");
	    	// $("#saveemail").html("Admin Email Already Exists! Save Changes");
	    	fetchReceiver();
	  	}
	  	else if ($(this).val() == 'Receiver'){
	    	$("#epassword").attr("disabled", "disabled");
	    	$("#epassword").removeAttr("required");
	    	$("#epassword").attr('style', 'background-color: #EEEEEE !important');
	    	// $("#saveemail").html("Receiver Email Already Exists! Save Changes");
	    	fetchReceiver();
		}
		else {
	    	$("#epassword").attr("disabled", "disabled");
	    	$("#epassword").removeAttr("required");
	    	$('#epassword').attr('style', 'background-color: #EEEEEE !important');
	    	$("#saveemail").html("Add New CC Email");
	    	$("#email").val('');
		}
	}).trigger("change");


///////////////////////////////////// LOOPED AJAX REQUESTS ////////////////////////////////////////////////
///////////////////////////////////// LOOPED AJAX REQUESTS ////////////////////////////////////////////////


	var request = $.ajax({
		type: 'GET',
		url: '/home',
		success: function(data){
			function showLoading(){
		    	$('.loadingModal').show();
			}
			function hideLoading(){
			    $('.loadingModal').fadeOut();
			}
			$('#SPAsystem').html(request.responseText);
			$('#enter').click(allRes);


    ///////////////////////////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
   // 																													 \\  
  //------FUNCTIONS----------FUNCTIONS----------FUNCTIONS------------FUNCTIONS----------FUNCTIONS----------FUNCTIONS------\\
 //																														   \\
///////////////////////////////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
			

/////////////////////////////////////// GENERATE ALL RESULTS /////////////////////////////////////////////////////
/////////////////////////////////////// GENERATE ALL RESULTS /////////////////////////////////////////////////////


			function allRes(e){

		    	var jax = $.ajax({ 	
		    		type: 'post',
		    		data: {
		    			'_token': $('input[name=_token]').val(),
		    			'date': $('#cutoff').val(),
		    			'alertType': $('#alertSelect').val(),
		    		},
		    		url: '/system',
		    		beforeSend: function(data){
				    	showLoading();
				    },
		    		success: function(data){
		    			console.log(data);
		    			$('#SPAsystem').html(jax.responseText);
		    			$('.table').DataTable({
					        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
					        iDisplayLength: -1,
					        "bDestroy": true
					    });

					    $('.btnView').click(ViewTransInfo); 
					    $('.AddRedFlag').click(RedFlagAdd);
					    $('.btnHide').click(HideTemporary);
					    // $('.btnHide').click(function(){ 
					    // 	alert('WOW ' + $(this).attr("id"));
					    // });
					    $(this).attr("id");
					    hideLoading();
		    		},
		    		error: function(data){
				        var errors = "";
				        for(datos in data.responseJSON){
				            errors += data.responseJSON[datos]+'\n';
				        }
				        alert(errors);
				        hideLoading();
				    }
		    	});
		    	
				var jaxinclude = $.ajax({
		    		type: 'get',
		    		url: '/sidenav',
		    		beforeSend: function(data){
				    	showLoading();
				    },
		    		success: function(data){
		    			console.log(data);
		    			$('#sidenav').html(jaxinclude.responseText);
		    			$('#filter').click(filtered);
		    			$('#showall').click(function(){
		    				$('#cutoff').val($('#cutoffsel').val());
		    				allRes();
		    				$('#export').show();

		    			});
		    		hideLoading();
		    		},
		    		error: function(data){
				        var errors = "";
				        for(datos in data.responseJSON){
				            errors += data.responseJSON[datos]+'\n';
				        }
				        alert(errors);
				        hideLoading();
				    }
		    	});
			}


	//VIEW TRANS ------------------------ VIEW TRANS ------------------------ VIEW TRANS ------------------------ VIEW TRANS //
	//VIEW TRANS ------------------------ VIEW TRANS ------------------------ VIEW TRANS ------------------------ VIEW TRANS //
			

			function ViewTransInfo(){
				var clientid = $(this).attr("id");
				var categoryname = $(this).data('value')
			    var request = $.ajax({
			        url: '/ClientDetails',
			        headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
			        type: 'post',
			        data: {
			        	'_token' : $('meta[name="csrf-token"]').attr('content'),
			        	'clientid': clientid,
			        	'categoryname': categoryname
			        	//wait
			        },   
			        beforeSend: function(data){
				    	showLoading();
				    },
				    success: function(data){
				    	alert(categoryname);
				   		console.log(request.responseText);
				    },
			        success: function(data){
			        	
					    $('#dataModal').html(request.responseText);
					    $('#dataModal').modal("show");
					    hideLoading();
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
					    var filename = $('#HH').html() + ' ' + completedate/* + ' at ' + completetime*/;
					    var rowCount = $('#AMLModalTable5 tr').length - 1;
					    if(rowCount > 0){
						    $('#AMLModalTable5').DataTable({
						        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
			        			iDisplayLength: -1,
						        dom: 'Blfrtip',
						        buttons: [
						            { extend: 'copyHtml5', title: filename, text: "Copy Data" }, 
						            { extend: 'excelHtml5', title: filename, text: "Export to Excel" }, 
						            { extend: 'pdfHtml5', orientation: 'landscape', pageSize: 'a4', title: filename, text: "Export to PDF", 
						            	customize: function (doc) {
									    	doc.content[1].table.widths = 
									        Array(doc.content[1].table.body[0].length + 1).join('*').split('');
										}
						            }, 
						            { extend: 'print', orientation: 'landscape', pageSize: 'a4', title: filename }
						        ],
						        "bDestroy": true
						    });
						}
						else{
							//Put code here, if anything comes in mind.
						}
					},  
			        error: function(data){
			            var errors = "";
			            for(datos in data.responseJSON){
			                errors += data.responseJSON[datos]+'\n';
			            }
			            alert(errors);
			            hideLoading();
			        }
			    });
			}


	//////////////////////////////////////////HIDE TEMPORARY//////////////////////////////////////////////////
	//////////////////////////////////////////HIDE TEMPORARY//////////////////////////////////////////////////
			

			function HideTemporary(){
				var hideid = $(this).attr("id");
				var hide = $.ajax({
				url: '/hidetemporary?id='+hideid,
			        type: "GET",
			        contentType: false,       
			        cache: false,      
			        processData:false,   
			        beforeSend: function(data){
				    	showLoading();
				    },

			        success: function(data){
						$('#dataModal').html(hide.responseText);
					    $('#dataModal').modal("show");
					    $('.hidebtns').click(function(e){
					    	var hiderow = $('#idclient').val();
					    	e.preventDefault();
					    	$.ajax({
					    		type: 'POST',
					    		url: '/hide',
					    		data: {
					    			'_token': $('input[name=_token]').val(),
					    			'idclient':   $('#idclient').val(),
					    			'remarks':    $('#hideremarks').val(),
					    			'term': $('#term').val(),
					    			'datehide': $('#datehide').val(),
					    			'hidetype': $('#hidetype').val(),
					    			'insertedby': $('#insertedby').val(),
					    		},
					    		beforeSend: function(data){
							    	showLoading();
							    },
					    		success: function(data){
									if((data.errors)){
										hideLoading();
									}
									else{
										$('.hidebtns').hide();
										$('#hide'+hiderow).hide();
										$("hr").hide();
										var title = $('#clientname').val();
										$("#modaltitle").text(title+' has been hidden for ' + $('#term').val() + ' days.');
										console.log(data);
										hideLoading();
									}
					    		},
					    		error: function(data){
							        var errors = "";
							        for(datos in data.responseJSON){
							            errors += data.responseJSON[datos]+'\n';
							        }alert(errors);
							        hideLoading();
							    }
					    	});
					    });
					    hideLoading();
					},
			        error: function(data){
			            var errors = "";
			            for(datos in data.responseJSON){
			                errors += data.responseJSON[datos]+'\n';
			            }alert(errors);
			            hideLoading();
			        }
				});
			}


	//ADD RED FLAG ---------------- ADD RED FLAG ---------------- ADD RED FLAG ---------------- ADD RED FLAG ---------------- ADD RED FLAG //
	//ADD RED FLAG ---------------- ADD RED FLAG ---------------- ADD RED FLAG ---------------- ADD RED FLAG ---------------- ADD RED FLAG //
	

			function RedFlagAdd(){
				var id = $(this).attr("id");
				var request = $.ajax({
				url: '/WriteReport?id='+id,
			        type: "GET",
			        contentType: false,       
			        cache: false,      
			        processData:false,   
			        beforeSend: function(data){
				    	showLoading();
				    },
			        success: function(data){
						$('#dataModal').html(request.responseText);
					    $('#dataModal').modal("show");
					    $('#add').click(function(e){
					    	e.preventDefault();
					    	$.ajax({
					    		type: 'POST',
					    		url: '/adddd',
					    		data: {
					    			'_token': $('input[name=_token]').val(),
					    			'clientid':   $('#clientid').val(),
					    			'clientname': $('#clientname').val(),
					    			'reason':     $('#reasonid').val(),
					    			'remarks':    $('#remarks').val(),
					    			'riskrating': $('#saveform input[name=riskrating]:checked').val(),
					    			'cutoffdate': $('#cutoffdate').val(),
					    			'insertedby': $('#insertedby').val(),
					    		},
					    		beforeSend: function(data){
							    	showLoading();
							    },
					    		success: function(data){
									if((data.errors)){
										hideLoading();
										alert("Error! Reason, Remarks or Risk Rating is empty.");

									}
									else{
										$('.error').remove();
										$('#add').hide();
										$("hr").hide();
										var title = $('#clientname').val();
										$("#modaltitle").text(title+' has been marked as suspiscous.');
										console.log(data);
										hideLoading();
									}
					    		},
					    		error: function(data){
							        var errors = "";
							        for(datos in data.responseJSON){
							            errors += data.responseJSON[datos]+'\n';
							        }alert(errors);
							        hideLoading();
							    }
					    	});
					    });
					    hideLoading();
					},
			        error: function(data){
			            var errors = "";
			            for(datos in data.responseJSON){
			                errors += data.responseJSON[datos]+'\n';
			            }alert(errors);
			            hideLoading();
			        }
				});
			}


	// FILTER FUNCTION --------------------- FILTER FUNCTION --------------------- FILTER FUNCTION --------------------- FILTER FUNCTION //
	// FILTER FUNCTION --------------------- FILTER FUNCTION --------------------- FILTER FUNCTION --------------------- FILTER FUNCTION //
		

			function filtered(e){
				e.preventDefault();
		    	var filteredjax = $.ajax({
		    		type: 'post',
		    		data: {
		    			'_token': $('input[name=_token]').val(),
		    			'date': $('#cutoffsel').val(),
		    			'alertType': $('#alerttypesel').val(),
		    		},
		    		url: '/filtered',
		    		beforeSend: function(data){
				    	showLoading();
				    },
		    		success: function(data){
		    			console.log(data);
		    			$('#export').hide();
		    			$('#SPAsystem').html(filteredjax.responseText);
		    			hideLoading();
		    			$('.table').DataTable({
					        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
					        iDisplayLength: -1,
					        "bDestroy": true
					    });
					    $('.btnView').click(ViewTransInfo);
					    $('.AddRedFlag').click(RedFlagAdd);
					    $('.btnHide').click(HideTemporary);

					    
		    		},
		    		error: function(data){
				        var errors = "";
				        for(datos in data.responseJSON){
				            errors += data.responseJSON[datos]+'\n';
				        }
				        alert(errors);
				        hideLoading();
				    }
		    	})
		    }		  
		},

  //\\    //\\    //\\    //\\    //\\    //\\    //\\    //\\    //\\    //\\    //\\    //\\    //\\    //\\    //\\    //\\    //\\    //\\    //\\    //\\    //\\    //\\    //\\    //\\    //
 //  \\  //  \\  //  \\  //  \\  //  \\  //  \\  //  \\  //  \\  //  \\  //  \\  //  \\  //  \\  //  \\  //  \\  //  \\  //  \\  //  \\  //  \\  //  \\  //  \\  //  \\  //  \\  //  \\  //  \\  //
//    \\//    \\//    \\//    \\//    \\//    \\//    \\//    \\//    \\//    \\//    \\//    \\//    \\//    \\//    \\//    \\//    \\//    \\//    \\//    \\//    \\//    \\//    \\//    \\//
		

		error: function(data){
	        var errors = "";
	        for(datos in data.responseJSON){
	            errors += data.responseJSON[datos]+'\n';
	        }
	        alert(errors);
	        hideLoading();
	    }
	});
});

