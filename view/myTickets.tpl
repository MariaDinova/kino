{include file="helpers/head.tpl"}
{include file="helpers/headerLinks.tpl"}
<br>
<div id="my-tickets">
    <table>
        <tr>
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
            <tr>
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