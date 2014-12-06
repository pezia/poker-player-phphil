<?php

$start = microtime(true);

$debug = file_exists(__DIR__.'/debug');
ini_set('display_errors', $debug);

set_error_handler(function($message, $code, $file, $line) {
    $e = new ErrorException($message, 0, $code, $file, $line);
    error_log($e.'');
});

require_once(__DIR__.'/vendor/autoload.php');

$player = new Player();

$gameState = null;

if (isset($_POST['game_state'])) {
    $gameState = json_decode($_POST['game_state'], true);
}

error_log('Requesting ' . $_POST['action']);

switch ($_POST['action']) {
    case 'bet_request':
        echo $player->betRequest($gameState);
        break;
    case 'showdown':
        $player->showdown($gameState);
        break;
    case 'check':
    case 'version':
    default:
        echo Player::VERSION;
        break;
}

error_log('Time taken: ' . number_format(microtime(true) - $start, 4));
