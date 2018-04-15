<?php

require 'vendor/autoload.php';
use PhpSlackBot\Bot;

class Quote extends \PhpSlackBot\Command\BaseCommand {

    protected function configure() {
        $this->setName('Hey Ron');
    }

    protected function execute($message, $context) {

        // Make API request to Ron Swanson quote API (http://ron-swanson-quotes.herokuapp.com/v2/quotes)
        $jsonRaw = file_get_contents('http://ron-swanson-quotes.herokuapp.com/v2/quotes');
        $quote = json_decode($jsonRaw)[0];
    
        $this->send($this->getCurrentChannel(), null, $quote);
    }

}

$bot = new Bot();
$bot->setToken('YOUR TOKEN HERE');
$bot->loadCommand(new Quote());
$bot->run();