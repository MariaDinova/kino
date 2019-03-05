{include file="helpers/head.tpl"}
{include file="helpers/headerLinks.tpl"}

<div id="title">ПРОГРАМА</div>
<div id="choose"><img src="{$BASE_PATH}img/popcorn-pack.png" align="middle">ИЗБЕРИ ДЕН</div>

<section id="days">
    <!--Take days from ProgramController and list them-->
{foreach from=$weekArr key=arrayIndex item=day}
    <!--Each day must be a link that show program for chosen day and hall-->
        <div><a href="{$BASE_PATH}?target=program&action=list&day={$arrayIndex}&hall={$hall}">{$day}</a></div>
{/foreach}
</section>
<!--If have error message - show it-->
{$msg}
<section id="programListing">
    <!--List program - movie name, hall name, cinema and hours for every screening -->
    {foreach from=$programs key=arrayIndex item=program}
            <div class="movie">
                <div>
                    <img src="{$BASE_PATH}{$program->getImageUri()}" />
                </div>
                <div>
                    Име: {$program->getMovie()}<br>
                    Зала: {$program->getHall()}<br>
                    Кино: {$program->getCinema()}
                    <div class="slots">
                        <!--Each hour is a link with program id, the number of screening and date.
                         Index is the number of screening and slot is the hour of screening-->
                        {foreach from=$program->getProgramByDate() key=index item=slot}
                            <a href="{$BASE_PATH}?target=tickets&action=showSeats&id={$program->getProgramId()}&indexScreen={$index}&day={$date}"><span>{$slot}</span></a>
                        {/foreach}
                    </div>
               </div>
            </div>
    {/foreach}
</section>
{include file="helpers/foot.tpl"}

