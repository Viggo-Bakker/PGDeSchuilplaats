<HTML>

<HEAD>
    <TITLE>db connect</TITLE>
</HEAD>

<BODY>
    <?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=schuilplaats", "root", "");
    } catch (PDOException $e) {

        //die("Fout!:".$e->getMessage());
        die("Er is een databasefout opgetreden!");
    }
    ?>
</BODY>

</HTML>