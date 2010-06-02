
<div class="relatorio">
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th class="txtCenter">Brinde</th>
            <th class="txtCenter">Quantidade</th>
            <th class="txtCenter">Valor (R$)</th>
        </tr>
        <?php foreach ($premios_dia as $premio) : ?>
        <tr>
            <td class="txtCenter"><?php echo $premio['Brinde']['name']; ?></td>
            <td class="txtCenter"><?php echo $premio[0]['qtd_premios_total']; ?></td>
            <td class="txtCenter"><?php echo $premio[0]['premios_valor']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

</div>

<br />
<hr />
<br />