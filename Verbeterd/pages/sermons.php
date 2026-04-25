<?php 

//check session
//komt nog

//set deafault empty sermon object & load post logic
$sermon = new \System\SermonsCollection\Sermon();
require_once __DIR__ . '/includes/sermon-post-data.php';
$sermon->file = 'test.mp3'; //temp, remove later when file upload is implemented


//database magic
if(isset($formData) && empty($errors)) {
    //store file
    $file = new \System\Utils\File();
    $sermon->file = $file->store($_FILES['audio']);

    //init the database
    $db = new \System\Databases\Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    //create sermon
    if(\System\SermonsCollection\Sermon::create($sermon, $db->getConnection())) {
        $success = "Preek succesvol opgeslagen!";
        //override sermon object with empty values to clear form
        $sermon = new \System\SermonsCollection\Sermon();
    } else {
        $errors[] = "Er is een fout opgetreden bij het opslaan van de preek.";
    }
}


$pageTitle = "Preken opslaan";
