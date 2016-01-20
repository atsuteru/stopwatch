<?php
/**
 * ストップウォッチのコントローラー.
 * Maps URL
 * 		http://example.com/index.php/stopwatch
 */
class Stopwatch extends CI_Controller {

	/**
	 * 初期表示.
	 */
	public function index()
	{
		//ストップウォッチ画面を、ビューに出力
		$this->parser->parse(
				'stopwatch_welcome',
				array(
				)
				);
	}

	/**
	 * ストップウォッチを開始し、開始後のページを返却する.
	 * Maps URL
	 * 		http://example.com/index.php/stopwatch/start
	 */
	public function start()
	{
		//開始時刻を現在時刻から取得する
		$startTime = time();
	
		//開始時刻を取り出し、ビューに出力
		$this->parser->parse(
				'stopwatch_started',
				array(	'start_time'=>date('H:i:s', $startTime),
				)
				);
	}

	/**
	 * ストップウォッチの停止し、停止後のページを返却する.
	 * Maps URL
	 * 		http://example.com/index.php/stopwatch/stop
	 */
	public function stop()
	{
		//フォームデータの取得
		$startTime = $this->input->post('startTime');
		//ストップウォッチ計算機に開始・終了タイムをセット
		$this->load->model('stopwatch/stopwatch_calcurator','calcurator');
		$this->calcurator->setStartTimeInMillis(strtotime($startTime));
		$this->calcurator->setStopTimeInMillis(time());
	
		//ストップウォッチ計算機から結果を取り出し、ビューに出力
		$this->parser->parse(
				'stopwatch_stoped',
				array(	'start_time'=>date('H:i:s', $this->calcurator->getStartTimeInMillis()),
						'stop_time'=>date('H:i:s', $this->calcurator->getStopTimeInMillis()),
						'span_time'=>gmdate('H:i:s', $this->calcurator->getSpanTimeInMillis()),
				)
				);
	}
	
	/**
	 * ストップウォッチの停止.
	 * Maps URL
	 * 		http://example.com/index.php/stopwatch/stop/$startTime/$stopTime
	 * @param $startTime 開始時間
	 * @param $stopTime 停止時間
	 */
	public function calc($startTime=NULL, $stopTime=NULL)
	{
		//ストップウォッチ計算機に開始・終了タイムをセット
		$this->load->model('stopwatch/stopwatch_calcurator','calcurator');
		$this->calcurator->setStartTimeInMillis(strtotime($startTime));
		$this->calcurator->setStopTimeInMillis(strtotime($stopTime));
	
		//ストップウォッチ計算機から結果を取り出し、ビューに出力
		$this->parser->parse(
				'stopwatch_stoped', 
				array(	'start_time'=>date('H:i:s', $this->calcurator->getStartTimeInMillis()),
						'stop_time'=>date('H:i:s', $this->calcurator->getStopTimeInMillis()),
						'span_time'=>gmdate('H:i:s', $this->calcurator->getSpanTimeInMillis()),
				)
				);
	}
}
