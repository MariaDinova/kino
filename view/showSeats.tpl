{include file="helpers/head.tpl"}
{include file="helpers/headerLinks.tpl"}
<script>
    //check if user is not logged - show dialog with login form, else return true
    function validate () {
        var isLoggedIn = $("#isLoggedIn").val();
        if (isLoggedIn == 1) {
            return true;
        } else {
            $("#dialog").dialog();
            return false;
        }
    }
</script>
<div class="hidden">
    <div id="dialog">
        {include file="loginForm.tpl"}
    </div>
</div>
<!--Set a hidden input with value true or false (0 or 1) that is need for validate function -->
<input type="hidden" id="isLoggedIn" value="{$isLoggedIn}">
<!--If result from function validate is false, form can not submit-->
<form id="seats" action="{$BASE_PATH}?target=tickets&action=buyTickets" method="post" onsubmit="return validate()">
    <!--We need the following hidden inputs to send data by post. We get them from TicketsController, showSeats-->
    <input type="hidden" name="programId" value="{$id}">
    <input type="hidden" name="slot" value="{$slot}">
    <input type="hidden" name="day" value="{$day}">
    <div class="checkbox">
    <table>
        <!--List table with checkboxes for seats -->
        {foreach from=$rows item=row key=key}
            <tr>
                {foreach from=$seats item=seat key=key1}
                    <!--If on the current position is set taken seat we can't choose it (do it in style.less)-->
                    {if isset($takenSeats[$key][$key1])}
                        <td><input type="checkbox" id="checkbox_{$key}_{$key1}"><label class="taken" for="checkbox_{$key}_{$key1}"></label></td>
                    {else}
                       <td><input type="checkbox" name="seat[]" id="checkbox_{$key}_{$key1}" value="{$key}:{$key1}"><label for="checkbox_{$key}_{$key1}"></label></td>
                    {/if}
                {/foreach}
            </tr>
        {/foreach}
    </table>
    </div>
    <br/>
    <br/>
    <input id="submit" type="submit" name="buyTicket" value="Buy ticket">
</form>
{include file="helpers/foot.tpl"}