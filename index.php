<?php include "functions.php" ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

    <title>Котятки</title>
</head>
<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-2">
                <label for="addCat" class="form-label">Добавление котямбы</label>
                <button class="btn btn-success mt-2" id="addCat" data-bs-toggle="modal" data-bs-target="#create"><i class="fa fa-plus"></i></button>
            </div>
            <div class="col-8">
                <form action="" method="post">
                    <label for="customRange2" class="form-label">Фильтр по возрасту</label>

                    <div class="input-group mb-3 id" id="customRange2">
                        <input type="number" class="form-control" placeholder="min_age" aria-label="min_age">
                        <span class="input-group-text"> - </span>
                        <input type="number" class="form-control" placeholder="max_age" aria-label="max_age">
                        <button type="submit" class="btn btn-success form-control" name="filter">Фильтровать</button>
                    </div>
                    <!-- <input type="range" class="form-range my-2" min="0" max="5" id="customRange2"> -->
                    <!-- <button type="submit" class="btn btn-success float-end pull-right" name="filter">Фильтровать</button> -->
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-hover mt-4">
                    <thead class="table-dark">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($query as $item) { ?>
                        <tr>
                            <td><?php echo $item["id"]; ?></td>
                            <td><?php echo $item["name"]; ?></td>
                            <td><?php echo $item["age"]; ?></td>
                            <td><a href="?id=<?php echo $item["id"]; ?>" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<?php echo $item["id"]; ?>"><i class="fa fa-edit"></i></a>
                                <a href="?id=<?php echo $item["id"]; ?>" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $item["id"]; ?>"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <!-- Модальное окно редактировать -->
                        <div class="modal fade" id="edit<?php echo $item["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Изменить котямбу</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="?id=<?php echo $item["id"]; ?>" method="post">
                                            <div class="form-group">
                                                <small>Имя</small>
                                                <input type="text" class="form-control" name="name" value="<?php echo $item["name"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <small>Возраст</small>
                                                <input type="number" class="form-control" name="age" value="<?php echo $item["age"]; ?>">
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                <button type="submit" class="btn btn-primary" name="edit">Сохранить</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Модальное окно удалить -->
                        <div class="modal fade" id="delete<?php echo $item["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Удалить котямбу <?php echo $item["name"]; ?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="?id=<?php echo $item["id"]; ?>" method="post">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                            <button type="submit" class="btn btn-danger" name="delete">Удалить</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Модальное окно создать -->
    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Добавить котямбу</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <small>Имя</small>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <small>Возраст</small>
                            <input type="number" class="form-control" name="age">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary" name="add">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap-5.3.3-dist/js/popper.min.js"></script>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</body>
</html>