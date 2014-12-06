<?php

require_once(__DIR__.'/vendor/autoload.php');

$player = new Player();

$gameState = null;

if (isset($_POST['game_state'])) {
    $gameState = json_decode($_POST['game_state'], true);
}

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
