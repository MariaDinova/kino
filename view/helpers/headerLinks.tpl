{if $isLoggedIn}
    <a href="{$BASE_PATH}?target=user&action=logout">Logout</a><br>
{else}
    <a href="{$BASE_PATH}?target=user&action=register">Register now</a> <br>
    <a href="{$BASE_PATH}?
    target=user&action=login">Log in</a><br>
{/if}
<a href="{$BASE_PATH}?target=cinema&action=list">List all cinema</a> <br>
<a href="{$BASE_PATH}?target=movieCategory&action=list">List all movie categories</a> <br>
<a href="{$BASE_PATH}?target=ageRestriction&action=list">List all restrictions</a> <br>
<a href="{$BASE_PATH}?target=halls&action=list">List all halls</a> <br>
<a href="{$BASE_PATH}?target=movie&action=list">List all movies</a> <br>
<a href="{$BASE_PATH}?target=program&action=list">Program</a> <br>