/*
 * jQuery stringToSlug plug-in 1.3
 *
 * Plugin HomePage http://leocaseiro.com.br/jquery-plugin-string-to-slug/
 *
 * Copyright (c) 2009 Leo Caseiro
 *
 * Based on Edson Hilios (http://www.edsonhilios.com.br/ Algoritm
 *
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */

jQuery.fn.suma = function(options) {
	var defaults = {
		setEvents: 'keyup keydown blur', //set Events that your script will work
		getPut: '#permalink', //set output field
	};

	var opts = jQuery.extend(defaults, options);

	jQuery(this).bind(defaults.setEvents, function () {
		var text = jQuery(this).val();
		text = defaults.prefix + text + defaults.suffix; //Concatenate with prefix and suffix
		text = text.replace(defaults.replace, ""); //replace
		text = jQuery.trim(text.toString()); //Remove side spaces and convert to String Object

		var chars = []; //Cria vetor de caracteres
		for (var i = 0; i < 32; i++) {
			chars.push ('');
		}

		var stringToSlug = new String (); //Create a stringToSlug String Object
		var lenChars = chars.length; // store length of the array
		for (var i = 0; i < text.length; i ++) {
			var cCAt = text.charCodeAt(i);
			if(cCAt < lenChars) stringToSlug += chars[cCAt]; //Insert values converts at slugs (if it exists in the array)
		}

		stringToSlug = stringToSlug.replace (new RegExp ('\\'+defaults.space+'{2,}', 'gmi'), defaults.space); // Remove any space character followed by Breakfast
		stringToSlug = stringToSlug.replace (new RegExp ('(^'+defaults.space+')|('+defaults.space+'$)', 'gmi'), ''); // Remove the space at the beginning or end of string

		stringToSlug = stringToSlug.toLowerCase(); //Convert your slug in lowercase


		jQuery(defaults.getPut).val(stringToSlug); //Write in value to input fields (input text, textarea, input hidden, ...)
		jQuery(defaults.getPut).html(stringToSlug); //Write in HTML tags (span, p, strong, h1, ...)

		if(defaults.callback!=false){
			defaults.callback(stringToSlug);
		}

		return this;
	});

  return this;
};
