<?php
//bota libraries/util
	if(isset($_POST['Action'])){
		if ($_POST['Action']=='Salvar')
		{
			$targ_w = $targ_h = 150;
			$jpeg_quality = 90;

			$src = './img/noticia-def.jpg';
			$img_r = imagecreatefromjpeg($src);
			$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

			imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
			$targ_w,$targ_h,$_POST['w'],$_POST['h']);

			header('Content-type: image/jpeg');
			imagejpeg($dst_r,null,$jpeg_quality);

			exit;
		}
	}
?>
