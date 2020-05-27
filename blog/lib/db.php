<?php

class db {

	static $mysqli;
	static $last;

//подключение к базе данных
	public function __construct() {
		// mysqli_connect("hostname.tld", "user", "password", "database")
		$this->mysqli = mysqli_connect("localhost", "mysql", "mysql", "blog");

	}

//функция для sql запросов
	public function query($sql) {
		$args = func_get_args();
		$sql = array_shift($args);
		$link = $this->mysqli;
		$args = array_map(function ($param) use ($link) {
			return "'".$link->escape_string($param)."'";
		},$args);
		$sql = str_replace(array('%','?'), array('%%','%s'), $sql);
		array_unshift($args, $sql);
		$sql = call_user_func_array('sprintf', $args);
		$this->last = mysqli_query($this->mysqli, $sql);
		if ($this->last === false) throw new Exception('Database error: '.$this->mysqli->error);
		return $this;
	}

	public function assoc() {
		return $this->last->fetch_assoc();
	}


	public function all() {
		$result = array();
		while ($row = $this->last->fetch_assoc()) $result[] = $row;
		return $result;
	}

}