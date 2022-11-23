<?php 
	require ($_SERVER['DOCUMENT_ROOT'].'/library/functions.php');
	verify();
	include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/templates/top.php');
?><div id="loader">
	<div class="loader"></div>
</div>

<br>
<div class="container">
	<h1>CADASTRO DE MENUS</h1>
	<br>
	<br>
	<div class="row">
		<div class="sm-12">
			<form method="POST">
				<input type="hidden" name="acao" value="">
				<div class="form-row align-items-center">
						<label class="w-100" for="inlineFormInputGroupcodigo">Código</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<div class="input-group-text  h-100">
									<i class="fa fa-key" aria-hidden="true"></i>
								</div>
							</div>
							<input type="number" :disabled="state!='edit'" class="form-control " v-model="elementCurrent.id"  data-bind="value:replyNumber" class="form-control" id="inlineFormInputGroupcodigo" placeholder="Código" name="id">
							<div class="input-group-append">								
								<button name="buscar" @click="findById(elementCurrent.id)" type="button" class="btn btn-primary buscarcampo buscarcodigo d-none"><i class="fa fa-search" aria-hidden="true"></i></button	>
							</div>
						</div>
						
						<label class="w-100" for="inlineFormInputGroupmenu">Menu</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<div class="input-group-text h-100">
									<i class="fa fa-link" aria-hidden="true"></i>
								</div>
							</div>
							<select chave="id" valor="nome" modelo="menus" class="form-control selectAjax" id="inlineFormInputGroupmenu" placeholder="Menu Pai" name="id_menu" >
								<option value=""></option>
							<select>
							<div class="input-group-append">								
								<button name="buscar" type="button" class="btn btn-primary buscarcampo buscarmenu d-none"><i class="fa fa-search" aria-hidden="true"></i></button	>
							</div>
						</div>
						
						<label class="w-100" for="inlineFormInputGroupnome">Nome</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<div class="input-group-text h-100">
									<i class="fa fa-bars" aria-hidden="true"></i>
								</div>
							</div>
							<input type="text" class="form-control" v-model="elementCurrent.nome" id="inlineFormInputGroupnome" placeholder="Nome do menu" name="nome">
							<div class="input-group-append">								
								<button name="buscar" @click="findByFieldValue('nome',elementCurrent.nome)" type="button" class="btn btn-primary buscarcampo buscarnome d-none"><i class="fa fa-search" aria-hidden="true"></i></button	>
							</div>
						</div>
						<label class="w-100" for="inlineFormInputGroupocultar">Ocultar</label>
						<div class="input-group mb-3">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="ocultar" name="ocultar" value="true">
								<label class="form-check-label" for="ocultar">
									ocultar
								</label>
							</div>
						</div>
						
									
					<button v-if="state=='default'"  @click="clearMsg(); state='new'" name="novo" type="button" class="btn btn-dark novo"><i class="fa fa-sticky-note" aria-hidden="true"></i> Novo</button>      
					
					<button v-if="state=='new'" @click="findAllElements(); state='find'" name="buscar" type="button" class="btn btn-primary buscar "><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
				
					<button v-if="state=='default'||state=='new'||state=='edit'||state=='find'" @click="saveElement(); clearMsg();"name="salvar" type="button" class="btn btn-success salvar "><i class="fa fa-save" aria-hidden="true"></i> Salvar</button>    
				
					<button v-if="state=='findById'" @click=" state='edit';" name="editar" type="button" class="btn btn-primary editar "><i class="fa fa-edit " aria-hidden="true"></i> Editar</button>
					
					<button  v-if="state=='edit'" @click="deleteElement(elementCurrent.id);" name="excluir" type="button" class="btn btn-danger excluir "><i class="fa fa-times " aria-hidden="true"></i> Excluir</button>
							
					<button v-if=" state=='new'||state=='edit'||state=='find'" @click="clearMsg(); state='default'; elements=[]"name="cancelar" type="button" class="btn btn-danger cancelar "><i class="fa fa-ban " aria-hidden="true"></i> Cancelar</button>
								
					
						
				</div>
			</form>
			<br>
			<div class="alert alert-success  d-none" role="alert">{{successMsg}}</div>
			<div class="alert alert-danger  d-none" role="alert">{{errorMsg}}</div>
			<div class="alert alert-info  d-none" role="alert">{{infoMsg}}</div>
			<br>
				<table class="table table-striped resultado_busca">
				<thead>
					<tr>
						<th>Código</th>
						<th>Código Menu</th>
						<th>Menu Pai</th>
						<th>Nome</th>
						<th>Ocultar</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				<tr v-for="element in elements">
						<form class="crud" id="cadastro_menu" action="http://localhost/agencia/server/estados" method="POST">
							<td><input type="hidden" name="id" v-model="element.id" >{{element.id}}</td>
							<td>{{element.nome}}</td>
							<td>						
								<button @click="findById(element.id)" name="editar" type="button" class="btn btn-primary minieditar  btn-sm"><i class="fa fa-edit " aria-hidden="true"></i>
								<button @click="deleteElement(element.id)" name="excluir" type="button" class="btn btn-danger miniexcluir  btn-sm"><i class="fa fa-times " aria-hidden="true"></i></button>
							</td>
						</form>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>		
<script>
	
	var app = new Vue({
		el: '#app',
		data: {
			errorMsg: "",
			successMsg: "",
			infoMsg: "",
			showAddModal: false,
			showEditModal: false,
			showDeleteModal: false,
			state:'default',
			serverUrl:'https://tooeste.com.br/server/menus',
			elements: [],
			elementCurrent: { id: "", nome: ""},
		},
		mounted: function() {
			//this.findAllElements();
		},
		methods: {
			findByFieldValue(field,value) {
				var params="?"+field+"="+value;
				axios.get(app.serverUrl+params).then(function(response) {
					if (response.data.error) {
						app.errorMsg = response.data.message;
					} else {
						app.elements = response.data.elements;
					}
				});
			},
			findById(id) {
				if ((id!=null) && (id!=undefined)  && (id.length!=0) )
				axios.get(app.serverUrl+"/"+id).then(function(response) {
					if (response.data.error) {
						app.errorMsg = response.data.message;
					} else {
						app.elementCurrent = response.data.elements[0];
					}
				});
				app.state='findById';
			},
			findAllElements() {
				var params="?"+(new URLSearchParams(app.elementCurrent).toString());
				axios.get(app.serverUrl+params).then(function(response) {
					if (response.data.error) {
						app.errorMsg = response.data.message;
					} else {
						app.elements = response.data.elements;
					}
				});
			},
			saveElement() {
				var formData = app.toFormData(app.elementCurrent);
				axios.post(app.serverUrl, formData).then(function(response) {
					app.elementCurrent = {id:"", nome: ""};
					if (response.data.error) {
						app.errorMsg = response.data.message;
					} else {
						app.successMsg = response.data.message;
						app.findAllElements();
					}
				}).catch((error) => {
					console.log(error);
					return error;
				});
			},

			
			deleteElement(id) {
				axios.delete(app.serverUrl+"/"+id).then(function(response) {
					app.currentElement = {};
					if (response.data.error) {
						app.errorMsg = response.data.message;
					} else {
						app.successMsg = response.data.message;
						app.findAllElements();
					}
				});
			},

			toFormData(obj) {
				var fd = new FormData();
				for (var i in obj) {
					fd.append(i, obj[i]);
				}
				return fd;
			},
			selectElement(element) {
				app.currentElements = element;
			},
			clearMsg() {
				app.errorMsg = "";
				app.successMsg = "";
			}
		}
	});
	
	
	
</script>
<?php include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/templates/foot.php');?>
