{include file="helpers/headerLinks.tpl"}

<p>Movie List</p>

<table>
    {foreach from=$movies key=arrayIndex item=movie}
        <tr>
            <td>{$movie->getName()}</td>
            <td>{$movie->getPrice()}</td>
        </tr>
    {/foreach}
</table>
