<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MoodleController extends Controller
{
    public function login()
    {
        $url = 'http://your-moodle-site-url/login/index.php';
        $params = [
            'username' => auth()->user()->email,
            'password' => 'your-moodle-site-password',
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        curl_close($ch);
        return redirect()->intended('/');
    }
}
