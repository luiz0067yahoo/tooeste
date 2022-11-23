<?php 
    //$base_url="https://$_SERVER[HTTP_HOST]";
    if (!function_exists("random_banner")) {
        function random_banner($type_name)
		{
            $Foto="";
            $url="";
            $sql="SELECT anuncios.* FROM `anuncios` LEFT join tipos_anuncios on(id_tipo_anuncio=tipos_anuncios.id) where(tipos_anuncios.nome=:type_name)";
            $result=DAOquery($sql,array("type_name"=>$type_name),true,"");
        	$elements=$result["elements"];
        	$index=random_int(0, count($elements)-1);
        	$elements=[0=>$result["elements"][$index]];
            for($i=0;$i<count($elements);$i++)
            {
        		$element=$elements[$i];
                $Foto=$element["foto"];
                $foto_expandida=$element["foto_expandida"];
                $Nome=$element["nome"];
                if(file_exists($_SERVER["DOCUMENT_ROOT"]."/uploads/anuncio/800x600/".$Foto)){
            ?>
                <a href="https://tooeste.com.br/Patrocinador/<?php echo $Nome; ?>" class="d-flex w-100 height-parent" title="<?php echo $Nome; ?>"><img src="<?php echo "https://$_SERVER[HTTP_HOST]";?>/uploads/anuncio/800x600/<?php echo $Foto;?>" class="d-block w-100 h-100 modal_banner" alt="<?php echo $Nome;?>" fotoexpandida="<?php echo "https://$_SERVER[HTTP_HOST]";?>/uploads/anuncio/800x600/<?php echo $foto_expandida;?>" style="height:120px"></a>
            <?php
                }
            }
        }
    }
?>
<?php 
    if (!function_exists("banner")) {
        function banner($type_name)
		{
?>
<div  class="carousel slide w-100 h-100" data-bs-ride="carousel" >
  <div class="carousel-inner h-100">
<?php
    $Foto="";
    $url="";
    $sql="SELECT anuncios.* FROM `anuncios` LEFT join tipos_anuncios on(id_tipo_anuncio=tipos_anuncios.id) where(tipos_anuncios.nome=:type_name)";
    $result=DAOquery($sql,array("type_name"=>$type_name),true,"");
	$elements=$result["elements"];
    for($i=0;$i<count($elements);$i++){
		$element=$elements[$i];
        $Foto=$element["foto"];
        $foto_expandida=$element["foto_expandida"];
        $Nome=$element["nome"];
        try{
            if((isset($Foto))){
                if(file_exists($_SERVER["DOCUMENT_ROOT"]."/uploads/anuncio/800x600/".$Foto)){

            ?>
                <div class="carousel-item h-100 <?php if($i==0) echo "active" ?>">
                  <a href="https://tooeste.com.br/Patrocinador/<?php echo $Nome; ?>" class="d-flex w-100 height-parent" title="<?php echo $Nome; ?>"><img src="<?php echo "https://$_SERVER[HTTP_HOST]";?>/uploads/anuncio/800x600/<?php echo $Foto;?>" class="d-block w-100 modal_banner" alt="<?php echo $Nome;?>"  fotoexpandida="<?php echo "https://$_SERVER[HTTP_HOST]";?>/uploads/anuncio/800x600/<?php echo $foto_expandida;?>"></a>
                </div>
            <?php  
                }
            }
        }
        catch(Exception $e){
        }
    }
?>
  </div>
</div>
<?php 
        }
}
?>
<?php 
    if (!function_exists("mini_banner")) {
        function mini_banner($type_name)
		{
?>
<div  class="carousel slide w-100 h-100" data-bs-ride="carousel" >
  <div class="carousel-inner h-100">
<?php
  $Foto="";
    $url="";
    $sql="SELECT anuncios.* FROM `anuncios` LEFT join tipos_anuncios on(id_tipo_anuncio=tipos_anuncios.id) where(tipos_anuncios.nome=:type_name)";
    $result=DAOquery($sql,array("type_name"=>$type_name),true,"");
	$elements=$result["elements"];
    for($i=0;$i<count($elements);$i++){
		$element=$elements[$i];
        $Foto=$element["foto"];
        $foto_expandida=$element["foto_expandida"];
        $Nome=$element["nome"];
        try{
            if((isset($Foto))){
                if(file_exists($_SERVER["DOCUMENT_ROOT"]."/uploads/anuncio/160x120/".$Foto)){
            ?>
                <div class="carousel-item h-100 <?php if($i==0) echo "active" ?>">
                  <a href="https://tooeste.com.br/Patrocinador/<?php echo $Nome; ?>"  classname="d-flex w-100 height-parent" title="<?php echo $Nome; ?>"><img src="<?php echo "https://$_SERVER[HTTP_HOST]";?>/uploads/anuncio/160x120/<?php echo $Foto;?>" class="d-block w-100 modal_banner" alt="<?php echo $Nome;?>" style="height:120px;" fotoexpandida="<?php echo "https://$_SERVER[HTTP_HOST]";?>/uploads/anuncio/800x600/<?php echo $foto_expandida;?>"></a>
                </div>
            <?php 
                }
            }
        }
        catch(Exception $e){
        }
    }
?>
  </div>
</div>
<?php 
        }
}
?>
<?php 
    if (!function_exists("banner_scroll")) {
        function banner_scroll($tipo_nome)
		{
?>
	<div class="box_scroll" direct="left">
<?php
    $Foto="";
    $url="";
    $sql="SELECT anuncios.* FROM `anuncios` LEFT join tipos_anuncios on(id_tipo_anuncio=tipos_anuncios.id) where(tipos_anuncios.nome=:tipo_nome)";
    $result=DAOquery($sql,array("tipo_nome"=>$tipo_nome),true,"");
	$elements=$result["elements"];
    for($i=0;$i<count($elements);$i++){
		$element=$elements[$i];
        $Foto=$element["foto"];
        $foto_expandida=$element["foto_expandida"];
        $Nome=$element["nome"];
        try{
            if((isset($Foto))){
                if(file_exists($_SERVER["DOCUMENT_ROOT"]."/uploads/anuncio/160x120/".$Foto)){
            ?>
                <div class="item flex-wrap">
                    <h6 class="w-100 text-dark" style="min-height:20px;"><?php echo $Nome; ?></h6>            
                  <a  class="p-0" style="" href="https://tooeste.com.br/Patrocinador/<?php echo $Nome; ?>" title="<?php echo $Nome; ?>"><img src="<?php echo "https://$_SERVER[HTTP_HOST]";?>/uploads/anuncio/160x120/<?php echo $Foto;?>" class="d-block w-100 modal_banner "  style="height:120px;overflow:hidden;" fotoexpandida="<?php echo "https://$_SERVER[HTTP_HOST]";?>/uploads/anuncio/800x600/<?php echo $foto_expandida;?>"></a>
                </div>
            <?php             
                }
            }
        }
        catch(Exception $e){

        }
    }
?>
  </div>
<?php 
        }
}
?>
<?php 
    if (!function_exists("mini_banner_news")) {
        function mini_banner_news($tipo_nome,$size)
		{
?>
<div class="p-2 mt-3 w-100 d-flex flex-wrap justify-content-center" style="background-color:#eee;">
<?php
    $Foto="";
    $url="";
    $sql="SELECT anuncios.* FROM `anuncios` LEFT join tipos_anuncios on(id_tipo_anuncio=tipos_anuncios.id) where(tipos_anuncios.nome=:tipo_nome)";
    $result=DAOquery($sql,array("tipo_nome"=>$tipo_nome),true,"");
	$elements=[];
	$i=0;
	while($i<min($size,count($result["elements"]))){
    	$index=random_int(0, count($result["elements"])-1);
    	$element=$result["elements"][$index];
    	if(!in_array($element,$elements)){
    	   
        	array_push($elements,$element);
        	$i++;
    	}
	}
    for($i=0;$i<count($elements);$i++){
		$element=$elements[$i];
        $Foto=$element["foto"];
        $foto_expandida=$element["foto_expandida"];
        $Nome=$element["nome"];
        $intro=$element["introducao"];
        try{
            if((isset($Foto))){
                if(file_exists($_SERVER["DOCUMENT_ROOT"]."/uploads/anuncio/160x120/".$Foto)){            
            ?>
               
                  <a  class="m-2 p-0 " style="" href="https://tooeste.com.br/Patrocinador/<?php echo $Nome; ?>" title="<?php echo $Nome; ?>"><img src="<?php echo "https://$_SERVER[HTTP_HOST]";?>/uploads/anuncio/160x120/<?php echo $Foto;?>" class="d-block rounded"  style="width:120px;height:90px;" ></a>
               
            <?php             
                }
            }
        }
        catch(Exception $e){
        }
    }
?>
 </div> 
<?php 
        }
}
?>

<?php 
    if (!function_exists("mini_banner_news_line")) {
        function mini_banner_news_line($tipo_nome,$size)
		{
            $Foto="";
            $url="";
            $sql="SELECT anuncios.* FROM `anuncios` LEFT join tipos_anuncios on(id_tipo_anuncio=tipos_anuncios.id) where(tipos_anuncios.nome=:tipo_nome)";
            $result=DAOquery($sql,array("tipo_nome"=>$tipo_nome),true,"");
        	$elements=[];
        	$i=0;
        	while($i<min($size,count($result["elements"]))){
            	$index=random_int(0, count($result["elements"])-1);
            	$element=$result["elements"][$index];
            	if(!in_array($element,$elements)){
                	array_push($elements,$element);
                	$i++;
            	}
        	}
            for($i=0;$i<count($elements);$i++){
        		$element=$elements[$i];
                $Foto=$element["foto"];
                $descricao=$element["descricao"];
                $foto_expandida=$element["foto_expandida"];
                $Nome=$element["nome"];
                $intro=$element["introducao"];
                try{
                    if((isset($Foto))){
                        if(file_exists($_SERVER["DOCUMENT_ROOT"]."/uploads/anuncio/160x120/".$Foto)){                    
                    ?>
                    <a class="p-2 my-2 w-100 d-flex flex-wrap " style="background-color:#eee;" href="https://tooeste.com.br/Patrocinador/<?php echo $Nome; ?>" title="<?php echo $Nome; ?>">
                        <img src="<?php echo "https://$_SERVER[HTTP_HOST]";?>/uploads/anuncio/160x120/<?php echo $Foto;?>" class="m-2 p-0 d-block rounded"  style="width:120px;height:90px;" >
                        <div class="m-2">
                            <p style="text-decoration:none" class="text-secondary "><?php echo $intro?></p>
                            <p style="text-decoration:none" class="text-secondary"><?php echo $Nome;?></p>
                        </div>     
                    </a>
                    <?php             
                        }
                    }
                }
                catch(Exception $e){
                }
            }
        
            }
        }
?>
<?php 
    if (!function_exists("mini_banner_news_line_w100")) {
        function mini_banner_news_line_w100($tipo_nome,$size)
		{
            $Foto="";
            $url="";
            $sql="SELECT anuncios.* FROM `anuncios` LEFT join tipos_anuncios on(id_tipo_anuncio=tipos_anuncios.id) where(tipos_anuncios.nome=:tipo_nome)";
            $result=DAOquery($sql,array("tipo_nome"=>$tipo_nome),true,"");
        	$elements=[];
        	$i=0;
        	while($i<min($size,count($result["elements"]))){
            	$index=random_int(0, count($result["elements"])-1);
            	$element=$result["elements"][$index];
            	if(!in_array($element,$elements)){
            	    
                	array_push($elements,$element);
                	$i++;
            	}
        	}
            for($i=0;$i<count($elements);$i++){
        		$element=$elements[$i];
                $Foto=$element["foto"];
                $descricao=$element["descricao"];
                $foto_expandida=$element["foto_expandida"];
                $Nome=$element["nome"];
                $intro=$element["introducao"];
                try{
                    if((isset($Foto))){
                        if(file_exists($_SERVER["DOCUMENT_ROOT"]."/uploads/anuncio/800x600/".$Foto)){                    
                    ?>
                    <a class="p-2 my-2 w-100 d-flex flex-wrap " style="background-color:#eee;" href="https://tooeste.com.br/Patrocinador/<?php echo $Nome; ?>" title="<?php echo $Nome; ?>">
                        <img src="<?php echo "https://$_SERVER[HTTP_HOST]";?>/uploads/anuncio/800x600/<?php echo $Foto;?>" class="m-2 p-0 d-block w-100 rounded"  style="height:90px;" >
                    </a>
                    <?php             
                        }
                    }
                }
                catch(Exception $e){
        
                }
            }
        }
    }
?>