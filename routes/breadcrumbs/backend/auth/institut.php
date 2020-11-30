<?php

Breadcrumbs::for('admin.auth.institut.index', function ($trail) {
    $trail->push(__('menus.backend.access.instituts.management'), route('admin.auth.institut.index'));
});

Breadcrumbs::for('admin.auth.institut.create', function ($trail) {
    $trail->parent('admin.auth.institut.index');
    $trail->push(__('menus.backend.access.instituts.create'), route('admin.auth.institut.create'));
});

Breadcrumbs::for('admin.auth.institut.edit', function ($trail, $id) {
    $trail->parent('admin.auth.institut.index');
    $trail->push(__('menus.backend.access.institut.edit'), route('admin.auth.institut.edit', $id));
});

