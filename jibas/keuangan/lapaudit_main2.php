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
$tanggal1 = $_REQUEST['tanggal1'];
$tanggal2 = $_REQUEST['tanggal2'];
$dep = $_REQUEST['departemen'];
$idtahunbuku = $_REQUEST['idtahunbuku'];
?>
<frameset cols="350,*" frameborder="1" border="0" framespacing="0" frameborder="0">
	<frame name="pilih" src="lapaudit_pilih.php?departemen=<?=$dep?>&idtahunbuku=<?=$idtahunbuku?>&tanggal1=<?=$tanggal1?>&tanggal2=<?=$tanggal2?>" scrolling="auto" style="border:1px; border-right-color:#000000; border-right-style:solid" />
	<frame name="content" src="blank_audit.php" />
</frameset><noframes></noframes>