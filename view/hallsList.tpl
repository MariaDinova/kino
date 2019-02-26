{include file="helpers/headerLinks.tpl"}

<p>Choose hall</p>

<table>
    {foreach from=$halls key=arrayIndex item=hall}
        <tr>
            <td> {$hall->getHallType()} {$hall->getSeats()}</td>
        </tr>
    {/foreach}
</table>