
<div class="relatorio">
    <p><?php echo "Total de trocas de hoje: " . $relatorio['count_trocas']; ?></p>
    <p><?php echo "Número de Consumidores Novos: " . $relatorio['num_consumidores_novos']; ?></p>
    <p><?php echo "Número de Consumidores Atendidos: " . $relatorio['num_consumidores_atendidos']; ?></p>
    <p><?php echo "Número de Cupons Fiscais trocados: " . $relatorio['num_cupons_fiscais']; ?></p>
    <p><?php echo "Valor total dos Cupons Fiscais trocados: R$ " . $relatorio['valor_cupons_fiscais']; ?></p>
    <p><?php echo "Valor Médio dos Cupons Fiscais: R$ " . $relatorio['media']; ?></p>
    <p><?php echo "Valor Médio das trocas: R$ " . $relatorio['media_valor_troca']; ?></p>
    <p><?php echo "Número de Cupons Promocionais impressos: " . $relatorio['num_cupons_promocionais']; ?></p>
    <p><?php echo "Número de consumidores que compraram com VISA: " . $relatorio['num_consumidores_bandeira']; ?></p>
    <p><?php echo "Número de consumidores que não compraram com VISA: " . $relatorio['num_consumidores_not_bandeira']; ?></p>
    <p><?php echo "Número de consumidores novos que compraram com VISA: " . $relatorio['num_consumidores_novos_bandeira']; ?></p>
    <p><?php echo "Número de consumidores novos que não compraram com VISA: " . $relatorio['num_consumidores_novos_not_bandeira']; ?></p>
    <?php /* debug($mediaValorTroca); */ ?>
</div>