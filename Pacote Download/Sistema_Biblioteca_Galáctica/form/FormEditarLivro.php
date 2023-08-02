<?php
include_once '../bd/EditoraDAO.php';
include_once '../bd/LivrosDAO.php';
$autorDAO = new AutorDAO ();
$listaAutores = $autorDAO->recuperarTodosAutores();

$editoraDAO = new EditoraDAO ();
$listaEditoras = $editoraDAO->recuperarTodasEditoras ();
$livrosDAO = new LivrosDAO ();
$id = $_GET ['id'];
$livro = $livrosDAO->pesquisarLivroPorCodigo ( $id );
$editora = $livro->getEditora ();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Editar Livro</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>
<body>
		<br>
	<h1 align="center">Alterar de Livro</h1>
	<br>
	<div class="container d-flex justify-content-center">
	<form class="row gy-2 gx-3 align-items-center" method="POST" action="../dados/AtualizarLivro.php" id="formEditarLivro">
					<input type="hidden" id="codigo" name="codigo" value="<?php echo $livro->getCodigo();?>"/>
			<div class="row g-3">
				<div class="col">
				    <label for="titulo">Título</label>
					<input type="text" class="form-control" name="titulo" id="titulo" maxLength="150" placeholder="* Título: " required value="<?=$livro->getTitulo()?>">
				</div>
			</div>

			<div class="row g-3">
				<div class="col">
					<label for="isbn">ISBN</label>
					<input type="text" class="form-control" name="isbn" id="isbn" maxLength="45" placeholder="* ISBN: " required value="<?=$livro->getIsbn()?>">
				</div>
				<div class="col">
					<label for="nPaginas">N. Páginas</label>
					<input type="text" class="form-control" name="nPaginas" id="nPaginas"  onkeypress="return isNumber(event)"
						minlength="2" maxLength="11" placeholder="* Núm. Páginas:" value="<?=$livro->getNPaginas()?>" required>
				</div>
				<div class="col">
					<label for="numEdicao">N. Edição</label>
					<input type="text" class="form-control" name="numEdicao"  id="numEdicao"  onkeypress="return isNumber(event)"
						minlength="1" maxLength="11" placeholder="* Núm. Edição:" value="<?=$livro->getNumEdicao()?>" required>
				</div>
			</div>
			<div class="row g-3">
				<div class="col-sm-2">
					<label for="anoPublicacao">Ano de publicação</label>
					<input type="text" class="form-control" name="anoPublicacao"  id="anoPublicacao"  onkeypress="return isNumber(event)"
						maxLength="4" minlength="4" placeholder="* Ano Publicação:" value="<?=$livro->getAnoPublicacao()?>" required>
				</div>
				<div class="col">
					<label for="EditoraEdicao">N. Edição</label>
					<select class="form-control form-select" name="editora" id="editora" >
						<?php
							for($i = 0; $i < count ( $listaEditoras ); $i ++) {
								$editora_checked = "";
								$umaEditora = $listaEditoras [$i];
								if($umaEditora->getCodigo() == $livro->getEditora()->getCodigo()){
									$editora_checked = 'selected';
								}
							?><option value="<?=$umaEditora->getCodigo()?>" <?=$editora_checked?>><?=$umaEditora->getNome()?></option>
						<?php
							}
						?>
					</select>
				</div>
			</div>

			<div class="row g-3">
				<label for="divAutores">Autor</label>
				<div class="input-group-text">
					<select id="autor" name="autor" class="form-control form-select">
						<?php
						foreach($listaAutores as $autor){
							$selected = "";
							if($livro->getAutor() != null){
								if($autor->getCodigo() == $livro->getAutor()->getCodigo()){
									$selected = "selected";
								}
							}
						?>
						  <option value="0">--SELECIONE UM AUTOR--</option> 
						  <?php } ?>
					</select>
					<button style="float: left" type="button" class="btn btn-outline-secondary" id="add">Add</button>
				</div>
			</div>

			<div class="container">
				<table class="table">
					<thead>
						<tr>
							<th>All <input type="checkbox" id="select-all"></th>
							<th>Autor Selecionado</th>
						</tr>
					</thead>
					<tbody>
						<tr>							
						</tr>
					</tbody>
				</table>				
				<button type="button" class="remove-row" id="remove-row">Remove</button>
			</div>
			
			<div class="container bg-light">
        			<div class="col-md-12 text-center">
					<input type="submit" value="Salvar" class="btn btn-primary">
					<button name="cancelar" onClick="JavaScript: window.history.back();" type="button" class="btn btn-primary">Cancelar</button>
				</div>
			</div>
		</form>



</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#add").click(function(){
				var autorId = $('#autor').find(":selected").val();
				var autor = $('#autor').find(":selected").text();
			$(".table tbody tr").last().after(
				'<tr>'+
					'<td><input type="checkbox" id="select-row"></td>'+
					'<td>'+autor+'</td>'+
					'<input type="hidden" name="autores[]" value="'+autorId+'" />' +
				'</tr>'
				);
			})

			$("#select-all").click(function(){
				var isSelect = $(this).is(":checked");
				if(isSelect){
					$(".table tbody tr").each(function(){
						$(this).find('input[type="checkbox"]').prop('checked', true);
					})
				}else{
					$(".table tbody tr").each(function(){
						$(this).find('input[type="checkbox"]').prop('checked', false);
					})
				}
			})
			
			$("#remove-row").click(function(){
				$(".table tbody tr").each(function(){
						var isChecked = $(this).find('input[type="checkbox"]').is(":checked");
						var tableSize = $(".table tbody tr").length;
						if(tableSize == 1){
							alert("Não é possivel remover todos os autores");
						}else if(isChecked){
							$(this).remove();
						}
					})
			})
		

		 $("#autor").select2({
		 	ajax: {
		 		url: "ajaxfile.php",
		 		type: "post",
		 		dataType: 'json',
		 		delay: 250,
		 		data: function (params) {
		 			return {
		 				searchTerm: params.term
		 			};
		 		},
		 		processResults: function (response) {
		 			return {
		 				results: response
					};
		 		},
		 		cache: true
		 	}
		 });

		})

	</script>
</body>

</html>
