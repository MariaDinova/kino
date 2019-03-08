{include file="helpers/head.tpl"}
{include file="helpers/headerLinks.tpl"}
<div class="errorMsg">{$msg}</div>
<!--login form - send by post to UserController - login-->
<form  class="register-login" action="{$BASE_PATH}?target=user&action=login" method="post">
    <table>
        <tr class="rows">
            <td>Email</td>
            <td>
                <input type="email" name="email" placeholder="email">
            </td>
        </tr>
        <tr class="rows">
            <td>Парола</td>
            <td>
                <input type="password" name="password" placeholder="Парола">
            </td>
        </tr class="rows">
        <tr>
            <td>
                <input type="submit" name="login" value="Вход">
            </td>
        </tr>
    </table>
</form>
{include file="helpers/foot.tpl"}
