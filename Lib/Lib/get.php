<?php 

if (isset($_GET["veri"])) {

	$ac1 = fopen("map.txt", "a+");
	$veri = ("https://www.google.com/maps/place/".$_GET["veri"]);
	fwrite($ac1, $veri);
	fclose($ac1);
	$ac = fopen("old.txt", "a+");
	$veri = ("https://www.google.com/maps/place/".$_GET["veri"]."\n");
	fwrite($ac, $veri);
	fclose($ac);

?>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12743676.862055203!2d26.178285126945873!3d38.757987208864336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b0155c964f2671%3A0x40d9dbd42a625f2a!2zVMO8cmtpeWU!5e0!3m2!1str!2str!4v1564815634369!5m2!1str!2str" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
<?php	

}
else{
	echo "Lütfen bir veri giriniz.";
}



 ?>