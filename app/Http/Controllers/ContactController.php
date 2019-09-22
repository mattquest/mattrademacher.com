<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function post()
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';

        $recaptcha = file_get_contents($url .
            '?secret=' .config('app.recaptcha_secret') .
            '&response=' . request('token') .
            '&remoteip' . request()->ip()
        );
        $recaptcha = json_decode($recaptcha);



        if ($recaptcha->success === true) {
            if ($recaptcha->score > .3) {
                $body =
                'from: '. request('name') . "\n" .
                'email: '. request('email') . "\n" .
                'company: '. request('company') . "\n" .
                'message: '. request('textarea');
               Mail::raw($body, function($message) {
                   $message
                       ->subject('personal site inquiry')
                       ->to('mrademacher@gmail.com')
                       ->from('noreply@mattrademacher.com');
               });
               return 'success';
            } else {
                return 'fail with score '.$recaptcha->score;
            }
        }
        return 'fail';
    }
}
