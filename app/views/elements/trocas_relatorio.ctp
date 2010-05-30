
<div class="relatorio">
    <p>Total de trocas: <?php echo $relatorio['count_trocas']; ?></p>
    <p>Número de Consumidores Novos: <?php echo $relatorio['num_consumidores_novos']; ?></p>
    <p>Número de Consumidores Atendidos: <?php echo $relatorio['num_consumidores_atendidos']; ?></p>
    <p>Número de Cupons Fiscais trocados: <?php echo $relatorio['num_cupons_fiscais']; ?></p>
    <p>Valor total dos Cupons Fiscais trocados: R$ <?php echo $number->currency($relatorio['valor_cupons_fiscais'],'EUR',array('before'=>'','after'=>'')); ?></p>
    <p>Valor Médio dos Cupons Fiscais: R$ <?php echo $number->currency($relatorio['media'],'EUR',array('before'=>'','after'=>'')); ?></p>
    <p>Valor Médio das trocas: R$ <?php echo $number->currency($relatorio['media_valor_troca'],'EUR',array('before'=>'','after'=>'')); ?></p>
    <?php if( Configure::read('Regras.CupomPromocional.true') ) : ?>
    <p>Número de Cupons Promocionais impressos: <?php echo $relatorio['num_cupons_promocionais']; ?></p>
    <?php endif; ?>
    <?php if( Configure::read('Regras.Brinde.true') ) : ?>
    <p>Número de Brindes: <?php echo $relatorio['num_premios']; ?></p>
    <?php endif; ?>
    <?php if( Configure::read('Regras.Brinde.Pagar') ) : ?>
    <p>Número de Brindes Trocados: <?php echo $relatorio['num_premios_trocados']; ?></p>
    <?php endif; ?>
    <p>Número de consumidores que compraram com VISA: <?php echo $relatorio['num_consumidores_bandeira']; ?></p>
    <p>Número de consumidores que não compraram com VISA: <?php echo $relatorio['num_consumidores_not_bandeira']; ?></p>
    <p>Número de consumidores novos que compraram com VISA: <?php echo $relatorio['num_consumidores_novos_bandeira']; ?></p>
    <p>Número de consumidores novos que não compraram com VISA: <?php echo $relatorio['num_consumidores_novos_not_bandeira']; ?></p>
    <?php /* debug($mediaValorTroca); */ ?>
</div>