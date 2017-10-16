<?php

require_once("index.php");
?>

<div class="block_for_messages">
    <?php

    if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
        echo $_SESSION["error_messages"];

        unset($_SESSION["error_messages"]);
    }

    if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
        echo $_SESSION["success_messages"];

        unset($_SESSION["success_messages"]);
    }
    ?>
</div>

<?php

if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])){
    ?>


    <div id="form_auth">
        <h2>Sign up form</h2>
        <form action="auth.php" method="post" name="form_auth">
            <table class="table_register">

                <tbody><tr>
                    <td>
                        <input name="email" placeholder = "Email" required="required" type="email"><br>
                        <span id="valid_email_message" class="mesage_error"></span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input name="password" placeholder="Password" required="required" type="password"><br>
                        <span id="valid_password_message" class="mesage_error"></span>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <button name="btn_submit_auth" value ="signup" type="submit">
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
        <h2>Вы уже авторизованы</h2>
    </div>

    <?php
}
?>
