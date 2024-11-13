<?php

use Carbon\Carbon;
use App\Models\Nilai;

if (!function_exists('formattedDate')) {
    function formattedDate($date)
    {
 
        $formattedDate = Carbon::parse($date)->isoFormat('D MMM YYYY', 'id');


        return $formattedDate;
    }
}

if (!function_exists('myNilai')) {
    function myNilai($session, $soal)
    {
 
        $nilai = Nilai::where('session_id', $session)->where('soal_id', $soal)->first();


        return $nilai;
    }
}

if (!function_exists('buttonClass')) {
    function buttonClass($pembahasan, $nilai)
    {
        $class = '';

        if ($nilai == null || $pembahasan == null) {
            $class = 'btn-light';
        } elseif ($nilai != null & ($nilai->pilgan_id == $pembahasan->pilgan_id)) {
            $class = 'btn-success';
        } elseif ($nilai != null & ($nilai->pilgan_id != $pembahasan->pilgan_id)) {
            $class = 'btn-danger';
        }


        return $class;
    }
}

if (!function_exists('trimAfter50Letters')) {
    function trimAfter50Letters($string) {
        // Get the first 50 characters of the string
        $trimmedString = mb_substr($string, 0, 19);

        // If the length of the string is less than or equal to 50 characters, return the original string
        if (mb_strlen($string) <= 19) {
            return $string;
        }

        // Append ellipsis (...) to indicate that the string has been trimmed
        $trimmedString .= '...';

        return $trimmedString;
    }
}

if (!function_exists('formatDate')) {
    function formatDate($date)
    {
        $formattedDate = Carbon::parse($date)->translatedFormat('l, j F Y H:i:s');

        return $formattedDate;
    }
}

if (!function_exists('generateAccountCircle')) {
    function generateAccountCircle($name) {
        // Get initials
        $initials = strtoupper(substr($name, 0, 2));
        
        // Generate random color
        $randomColor = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        
        return [
            'initials' => $initials,
            'color' => $randomColor
        ];
    }
}
