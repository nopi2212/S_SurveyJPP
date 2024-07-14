<?php

function tgl_indonesia($tanggal, $tgl = false)
{
    $bulan = array(
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    $split = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

    if ($tgl) {
        $tgl_indo =  $bulan[(int)$split[1]] . ' ' . $split[0];
    }

    return $tgl_indo;
}

function bulan()
{
    return [
        '1' => 'Januari',
        '2' => 'Februari',
        '3' => 'Maret',
        '4' => 'April',
        '5' => 'Mei',
        '6' => 'Juni',
        '7' => 'Juli',
        '8' => 'Agustus',
        '9' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
    ];
}

function tahun()
{
    $year_select = 2023;
    $year = date('Y') + 1;
    return range($year, $year_select);
}

function cekCSI($val)
{
    if ($val >= 81 && $val <= 100) {
        return 'Sangat Puas';
    }
    if ($val >= 66 && $val <= 80.99) {
        return 'Puas';
    }
    if ($val >= 51 && $val <= 65.99) {
        return 'Cukup Puas';
    }
    if ($val >= 35 && $val <= 50.99) {
        return 'Tidak Puas';
    }
    if ($val >= 1 && $val <= 34.99) {
        return 'Sangat Tidak Puas';
    }
    if ($val == 0) {
        return 'Data Survei Tidak Tersedia';
    }
}

function numberFormat($val)
{
    return str_replace('.', ',', $val);
}
