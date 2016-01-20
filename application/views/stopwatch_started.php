<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ストップウォッチ計測中</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>css/theme_basic.css">
</head>
<body>
	<div id="container">
		<h1>ストップウォッチ計測中</h1>
		<div id="body">
			<p>ストップウォッチで計測しています...</p>
	
			<code>
				開始: {start_time}
			</code>
	
			<?=form_open('stopwatch/stop')?>
				<?=form_fieldset()?>
					<?=form_hidden('startTime', $start_time)?>
					<?=form_submit('stopButton','停止','id="stopButton"')?>
				<?=form_fieldset_close()?>
			<?=form_close()?>
		</div>
		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
	</div>
</body>
</html>