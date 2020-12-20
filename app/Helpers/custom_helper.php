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
        'm' => 'months',
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

        $months = explode("=", $link);
        return $months[1];
    } else if (strstr($link, 'be/')) {

        // youtu.be/YsL4O47C-0k
        // mendapatkan kode id video
        $months = explode("be/", $link);
        return $months[1];
    }
}

function get_small_char($char, $max)
{
    if (strlen($char) <= $max) {
        return substr($char, 0, $max) . "";
    } else {
        return substr($char, 0, $max) . " ...";
    }
}
function tanggal($date)
{
    $date_format = date('D, d M Y', strtotime($date));
    $days = explode(",", $date_format);
    if ($days[0] == "Sun") {
        $hari = "Minggu";
    } elseif ($days[0] == "Mon") {
        $hari = "Senin";
    } elseif ($days[0] == "Tue") {
        $hari = "Selasa";
    } elseif ($days[0] == "Wed") {
        $hari = "Rabu";
    } elseif ($days[0] == "Thu") {
        $hari = "Kamis";
    } elseif ($days[0] == "Fri") {
        $hari = "Jumat";
    } elseif ($days[0] == "Sat") {
        $hari = "Sabtu";
    } else {
        $hari = "";
    }

    $months = explode(" ", $days[1]);
    if ($months[2] == "Jan") {
        $bulan = "Januari";
    } elseif ($months[2] == "Feb") {
        $bulan = "Februari";
    } elseif ($months[2] == "Mar") {
        $bulan = "Maret";
    } elseif ($months[2] == "Apr") {
        $bulan = "April";
    } elseif ($months[2] == "May") {
        $bulan = "Mei";
    } elseif ($months[2] == "Jun") {
        $bulan = "Juni";
    } elseif ($months[2] == "Jul") {
        $bulan = "Juli";
    } elseif ($months[2] == "Aug") {
        $bulan = "Agustus";
    } elseif ($months[2] == "Sep") {
        $bulan = "September";
    } elseif ($months[2] == "Oct") {
        $bulan = "Oktober";
    } elseif ($months[2] == "Nov") {
        $bulan = "November";
    } elseif ($months[2] == "Dec") {
        $bulan = "Desember";
    } else {
        $bulan = "";
    }

    $tanggal = $months[1];
    $tahun = $months[3];
    return "$hari, $tanggal $bulan $tahun";
}

// function tanggal($date)
// {
//     return date('D, d M Y', strtotime($date));
// }

// function tanggal_lengkap($date)
// {
//     // dd($date);
//     dd($date_format = date('D, d M Y H:i:s', strtotime($date)));
//     $days = explode(",", $date_format);
//     if ($days[0] == "Sun") {
//         $hari = "Minggu";
//     } elseif ($days[0] == "Mon") {
//         $hari = "Senin";
//     } elseif ($days[0] == "Tue") {
//         $hari = "Selasa";
//     } elseif ($days[0] == "Wed") {
//         $hari = "Rabu";
//     } elseif ($days[0] == "Thu") {
//         $hari = "Kamis";
//     } elseif ($days[0] == "Fri") {
//         $hari = "Jumat";
//     } elseif ($days[0] == "Sat") {
//         $hari = "Sabtu";
//     } else {
//         $hari = "";
//     }

//     $months = explode(" ", $days[1]);
//     if ($months[2] == "Jan") {
//         $bulan = "Januari";
//     } elseif ($months[2] == "Feb") {
//         $bulan = "Februari";
//     } elseif ($months[2] == "Mar") {
//         $bulan = "Maret";
//     } elseif ($months[2] == "Apr") {
//         $bulan = "April";
//     } elseif ($months[2] == "May") {
//         $bulan = "Mei";
//     } elseif ($months[2] == "Jun") {
//         $bulan = "Juni";
//     } elseif ($months[2] == "Jul") {
//         $bulan = "Juli";
//     } elseif ($months[2] == "Aug") {
//         $bulan = "Agustus";
//     } elseif ($months[2] == "Sep") {
//         $bulan = "September";
//     } elseif ($months[2] == "Oct") {
//         $bulan = "Oktober";
//     } elseif ($months[2] == "Nov") {
//         $bulan = "November";
//     } elseif ($months[2] == "Dec") {
//         $bulan = "Desember";
//     } else {
//         $bulan = "";
//     }

//     $hours = date('H:i:s', strtotime($date));

//     // if()
//     $tanggal = $months[1];
//     $tahun = $months[3];
//     return "$hari, $tanggal $bulan $tahun";
// }
