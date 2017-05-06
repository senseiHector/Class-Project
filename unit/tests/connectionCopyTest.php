<?php
include_once("/Library/WebServer/Documents/classproject2017/unit/database/connection.php");

	class connectionCopyTest extends \PHPUnit_Framework_TestCase
	{

		public function testConnectReturnsTrue()
		{

			$connect = new Connection;

			$this->assertTrue($connect->connect());
		}

	}
?>
