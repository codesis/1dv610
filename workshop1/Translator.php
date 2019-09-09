<?php

// Klass för att översätta en text till rövarspråk. se TODO på rad 64.
class Translator
{
    private $input;
    private $output;

    public function __construct()
    { }

    public function setInput($input)
    {
        $this->input = $input;
    }

    public function setOutput($output)
    {
        $this->output = $output;
    }

    public function getOutput()
    {
        return $this->output;
    }

    // Kollar $this->input, enkrypterar till rövarspråk och returnerar detta.
    public function encrypt(): string
    {
        $unencryptedString = $this->input;
        $encryptedString = '';

        for ($i = 0; $i < strlen($unencryptedString); $i++) {
            if ($this->isConsonant($unencryptedString[$i])) {
                $encryptedString .= $unencryptedString[$i] . 'o' . $unencryptedString[$i];
            } else {
                $encryptedString .= $unencryptedString[$i];
            }
        }
        return $encryptedString;
    }
    
    // This code was supposed to translate back the encrypted word
    /*
    public function decrypt(): string
    {
        $encryptedString = $this->output;
        $decryptedString = '';

        for ($i = 0; $i < strlen($encryptedString); $i++) {
            if ($this->isConsontant($encryptedString[$i])) {
                $encryptedString[$i] = 
            }
        }
    }
    */

    // Kollar om bokstav är konsonant, isåfall returnerar true. Annars false (vokal).
    public function isConsonant($letter): bool
    {
        if (
            $letter == 'a' || $letter == 'e' || $letter == 'i' ||
            $letter == 'o' || $letter == 'u' || $letter == 'å' ||
            $letter == 'ä' || $letter == 'ö' || $letter == 'A' ||
            $letter == 'E' || $letter == 'I' || $letter == 'O' ||
            $letter == 'U' || $letter == 'Å' || $letter == 'Ä' ||
            $letter == 'Ö'
        ) {
            return false;
        } else {
            return true;
        }
    }
}
