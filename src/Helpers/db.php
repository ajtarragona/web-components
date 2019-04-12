<?php
if (! function_exists('fullquery')) {

	function fullquery($query){
		return vsprintf(str_replace(array('?'), array('\'%s\''), $query->toSql()), $query->getBindings());
	}
}
