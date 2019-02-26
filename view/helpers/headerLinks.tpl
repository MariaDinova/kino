<menu>
<div><a href="{$BASE_PATH}?target=cinema&action=list">Кина</a></div>
<div><a href="{$BASE_PATH}?target=program&action=list">Програма</a></div>
{if $isLoggedIn}
    <div><a href="{$BASE_PATH}?target=user&action=logout">Изход</a></div>
{else}
    <div><a href="{$BASE_PATH}?target=user&action=login">Вход</a></div>
    <div><a href="{$BASE_PATH}?target=user&action=register">Регистрация</a></div>
{/if}
</menu>
<!--
<a href="{$BASE_PATH}?target=movieCategory&action=list">List all movie categories</a> <br>
<a href="{$BASE_PATH}?target=ageRestriction&action=list">List all restrictions</a> <br>
<a href="{$BASE_PATH}?target=halls&action=list">List all halls</a> <br>
<a href="{$BASE_PATH}?target=movie&action=list">List all movies</a> <br>
<a href="{$BASE_PATH}?target=program&action=list">Program</a> <br>
-->