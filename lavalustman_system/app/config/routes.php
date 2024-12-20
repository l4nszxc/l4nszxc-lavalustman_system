<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------
 * LavaLust - an opensource lightweight PHP MVC Framework
 * ------------------------------------------------------------------
 *
 * MIT License
 *
 * Copyright (c) 2020 Ronald M. Marasigan
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package LavaLust
 * @author Ronald M. Marasigan <ronald.marasigan@yahoo.com>
 * @since Version 1
 * @link https://github.com/ronmarasigan/LavaLust
 * @license https://opensource.org/licenses/MIT MIT License
 */

/*
| -------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------
| Here is where you can register web routes for your application.
|
|
*/

$router->get('/', 'Auth');
$router->get('/home', 'Home');
$router->get('/user-profile', 'User');
$router->post('/user-profile', 'User::updatePhoneNumber');
$router->post('/update-address', 'User::updateAddress');
$router->post('/update-gender', 'User::updateGender');
$router->post('/update-bday', 'User::updateBDAY');
$router->post('/update-role', 'User::updateRole');
$router->post('/update-username', 'User::updateUsername');
$router->post('/update-name', 'User::updateName');
$router->post('/update-password', 'User::updatePassword');

$router->group('/auth', function() use ($router){
    $router->match('/register', 'Auth::register', ['POST', 'GET']);
    $router->match('/login', 'Auth::login', ['POST', 'GET']);
    $router->get('/logout', 'Auth::logout');
    $router->match('/verify', 'Auth::verify', ['POST', 'GET']);
    $router->match('/verified', 'Auth::verified', ['POST', 'GET']);
    $router->match('/password-reset', 'Auth::password_reset', ['POST', 'GET']);
    $router->match('/set-new-password', 'Auth::set_new_password', ['POST', 'GET']);
});
$router->group('/flashcards', function() use ($router) {
    $router->match('/create', 'FlashcardsController::create', ['POST', 'GET']);
    $router->get('/list', 'FlashcardsController::list');
    $router->get('/edit/{num}', 'FlashcardsController::edit');
    $router->post('/update/{num}', 'FlashcardsController::update');
    $router->get('/post/{num}', 'FlashcardsController::post');
    $router->get('/delete/{num}', 'FlashcardsController::delete');
    $router->get('/unpost/{num}', 'FlashcardsController::unpost');
    $router->get('/show/{num}', 'FlashcardsController::show');
    $router->post('/save_result', 'FlashcardsController::save_result'); // Corrected route
});