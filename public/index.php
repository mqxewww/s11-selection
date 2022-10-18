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

use Dotenv\Dotenv;
use Selection\Libs\App;
use Selection\Libs\Router;

session_start();

require_once "../vendor/autoload.php";

define("BASE_VIEW_PATH", dirname(__DIR__) . "/src/views/");
define("APP_VERSION", "1.3.0");

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$router = new Router();

$router->register("common/change-password", ["Selection\Controllers\CommonController", "changePassword", "Selection\Middlewares\CommonMiddleware"]);
$router->register("common/updateAccountPassword", ["Selection\Controllers\CommonController", "updateAccountPassword", "Selection\Middlewares\CommonMiddleware"]);

$router->register("", ["Selection\Controllers\AuthController", "index", ""]);
$router->register("authentication", ["Selection\Controllers\AuthController", "authentication", ""]);
$router->register("logout", ["Selection\Controllers\AuthController", "logout", ""]);

$router->register("admin/home", ["Selection\Controllers\AdminController", "home", "Selection\Middlewares\AdminMiddleware"]);
$router->register("admin/creation", ["Selection\Controllers\AdminController", "creation", "Selection\Middlewares\AdminMiddleware"]);
$router->register("admin/insertAccount", ["Selection\Controllers\AdminController", "insertAccount", "Selection\Middlewares\AdminMiddleware"]);
$router->register("admin/changes", ["Selection\Controllers\AdminController", "changes", "Selection\Middlewares\AdminMiddleware"]);
$router->register("admin/updateAccount", ["Selection\Controllers\AdminController", "updateAccount", "Selection\Middlewares\AdminMiddleware"]);
$router->register("admin/deletion", ["Selection\Controllers\AdminController", "deletion", "Selection\Middlewares\AdminMiddleware"]);
$router->register("admin/deleteAccount", ["Selection\Controllers\AdminController", "deleteAccount", "Selection\Middlewares\AdminMiddleware"]);
$router->register("admin/reset", ["Selection\Controllers\AdminController", "reset", "Selection\Middlewares\AdminMiddleware"]);
$router->register("admin/resetPassword", ["Selection\Controllers\AdminController", "resetPassword", "Selection\Middlewares\AdminMiddleware"]);

$router->register("secretary/home", ["Selection\Controllers\SecretaryController", "home", "Selection\Middlewares\SecretaryMiddleware"]);
$router->register("secretary/download", ["Selection\Controllers\SecretaryController", "download", "Selection\Middlewares\SecretaryMiddleware"]);

$router->register("teacher/home", ["Selection\Controllers\TeacherController", "home", "Selection\Middlewares\TeacherMiddleware"]);
$router->register("teacher/creation", ["Selection\Controllers\TeacherController", "creation", "Selection\Middlewares\TeacherMiddleware"]);
$router->register("teacher/insertGrid", ["Selection\Controllers\TeacherController", "insertGrid", "Selection\Middlewares\TeacherMiddleware"]);
$router->register("teacher/changes", ["Selection\Controllers\TeacherController", "changes", "Selection\Middlewares\TeacherMiddleware"]);
$router->register("teacher/updateGrid", ["Selection\Controllers\TeacherController", "updateGrid", "Selection\Middlewares\TeacherMiddleware"]);
$router->register("teacher/deletion", ["Selection\Controllers\TeacherController", "deletion", "Selection\Middlewares\TeacherMiddleware"]);
$router->register("teacher/deleteGrid", ["Selection\Controllers\TeacherController", "deleteGrid", "Selection\Middlewares\TeacherMiddleware"]);

(new App($router, $_SERVER['REQUEST_URI']))->start();
