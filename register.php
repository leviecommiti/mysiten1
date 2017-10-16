<?php
/**
 * Created by PhpStorm.
 * User: aser
 * Date: 12.10.17
 * Time: 19:51
 */
session_start();

require_once("dbconnect.php");

$_SESSION["error_messages"] = '';
$_SESSION["success_messages"] = '';

?>

<?php

if (isset($_POST["btn_submit_register"]) && !empty($_POST["btn_submit_register"])) {

    if (isset($_POST["first_name"])) {

        $first_name = trim($_POST["first_name"]);

        if (!empty($first_name)) {

            $first_name = htmlspecialchars($first_name, ENT_QUOTES);
        } else {

            $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите ваше имя</p>";

            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $localhost . "/form_register.php");

            exit();
        }


    } else {

        $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле с именем</p>";

        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $localhost . "/form_register.php");

        exit();
    }


    if (isset($_POST["last_name"])) {

        $last_name = trim($_POST["last_name"]);

        if (!empty($last_name)) {

            $last_name = htmlspecialchars($last_name, ENT_QUOTES);
        } else {

            $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите вашу фамилию</p>";

            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $localhost . "/form_register.php");

            exit();
        }


    } else {

        $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле с фамилией</p>";

        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $localhost . "/form_register.php");

        exit();
    }

    if (isset($_POST["email"])) {

        $email = trim($_POST["email"]);

        if (!empty($email)) {

            $email = htmlspecialchars($email, ENT_QUOTES);

            $reg_email = "/^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i";

            if (!preg_match($reg_email, $email)) {

                $_SESSION["error_messages"] .= "<p class='mesage_error' >Вы ввели неправельный email</p>";

                header("HTTP/1.1 301 Moved Permanently");
                header("Location: " . $localhost . "/form_register.php");

                exit();
            }

            $result_query = $mysqli->query("SELECT `email` FROM `users` WHERE `email`='" . $email . "'");
            if ($result_query->num_rows == 1) {

                if (($row = $result_query->fetch_assoc()) != false) {

                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Пользователь с таким почтовым адресом уже зарегистрирован</p>";

                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: " . $localhost . "/form_register.php");

                } else {

                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка в запросе к БД</p>";

                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: " . $localhost . "/form_register.php");
                }

                $result_query->close();

                exit();
            }

            $result_query->close();

        } else {

            $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите ваш email</p>";


            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $localhost . "/form_register.php");

            exit();
        }

    } else {

        $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле для ввода email</p>";

        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $localhost . "/form_register.php");

        exit();
    }

    var_dump(1);
    if (isset($_POST["password"])) {

        $password = trim($_POST["password"]);

        if (!empty($password)) {
            $password = htmlspecialchars($password, ENT_QUOTES);
            $hash = md5('top_secret');
            $password = md5($password . $hash);
        } else {

            $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите ваш пароль</p>";

            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $localhost . "/form_register.php");

            exit();
        }

    } else {

        $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле для ввода пароля</p>";

        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $localhost . "/form_register.php");

        exit();
    }
    $result_query_insert = $mysqli->query("INSERT INTO `users` (first_name, last_name, email, password) VALUES ('" . $first_name . "', '" . $last_name . "', '" . $email . "', '" . $password . "')");
    if (!$result_query_insert) {

        $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на добавления пользователя в БД</p>";

        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $localhost . "/form_register.php");

        exit();
    } else {

        $_SESSION["success_messages"] = "<p class='success_message'>Регистрация прошла успешно!!! <br />Теперь Вы можете авторизоваться используя Ваш логин и пароль.</p>";

        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $localhost . "/form_auth.php");
    }

    $result_query_insert->close();

    $mysqli->close();

} else {

    exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на главную страницу. </p>");
}
?>
