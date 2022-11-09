<?php

declare(strict_types=1);

/**
 * Errors
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * Require
 */
require_once 'src/autoload.php';
require_once 'src/functions.php';

/**
 * Players
 */
$players = [
	new Player('John', 'john@example.com', 20, true),
	new Player('Marie', 'marie@example.com', 22, false),
	new Player('Jack', 'jack@example.com', 21, true),
	new Player('Jane', 'jane@example.com', 19, false),
];

foreach ($players as $k => $player) {
	echo "<pre>";
	echo "<b>Player n°$k : </b>" . $player;
	echo "</pre>";
}

/**
 * Games
 */
$game = new Game($players);