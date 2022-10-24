import Chart from 'chart.js/auto';
import ChartDataLabels from 'chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels';
import collect from 'collect.js';

Chart.register(ChartDataLabels);

window.Chart = Chart;
window.ChartDataLabels = ChartDataLabels;
window.Chart.defaults.font.size = 14;
window.Chart.defaults.font.family = 'Montserrat, sans-serif';



var tgnchartdefaults = {
	async: false,
	refresh_rate: 0,
	url: false,
	preloader:true,
};

function TgnChart(canvas, settings){

	this.$canvas=canvas;
	this.$container=canvas.closest('.chart-container');
	
    
	this.settings = $.extend(true, {}, tgnchartdefaults, this.$canvas.data()); 
    // if(this.settings.async)  console.log("DATA",this.$canvas.data());
    // delete this.settings.
    // if(this.settings.async) al('TgnChart',this.$canvas.data());
    
    if(settings) this.settings = $.extend(true, this.settings, settings);
    // if(this.settings.async) al('TgnChart',this.settings);
        
    this.datasets=[];
    this.labels=[];
    this.refresh_counter=0;
    
	this.init = function(){
        var o=this;

        // if(!this.settings.async && this.settings.datasets){
            
        // }

       if(!this.settings.async) this.prepareData(this.settings.datasets);

    //    al('TgnChart',this);
    
    // var chart_options=this.settings.options;
    var chart_options=this.prepareOptions(this.settings.options);
    // al('options', chart_options);

       this.chart = new Chart(
            this.$canvas[0],
            {
                type: this.settings.type,
                data: {
                    labels: this.labels,
                    datasets: this.datasets,
                },
                options: chart_options
            }
        );


        if(this.settings.async){
            this.loadData();

            if(this.settings.refresh_rate){
                setInterval(function () {
                    o.loadData();

                }, this.settings.refresh_rate * 1000 );

            }
        }

        
        
    }

	
	this.prepareOptions = function(options){
        var o=this;
        // al(this.settings.type,options);
        var suffix_global=options.dotGet('suffix');
        var prefix_global=options.dotGet('prefix');
        
        if($.inArray(this.settings.type, ["pie","doughnut","radar","polarArea"]) < 0){
            var suffix=options.dotGet('scales.y.ticks.suffix');
            var horizontal = options.dotGet('horizontal',false);
            
            // console.log( options.dotGet('plugins.title.text'), horizontal, suffix , suffix_global);

            if(suffix || suffix_global){
                options.dotSet('scales.y.ticks.callback', function(value, index, ticks){
                    return value + ''+ (suffix?suffix:(horizontal?'':suffix_global));
                });
            }
    
            var prefix=options.dotGet('scales.y.ticks.prefix');
            if(prefix || prefix_global){
                options.dotSet( 'scales.y.ticks.callback', function(value, index, ticks){
                    return (prefix?prefix:(horizontal?'':prefix_global))+''+value;
                });
            }

            var suffix2=options.dotGet('scales.x.ticks.suffix');
            if(suffix2 || suffix_global ){
                options.dotSet( 'scales.x.ticks.callback', function(value, index, ticks){
                    return value + ''+ (suffix2?suffix2:(horizontal?suffix_global:''));
                });
            }
            
            var prefix2=options.dotGet('scales.x.ticks.prefix');
            if(prefix2 || prefix_global){
                options.dotSet( 'scales.x.ticks.callback', function(value, index, ticks){
                    return (prefix2?prefix2:(horizontal?suffix_global:''))+''+value;
                });
            }
        }

        var suffix3=options.dotGet('plugins.tooltip.suffix');
        var prefix3=options.dotGet('plugins.tooltip.prefix');

        // al('tooltip',suffix3);
        // console.log(this.settings.type,suffix3,prefix3,suffix_global,prefix_global);

        if(suffix3 || prefix3 || suffix_global || prefix_global){
            options.dotSet( 'plugins.tooltip.callbacks.label', function(context){
                let label = context.dataset.label || '';
                // console.log('dotSet',context);
                if (label) {
                    label += ': ';
                }
                if (context.formattedValue !== null) {
                    label += (prefix3?prefix3:(prefix_global??'')) + '' + context.formattedValue + '' + (suffix3?suffix3:(suffix_global??''));
                }
                return label;
            });
        }

        //lo mismo en datalabels

        var suffix4=options.dotGet('plugins.datalabels.suffix');
        var prefix4=options.dotGet('plugins.datalabels.prefix');

        // console.log('datalabels',suffix4 , prefix4 , suffix_global, prefix_global);
        if(suffix4 || prefix4 || suffix_global || prefix_global){
            // console.log(this);  
            options.dotSet( 'plugins.datalabels.formatter', function(value, context){
            if(o.settings.type=="bubble") console.log('plugins.datalabels.formatter',value, context);
                var val=$.isPlainObject(value) ? value.r : value;

               return  (prefix4?prefix4:(prefix_global??''))+''+val+''+(suffix4?suffix4:(suffix_global??''));
                
            });
        }
        
        
       
        return options;
    }



	this.setOptions = function(options){
        options = this.prepareOptions(options);
        this.chart.options=options;
    }


	this.prepareData = function(datasets){
        var chart_data=[];
        var labels=[];
        //lo que me llega por data lo transformo
        //si es asincroono no habrá nada y no se hará nada
        if(datasets){ 
            datasets.forEach((dataset) => {
                var data=collect(dataset.data);

                labels=data.pluck('label').all();
                var values=data.pluck('data').all();
            
                var dataset_options = collect(dataset.options);
                dataset_options=dataset_options.merge({
                    label : dataset.label,
                    data: values,
                }); //hago el merge

                // si los datos tienen opciones, sobrescribo las opciones de la serie como arrays

                var optionkeys=collect();
                data.each((d)=>{
                    optionkeys=optionkeys.merge(collect(d.options).keys().all());
                });
            
                optionkeys.each((optionkey) => {
                    dataset_options.put(optionkey, data.pluck('options.'+optionkey).all());
                });

                chart_data.push(dataset_options.undot().all());
            });

        }
        this.labels=labels;
        this.datasets=chart_data;
      
        
    }

    this.loadData = function(){
        var o=this;
        var url=route('webcomponents.chart');
        
        // console.log('URL',url);
        var data={};

        if(this.settings.options){
            for ( var key in this.settings.options ) {
                if(key!='plugins' && key!='scales') data[key] = this.settings.options[key];
            }

        }

        // console.log(params);
        data["_token"] = csrfToken();
        data["classname"] = this.settings.classname;
        
        
        if(o.settings.preloader) o.$container.startLoading();



        
        // al("PARAMS",data);
        
        // al(data.length);
        
    


        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            // processData: false,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN':data["_token"],
                // 'Content-Type':'application/json',
            },
            success: function(data){
                o.$container.stopLoading();
                o.$container.find('.error-msg').remove();
                // al("data", data);
                o.prepareData(data.datasets);
                o.setOptions(data.options);
                o.update();
            },
            error: function(xhr){

                // al("ERROR",xhr.responseJSON.message);
                if(o.$container.find('span.error-msg').length==0){
                    o.$container.append($('<span class="error-msg"/>'));
                }
                var errormesg='Error loading Chart';
                if(xhr.responseJSON && xhr.responseJSON.message) errormesg=xhr.responseJSON.message;

                o.$container.find('.error-msg').html( errormesg );
                if(o.settings.preloader)  o.$container.stopLoading();
                // executeCallback(o.settings.onerror,o.$container);
            }
        });
    }

    this.randomIntFromInterval = function(min, max) { // min and max included 
        return Math.floor(Math.random() * (max - min + 1) + min)
    }

    this.update = function(){
        var o=this;
        
        //si es la primera vez o el numero de datasets ha cambiado
        if(this.refresh_counter==0 || this.datasets.length != o.chart.data.datasets.length  ){
            this.chart.data.datasets = this.datasets;
            this.chart.data.labels= this.labels;
        }else{
            if(this.labels.length == o.chart.data.labels.length ){
                this.labels.forEach((label, i) => {
                    o.chart.data.labels[i]=label;
                });
            }
            
            //se supone que los datasets tienen el mismo tamaño
            this.datasets.forEach((dataset, i) => {
                dataset.data.forEach((value, j)=>{
                    o.chart.data.datasets[i].data[j]=value;
                });
                // dataset.data.push(data);
            });

        }

        this.refresh_counter++;
        this.chart.update();
        this.chart.resize();

    }
       
    
}


(function ( $ ) {
	
	$.fn.tgnChart = function( settings ){
		return this.each(function(){
			var chart=new TgnChart($(this), settings);
            chart.init();

		});
	};

}( jQuery ));

