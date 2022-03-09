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
require_once('../include/errorhandler.php');
require_once('../include/sessionchecker.php');
require_once('../include/common.php');
require_once('../include/rupiah.php');
require_once('../include/config.php');
require_once('../include/db_functions.php');
require_once('../include/getheader.php');
require_once('../library/date.func.php');
require_once('../library/stringbuilder.php');
require_once('common.func.php');
require_once('refund.func.php');

OpenDb();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>JIBAS KEU [Riwayat Refund Penerimaan Vendor ke Sekolah]</title>
    <script language="javascript" src="../script/tables.js"></script>
    <script language="javascript" src="../script/tools.js"></script>
</head>

<body>
<table border="0" cellpadding="10" cellpadding="5" width="780" align="left">
<tr>
    <td align="left" valign="top">

        <?=     getHeader("yayasan") ?>

        <center><font size="4"><strong>RIWAYAT REFUND PENERIMAAN VENDOR</strong></font><br /> </center><br /><br />
        <table border="0">
        <tr>
            <td><strong>Vendor</strong></td>
            <td><strong>: <?= GetVendorName($_REQUEST["vendorid"]) ?></strong></td>
        </tr>
        <tr>
            <td><strong>Departemen</strong></td>
            <td><strong>: <?= $_REQUEST["departemen"] ?></strong></td>
        </tr>
        <tr>
            <td><strong>Tahun Buku</strong></td>
            <td><strong>: <?= GetTahunBukuName($_REQUEST["idtahunbuku"]) ?></strong></td>
        </tr>
        </table>
        <br />

<?php
        ShowRefundHistory(false);
?>

    </td>
</tr>
</table>
</body>
</html>
<script language="javascript">window.print();</script>
<? CloseDb(); ?>