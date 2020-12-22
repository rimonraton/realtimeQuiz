<?php

use Illuminate\Support\Facades\Broadcast;
use Victorybiz\GeoIPLocation\GeoIPLocation;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat', function ($user) {
    return $user;
});

Broadcast::channel('challenge.{id}.{uid}', function ($user, $id, $uid) {
	$geoip = new GeoIPLocation(); 
    // $geoip->setIP('37.99.166.48');
    $country = strtolower($geoip->getCountryCode());
    $user['country'] =  $country;
    return $user;
});

Broadcast::channel('team.{id}.{uid}', function ($user, $id, $uid) {
	$geoip = new GeoIPLocation(); 
    $country = strtolower($geoip->getCountryCode());
    $user['country'] =  $country;
    $user['group'] =  $user->groups[0]->id;
    return $user;
});

// Broadcast::channel('game.{id}', function ($user, $id) {
//     return $user;
// });
