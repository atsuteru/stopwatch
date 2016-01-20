<?php

class Stopwatch_calcurator extends CI_Model
{
	private $_startTimeInMillis = 0;

	private $_stopTimeInMillis = 0;
	
	public function setStartTimeInMillis($startTimeInMillis = 0)
	{
		$this->_startTimeInMillis = $startTimeInMillis;
	}

	public function setStopTimeInMillis($stopTimeInMillis = 0)
	{
		$this->_stopTimeInMillis = $stopTimeInMillis;
	}

	public function getStartTimeInMillis()
	{
		return $this->_startTimeInMillis;
	}
	
	public function getStopTimeInMillis()
	{
		return $this->_stopTimeInMillis;
	}
	
	public function getSpanTimeInMillis()
	{
		return $this->_stopTimeInMillis - $this->_startTimeInMillis;
	}
}