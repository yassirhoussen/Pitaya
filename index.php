<?php

/**
 * Copyright (C) 2016 YASSIR HOUSSEN ABDULLAH
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

session_start();

define("DIRECT_ACCESS", TRUE);

require_once("Config/define.php");
require_once 'Autoloader.php';
Autoloader::register();


if (MODE === "DEVELOPMENT") {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}


use Core\Core;
$core = new Core(); 
$core->start();
