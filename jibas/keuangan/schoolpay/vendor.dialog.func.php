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
function LoadValue()
{
    global $vendorReplid;
    global $vendorId, $vendorName, $keterangan, $terimaIuran, $kirimPesan;

    $sql = "SELECT * FROM jbsfina.vendor WHERE replid = $vendorReplid";
    $res = QueryDb($sql);
    if ($row = mysql_fetch_array($res))
    {
        $vendorId = $row["vendorid"];
        $vendorName = $row["nama"];
        $keterangan = $row["keterangan"];
        if ($row["terimaiuran"] == 1)
            $terimaIuran = "checked";
        if ($row["kirimpesan"] == 1)
            $kirimPesan = "checked";
    }
}

function SimpanVendor()
{
    $vendorReplid = $_REQUEST["vendorreplid"];
    $vendorId = SafeValue($_REQUEST["vendorid"]);
    $vendorName = SafeValue($_REQUEST["vendorname"]);
    $terimaIuran = $_REQUEST["terimaiuran"];
    $kirimPesan = $_REQUEST["kirimpesan"];
    $keterangan = SafeValue($_REQUEST["keterangan"]);

    if ($vendorReplid == 0)
    {
        $sql = "SELECT COUNT(replid)
                  FROM jbsfina.vendor 
                 WHERE vendorid = '$vendorId'";
        $nData = FetchSingle($sql);
        if ($nData > 0)
            return createJsonReturn(-1, "Vendor Id $vendorId sudah digunakan. Pilih vendor id yang lain");

        $sql = "INSERT INTO jbsfina.vendor 
                   SET vendorid = '$vendorId', nama = '$vendorName', keterangan = '$keterangan', 
                       terimaiuran = $terimaIuran, kirimpesan = $kirimPesan, aktif = 1, tanggal = NOW()";
        QueryDb($sql);

        return createJsonReturn(1, "OK");
    }

    $sql = "SELECT COUNT(replid)
              FROM jbsfina.vendor 
             WHERE vendorid = '$vendorId'
               AND replid <> $vendorReplid";
    $nData = FetchSingle($sql);
    if ($nData > 0)
    {
        return createJsonReturn(-1, "Vendor Id $vendorId sudah digunakan. Pilih vendor id yang lain");
    }

    $sql = "UPDATE jbsfina.vendor
               SET vendorid = '$vendorId', nama = '$vendorName', keterangan = '$keterangan', 
                   terimaiuran = $terimaIuran, kirimpesan = $kirimPesan
             WHERE replid = $vendorReplid";
    QueryDb($sql);

    return createJsonReturn(1, "OK");
}

function createJsonReturn($status, $message)
{
    $ret = array($status, $message);
    return json_encode($ret);
}

?>