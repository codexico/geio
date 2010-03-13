<?php
echo "\nNome: " . $this->data['Contato']['nome'] . "";
echo "\nEmail: " . $this->data['Contato']['email'] . "";
echo "\nAssunto: " . $this->data['Contato']['assunto'] . "";
echo "\nMensagem: " . "\n    " . $this->data['Contato']['mensagem'] . "" . "";
?>
<?php echo "\n\nEnviado em: ".date("d/m/Y - h:i:s") . "\n" ?>