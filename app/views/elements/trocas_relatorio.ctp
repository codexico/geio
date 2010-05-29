
<div class="relatorio">
    <p><?php echo "Total de trocas: " . $relatorio['count_trocas']; ?></p>
    <p><?php echo "Número de Consumidores Novos: " . $relatorio['num_consumidores_novos']; ?></p>
    <p><?php echo "Número de Consumidores Atendidos: " . $relatorio['num_consumidores_atendidos']; ?></p>
    <p><?php echo "Número de Cupons Fiscais trocados: " . $relatorio['num_cupons_fiscais']; ?></p>
    <p><?php echo "Valor total dos Cupons Fiscais trocados: R$ " . $number->currency($relatorio['valor_cupons_fiscais'],'EUR',array('before'=>'','after'=>'')); ?></p>
    <p><?php echo "Valor Médio dos Cupons Fiscais: R$ " . $number->currency($relatorio['media'],'EUR',array('before'=>'','after'=>'')); ?></p>
    <p><?php echo "Valor Médio das trocas: R$ " . $number->currency($relatorio['media_valor_troca'],'EUR',array('before'=>'','after'=>'')); ?></p>
    <?php if( Configure::read('Regras.CupomPromocional.true') ) : ?>
    <p><?php echo "Número de Cupons Promocionais impressos: " . $relatorio['num_cupons_promocionais']; ?></p>
    <?php endif; ?>
    <?php if( Configure::read('Regras.Brinde.true') ) : ?>
    <p><?php echo "Número de Brindes: " . $relatorio['num_premios']; ?></p>
    <?php endif; ?>
    <?php if( Configure::read('Regras.Brinde.Pagar') ) : ?>
    <p><?php echo "Número de Brindes Trocados: " . $relatorio['num_premios_trocados']; ?></p>
    <?php endif; ?>
    <p><?php echo "Número de consumidores que compraram com VISA: " . $relatorio['num_consumidores_bandeira']; ?></p>
    <p><?php echo "Número de consumidores que não compraram com VISA: " . $relatorio['num_consumidores_not_bandeira']; ?></p>
    <p><?php echo "Número de consumidores novos que compraram com VISA: " . $relatorio['num_consumidores_novos_bandeira']; ?></p>
    <p><?php echo "Número de consumidores novos que não compraram com VISA: " . $relatorio['num_consumidores_novos_not_bandeira']; ?></p>
    <?php /* debug($mediaValorTroca); */ ?>
</div>