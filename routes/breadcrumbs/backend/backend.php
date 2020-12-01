<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';

Breadcrumbs::for('admin.stok', function ($trail) {
    $trail->push('Senarai Nama Stok', route('admin.stok'));
});

Breadcrumbs::for('admin.editstok', function ($trail, $id) {
    $trail->parent('admin.stok');
    $trail->push('Edit Nama Stok', route('admin.editstok',$id));
});

Breadcrumbs::for('admin.createstok', function ($trail) {
    $trail->parent('admin.stok');
    $trail->push('Cipta Nama Stok Baru', route('admin.createstok'));
});

Breadcrumbs::for('admin.showstok', function ($trail, $id) {
    $trail->parent('admin.stok');
    $trail->push('Prihal Stok', route('admin.showstok',$id));
});

Breadcrumbs::for('admin.device', function ($trail) {
    $trail->push('Senarai Peranti IOT Stok', route('admin.device'));
});
Breadcrumbs::for('admin.createdevice', function ($trail) {
    $trail->parent('admin.device');
    $trail->push('Cipta Peranti IOT Stok Baru', route('admin.createdevice'));
});
Breadcrumbs::for('admin.showdevice', function ($trail, $id) {
    $trail->parent('admin.device');
    $trail->push('Prihal Peranti IOT Stok', route('admin.showdevice',$id));
});
Breadcrumbs::for('admin.editdevice', function ($trail, $id) {
    $trail->parent('admin.device');
    $trail->push('Edit Peranti IOT Stok', route('admin.editdevice',$id));
});

Breadcrumbs::for('admin.lokasistok', function ($trail) {
    $trail->push('Senarai Lokasi Stok', route('admin.lokasistok'));
});
Breadcrumbs::for('admin.createlokasistok', function ($trail, $id) {
    $trail->parent('admin.lokasistok');
    $trail->push('Cipta Lokasi Stok Baru', route('admin.createlokasistok', $id));
});
Breadcrumbs::for('admin.editlokasistok', function ($trail,$id) {
    $trail->parent('admin.lokasistok');
    $trail->push('Edit Lokasi Stok', route('admin.editlokasistok', $id));
});
