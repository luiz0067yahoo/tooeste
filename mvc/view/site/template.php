<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
//  error_reporting(E_ALL);

    require($_SERVER['DOCUMENT_ROOT'].'/library/functions.php');
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/site/banner.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/mvc/view/site/columnist.php');


	$result_config=DAOquery($sql="SELECT * FROM config order by id desc limit 0,1;",[],true,"");
	$elements_config=(isset($result_config) && !empty($result_config) && is_array($result_config)&&isset($result_config["elements"]) && !empty($result_config["elements"]) && is_array($result_config["elements"]))?$result_config["elements"]:null;
    $GLOBALS["logo_site"]="";
    $GLOBALS["mensagem_contato"]="Seu contato foi enviado com sucesso.";
    if(is_array($elements_config)){
        foreach($elements_config as $config){
            if(
                isset($config)
                && 
                !empty($config)
                && 
                is_array($config)
            ){
                if( 
                    isset($config["logo"])
                    && 
                    !empty($config["logo"])
                ){
                    $GLOBALS["logo_site"]=$config["logo"];        
                }
                if( 
                    isset($config["logo"])
                    && 
                    !empty($config["logo"])
                ){
                    $GLOBALS["mensagem_contato"]=$config["mensagem_contato"];        
                }
            }
        }
        
    }
	function top(){ 
?><!doctype html>
<html lang="pt_BR">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<title><? echo $GLOBALS["og_title"]." - ".$GLOBALS["og_description"];?> </title>
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $GLOBALS["base_url"];?>/uploads/logo/320x240/<?php echo $GLOBALS["logo_site"];?>">
	<meta name="description" content="<?php echo $GLOBALS["og_description"];?>">
	<meta property="og:image"              content="<?php echo $GLOBALS["og_image"];?>" />
	<meta property="og:url"                content="<?php echo $GLOBALS["og_url"];?>" />
	<meta property="og:type"               content="article" />
	<meta property="og:title"              content="<?php echo $GLOBALS["og_title"]?>" />
	<meta property="og:description"        content="<?php echo $GLOBALS["og_description"];?>" />

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $GLOBALS["base_url"];?>/assets/css/simpleLightbox.css" >
	<link rel="stylesheet" href="<?php echo $GLOBALS["base_url"];?>/assets/css/tooeste.css" >

    <link rel="stylesheet" href="<?php echo $GLOBALS["base_url"];?>/assets/css/fonts.css" type="text/css" charset="utf-8" />
	<meta name="theme-color" content="#fafafa">
</head>

<body  style="overflow-x:hidden">


	<header class="bg-white">
		<nav class="row bg-primary  py-0 mx-0">
			<div class="container" >
                  <nav class=" d-flex bg-primary justify-content-between  align-items-center ">
                    <div class="d-flex" >
                          <a class="link_top" href="http://m.me/tooeste" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                            </svg>
                          </a>
                          <a class="link_top" href="https://wa.me/5545998472907?text=Bom%20dia%20equipe%20Tooeste%20gostaria%20de%20fazer%20um%20an%C3%BAncio.">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                              <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                            </svg>
                          </a>
                          <a class="link_top px-2" href="https://tooeste.com.br/contato" style="width:80px">
                              Contato
                          </a>
                          
                    </div>
                    <div class="d-flex  flex-nowrap" >
                     
                    </div>
                    <div class="d-flex align-items-center justify-content-end" style="overflow: hidden;">
                        <a class="link_top" href="https://www.tempo.com/toledo_parana-l116233.htm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-sun-fill" viewBox="0 0 16 16">
                              <path d="M11.473 11a4.5 4.5 0 0 0-8.72-.99A3 3 0 0 0 3 16h8.5a2.5 2.5 0 0 0 0-5h-.027z"/>
                              <path d="M10.5 1.5a.5.5 0 0 0-1 0v1a.5.5 0 0 0 1 0v-1zm3.743 1.964a.5.5 0 1 0-.707-.707l-.708.707a.5.5 0 0 0 .708.708l.707-.708zm-7.779-.707a.5.5 0 0 0-.707.707l.707.708a.5.5 0 1 0 .708-.708l-.708-.707zm1.734 3.374a2 2 0 1 1 3.296 2.198c.199.281.372.582.516.898a3 3 0 1 0-4.84-3.225c.352.011.696.055 1.028.129zm4.484 4.074c.6.215 1.125.59 1.522 1.072a.5.5 0 0 0 .039-.742l-.707-.707a.5.5 0 0 0-.854.377zM14.5 6.5a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                                </svg> 
                        </a>
                        <a class="link_top" style="width:90px" ><?php echo date('d/m/Y');?></a>
                     <div id="form_desktop" >
                            <?php include ($_SERVER['DOCUMENT_ROOT']."/mvc/view/site/form_search.php");?>
                      </div>
                    </div>
                  </nav>
			</div>
			<div id="form_mobile" class=" w-100 justify-content-center d-none">
			    <?php include ($_SERVER['DOCUMENT_ROOT']."/mvc/view/site/form_search.php");?>
			</div>
		</nav>
		<?php include ($_SERVER['DOCUMENT_ROOT']."/mvc/view/site/menu_top.php");?>
	</header>


	<?php if (isset($GLOBALS['ler_menu']) &&(($GLOBALS['ler_menu']!="Patrocinador")&&($GLOBALS['ler_menu']!="contato"))) {?><div class="w-100  proportion-3x1" ><?php random_banner("banner abaixo do menu");?></div><?php } ?>

	<div  class="container">

	
	
  
<?php } 
function foot(){ ?>
		
	    <div class="row mt-3 block-row-1">
			
			<div class="col-sm-12 h-100" >  
				<div class="w-100 h-100 " ><?php columnist();?></div>
			</div>
		</div>


	<?php  if (isset($GLOBALS['ler_menu']) &&(($GLOBALS['ler_menu']!="Patrocinador")&&($GLOBALS['ler_menu']!="contato")))  {?>	
	    <div class="row mt-3 block-row-1">
			
			<div class="col-sm-12 h-100" >  
				<div class="w-100 h-100 " ><?php if (isset($GLOBALS['ler_menu']) &&(($GLOBALS['ler_menu']!="Patrocinador")&&($GLOBALS['ler_menu']!="contato")))  banner_scroll("banner mini rotativo");?></div>
			</div>
		</div>
	<?php } ?>
	
		
	

	</div>
	<?php include ($_SERVER['DOCUMENT_ROOT']."/mvc/view/site/menu_foot.php");?>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script src="<?php echo $GLOBALS["base_url"];?>/assets/js/simpleLightbox.js" ></script>
  <script src="<?php echo $GLOBALS["base_url"];?>/assets/js/tooeste.js" ></script>
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>
<?php } ?>