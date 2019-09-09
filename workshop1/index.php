<?php

// Klass för att översätta en text till rövarspråk. se TODO på rad 64.
class Translator
{
    private $input;
    private $output;

    public function __construct()
    { }

    public function getInput($input)
    {
        $this->input = $input;
    }

    public function setOutput($output)
    {
        $this->output = $output;
    }

    // Kollar $this->input, enkrypterar till rövarspråk och returnerar detta.
    public function encrypt(): string
    {
        $unencryptedString = $this->input;
        $encryptedString = '';

        for ($i = 0; $i < count($unencryptedString); $i++) {
            if (isConsonant($unencryptedString[$i])) {
                $encryptedString .= $unencryptedString[$i] . 'o' . $unencryptedString[$i];
            } else {
                $encryptedString .= $unencryptedString[$i];
            }
        }
        return $encryptedString;
    }

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

// lägger dom:en i $doc-variablen
$doc = new DOMDocument();
$doc->validateOnParse = true;

// Initierar en instans av vår Translator-klass
$translator = new Translator();

// lägger våra DOM-element (textareas) i dessa variabler
$input = $doc->getElementById('input');
$output = $doc->getElementById('output');

// TODO: event listener. När knappen trycks, kör nedan kod
$translator->getInput($input);

// Ska skriva ut vår "enkrypterade" text i output. "$output = " i början behövs förmodligen inte.
$output = $translator->setOutput($translator->encrypt());
