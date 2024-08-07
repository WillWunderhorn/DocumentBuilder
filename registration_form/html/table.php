<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../../index.php");
    exit();
}

function logout() {
    session_destroy();

    header("Location: ../../index.php");
    exit();
}

if (isset($_POST['logout'])) {
    logout();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>ОСФР</title>
    <link rel="stylesheet" type="text/css" href="css/util.css">
	  <link rel="stylesheet" type="text/css" href="css/main.css">
  </head>
  <body>
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
      <form method="post" id="2">
        <div class="container-login100-form-btn m-t-32">
        <button class="login100-form-btn2" name="logout" type="submit">Выйти</button>
      </form>
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <form method="POST">
              <div class="input-group mb-3">
                <input type="text" id="searchInput" name="search_input" class="form-control" placeholder="Пойск по ФИО" aria-label="Search" aria-describedby="button-search">
                <div class="input-group-append">
                  <button class="btn btn-outline-primary" type="submit" id="button-search" name="search_button">Искать</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
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
                  if (isset($_POST['search_button'])) {
                      $search_query = urlencode($_POST['search_input']);
                      
                      $api_url = "*******";
                        $username = '*******';
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
                      

                      if ($data) {
                      
                          foreach ($data['results']  as $item) {
                              
                              echo "<tr>";
                              echo "<td>".$item['fio']."</td>";
                              echo "<td>".$item['birth_date']."</td>";
                              echo "<td>".$item['code_dir_prog']."</td>";
                              echo "<td>".$item['dir_prog']."</td>";
                              echo "<td>".$item['cert_serial']."</td>";
                              echo "<td>".$item['cert_num']."</td>";
                              echo "<td>";
                              echo    "<a href=".$item['nrec']."/>";
                              echo    '<img class="download-icon" src="" />';
                              echo    "</a>";
                              echo "</td>";
                              echo "</tr>";
                          }
                      } 
                      else {
                        echo "<tr><td colspan='7'>Никаких результатов найдено не было</td></tr>";
                      }
                  }
                  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>