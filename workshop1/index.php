<?php
  include_once("Translator.php");

  $translator = new Translator();
  $input = $_GET["input"];
  $translator->setInput($input);
  $output = $translator->setOutput($translator->encrypt());
  $finalOutput = $translator->getOutput();
  $translator->setOutput($finalOutput);
?>

<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">

  <title>The rövarspråk translator</title>
  <meta name="description" content="The rövarspråk translator">
  <meta name="author" content="codesis/dunderdennis">

  <link rel="stylesheet" href="style.css">

</head>

<body>
  <h1>The rövarspråk translator</h1>
  <form action="index.php" method="get">
    <textarea id="input" name="input"></textarea>
    <br>
    <button id="translate">Translate</button>
    <button id="translateBack">Reverse</button>
    <br>
    <textarea id="output" name="output" value=""><?php echo $finalOutput ?></textarea>
  </form>
</body>

</html>