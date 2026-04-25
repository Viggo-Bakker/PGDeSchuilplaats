<?php

namespace System\Utils;

class File
{
    public function store(array $uploadFile): string
    {
        //if this request falls under any (Undifined | Multiple Files | $_FILES Corruption Attack) of them, treat it invalid.
        if (!isset($uploadFile['error']) || is_array($uploadFile['error'])) {
            throw new \RuntimeException('Ongeldig bestand.');
        }

        //Check $uploadFile['error'] value.
        switch ($uploadFile['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new \RuntimeException('Geen bestand geüpload.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new \RuntimeException('Bestand is te groot.');
            default:
                throw new \RuntimeException('Onbekende fout.');
        }

        //You should also check filesize here.
        if ($uploadFile['size'] > 100000000) {
            throw new \RuntimeException('Bestand is te groot.');
        }

        //DO NOT TRUST $uploadFile['mime'] VALUE !!, check MIME Type by yourself.
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        if (!in_array(
            $finfo->file($uploadFile['tmp_name']),
            [
                'audio/mpeg',
                'audio/mp3',
                'audio/x-mpeg'
            ],
            true
        )) {
            throw new \RuntimeException('Ongeldig bestandstype. Alleen .mp3 bestanden zijn toegestaan.');
        }

        //make unique filename and store file
        $originalName = pathinfo($uploadFile['name'], PATHINFO_FILENAME);
        // only letters, numbers, - and _. replace other characters with _
        $safeName = preg_replace('/[^a-zA-Z0-9-_]/', '_', $originalName);
        if (empty($safeName)) {
            $safeName = 'audio';
        }
        // make unique
        $filename = $safeName . '_' . uniqid('', true) . '.mp3';

        $uploadDir = __DIR__ . '/../../../../src/assets/uploads/audio/';
        $fullPath = $uploadDir . $filename;

        if (!move_uploaded_file($uploadFile['tmp_name'], $fullPath)) {
            throw new \RuntimeException('Fout bij het opslaan van het bestand.');
        }

        return $filename;
    }
}
