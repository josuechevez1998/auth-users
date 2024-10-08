<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->middleware(['auth', 'role:System'])
    ->group(function () {

        // Routes roles has permissions
        Route::get('/role-has-permissions', \App\Livewire\RoleHasPermissions\Index::class)->name('role-has-permissions.index');
        Route::get('/role-has-permissions/create', \App\Livewire\RoleHasPermissions\Create::class)->name('role-has-permissions.create');
        Route::get('/role-has-permissions/show/{roleHasPermission}', \App\Livewire\RoleHasPermissions\Show::class)->name('role-has-permissions.show');
        Route::get('/role-has-permissions/update/{roleHasPermission}', \App\Livewire\RoleHasPermissions\Edit::class)->name('role-has-permissions.edit');
    });

// Routes Users
Route::prefix('admin')
    ->middleware(['auth', 'role:System'])
    ->group(function () {
        Route::get('/users', \App\Livewire\Users\Index::class)
            ->name('users.index')
            ->middleware('permission:users.index');

        Route::get('/users/create', \App\Livewire\Users\Create::class)
            ->name('users.create')
            ->middleware('permission:users.create');

        Route::get('/users/show/{user}', \App\Livewire\Users\Show::class)
            ->name('users.show')
            ->middleware('permission:users.show');

        Route::get('/users/update/{user}', \App\Livewire\Users\Edit::class)
            ->name('users.edit')
            ->middleware('permission:users.edit');
    });


// Routes Roles
Route::prefix('admin')
    ->middleware(['auth', 'role:System'])
    ->group(function () {

        Route::get('/roles', \App\Livewire\Roles\Index::class)->name('roles.index');
        Route::get('/roles/create', \App\Livewire\Roles\Create::class)->name('roles.create');
        Route::get('/roles/show/{role}', \App\Livewire\Roles\Show::class)->name('roles.show');
        Route::get('/roles/update/{role}', \App\Livewire\Roles\Edit::class)->name('roles.edit');
        Route::get('/roles/assign-permission/{role}', \App\Livewire\Roles\AssignPermissions::class)->name('roles.assignPermissions');
    });



// Routes Permissions
Route::prefix('admin')
    ->middleware(['auth', 'role:System'])
    ->group(function () {

        Route::get('/permissions', \App\Livewire\Permissions\Index::class)
            ->name('permissions.index')
            ->middleware('permission:permissions.index');

        Route::get('/permissions/create', \App\Livewire\Permissions\Create::class)
            ->name('permissions.create')
            ->middleware('permission:permissions.create');

        Route::get('/permissions/show/{permission}', \App\Livewire\Permissions\Show::class)
            ->name('permissions.show')
            ->middleware('permission:permissions.show');

        Route::get('/permissions/update/{permission}', \App\Livewire\Permissions\Edit::class)
            ->name('permissions.edit')
            ->middleware('permission:permissions.edit');
    });
