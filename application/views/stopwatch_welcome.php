<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ストップウォッチ</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>css/theme_basic.css">
</head>
<body>
	<div id="container">
		<h1>ストップウォッチ</h1>
		<div id="body">
			<p>ストップウォッチを開始してください.</p>
	
			<?=form_open('stopwatch/start')?>
				<?=form_fieldset()?>
					<?=form_submit('startButton','開始','id="startButton"')?>
				<?=form_fieldset_close()?>
			<?=form_close()?>
		</div>
		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
	</div>
</body>
</html>