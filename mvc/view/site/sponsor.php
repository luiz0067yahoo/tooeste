<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
require_once($_SERVER['DOCUMENT_ROOT'].'/mvc/view/site/template.php');


$indexIdMenu=0;

$sql="  SELECT anuncios.* FROM anuncios LEFT join tipos_anuncios on(id_tipo_anuncio=tipos_anuncios.id) where(anuncios.nome=:ler_sub_menu)  limit 0 , 1";

$findNome=simbolTo_($GLOBALS['ler_sub_menu']);

$result=DAOquery($sql,['ler_sub_menu'=>$findNome],true,"");
$i=0;
$elements=$result["elements"];

$nome_anuncio="";
$descricao="";
$foto_expandida="";
$fonte="";
$menu_principal="";
$intro="";
$id_anuncio=0;




$GLOBALS["og_title"]="Tooeste";
$GLOBALS["og_description"]="Informação ao seu Alcance";
$GLOBALS["og_image"]=$GLOBALS["base_url"]."/uploads/menu/320x240/".$GLOBALS["logo_site"];
$GLOBALS["og_url"]='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if(count($elements)>0){
	$element=$result["elements"][$i];


	$id_anuncio=$element["id"];
	$date_insert=$element["date_insert"];
	$date_update=$element["date_update"];
	$nome_anuncio=$element["nome"];
	$intro=$element["introducao"];  
	$intro2=$element["introducao2"];  
	$descricao=$element["descricao"];
	$facebook=$element["facebook"];  
	$twitter=$element["twitter"];  
	$youtube=$element["youtube"];  
	$instagram=$element["instagram"];  
	$whatsapp=$element["whatsapp"];  
	$endereco=$element["endereco"]; 
	$telefone=$element["telefone"]; 
	$e_mail=$element["e_mail"]; 
	$website=$element["website"]; 
	
	$foto_expandida=(isset($element["foto_expandida"])&& !empty($element["foto_expandida"]))?$element["foto_expandida"]:"";
	$foto=(isset($element["foto"])&& !empty($element["foto"]))?$element["foto"]:"";

 
        
	$GLOBALS["og_title"]="Tooeste - ".$nome_anuncio;
	$GLOBALS["og_description"]="";
	$GLOBALS["og_image"]=$GLOBALS["base_url"]."/uploads/anuncio/800x600/".$foto_expandida;
	$GLOBALS["og_url"]='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	//DAOquery("UPDATE noticias SET acesso=acesso+1 WHERE id=:id",["id"=>$id_noticia],false,"");

}
top();
if(count($elements)>0){
	for ($menu_index = 1; $menu_index <= count($GLOBALS["menus"]); $menu_index++){
		if($GLOBALS["menus"][$menu_index-1]["nome"]==$menu_principal)
			break;
	}
?>
<?php if(isset($nome_anuncio)&&!empty($nome_anuncio)) {?>
<div class="row mt-3">
	<div class="col-sm-12" >
        <div class="  text-color-<?php echo $menu_index;?>"  ><p class=" p-1 h2 text-uppercase text-center"><?php echo $nome_anuncio ;?></p></div>
	</div>
</div>	
<?php } ?>
<?php if(isset($intro)&&!empty($intro)) {?>
<div class="row mt-3 ">
    <div class="col-sm-12 h-100" >
		<h3 class="w-100 text-color-<?php echo $menu_index;?> text-center"><?php echo $intro;?></h3>
	</div>
</div>
<?php } ?>
<?php if(isset($intro2)&&!empty($intro2)) {?>
<div class="row mt-3 ">
    <div class="col-sm-12 h-100" >
		<h3 class="w-100 text-color-<?php echo $menu_index;?> text-center"><?php echo $intro2;?></h3>
	</div>
</div>
<?php } ?>
<?php if(isset($descricao)&&!empty($descricao)) {?>
<div class="row mt-3 ">
    <div class="col-sm-12 h-100" >
		<p class="w-100 text-color-<?php echo $menu_index;?> "><?php echo $descricao;?></div>
	</div>
</div>
<?php } ?>
<?php if(isset($foto_expandida)&&!empty($foto_expandida)) 
if(file_exists($_SERVER["DOCUMENT_ROOT"]."/uploads/anuncio/800x600/".$foto_expandida)){
?>
<div class="row mt-3 justify-content-center">
	<div class="col-sm-9 " >
		<img class="w-100" src="<?php echo $GLOBALS["base_url"];?>/uploads/anuncio/800x600/<?php echo $foto_expandida;?>">
	</div>
</div>
<?php } 

    include $_SERVER['DOCUMENT_ROOT']."/mvc/view/site/social_media.php";
	include $_SERVER['DOCUMENT_ROOT']."/mvc/view/site/sponsor_photos.php";
	include $_SERVER['DOCUMENT_ROOT']."/mvc/view/site/sponsor_attachments.php";

}
else include  $_SERVER['DOCUMENT_ROOT']."/mvc/view/site/content_404.php";

	include $_SERVER['DOCUMENT_ROOT']."/mvc/view/site/most_views.php";
    foot();  
   
?>