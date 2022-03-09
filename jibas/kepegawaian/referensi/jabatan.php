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
require_once("../include/sessionchecker.php");
require_once("../include/config.php");
require_once("../include/db_functions.php");
require_once("../include/common.php");
require_once("../include/sessioninfo.php");

OpenDb();

$idanchor = 0;
if (isset($_REQUEST['idanchor']))
	$idanchor = $_REQUEST['idanchor'];

$id = 0;
if (isset($_REQUEST['id']))
	$id = $_REQUEST['id'];
	
$op = "";
if (isset($_REQUEST['op']))
	$op = $_REQUEST['op'];
	
$iddel = "";

if ($op == "1cn3897nx387123n089x7103971") {
	getIdDel($id);
	
	$sql = "DELETE FROM jabatan WHERE replid IN ($iddel)";
	QueryDb($sql);
}

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JIBAS Kepegawaian</title>
<link rel="stylesheet" href="../style/style.css" />
<link rel="stylesheet" href="../script/mktree.css" />
<script language="javascript" src="../script/mktree.js"></script>
<script language="javascript" src="../script/tools.js"></script>
<script language="javascript">
function TambahJabatan(rootid) {
	var addr = "jabataninput.php?rootid=" + rootid;
    newWindow(addr, 'JabatanInput','500','200','resizable=1,scrollbars=1,status=0,toolbar=0');
}

function UbahJabatan(id) {
	var addr = "jabatanedit.php?id=" + id;
    newWindow(addr, 'JabatanEdit','500','200','resizable=1,scrollbars=1,status=0,toolbar=0');
}

function HapusJabatan(idroot, id) {
	if (confirm("Apakah anda yakin akan menghapus data ini?"))
		document.location.href = "jabatan.php?op=1cn3897nx387123n089x7103971&id=" + id + "&idanchor=" + idroot;
}

function RefreshPage(idanchor) {
	document.location.href = "jabatan.php?idanchor=" + idanchor;
}
</script>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#ffffff">

<?
function getIdDel($idroot) {
	global $iddel;
	
	if (strlen($iddel) > 0) 
		$iddel = $iddel . ",";
	$iddel = $iddel . $idroot;	
	
	$sql = "SELECT replid FROM jabatan WHERE rootid = $idroot";
	$result = QueryDb($sql);
	while ($row = mysql_fetch_row($result)) 
		getIdDel($row[0]);
}

function getNSubDir($idroot) 
{
	$sql = "SELECT count(*) FROM jabatan WHERE rootid = $idroot";
	$result = QueryDb($sql);
	$row = mysql_fetch_row($result);
	return $row[0];
}

function spacing($count) 
{
	$str = "";
	for ($i = 0; $i < $count * 2; $i++) 
		$str = $str . " ";
	return $str;
}

function traverse($idroot, $count) 
{
	global $SI_USER_STAFF;
	
	$sql = "SELECT replid, singkatan, jabatan FROM jabatan WHERE rootid=$idroot";
	$result = QueryDb($sql);
	$space = spacing($count);
	
	while ($row = mysql_fetch_row($result))
	{
		$idjab = $row[0];
		$sing  = $row[1];
		$jab   = $row[2];
		$nsubdir = getNSubDir($idjab);
				
		$anchorflag = "<a name='item$idjab'></a>";
		
		if ($nsubdir == 0)
		{
			echo "$space<li class='liBullet'>$anchorflag&nbsp;$sing&nbsp;";
			if (SI_USER_LEVEL() != $SI_USER_STAFF)
			{
				echo "<a href='JavaScript:TambahJabatan($idjab)' title='Tambah Sub Jabatan'><img src='../images/ico/tambah.png' height='14' border='0'></a>";
				echo "<a href='JavaScript:UbahJabatan($idjab)' title='Ubah Jabatan'><img src='../images/ico/ubah.png' height='14' border='0'></a>";
				echo "<a href='JavaScript:HapusJabatan($idroot, $idjab)' title='Hapus Jabatan'><img src='../images/ico/hapus.png' height='14' border='0'></a>";
			}
			echo "</li>\r\n";
		}
		else
		{
			echo "$space<li class='liClosed'>$anchorflag&nbsp;$sing&nbsp;";
			if (SI_USER_LEVEL() != $SI_USER_STAFF)
			{
				echo "<a href='JavaScript:TambahJabatan($idjab)' title='Tambah Sub Jabatan'><img src='../images/ico/tambah.png' height='14' border='0'></a>";
				echo "<a href='JavaScript:UbahJabatan($idjab)' title='Ubah Jabatan'><img src='../images/ico/ubah.png' height='14' border='0'></a>";
				echo "<a href='JavaScript:HapusJabatan($idroot, $idjab)' title='Hapus Jabatan'><img src='../images/ico/hapus.png' height='14' border='0'></a>\r\n";
			}
			echo "$space<ul>\r\n";
			traverse($idjab, ++$count);
			echo "$space</ul></li>\r\n";
		}
	}
}

?>
<table border="0" cellpadding="5" cellspacing="0" width="100%" id="table56">
<tr>
	<td width="100%" align="right" style="border-bottom:thin dashed #CCCCCC; border-top:none; border-left:none; border-right:none;">
        <font style="background-color:#FFCC33; font-size:24px">&nbsp;&nbsp;</font>
        <font class="subtitle">Struktur Jabatan</font><br />
        <a href="referensi.php">Referensi</a> &gt; Struktur Jabatan<br />
    </td>
</tr>
<tr><td>
<a href="#" onclick="expandTree('tree1'); return false;">Expand All</a>&nbsp;|&nbsp;
<a href="#" onclick="collapseTree('tree1'); return false;">Collapse All</a><br /><br />
<?
$sql = "SELECT replid, singkatan, jabatan FROM jabatan WHERE rootid=0";
$result = QueryDb($sql);
if (mysql_num_rows($result) == 0) 
{
	echo "Belum ada data";
} 
else 
{
	$ntree = 0;
	while($row = mysql_fetch_row($result))
	{
		$ntree++;
		$idjab = $row[0];
		$sing  = $row[1];
		$jab   = $row[2]; 
		$nsubdir = getNSubDir($idjab);
		
		$anchorflag = "<a name='item$idjab'></a>";
		
		echo "<ul class='mktree' id='tree$ntree'>\r\n";
		if ($nsubdir == 0)
		{
			echo "  <li class='liBullet'>$anchorflag&nbsp;$sing&nbsp;";
			if (SI_USER_LEVEL() != $SI_USER_STAFF)
			{
				echo "	<a href='JavaScript:TambahJabatan($idjab)' title='Tambah Sub Jabatan'><img src='../images/ico/tambah.png' height='14' border='0'></a>";
			}
			echo "	</li>\r\n";
		}
		else
		{
			echo "  <li class='liClosed'>$anchorflag&nbsp;$sing&nbsp;";
			if (SI_USER_LEVEL() != $SI_USER_STAFF)
			{
				echo "	<a href='JavaScript:TambahJabatan($idjab)' title='Tambah Sub Jabatan'><img src='../images/ico/tambah.png' height='14' border='0'></a>";
				echo "	\r\n";
			}
			echo "  <ul>\r\n";
			traverse($idjab, 2);
			echo "  </ul></li>\r\n";
		}
		echo "</ul>\r\n";
	}
}
?>

</td></tr>
<tr><td align="center">
<img src="../images/border.jpg">
<br><br>
</td></tr>
</table>
<?
CloseDb();
?>
<script language="javascript">
	setTimeout("DoExpand()", 100);
	
	function DoExpand() {
		expandTree('tree1'); 
		<? if ($idanchor != 0) 
		      echo "document.location.href = '#item" . $idanchor . "'"; ?>
		
	}
</script>
</body>
</html>