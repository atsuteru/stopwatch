<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ストップウォッチの結果</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>css/theme_basic.css">
</head>
<body>
	<div id="container">
		<h1>ストップウォッチの結果</h1>
		<div id="body">
			<p>ストップウォッチの結果は次の通りです。</p>
	
			<code>
				開始: {start_time}<br/>
				停止: {stop_time}<br/>
				<b>時間: {span_time}</b>
			</code>
	
			<?=form_open('stopwatch')?>
				<?=form_fieldset()?>
					<?=form_submit('backButton','戻る','id="backButton"')?>
				<?=form_fieldset_close()?>
			<?=form_close()?>
		</div>
		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
	</div>
</body>
</html>