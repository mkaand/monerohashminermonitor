# MoneroHash Monitor RSS Feeder v1.01

Credits: Kaan Doğan Twitter: @mkaand
Date: 16.10.2017

This PHP scripts uses MoneroHash public API.
It supports MoneroHash's all supported algoritmas.
Basically, It pulls your miner's current situation and
it generates RSS Feed. You can use this RSS feed for sending yourself a notification
or email. I use ifttt.com and Telegram service for getting notification.
Both are free. I hope you will like this script.

***************************************************************************
**DONATION REQUEST PLEASE READ BEFORE YOU USE THIS SCRIPT**<br>
Before you start using this script, please respect my work. 
I share this script as FREE OF CHARGE,
But if you want to show your appreciation please make DONATION..

<b>DONATION BTC: 1LaZG8XELxs9JCzzVJaWyhxQG6tCcswJnx</b>

THANKS
****************************************************************************

Requirements :
<br>PHP Hosting (Write permission for this file)
<br>Brain

Usage:
Just change Settings and upload this script to your hosting.
This script generates RSS feed for your MoneroHash Miner. 
You can integrate with ifttt.com (free service). 
In my case ifttt.com checks this RSS feed, if miner is working,
it sends me a Telegram messages on every hour like that:

Miner is online<br>Currently, MoneroHash Miner is online [83.00 H | 0.001127049921 XMR]

(Default ifttt.com checks RSS feeds every 15 minutes)

If miner goes offline RSS entry changes:

Miner is offline<br>Currently, MoneroHash Miner is offline

Screenshots:

![Screenshot #1](/monero_telegram1.png?raw=true "Screenshot #1")


![Screenshot #2](/monero_telegram2.png?raw=true "Screenshot #2")

