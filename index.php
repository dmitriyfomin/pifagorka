<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Подписка на рассылку</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css" type="text/css"/>
        <style>
            body {
                max-width: 940px;
            }
        </style>
    </head>
    <body>
        <div class="pure-g-r">
            <div class="pure-u-1-2">
                <div class="l-box">
                    <h3>Чтобы быть в курсе последних событий в жизни Пифагорки, подпишитесь на нашу рассылку. Спамить не будем.</h3>
                </div>
            </div>
            <div class="pure-u-1-2">
                <?php
                require_once('goDB/autoload.php');
                \go\DB\autoloadRegister();
                $params = array(
                    'host' => 'localhost',
                    'username' => 'pifagorka',
                    'password' => 'pifagorka123456789',
                    'dbname' => 'db_pythagoras',
                    'charset' => 'utf8',
                    '_debug' => false,
                    '_prefix' => '',
                );

                $db = go\DB\DB::create($params, 'mysql');
                $name = htmlspecialchars(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
                $mail = htmlspecialchars(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
                if (!empty($name) && !empty($mail)) {
                    $db->query("INSERT INTO `subscribers` (`subscr_email`, `subscr_name`) VALUES (?, ?);", array($mail, $name));
                    echo '<h3><span style="color: rgb(28, 184, 65);">Вы подписались на рассылку. Спасибо!</span><h3><br/><a href="/">Вернуться</a>';
                } else {
                    echo '                        <h3>Все поля обязательны для заполнения</h3><br/>
                    <div class="l-box">
                        <div id="subscr">
                         <form method="post" name="subscrform">
                            Имя:*<br/>
                            <input id="name" type="text" autocomplete="off" placeholder="Имя" name="name"/><br/><br/>
                            Адрес эл. почты:*<br/>
                            <input id="mail" type="text" autocomplete="off" placeholder="E-mail" name="mail"/><br/><br/>
                            <button onClick="formRequest(\'subscr\', \'subscrform\');" class="pure-button pure-button-primary">Подписаться</button>
                        </form>
                          </div>
                    </div>';
                }
                ?>
            </div>
        </div>
        <script type="text/javascript">
            function formRequest(result, subscrform, url = null) {
                jQuery.ajax({
                    url: url,
                    type: "POST",
                    dataType: "html",
                    data: jQuery("#" + subscrform).serialize(),
                    success: function (response) {
                        document.getElementById(result).innerHTML = response;
                    },
                    error: function (response) {
                        document.getElementById(result).innerHTML = "Проверка заполнения полей...";
                    }
                });
                $(':input', '#subscrform')
                        .not(':button, :submit, :reset, :hidden')
                        .val('')
                        .removeAttr('checked')
                        .removeAttr('selected');
            }
        </script>
        <script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script>
    </body>
</html>