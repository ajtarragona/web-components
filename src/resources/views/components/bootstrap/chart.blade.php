<div class="chart-container {{$chart->container_class}}">
     <canvas id="{{ $chart->_id() }}" class="chart-canvas {{$chart->css_class}}" data-type="{{$chart->chart_type}}" data-options="{{json_encode($chart->getOptions())}}" data-datasets="{{json_encode($chart->getDatasets())}}"></canvas>
</div>