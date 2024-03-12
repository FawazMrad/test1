<?php


namespace App\Services;

class NotificationService
{
    public static function sendNotification($token, $title, $body)
    {
        $SERVER_API_KEY = 'API SERVER KEY';

        $data = [
            "registration_ids" => [
                $token
            ],
            "notification" => [
                "title" => $title,
                "body" => $body,
                "sound" => "default"
            ],
        ];

        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        // Close cURL resource
        curl_close($ch);

        return $response;
    }
}
