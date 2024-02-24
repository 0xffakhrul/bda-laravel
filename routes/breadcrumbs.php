<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('donor.appointments.index', function (BreadcrumbTrail $trail) {
    $trail->push('Appointments', route('donor.appointments.index'));
});

Breadcrumbs::for('donor.appointments.create', function (BreadcrumbTrail $trail) {
    $trail->parent('donor.appointments.index');
    $trail->push('Create', route('donor.appointments.create'));
});

Breadcrumbs::for('donor.appointments.edit', function (BreadcrumbTrail $trail, $appointment) {
    $trail->parent('donor.appointments.index');
    $trail->push('#' . $appointment->id, route('donor.appointments.edit', $appointment));
    $trail->push('Edit');
});

Breadcrumbs::for('admin.appointments.index', function (BreadcrumbTrail $trail) {
    $trail->push('Appointments', route('admin.appointments.index'));
});

Breadcrumbs::for('admin.appointments.show', function (BreadcrumbTrail $trail, $appointment) {
    $trail->parent('admin.appointments.index');
    $trail->push('#' . $appointment->id, route('admin.appointments.show', $appointment));
    $trail->push('View');
});

Breadcrumbs::for('admin.appointments.edit', function (BreadcrumbTrail $trail, $appointment) {
    $trail->parent('admin.appointments.index');
    $trail->push('#' . $appointment->id, route('admin.appointments.show', $appointment));
    $trail->push('Edit', route('admin.appointments.edit', $appointment));
});

Breadcrumbs::for('admin.users.index', function (BreadcrumbTrail $trail) {
    $trail->push('Users', route('admin.users.index'));
});

Breadcrumbs::for('admin.users.edit', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('admin.users.index');
    $trail->push('#' . $user->id, route('admin.users.edit', $user));
    $trail->push('Edit');
});
