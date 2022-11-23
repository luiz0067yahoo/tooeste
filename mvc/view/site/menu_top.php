				<nav class="navbar navbar-expand-lg w-100 p-0">
					<div class="container-fluid p-0 align-items-stretch" >
						<a href="<?php echo $GLOBALS["base_url"];?>" title="Tooeste Informação ao seu alcance" class=" text-color-default pl-0 pr-2"  style="text-decoration:none;width:300px"><img  alt="Tooeste Informação ao seu alcance"  style="width:auto	;height:90px;"
        						src="<?php echo $GLOBALS["base_url"];?>/uploads/logo/320x240/<?php echo $GLOBALS["logo_site"];?>" 
        						title="Tooeste Informação ao seu alcance"
        					></a>
						<button id="abrir_menus" class="navbar-toggler collapsed rounded border border-dark position-absolute " style="right:5px;top:60px" type="button" >
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                            </svg>
						</button>
							<ul id="navbarNavDropdown" class="show navbar-nav navbar-collapse collapse  h5 text-center  w-100 align-items-stretch "style="min-height:0px" >
							<?php
                                $menus=array();
								$sql="select id,nome,convertUrl(nome) as nome_url from menus where (id_menu is :id_menu) and (nome!='home') and not(id is null)";
								$result_menu=DAOquery($sql,["id_menu"=>null],true,"");
								if (isset($result_menu["elements"])){
									$menus=$result_menu["elements"];
									$GLOBALS["menus"]=$menus;
								}
						        for($i=1;$i<=count($menus);$i++){
								    $menu_nome=$result_menu["elements"][$i-1]["nome"];
								    $menu_id=$result_menu["elements"][$i-1]["id"];
								    $nome_url=$result_menu["elements"][$i-1]["nome_url"];
								    $prefixo="/ler";
                                    if ((strtolower($menu_nome)=="fotos") or (strtolower($menu_nome)=="vídeos"))
                                        $prefixo="";
								?>
								<li class=" col nav-item  text-color-<?php echo $i; ?> "  style="padding-left: 0;padding-right: 0; min-width:<?php echo round(strlen($menu_nome)*11.3);?>px"  >
									
									<a id="menu<?php echo $i; ?>"   class="p-0 nav-link dropdown-toggle text-capitalize h-100 d-flex justify-content-center align-items-center" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $menu_nome;?></a>
									<?php
        								$sub_menus=array();
        								$sql="select id,nome,convertUrl(nome) as nome_url,tema,icone from menus where (id_menu = $menu_id)";
        								$result_sub_menu=DAOquery($sql,"",true,"");
        								if (isset($result_sub_menu["elements"])){
									?>
									<div style="<?php if($i==6) echo "left:-150px; min-width:340px;" ;?>" class="dropdown-menu bg-menu-<?php echo $i; ?> text-left text-uppercase " id="submenu<?php echo $i; ?>" aria-labelledby="menu<?php echo $i; ?>">
									    <?php
									        for($j=1;$j<=count($result_sub_menu["elements"]);$j++){
                                                $icone=$result_sub_menu["elements"][$j-1]["icone"];
                                                $sub_menu_nome=$result_sub_menu["elements"][$j-1]["nome"];
                                                $tema=$result_sub_menu["elements"][$j-1]["tema"];
                                                $sub_menu_nome_url=$result_sub_menu["elements"][$j-1]["nome_url"];
									    ?>
    										<a style="<?php if($i==6) echo "color:#000000;"?>" class="dropdown-item" href="<?php echo $GLOBALS["base_url"]?><?php echo $prefixo;?>/<?php echo $nome_url; ?>/<?php echo $sub_menu_nome_url;?>/">
    										    <?php if(isset($icone)){ ?><br><img src="<?php echo "https://$_SERVER[HTTP_HOST]";?>/uploads/menu/160x120/<?php echo $icone;?>" class="d-block rounded-circle w-25 square"  ><?php } ?>
    										    <?php echo $sub_menu_nome; ?>
    										    <?php if (isset($tema) && !empty($tema)){?>
    										        <br><b><?php echo $tema; ?></b>
    										    <?php } ?>
    										</a>
								        <?php }?>
									</div>
									<?php }?>
								</li>
								<?php }?>

							</ul>
					</div>
				</nav>
