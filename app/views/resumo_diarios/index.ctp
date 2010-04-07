<?php
/* @var $this View */
/* @var $html HtmlHelper */
/* @var $form FormHelper */
/* @var $javascript JavascriptHelper */
/* @var $cakePtbr CakePtbr.FormatacaoHelper */
/* @var $paginator PaginatorHelper */
?>
<div class="resumoDiarios index">
<h2><?php __('ResumoDiarios');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<?php /*<th><?php echo $paginator->sort('id');?></th> */?>
	<th><?php echo $paginator->sort('Data','dia');?></th>
	<th><?php echo $paginator->sort('Consumidores Atendidos','qtd_consumidores');?></th>
	<th><?php echo $paginator->sort('Consumidores Novos','qtd_consumidores_novos');?></th>
	<th><?php echo $paginator->sort('Cupons Fiscais Trocados','qtd_cupons_fiscais');?></th>
	<th><?php echo $paginator->sort('Cupons Promocionais Impressos','qtd_cupons_promocionais');?></th>
	<th><?php echo $paginator->sort('R$','valor_total');?></th>
	<th><?php echo $paginator->sort('R$ Bandeira','valor_bandeira');?></th>
	<th><?php echo $paginator->sort('R$ Outros','valor_outros');?></th>
	<th><?php echo $paginator->sort('ticket_medio_consumidor');?></th>
	<th><?php echo $paginator->sort('Ticket Médio Shopping','ticket_medio_cupom_fiscal');?></th>
</tr>
<?php
			$qtd_consumidores_sum = 0;
			 $qtd_consumidores_novos_sum = 0;
			 $qtd_cupons_fiscais_sum = 0;
			 $qtd_cupons_promocionais_sum = 0;
			 $valor_total_sum = 0;
			 $valor_bandeira_sum = 0;
			 $valor_outros_sum = 0;
			 $ticket_medio_consumidor_sum = 0;
			 $ticket_medio_cupom_fiscal_sum = 0;
$i = 0;
foreach ($resumoDiarios as $resumoDiario):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
            <?php /*
		<td>
			<?php echo $resumoDiario['ResumoDiario']['id']; ?>
		</td>
             */ ?>
		<td>
			<?php echo $resumoDiario['ResumoDiario']['dia']; ?>
		</td>
		<td>
			<?php echo $resumoDiario['ResumoDiario']['qtd_consumidores']; ?>
                    <?php $qtd_consumidores_sum += $resumoDiario['ResumoDiario']['qtd_consumidores']; ?>
		</td>
		<td>
			<?php echo $resumoDiario['ResumoDiario']['qtd_consumidores_novos']; ?>
			<?php $qtd_consumidores_novos_sum += $resumoDiario['ResumoDiario']['qtd_consumidores_novos']; ?>
		</td>
		<td>
			<?php echo $resumoDiario['ResumoDiario']['qtd_cupons_fiscais']; ?>
			<?php $qtd_cupons_fiscais_sum += $resumoDiario['ResumoDiario']['qtd_cupons_fiscais']; ?>
		</td>
		<td>
			<?php echo $resumoDiario['ResumoDiario']['qtd_cupons_promocionais']; ?>
			<?php $qtd_cupons_promocionais_sum += $resumoDiario['ResumoDiario']['qtd_cupons_promocionais']; ?>
		</td>
		<td>
			<?php echo $resumoDiario['ResumoDiario']['valor_total']; ?>
			<?php $valor_total_sum += $resumoDiario['ResumoDiario']['valor_total']; ?>
		</td>
		<td>
			<?php echo $resumoDiario['ResumoDiario']['valor_bandeira']; ?>
			<?php $valor_bandeira_sum += $resumoDiario['ResumoDiario']['valor_bandeira']; ?>
		</td>
		<td>
			<?php echo $resumoDiario['ResumoDiario']['valor_outros']; ?>
			<?php $valor_outros_sum += $resumoDiario['ResumoDiario']['valor_outros']; ?>
		</td>
		<td>
			<?php echo number_format($resumoDiario['ResumoDiario']['ticket_medio_consumidor'],2); ?>
			<?php $ticket_medio_consumidor_sum += $resumoDiario['ResumoDiario']['ticket_medio_consumidor']; ?>
		</td>
		<td>
			<?php echo number_format($resumoDiario['ResumoDiario']['ticket_medio_cupom_fiscal'],2); ?>
			<?php $ticket_medio_cupom_fiscal_sum += $resumoDiario['ResumoDiario']['ticket_medio_cupom_fiscal']; ?>
		</td>
                <?php /*
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $resumoDiario['ResumoDiario']['id'])); ?>                    
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $resumoDiario['ResumoDiario']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $resumoDiario['ResumoDiario']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $resumoDiario['ResumoDiario']['id'])); ?>                     
		</td>*/?>
	</tr>
<?php endforeach; ?>
        <tr>
		<th>
			<?php echo "TOTAL"; ?>
		</th>
                <?php /*
		<th>
			<?php echo ''; ?>
		</th>
                 */?>
		<th>
			<?php echo $qtd_consumidores_sum; ?>
		</th>
		<th>
			<?php echo $qtd_consumidores_novos_sum; ?>
		</th>
		<th>
			<?php echo $qtd_cupons_fiscais_sum; ?>
		</th>
		<th>
			<?php echo $qtd_cupons_promocionais_sum; ?>
		</th>
		<th>
			<?php echo $valor_total_sum; ?>
		</th>
		<th>
			<?php echo $valor_bandeira_sum; ?>
		</th>
		<th>
			<?php echo $valor_outros_sum; ?>
		</th>
		<th>
			<?php echo number_format($ticket_medio_consumidor_sum/$i,2); ?>
		</th>
		<th>
			<?php echo number_format($ticket_medio_cupom_fiscal_sum/$i,2); ?>
		</th>
	</tr>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<?php /*
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New ResumoDiario', true), array('action' => 'add')); ?></li>
	</ul>
</div>
 *
 */?>