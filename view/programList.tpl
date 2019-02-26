{include file="helpers/headerLinks.tpl"}

<p>Program</p>

{foreach from=$weekArr key=arrayIndex item=day}

        <a href="{$BASE_PATH}?target=program&action=list&day={$arrayIndex}"> {$day} | </a>

{/foreach}

<ul>
    {foreach from=$programs key=arrayIndex item=program}
        <li>
            <div>
                {$program->getProgramId()}
                <br> {$program->getHall()}
                <br> {$program->getMovie()}
                <br> {$program->getCinema()}
                <br> {$program->getStartDate()}
                <br> {$program->getEndDate()}
                <br> {$program->getScreening()}
                <br> {$program->getSlot()}
                <br>
                    {foreach from=$program->getProgramByDate() key=index item=slot}
                        {$slot}
                    {/foreach}
                    <br>

            </div>
         </li>
    {/foreach}
</ul>

