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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/exceljs/4.3.0/exceljs.min.js"></script>
    

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./download-data.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&display=swap"
    />
  </head>
  <body>
    <div class="download-data">
      <img
        class="close-button-icon2"
        alt=""
        src="./public/close-button.svg"
        id="closeButtonIcon"
      />
      <div class="pop">
              <div class="frame-wrapper3">
                <div class="rectangle-parent12">
                  <div class="frame-child14"></div>
                  <div class="wrapper-close-button">
                    <!-- <img
                      class="close-button-icon3"
                      loading="lazy"
                      alt=""
                      src="./public/close-button.svg"
                      id="closeButtonIcon1"
                    /> -->
                  </div>
                  <div class="frame-wrapper4">
                    <div class="parent8">
                      <b class="b9">Файл успешно сформирован!</b>
                      <div class="image-1-wrapper">
                        <img
                          class="image-1-icon"
                          loading="lazy"
                          alt=""
                          src="./public/image-1@2x.png"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="back">
                    <button id="back-button-icon" class="back-button-icon">Вернуться в глваное меню</button>
                  </div>
                </div>
              </div>
            </div>
      <main class="frame-main">
        <div class="div33">Проверьте введенные данные:</div>
        <section class="frame-parent11">
          <div class="wrapper5">
            <b class="b10">Сведения о владельце сертификата</b>
          </div>
          <div class="parent9">
            <div class="div36">
            <?php
            session_start();
            $name = isset($_SESSION['fio']) ? $_SESSION['fio'] : '';
            $dob = isset($_SESSION['birth_date']) ? $_SESSION['birth_date'] : '';
            $snils = isset($_SESSION['snils']) ? $_SESSION['snils'] : '';
            $identitydoc = isset($_SESSION['IDENTITYDOC']) ? $_SESSION['IDENTITYDOC'] : '';
            $payer_name = isset($_SESSION['Payer_name']) ? $_SESSION['Payer_name'] : '';
            $payer_birth_date = isset($_SESSION['Payer_birth_date']) ? $_SESSION['Payer_birth_date'] : '';
            $payer_snils = isset($_SESSION['Payer_snils']) ? $_SESSION['Payer_snils'] : '';
            $contract_id = isset($_SESSION['contract_id']) ? $_SESSION['contract_id'] : '';
            $sign_date = isset($_SESSION['sign_date']) ? $_SESSION['sign_date'] : '';
            $code_dir_prog = isset($_SESSION['code_dir_prog']) ? $_SESSION['code_dir_prog'] : '';
            $dir_prog = isset($_SESSION['dir_prog']) ? $_SESSION['dir_prog'] : '';
            $year = isset($_SESSION['YEAR']) ? $_SESSION['YEAR'] : '';
            $months = isset($_SESSION['MONTHS']) ? $_SESSION['MONTHS'] : '';
            $num_period = isset($_SESSION['num_period']) ? $_SESSION['num_period'] : '';
            $period_cost = isset($_SESSION['period_cost']) ? $_SESSION['period_cost'] : '';
            $total_cost = isset($_SESSION['total_cost']) ? $_SESSION['total_cost'] : '';
            $payer_passport = isset($_SESSION['Payer_passport']) ? $_SESSION['Payer_passport'] : '';
            $passp_ser = isset($_SESSION['PASSP_SER']) ? $_SESSION['PASSP_SER'] : '';
            $passp_nmb = isset($_SESSION['PASSP_NMB']) ? $_SESSION['PASSP_NMB'] : '';
            $passp_givenby = isset($_SESSION['PASSP_GIVENBY']) ? $_SESSION['PASSP_GIVENBY'] : '';
            $passp_givendate = isset($_SESSION['PASSP_GIVENDATE']) ? $_SESSION['PASSP_GIVENDATE'] : '';
            $passp_givenpodr = isset($_SESSION['PASSP_GIVENPODR']) ? $_SESSION['PASSP_GIVENPODR'] : '';
            
            ?>
            <div class="union">
              <p>ФИО:&nbsp</p>
              <p class="p1"><?php echo ($payer_name == 'None') ? 'нет данных' : $payer_name; ?></p>
            </div>
              
              <div class="union">
                <p>Дата рождения:&nbsp</p>
                <p class="p2"><?php echo ($payer_birth_date == 'None') ? 'нет данных' : $payer_birth_date; ?></p>
              </div>

              <div class="union">
                <p>СНИЛС:&nbsp</p>
                <p class="p2-1"><?php echo ($snils == 'None') ? 'нет данных' : $snils; ?></p>
              </div>

              <div class="union">
                <p>Удостовение личности:&nbsp</p>
                <p class="p2-3"><?php echo ($payer_passport == 'None') ? 'нет данных' : $payer_passport; ?></p>
              </div>
              
            </div>
            <div class="wrapper5">
              <b class="b10">Сведения об обучающемся</b>
            </div>
            <div class="div36">
              <div class="union">
                <p>ФИО:&nbsp</p>
                <p class="p3"><?php echo ($name == 'None') ? 'нет данных' : $name; ?></p>
              </div>
              <div class="union">
                <p>Дата рождения:&nbsp</p>
                <p class="p4"><?php echo ($dob == 'None') ? 'нет данных' : $dob; ?></p>
              </div>
              <div class="union">
                <p>Удостовение личности:&nbsp</p>

                <p class="p5">
                  <?php echo ($identitydoc == 'None') ? 'нет данных' : $identitydoc; ?> серия: <?php echo ($passp_ser == 'None') ? 'нет данных' : $passp_ser; ?>, № <?php echo ($passp_nmb == 'None') ? 'нет данных' : $passp_nmb; ?>, выдан: <?php echo ($passp_givendate == 'None') ? 'нет данных' : $passp_givendate; ?> года, <?php echo ($passp_givenby == 'None') ? 'нет данных' : $passp_givenby; ?> № подр. <?php echo ($passp_givenpodr == 'None' || $passp_givenpodr == ' ') ? 'нет данных' : $passp_givenpodr; ?></p>                   
              </div>
              <div class="union">
                <p>СНИЛС:&nbsp</p>
                <p class="p6"><?php echo ($payer_snils == 'None') ? 'нет данных' : $payer_snils; ?></p>
              </div>
            </div>
            <div class="wrapper5">
              <b class="b10">Сведения об Организации, оказывающей платные образовательные услуги</b>
            </div>

            <div class="div36">
              <p class="p7">Наименование Организации: "федеральное государственное образовательное бюджетное учреждение высшего образования «Финансовый университет при Правительстве Российской Федерации"</p>
              
              <div class="union">
                <p>Номер лицензии:&nbsp</p>
                <p class="p8"> </p>
              </div>
              
              <div class="union">
                <p>Дата лицензии:&nbsp</p>
                <p class="p9"> </p>
              </div>

              <div class="union">
                <p>Срок действия лицензии:&nbsp</p>
                <p class="p10-1"> </p>
              </div>

              <div class="union">
                <p>Номер договора:&nbsp</p>
                <p class="p11"><?php echo ($contract_id == 'None') ? 'нет данных' : $contract_id; ?></p>
              </div>

              <div class="union">
                <p>Дата договора:&nbsp</p>
                <p class="p12"><?php echo ($sign_date == 'None') ? 'нет данных' : $sign_date; ?></p>

              </div>

              <div class="union">
                <p>Предмет договора:&nbsp</p>
                <p class="p13"><?php echo ($code_dir_prog == 'None') ? 'нет данных' : $code_dir_prog; ?>&nbsp<?php echo ($dir_prog == 'None') ? 'нет данных' : $dir_prog; ?></p>

              </div>

              <div class="union">
                <p>Срок освоения:&nbsp</p>
                <p class="p14"><?php echo ($year == 'None') ? 'нет данных' : $year; ?> Года <?php echo ($months == 'None') ? 'нет данных' : $months; ?> Месяцев</p>

              </div>
            </div>

            <div class="wrapper5">
              <b class="b10">Порядок оплаты договора</b>
            </div>

            <div class="div36"> 
              <div class="union">
                <p>Количество периодов оплаты:&nbsp</p>
                <p class="p15"><?php echo ($num_period == 'None') ? 'нет данных' : $num_period; ?></p>
              </div>

              <div class="union">
                <p>Сумма платежа за семестр:&nbsp</p>
                <p class="p16"><?php echo ($period_cost == 'None') ? 'нет данных' : $period_cost; ?></p>
              </div>

              <div class="union">
                <p>Сумма платежа за учебный год:&nbsp</p>
                <p class="p17"><?php echo ($total_cost == 'None') ? 'нет данных' : $total_cost; ?>
              </div>
            </div>

            <div class="wrapper5">
              <b class="b10">Реквизиты для перечисления</b>
            </div>

            <div class="div36">
              <p class="p18">Наименование организации: Финансовый университет</p>
              <p class="p19">ИНН Организации:  </p>
              <p class="p20">КПП Организации:  </p>
              <p class="p22">Расчетный счет Организации:  </p>
              <p class="p22">КБК Организации:  </p>
              <p class="p23">ОКТМО Организации:  </p>
              <p class="p24">Номер лицевого счета Организации:  </p>
              <p class="p25">Наименование банка:  </p>
              <p class="p26">БИК банка:  </p>
              <p class="p27">Корреспондентский счет банка:  </p>
            </div>
            <footer class="download-button-container">
              <button id="download-button-icon" class="download-button-icon">Скачать</button>
            </footer>
          </div>
        </section>
      </main>
      <script>
        const workbook = new ExcelJS.Workbook();
        const worksheet = workbook.addWorksheet('Sheet1');
        
        function getTextByClass(className) {
    const element = document.querySelector('.' + className);
    if (element !== null) {
      return element.textContent.trim();
    } else {
      return 'Element with class ' + className + ' not found';
    }
  }
  var fio = getTextByClass('p1')
  var dob = getTextByClass('p2')
  var pasport = getTextByClass('p2-3')
  var studentFio = getTextByClass('p3')
  var studentDob = getTextByClass('p4')
  var studentSnils = getTextByClass('p6')
  var docSubject = getTextByClass('p13')
  var period = getTextByClass('p14')
  var parts = getTextByClass('p15')
  var sumOfSemester = getTextByClass('p16')
  var totalSum = getTextByClass('p17')
  var ownerSnils = getTextByClass('p2-1')
  var studentPasport = getTextByClass('p5')
  var isLicense = getTextByClass('p10-1')
  var dealNumber = getTextByClass('p11')
  var dealDate = getTextByClass('p12')
  var licenceNum = getTextByClass('p8')
  var licenceDate = getTextByClass('p9')
  
  const data = [
    ["Ответ на запрос о сведениях договора об оказании платных образовательных услуг"],
        
    ["Организация", "федеральное государственное образовательное бюджетное учреждение высшего образования «Финансовый университет при Правительстве Российской Федерации»"],

    ["1. Сведения о владельце сертификата"],
    ["1.1 Фамилия, имя, отчество (при наличии)", fio],
    ["1.2 Дата рождения", dob],
    ["1.3 Сведения документа,удостоверяющего личность(наименование, номер, дата, кем и когда выдан)", pasport],
    ["1.4 СНИЛС", ownerSnils],

    ["2. Сведения об обучающемся"],

    ["2.1 Фамилия, имя, отчество (при наличии)", studentFio],
    ["2.2 Дата рождения", studentDob],
    ["2.3 Сведения документа,удостоверяющего личность(наименование, номер, дата, кем и когда выдан)", studentPasport],
    ["2.4 СНИЛС", studentSnils],

    ["3. Сведения об Организации, оказывающей платные образовательные услуги"],

    ["3.1 Наименование Организации", "федеральное государственное образовательное бюджетное учреждение высшего образования «Финансовый университет при Правительстве Российской Федерации»"],
    ["3.2 Номер лицензии", licenceNum],
    ["3.3 Дата лицензии", licenceDate],
    ["3.4 Срок действия лицензии", isLicense],
    ["3.5 Номер договора", dealNumber],
    ["3.6 Дата договора", dealDate],
    ["3.7 Предмет договора (наименование образовательной программы, код)", docSubject],
    ["3.8 Срок освоения оразовательной программы (продолжительность обучения) на момент подписания договора об оказании платных образовательных услуг ( с- по или количество)", period],

    ["4. Порядок оплаты договора"],

    ["4.1 Количество периодов оплаты в соответствии с графиком (по семестрам)", parts],
    ["4.2 Сумма платежа (руб., коп.) за семестр", sumOfSemester],
    ["4.3 За 2022 - 2026 учебный год:", totalSum],

    ["5. Реквизиты для перечисления"],

    ["5.1 Наименование организации", "Финансовый университет"],
    ["5.2 ИНН Организации", " "],
    ["5.3 КПП Организации", " "],
    ["5.4 Расчетный счет Организации", " "],
    ["5.5 КБК Организации", " "],
    ["5.6 ОКТМО Организации", " "],
    ["5.7 Номер лицевого счета Организации", " "],
    ["5.8 Наименование банка", " "],
    ["5.9 БИК банка", " "],
    ["5.10 Корреспондентский счет банка", " "]
  ];

  data.forEach((row, rowIndex) => {
    const excelRow = worksheet.getRow(rowIndex + 1);
    row.forEach((cell, cellIndex) => {
      const excelCell = excelRow.getCell(cellIndex + 1);
      excelCell.value = cell;

    });
  });

  //размер ячеек
  worksheet.getColumn('A').width = 50;
  worksheet.getColumn('B').width = 50;

  //мердж
  worksheet.mergeCells('A1:B1');
  worksheet.mergeCells('A3:B3');
  worksheet.mergeCells('A8:B8');
  worksheet.mergeCells('A13:B13');
  worksheet.mergeCells('A22:B22');
  worksheet.mergeCells('A26:B26');

  //выравнивание по центру
  const mergedCells = [
    'A1:B1', 
    'A3:B3', 
    'A8:B8', 
    'A13:B13', 
    'A22:B22', 
    'A26:B26'
  ];
  mergedCells.forEach(cell => {
    worksheet.getCell(cell).alignment = { vertical: 'middle', horizontal: 'center' };
  });

  var closeButtonIcon = document.getElementById("closeButtonIcon");
      if (closeButtonIcon) {
        closeButtonIcon.addEventListener("click", function (e) {
        });
      }

  function createBorder() {
    return {
      top: { style: 'thin' },
      left: { style: 'thin' },
      bottom: { style: 'thin' },
      right: { style: 'thin' }
    };
  }

  worksheet.eachRow({ includeEmpty: true }, function(row, rowNumber) {
    row.eachCell({ includeEmpty: true }, function(cell, colNumber) {
      if (colNumber === 1 || colNumber === 2) {
        cell.border = createBorder();
      }
    });
  });

  worksheet.eachRow({ includeEmpty: true }, function(row, rowNumber) {
    row.eachCell({ includeEmpty: true }, function(cell, colNumber) {
      if (!cell.isMerged) {
        cell.alignment = { wrapText: true };
        cell.alignment = cell.alignment || {};
        cell.alignment.vertical = 'middle';
        cell.border = createBorder();
      }
    });
  });

  function calculateRowHeight(row) {
  let maxHeight = 0;
  row.eachCell({ includeEmpty: true }, function(cell, colNumber) {
    let textLength = cell.value ? cell.value.toString().length : 0;
    if (textLength > 40 && !cell.isMerged) {
      maxHeight = 60;
      }
    });
  return maxHeight;
  }

  worksheet.eachRow({ includeEmpty: true }, function(row, rowNumber) {
    let calculatedHeight = calculateRowHeight(row);
    row.height = calculatedHeight > 0 ? calculatedHeight : row.height;
  });

  worksheet.eachRow({ includeEmpty: true }, function(row) {
    row.eachCell({ includeEmpty: true }, function(cell) {
      if (cell.isMerged) {
        cell.font = {
          bold: true
        };
      }
    });
  });

  document.getElementById('download-button-icon').addEventListener('click', function () {
    workbook.xlsx.writeBuffer().then(function(buffer) {
        const blob = new Blob([buffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = 'Документ.xlsx';
        link.click();
        showPopup();
    });
});

var backButton = document.querySelector(".back-button-icon");
backButton.addEventListener("click", function (e) {
    window.location.href = "./index.php";
});

const popElement = document.querySelector('.pop');
const scroll = document.querySelector('body');
const closeButtonIcon1 = document.getElementById('closeButtonIcon1');
const hideBack = document.querySelector('.frame-main');
scroll.style.overflow = 'scroll';
hideBack.style.display = 'block';

function showPopup() {
    popElement.style.display = 'block';
    scroll.style.overflow = 'hidden';
    hideBack.style.display = 'none';
}

  
</script>
</body>
</html>