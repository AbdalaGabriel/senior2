
var app = app  ||{};

(function (o){
	
	"use strict";

	// metodos privador

	var ajax, getFormData, setProgress;


	ajax = function(data){

		var xmlhttp = new XMLHttpRequest(), uploaded;

		xmlhttp.open("post", o.options.procesador ); // va a hacer un ajax request
		xmlhttp.send(data);
	};

	getFormData = function(source){

		var data = new FormData(), i;

		for(i = 0; i<source.length; i = i++){

			console.log ("hola");
		}


	};

	setProgress = function(value){


	};

	o.uploader = function (options){

		o.options = options; //se hace publica
		console.log(o.options);

		if(o.options.files !== undefined){

			ajax(getFormData(o.options.archivos.files));
			
		}
	}

}(app));

