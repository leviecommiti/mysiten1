<?php
require_once("index.php");
?>
    <div class ="block_for_messages">
        <?php
         if(isset($_SESSION["error"]) && !empty($_SESSION["error_messages"])){
            echo($_SESSION["error"]);
            unset($_SESSION["error_messages"]);
}
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])) {
            echo $_SESSION["success_messages"];


            unset($_SESSION["success_messages"]);
        }
?>

</div>

<?php
    if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])){
?>
    <div id="form_register">
        <h2>Форма регистрации</h2>

        <form action="register.php" method="post" name="form_register">
            <table class="table_register">
                <tbody><tr>
                    <td>
                        <input name="first_name" placeholder="Имя" required="required" type="text">
                    </td>
                </tr>

                <tr>
                    <td>
                        <input name="last_name" placeholder="Фамилия" required="required" type="text">
                    </td>
                </tr>

                <tr>
                    <td>
                        <input name="email" placeholder="Email" required="required" type="email"><br>
                        <span id="valid_email_message" class="message_error"></span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input name="password" placeholder="Пароль, минимум 6 символов" required="required" type="password"><br>
                        <span id="valid_password_message" class="message_error"></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button name="btn_submit_register" type="submit">
                            login
                        </button>
                    </td>
                </tr>
                </tbody></table>
        </form>
    </div>
    <?php
}else{
?>
<div id="authorized">
    <h2>Вы уже зарегистрированы</h2>
</div>
<?php
    }

?>