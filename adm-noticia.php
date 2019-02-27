<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Adm-Noticia</title>

		<link rel="stylesheet" href="./css/bootstrap.css">
		<script src="./js/jquery.js"></script>
		<link rel="stylesheet" href="./css/rcrop.css" type="text/css" />
		<script src="./js/rcrop.js"></script>
		<script src="./js/bootstrap.js"></script>

		<script>
		$(document).ready(function(){
			$('#exampleModalCenter').on('shown.bs.modal', function () {
			  	$('#buttton').trigger('focus')
		  	});


		var $image = $("#target"),
			$update = $('#update'),
		    inputs = {
		        x : $('#x'),
		        y : $('#y'),
		        width : $('#w'),
		        height : $('#h')
		    },
		    fill = function(){
		        var values = $image.rcrop('getValues');
		        for(var coord in inputs){
		            inputs[coord].val(values[coord]);
		        }
		    };

			$image.rcrop({
				full:true,
			    preserveAspectRatio : true,
			    grid : true
			});

			$image.on('rcrop-changed rcrop-ready', fill);

			// Call resize method when button is clicked. And then fill inputs to fix invalid values.
			$update.click(function(){
				$image.rcrop('resize', inputs.width.val(), inputs.height.val(), inputs.x.val(), inputs.y.val());
			    fill();
			});

		});
		</script>
	</head>
	<body>
		<!-- Button trigger modal -->
		<button id="buttton"type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
		  Editar
		</button>

		<!-- Modal -->
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalCenterTitle">Editar Imagem</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
				<div class="image-wrapper">
			  		<img id="target" src="./img/noticia-def.jpg" class="col-12" style="margin:0;padding:0;" alt="">
				</div>

		      </div>
		      <div class="modal-footer">
				<form action="crop.php" method="post">
					<input type="" id="name_file" name="name_file" />
					<input type="hidden" id="x" name="x" />
					<input type="hidden" id="y" name="y" />
					<input type="hidden" id="w" name="w" />
					<input type="hidden" id="h" name="h" />
					<input type="submit" id='update' name="Action" value="Salvar" class="btn btn-large btn-inverse" />
					<input type="submit" name="Action" value="Cancelar" class="btn btn-large btn-inverse" />
				</form>
		      </div>
		    </div>
		  </div>
		</div>
	</body>
</html>
