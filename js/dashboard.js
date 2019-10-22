function mostrar()
{
	var menu = document.getElementsByClassName("navbar-expand-lg");
	menu[0].classList.remove("hidden-md-down");

	if($("#card_ctd").css("margin-top")=="16px")	
	 	$("#card_ctd").css("margin-top","4rem");

	else
		$("#card_ctd").css("margin-top","1rem");
}