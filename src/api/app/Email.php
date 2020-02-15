<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = [
        'appointment_id',
        'recipient',
        'subject',
        'message',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function scheduleEmail(
        $appointment_id,
        $recipient,
        $subject,
        $message
    ) {
        $this->create([
            'appointment_id' => $appointment_id,
            'recipient' => $recipient,
            'subject' => $subject,
            'message' => $message,
        ]);
    }

    public function send()
    {
        echo "===================================================\n";
        echo "Sent at: ".date('Y-m-d H:i:s')."\n";
        echo "Recipient: ".$this->recipient."\n";
        echo "Subject: ".$this->subject."\n";
        echo "Message: ".$this->message."\n";
        echo "===================================================\n\n";

        $this->sent = true;
        $this->sent_date = date('Y-m-d H:i:s');
        $this->save();
    }
}
