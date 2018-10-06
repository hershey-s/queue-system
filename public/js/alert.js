function myFunction(){
    alert("Not Available");
}

function myDelete(){
    confirm("Confirm Delete?");
}

function backCategory(){
	window.location.href = '/AML/category';
}

function backSub(){
	window.location.href = '/AML/category';
}

function backType(){
	window.location.href = '/AML/category';
}

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

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}