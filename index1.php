<?php
//Inclui o arquivo class.phpmailer.php localizado na pasta class
//require_once("vendor/phpmailer/phpmailer/src/PHPMailer.php");
require_once("vendor/autoload.php");

//Create a new PHPMailer instance -> Crie uma nova instância do PHPMailer
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP -> Diga ao PHPMailer que use SMTP
$mail->isSMTP();

//Enable SMTP debugging -> Ativar depuração de SMTP
// 0 = off (for production use) -> Desligado (para uso em produção)
// 1 = client messages -> mensagens do cliente
// 2 = client and server messages -> mensagens de cliente e servidor
$mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output -> Solicite saída de depuração compatível com HTML
//$mail->Debugoutput = 'html';

//Set the hostname of the mail server -> Defina o nome do host do servidor de correio
//Essa linha abaixo é imprescindível porque...
$mail->Host = 'smtp.gmail.com';
// use -> Usar
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
//-> Defina o número da porta SMTP - 587 para TLS autenticado, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
// -> Defina o sistema de criptografia para usar - ssl (obsoleto) ou tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication -> Se usar a autenticação SMTP
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
// -> Nome de usuário para usar para autenticação SMTP - use o endereço de e-mail completo para o gmail
$mail->Username = "ramerips49@gmail.com";

//Password to use for SMTP authentication -> Senha para usar para autenticação SMTP
$mail->Password = "28050149mail";

//Set who the message is to be sent from -> Defina de quem a mensagem deve ser enviada
$mail->setFrom('ramerips49@gmail.com', 'Estudo ramerips PHP7');

//Set an alternative reply-to address -> Defina uma resposta alternativa ao endereço
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to -> Defina quem a mensagem deve ser enviada para
//para quem você quer enviar este E-mail
//Aqui você pode acrescentar vários outros endereços de E-mail
$mail->addAddress('ramerips2@yahoo.com.br', 'Ramerips Estudo Suporte');

//Set the subject line -> Defina a linha de assunto
$mail->Subject = 'Testando Estudo Suporte Iremar';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
// -> Leia um corpo de mensagem HTML de um arquivo externo, converta imagens referenciadas 
//para incorporado, converta HTML em um corpo alternativo básico de texto simples
$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

//Replace the plain text body with one created manually 
// -> Substitua o corpo de texto simples por um criado manualmente
$mail->AltBody = 'Testando Estudo Suporte Iremar';

//Attach an image file -> Anexe um arquivo de imagem
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors -> Envie a mensagem, verifique se há erros
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}   
   
   /*
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    // -> Desconfie-os para salvar sua mensagem na pasta 'Correio Enviado'.
    #if (save_mail($mail)) {
    #    echo "Message saved!"; // -> Mensagem salva 
    #}
}
//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
function save_mail($mail)
{
    //You can change 'Sent Mail' to any other folder or tag 
    // -> Você pode alterar 'Correio Enviado' para qualquer outra pasta ou tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    // -> Diga ao seu servidor para abrir uma conexão IMAP usando o mesmo nome de usuário e senha que você usou para SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}   */

?>