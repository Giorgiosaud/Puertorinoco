<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| El following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => "El :attribute debe ser aceptado.",
	"active_url"           => "El :attribute no es una pagina web valida.",
	"after"                => "El :attribute debe ser un dia despues de :date.",
	"alpha"                => "El :attribute solo debe tener letras.",
	"alpha_dash"           => "El :attribute solo debe tener letras, numeros, y guiones.",
	"alpha_num"            => "El :attribute solo debe tener letras y numeros.",
	"array"                => "El :attribute debe ser un array.",
	"before"               => "El :attribute debe ser un dia antes de :date.",
	"between"              => [
		"numeric" => "El :attribute debe ser entre :min y :max.",
		"file"    => "El :attribute debe ser entre :min y :max kilobytes.",
		"string"  => "El :attribute debe ser entre :min y :max caracteres.",
		"array"   => "El :attribute debe tener entre :min y :max items.",
	],
	"boolean"              => "El :attribute field debe ser verdadero o false.",
	"confirmed"            => "La Confirmacion del :attribute no coincide.",
	"date"                 => "El :attribute no es una fecha valida.",
	"date_format"          => "El :attribute no coincide con el formato :format.",
	"different"            => "El :attribute y :other deben ser diferentes.",
	"digits"               => "El :attribute debe ser :digits digitos.",
	"digits_between"       => "El :attribute debe ser entre :min y :max digitos.",
	"email"                => "El :attribute debe ser una direccion de email valido.",
	"filled"               => "El :attribute field is required.",
	"exists"               => "El :attribute seleccionado es invalido.",
	"image"                => "El :attribute debe ser an image.",
	"in"                   => "El selected :attribute is invalid.",
	"integer"              => "El :attribute debe ser an integer.",
	"ip"                   => "El :attribute debe ser a valid IP address.",
	"max"                  => [
		"numeric" => "El :attribute may not be greater than :max.",
		"file"    => "El :attribute may not be greater than :max kilobytes.",
		"string"  => "El :attribute may not be greater than :max caracteres.",
		"array"   => "El :attribute may not have more than :max items.",
	],
	"mimes"                => "El :attribute debe ser a file of type: :values.",
	"min"                  => [
		"numeric" => "El :attribute debe ser de almenos :min.",
		"file"    => "El :attribute debe ser de almenos :min kilobytes.",
		"string"  => "El :attribute debe ser de almenos :min caracteres.",
		"array"   => "El :attribute debe tener almenos :min elementos.",
	],
	"not_in"               => "El :attribute seleccionado es invalido.",
	"numeric"              => "El :attribute debe ser un numero.",
	"regex"                => "El formato del :attribute es invalido.",
	"required"             => "El campo :attribute es requerido.",
	"required_if"          => "El campo :attribute es requerido cuando :other es :value.",
	"required_with"        => "El campo :attribute es requerido cuando :values existe.",
	"required_with_all"    => "El campo :attribute es requerido cuando :values existe.",
	"required_without"     => "El campo :attribute es requerido cuando :values no existe.",
	"required_without_all" => "El campo :attribute es requerido cuando ninguno de los :values existen.",
	"same"                 => "El :attribute y :other must match.",
	"size"                 => [
		"numeric" => "El :attribute debe ser :size.",
		"file"    => "El :attribute debe ser :size kilobytes.",
		"string"  => "El :attribute debe ser :size caracteres.",
		"array"   => "El :attribute debe contener :size elementos.",
	],
	"unique"               => "El :attribute ya existe.",
	"url"                  => "El formato del :attribute es invalido.",
	"timezone"             => "El :attribute debe ser una zona horaria valida.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| El following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => [],

];
