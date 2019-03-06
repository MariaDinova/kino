<menu>
<div><a href="{$BASE_PATH}?target=cinema&action=list">Кина</a></div>
<div><a href="{$BASE_PATH}?target=program&action=list">Програма</a></div>
{if $isLoggedIn}
    <div><a href="{$BASE_PATH}?target=user&action=logout">Изход</a></div>
    <div><a href="{$BASE_PATH}?target=tickets&action=myTickets">Моите билети</a></div>
{else}
    <div><a href="{$BASE_PATH}?target=user&action=login">Вход</a></div>
    <div><a href="{$BASE_PATH}?target=user&action=register">Регистрация</a></div>
{/if}
</menu>