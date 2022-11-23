<?php
//$encoding = mb_internal_encoding(); 
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
require_once($_SERVER['DOCUMENT_ROOT'].'/mvc/view/site/template.php');

$indexIdMenu=0;

$sql="  select ";
$sql.=" noticias.id, ";
$sql.=" noticias.date_insert, ";
$sql.=" noticias.date_update, ";
$sql.=" noticias.foto_principal, ";
$sql.=" noticias.titulo, ";
$sql.=" noticias.subtitulo, ";
$sql.=" concat(CAST(noticias.conteudo_noticia AS CHAR(20) CHARACTER SET utf8),' ...') as intro,";
$sql.=" IF(filho.id_menu is null, concat(filho.nome,'/',noticias.titulo), concat(pai.nome,'/',filho.nome,'/',noticias.titulo)) as url,";
$sql.=" IF(filho.id_menu is null,filho.nome,pai.nome) as menu_principal,";
$sql.=" filho.nome as sub_menu, ";
$sql.=" noticias.conteudo_noticia, ";
$sql.=" noticias.fonte ";
$sql.=" from noticias ";
$sql.=" left join menus filho on(filho.id=noticias.id_menu) ";
$sql.=" left join menus pai  on (pai.id=filho.id_menu) "; 
$sql.=" where ";
$sql.=" (pai.id_menu is null) ";
$sql.=" and ";
$sql.=" ( ";
$sql.=" ((pai.nome like :ler_menu)and(filho.nome like :ler_sub_menu)and(noticias.titulo like :ler_titulo_noticia)) ";
$sql.=" or ";
$sql.=" ((filho.nome like :ler_menu)and(noticias.titulo like :ler_titulo_noticia)) ";
$sql.=" ) ";
$sql.=" limit 0 , 1";

$findSub_menu=simbolTo_($GLOBALS['ler_sub_menu']);
$findMenu=simbolTo_($GLOBALS['ler_menu']);
$findTituloNoticia=simbolTo_($GLOBALS['ler_titulo_noticia']);
$result=DAOquery($sql,['ler_menu'=>$findMenu,'ler_sub_menu'=>$findSub_menu,'ler_titulo_noticia'=>$findTituloNoticia],true,"");
$i=0;
$elements=$result["elements"];



$id_noticia="";
$titulo="";
$subtitulo="";
$foto_principal="";
$conteudo_noticia="";
$fonte="";
$menu_principal="";


$GLOBALS["og_title"]="Tooeste";
$GLOBALS["og_description"]="Informação ao seu Alcance";
$GLOBALS["og_image"]=$GLOBALS["base_url"]."/uploads/menu/320x240/".$GLOBALS["logo_site"];
$GLOBALS["og_url"]='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$path="noticias";
if(count($elements)>0){
	$element=$result["elements"][$i];


	$id_noticia=$element["id"];
	$date_insert=$element["date_insert"];
	$date_update=$element["date_update"];
	$titulo=$element["titulo"];
	$subtitulo=$element["subtitulo"];
	$foto_principal=(isset($element["foto_principal"])&& !empty($element["foto_principal"]))?$element["foto_principal"]:"";
	$conteudo_noticia=$element["conteudo_noticia"];
	$fonte=$element["fonte"];
	$menu_principal=$element["menu_principal"];
    $detaque=false;
	$GLOBALS["og_title"]="Tooeste - ".$titulo;
	$GLOBALS["og_description"]=$subtitulo;
	$GLOBALS["og_image"]=$GLOBALS["base_url"]."/uploads/noticias/800x600/".$foto_principal;
	$GLOBALS["og_url"]='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	DAOquery("UPDATE `noticias` SET acesso=1 WHERE (acesso is null) and (id=:id)",["id"=>$id_noticia],false,"");
	DAOquery("UPDATE `noticias` SET acesso=acesso+1 WHERE id=:id",["id"=>$id_noticia],false,"");
}
top();
if(count($elements)>0){
	for ($menu_index = 1; $menu_index <= count($GLOBALS["menus"]); $menu_index++){
		if($GLOBALS["menus"][$menu_index-1]["nome"]==$menu_principal)
			break;
	}
?>
<div class="row mt-3">
    <div class="col-sm-12 h-100" >
        <div class=" text-center menu<?php echo $menu_index;?>"><p class="bg-menu-<?php echo $menu_index;?> p-1 h6 text-uppercase text-white"><?php echo myUrlDecode($GLOBALS["ler_menu"]);?> - <?php  if($GLOBALS["ler_sub_menu"]!="") echo myUrlDecode($GLOBALS["ler_sub_menu"]); ?></p></div>
		<div class="menu<?php echo $menu_index;?>"><p class="text-color-<?php echo $menu_index;?> h4 text-center"><?php echo upper_case_acent($titulo); ?></p></div>
		<br>
		<div class=" menu<?php echo $menu_index;?>"><p class="text-muted h6 text-center "><?php echo upper_case_acent($subtitulo); ?></p></div>
    </div>
</div>

<div class="row  pt-3 justify-content-center">
	<div class="col-sm-9" >
	    <div class="row py-0  block-row-3">
            <div class="col-sm-12 ">
        		<img class="w-100" src="<?php echo $GLOBALS["base_url"];?>/uploads/noticias/800x600/<?php echo $foto_principal;?>">
        	</div>  
	    </div>
	</div>
</div>	




<div class="row mt-3  ">
	<div class="col-sm-12" >
	    <div class="row py-0 block-row-3">
            <div class="col-sm-12 " >
                    <?php mini_banner_news_line_w100("noticias abaixo linha comprida",3);?><!--linha inteira-->
        			<p class="w-100 text-color-<?php echo $menu_index;?> "><?php echo $conteudo_noticia;?></p>
				
        	</div>  
	    </div>
	</div>
</div>	

<hr>


<div class="row mt-3 block-row-1">
    <div class="col-sm-12">
       	<?php if(isset($id_noticia) && !empty($id_noticia)) include $_SERVER['DOCUMENT_ROOT']."/mvc/view/site/news_attachments.php"?>
	</div>
</div>	    


<div class="row mt-3  ">
	<div class="col-sm-12" >
	    <div class="row py-0 block-row-1">
            <div class="col-sm-12 " >
				 <div class="row py-0  block-row-3">
                    <div class="col-sm-12 proportion-9x16"  >
                        <div class="w-100 height-parent"  >
                		     <?php include "slide_show_news.php"?> 
                	    </div>  
                	</div>  
        	   </div>
        	</div>  
	    </div>
	</div>
</div>	




<div class="row mt-3 block-row-1">
	<div class="col-sm-12" >
	    <div class="row py-0  block-row-1">
            <div class="col-sm-12 height-parent" >
        			<p class="text-dark h5">Fonte: <?php echo $fonte;?></p>
        			<p class="text-dark h5">Data: <?php echo (new DateTime($date_update))->format('d/m/Y')?></p>
        	</div>  
	    </div>
	</div>
</div>	    



<div class="row  pt-3">
	<div class="col-sm-12" >
	   

	    <div class="row py-0  ">
	        <?php mini_banner_news_line("noticias abaixo linha",6);?>
	    </div>   
	    <!--<div class="row py-0  ">
	        <?php mini_banner_news("noticias abaixo mini quadrados",6);?>
	    </div>-->
	</div>
</div>	


<?php 
}
else include  $_SERVER['DOCUMENT_ROOT']."/mvc/view/site/content_404.php";
	include $_SERVER['DOCUMENT_ROOT']."/mvc/view/site/most_views.php";
     foot();  
   
?>