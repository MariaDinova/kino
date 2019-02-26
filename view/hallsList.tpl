{include file="helpers/head.tpl"}
{include file="helpers/headerLinks.tpl"}

<div id="title">ЗАЛИ</div>

<div id="choose"><img src="{$BASE_PATH}img/popcorn-pack.png" align="middle">ИЗБЕРИ ЗАЛА</div>

<table>
    {foreach from=$halls key=arrayIndex item=hall}
        <tr>
            <td> {$hall->getHallType()} {$hall->getSeats()}</td>
        </tr>
    {/foreach}
</table>
{include file="helpers/foot.tpl"}
