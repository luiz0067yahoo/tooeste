<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


    $indexIdMenu=0;
    $params=null;
    $sql="  select ";
    $sql.=" noticias_fotos.nome, ";
    $sql.=" noticias_fotos.foto  ";
    $sql.=" from  noticias_fotos ";
    $sql.=" where ";
    $sql.=" (noticias_fotos.id_noticia = :id_noticia) ";
    $sql.=" order by noticias_fotos.id desc ";
    $sql.=" limit 0 , 6";
    $params=array("id_noticia"=>$id_noticia);
	$result_slide_show=DAOquery($sql,$params,true,"");
	$elements= $result_slide_show["elements"];
?>
<div id="carouselExampleIndicators" class="carousel slide height-parent  " data-ride="carousel" style="overflow:hidden">   
  <ol class="carousel-indicators mb-0" >
    <?php for($i=0;$i<count($elements);$i++){ ?>
    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="<?php if($i==0) echo "active" ?>"></li>
    <?php } ?>
  </ol>
  <div class="carousel-inner height-parent ">
<?php 
    
   
        
    for($i=0;$i<count($elements);$i++){ 
        $element=$elements[$i];
        $foto=(isset($element["foto"])&& !empty($element["foto"]))?$element["foto"]:"";
        $nome=(isset($element["nome"])&& !empty($element["nome"]))?$element["nome"]:"";
        
       
       for ($menu_index = 1; $menu_index <= count($GLOBALS["menus"]); $menu_index++){
    		if($GLOBALS["menus"][$menu_index-1]["nome"]==$menu_principal)
    			break;
    	}

        
    ?>
    <div class="carousel-item <?php if($i==0) echo "active" ?> height-parent  bg-menu-<?php echo $menu_index; ?>">
      <div class="d-flex align-content-end flex-wrap " style="width:100%;height:100%;background: url('<?php echo $GLOBALS["base_url"];?>/uploads/noticias/800x600/<?php echo $foto;?>') no-repeat center  ; ">
          <h4 class="w-100 text-center pb-4 m-0 text-white" style="display: inline-block;text-shadow: 0px 0px 5px rgba(0,0,0,1);background-color:rgba(0,0,0,0.5)"> <?php echo $nome;?> </h4>
</div>
    
  
    
    </div>
    <?php } ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <?php if(count($elements)>1){ ?>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <?php }?>
</div>