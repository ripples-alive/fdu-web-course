<?php session_start(); ?>

<?php
    if (isset($_POST['mobile']) && isset($_POST['code'])) {
        if ($_POST['mobile'] !== '18888888888') {
            echo $_POST['mobile'] . ' not registered';
        } else {
            $key = 'code-' . $_POST['mobile'];
            // echo time() - $_SESSION["$key-time"];
            if ((time() - $_SESSION["$key-time"] < 300) && $_POST['code'] === $_SESSION[$key]) {
                echo 'FLAG{GREAT_bruteforce}';
                die();
            } else {
                echo 'incorrect sms code';
            }
        }
    }
?>

<h2>Login</h2>

<form method="POST" action="">
    <br/> 手机号：
    <input name="mobile" id="mobile" type="text" class="input" value="<?php echo $_POST['mobile'] ?>" />
    <br/> 验证码：
    <input name="code" id="code" type="text" class="input" value="" maxlength=4 />
    <br/>
    <button id="sms-btn"/>发送短信</button>
    <input type="submit" name="submit" value="登录" />
</form>

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>

<script>
    $(document).ready(function () {
        $('#sms-btn').click(send_sms);
    })

    function send_sms() {
        $.ajax({
            type: "POST",
            url: "sms.php",

            dataType: 'json',
            data: {
                mobile: $("#mobile").val(),
            },
            success: function (data) {
                alert(data.msg);
            },
            error: function () {
                alert("请求出错");
            }
        });
        return false;
    }
</script>
