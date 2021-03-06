{include file="helpers/head.tpl"}
{include file="helpers/headerLinks.tpl"}
<br>
<!--Show all the tickets that are bought from user-->
<div id="my-tickets">
    <table>
        <tr class="rows">
        <th>Movie</th>
        <th>Hall</th>
        <th>Cinema</th>
        <th>Date</th>
        <th>Hour</th>
        <th>Row</th>
        <th>Seat</th>
        <th>Price</th>
        </tr>
        {foreach from=$tickets key=arrayIndex item=ticket}
            <tr class="rows">
                <td>{$ticket->getMovie()}</td>
                <td>{$ticket->getHall()}</td>
                <td>{$ticket->getCinema()}</td>
                <td>{$ticket->getDate()}</td>
                <td>{$ticket->getStartHour()}</td>
                <td>{$ticket->getRow()}</td>
                <td>{$ticket->getSeat()}</td>
                <td>{$ticket->getPrice()}</td>
            </tr>
        {/foreach}
    </table>
</div>
{include file="helpers/foot.tpl"}