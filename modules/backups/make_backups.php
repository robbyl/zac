<?php

require '../../config/config.php';

$query = "SELECT @@basedir
              AS mysql_path";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$mysql_bin_path = $row['mysql_path'];


$username = USER;
$password = PASSWORD;
$db = DATABASE;
$suffix = time();


//Execute the command to create backup sql file
exec("{$mysql_bin_path}/bin/mysqldump --user={$username} --password={$password}  {$db} > backups/backup.sql");

//Now zip that file
$zip = new ZipArchive();
$filename = "backups/backup-$suffix.zip";

if ($zip->open($filename, ZIPARCHIVE::CREATE) !== TRUE) {
    exit("cannot open <$filename>\n");
}
if ($zip->addFile("backups/backup.sql", "backup.sql") !== TRUE) {
    header('Location: backup.php?error=111');
    exit();
}
$zip->close();

//Now delete the .sql file without any warning
if (unlink("backups/backup.sql")) {
    echo '<div class="message">Datase backup complete!</div>';
}
?>
