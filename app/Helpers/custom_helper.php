<?php

function time_elapsed_string($datetime, $full = false)
{
    date_default_timezone_set('ASIA/JAKARTA');
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'Tahun',
        'm' => 'Bulan',
        'w' => 'Minggu',
        'd' => 'Hari',
        'h' => 'Jam',
        'i' => 'Menit',
        's' => 'Detik',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? ' yang' : ' yang');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' lalu' : 'baru saja';
}

function get_id_video($link)
{
    // www.youtube.com/watch?v=YsL4O47C-0k
    // mendapatkan kode id video
    if (strstr($link, 'v=')) {

        $pecah = explode("=", $link);
        return $pecah[1];
    } else if (strstr($link, 'be/')) {

        // youtu.be/YsL4O47C-0k
        // mendapatkan kode id video
        $pecah = explode("be/", $link);
        return $pecah[1];
    }
}

function get_small_char($char, $max)
{
    return substr($char, 0, $max);
}
