@php
	$tabsid=(isset($align)?$align:"unaligned") . (isset($justify)?"-justify":"").(isset($pill)?"-pill":"").(isset($underlined)?"-underlined":"");
@endphp



@tabs(['align'=>$align,'responsive'=>true,'justify'=>isset($justify),'class'=>'','pill'=>isset($pill),'underlined'=>isset($underlined)])
	@tab(['href'=>'#tab1-'.$tabsid,'active'=>true,'persist'=>$tabsid])
		{{ $faker->words(2,true) }}
	@endtab
	@tab(['href'=>'#tab2-'.$tabsid,'persist'=>$tabsid])
		{{ $faker->words(2,true) }}
	@endtab
	@tab(['href'=>'#tab22-'.$tabsid,'persist'=>$tabsid])
		{{ $faker->words(2,true) }}
	@endtab
@endtabs			




@tabcontent(['responsive'=>true])
	@tabpane(['fade'=>true,'active'=>true,'id'=>'tab1-'.$tabsid,'persist'=>$tabsid])
		<div class="p-2">{{ $faker->paragraph() }} </div>
	@endtabpane
	@tabpane(['fade'=>true,'active'=>false,'id'=>'tab2-'.$tabsid,'persist'=>$tabsid])
		<div class="p-2">{{ $faker->paragraph() }} </div>
	@endtabpane
	@tabpane(['fade'=>true,'active'=>false,'id'=>'tab22-'.$tabsid,'persist'=>$tabsid])
		<div class="p-2">{{ $faker->paragraph() }} </div>
	@endtabpane
@endtabcontent

