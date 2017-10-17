<?php
/*
MoneroHash Monitor RSS Feeder v1.01
Credits: Kaan Doğan Twitter: @mkaand
Date: 16.10.2017

This PHP scripts uses MoneroHash public API.
It supports MoneroHash's all supported algoritmas.
Basically, It pulls your miner's current situation and
it generates RSS Feed. You can use this RSS feed for sending yourself a notification
or email. I use ifttt.com and Telegram service for getting notification.
Both are free. I hope you will like this script.

***********DONATION REQUEST PLEASE READ BEFORE YOU USE THIS SCRIPT**********
Before you start using this script, please respect my work. 
I share this script as FREE OF CHARGE,
But if you want to show your appreciation please make DONATION..

DONATION BTC: 1LaZG8XELxs9JCzzVJaWyhxQG6tCcswJnx

THANKS
****************************************************************************
Requirements :
PHP Hosting (Write permission for this file)
Brain

Usage:
Just change Settings and upload this script to your hosting.
This script generates RSS feed for your MoneroHash Miner. 
You can integrate with ifttt.com (free service). 
In my case ifttt.com checks this RSS feed, if miner is working,
it sends me a Telegram messages on every hour like that:

Miner is online
Currently, MoneroHash Miner is online [83.00 H | 0.001127049921 XMR]

(Default ifttt.com checks RSS feeds every 15 minutes)

If miner goes offline RSS entry changes:

Miner is offline
Currently, MoneroHash Miner is offline

*/
$online_offline="Miner is online"; //DO NOT CHANGE

ini_set('display_errors', 1);
	
$myfile = "monerohash_rss.php";
$file_content = file_get_contents($myfile);

$publishtime = date(DATE_RSS);
header('Content-type: application/xml');
$apiurl="https://monerohash.com/api/stats_address?address=";

//Settings
$baseurl="http://kaan.dogan.org"; //PHP Script should run under this URL.
$coin_addr="4BrL51JCc9NGQ71kWhnYoDRffsDZy7m1HUU7MRU4nUMXAHNFBEJhkTZV9HdaL4gfuNBxLPc3BeMkLGaPbF5vWtANQqDKuyHPpNkBssogko"; 
//Change above line with your XMR address. Please make donation for me :o) Thanks.

$data = @file_get_contents($apiurl.$coin_addr."&longpoll=false");
$data = json_decode($data, true);
$status = "Miner is offline";

$current_balance = $data['stats']['balance']/1000000000000;
$current_speed = number_format($data['stats']['hashrate'], 2, '.', '');
$current_unit = substr($data['stats']['hashrate'],-1,1);
$current_state = " [" . $current_speed . " " . $current_unit . " | " . $current_balance . " XMR]";

if ($current_speed !== "0.00") {
$status = "Miner is online";
$description = "Currently, MoneroHash " . $status . $current_state;
}else{
$description = "Currently, MoneroHash " . $status;
}

function str_replace_first($from, $to, $subject)
{
    $from = '/'.preg_quote($from, '/').'/';

    return preg_replace($from, $to, $subject, 1);
}

If ($status == $online_offline){
$guid = date("Y-m-d-H");	
}else{
$guid = date("Y-m-d-H") . mt_rand();	
If ($online_offline=="Miner is offline"){file_put_contents($myfile, str_replace_first('$online_offline="Miner is offline"; //DO NOT CHANGE','$online_offline="Miner is online"; //DO NOT CHANGE', $file_content));}
If ($online_offline=="Miner is online"){file_put_contents($myfile, str_replace_first('$online_offline="Miner is online"; //DO NOT CHANGE','$online_offline="Miner is offline"; //DO NOT CHANGE', $file_content));}
}

?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<title>MoneroHash Miner RSS Feed</title>
<description>Miner status monitor for MoneroHash Pool System</description>
<link><?=$baseurl?>/nicehash_rss.php</link>
<copyright>Kaan Dogan</copyright>
<atom:link href="<?=$baseurl?>/monerohash_rss.php" rel="self" type="application/rss+xml" />
<item>
        <title><?=$status?></title>
        <description><?=$description?></description>
        <link><?=$baseurl?>/monerohash_rss.php?<?=$guid;?></link>
        <pubDate><?=$publishtime?></pubDate>
		<guid isPermaLink="false"><?=$guid;?></guid>
     </item>
</channel>
</rss>
