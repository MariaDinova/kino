{include file="helpers/head.tpl"}
{include file="helpers/headerLinks.tpl"}

<!--List information about chosen movie. Info come from MovieController - listIndividual-->
<section id="movieList">
    <header>{$movie->getName()}</header>
    <div>
        <div><img src="{$BASE_PATH}{$movie->getImageUri()}" /></div>
        <div>{$movie->getDescription()}</div>
        <div class="text">
            <div>Времетраене: {$movie->getDuration()}</div>
            <div>Възрастови ограничения: {$movie->getAgeRest()}</div>
            <div>Жанр: {$movie->getMovieType()}</div>
        </div>
    </div>
</section>
{include file="helpers/foot.tpl"}
