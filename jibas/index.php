<?
/**[N]**
 * JIBAS Education Community
 * Jaringan Informasi Bersama Antar Sekolah
 * 
 * @version: 26.0 (October 07, 2021)
 * @notes: JIBAS Education Community will be managed by Yayasan Indonesia Membaca (http://www.indonesiamembaca.net)
 * 
 * Copyright (C) 2009 Yayasan Indonesia Membaca (http://www.indonesiamembaca.net)
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 **[N]**/ ?>
<?
require_once('include/mainconfig.php');
require_once('include/db_functions.php');

// --- Patch Management Framework ---
require_once('include/global.patch.manager.php');
ApplyGlobalPatch(".");

// --- LiveUpdate Status ----
session_name("jbsmain");
session_start();

$lid = -1; // current liveupdate id
$dbconnect = @mysql_connect($db_host, $db_user, $db_pass);
if ($dbconnect)
{
	$dbselect = @mysql_select_db("jbsclient", $dbconnect);
	
	if ($dbselect)
	{
		$sql = "SELECT nilai FROM jbsclient.liveupdateconfig WHERE tipe='MIN_UPDATE_ID'";
		$result = @mysql_query($sql, $dbconnect);
		$row = @mysql_fetch_row($result);
		$minid = $row[0];
		
		$sql = "SELECT MAX(liveupdateid) FROM jbsclient.liveupdate";
		$result = @mysql_query($sql, $dbconnect);
		$row = @mysql_fetch_row($result);
		$maxinstalled  = is_null($row[0]) ? 0 : $row[0];
		
		$lid = $minid >= $maxinstalled ? $minid : $maxinstalled;
	}
	
	@mysql_close($dbconnect);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JIBAS Education Community <?=$G_VERSION?></title>
<link href="script/vtip.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/jibas2015.ico" />
<script language="javascript" src="script/jquery.min.js"></script>
<script language="javascript" src="script/ajax.js"></script>
<script language="javascript" src="script/vtip.js"></script>
<script language="javascript" src="index.js"></script>
<link rel="stylesheet" href="script/bgstretcher.css" />
<script language="javascript" src="script/bgstretcher.js"></script>
</head>

<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<div style="position:relative; z-index:2">

<div id="dvMain" style='position:absolute; width:1240px; height:620px; '>
	
<table border="0" cellpadding="0" cellspacing="0" align="center" >
<tr>
	<td align="center" height="70">
	<br><br><br>
	<table border="0" cellpadding="5">
	<tr>
		<td>
			<img src="images/<?= $G_LOGO_DEPAN_KIRI ?>">
		</td>
		<td width="*" align="center">
			<font style="font-family:Tahoma; font-size:20px; color:#fff; ">
			<?= $G_JUDUL_DEPAN_1 ?>
			</font><br>
			<font style="font-family:Tahoma; font-size:12px; color:#fff; font-weight:bold; ">
			<?= $G_JUDUL_DEPAN_2 ?>
			</font><br>
			<font style="font-family:Tahoma; font-size:10px; color:#fff; ">
			<?= $G_JUDUL_DEPAN_3 ?>
			</font>
		</td>
		<td>
			<img src="images/<?= $G_LOGO_DEPAN_KANAN ?>">
		</td>
	</tr>
	</table>		
    <br><br>
    </td>
</tr>
<tr>
	<td align="center">
	<table border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td align="center" width="140">
			<a href="akademik/index.php">
			<img id="btAkademik" src="images/btnmenu_green_p_03.png" onMouseOver="changeImage('btAkademik','images/btnmenu_green_a_03.png')" onMouseOut="changeImage('btAkademik','images/btnmenu_green_p_03.png')" border="0">
			</a>
		</td>
		<td align="center" width="140">
			<a href="keuangan/index.php">
			<img id="btKeuangan" src="images/btnmenu_green_p_04.png" onMouseOver="changeImage('btKeuangan','images/btnmenu_green_a_04.png')" onMouseOut="changeImage('btKeuangan','images/btnmenu_green_p_04.png')" border="0">
			</a>
		</td>
		<td align="center" width="140">
			<a href="smsgateway/index.php">
			<img id="btSMSGateway" src="images/btnmenu_green_p_10.png" onMouseOver="changeImage('btSMSGateway','images/btnmenu_green_a_10.png')" onMouseOut="changeImage('btSMSGateway','images/btnmenu_green_p_10.png')" border="0">
			</a>
        </td>
        <td align="center" width="140">
			<a href="infosiswa/index.php">
			<img id="btInfoSiswa" src="images/btnmenu_green_p_09.png" onMouseOver="changeImage('btInfoSiswa','images/btnmenu_green_a_09.png')" onMouseOut="changeImage('btInfoSiswa','images/btnmenu_green_p_09.png')" border="0">
		</a>
	</tr>
	</table>
	</td>
</tr>

<tr>
	<td align="center">
		
	<table border="0" cellpadding="0" cellspacing="0">
	<tr>
	    <td align="center" width="140">
			<a href="simtaka/index.php">
			<img id="btPerpustakaan" src="images/btnmenu_green_p_05.png" onMouseOver="changeImage('btPerpustakaan','images/btnmenu_green_a_05.png')" onMouseOut="changeImage('btPerpustakaan','images/btnmenu_green_p_05.png')" border="0">
			</a>
		</td>
		<td align="center" width="140">
			<a href="kepegawaian/index.php">
			<img id="btKepegawaian" src="images/btnmenu_green_p_19.png" onMouseOver="changeImage('btKepegawaian','images/btnmenu_green_a_19.png')" onMouseOut="changeImage('btKepegawaian','images/btnmenu_green_p_19.png')" border="0">
			</a>
		</td>
		<td align="center" width="140">
			<a href="ema/index.php">
			<img id="btPelaporan" src="images/btnmenu_green_p_06.png" onMouseOver="changeImage('btPelaporan','images/btnmenu_green_a_06.png')" onMouseOut="changeImage('btPelaporan','images/btnmenu_green_p_06.png')" border="0">
			</a>	
		</td>
		<td align="center" width="140">
            <a href="infoguru/index.php">
                <img id="btInfoGuru" src="images/btnmenu_green_p_08.png" onMouseOver="changeImage('btInfoGuru','images/btnmenu_green_a_08.png')" onMouseOut="changeImage('btInfoGuru','images/btnmenu_green_p_08.png')" border="0">
            </a>
        </td>

	</tr>
	</table>
	
	</td>
</tr>
    <tr>
        <td align="center">
            <table border="0" cellpadding="0" cellspacing="0">
            <tr>
            <td align="center" width="140">
            <a href="cbe/login.php" target="_blank">
                <img id="btCbe" src="images/btnmenu_green_p_24a.png" onMouseOver="changeImage('btCbe','images/btnmenu_green_a_24a.png')"
                     onMouseOut="changeImage('btCbe','images/btnmenu_green_p_24a.png')" border="0"
                     title="Aplikasi pengujian berbasis komputer untuk siswa, calon siswa dan pegawai">
            </a	>
        </td>
        <td align="center" width="140">
            <a href="anjungan/index.php">
                <img id="btAnjungan" src="images/btnmenu_green_p_21.png" onMouseOver="changeImage('btAnjungan','images/btnmenu_green_a_21.png')"
                     onMouseOut="changeImage('btAnjungan','images/btnmenu_green_p_21.png')" border="0">
            </a>
        </td>
        <td align="center" width="140">
            <a href="schooltube/index.php" target="_blank">
                <img id="btSchoolTube" src="images/btnmenu_green_p_26.png" onMouseOver="changeImage('btSchoolTube','images/btnmenu_green_a_26.png')"
                     onMouseOut="changeImage('btSchoolTube','images/btnmenu_green_p_26.png')" border="0"
                     title="Aplikasi e-Learning">
            </a	>
        </td>
            </tr>
            </table>

        </td>
    </tr>


</table>

</div>

<div id="dvCopy" style="color:#fff; width:300px; font-size:11px; font-family:Tahoma; position:absolute; background-image:url(images/bgdiv_black.png);">
<table border="0" cellpadding="2" cellspacing="0">
<tr>
<td align="right" valign="middle">
	versi <?=$G_VERSION." - ".$G_BUILDDATE?><br />
	<a href="http://www.jibas.net" target="_blank" style="color:#fff; text-decoration:none;">
	&nbsp;&nbsp;<strong>JIBAS</strong>: Jaringan Informasi Bersama Antar Sekolah</a><br />
	&nbsp;&nbsp;Hak cipta &copy; 2009 <a href="http://www.indonesiamembaca.net" target="_blank" style="color:#00f6f3; text-decoration:underline;">Yayasan Indonesia Membaca</a><br>
</td>
<td>
	<a href="http://www.jibas.net" target="_blank">
	<img src="images/jibas.png" border="0" title="JIBAS">
	</a>	
</td>	
</tr>	
</table>
</div>

<div id="dvPartner" style="color:#fff; width:120px; font-size:11px; font-family:Tahoma; position:absolute; background-image:url(images/bgdiv_black.png);">
<?
include('info.php');
?>
</div>

<div id="lumessage" style="width:250px; height:20px; position:absolute; font-family:Tahoma; font-size:11px; color:#ddd; text-align:center; background-image:url(images/bgdiv_black.png);">
<?	
if ($_SESSION['lugetstatus'] && $_SESSION['lugetlid'] == $lid)
	echo $_SESSION['lugetmessage'];
else	
	echo "Memeriksa Update ..."; 
?>
</div>

</div> 
</body>
</html>

<? if (!$_SESSION['lugetstatus'] || $_SESSION['lugetlid'] != $lid) { ?>
<script type="text/javascript" language="javascript">
getLuStatus(<?=$lid?>);
</script>
<? } ?>
