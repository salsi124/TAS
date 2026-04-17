<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $apiKey = "e33a1479be8649d8bfb117b2e75d2eda";
    $apiSecret = "c5539f40012d17b683202b5ec79507b3";

    $body = [
        "Messages" => [
            [
                "From" => [
                    "Email" => "test.dronemakariaprod@gmail.com",
                    "Name" => "Site Web"
                ],
                "To" => [
                    [
                        "Email" => "test.dronemakariaprod@gmail.com",
                        "Name" => "Admin"
                    ]
                ],
                "Subject" => "Nouveau message site",
                "TextPart" => "Nom: $name\nEmail: $email\nMessage: $message"
            ]
        ]
    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://api.mailjet.com/v3.1/send");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json"
    ]);
    curl_setopt($ch, CURLOPT_USERPWD, "$apiKey:$apiSecret");

    $response = curl_exec($ch);
    curl_close($ch);

    echo "Message envoyé !";
}
?>

