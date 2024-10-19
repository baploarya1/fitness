<?php

namespace App\Helpers;

class PurchaseHelper
{
    public static function generatePurchaseCode($kode)
    {
        // Mengambil waktu saat ini
        $timestamp = time();
        
        // Menghasilkan string acak
        $randomString = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 5);
        
        // Menggabungkan timestamp dan string acak untuk membuat kode pembelian
        return $kode."-" . date("Ymd", $timestamp) . "-" . $randomString;
    }
}
