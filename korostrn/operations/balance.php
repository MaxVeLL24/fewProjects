<div class="balance-menu">
    <ul>
        <span>Оберіть баланс потірбної категорії:</span>
        <br>
        <br>
        <li><a class="Detailstart">Деталі</a></li>
        <li><a class="ppmstart">ПММ</a></li>
    </ul>
</div>

<?php
date_default_timezone_set('Europe/Kiev');
$db = new DB();
$detailsBalance = $db->find("SELECT * FROM `DetailsBalance` ORDER BY `LastUpdateTime` DESC")->fetch_all();
if (!empty($detailsBalance)) {
    echo '<div class="DetailBalance">';
    echo '<table>';
    echo '<tr>
    <th>Назва деталі</th>
    <th>Залишок</th>
    <th>Остання дата зміни</th>
  </tr>';
    foreach ($detailsBalance as $detBalcnce) {
        echo "<tr>
    <td><a type='button' data-toggle='modal' data-target='#detailACC" . $detBalcnce[0] . "'>" . $detBalcnce[1] . "</a></td>
    <td>" . $detBalcnce[2] . "</td>
    <td>" . $detBalcnce[3] . "</td>
  </tr>";

    }
    echo '</table>';

    $detailsACC = $db->find("SELECT `detail_id` FROM `DetailsBalance` ORDER BY `LastUpdateTime` DESC")->fetch_all();
    foreach ($detailsACC as $key) {
        $detailACCounting = $db->find("SELECT * FROM `DetailsAccounting` WHERE `detail_id`='$key[0]' ORDER BY `operation_time` DESC")->fetch_all();
        if (!empty($detailACCounting)) {
            echo "<div class='modal fade' id='detailACC" . $key[0] . "' role='dialog'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                <h4 class='modal-title'>Проведені операції:</h4>
            </div>
            <div class='modal-body'>
                <table class='modal-table'>
                    <tr>
                        <th>Операція</th>
                        <th>Кількість</th>
                        <th>Отримувач</th>
                        <th>Видав</th>
                        <th>Дата</th>
                    </tr>";
            $kreditDetails = 0;
            $debitDetails = 0;
            foreach ($detailACCounting as $value) {
                if ($value[2] == 'Отримання') {
                    $debitDetails += $value[3];
                } elseif ($value[2] == 'Видача') {
                    $kreditDetails += $value[3];
                }
                echo "<tr>
                        <td> " . $value[2] . "</td>
                        <td> " . $value[3] . "</td>
                        <td> " . $value[4] . "</td>
                        <td> " . $value[5] . "</td>
                        <td> " . $value[6] . "</td>
                    </tr>";
            }
            $resultD = 0;
            $resultD = $debitDetails - $kreditDetails;
            echo "<tr>
                        <td>Сума</td>
                        <td>" . $resultD . "</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>";
            echo "</table>
            </div>
        </div>
    </div></div> ";
        }
    }
    echo '</div>';
}
$pmmBalance = $db->find("SELECT * FROM `pmmBalance` ORDER BY `LastUpdateTime` DESC")->fetch_all();

if (!empty($pmmBalance)) {
    echo '<div class="pmmBalance">';
    echo '<table>';
    echo '<tr>
    <th>Вид ПММ</th>
    <th>Залишок</th>
    <th>Остання дата зміни</th>
  </tr>';
    foreach ($pmmBalance as $pmmBal) {
        echo " <tr>
    <td><a type = 'button' data-toggle = 'modal' data-target = '#pmmAc" . $pmmBal[0] . "'> " . $pmmBal[1] . "</a></td>
    <td> " . $pmmBal[2] . "</td>
    <td> " . $pmmBal[3] . "</td>
  </tr> ";
    }
    echo '</table>';

    $pmmACC = $db->find("SELECT `pmm_id` FROM `pmmBalance` ORDER BY `LastUpdateTime` DESC")->fetch_all();
    foreach ($pmmACC as $key) {
        $pmmAccounting = $db->find("SELECT * FROM `pmmAccounting` WHERE `pmm_id` = '$key[0]' ORDER BY `operationTime` DESC")->fetch_all();
        if (!empty($pmmAccounting)) {
            echo " <div class='modal fade' id = 'pmmAc" . $key[0] . "' role = 'dialog'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type = 'button' class='close' data-dismiss = 'modal'>&times;</button>
                <h4 class='modal-title'> Проведені операції:</h4>
            </div>
            <div class='modal-body'>
                <table class='modal-table'>
                    <tr>
                        <th> Операція</th>
                        <th> Кількість</th>
                        <th> Отримувач</th>
                        <th> Видав</th>
                        <th> Дата</th>
                    </tr> ";
            $debit=0;
            $kredit=0;
            foreach ($pmmAccounting as $value) {
                if ($value[2] == 'Отримання') {
                    $debit += $value[3];
                } elseif ($value[2] == 'Видача') {
                    $kredit += $value[3];
                }
                echo "
                    <tr>
                        <td> " . $value[2] . "</td>
                        <td> " . $value[3] . "</td>
                        <td> " . $value[4] . "</td>
                        <td> " . $value[5] . "</td>
                        <td> " . $value[6] . "</td>
                    </tr>";
            }
            $result=0;
            $result = $debit - $kredit;
            echo "<tr>
                        <td>Сума</td>
                        <td>" . $result . "</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>";
            echo "
                    </table>
            </div>
        </div>
    </div></div> ";
        }
    }
    echo '</div>';

}
