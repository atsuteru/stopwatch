<?php
/**
 * �X�g�b�v�E�H�b�`�̃R���g���[���[.
 * Maps URL
 * 		http://example.com/index.php/stopwatch
 */
class Stopwatch extends CI_Controller {

	/**
	 * �����\��.
	 */
	public function index()
	{
		//�X�g�b�v�E�H�b�`��ʂ��A�r���[�ɏo��
		$this->parser->parse(
				'stopwatch_welcome',
				array(
				)
				);
	}

	/**
	 * �X�g�b�v�E�H�b�`���J�n���A�J�n��̃y�[�W��ԋp����.
	 * Maps URL
	 * 		http://example.com/index.php/stopwatch/start
	 */
	public function start()
	{
		//�J�n���������ݎ�������擾����
		$startTime = time();
	
		//�J�n���������o���A�r���[�ɏo��
		$this->parser->parse(
				'stopwatch_started',
				array(	'start_time'=>date('H:i:s', $startTime),
				)
				);
	}

	/**
	 * �X�g�b�v�E�H�b�`�̒�~���A��~��̃y�[�W��ԋp����.
	 * Maps URL
	 * 		http://example.com/index.php/stopwatch/stop
	 */
	public function stop()
	{
		//�t�H�[���f�[�^�̎擾
		$startTime = $this->input->post('startTime');
		//�X�g�b�v�E�H�b�`�v�Z�@�ɊJ�n�E�I���^�C�����Z�b�g
		$this->load->model('stopwatch/stopwatch_calcurator','calcurator');
		$this->calcurator->setStartTimeInMillis(strtotime($startTime));
		$this->calcurator->setStopTimeInMillis(time());
	
		//�X�g�b�v�E�H�b�`�v�Z�@���猋�ʂ����o���A�r���[�ɏo��
		$this->parser->parse(
				'stopwatch_stoped',
				array(	'start_time'=>date('H:i:s', $this->calcurator->getStartTimeInMillis()),
						'stop_time'=>date('H:i:s', $this->calcurator->getStopTimeInMillis()),
						'span_time'=>gmdate('H:i:s', $this->calcurator->getSpanTimeInMillis()),
				)
				);
	}
	
	/**
	 * �X�g�b�v�E�H�b�`�̒�~.
	 * Maps URL
	 * 		http://example.com/index.php/stopwatch/stop/$startTime/$stopTime
	 * @param $startTime �J�n����
	 * @param $stopTime ��~����
	 */
	public function calc($startTime=NULL, $stopTime=NULL)
	{
		//�X�g�b�v�E�H�b�`�v�Z�@�ɊJ�n�E�I���^�C�����Z�b�g
		$this->load->model('stopwatch/stopwatch_calcurator','calcurator');
		$this->calcurator->setStartTimeInMillis(strtotime($startTime));
		$this->calcurator->setStopTimeInMillis(strtotime($stopTime));
	
		//�X�g�b�v�E�H�b�`�v�Z�@���猋�ʂ����o���A�r���[�ɏo��
		$this->parser->parse(
				'stopwatch_stoped', 
				array(	'start_time'=>date('H:i:s', $this->calcurator->getStartTimeInMillis()),
						'stop_time'=>date('H:i:s', $this->calcurator->getStopTimeInMillis()),
						'span_time'=>gmdate('H:i:s', $this->calcurator->getSpanTimeInMillis()),
				)
				);
	}
}
