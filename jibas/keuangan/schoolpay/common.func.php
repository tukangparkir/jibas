<?php
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
<?php
function GetVendorName($vendorId)
{
    $sql = "SELECT nama FROM jbsfina.vendor WHERE vendorid = '$vendorId'";
    $res = QueryDb($sql);
    if ($row = mysql_fetch_row($res))
        return $row[0];

    return "";
}

function GetUserName($userId)
{
    $sql = "SELECT nama FROM jbsfina.userpos WHERE userid = '$userId'";
    $res = QueryDb($sql);
    if ($row = mysql_fetch_row($res))
        return $row[0];

    return "";
}

function GetTahunBukuName($idTahunBuku)
{
    $sql = "SELECT tahunbuku FROM jbsfina.tahunbuku WHERE replid = $idTahunBuku";
    $res = QueryDb($sql);
    if ($row = mysql_fetch_row($res))
        return $row[0];

    return "";
}

function GetKelasName($idKelas)
{
    $sql = "SELECT kelas FROM jbsakad.kelas WHERE replid = $idKelas";
    $res = QueryDb($sql);
    if ($row = mysql_fetch_row($res))
        return $row[0];

    return "";
}
?>
