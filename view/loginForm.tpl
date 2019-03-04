<script>

    function postData() {

        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var data = { "email": email, "password": password };

        fetch('{$BASE_PATH}?target=user&action=login&response=json', {
            method: "POST",
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        })
        .then(function (response) {
            return response.json();
        })
        .then(function (myJson) {

            if (myJson.success == "true") {
                //success login
                $("#isLoggedIn").val("1");
                $("#dialog").dialog("close");
                $("#submit").click();
            } else {
                $("#error").text('Wrong email or password');
            }
        })
        .catch(function (e) {
            alert(e.message);
        })
        return false;
    }
</script>
<a href="{$BASE_PATH}?target=user&action=register" >Register</a>

<form id="postData" onsubmit="return postData()">
    <div id="error"></div>
    <table>
        <tr>
            <td>Email</td>
            <td>
                <input id="email" type="email" name="email" placeholder="your email">
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input id="password" type="password" name="password" placeholder="your password">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="login" value="Log in">
            </td>
        </tr>
    </table>
</form>
