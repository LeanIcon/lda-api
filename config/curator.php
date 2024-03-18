<?php

return [
    'glide_token' => env('CURATOR_GLIDE_TOKEN'),
    'is_limited_to_directory' => false,
    'is_tenant_aware' => true,
    'tenant_ownership_relationship_name' => 'tenant',
    'model' => \Awcodes\Curator\Models\Media::class,
    'path_generator' => true,
    'resource' => [
        'label' => 'Media',
        'plural_label' => 'Media',
        'default_layout' => 'grid',
        'navigation' => [
            'group' => true,
            'icon' => 'heroicon-o-photo',
            'sort' => true,
            'should_register' => true,
            'should_show_badge' =>true,
        ],
        'resource' => \Awcodes\Curator\Resources\MediaResource::class,
        'pages' => [
            'create' => \Awcodes\Curator\Resources\MediaResource\CreateMedia::class,
            'edit' => \Awcodes\Curator\Resources\MediaResource\EditMedia::class,
            'index' => \Awcodes\Curator\Resources\MediaResource\ListMedia::class,
        ],
    ]
];
