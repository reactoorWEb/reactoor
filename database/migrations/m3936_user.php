<?php
use illustrate\Database\Schema\CreateTable;



class m3936_user
{
	public function up()
	{
		$db=\illustrate\Application::$app->database;
		$db->schema()->create("user", function(CreateTable $table){
			$table->integer("id");
			$table->timestamps();
		});
	}

	public function down()
	{
		$db=\illustrate\Application::$app->database;
		$db->schema()->drop("user");
	}
}