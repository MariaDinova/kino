{include file="helpers/head.tpl"}
{include file="helpers/headerLinks.tpl"}

<div id="title">ЗАЛИ</div>

<div id="choose"><img src="{$BASE_PATH}img/popcorn-pack.png" align="middle">ИЗБЕРИ ЗАЛА</div>
{$msg}
<table>
    {foreach from=$halls key=arrayIndex item=hall}
            <div><a href="{$BASE_PATH}?target=program&action=list&hall={$hall->getHallId()}">
                    {$hall->getHallType()} {$hall->getSeats()}
                </a>
            </div>
    {/foreach}
</table>
{include file="helpers/foot.tpl"}
