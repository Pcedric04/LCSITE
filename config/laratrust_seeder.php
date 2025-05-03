<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadministrateur' => [
            'flash'=> 'i,c,r,u,d,t,s',
            'categories'=> 'i,c,r,u,d,t,s',
            'souscategories'=> 'i,c,r,u,d,t,s',
            'posts'=> 'i,c,r,u,d,t,s',
            'comments'=> 'i,c,r,u,d,t,s',
            'agendas'=> 'i,c,r,u,d,t,s',
            'videos'=> 'i,c,r,u,d,t,s',
            'audios'=> 'i,c,r,u,d,t,s',
            'albums'=> 'i,c,r,u,d,t,s',
            'projets'=> 'i,c,r,u,d,t,s',
            'publications'=> 'i,c,r,u,d,t,s',
            'capitalisation'=> 'i,c,r,u,d,t,s',
            'citoyennetes'=> 'i,c,r,u,d,t,s',
            'etudes'=> 'i,c,r,u,d,t,s',
            'fiches'=> 'i,c,r,u,d,t,s',
            'users' => 'i,c,r,u,d,t,s',
            'roles'=> 'i,c,r,u,d,t,s',
            'permissions'=> 'i,c,r,u,d,t,s',
            'logs'=> 'i,c,r,u,d,t,s',
            'regions'=> 'i,c,r,u,d,t,s',
            'provinces'=> 'i,c,r,u,d,t,s'
        ],
        'administrateur' => [
            'flash'=> 'i,c,r,u,d,s',
            'categories'=> 'i,c,r,u,d,s',
            'souscategories'=> 'i,c,r,u,d,s',
            'posts'=> 'i,c,r,u,d,s',
            'comments'=> 'i,c,r,u,d,s',
            'agendas'=> 'i,c,r,u,d,s',
            'videos'=> 'i,c,r,u,d,s',
            'audios'=> 'i,c,r,u,d,s',
            'albums'=> 'i,c,r,u,d,s',
            'projets'=> 'i,c,r,u,d,s',
            'publications'=> 'i,c,r,u,d,s',
            'capitalisation'=> 'i,c,r,u,d,s',
            'citoyennetes'=> 'i,c,r,u,d,s',
            'etudes'=> 'i,c,r,u,d,s',
            'fiches'=> 'i,c,r,u,d,s',
            'users' => 'i,c,r,u,d,s',
            'roles'=> 'i,c,r,u,d,s',
            'permissions'=> 'i,c,r,u,d,s',
            'logs'=> 'i,c,r,u,d,s',
            'regions'=> 'i,c,r,u,d,s',
            'provinces'=> 'i,c,r,u,d,s'
        ],
        'redacteur' => [
            'posts' => 'i,c,r,u,d'
        ]
    ],

    'permissions_map' => [
        'i' => 'index',
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        't' => 'restore',
        's' => 'status'
    ]
];
