<?php
  require 'vendor/autoload.php';
  
   session_start();
       $emailAddress = $_GET['id']; 
       
       
  use \Mailjet\Resources;
  $mj = new \Mailjet\Client('f81146d209d4bacdd5f45e5c763a286b','a63f8e29a4d77e50f39386eb2a7cd9e8',true,['version' => 'v3.1']);
  $body = [
    'Messages' => [
      [
        'From' => [
          'Email' => "jamesleeroycode@gmail.com",
          'Name' => "Voting System Admin"
        ],
        'To' => [
          [
            'Email' => $emailAddress,
            'Name' => "Voter"
          ]
        ],
        'Subject' => "Greetings Votet",
        'TextPart' => "We Thank you",
        'HTMLPart' => "Thank you taking and letting your Voice for you through your vote",
        'CustomID' => "VoterThanks"
      ]
    ]
  ];
  $response = $mj->post(Resources::$Email, ['body' => $body]);
  $response->success() && $response->getData();
  
  header("Location:http://xamarin.atwebpages.com/finishVoting.php");
?>
