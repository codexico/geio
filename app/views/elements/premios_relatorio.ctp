
<div class="relatorio">
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th>Brinde</th>
            <th>Quantidade</th>
            <th>Valor (R$)</th>
        </tr>
        <?php foreach ($premios_dia as $premio) : ?>
        <tr>
            <td><?php echo $premio['Brinde']['name']; ?></td>
            <td><?php echo $premio[0]['qtd_premios_total']; ?></td>
            <td><?php echo $premio[0]['premios_valor']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

</div>

<br />
<hr />
<br />