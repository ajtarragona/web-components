<?php
namespace Ajtarragona\WebComponents\Models\Demo;
use Illuminate\Support\Facades\Schema;


class DemoHelper
{	

	protected static function getItemsTableName(){
		return config('webcomponents.demo.tables_prefix') ."_". config('webcomponents.demo.tables.items');
	}

	protected static function getTypesTableName(){
		return config('webcomponents.demo.tables_prefix') ."_". config('webcomponents.demo.tables.types');
	}

	public static function isInstalled(){
		return Schema::hasTable(self::getItemsTableName()) && Schema::hasTable(self::getItemsTableName());
	}
}
