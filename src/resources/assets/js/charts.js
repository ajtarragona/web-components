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
    
       this.chart = new Chart(
            this.$canvas[0],
            {
                type: this.settings.type,
                data: {
                    labels: this.labels,
                    datasets: this.datasets,
                },
                options: this.settings.options
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

	this.setOptions = function(options){
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
        
        // console.log('loadData',url, this.settings.options);
        var params=this.settings.options ?? {};
        // console.log(params);
        params._token = csrfToken();
        params.classname = this.settings.classname;
        
        delete params.plugins;
        delete params.scales;
        // al("PARAMS",params);
        if(o.settings.preloader) o.$container.startLoading();



        var xhr = new XMLHttpRequest();
        xhr.open("POST", url, true);
        xhr.setRequestHeader("X-CSRF-TOKEN", params._token);
        xhr.setRequestHeader('Content-type','application/json');

        // function execute after request is successful 
        xhr.onload  = function () {
                var data=JSON.parse(xhr.responseText);
                al('data',data);
            // if (this.readyState == 4 && this.status == 200) {
                o.$container.stopLoading();
                o.$container.find('.error-msg').remove();
                // al("data", data);
                o.prepareData(data.datasets);
                o.setOptions(data.options);
                o.update();
                
            // }else{

            // }
        }
        xhr.onerror = function(){ 
            // al("ERROR",xhr.responseJSON.message);
            if(o.$container.find('span.error-msg').length==0){
                o.$container.append($('<span class="error-msg"/>'));
            }
            var ret=JSON.parse(xhr.responseText);
            var errormesg='Error loading Chart';
            if(ret && ret.message) errormesg=ret.message;

            o.$container.find('.error-msg').html( errormesg );
            if(o.settings.preloader)  o.$container.stopLoading();
            // executeCallback(o.settings.onerror,o.$container);
        } // failure case


        al('params',JSON.stringify(params));
        xhr.send(JSON.stringify(params)) // Make sure to stringify



        // $.ajax({
        //     url: url,
        //     type: 'post',
        //     data: params,
        //     dataType: 'json',
        //     headers: {
        //         'X-CSRF-TOKEN':params._token,
        //     },
        //     success: function(data){
        //         o.$container.stopLoading();
        //         o.$container.find('.error-msg').remove();
        //         // al("data", data);
        //         o.prepareData(data.datasets);
        //         o.setOptions(data.options);
        //         o.update();
        //     },
        //     error: function(xhr){

        //         // al("ERROR",xhr.responseJSON.message);
        //         if(o.$container.find('span.error-msg').length==0){
        //             o.$container.append($('<span class="error-msg"/>'));
        //         }
        //         var errormesg='Error loading Chart';
        //         if(xhr.responseJSON && xhr.responseJSON.message) errormesg=xhr.responseJSON.message;

        //         o.$container.find('.error-msg').html( errormesg );
        //         if(o.settings.preloader)  o.$container.stopLoading();
        //         // executeCallback(o.settings.onerror,o.$container);
        //     }
        // });
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

