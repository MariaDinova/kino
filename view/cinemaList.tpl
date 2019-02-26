{include file="helpers/headerLinks.tpl"}

<p>Choose cinema</p>

<table>
    {foreach from=$cinemas key=arrayIndex item=cinema}
        <tr>
            <td><a href="{$BASE_PATH}?target=halls&action=list&cinema={$cinema->getId()}">{$cinema->getId()} {$cinema->getName()} {$cinema->getLocation()}</a> </td>
        </tr>
    {/foreach}
</table>

