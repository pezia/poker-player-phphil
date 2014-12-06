<?php

$start = microtime(true);

$debug = file_exists(__DIR__ . '/debug');
ini_set('display_errors', $debug);

set_error_handler(function($code,$message, $file, $line) {
    $e = new ErrorException($message, 0, $code, $file, $line);
    error_log('!!ERROR!!: ' . $e);
});

try {
    require_once(__DIR__ . '/vendor/autoload.php');

    $player = new Player();

    $gameState = null;

    if (isset($_POST['game_state'])) {
        $gameState = json_decode($_POST['game_state'], true);
    }

    error_log('Requesting ' . $_POST['action']);

    switch ($_POST['action']) {
        case 'bet_request':
            $response = $player->betRequest($gameState);
            error_log('Responding: ' . var_export($response, true));
            echo $response;
            break;
        case 'showdown':
            echo $player->showdown($gameState);
            break;
        case 'check':
        case 'version':
        default:
            echo Player::VERSION;
            break;
    }
} catch (Exception $ex) {
    error_log('!!EXCEPTION!!: ' . $ex->getMessage());
    echo 0;
}

error_log('Time taken: ' . number_format(microtime(true) - $start, 4));
