<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=FeestDB user=postgres password=password");
$query = "SELECT * FROM artistssongs";
if (!$dbconn) {
  echo "An error occurred.\n";
  exit;
}
$result = pg_query($dbconn, $query);
if (!$result) {
  echo "An error occurred.\n";
  exit;
}
$nrrows = pg_num_rows($result);
echo " $nrrows";
while ($row = pg_fetch_row($result)) {
  echo "Artist: $row[1]  Song: $row[2]";
  echo "<br />\n";
}

$insertquery = "INSERT into artistssongs (artists, songs) VALUES ('Pink Floyd', 'Comfortably Numb')";
$insertresult = pg_query($dbconn, $insertquery);
if (!$insertresult) {
  echo "An error occurred while inserting.\n";
  exit;
}
?>
