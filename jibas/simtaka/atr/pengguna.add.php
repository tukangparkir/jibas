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
require_once('../inc/config.php');
require_once('../inc/common.php');
require_once('../inc/fileinfo.php');
require_once('../inc/imageresizer.php');
require_once('../inc/db_functions.php');
require_once('pengguna.add.class.php');

OpenDb();
$PA = new CPenggunaAdd();
$PA->OnStart();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tambah Pengguna</title>
<link href="../sty/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../scr/jquery3/jquery-1.2.6.js"></script>
<script type="text/javascript" src="../scr/tools.js"></script>
<script type="text/javascript" src="pengguna.js"></script>
</head>

<body style="margin-top:0px; margin-left:0px">
<?=$PA->add()?>
</body>
</html>
<?
CloseDb();
?>