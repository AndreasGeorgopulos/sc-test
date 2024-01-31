<?php
return [
    'person' => [
        'root_name' => 'people',
        'item_name' => 'person',
        'item_children' => [
            'ADOAZONOSITOJEL' => [
                'field' => 'tax_number',
                'rules' => ['digits:10', 'unique:people'],
                'messages' => [
                    'digits' => 'Az ADOAZONOSITOJEL 10 karakter hosszú kell legyen és csak számokat tartalmazhat',
                    'unique' => 'Az ADOAZONOSITOJEL már fel van véve',
                ],
            ],
            'TELJESNEV' => [
                'field' => 'full_name',
                'rules' => ['required'],
                'messages' => [
                    'required' => 'TELJESNEV nincs megadva',
                ],
            ],
            'AZONOSITO' => [
                'field' => 'id',
                'rules' => ['required', 'integer', 'unique:people'],
                'messages' => [
                    'required' => 'AZONOSITO nincs megadva',
                    'integer' => 'Az AZONOSITO szám kell legyen',
                    'unique' => 'Az AZONOSITO már fel van véve',
                ],
            ],
            'EGYEBID' => [
                'field' => 'other_id',
                'rules' => ['required', 'integer'],
                'messages' => [
                    'required' => 'EGYEBID nincs megadva',
                    'integer' => 'Az EGYEBID szám kell legyen',
                ],
            ],
            'BELEPES' => [
                'field' => 'login_at',
                'rules' => ['required', 'date_format:Y.m.d'],
                'messages' => [
                    'required' => 'BELEPES nincs megadva',
                    'date_format' => 'BELEPES dátum formátuma nem megfelelő',
                ],
            ],
            'KILEPES' => [
                'field' => 'logout_at',
                'rules' => ['required', 'date_format:Y.m.d', 'after:login_at'],
                'messages' => [
                    'required' => 'KILEPES nincs megadva',
                    'date_format' => 'KILEPES dátum formátuma nem megfelelő',
                    'after' => 'KILEPES értéke nagyobb kell legyen, mint a BELEPES',
                ],
            ],
            'EMAILCIM' => [
                'field' => 'email',
                'rules' => ['email', 'unique:people'],
                'messages' => [
                    'email' => 'EMAILCIM formátuma nem megfelelő',
                    'unique' => 'Az EMAILCIM már fel van véve',
                ],
            ],
        ],
    ]
];
