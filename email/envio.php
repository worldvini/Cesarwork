 <?php
 
/* apenas dispara o envio do formulário caso exista $_POST['enviarFormulario']*/
 
if (isset($_POST['enviarFormulario'])){
 
 
/*** INÍCIO - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/
 
$enviaFormularioParaNome = 'Paulo Cesar';
$enviaFormularioParaEmail = 'contato@cesarwork.com';
 
$caixaPostalServidorNome = 'CesarWork | Formulário';
$caixaPostalServidorEmail = 'pcetera@ig.com.br'; 
$caixaPostalServidorSenha = 'placar10x0';
 
/*** FIM - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/ 
 
 
/* abaixo as veriaveis principais, que devem conter em seu formulario*/
 
$remetenteNome  = $_POST['nome'];
$remetenteTelefone = $_POST['telefone'];
$remetenteSite  = $_POST['site'];
$remetenteEmail = $_POST['email'];
$remetenteMensagem = $_POST['texto'];
$assunto = 'Contato Cesar Work Web Site';
 
$mensagemConcatenada = 'Contato do Site Cesar Work'.'<br/>'; 
$mensagemConcatenada .= '-------------------------------<br/><br/>'; 
$mensagemConcatenada .= 'Nome: '.$remetenteNome.'<br/>'; 
$mensagemConcatenada .= 'Nome: '.$remetenteTelefone.'<br/>'; 
$mensagemConcatenada .= 'E-mail: '.$remetenteSite.'<br/>'; 
$mensagemConcatenada .= 'Assunto: '.$remetenteEmail.'<br/>';
$mensagemConcatenada .= '-------------------------------<br/><br/>'; 
$mensagemConcatenada .= 'Mensagem: "'.$remetenteMensagem.'"<br/>';
 
 
/*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/ 
 
require_once('PHPMailer-master/PHPMailerAutoload.php');
 
$mail = new PHPMailer();
 
$mail->IsSMTP();
$mail->SMTPAuth  = true;
$mail->Charset   = 'utf8_decode()';
$mail->Host  = 'smtp.'.substr(strstr($caixaPostalServidorEmail, '@'), 1);
$mail->Port  = '587';
$mail->Username  = $caixaPostalServidorEmail;
$mail->Password  = $caixaPostalServidorSenha;
$mail->From  = $caixaPostalServidorEmail;
$mail->FromName  = utf8_decode($caixaPostalServidorNome);
$mail->IsHTML(true);
$mail->Subject  = utf8_decode($assunto);
$mail->Body  = utf8_decode($mensagemConcatenada);
 
 
$mail->AddAddress($enviaFormularioParaEmail,utf8_decode($enviaFormularioParaNome));
 
if(!$mail->Send()){
$mensagemRetorno = 'Erro ao enviar formulário: '. print($mail->ErrorInfo);
}else{
$mensagemRetorno = 'Formulário enviado com sucesso!';
} 
 
 
}
?>