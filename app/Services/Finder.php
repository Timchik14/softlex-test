<?php

namespace App\Services;


use Illuminate\Http\Request;


class Finder
{
    public function findCity(Request $request)
    {
        $ip = $request->ip();

        $ch = curl_init('http://ip-api.com/json/' . $ip . '?lang=ru');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $res = curl_exec($ch);
        curl_close($ch);

        $res = json_decode($res, true);

        if ($res['status'] == 'success') {
            return $res['city'];
        }

        return 'Unknown';
    }

    public function findBrowser(Request $request)
    {
        $browserString = $request->header('User-Agent');

        preg_match("/(MSIE|Opera|Firefox|Chrome|Version)(?:\/| )([0-9.]+)/", $browserString, $bInfo);
        return ($bInfo[1] == "Version") ? "Safari" : $bInfo[1];
    }
}
