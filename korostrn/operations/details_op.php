<div class="operation">
    <h3 style="font-family: 'Jura', sans-serif">Виконати операцію:</h3>
    <form action="../main.php" method="post"
          style="color: black;font-family: 'Jura', sans-serif;width: 75%;margin: 0 auto">
        <select class="form-control" name="detailId" required>
            <option value="0" disabled="disabled">Вибирайте з списку:</option>
            <?php
            $db = new DB();
            $detailsBalance = $db->find("SELECT * FROM `DetailsBalance` ORDER BY `detail_id`")->fetch_all();
            foreach ($detailsBalance as $detBalal) {
                echo '<option value="' . $detBalal[0] . '" name="' . $detBalal[1] . '">' . $detBalal[1] . '</option>';
            }
            ?>
        </select><br>
        <input class="form-control oper" type="number" name="DetailsCount" placeholder="Кількість" required>
        <input class="form-control oper" type="text" name="taker" placeholder="Хто бере" required>
        <input class="form-control oper" type="text" name="giver" placeholder="Хто видає" required>
        <br>
        <ul>
            <li><a type="button" data-toggle="modal" data-target="#DetailsPlus">Видача</a></li>
            <br><br>
            <li><a type="button" data-toggle="modal" data-target="#DetailsMinus">Отримання</a></li>
        </ul>
        <div class="modal fade" id="DetailsPlus" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Підтвердіть операцію</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                        <button name="Give" type="submit" class="btn btn-primary" value="Видача">Видача</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="DetailsMinus" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Підтвердіть операцію</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                        <button name="Take" type="submit" class="btn btn-primary" value="Отримання">Отримання</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>