import Chart from 'chart.js/auto';
import ChartDataLabels from 'chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels';
import collect from 'collect.js';

Chart.register(ChartDataLabels);

window.Chart = Chart;
window.ChartDataLabels = ChartDataLabels;
window.Chart.defaults.font.size = 14;
window.Chart.defaults.font.family = 'Montserrat, sans-serif';


$.fn.initChart = function (){
  
  
    return this.each(function(){
      var chart=this;

    //   al("initChart", chart);

    
        var chart_id=chart.getAttribute('id');
        var chart_type=chart.getAttribute('data-type');
        var dataseries=JSON.parse(chart.getAttribute('data-datasets'));
        var chart_data=[];
        var labels=[]; //cojo las labels de la ultima serie

        dataseries.forEach((dataserie) => {
            var data=collect(dataserie.data);

            labels=data.pluck('label').all();
            var values=data.pluck('data').all();
        
            var dataserie_options = collect(dataserie.options);
            dataserie_options=dataserie_options.merge({
                label : dataserie.label,
                data: values,
            }); //hago el merge

            // si los datos tienen opciones, sobrescribo las opciones de la serie como arrays

            var optionkeys=collect();
            data.each((d)=>{
                optionkeys=optionkeys.merge(collect(d.options).keys().all());
            });
        
            optionkeys.each((optionkey) => {
                dataserie_options.put(optionkey, data.pluck('options.'+optionkey).all());
            });

            chart_data.push(dataserie_options.undot().all());
        });

        var options=JSON.parse(chart.getAttribute('data-options'));
        

    
        var chart_arguments = {
            type: chart_type,
            data: {
                labels: labels,
                datasets : chart_data,
            },
            options: options
        };

        
        var myChart = new Chart(
            document.getElementById(chart_id),
            chart_arguments
        );
          
    });
  }
