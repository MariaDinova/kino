{include file="helpers/head.tpl"}

<form action="{$BASE_PATH}?target=user&action=register" method="post">

    <table>
        <tr>
            <td>First name</td>
            <td><input type="text" name="firstName" id="firstName"></td>
        </tr>
        <tr>
            <td>Last name</td>
            <td><input type="text" name="lastName" id="lastName"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" id="password"></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><input type="number" name="age" id="age"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="register" value="Register now"></td>
        </tr>
    </table>
    
</form>

{include file="helpers/foot.tpl"}