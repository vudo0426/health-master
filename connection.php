<?php
class Connection
{
		public static function getConnection()
		{
			require_once("connect.php");
			return new mysqli(DBhost,DBuser,DBpwd,DBname);
		}
}
?>