<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(__('home.title'), route('home'));
});

Breadcrumbs::for('characters.index', function (BreadcrumbTrail $trail) {
    $trail->push(__('characters.characters'), route('characters.index'));
});

Breadcrumbs::for('games.index', function (BreadcrumbTrail $trail) {
    $trail->push(__('games.games'), route('games.index'));
});