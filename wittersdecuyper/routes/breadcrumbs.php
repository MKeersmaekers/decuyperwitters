// routes/breadcrumbs.php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});

Breadcrumbs::register('Dieren', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Dieren', route('Dieren'));
});

Breadcrumbs::register('Tuin', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Tuin', route('Tuin'));
});

Breadcrumbs::register('DierenType', function ($breadcrumbs, $name) {
    $breadcrumbs->parent('Dieren');
    $breadcrumbs->push($name, route('DierenType', $name));
});

Breadcrumbs::register('TuinType', function ($breadcrumbs, $name) {
    $breadcrumbs->parent('Tuin');
    $breadcrumbs->push($name, route('TuinType', $name));
});

Breadcrumbs::register('Actie', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Actie', route('Actie'));
});

Breadcrumbs::register('Contact', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Contact', route('Contact'));
});
