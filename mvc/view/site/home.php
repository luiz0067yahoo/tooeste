<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
require_once($_SERVER['DOCUMENT_ROOT'].'/mvc/view/site/template.php');
$sql="  (  \n";
$sql.="   select \n";
$sql.=" noticias.id, \n";
$sql.=" noticias.destaque, \n";
$sql.=" noticias.foto_principal, \n";
$sql.=" noticias.titulo, \n";
$sql.=" noticias.subtitulo, \n";
$sql.=" concat(CAST(noticias.subtitulo AS CHAR(20) CHARACTER SET utf8),' ...') as mini_subtitulo, \n";
$sql.=" concat(CAST(noticias.conteudo_noticia AS CHAR(20) CHARACTER SET utf8),' ...') as intro, \n";
$sql.=" IF(filho.id_menu is null, concat(convertUrl(filho.nome),'/',convertUrl(noticias.titulo)), concat(convertUrl(pai.nome),'/',convertUrl(filho.nome),'/',convertUrl(noticias.titulo))) as url , \n";
$sql.=" IF(filho.id_menu is null, concat(convertUrl(filho.nome),'/',convertUrl(noticias.titulo)), concat(convertUrl(pai.nome),'/',convertUrl(filho.nome))) as menu_e_submenu, \n";
$sql.=" filho.nome as submenu, \n";
$sql.=" IF(filho.id_menu is null,filho.nome,pai.nome) as menu_principal \n";
$sql.=" from noticias \n";
$sql.=" left join menus filho on(filho.id=noticias.id_menu) \n";
$sql.=" left join menus pai  on (pai.id=filho.id_menu) \n"; 

$sql.=" where \n";
$sql.=" (noticias.destaque!=0) \n";
$sql.=" and \n";
$sql.=" (pai.id_menu is null) \n";
$sql.=" and((pai.id=:id)or(filho.id=:id)) \n";

$sql.="  union \n";
$sql.="   select \n";
$sql.=" noticias.id, \n";
$sql.=" noticias.destaque, \n";
$sql.=" noticias.foto_principal, \n";
$sql.=" noticias.titulo, \n";
$sql.=" noticias.subtitulo, \n";
$sql.=" concat(CAST(noticias.subtitulo AS CHAR(20) CHARACTER SET utf8),' ...') as mini_subtitulo, \n";
$sql.=" concat(CAST(noticias.conteudo_noticia AS CHAR(20) CHARACTER SET utf8),' ...') as intro, \n";
$sql.=" IF(filho.id_menu is null, concat(convertUrl(filho.nome),'/',convertUrl(noticias.titulo)), concat(convertUrl(pai.nome),'/',convertUrl(filho.nome),'/',convertUrl(noticias.titulo))) as url , \n";
$sql.=" IF(filho.id_menu is null, concat(convertUrl(filho.nome),'/',convertUrl(noticias.titulo)), concat(convertUrl(pai.nome),'/',convertUrl(filho.nome))) as menu_e_submenu, \n";
$sql.=" filho.nome as submenu, \n";
$sql.=" IF(filho.id_menu is null,filho.nome,pai.nome) as menu_principal \n";
$sql.=" from noticias \n";
$sql.=" left join menus filho on(filho.id=noticias.id_menu) \n";
$sql.=" left join menus pai  on (pai.id=filho.id_menu) \n"; 
$sql.=" where \n";
$sql.=" (noticias.destaque=0) \n";
$sql.=" and \n";
$sql.=" (pai.id_menu is null) \n";
$sql.=" and((pai.id=:id)or(filho.id=:id)) \n";
$sql.=" ) \n";
$sql.=" order by  id desc   \n";
$sql.=" limit 0 , 12 \n";
$result_home=array();
$GLOBALS["og_title"]="Tooeste";
$GLOBALS["og_description"]="Informação ao seu Alcance";
$GLOBALS["og_image"]="https://www.tooeste.com.br/assets/img/logo310x310.jpg";
$GLOBALS["og_url"]='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$path="noticias";
$prefix_news="/ler";
top();
for ($i = 1; $i <= 5; $i++) {
	$result_home[$i]=DAOquery($sql,array('id'=>$GLOBALS["menus"][$i-1]["id"]),true,null);
}
?>
<div class="row mt-2 justify-content-center">
	<div class="col-sm-9" ><div class="w-100 block-row-3 block-bg-3" ><div class="w-100 height-parent bg-menu-4" ><?php  include $_SERVER['DOCUMENT_ROOT']."/mvc/view/site/slide_show.php"?></div></div></div>
	

</div>
<div class="row mt-3 block-row-1">
    <div class="col-sm-12 h-100" >  
    	<div class="w-100 h-100 " ><?php banner_scroll("banner evento");?></div>
    </div>
</div>



<?php for ($j = 0; $j <= 2; $j++) {?>
<div class="row mt-3 block-row-2">
	<?php for ($i = 1; $i <= 3; $i++) {
	    $menu_index=$i;
	    $index=$j;
	    $elements_noticias=$result_home[$i]["elements"];
	    $menu_principal=""; 
	    $menu_e_submenu=""; 
	    $submenu="";
        $titulo=""; 
        $subtitulo=""; 
        $intro=""; 
        $url=""; 
        $foto_principal="";
        $destaque=0;//false;
	    if(count($elements_noticias)>$j){
            $element=$elements_noticias[$j];
			$menu_principal=(isset($element["menu_principal"])&& !empty($element["menu_principal"]))?$element["menu_principal"]:"";
			$menu_e_submenu=(isset($element["menu_e_submenu"])&& !empty($element["menu_e_submenu"]))?$element["menu_e_submenu"]:"";
			$titulo=(isset($element["titulo"])&& !empty($element["titulo"]))?$element["titulo"]:"";
			$subtitulo=(isset($element["subtitulo"])&& !empty($element["subtitulo"]))?$element["subtitulo"]:"";
			$intro=(isset($element["intro"])&& !empty($element["intro"]))?$element["intro"]:"";
			$url=(isset($element["url"])&& !empty($element["url"]))?$element["url"]:"";
			$foto_principal=(isset($element["foto_principal"])&& !empty($element["foto_principal"]))?$element["foto_principal"]:"";
			$submenu=(isset($element["submenu"])&& !empty($element["submenu"]))?$element["submenu"]:"";
			$destaque=(isset($element["destaque"])&& !empty($element["destaque"]))?$element["destaque"]:0;//false
		}
	    require($_SERVER['DOCUMENT_ROOT'].'/mvc/view/site/mini_news.php');
	}
	?>
	<div class="col-sm-3 pt-3 d-flex align-content-end flex-wrap " style="padding-bottom:60px;" >
		<div class="w-100 proportion-3x4 " ><?php banner("banner lateral ".(1+$j))?></div>
	</div>
</div>
<?php }?>
	    <div class="row mt-3 block-row-2">
        	<div class="col-sm-12 pt-3 d-flex align-content-end flex-wrap " >
        		<div class="w-100 proportion-5x1 " ><?php banner("banner meio noticia 1")?></div>
        	</div>
        </div>	  
<?php for ($j = 3; $j <= 5; $j++) {?>
<div class="row mt-3 block-row-2">
	<?php for ($i = 1; $i <= 3; $i++) {
	    $menu_index=$i;
	    $index=$j;
	    $elements_noticias=$result_home[$i]["elements"];
	    $menu_principal=""; 
	    $menu_e_submenu=""; 
	    $submenu="";
        $titulo=""; 
        $subtitulo=""; 
        $intro=""; 
        $url=""; 
        $foto_principal="";
        $destaque=0;//false;
	    if(count($elements_noticias)>$j){
            $element=$elements_noticias[$j];
			$menu_principal=(isset($element["menu_principal"])&& !empty($element["menu_principal"]))?$element["menu_principal"]:"";
			$menu_e_submenu=(isset($element["menu_e_submenu"])&& !empty($element["menu_e_submenu"]))?$element["menu_e_submenu"]:"";
			$titulo=(isset($element["titulo"])&& !empty($element["titulo"]))?$element["titulo"]:"";
			$subtitulo=(isset($element["subtitulo"])&& !empty($element["subtitulo"]))?$element["subtitulo"]:"";
			$intro=(isset($element["intro"])&& !empty($element["intro"]))?$element["intro"]:"";
			$url=(isset($element["url"])&& !empty($element["url"]))?$element["url"]:"";
			$foto_principal=(isset($element["foto_principal"])&& !empty($element["foto_principal"]))?$element["foto_principal"]:"";
			$submenu=(isset($element["submenu"])&& !empty($element["submenu"]))?$element["submenu"]:"";
			$destaque=(isset($element["destaque"])&& !empty($element["destaque"]))?$element["destaque"]:0;//false

		}
		require($_SERVER['DOCUMENT_ROOT'].'/mvc/view/site/mini_news.php');
	} ?>
	<div class="col-sm-3 pt-3 d-flex align-content-end flex-wrap " style="padding-bottom:60px;" >
		<div class="w-100 proportion-3x4 " ><?php banner("banner lateral ".(1+$j));?></div>
	</div>
</div>
<?php }?>
	    <div class="row mt-3 block-row-2">
        	<div class="col-sm-12 pt-3 d-flex align-content-end flex-wrap " >
        		<div class="w-100 proportion-5x1 " ><?php banner("banner meio noticia 2")?></div>
        	</div>
        </div>	  


<?php for ($j = 6; $j < 9; $j++) {?>
<div class="row mt-3 block-row-2">
	<?php for ($i = 1; $i <= 3; $i++) {

        $menu_index=$i;
	    $index=$j;
	    $elements_noticias=$result_home[$i]["elements"];
	    $menu_principal=""; 
	    $menu_e_submenu=""; 
	    $submenu="";
        $titulo=""; 
        $subtitulo=""; 
        $intro=""; 
        $url=""; 
        $foto_principal="";
        $destaque=0;//false;
	    if(count($elements_noticias)>$j){
            $element=$elements_noticias[$j];
			$menu_principal=(isset($element["menu_principal"])&& !empty($element["menu_principal"]))?$element["menu_principal"]:"";
			$menu_e_submenu=(isset($element["menu_e_submenu"])&& !empty($element["menu_e_submenu"]))?$element["menu_e_submenu"]:"";
			$titulo=(isset($element["titulo"])&& !empty($element["titulo"]))?$element["titulo"]:"";
			$subtitulo=(isset($element["subtitulo"])&& !empty($element["subtitulo"]))?$element["subtitulo"]:"";
			$intro=(isset($element["intro"])&& !empty($element["intro"]))?$element["intro"]:"";
			$url=(isset($element["url"])&& !empty($element["url"]))?$element["url"]:"";
			$foto_principal=(isset($element["foto_principal"])&& !empty($element["foto_principal"]))?$element["foto_principal"]:"";
			$submenu=(isset($element["submenu"])&& !empty($element["submenu"]))?$element["submenu"]:"";
			$destaque=(isset($element["destaque"])&& !empty($element["destaque"]))?$element["destaque"]:0;//false

		}
		require($_SERVER['DOCUMENT_ROOT'].'/mvc/view/site/mini_news.php');
	}
	?>
	<div class="col-sm-3 pt-3 d-flex align-content-end flex-wrap " style="padding-bottom:60px;" >
		<div class="w-100 proportion-3x4 " ><?php banner("banner lateral ".(1+$j));?></div>
	</div>
</div>
<?php }?>
	   

<?php 
	include $_SERVER['DOCUMENT_ROOT']."/mvc/view/site/most_views.php";

     foot();  
   
?>