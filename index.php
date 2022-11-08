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
	'1' => new Player('John', 'john@example.com', 20, true),
	'2' => new Player('Marie', 'marie@example.com', 22, false),
	'3' => new Player('Jack', 'jack@example.com', 21, true),
	'4' => new Player('Jane', 'jane@example.com', 19, false),
];

foreach ($players as $id => $player) {
	echo "<pre>";
	echo "<b>Player n°$id : </b>" . $player;
	echo "</pre>";
}

/**
 * Games
 */
$game = new Game([
	$players[1],
	$players[2],
	$players[3],
	$players[4]
]);