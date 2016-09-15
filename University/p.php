<?php

require_once 'utils/DbConnection.php';
$conn=DbConnection::connect();
if (!$conn) {
    echo "An error occurred.\n";
    exit;
}

$u='crisboyr';
$sql = "SELECT * FROM usuarios WHERE idUsuario=?";
$query=$conn->prepare($sql);
$query->bindParam(1,$u);
$query->execute();
if ($query->rowCount()==0) {
    echo "An error occurred.\n";
    exit;
}

while ($row = $query->fetch()) {
    echo "Author: $row[0]  E-mail: $row[1]";
    echo "<br />\n";
}

?>