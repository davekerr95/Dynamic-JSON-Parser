<!DOCTYPE html>
<html>
    <head>
        <title> Javascript Object Notation Assignment</title>
        <meta charset="utf-8"/>

        <style>
        .responsetable {
          margin: 1em 0;
          width: 100%;
          overflow: hidden;
          background: #FFF;
          color: #024457;
          border-radius: 10px;
          border: 1px solid #167F92;
        }
        .responsetable tr {
          border: 1px solid #D9E4E6;
          text-align: center;
        }
        .responsetable tr:nth-child(odd) {
          background-color: #EAF3F3;
          text-align: center;
        }
        .responsetable th {
          display: none;
          border: 1px solid #FFF;
          background-color: #167F92;
          color: #FFF;
          padding: 1em;
          text-align: center;
        }
        .responsetable th:first-child {
          display: table-cell;
          text-align: center;
        }
        .responstable th:nth-child(2) {
          display: table-cell;
        }
        .responstable th:nth-child(2) span {
          display: none;
        }
        .responstable th:nth-child(2):after {
          content: attr(data-th);
        }
        @media (min-width: 480px) {
          .responstable th:nth-child(2) span {
            display: block;
          }
          .responstable th:nth-child(2):after {
            display: none;
          }
        }
        .responstable td {
          display: block;
          word-wrap: break-word;
          max-width: 7em;
          text-align: center;
        }
        .responstable td:first-child {
          display: table-cell;
          text-align: center;
          border-right: 1px solid #D9E4E6;
        }
        @media (min-width: 480px) {
          .responstable td {
            border: 1px solid #D9E4E6;
          }
        }
        .responstable th, .responstable td {
          text-align: center;
          margin: .5em 1em;
        }
        @media (min-width: 480px) {
          .responstable th, .responstable td {
            display: table-cell;
            padding: 1em;
          }
        }

        body {
          padding: 0 2em;
          font-family: Arial, sans-serif;
          color: #024457;
          background: #f2f2f2;
        }

        h1 {
          font-family: Verdana;
          font-weight: normal;
          color: #024457;
          text-align: center;
        }

        /* For ALert boxes */

        .alert-box {
            color:#555;
            border-radius:10px;
            font-family:Tahoma,Geneva,Arial,sans-serif;font-size:11px;
            padding:10px 10px 10px 36px;
            margin:10px;
        }

        .alert-box span {
            font-weight:bold;
            text-transform:uppercase;
        }

        .error {
            background:#ffecec url('error.png') no-repeat 10px 50%;
            border:1px solid #f5aca6;
        }


        .success {
            background:#e9ffd9 url('success.png') no-repeat 10px 50%;
            border:1px solid #a6ca8a;
        }

        .warning {
            background:#fff8c4 url('warning.png') no-repeat 10px 50%;
            border:1px solid #f2c779;
        }
        .notice {
            background:#e3f7fc url('notice.png') no-repeat 10px 50%;
            border:1px solid #8ed9f6;
        }
        </style>

    </head>

    <header>
        <h1>JavaScript Object Notation Parsing Assignment</h1>
    </header>

    <body>
      <div class="responstable">
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
      </div>
    </body>
</html>
