<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDBPDO";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

  $stmt = $conn->prepare("UPDATE MyGuests SET lastname=:lastname, firstname=:firstname WHERE id=2");
  $conn->exec("set names utf8mb4");
  // Prepare statement
  $stmt->bindParam(':firstname',$firstname);
  $stmt->bindParam(':lastname', $lastname);
  

  // execute the query
  $stmt->execute();

  // echo a message to say the UPDATE succeeded
  echo $stmt->rowCount() . " records UPDATED successfully";
} catch(PDOException $e) {
  echo  "<br>" . $e->getMessage() .' '.$e->getTraceAsString();
}

$conn = null;
?>