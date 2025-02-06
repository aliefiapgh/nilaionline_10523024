<!DOCTYPE html>

<!-- Developed by Websquare Indonesia -->

<!--[if lt IE 7 ]> <html class="no-js ie6 ie" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7 ie" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8 ie" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>

<title>.: Sistem Informasi Nilai Online - Universitas Komputer Indonesia :.</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link rel="shortcut icon" type="image/x-icon" href="../images/logoicon.ico" />
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Kreon:light,regular' rel='stylesheet' type='text/css'/>
<link rel="stylesheet" type="text/css" href="../css/style-sheet.css" />
<!-- <link rel="stylesheet" type="text/css" href="css/style-sheet2.css" />-->
<link rel="stylesheet" type="text/css" href="../css/nivo-slider.css" />
</head>

<body onLoad="initialize()">
	<header>
    <section class="logo"><a href="#"><img src="../images/logo.png" /></a></section>
	<section class="title">Sistem Informasi Nilai Online <br /> <span>Universitas Komputer Indonesia</span></section>
	<section class="clr" style="text-align: center;">
    Jl. Dipati Ukur No.112-116, Lebakgede, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132
	</section>
	</header>

<section id="navigator">
    <ul class="menus">
        <li><a href="./?adm=home">Home</a></li>
        <li><a href="./?adm=mahasiswa">Mahasiswa</a></li>
        <li><a href="./?adm=dosen">Dosen</a></li>
        <li><a href="nilaiView.php">Nilai</a></li>
        <li><a href="./?adm=logout">Logout</a></li>
    </ul>
</section>

<section id="container">
<br><br><br>
<?php
if(empty($_GET)){
	include ("home.php");
}else{
	if($_GET["adm"]=="home"){
		include ("home.php");
	}elseif($_GET["adm"]=="mahasiswa"){
		include ("mahasiswaView.php");
	}elseif($_GET["adm"]=="mahasiswaAdd"){
		include ("mahasiswaAdd.php");
	}elseif($_GET["adm"]=="mahasiswaEdit"){
		include ("mahasiswaEdit.php");
	}elseif($_GET["adm"]=="mahasiswaDelete"){
		include ("mahasiswaDelete.php");
	}elseif($_GET["adm"]=="dosen"){
		include ("dosenView.php");
	}elseif($_GET["adm"]=="dosenAdd"){
		include ("dosenAdd.php");
	}elseif($_GET["adm"]=="dosenEdit"){
		include ("dosenEdit.php");
	}elseif($_GET["adm"]=="dosenDelete"){
		include ("dosenDelete.php");
	}elseif($_GET["adm"]=="matakuliah"){
		include ("matkulView.php");
	}elseif($_GET["adm"]=="matkulAdd"){
		include ("matkulAdd.php");
	}elseif($_GET["adm"]=="matkulEdit"){
		include ("matkulEdit.php");
	}elseif($_GET["adm"]=="matkulDelete"){
		include ("matkulDelete.php");
	}
}
?>
<br><br><br><br><br><br>
    <section class="clr"></section>
</section>

<footer>
	<font color=#000> Copyright &copy; 2025 - Universitas Komputer Indonesia <br />
    Developed By <a href="#" target="_new">Aliefia Puan Ghifari</a> </font>
</footer>

</body>

</html>