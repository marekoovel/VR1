<?php
$kassid = array(
array('nimi'=>'Miisu', 'vanus'=>2, 'varvus'=>'hall', 'omanik'=>'Madli'),
array('nimi'=>'Tom', 'vanus'=>3, 'varvus'=>'must', 'omanik'=>'Jerry'),
array('nimi'=>'Juss', 'vanus'=>15, 'varvus'=>'hallvalge', 'omanik'=>'Marek'),
array('nimi'=>'Nurr', 'vanus'=>8, 'varvus'=>'kollane', 'omanik'=>'Kadri'),
array('nimi'=>'Mirr', 'vanus'=>5, 'varvus'=>'oranz', 'omanik'=>'Mart'),
);
include 'kujundus.html';
foreach($kassid as $kass){
include 'kass.html';
}

include 'lopp.html';
?>