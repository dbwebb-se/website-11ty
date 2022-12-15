<!doctype html>
<html lang="sv">
<head>
  <meta charset="utf-8">
  <title>IRC-logg från #db-o-webb</title>
  <style>
  td {
    font-family: monospace;
  }

  tr:hover {
    background-color: #eee;
  }

  .user,
  .time {
    padding-right: 1em;
  }
  </style>
</head>

<body>
<h1>IRC-loggen</h1>
<h2>Vad har hänt senast i #db-o-webb-kanalen?</h2>

<?php
$irclog = "/home/mos/git/irc2phpbb/irclog.txt";
if (!is_file($irclog)) {
    die("No logfile found");
}

$messages = json_decode(file_get_contents($irclog));

$sort = "Senaste inlägg visas sist (<a href=\"?\">ändra</a>)";
if (!isset($_GET["asc"])) {
    // senaste nytt högst upp för att slippa skrolla
    $messages = array_reverse($messages);
    $sort = "Senaste inlägg visas först (<a href=\"?asc\">ändra</a>)";
}
?>
  <p><i>Loggfilen uppdaterad senast: <?= date("Y F d H:i:s", filemtime($irclog)) ?>.</i></p>
  <p><?= $sort ?>
<table>
<?php foreach ($messages as $message) : ?>
<?php
// skriv inte ut marvins forumsspam
if (($message->user == "marvin") && (substr($message->msg, 0, 7) == "Forumet")) {
    continue;
}
?>
<tr>
  <td class="time"><?= $message->time ?></td>
  <td class="user"><?= htmlentities($message->user) ?></td>
  <td class="message"><?= htmlentities($message->msg) ?></td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>
