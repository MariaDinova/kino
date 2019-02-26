{include file="helpers/head.tpl"}
{include file="helpers/headerLinks.tpl"}

<div id="title">ПРОГРАМА</div>
<div id="choose"><img src="{$BASE_PATH}img/popcorn-pack.png" align="middle">ИЗБЕРИ ДЕН</div>

<section id="days">
{foreach from=$weekArr key=arrayIndex item=day}

        <div><a href="{$BASE_PATH}?target=program&action=list&day={$arrayIndex}"> {$day}</a></div>

{/foreach}
</section>
<section id="programListing">
    {foreach from=$programs key=arrayIndex item=program}

            <div class="movie">
                <div>
                    <img src="{$BASE_PATH}{$program->getImageUri()}" />
                </div>
                <div>
                    Зала: {$program->getHall()}<br>
                    Име: {$program->getMovie()}<br>
                    Кино: {$program->getCinema()}
                    <div class="slots">
                        {foreach from=$program->getProgramByDate() key=index item=slot}
                            <span>{$slot}</span>
                        {/foreach}
                    </div>

               </div>
            </div>
    {/foreach}
</section>

{include file="helpers/foot.tpl"}