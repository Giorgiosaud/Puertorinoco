<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => "O :attribute deve ser aceito..",
	"active_url"           => "O :attribute não é uma URL válida.",
	"after"                => "O :attribute deve ser uma data após a :date.",
	"alpha"                => "O :attribute só pode conter letras.",
	"alpha_dash"           => "O :attribute só pode conter letras, números e traços.",
	"alpha_num"            => "O :attribute só pode conter letras e números.",
	"array"                => "O :attribute deve ser uma matriz.",
	"before"               => "O :attribute deve ser uma data anterior :date.",
	"between"              => [
		"numeric" => "O :attribute deve ser entre :min e :max.",
		"file"    => "O :attribute deve ser entre :min e :max kilobytes.",
		"string"  => "O :attribute deve ser entre :min e :max characters.",
		"array"   => "O :attribute must have entre :min e :max items.",
	],
	"boolean"              => "O campo :attribute  deve ser verdadeiro ou falso.",
	"confirmed"            => "O :attribute confirmação não corresponde.",
	"date"                 => "O :attribute não é uma data válida.",
	"date_format"          => "O :attribute não coincide com o formato :format.",
	"different"            => "O :attribute e :other deve ser diferente.",
	"digits"               => "O :attribute deve ser :digits dígitos.",
	"digits_between"       => "O :attribute deve ser entre :min e :max dígitos.",
	"email"                => "O :attribute deve ser a endereço de email válido.",
	"filled"               => "O campo :attribute  é necessário.",
	"exists"               => "O selected :attribute é inválido.",
	"image"                => "O :attribute deve ser an image.",
	"in"                   => "O selected :attribute é inválido.",
	"integer"              => "O :attribute deve ser um inteiro.",
	"ip"                   => "O :attribute deve ser um endereço IP válido.",
	"max"                  => [
		"numeric" => "O :attribute não pode ser maior que:max.",
		"file"    => "O :attribute não pode ser maior que:max kilobytes.",
		"string"  => "O :attribute não pode ser maior que:max characters.",
		"array"   => "O :attribute não pode ter qualquer mais de :max itens.",
	],
	"mimes"                => "O :attribute deve ser um arquivo do tipo: :values.",
	"min"                  => [
		"numeric" => "O :attribute deve ser pelo menos :min.",
		"file"    => "O :attribute deve ser pelo menos :min kilobytes.",
		"string"  => "O :attribute deve ser pelo menos :min caracteres.",
		"array"   => "O :attribute must have pelo menos :min itens.",
	],
	"not_in"               => "O selected :attribute é inválido.",
	"numeric"              => "O :attribute deve ser um número.",
	"regex"                => "O :attribute format é inválido.",
	"required"             => "O campo :attribute  é necessário.",
	"required_if"          => "O campo :attribute  é necessário quando :other é :value.",
	"required_with"        => "O campo :attribute  é necessário quando :values está presente.",
	"required_with_all"    => "O campo :attribute  é necessário quando :values está presente.",
	"required_without"     => "O campo :attribute  é necessário quando :values não está presente.",
	"required_without_all" => "O campo :attribute  é necessário quando nenhum :values são present.",
	"same"                 => "O :attribute and :other must match.",
	"size"                 => [
		"numeric" => "O :attribute deve ser :size.",
		"file"    => "O :attribute deve ser :size kilobytes.",
		"string"  => "O :attribute deve ser :size caracteres.",
		"array"   => "O :attribute deve conter :size itens.",
	],
	"unique"               => "O :attribute já foi tomada.",
	"url"                  => "O :attribute formato e inválido.",
	"timezone"             => "O :attribute deve ser uma zona válida.",

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
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => [],

];
