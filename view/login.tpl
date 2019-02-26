{include file="helpers/head.tpl"}
<form action="{$BASE_PATH}?target=user&action=login" method="post">
    <table>
        <tr>
            <td>Email</td>
            <td>
                <input type="email" name="email" placeholder="your email">
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input type="password" name="password" placeholder="your password">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="login" value="Log in">
            </td>
        </tr>
    </table>
</form>
{include file="helpers/foot.tpl"}
