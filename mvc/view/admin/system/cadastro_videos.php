<?php 
	require ($_SERVER['DOCUMENT_ROOT'].'/library/functions.php');
	verify();
	include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/templates/top.php');
?>
<div id="loader">
	<div class="loader"></div>
	<div class="progress progress-item" >
	  <div class="progress-bar" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width:0%">
	  </div>
	</div>
	<div class="progress progress-all" >
	  <div class="progress-bar" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width:0%">
	  </div>
	</div>
</div>
<br>
<div class="container">
	<h1>CADASTRO DE VÍDEOS</h1>
	<br>
	<br>
	<div class="row">
		<div class="sm-12">
			<form class="cadastro" id="cadastro_album" action="/server/videos" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="acao" value="">
				<div class="form-row align-items-center">
						<div class="input-group mb-3">
							<label class="sr-only" for="inlineFormInputGroupcodigo">codigo</label>
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fa fa-key" aria-hidden="true"></i>
								</div>
							</div>
							<input type="number" disabled data-bind="value:replyNumber" class="form-control" id="inlineFormInputGroupcodigo" placeholder="Código" name="id">
							<div class="input-group-append">								
								<button name="buscar" type="button" class="btn btn-primary buscarcampo buscarcodigo d-none"><i class="fa fa-search" aria-hidden="true"></i></button	>
							</div>
						</div>
						<div class="input-group mb-3">
							<label class="sr-only" for="inlineFormInputGroupalbum">album</label>
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fa fa-link" aria-hidden="true"></i>
								</div>
							</div>
							<select chave="id" valor="nome" modelo="album_videos" class="form-control selectAjax" id="inlineFormInputGroupalbum" placeholder="Album" name="id_album">
								<option value=""></option>
							<select>
							<div class="input-group-append">								
								<button name="buscar" type="button" class="btn btn-primary buscarcampo buscaralbum d-none"><i class="fa fa-search" aria-hidden="true"></i></button	>
							</div>
						</div>
						<div class="input-group mb-3">
							<label class="sr-only" for="inlineFormInputGroupnome">nome</label>
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fa fa-bars" aria-hidden="true"></i>
								</div>
							</div>
							<input type="text" class="form-control" id="inlineFormInputGroupnome" placeholder="Nome da Video" name="nome">
							<div class="input-group-append">								
								<button name="buscar" type="button" class="btn btn-primary buscarcampo buscarnome d-none"><i class="fa fa-search" aria-hidden="true"></i></button	>
							</div>
						</div>
						<div class="input-group mb-3">
							<label class="sr-only" for="inlineFormInputGroupVideo">Video</label>
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fa fa-bars" aria-hidden="true"></i>
								</div>
							</div>
							<input class="form-control" id="inlineFormInputGroupVideo" placeholder="Video do album" name="video" type="text">
							<input type="hidden" name="Video_formats" value="160x120,320x240,480x640,800x600,1024x768,1366x768">
							<input type="hidden" name="Video_path" value="album">
							<div class="input-group-append">								
								<button name="buscar" type="button" class="btn btn-primary buscarcampo buscarVideo d-none"><i class="fa fa-search" aria-hidden="true"></i></button	>
							</div>
						</div>
						<div class="input-group mb-3">
							<label class="sr-only" for="inlineFormInputGroupocultar">ocultar</label>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="ocultar" name="ocultar" value="true">
								<label class="form-check-label" for="ocultar">
									ocultar
								</label>
							</div>
						</div>
						
							
								<button name="novo" type="button" class="btn btn-dark novo"><i class="fa fa-sticky-note" aria-hidden="true"></i> Novo</button>      
								
								<button name="buscar" type="button" class="btn btn-primary buscar d-none"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
							
								<button name="salvar" type="button" class="btn btn-success salvar "><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button>    
							
								<button name="editar" type="button" class="btn btn-primary editar d-none"><i class="fa fa-edit " aria-hidden="true"></i> Editar</button>
								
								<button name="excluir" type="button" class="btn btn-danger excluir d-none"><i class="fa fa-times " aria-hidden="true"></i> Excluir</button>
								
								<button name="cancelar" type="button" class="btn btn-danger cancelar d-none"><i class="fa fa-ban " aria-hidden="true"></i> Cancelar</button>
								
						
				</div>
			</form>
			<br>
			<div class="alert alert-success mensagem_sucesso d-none" role="alert"></div>
			<div class="alert alert-danger mensagem_erro d-none" role="alert"></div>
			<div class="alert alert-info mensagem_informacao d-none" role="alert"></div>
			<br>
				<table class="table table-striped resultado_busca">
				<thead>
					<tr>
						<th>Código</th>
						<th>Código Album</th>
						<th>Album</th>
						<th>Nome</th>
						<th>Video</th>
						<th>Ocultar</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/templates/foot.php');?>
