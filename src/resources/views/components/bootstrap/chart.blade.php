<div class="chart-container {{$chart->container_class}}">
     
     {{-- @if($chart->chart_type=="bar") @dump($chart) @endif --}}
     <canvas 
          id="{{ $chart->_id() }}" 
          class="chart-canvas {{$chart->css_class}}" 
          data-type="{{$chart->chart_type}}" 
          data-async="{{$chart->isAsync()?"true":"false"}}"
          @if(!$chart->isAsync())
               
               data-datasets="{{json_encode($chart->getDatasets())}}"
          @else
               data-preloader="{{ $chart->preloader?'true':'false' }}"
               data-options="{{ json_encode($chart->getOptionParams()) }}"
               data-classname="{{ get_class($chart) }}"
               data-refresh_rate="{{ $chart->refresh_rate }}"
          @endif

          data-options="{{json_encode($chart->getOptions())}}" 

          ></canvas>
</div>