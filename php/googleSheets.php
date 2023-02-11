<?php
require_once('../vendor/autoload.php');
require_once('../db/DBConnection.php');
$client = new Google_Client();
$client->setApplicationName('Google Sheets API');
$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
$path = '../deft-sight-377505-389a4e3e8ded.json';
$client->setAuthConfig($path);

$service = new Google_Service_Sheets($client);

$spreadsheetId = '1FjfSEpU5MWaD67UikqpRIKcmNsDTpSRyb89-qeDrWSc';
$spreadsheet = $service->spreadsheets->get($spreadsheetId);
$stmt = DBConnClass::run()->prepare("SELECT * FROM form_data WHERE age > 18");
$stmt->execute();
$allData = $stmt->fetchAll();
foreach($allData as $data){
    $name = $data['name'];
    $surname = $data['surname'];
    $age = $data['age'];

    $newRow = [
        $name,
        $surname,
        $age
    ];
    $rows = [$newRow]; // you can append several rows at once
    $valueRange = new \Google_Service_Sheets_ValueRange();
    $valueRange->setValues($rows);
    $range = 'Sheet1'; // the service will detect the last row of this sheet
    $options = ['valueInputOption' => 'USER_ENTERED'];
    $service->spreadsheets_values->append($spreadsheetId, $range, $valueRange, $options);
}