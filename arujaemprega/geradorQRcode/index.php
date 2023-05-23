
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>QR code</title>
	<link rel="stylesheet" href="../assets/css/style_qr_code.css">	
</head>
<body>
    <div class="col-md-12" style="text-align: center;">
		<?php
			$aux = 'php/qr_img.php?' ;
			$aux .= 'd= http://servicosonline.prefeituradearuja.sp.gov.br/servicosonline/arujaemprega/&';
			$aux .= 'e= H&';
			$aux .= 's= 5&';
			$aux .= 't= p';
		?>
		
		<div class="desc">
			<img src="<?php echo $aux?>" class="qrcodee">
		</div>
    </div>
</body>
</html>