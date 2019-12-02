<?php
include __DIR__.'/utils/DiscordApp.php';
$pk = new DiscordApp();
$pk->hook = "https://discordapp.com/api/webhooks/651194542674018334/6j3kQq0SG6JM1-9be3k1mcvTbbvDVlLC8V_szD7ZsPKlrOjs00C9ZRucX-rWqqTtIfO-";
$pk->title = 'Developer Apply';
$name = 'Josewowgame2888';
$content = 'This is contents soon';
$pk->message = $name."\n".$content;
$pk->sendPacket();