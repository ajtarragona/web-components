<?php

use Ajtarragona\WebComponents\Models\Charts\BaseChart;
use Ajtarragona\WebComponents\Models\Charts\DatasetValue;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

if (! function_exists('renderChart')) {

	function renderChart($chart, $datasets_or_settings=[], $settings=[]){
		if($chart instanceof BaseChart){
			return $chart->setOptions($datasets_or_settings)->render();
		}else{
			if(is_string($chart)){
				$classname="Ajtarragona\\WebComponents\\Models\\Charts\\".ucfirst(Str::camel($chart))."Chart";
				$ch=new $classname($settings);
				// $ch->chart_type=$chart;
				// $ch->setDatasets($datasets_or_settings);
				// dd($datasets_or_settings);
				foreach($datasets_or_settings as $i=>$dataset){
					$options=Arr::except($dataset,["label","data"]);
					$ds=$ch->addDataset($dataset["label"]??("dataset".$i), collect(), $options);
	// dd($ds);
					foreach($dataset["data"] as $data){
						$value=$data["data"]??null;
						$label=$data["label"]??null;
						$options=Arr::except($data, ['data','label']);
						$ch->addValueToDataset($ds->id, new DatasetValue($label, $value, $options));
					}
				}
				// dump($ch);
				return $ch->render();
			}
		}
	}
}

// if (! function_exists('renderChartScripts')) {

// 	function renderChartScripts(){
// 		return BaseChart::renderScripts();
// 	}
// }


