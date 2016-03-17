<?php

use Themosis\Facades\Field;
use Themosis\Facades\Page;
use Themosis\Facades\Section;

$page = Page::make('theme-option', 'Option du theme')->set();

$sections = [
    Section::make('theme-option-general', __('General', THEME_TEXT_DOMAIN)),
    Section::make('theme-option-typography', __('Typography', THEME_TEXT_DOMAIN)),
    Section::make('theme-option-info', __("Society Information", THEME_TEXT_DOMAIN)),
    Section::make('theme-option-social', __("Social Network", THEME_TEXT_DOMAIN)),
    Section::make('theme-option-custom-code', __('Code', THEME_TEXT_DOMAIN)),
    Section::make('theme-option-analytic', __('Analytics', THEME_TEXT_DOMAIN)),
    Section::make('theme-option-layout', __('Layouts', THEME_TEXT_DOMAIN)),
    Section::make('theme-option-image', __('Default Images', THEME_TEXT_DOMAIN))
];

$settings = [
    'theme-option-general' => [
        Field::text('name', ['title' => __('Name', THEME_TEXT_DOMAIN)]),

        Field::text('separator', [
            'title' => __('Title separator', THEME_TEXT_DOMAIN),
            'default' => '-'
        ]),

        Field::select('seplocation', [
            [
                'right' => __("Right", THEME_TEXT_DOMAIN),
                'left' => __("Left", THEME_TEXT_DOMAIN)
            ]
        ], [
            'title' => __("Title separator emplacement", THEME_TEXT_DOMAIN),
            'default' => 'right'
        ]),

        Field::checkbox('showAuthor', ['activate' => 'Afficher l\'auteur'])
    ],
    'theme-option-custom-code' => [
        Field::textarea('javascript', ['title' => __('Javascript', THEME_TEXT_DOMAIN)], ['id' => 'javascript-editor', "class" => "hidden"]),
        Field::textarea('style', ['title' => __('Style', THEME_TEXT_DOMAIN)], ['id' => 'style-editor', "class" => "hidden"])

    ],
    'theme-option-info' => [
        Field::text('name', ['title' => __('Name', THEME_TEXT_DOMAIN)]),
        Field::textarea('biography', ['title' => __('Biography', THEME_TEXT_DOMAIN)]),
        Field::text('address', ['title' => __('Address', THEME_TEXT_DOMAIN)]),
        Field::text('phoneNumberPrimary', ['title' => __('Phone Number', THEME_TEXT_DOMAIN)], ['type' => 'tel']),
        Field::text('phoneNumberSecondary', ['title' => __('Phone Number', THEME_TEXT_DOMAIN)], ['type' => 'tel']),
        Field::text('emailPrimary', ['title' => __('Phone Number', THEME_TEXT_DOMAIN)], ['type' => 'email']),
        Field::text('emailSecondary', ['title' => __('Phone Number', THEME_TEXT_DOMAIN)], ['type' => 'email']),
    ],
    'theme-option-analytic' => [

    ],
    'theme-option-typography' => [
        \Themosis\Facades\Field::color('menu-item-color', [
            'title' => __('Menu item color', THEME_TEXT_DOMAIN),
            'info' => '',
            'default' => '#5D5D5D'
        ]),
        \Themosis\Facades\Field::color('text-color', [
            'title' => __('Text color', THEME_TEXT_DOMAIN),
            'info' => '',
            'default' => '#ccc'
        ]),
        \Themosis\Facades\Field::color('background-color', [
            'title' => __('Background color', THEME_TEXT_DOMAIN),
            'info' => '',
            'default' => '#666'
        ]),
        \Themosis\Facades\Field::color('nav-color', [
            'title' => __('Navbar color', THEME_TEXT_DOMAIN),
            'info' => '',
            'default' => '#1c3942'
        ]),
        \Themosis\Facades\Field::color('footer-color', [
            'title' => __('Footer color', THEME_TEXT_DOMAIN),
            'info' => '',
            'default' => '#1c3942'
        ]),
        \Themosis\Facades\Field::color('topnav-color', [
            'title' => __('TopNav color', THEME_TEXT_DOMAIN),
            'info' => '',
            'default' => '#1c3942'
        ]),

    ],
    'theme-option-social' => [
        Field::text('facebook', ['title' => 'Facebook'], ['type' => 'url']),
        Field::text('twitter', ['title' => 'Twitter'], ['type' => 'url']),
        Field::text('google-plus', ['title' => 'Google plus'], ['type' => 'url']),
        Field::text('linkedin', ['title' => 'linkedIn'], ['type' => 'url']),
        Field::text('youtube', ['title' => 'YouTube'], ['type' => 'url']),
        Field::text('vkontakte', ['title' => 'Vkontakte'], ['type' => 'url']),
        Field::text('instagram', ['title' => 'Instagram'], ['type' => 'url']),
        Field::text('rss', ['title' => 'Feed'])
    ],
    'theme-option-image' => [
        Field::media('favicon', ['title' => __("Favicon", THEME_TEXT_DOMAIN)]),
        Field::media('logo', ['title' => __("Logo", THEME_TEXT_DOMAIN)]),
        Field::media('defaultSlider', ['title' => __("Default Slider", THEME_TEXT_DOMAIN)])
    ],
    'theme-option-layout' => [
        Field::checkbox('fixed-nav', [
            'activate' => __('Activate this option', THEME_TEXT_DOMAIN)
        ]),
        Field::select('siteLayout', [
            [
                'layouts.fullwidth' => __('Full width', THEME_TEXT_DOMAIN),
                'layouts.boxed' => __('Boxed', THEME_TEXT_DOMAIN),
            ]
        ], [
            'title' => __('Site layout type:', THEME_TEXT_DOMAIN),
            'value' => 1,
            'default' => 'layouts.boxed'
        ]),
        Field::select('productLoopType', [
            [
                'partials.unique.unique1' => __('Line', THEME_TEXT_DOMAIN),
                'partials.unique.unique2' => __('Card without description (3 col)', THEME_TEXT_DOMAIN),
                'partials.unique.unique3' => __('Card with description (3 col)', THEME_TEXT_DOMAIN),
                'partials.unique.unique5' => __('Card without description (4 col)', THEME_TEXT_DOMAIN),
                'partials.unique.unique6' => __('Card with description (4 col)', THEME_TEXT_DOMAIN)
            ]
        ], [
            'title' => __('Product loop type:', THEME_TEXT_DOMAIN),
            'value' => 1
        ]),
        Field::select('galleryLoopType', [
            [
                'partials.unique.unique1' => __('Line', THEME_TEXT_DOMAIN),
                'partials.unique.unique2' => __('Card without description (3 col)', THEME_TEXT_DOMAIN),
                'partials.unique.unique3' => __('Card with description (3 col)', THEME_TEXT_DOMAIN),
                'partials.unique.unique5' => __('Card without description (4 col)', THEME_TEXT_DOMAIN),
                'partials.unique.unique6' => __('Card with description (4 col)', THEME_TEXT_DOMAIN)
            ]
        ], [
            'title' => __('Gallery loop type:', THEME_TEXT_DOMAIN),
            'value' => 1
        ]),
        Field::select('postLoopType', [
            [
                'partials.unique.unique1' => __('Line', THEME_TEXT_DOMAIN),
                'partials.unique.unique2' => __('Card without description (3 col)', THEME_TEXT_DOMAIN),
                'partials.unique.unique3' => __('Card with description (3 col)', THEME_TEXT_DOMAIN),
                'partials.unique.unique5' => __('Card without description (4 col)', THEME_TEXT_DOMAIN),
                'partials.unique.unique6' => __('Card with description (4 col)', THEME_TEXT_DOMAIN)
            ]
        ], [
            'title' => __('Post loop type:', THEME_TEXT_DOMAIN),
            'value' => 1
        ]),
        Field::select('searchLoopType', [
            [
                'partials.unique.unique1' => __('Line', THEME_TEXT_DOMAIN),
                'partials.unique.unique2' => __('Card without description (3 col)', THEME_TEXT_DOMAIN),
                'partials.unique.unique3' => __('Card with description (3 col)', THEME_TEXT_DOMAIN),
                'partials.unique.unique5' => __('Card without description (4 col)', THEME_TEXT_DOMAIN),
                'partials.unique.unique6' => __('Card with description (4 col)', THEME_TEXT_DOMAIN)
            ]
        ], [
            'title' => __('Search loop layout:', THEME_TEXT_DOMAIN),
            'value' => 1
        ]),
    ]

];

$validation = [
    'name' => [
        'min:3', 'textfield'
    ],
    'facebook' => [
        'url'
    ],
    'twitter' => [
        'url'
    ],
    'google-plus' => [
        'url'
    ],
    'linkedin' => [
        'url'
    ],
    'youtube' => [
        'url'
    ],
    'vkontakte' => [
        'url'
    ],
    'Instagram' => [
        'url'
    ],
    'rss' => [
        'url'
    ]
];


$page->addSections($sections);
$page->addSettings($settings);
$page->validate($validation);