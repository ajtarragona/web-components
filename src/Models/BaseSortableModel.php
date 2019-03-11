<?php
namespace Ajtarragona\WebComponents\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class BaseSortableModel extends Model
{
    use Sortable;


    public static function getAllCombo(){
    	$ret=[];
    	$items=self::all();
    	foreach($items as $item){
    		$ret[$item->id] = $item->name;
    	}
    	return $ret;
    }

   
    public static function toCombo($collection)
    {
       
        $ret=[];
        foreach($collection as $item){
            $ret[$item->id] = $item->id;
        }
        return $ret;
    }
	
}
