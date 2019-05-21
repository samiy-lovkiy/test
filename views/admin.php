<?
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?if (!isset($_SESSION['login']) && !isset($_SESSION['password'])):?>
<div class="wrapper">
    <form action="/admin" method="post">
        <input type="text" name="login">
        <input type="password" name="password">
        <input type="submit">
    </form>
</div>
<?endif;?>


<? if (isset($_SESSION['login'])):?>
    <div class="wrapper">
        <div class="main-content">
            <div class="container">
                <div class="content__block">
                    <ul class="tasks__list">
                        <?foreach ($tasks as $task){?>
                            <li class="tasks__list__item">
                                <div class="tasks__block">
                                    <div class="tasks__user"><a href="/?user_name=<?=$task['user_name']?>"><?=$task['user_name']?></a></div>
                                    <div class="tasks__email"><a href="/?email=<?=$task['email']?>"><?=$task['email']?></a></div>
                                    <div class="tasks__text"><?=$task['task']?></div>
                                        <input type="text" class="input__task"><a href="admin" class="update__task" data-id="<?=$task['id']?>">Изменть задачу</a>
                                </div>
                                <div class="tasks__achievement">
                                    <a href="/?status=<?=$task['status']?>"><span style="width: 20px; height: 20px; <?if ($task['status']==0):?> background: red;<?elseif ($task['1']):?>
                                background: green;<?endif;?> display: block;"></span></a>
                                    <a href="admin" class="update__status" data-status="<?=$task['status']?>" data-id="<?=$task['id']?>">Изменть статус</a>
                                </div>

                            </li>
                        <?}?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?endif;?>
</body>
</html>

<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/main.js"></script>
