<?php
/**
 * Created by PhpStorm.
 * User: aser
 * Date: 12.10.17
 * Time: 18:32
 */
    <div clas ="block_for_messages">
        <?php
         if(isset($_SESSION["error"]) && !empty($_SESSION)["error_messages"])){
            echo($_SESSION["error"]);
            unset($_SESSION["error_messages"]);
}
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];


            unset($_SESSION["success_messages"]);

?>

</div>

<?php
    if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])){
?>
    <div id="form_register">
        <h2>Форма регистрации</h2>

        <form action="register.php" method="post" name="form_register">
            <table>
                <tbody><tr>
                    <td> Имя: </td>
                    <td>
                        <input name="first_name" required="required" type="text">
                    </td>
                </tr>

                <tr>
                    <td> Фамилия: </td>
                    <td>
                        <input name="last_name" required="required" type="text">
                    </td>
                </tr>

                <tr>
                    <td> Email: </td>
                    <td>
                        <input name="email" required="required" type="email"><br>
                        <span id="valid_email_message" class="message_error"></span>
                    </td>
                </tr>

                <tr>
                    <td> Пароль: </td>
                    <td>
                        <input name="password" placeholder="минимум 6 символов" required="required" type="password"><br>
                        <span id="valid_password_message" class="message_error"></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input name="btn_submit_register" value="Зарегистрироватся!" type="submit">
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
