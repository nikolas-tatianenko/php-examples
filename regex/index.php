<?php
header('content-type:plaintext');
$string = '123124,5777546|sprout:123|the-go:od-nig,,,ht-show-(6-9-p.m.,-9-midnight,-midnight-3-a.m.-et):151039|programming,5877896|nbc-news:34234|meet-the-press:151257|programming:13,3321001|bravo|top-chef:151086|programming,2964456|bravo|top-chef:151086|programming,[object Object],2821066|bravo|top-chef:151086|programming:1,2964426|bravo|top-chef:151086|programming,5792861|nbc-entertainment|blindspot:4236556|programming,5792866|nbc-entertainment|blindspot:4236556|programming,5792871|nbc-entertainment|blindspot:4236556|programming,5792911|nbc-entertainment|blindspot:4236556|programming,5792916|nbc-entertainment|blindspot:4236556|programming,5792921|nbc-entertainment|blindspot:4236556|programming,5789206|bravo|the-real-housewives-of-cheshire:5789271|programming,5789211|bravo|the-real-housewives-of-cheshire:5789271|programming,5793086|nbc-entertainment|the-tonight-show-starring-jimmy-fallon:151016|programming,121323|||,||||,5793106|nbc-entertainment|the-tonight-show-starring-jimmy-fallon:151016|programming,5793101|nbc-entertainment|the-tonight-show-starring-jimmy-fallon:151016|programming,5817591|nbc-entertainment|heroes-reborn:1069351|programming,5817596|nbc-entertainment|heroes-reborn:1069351|programming,5817601|nbc-entertainment|heroes-reborn:1069351|programming,5877891|nbc-news|meet-the-press:151257|programming,5877896|nbc-news|meet-the-press:151257|programming,12|||,[object Object],,,1,2,3,123,124|||';
$pattern = "/[^\|]*\|[^\|]*\|[^\|]*\|[^\|]*(,|$)/";

$pattern = "/([0-9,]+|[^\|]*\|[^\|]*\|[^\|]*\|[^\|]*)(,|$)/";


$pattern = "/(\d+|[^\|,]*\|[^\|]*\|[^\|]*\|[^\|,]*)(,|$)/";


 $result = preg_match_all($pattern ,$string, $values);

 foreach($values[0] as &$val){
	 $val = rtrim($val, ',');
 }
 
 var_dump($values[0]);