{include file="helpers/head.tpl"}
{include file="helpers/headerLinks.tpl"}

<main id="index">
    {foreach from=$movies key=arrayIndex item=movie}
        <section>
            <div class="text">{$movie->getName()}</div>

            <div class="trailer" data-movie="{$movie->getMovieId()}">
                <iframe width="560"
                        height="315"
                        src="{$movie->getTrailerUri()}"
                        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
            </div>

            <div class="image">
                <img src="{$BASE_PATH}{$movie->getImageUri()}"/>
                <div class="onHover">

                    {if $movie->getTrailerUri() neq ''}
                        <div onclick="$('.trailer[data-movie={$movie->getMovieId()}]').dialog({
                                modal: true,
                                width: 600,
                                height: 400
                                });">Трейлър</div>
                    {/if}


                    <div><a href="{$BASE_PATH}?target=movie&action=listIndividual&id={$movie->getMovieId()}">Подробно</a> </div>
                    <div>Добави в любими</div>
                </div>
            </div>
        </section>
    {/foreach}
</main>

{include file="helpers/foot.tpl"}
