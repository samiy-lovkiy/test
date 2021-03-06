<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/styles/main.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <div class="logIn">
            <div class="container">
                <div class="logIn__block">
                    <div class="logIn__button__block">
                        <button class="logIn__button"><a href="/admin" class="logIn__button__link">Авторизоваться</a></button>
                    </div>
                </div>
            </div>
        </div>
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
                            </div>
                            <div class="tasks__achievement"><a href="/?status=<?=$task['status']?>"><span style="width: 20px; height: 20px; <?if ($task['status']==0):?> background: red;<?elseif ($task['1']):?>
                                            background: green;<?endif;?> display: block;"></span></a></div>
                            <?}?>
                    </ul>
                    <form action="/" method="post">
                        <input type="text" name="user_name"><input type="email" name="email"><input type="text" name="task">
                        <input type="submit">
                    </form>
                    <div class="pages__num">
                        <ul class="pages__num__list">
                            <?for ($i=1;$i<=$countTaskPages;$i++){?>
                            <li class="pages__num__list__item"><a href="<?=$i?>"><?=$i?></a></li>
                            <?}?>
                        </ul>
                    </div>
                    <div class="sort__block">
                        <div class="sort__email"></div>
                    </div>
                    <div class="sorting">
                        <ul class="sotring__list">
                            <li class="sorting__list__item"><a href="/" class="sorting__link">Показать все</a></li>
                            <li class="sorting__list__item"><a href="/sort/emaildown/1" class="sorting__link">Сортировать по email(a-z)</a></li>
                            <li class="sorting__list__item"><a href="/sort/emailup/1" class="sorting__link">Сортировать по email (z-a)</a></li>
                            <li class="sorting__list__item"><a href="/sort/usernamedown/1" class="sorting__link">Сортировать по Имени пользователя(a-z)</a></li>
                            <li class="sorting__list__item"><a href="/sort/usernameup/1" class="sorting__link">Сортировать по Имени пользователя(z-a)</a></li>
                            <li class="sorting__list__item"><a href="/sort/status/0/1" class="sorting__link">Сортировать по Имени статусу(active)</a></li>
                            <li class="sorting__list__item"><a href="/sort/status/1/1" class="sorting__link">Сортировать по Имени статусу(inactive)</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>