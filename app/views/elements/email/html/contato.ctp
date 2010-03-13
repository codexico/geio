<?php
echo "\n<p><em>Nome:</em> " . $this->data['Contato']['nome'] . "</p>";
echo "\n<p><em>Email:</em> " . $this->data['Contato']['email'] . "</p>";
echo "\n<p><em>Assunto:</em> " . $this->data['Contato']['assunto'] . "</p>";
echo "\n<p><em>Mensagem:</em> " . "\n<p>" . $this->data['Contato']['mensagem'] . "</p>" . "</p>";
?>
<?php echo "\n<p>Enviado em: ".date("d/m/Y - h:i:s") . "</p>\n" ?>
