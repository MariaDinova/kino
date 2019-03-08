{include file="helpers/head.tpl"}
{include file="helpers/headerLinks.tpl"}
<div class="errorMsg">{$msg}</div>
<!--register form - send by post to UserController - register-->
<form class="register-login" action="{$BASE_PATH}?target=user&action=register" method="post">
    <table>
        <tr class="rows">
            <td>Име</td>
            <td><input type="text" name="firstName" id="firstName"  placeholder="Име" required></td>
        </tr>
        <tr class="rows">
            <td>Фамилия</td>
            <td><input type="text" name="lastName" id="lastName" placeholder="Фамилия"  required></td>
        </tr>
        <tr class="rows">
            <td>Email</td>
            <td><input type="text" name="email" id="email"  placeholder="email" required></td>
        </tr>
        <tr class="rows">
            <td>Парола</td>
            <td><input type="password" name="password" id="password"  placeholder="Парола(минимум 6 символа)" required></td>
        </tr>
        <tr class="rows">
            <td>Възраст</td>
            <td><input type="number" name="age" id="age"  placeholder="Възраст" required></td>
        </tr>
        <tr class="rows">
            <td colspan="2"><input type="submit" name="register" value="Регистрирай се"></td>
        </tr>
    </table>
</form>
{include file="helpers/foot.tpl"}