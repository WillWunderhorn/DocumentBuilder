<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: registration_form/html/login.php");
    exit();
}

function logout() {
    session_destroy();

    header("Location: registration_form/html/login.php");
    exit();
}

if (isset($_POST['logout'])) {
    logout();
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./global.css" />
  <link rel="stylesheet" href="./index.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&display=swap" />
</head>

<body>
  <div class="main">
    <header class="main-layout">
    </header>
    <table class="content-table">
      <thead>
        <tr>
          <th>ФИО</th>
          <th>Дата рождения</th>
          <th>Уровень образования</th>
          <th>Код программы</th>
          <th>Направление</th>
          <th>Студенческий номер</th>
          <th>Серия сертификата</th>
          <th>Номер сертификата</th>
          <th class="actions">Действия</th>
        </tr>
      </thead>
      <tbody id="resultsBody">
      <?php


$api_url = "***********";
$username = '****';
$password = '*******';

$search_query = isset($_POST['search_input']) ? urlencode($_POST['search_input']) : '';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $api_url . '?search=' . $search_query);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, $username . ':' . $password);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json',
));

$result = curl_exec($ch);

$data = json_decode($result, true);

$search_query = isset($_POST['search_input']) ? $_POST['search_input'] : '';

session_start();

if ($data) {
  $filtered_data = array_filter($data['results'], function($item) use ($search_query) {
    return $item['fio'] === $search_query;
  });
    if (!empty($filtered_data)) {
        foreach ($filtered_data as $item) {
            $_SESSION['birth_date'] = $item['birth_date'];
            $_SESSION['snils'] = $item['snils'];
            $_SESSION['IDENTITYDOC'] = $item['IDENTITYDOC'];
            $_SESSION['Payer_passport'] = $item['Payer_passport'];
            $_SESSION['Payer_name'] = $item['Payer_name'];
            $_SESSION['Payer_birth_date'] = $item['Payer_birth_date'];
            $_SESSION['Payer_snils'] = $item['Payer_snils'];
            $_SESSION['contract_id'] = $item['contract_id'];
            $_SESSION['sign_date'] = $item['sign_date'];
            $_SESSION['dir_prog'] = $item['dir_prog'];
            $_SESSION['code_dir_prog'] = $item['code_dir_prog'];
            $_SESSION['UNS'] = $item['UNS'];
            $_SESSION['YEAR'] = $item['YEAR'];
            $_SESSION['MONTHS'] = $item['MONTHS'];
            $_SESSION['num_period'] = $item['num_period'];
            $_SESSION['period_cost'] = $item['period_cost'];
            $_SESSION['total_cost'] = $item['total_cost'];
            $_SESSION['fio'] = $item['fio'];
            $_SESSION['passport_id'] = $item['passport_id'];
            $_SESSION['PASSP_SER'] = $item['PASSP_SER'];
            $_SESSION['PASSP_NMB'] = $item['PASSP_NMB'];
            $_SESSION['PASSP_GIVENBY'] = $item['PASSP_GIVENBY'];
            $_SESSION['PASSP_GIVENBY'] = $item['PASSP_GIVENBY'];
            $_SESSION['PASSP_GIVENDATE'] = $item['PASSP_GIVENDATE'];
            $_SESSION['PASSP_GIVENPODR'] = $item['PASSP_GIVENPODR'];
            echo "<tr>";
            echo "<td>".$item['fio']."</td>";
            echo "<td>".$item['birth_date']."</td>";
            echo "<td>".$item['EDULEVEL']."</td>";
            echo "<td>".$item['code_dir_prog']."</td>";
            echo "<td>".$item['dir_prog']."</td>";
            echo "<td>".$item['UNS']."</td>";
            echo "<td>".$item['cert_serial']."</td>";
            echo "<td>".$item['cert_num']."</td>";
            echo '<td>';
            echo  '<button type="button" class="button" />';
            echo  '<form method="POST" class="form2" action="download-data.php"/>';
            echo    '<span class="button__text">Смотреть</span>';
            echo     '<span class="button__icon"/>';
            echo       '<ion-icon name="eye"></ion-icon/>';
            echo     '</span>';
            echo   '</form>';
            echo  '</button>';
            echo '</td>';
        }
    } else {
        echo "<tr><td colspan='7'>Пока никаких результатов нет</td></tr>";
        
    }
}
?>
    </tbody>
    </table>
    <script type="module" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"></script>

    <div class="wrapper-search-button">
      <button type="button" class="search-button-icon" src="./public/search-button.svg" >Назад</button>
    </div>
  </div>

  <script>

    var downloadButtons = document.querySelectorAll(".button__text");
    downloadButtons.forEach(function (button) {
      button.addEventListener("click", function (e) {
        window.location.href = "./download-data.php";
      });
    });

    var searchButton = document.querySelectorAll(".search-button-icon");
    searchButton.forEach(function (button) {
      button.addEventListener("click", function (e) {
        window.location.href = "./index.php";
      });
    });
  </script>
</body>
</html>