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
  <link rel="stylesheet" href="./search.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&display=swap" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
  <div class="search">
    <main class="rectangle-parent">
      <div class="frame-child"></div>
      <div class="wrapper4">
        <h2 class="h2">Введите параметры для поиска:</h2>
      </div>
      <section class="frame-section">
        <b class="b">Сведения о владельце сертификата</b>
        <div class="frame-parent3">
          <div class="frame-parent4">

            <div class="rectangle-group">
              <input class="input" placeholder="ФИО" type="text" />
            </div>

            <div class="rectangle-container">
              <div class="frame-inner"></div>
              <input class="input1" placeholder="Дата выдачи" type="text" onfocus="(this.type='date')" />
            </div>
          
          </div>
          <div class="frame-parent5">
            <div class="frame-parent6">
              <div class="group-div">
                <div class="frame-child1"></div>
                <input class="input2" placeholder="Дата рождения" onfocus="(this.type='date')" />
              </div>
              <div class="rectangle-parent1">
                <div class="frame-child2"></div>
                <input class="input3" placeholder="Наименование документа" type="text" />
              </div>
            </div>
            <div class="rectangle-parent2">
              <div class="frame-child3"></div>
              <input class="input4" placeholder="Кем выдан" type="text" />
            </div>
          </div>
          <div class="rectangle-parent3">
            <div class="frame-child4"></div>
            <input class="input4" placeholder="Номер документа" type="text" />
          </div>
        </div>
      </section>
      <section class="parent4">
        <b class="b1">Сведения об обучающемся</b>

        
        <div class="frame-parent7">
          <div class="frame-parent8">

            <div class="rectangle-parent4">
              <div class="frame-child5"></div>
              
              <form class="form" method="POST" action="search.php">
                  <input class="input5" placeholder="ФИО" type="text" name="search_input" />
                <div class="search-wrapper-search-button">
                  
                  <button type="submit" class="search-search-button-icon" src="./public/search-button.svg" >Далее</button>
                </div>
              </form>
            </div>
            
            <div class="rectangle-parent5">
              <div class="frame-child6"></div>
              <input class="input6" placeholder="Дата рождения" onfocus="(this.type='date')" />
            </div>
            <div class="rectangle-parent6">
              <div class="frame-child7"></div>
              <input class="input7" placeholder="Номер студ. билета" type="text" />
            </div>
            <div class="rectangle-parent7">
              <div class="frame-child8"></div>
              <input class="input8" placeholder="Направление" type="text" />
            </div>
          </div>
          <div class="rectangle-parent8">
            <div class="frame-child9"></div>
            <input class="input9" placeholder="Факультет" type="text" />
          </div>
        </div>
      </section>
      <section class="parent5">
        <b class="b2">Сведения о договоре</b>
        <div class="frame-parent9">
          <div class="frame-parent3">
            <div class="frame-parent4">
              <div class="rectangle-parent1">
                <div class="frame-child2"></div>
                <input class="input3" placeholder="Наименование организации" type="text" maxlength="256"/>
              </div>
              <div class="rectangle-container">
                <div class="frame-inner"></div>
                <input class="input1" placeholder="Дата заключения договора" type="text" onfocus="(this.type='date')" />
              </div>
              <div class="rectangle-parent1">
                <div class="frame-child2"></div>
                <input class="input3" placeholder="Номер договора" type="text" maxlength="256"/>
              </div>
            </div>
          </div>
        </div>
        <form method="post">
          <button class="logout" name="logout" type="submit">Выйти</button>
        </form>
      </div>
    </section>
  </main>
  </div>
</body>
</html>
