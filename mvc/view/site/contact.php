<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once($_SERVER['DOCUMENT_ROOT'].'/mvc/view/site/template.php');


$GLOBALS["og_title"]="Tooeste";
$GLOBALS["og_description"]="Informação ao seu Alcance";
$GLOBALS["og_image"]=$GLOBALS["base_url"]."/uploads/menu/320x240/".$GLOBALS["logo_site"];
$GLOBALS["og_url"]='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

top();

$nome=getParameter("nome");
$e_mail=getParameter("e-mail");
$telefone=getParameter("telefone");
$mensagem=getParameter("mensagem");
$titulo_adm="Entre em contato com ${nome}";
$mensagem_adm="Oi Equipe Tooeste!<br>\n ";
$mensagem_adm.="     ${nome} entrou em contato, deixou seu email <a href='mailto:${e_mail}'>${e_mail}</a><br>\n" ;
$mensagem_adm.="    e telefone:  para ligar <a href='tel:${telefone}'>${telefone}</a> <br>";
$mensagem_adm.="    ou mandar whats <a href='https://wa.me/${telefone}'>${telefone}</a>.<br>\n" ;
$mensagem_adm.="    Veja o que ${nome}  escreveu:<br><br>\n" ;
$mensagem_adm.="    ${mensagem} <br>\n" ;

echo $GLOBALS["mensagem_contato"];
sendEmailMessage(
    "smtp.hostinger.com",
    "contato@tooeste.com.br",
    "Contato  Tooeste",
    "contatoJa!4",
    "Oi! Obrigado pelo seu contato em breve a nossa equipe da Tooeste vai retornar.",
    $e_mail,
    $nome,
    $GLOBALS["mensagem_contato"]
);
sendEmailMessage(
    "smtp.hostinger.com",
    "contato@tooeste.com.br",
    "Contato  Tooeste",
    "contatoJa!4",
    $titulo_adm,
    "contato@tooeste.com.br",
    "Contato  Tooeste",
    $mensagem_adm
);
$GLOBALS["mensagem_contato"];
?>
<form method="post" >
<div class="row mt-3 ">
	<div class="col-sm-12 shadow-lg p-3 mb-5  rounded" 
	style="box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.5);
-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.5);
-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.5);
background-color:#ffffba" >
        <h1 class="w-100 text-center">CONTATO</h1>
        <br>
        <h2>Entre em contato conosco</h2>
        <br>
        <p>Nome</p>
        <p><input type="text" class="w-100 " name="nome"></p>
        <br>
        <p>E-mail</p>
        <p><input type="e-mail" class="w-100 "  name="e-mail"></p>
         <br>
        <p>Telefone</p>
        <p><input type="fone"  class="w-100 " name="telefone"></p>
         <br>
        <p>Mensagem</p>
        <p><textarea  class="w-100 " name="mensagem"></textarea></p>
          <br>
        <p></p>
        <p><input  type="submit" name="enviar" value="Enviar"></p>
	</div>
</div>
</form>

<?php 

     foot();  
   
?>