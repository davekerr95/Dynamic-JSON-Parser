#Dynamic JSON Parser

This program reads in from a JSON File (data.json) and updates the page every 1 second to show the current amount of people who have entered and exited the shop and thus calculate the current amount of people in the store.

The CSS for this project / assignment was obtained from codepen.io/tjoen/pen/LEpeq

The main body of code is the following PHP code:

```php
<?php

  header("Refresh: 1");
  $jsonFile = "data.json";
  $jsonData = file_get_contents($jsonFile);
  $parsed_json = json_decode($jsonData, true);
  $parsed_json = $parsed_json["Store"];


  echo "<div id='output'>";
  echo "<table id='responstable' class='responstable'>";
  echo "<tr>";
  echo "<th>Store Name</td>";
  echo "<th>Number of People Entered</th>";
  echo "<th>Number of People Exiting</th>";
  echo "<th>Number of People in Store</th>";
  echo "</tr>";

  $warning = false;
  $war = false;

  foreach($parsed_json as $key => $value){

    echo "<tr>";
    echo "<td>" . $value['Store Name'] ."</td>";
    echo "<td>" . $value['Number Entered'] ."</td>";
    echo "<td>" . $value['Number Exited'] ."</td>";
    echo "<td>" . ($value['Number Entered'] - $value['Number Exited']) ."</td>";
    echo "</tr>";

    if(($value['Number Entered'] - $value['Number Exited']) > 50){

      $warning = true;
$warningTest = true;

    }
  }

  echo "</table>";

  if ($warning) {
    echo "<div class='alert-box error'><span>error: </span>" . $value['Store Name'] ." has exceeded 50 people"."</div>";
  }

  else {
    echo "<div class='alert-box success'><span>success: </span>Every Shop is okay.</div>";
  }

 ?>
 ```
