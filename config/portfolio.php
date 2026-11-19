<?php

/*
|--------------------------------------------------------------------------
| Portfolio content
|--------------------------------------------------------------------------
|
| Everything the home page shows lives here, so you can update your
| details, services and projects without touching the templates.
|
*/

return [

    'name' => [
        'first' => 'Ali',
        'last' => 'El Zein',
    ],

    'role' => 'Full Stack Developer',

    'description' => 'Portfolio of Ali El Zein, full stack developer based in Lebanon.',

    // Path inside /public, e.g. 'images/ali.png'. Use a transparent PNG
    // (background removed) so your shoulders break out of the ring.
    // Leave null to show the placeholder silhouette.
    'photo' => null,

    'socials' => [
        'GitHub' => 'https://github.com/alielzein-dev',
        'LinkedIn' => '#',
        'Instagram' => '#',
    ],

    'services' => [
        'intro' => 'Everything I make lives in the browser and works on every screen size.',
        'items' => [
            [
                'title' => 'Websites',
                'text' => 'Business sites and landing pages that load quickly and are easy for you to update.',
            ],
            [
                'title' => 'Web apps',
                'text' => 'Dashboards and tools with real logic behind them: accounts, data and forms that work.',
            ],
            [
                'title' => 'Online stores',
                'text' => 'Shops that are simple to browse, with an admin side that is simple to run.',
            ],
        ],
    ],

    'about' => [
        'text' => "I'm a full stack developer based in Lebanon. I build both sides of a website: the part people see and click, and the server, database and logic behind it. I care about the small things too: the spacing, the loading time, the moment a button responds.",
        'stats' => [
            ['value' => 3, 'label' => 'Years of experience'],
            ['value' => 20, 'label' => 'Projects completed'],
            ['value' => 10, 'label' => 'Happy clients'],
        ],
        'tools' => ['HTML', 'CSS', 'JavaScript', 'TypeScript', 'PHP', 'Laravel', 'React', 'Tailwind CSS', 'MySQL', 'Git'],
    ],

    'work' => [
        'intro' => 'Two full systems I built, shown with screens from the working apps. Click a picture below each one to see more.',
        'projects' => [
            [
                'type' => 'Bus fleet and operations system',
                'title' => 'LiftOps',
                'text' => "Everything a bus company needs to run its lines, in one place. The office sets up stations and routes, plans drivers' shifts, and keeps track of buses, maintenance, travel cards and payments. Drivers get their own view with today's shift, the route on a map and every trip they have to drive.",
                // What the system does, shown as a short list beside the text.
                'highlights' => [
                    'A route editor: put the stops in order and the map redraws the line',
                    'Shifts split themselves into trips, one out and one back for each round',
                    'Revenue, maintenance and driver cash reports you can print or save as PDF',
                    'A separate driver view showing how many seats are free on every trip',
                ],
                'tools' => ['Leaflet', 'OpenStreetMap'],
                'url' => null,
                // Screenshots, first one shown large. Paths inside /public.
                'gallery' => [
                    ['src' => 'images/projects/liftops/route-editor.webp', 'thumb' => 'images/projects/liftops/route-editor-thumb.webp', 'caption' => 'Route editor with the stops drawn on the map'],
                    ['src' => 'images/projects/liftops/driver-shift.webp', 'thumb' => 'images/projects/liftops/driver-shift-thumb.webp', 'caption' => "Driver view: today's shift and route"],
                    ['src' => 'images/projects/liftops/routes.webp', 'thumb' => 'images/projects/liftops/routes-thumb.webp', 'caption' => 'Routes with distance and duration'],
                    ['src' => 'images/projects/liftops/trips.webp', 'thumb' => 'images/projects/liftops/trips-thumb.webp', 'caption' => 'Trips grouped by shift'],
                    ['src' => 'images/projects/liftops/buses.webp', 'thumb' => 'images/projects/liftops/buses-thumb.webp', 'caption' => 'The fleet and the status of each bus'],
                ],
            ],
            [
                'type' => 'Service platform for a solar company',
                'title' => 'Solartion',
                'text' => 'A workspace for a solar company to run its service side. The team keeps track of customers and their solar systems, turns service requests into work orders, books technicians on a calendar and logs every onsite visit. It works in English, Arabic and French, in dark or light.',
                'highlights' => [
                    "A dashboard with today's appointments, open work orders and anything that needs attention",
                    'A schedule you can view by day or by technician, with overdue jobs flagged',
                    'Five roles, from admin to employee, each with permissions you can switch on and off',
                    'Reports you can filter and export to CSV, plus an audit log of every change',
                    'English, Arabic (right to left) and French, with dark and light themes',
                ],
                'tools' => [],
                'url' => null,
                'gallery' => [
                    ['src' => 'images/projects/solartion/dashboard.webp', 'thumb' => 'images/projects/solartion/dashboard-thumb.webp', 'caption' => 'Dashboard with the day at a glance'],
                    ['src' => 'images/projects/solartion/login.webp', 'thumb' => 'images/projects/solartion/login-thumb.webp', 'caption' => 'Sign-in page'],
                    ['src' => 'images/projects/solartion/schedule.webp', 'thumb' => 'images/projects/solartion/schedule-thumb.webp', 'caption' => 'Schedule for the next seven days'],
                    ['src' => 'images/projects/solartion/roles.webp', 'thumb' => 'images/projects/solartion/roles-thumb.webp', 'caption' => 'Roles and what each one can do'],
                    ['src' => 'images/projects/solartion/arabic.webp', 'thumb' => 'images/projects/solartion/arabic-thumb.webp', 'caption' => 'Settings in Arabic, right to left'],
                    ['src' => 'images/projects/solartion/light.webp', 'thumb' => 'images/projects/solartion/light-thumb.webp', 'caption' => 'The dashboard in the light theme'],
                ],
            ],
            // A project without a gallery can use a single 'image' (path inside
            // /public) or, with 'image' => null, a drawn 'mock': 'site', 'dashboard' or 'store'.
        ],
    ],

    'contact' => [
        'heading' => 'Got a website in mind',
        'text' => "Email me or send a WhatsApp message with what you need, and I'll get back to you within a day.",
        'email' => 'hello@example.com',
        // Digits only, with country code, for the wa.me link.
        'whatsapp' => '+961 81429920',
        'whatsapp_display' => '+961 81429920',
        'location' => 'Lebanon, working with clients worldwide',
    ],

];
