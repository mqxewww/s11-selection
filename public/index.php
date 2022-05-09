<?php

/**
 * MIT License
 * Copyright (c) 2022 NOIZET Maxence

 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:

 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.

 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */
session_start();

use Selection\Libs\App;
use Selection\Libs\Router;

require_once "../vendor/autoload.php";

define("BASE_VIEW_PATH", dirname(__DIR__) . "/src/views/");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$router = new Router();

$router->register("/", ["Selection\Controllers\AuthController", "index", ""]);
$router->register("/authentication", ["Selection\Controllers\AuthController", "authentication", ""]);
$router->register("/logout", ["Selection\Controllers\AuthController", "logout", ""]);

$router->register("/admin/home", ["Selection\Controllers\AdminController", "home", "Selection\Middlewares\AdminMiddleware"]);
$router->register("/admin/creation", ["Selection\Controllers\AdminController", "creation", "Selection\Middlewares\AdminMiddleware"]);
$router->register("/admin/insertAccount", ["Selection\Controllers\AdminController", "insertAccount", "Selection\Middlewares\AdminMiddleware"]);
$router->register("/admin/changes", ["Selection\Controllers\AdminController", "changes", "Selection\Middlewares\AdminMiddleware"]);
$router->register("/admin/updateAccount", ["Selection\Controllers\AdminController", "updateAccount", "Selection\Middlewares\AdminMiddleware"]);
$router->register("/admin/deletion", ["Selection\Controllers\AdminController", "deletion", "Selection\Middlewares\AdminMiddleware"]);
$router->register("/admin/deleteAccount", ["Selection\Controllers\AdminController", "deleteAccount", "Selection\Middlewares\AdminMiddleware"]);

$router->register("/secretary/home", ["Selection\Controllers\SecretaryController", "home", "Selection\Middlewares\SecretaryMiddleware"]);
$router->register("/secretary/download", ["Selection\Controllers\SecretaryController", "download", "Selection\Middlewares\SecretaryMiddleware"]);

(new App($router, $_SERVER['REQUEST_URI']))->start();
