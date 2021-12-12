<?php

use Dingo\Api\Routing\Router;

$api = app(Router::class);

$api->version('v1', ['middleware' => ['api']], function ($api) {
    /** @uses \App\Http\Controllers\UserController::index() */
    $api->get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    /** @uses \App\Http\Controllers\UserController::store() */
    $api->post('users', [\App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    /** @uses \App\Http\Controllers\UserController::destroy() */
    $api->delete('users/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
    /** @uses \App\Http\Controllers\UserController::show() */
    $api->get('users/{user}', [\App\Http\Controllers\UserController::class, 'show'])->name('users.show');

    /** @uses \App\Http\Controllers\ProfileController::update() */
    $api->patch('users/{user}/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profiles.update');
});
