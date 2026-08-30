<?php

$pageStyles = ['src/css/suppages.css', 'src/css/forms.css'];
$pageTitle = 'Contact';
$pageTemplate = 'contact.php';
$success = null;
$errors = [];

$form = [
    'name' => '',
    'email' => '',
    'message' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form['name'] = trim((string) ($_POST['name'] ?? ''));
    $form['email'] = trim((string) ($_POST['email'] ?? ''));
    $form['message'] = trim((string) ($_POST['message'] ?? ''));

    if ($form['name'] === '') {
        $errors[] = 'Vul je naam in.';
    }

    if ($form['email'] === '' || !filter_var($form['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Vul een geldig e-mailadres in.';
    }

    if ($form['message'] === '') {
        $errors[] = 'Schrijf een bericht.';
    }

    if (empty($errors)) {
        // $to = 'info@deschuilplaats.nl';
        $to = 'joahmqkh@gmail.com';
        $subject = 'Contactbericht via de website';
        $body = "Naam: {$form['name']}\nE-mail: {$form['email']}\n\n{$form['message']}";
        $headers = 'From: ' . $form['email'];
        // print_r($body);
        if (@mail($to, $subject, $body, $headers)) {
            $success = 'Je bericht is verzonden.';
            $form = ['name' => '', 'email' => '', 'message' => ''];
            // print_r($success);
        } else {
            $errors[] = 'Het bericht kon niet worden verzonden.';
        }
    }
}
