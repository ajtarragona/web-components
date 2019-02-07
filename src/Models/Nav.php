<?php
namespace Ajtarragona\WebComponents\Models;

class Nav extends WebComponent
{


	/*public static function navitem($name, $route, $attributes=false){
		$activeroute=isset($attributes["activeroute"])?$attributes["activeroute"]:$route;
		$activestyle=isset($attributes["activestyle"])?'bg-'.$attributes["activestyle"]:'';
		$icon=isset($attributes['icon'])?$attributes['icon']:'folder';
		$style=isset($attributes['style'])?'bg-'.$attributes['style']:'';

 		$item='<li class="nav-item">';
        $item.='<a class="nav-link '. isActiveRoute($activeroute).'"  href="'. route($route) .'" data-toggle="tooltip" data-placement="right" title="'.$name.'">';

        $item.='<span class="nav-icon '.(isActiveRoute($activeroute)?$activestyle:$style).'">'.icon($icon).'</span>';
        $item.='<span class="nav-text">'.$name.'</span>';
        $item.='</a>';
     	$item.= '</li>';
        return $item;
	}
	*/


	public static function navitem($navitem, $parentid, $navigation="dropdown"){
		if(isset($navitem->showif) && !$navitem->showif) return;
		if(isset($navitem->role)){
			if(!Auth::user()) return;
			if(!Auth::user()->hasRole($navitem->role)) return;
		}


		if(isset($navitem->permission)){
			if(!Auth::user()) return;
			if(!Auth::user()->hasPermission($navitem->permission)) return;
		}
		
		if(isset($navitem->separator)){
			$ret="<hr/>";
			return $ret;
		}

     	$navitem->active=false;
     	
     	$navitem->activeroute =isset($navitem->activeroute)?$navitem->activeroute:(isset($navitem->route)?$navitem->route:false);
     	$navitem->activeurl =isset($navitem->activeurl)?$navitem->activeurl:(isset($navitem->url)?$navitem->url:false);
     	$navitem->activematch =isset($navitem->activematch)?$navitem->activematch:false;

     	if($navitem->activematch){
     		$navitem->active = isActiveMatch($navitem->activematch);
	 	}else if($navitem->activeroute){
     		$navitem->active = isActiveRoute($navitem->activeroute);
     	}else if($navitem->activeurl){
     		$navitem->active = isActiveURL($navitem->activeurl);
     	}

		$ret="<li class='nav-item ";
		if(isset($navitem->children)) $ret.=" has-submenu ";
		if($navitem->active) $ret.='active';

		$ret.="'>";
		
		$linkclasses=['nav-link'];
		if(isset($navitem->class)) $linkclasses=explode(" ",$navitem->class);
		$navitem->id=self::generateUid("el");

		
		if(isset($navitem->url) || isset($navitem->route)){
			$url=isset($navitem->route)?route($navitem->route):$navitem->url;

			$ret.="<a href='".$url."' title=\"".(isset($navitem->title)?$navitem->title:"")."\" data-placement='right' class='".implode(" ",$linkclasses) ."' >";
			
		}else{
			if($navigation=="drilldown") $linkclasses[]="opener";
			$ret.="<span title=\"".(isset($navitem->title)?$navitem->title:"")."\" data-placement='right' class='".implode(" ",$linkclasses) ."'>";
		}

		/*}else{
			$ret.="<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>";
			
		}*/
		
		$ret.=self::getIconHTML(isset($navitem->title)?$navitem->title:false,isset($navitem->icon)?$navitem->icon:false,$navitem);

		
		


		if($navigation=="drilldown" && isset($navitem->children)){
			if(isset($navitem->url)|| isset($navitem->route)) $ret.="<span class='opener'><span class='opener-icon'>".self::icon('arrow-right')."</span></span>";
			else $ret.="<span class='opener-icon'>".self::icon('arrow-right')."</span>";
		}
				
		if(isset($navitem->url)|| isset($navitem->route)) $ret.="</a>";
		else $ret.="</span>";

		if(isset($navitem->children)){
			$collapsed= true;
			if(isset($navitem->collapsed)) $collapsed= $navitem->collapsed;
			//_dump($collapsed);

			if($navigation=="collapse" ){

				$ret.="<div class='toggler ".($collapsed?"collapsed":"")."' aria-expanded='true' data-toggle='collapse' href='#sub".$navitem->id."' ";
				$ret.=">".self::icon('angle-up')."</div>";
				$ret.="<ul class='subnav collapse ".($collapsed?"":"in")."' aria-expanded='true' id='sub".$navitem->id."'>";
			}else if($navigation=="drilldown"){

				$ret.="<ul id='sub".$navitem->id."'>";
				$ret.="	<li><a href='#' class='back'>". self::icon('arrow-left') ." ".__("Back")."</a></li>";
			}else{
				//$ret.="<span class='caret'></span>";
				$ret.="<div href='#' class='toggler' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false' href='#sub".$navitem->id."'>".self::icon('angle-up')."</div>";
				$ret.="<ul class='dropdown-menu' id='sub".$navitem->id."'>";
			}

			foreach ($navitem->children as $key => $item) {
				$ret.= self::navitem($item, $navitem->id, $navigation);
			}
			$ret.="</ul>";
		}

		$ret.="</li>";
		return $ret;
	}


	/* genera un menú de navegación */
	public static function nav($nav){
		if(isset($nav["showif"])  && !$nav["showif"]) return;
		
		$nav=json_decode(json_encode($nav, FALSE));
		
		if(!isset($nav->navigation)) $nav->navigation="dropdown";

		if(!isset($nav->class)) $nav->class="";

		$disposition="vertical";
		if(isset($nav->disposition)) $disposition=$nav->disposition;
		
		$nav->class.=" ".$disposition." ";
		
		$fullwidth="fullwidth";
		if(isset($nav->fullwidth) && !$nav->fullwidth) $fullwidth="";
		
		$nav->class.=" ".$fullwidth." ";
		
		$dropdown="true";
		if(isset($nav->dropdownOnHover) && !$nav->dropdownOnHover) $dropdown="false";
		
		$hoverdelay=800;
		if(isset($nav->hoverDelay)) $hoverdelay=$nav->hoverDelay;
		

		if(!isset($nav->dropdownDirection)) $nav->dropdownDirection="right";
		if(!isset($nav->dropdownVerticalDirection)) $nav->dropdownVerticalDirection="bottom";
		

		$ret="";

		if(!isset($nav->id)) $nav->id=self::generateUid("ul");

		$ret.="<ul id='".$nav->id."' data-navigation='".$nav->navigation."' class='tgn-nav ".$nav->class." tgn-nav-".$nav->navigation."' ";
		if($nav->navigation=="dropdown"){
			 $ret.=" data-dropdown-hover='".$dropdown."' data-dropdown-direction='".$nav->dropdownDirection."' data-dropdown-vertical-direction='".$nav->dropdownVerticalDirection."' data-hover-delay='".$hoverdelay."' ";
		}
		$ret.=">";
		if(isset($nav->items) && $nav->items ){
			foreach ($nav->items as $key => $item) {
				$ret.= self::navitem($item, $nav->id, $nav->navigation );
			}
		}
		$ret.="</ul>";
		return $ret;
	}
}