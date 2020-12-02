<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable</title>

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/datatables/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/datatables/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" href="assets/fontawesome/all.min.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?

if (!isset($_SESSION['id'])){
?>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-2 pt-2 ">
                <div class="card p-2">
                    <div class="card-header mb-2">
                        <h1 class="text-center">Вход</h1>
                    </div>
                    <form action="inc/user/login.php" method="post">
                        <div class="form-group">
                            <input class="form-control" name="login" aria-describedby="emailHelp" placeholder="Логин" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Пароль" required>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Войти</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?
}else {

?>

    <!-- Кнопка добавления новой строки -->
    <div class="container-fluid fixed">
        <div class="row">
            <div class="col-lg-12">
                <button id="addBtn" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalCrud"><i class="fas fa-plus fa-2x"></i></button>
                <div class="float-right">
                    <span class="">Вы вошли как:</span>
                    <span class="font-weight-bold"><?php echo $_SESSION['login'] ?></span>
                </div>
            </div>
        </div>
    </div>
    <br>

    <!-- Структура таблицы -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-hover table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th class="hide"></th>
                                <th>№</th>
                                <th>Значение 1</th>
                                <th>Значение 2</th>
                                <th>Значение 3</th>
                                <th>Значение 4</th>
                                <th>Значение 5</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Модальное окно -->
    <div class="modal fade" id="modalCrud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addForms">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Значение 1</label>
                                    <input type="text" class="form-control" id="value1" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Значение 2</label>
                                    <input type="text" class="form-control" id="value2" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Значение 3</label>
                                    <input type="text" class="form-control" id="value3" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Значение 4</label>
                                    <input type="text" class="form-control" id="value4" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Значение 5</label>
                                    <input type="text" class="form-control" id="value5" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Отмена</button>
                        <button type="submit" id="btnGuardar" class="btn btn-dark">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/jquery/jquery-3.5.1.min.js"></script>
    <script src="assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/datatables/js/dataTables.buttons.min.js"></script>
    <script src="assets/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/datatables/js/dataTables.fixedHeader.min.js"></script>
    <script src="assets/datatables/js/jszip.min.js"></script>
    <script src="assets/datatables/js/buttons.html5.min.js"></script>
    <script src="assets/mousetrap/mousetrap.min.js"></script>
    <script src="script.js"></script>

</body>

</html>

<?
}