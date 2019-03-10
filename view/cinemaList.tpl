{include file="helpers/head.tpl"}
{include file="helpers/headerLinks.tpl"}
<br>
<div id="title">КИНА</div>
<div id="choose"><img src="{$BASE_PATH}img/popcorn-pack.png" align="middle">ИЗБЕРИ КИНО</div>
<section id="listCinema">
    <!--Take all cinema from CinemaController and list them with picture, name and location.
     Link to halls of each of them with id by get-->
    {foreach from=$cinemas key=arrayIndex item=cinema}
        <div><a href="{$BASE_PATH}?target=halls&action=listAll&cinema={$cinema->getCinemaId()}">
                    <img src="{$BASE_PATH}{$cinema->getThumb()}" />
                    <br />
                    {$cinema->getName()}
                    <br />{$cinema->getLocation()}
                </a>
            </div>
    {/foreach}
</section>
{include file="helpers/foot.tpl"}