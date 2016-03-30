<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTypeFilesTable extends Migration {

	public function up()
	{
		Schema::table('files', function(Blueprint $table)
		{
			$table->enum('type',['matrix','vector','pribl','result'])->change();
		});
	}

	public function down()
	{
		Schema::table('files', function(Blueprint $table)
		{
			$table->enum('type',['input','output'])->default('input');
		});
	}

}
