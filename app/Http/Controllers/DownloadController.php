<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function resume()
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';

        $recaptcha = file_get_contents($url.
            '?secret='.config('app.recaptcha_secret').
            '&response='.request('token').
            '&remoteip'.request()->ip()
        );
        $recaptcha = json_decode($recaptcha);

        if ($recaptcha->success === true && $recaptcha->score > .3) {

            return response()->redirectTo(asset('MattRademacher.pdf'));

            //@todo: code below not working, submitted question through vapor site

//            $headers = [
//                'Content-Type' => 'application/pdf'
//            ];
//            return response()->streamDownload( function() {
//                echo Storage::disk('s3')->get('Matt_Rademacher3.pdf');
//            }, 'MattRademacher.pdf', $headers);

        } else {
            return 'you seem to have hit an expired link!  please go back and try again.';
        }
    }
}
