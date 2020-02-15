<?php

namespace App\Http\Controllers;

use App\Email;

class EmailsController extends Controller
{
    public function send()
    {
        $unsentEmails = Email::where(['sent' => false])
            ->get();

        if (empty($unsentEmails->toArray())) {
            echo "===================================================\n";
            echo date('Y-m-d H:i:s').": No emails to send \n";
            echo "===================================================\n\n";
            exit;
        }

        echo "===================================================\n";
        echo date('Y-m-d H:i:s').": Sending emails...\n";
        echo "===================================================\n\n";

        foreach ($unsentEmails as $email) {
            $email->send();
        }

        echo date('Y-m-d H:i:s').": All emails sent\n";
        echo "===================================================\n\n";
    }
}
