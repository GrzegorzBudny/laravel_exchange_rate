<?php
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

return [
    'accepted'             => 'Pole :attribute musi zostać zaakceptowane.',
    'accepted_if'          => 'The :attribute must be accepted when :other is :value.',
    'accepted_if'          => 'Pole :attribute musi zostać zaakceptowane gdy :other ma wartość :value.',
    'active_url'           => 'Pole :attribute jest nieprawidłowym adresem URL.',
    'after'                => 'Pole :attribute musi być datą późniejszą od :date.',
    'after_or_equal'       => 'Pole :attribute musi być datą nie wcześniejszą niż :date.',

    'prohibited'           => 'Pole :attribute jest zabronione.',
    'prohibited_if'        => 'Pole :attribute jest zabronione, gdy :other to :value.',
    'prohibited_unless'    => 'Pole :attribute jest zabronione, chyba że :other jest w :values.',
    'prohibits'            => 'The :attribute field prohibits :other from being present.',
    'prohibits'            => 'Pole :attribute zabrania obecności :other.',
    'regex'                => 'Format pola :attribute jest nieprawidłowy.',
    'relatable'            => 'Ten :attribute może nie być powiązany z tym zasobem.',
    'required'             => 'Pole :attribute jest wymagane.',
    'required_if'          => 'Pole :attribute jest wymagane gdy :other ma wartość :value.',
    'required_unless'      => 'Pole :attribute jest wymagane jeżeli :other nie znajduje się w :values.',
    'required_with'        => 'Pole :attribute jest wymagane gdy :values jest obecny.',
    'required_with_all'    => 'Pole :attribute jest wymagane gdy wszystkie :values są obecne.',
    'required_without'     => 'Pole :attribute jest wymagane gdy :values nie jest obecny.',
    'required_without_all' => 'Pole :attribute jest wymagane gdy żadne z :values nie są obecne.',
    'same'                 => 'Pole :attribute i :other muszą być takie same.',
    'size'                 => [
        'array'   => 'Pole :attribute musi zawierać :size elementów.',
        'file'    => 'Pole :attribute musi mieć :size kilobajtów.',
        'numeric' => 'Pole :attribute musi mieć :size.',
        'string'  => 'Pole :attribute musi mieć :size znaków.',
    ],
    'starts_with'          => 'Pole :attribute musi zaczynać się jedną z następujących wartości: :values.',
    'string'               => 'Pole :attribute musi być ciągiem znaków.',
    'timezone'             => 'Pole :attribute musi być prawidłową strefą czasową.',
    'unique'               => 'Taki :attribute już występuje.',
    'uploaded'             => 'Nie udało się wgrać pliku :attribute.',
    'url'                  => 'Format pola :attribute jest nieprawidłowy.',
    'uuid'                 => 'Pole :attribute musi być poprawnym identyfikatorem UUID.',
    'custom'               => [
    'attribute-name' => [
        'rule-name' => 'custom-message',
    ],
],
];
