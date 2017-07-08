<div class="logo">
    <span class="glyphicon glyphicon-eye-open visio" aria-hidden="true"></span> <span
            class="logo-text">База витратних матеріалів <br>
            <span class="pat">"ПАТ Коростенський кар'єр"</span></span>
    <a href="index.php">
        <div class="logo-img"><img src="img/logo.png" alt="Коростень_лого"></div>
    </a>
</div>
<nav>
    <ul class="slider-toggle">
        <li><a>Меню</a></li>
    </ul>
    <ul class="slide-element">
        <li><a type="button" data-toggle="modal" data-target="#myModal">Деталі</a></li>
        <li><a type="button" data-toggle="modal" data-target="#myModal2">ПММ</a></li>
        <li><a type="button" data-toggle="modal" data-target="#myModal4">Баланс</a></li>
    </ul>
</nav>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog login">

        <div class="modal-content">
            <form action="main.php" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ви заходите в розділ "Деталі"</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span
                                                class="glyphicon glyphicon-log-in"></span></span>
                                <input name="detailsLogin" type="text" class="form-control" placeholder="Логін"
                                       aria-describedby="basic-addon1"></div>
                        </div>
                        <br>
                        <br>
                        <div class="col-md-12">
                            <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon2"><span
                                                class="glyphicon glyphicon-alert"></span></span>
                                <input name="detailsPassword" type="password" class="form-control" placeholder="Пароль"
                                       aria-describedby="basic-addon1"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                    <button type="submit" class="btn btn-primary">Увійти</button>
                </div>
            </form>
        </div>

    </div>
</div>
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog login">

        <div class="modal-content">
            <form action="main.php" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ви заходите в розділ "ПММ"</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span
                                                class="glyphicon glyphicon-log-in"></span></span>
                                <input name="pmmLogin" type="text" class="form-control" placeholder="Логін"
                                       aria-describedby="basic-addon1"></div>
                        </div>
                        <br>
                        <br>
                        <div class="col-md-12">
                            <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon2"><span
                                                class="glyphicon glyphicon-alert"></span></span>
                                <input name="pmmPassword" type="password" class="form-control" placeholder="Пароль"
                                       aria-describedby="basic-addon1"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                    <button type="submit" class="btn btn-primary">Увійти</button>
                </div>
            </form>
        </div>

    </div>
</div>
<div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog login">

        <div class="modal-content">
            <form action="main.php" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ви заходите в розділ "Баланс"</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span
                                                class="glyphicon glyphicon-log-in"></span></span>
                                <input name="balanceLogin" type="text" class="form-control" placeholder="Логін"
                                       aria-describedby="basic-addon1"></div>
                        </div>
                        <br>
                        <br>
                        <div class="col-md-12">
                            <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon2"><span
                                                class="glyphicon glyphicon-alert"></span></span>
                                <input name="balancePassword" type="password" class="form-control" placeholder="Пароль"
                                       aria-describedby="basic-addon1"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                    <button type="submit" class="btn btn-primary">Увійти</button>
                </div>
            </form>
        </div>

    </div>
</div>