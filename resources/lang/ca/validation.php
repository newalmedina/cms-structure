<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

    "accepted"         => ":attribute ha de ser acceptat.",
    "active_url"       => ":attribute no és un URL vàlid.",
    "after"            => ":attribute ha de ser una data posterior a :date.",
    "alpha"            => ":attribute només ha de contenir lletres.",
    "alpha_dash"       => ":attribute només ha de contenir lletres, nombres i guions.",
    "alpha_num"        => ":attribute només ha de contenir lletres i números.",
    "array"            => ":attribute ha de ser un conjunt.",
    "before"           => ":attribute ha de ser una data anterior a :date.",
    "between"          => [
        "numeric" => ":attribute ha d'estar entre :min - :max.",
        "file"    => ":attribute ha de pesar entre :min - :max kilobytes.",
        "string"  => ":attribute ha de tenir entre :min - :max caracteres.",
        "array"   => ":attribute ha de tenir entre :min - :max ítems.",
    ],
    "boolean"          => "El camp :attribute ha de tenir un valor vertader o fals.",
    "confirmed"        => "La confirmación de :attribute no coincide.",
    "date"             => ":attribute no es una fecha válida.",
    "date_format"      => ":attribute no corresponde al formato :format.",
    "different"        => ":attribute y :other deben ser diferentes.",
    "digits"           => ":attribute debe tener :digits dígitos.",
    "digits_between"   => ":attribute debe tener entre :min y :max dígitos.",
    "email"            => ":attribute no es un correo válido",
    "exists"           => ":attribute es inválido.",
    "filled"           => "El campo :attribute es obligatorio.",
    "image"            => ":attribute debe ser una imagen.",
    "in"               => ":attribute es inválido.",
    "integer"          => ":attribute debe ser un número entero.",
    "ip"               => ":attribute debe ser una dirección IP válida.",
    'json'             => 'El campo :attribute debe tener una string JSON válida.',
    "max"              => [
        "numeric" => ":attribute no debe ser mayor a :max.",
        "file"    => ":attribute no debe ser mayor que :max kilobytes.",
        "string"  => ":attribute no debe ser mayor que :max caracteres.",
        "array"   => ":attribute no debe tener más de :max elementos.",
    ],
    "mimes"            => ":attribute debe ser un archivo con formato: :values.",
    "min"              => [
        "numeric" => "El tamaño de :attribute debe ser de al menos :min.",
        "file"    => "El tamaño de :attribute debe ser de al menos :min kilobytes.",
        "string"  => ":attribute debe contener al menos :min caracteres.",
        "array"   => ":attribute debe tener al menos :min elementos.",
    ],
    "not_in"           => ":attribute es inválido.",
    "numeric"          => ":attribute debe ser numérico.",
    "regex"            => "El formato de :attribute es inválido.",
    "required"         => "El campo :attribute es obligatorio.",
    "required_if"      => "El campo :attribute es obligatorio cuando :other es :value.",
    "required_with"    => "El campo :attribute es obligatorio cuando :values está presente.",
    "required_with_all" => "El campo :attribute es obligatorio cuando :values está presente.",
    "required_without" => "El campo :attribute es obligatorio cuando :values no está presente.",
    "required_without_all" => "El campo :attribute es obligatorio cuando ninguno de :values estén presentes.",
    "same"             => ":attribute y :other deben coincidir.",
    "size"             => [
        "numeric" => "El tamaño de :attribute debe ser :size.",
        "file"    => "El tamaño de :attribute debe ser :size kilobytes.",
        "string"  => ":attribute debe contener :size caracteres.",
        "array"   => ":attribute debe contener :size elementos.",
    ],
    "string"           => "The :attribute must be a string.",
    "timezone"         => "El :attribute debe ser una zona válida.",
    "unique"           => ":attribute ya ha sido registrado.",
    "url"              => "El formato :attribute es inválido.",

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


    "password_difficulty" => "La contraseña introducida es demasiado sencilla.",

];
