var menuFlag = false;

$(".menuTrigger").click(function(){

	if(!menuFlag){

		//alert("hola");
		menuFlag = true;

		$(".menu").css("display", "block");
		$(".menu").css("opacity", "1");

	} else {

		//alert("chau");
		menuFlag = false;
		$(".menu").css("display", "none");
		$(".menu").css("opacity", "0");


	}

})