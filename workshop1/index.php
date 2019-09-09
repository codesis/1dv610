<?php

class Translator {
    private $input;
    private $output;

    public function __construct () {
    }
    public function getInput ($input) {
        $this->input = $input;
    }
    public function setOutput ($output) {
        $this->output = $output;
    }
}

