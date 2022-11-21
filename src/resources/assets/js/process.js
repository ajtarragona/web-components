require('./vendor//form-serializer');

$.fn.initProcessButton = function (){
    var defaults={
        method : 'GET',
        showconsole: true,
        progress: true,
        inline:false,
        striped:false,
        animated:false,
        monitorclass: '',
        height: '',
        showTitle: '',
        title: '',
        showpercent:true,
        color: 'info',
        process:null,
        processParams:{}
     };
  
    return this.each(function(){
      
      var o=this;
      o.$button=$(this);
      o.$modal=$(this).closest('.modal');
      o.$container=$(this).closest('.process-container');

      
      
    //  al('style',o.settings.color);
      o.errors=[];
      o.aborted=false;
      o.inprocess=false;

      // al("initProcess " ,o.$button);

      o.settings = $.extend({}, defaults, o.$button.data()); 
      // al(o.settings);
      

      
            
      o.$button.closest('form').on('tgnform:validate-success', function(e){
        // return;
        o.createMonitor();
        // o.$button.hide();
        o.$button.addClass('disabled').prop('disabled',true);
        if(!o.settings.confirmMessage){
          o.load();
        }else{
          if(o.$button.is('.form-submit')){
            o.$button.closest('form').find('.form-content').hide();
          }
          o.$container.find('.process-confirm').show();
        }
      });


      o.$button.on('click', function(e){
        // al('click', this);
        // return;
        if(o.$button.is('.form-submit') && o.$button.closest('form').data('validator')){
          o.$button.closest('form').submit();
          return false;
        }
        
        e.preventDefault();
        e.stopPropagation();

        // if(o.$button.closest('form').data('validator')){
        //   return false;
        // }

        // return;
        o.createMonitor();
        // o.$button.hide();
        o.$button.addClass('disabled').prop('disabled',true);

        if(!o.settings.confirmMessage){
          o.load();
        }else{
          if(o.$button.is('.form-submit')){
            o.$button.closest('form').find('.form-content').hide();
          }
          o.$container.find('.process-confirm').show();
        }
      });
  
  
      o.createMonitor = function(e){
        // al('createMonitor');
        var id=o.$button.attr('id');
        var title=o.settings.title;
        var showTitle=o.settings.showTitle;
        var confirm=o.settings.confirmMessage;
        var striped=o.settings.striped;
        var animated=o.settings.animated;
        var classes=o.settings.monitorclass;
        var height=o.settings.height;
        
        if($('#'+id+'-monitor').length>0) $('#'+id+'-monitor').remove();

        var monitor=' <div class="process-monitor flex-grow-1 '+(confirm?'confirm':'')+' '+(o.settings.inline?'inline':'')+' ' +classes+'" id="'+id+'-monitor">'+
            
            '<div class="process-monitor-inner " >'+
           
            
            '         <div class="progress-confirm" >'+
            '            <p class=" p-4 mb-0 text-center">'+o.settings.confirmMessage + '</p>'+ 
            '           <div class="monitor-footer d-flex justify-content-between">'+
            '             <button type="button" class="btn btn-sm btn-light cancel-button" role="button" >'+_icon('times')+ ' '+ ___("strings.cancel")+'</button>'+
            '             <button type="button" class="btn btn-sm btn-secondary confirm-button" role="button" >'+_icon('check')+ ' '+ ___("strings.confirm")+'</button>'+
            '           </div>'+

                
            '         </div>'+
            '         <div class="progress-bar-container " >';

            
            if(showTitle){
              monitor +='           <header class="monitor-header">'+
              '               <div class="flex-grow-1">'+
              '                 <h5 class="text-truncate mb-0">'+title+'</h5>'+
              '               </div>'+
              '               <div class="text-right">'+
              '                 <button type="button" class="hide-progress btn btn-xs btn-white" role="button" >'+_icon('times')+'</button>'+
              '               </div>'+
              '             </header>';
            }

            monitor+=
            '             <div class=" p-2 ">'+
            '               <div class="progress bg-gray-300 " '+ (height ? 'style="height:'+height+'"' : '') +'>'+
            '                 <div class="progress-bar ' + (striped?'progress-bar-striped':'')+' ' +(animated?'progress-bar-animated':'')+ ' bg-'+o.settings.color+' " role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>'+
            '               </div>'+
            '               <div class="py-2 text-right">'+
            '                 <small class="status-message px-2"></small>'+
            '                 <button type="button" class="btn btn-sm btn-light accept-button" role="button" >'+ ___("strings.accept")+'</button>'+
            '               </div>'+
            '             </div>'+
            '             <button type="button" data-toggle="collapse" class="show-console-btn btn btn-xs btn-light btn-block" href="#'+id+'-console" role="button" >'+_icon('chevron-down')+ ' '+ ___("strings.Process detail")+'</button>'+
            '             <div id="'+id+'-console" class="process-console  collapse"></div>'+
            '          </div>'+
            '       </div>'+



            
            '</div>'+
        '</div>';

        o.$monitor=$(monitor);
        if(o.settings.inline){
          o.$monitor.appendTo(o.$container);
        }else{
          o.$monitor.appendTo($('body'));
        }
        o.$bar=o.$monitor.find('.progress');
        o.$consoleBtn=o.$monitor.find('.show-console-btn');
        o.$console=o.$monitor.find('.process-console');
        o.$status=o.$monitor.find('.status-message');


        o.$monitor.find('.accept-button').on('click', function(e){
            if (!o.inprocess ) o.closeProgress();
        });
        o.$monitor.find('.hide-progress').on('click', function(e){
          if (!o.inprocess ) o.closeProgress();
        });
  
          
        o.$monitor.find('.cancel-button').on('click',function(e){
          
          o.closeProgress();
        });

        o.$monitor.find('.confirm-button').on('click',function(e){
          o.$monitor.addClass('confirmed');
          o.load();
        });
  
        o.$monitor.on('click', function(e){
          if(! o.inprocess && $(e.target).is('.process-monitor')) o.closeProgress();
          
        });
  
        $(document).on('keyup', function(e) {
            if (e.keyCode === 27 && !o.inprocess ) o.closeProgress();
        });

        if(!o.settings.showconsole){
          o.$consoleBtn.hide();
        }
      }


      o.closeProgress = function(e){
        // al('closeProgress');
        // o.$button.show();
        o.$button.removeClass('disabled').prop('disabled',false);

        // o.$monitor.removeClass('running');
        // al('closeProgress', o.settings.onclose);
        if(o.settings.onclose){
          executeCallback(o.settings.onclose,{button:o.$button, modal: o.$modal});  
        }
        o.$monitor.remove();
      }

      o.startProgress = function(e){
        if(o.$button.is('.form-submit')){
          o.$button.closest('form').find('.form-content').hide();
        }
        o.inprocess=true;
        o.$monitor.find('.accept-button').prop('disabled',true).addClass('disabled');
        o.$monitor.addClass('running');
        // if(o.setting.showconsole){
          o.$console.html('');
          o.$status.html('');
        // }
        o.errors=[];
        o.aborted=false;
        // o.$monitor.addClass('running');
        o.$bar.find('.progress-bar').html('').css({"width": 0}).addClass('bg-'+o.settings.color).removeClass('bg-warning').removeClass('bg-danger').removeClass('bg-success');
        o.$button.addClass('disabled').prop('disabled',true).startLoading();
            
      }

      o.progressError = function(e){
        o.$monitor.find('.accept-button').prop('disabled',false).removeClass('disabled');
        
        o.inprocess=false;
          //   al("progressError",e);
          o.$bar.find('.progress-bar').html("Error").css({"width": "100%"}).removeClass('bg-'+o.settings.color).removeClass('bg-success').removeClass('bg-danger').addClass('bg-warning');
          o.$bar.removeClass('progress-bar-animated');
          o.$button.removeClass('disabled').prop('disabled',false).stopLoading();
        
      }

      o.progressAbort = function(e){
         o.$monitor.find('.accept-button').prop('disabled',false).removeClass('disabled');
        
          o.inprocess=false;
          al("progressAbort",e);
          o.$bar.find('.progress-bar').html("Error").css({"width": "100%"}).removeClass('bg-'+o.settings.color).removeClass('bg-success').addClass('bg-danger');
          o.$bar.removeClass('progress-bar-animated');
          o.$button.removeClass('disabled').prop('disabled',false).stopLoading();
          o.$status.html('<span class="text-danger">Error</span>');
      }

      o.progressCompleted = function(){
          o.inprocess=false;
          o.$monitor.find('.accept-button').prop('disabled',false).removeClass('disabled');
        //   al(o.$bar);
         
        //  al("progressCompleted");
          
          //   o.$bar.find('.progress-bar').html("100%").css({"width": "100%"}).removeClass('bg-'+o.settings.color).addClass('bg-success');
          // }
          if(o.errors.length>0 || o.aborted){
            o.$bar.find('.progress-bar').removeClass('bg-'+o.settings.color).addClass('bg-warning');
            if(o.errors.length>0){
              // if(o.setting.showconsole){
                o.$console.append('<code class="step text-error"><span class="step-count">'+_icon('exclamation-triangle') +'</span> <p class="step-message ">'+___('strings.With errors in the following steps:') +o.errors.join(',')+'</p></code>');
                o.$console[0].scrollTop = o.$console[0].scrollHeight;
                
                
              // }
            }
            o.$bar.removeClass('progress-bar-animated');

          }else{
              o.$bar.find('.progress-bar').removeClass('bg-'+o.settings.color).addClass('bg-success').removeClass('progress-bar-animated');
          }

         
          o.$button.removeClass('disabled').prop('disabled',false).stopLoading();

          // al('executeCallback', o.settings.onsuccess);
          if(o.settings.onsuccess){
            executeCallback(o.settings.onsuccess,{button:o.$button, modal: o.$modal});  
          }

            
      }
      
      o.doProgress = function(result){
            
            // al('doProgress',result);
            // var report=$('#reports-periode').children().last(); //$("<a class='list-group-item list-group-item-info'/>").attr("href",url).html("<i class='fa fa-file-archive-o'></i> "+ id);
            
            var step=_icon('check-circle');
          //   else if(result.type!="abort"){
          //     o.$bar.find('.progress-bar').removeClass('bg-'+o.settings.color).addClass('bg-success');
            
          // }
            if(result.type=="abort"){
              step=_icon('exclamation-triangle');
              o.$bar.find('.progress-bar').removeClass('bg-'+o.settings.color).addClass('bg-danger');
              o.aborted=true;
            }else{
              var progress=Math.round(result.progress); // * 100) / 100; //redondeo sin decimanles
              
              if(o.settings.showpercent){
                  o.$bar.find('.progress-bar').html( progress + "%");
              }
              o.$bar.find('.progress-bar').css({"width": progress + "%"});
            }

            
            if(result.hasOwnProperty('step') && result.hasOwnProperty('totalsteps')){
              step= result.step+'/'+result.totalsteps;
              if(result.type=="error") o.errors.push(result.step);
              
            }

            // if(o.setting.showconsole){
              o.$console.append('<code class="step text-'+result.type+'"><span class="step-count">'+step+'</span> <p class="step-message ">'+result.message+'</p></code>');
              o.$status.html('<span class="text-'+result.type+'">'+result.message+'</span>');
              o.$console[0].scrollTop = o.$console[0].scrollHeight;
            // }
            // report.find("span").html(result.message +"...");
            // $('#report-progress .bar').html(result.progress + "%").css({"width": result.progress + "%"});
                            
      };

      o.handleResults = function(xhr){
        // al(xhr);
        var new_response = xhr.responseText.substring(xhr.previous_text.length);
        // al(new_response);
        var stack = new_response.split(/\r\n|\n/);
        //  al(stack);
        // al("Response:"+xhr.responseText);
        // al("New response:"+new_response);
        for(var i in stack){
          try{
            if(stack[i]){
              var line = JSON.parse( stack[i] );
              // al(line);
              o.doProgress(line);		
            }
          }catch(e){
            // console.error(e);
            //si no es json lo que retorna, aborto
            o.progressAbort(e);
            break;
          }
        }
        xhr.previous_text = xhr.responseText;
      }

      o.load = function(){
        var params={};
        var url;
        if(o.$button.is('.form-submit')){
          var form=o.$button.closest('form');

          params = form.serializeObject();

          // al(params);
        //  return;

            //Files
            var fileFormData=new FormData();
            // al('fileinputs', form.find('input[type=file]'));
            form.find('input[type=file]').each(function(i){
                var file_data = this.files;
                // al('filedata',file_data);
                for (var i = 0; i < file_data.length; i++) {
                  fileFormData.append($(this).attr('name'), file_data[i]);
                }
            });
            // al(fileFormData);
            // for (var value of fileFormData.values()) {
            //   al('value',value);
            // }
            // return;

         
          if(o.settings.process){
            url=route('webcomponents.process.run');
            params=o.settings.processParams;
            if(!params) params={};
            params.process=o.settings.process;
          }else if(o.settings.url){
            url=o.settings.url;
          }else{
            url=o.$button.closest('form').attr('action');
          }
          if(o.$button.closest('form').find('input[name=_method]').length>0){
            o.settings.method= o.$button.closest('form').find('input[name=_method]').val();
          }else{
            o.settings.method= o.$button.closest('form').attr('method');
          }
        }else{
          // al(params);
          if(o.settings.process){
            url=route('webcomponents.process.run');
            params=o.settings.processParams  ?? {};
            if(!params) params={};
            
            params.process=o.settings.process;
            o.settings.method='POST';
          }else if(o.settings.url){
            url=o.settings.url;
          }else{
            url=o.$button.attr('href');
          }
  
          if(o.settings.method!="GET"){
            params._token= csrfToken();
          }
        }
        
        // al(o.settings.method);
        // al(url);
        // al(params);
        // // return;
       
        try{
            var button=$(this);
            o.startProgress();
            
            var xhr = new XMLHttpRequest();  
            xhr.previous_text = '';
                                         
            xhr.onerror = function() { console.error("[XHR] Fatal Error."); };
           
            xhr.onreadystatechange = function() {
                // al(xhr.readyState);
                try{
                    if (xhr.readyState == 4){
                        // al("FINAL");
                        o.handleResults(xhr);
                       
                        o.progressCompleted();
                        // }
                    }else if (xhr.readyState > 2){
                        
                       o.handleResults(xhr);
                        // if(result.progress==100){
                        //     o.progressCompleted(result);
                        // }
                                    
                        
                    }  
                }catch (e){
                    //informeNoGenerat();
                    // al(e);
                    al("[XHR STATECHANGE] Exception: " + e);
                    o.progressError(e);
                }                     
            };
            xhr.open(o.settings.method, url, true);
            
            fileFormData=jsonToFormData(params,fileFormData);
            // al("fileFormData");
            // for (var pair of fileFormData.entries()) {
            //   al(pair[0]+ ', ' + pair[1]); 
            // }
            // return;

            xhr.send(fileFormData);

            // var newparams = JSON.stringify(params);
            // al(params);
            // al(newparams);
            // var formData = new FormData();
            // al(formData);
            
            // xhr.send();      
        }catch (e){
            o.progressError(e);
            al("[XHR REQUEST] Exception: " + e);
        }

        
      }
    });
  }


  
// var  entityActionSuccessCallback = function(data,button){
//     al(data);
//     TgnFlash.success(__("Completat!"));
// }

// var  entityActionErrorCallback = function(data,button){
//     al(data);
//     TgnFlash.error(__("Error!"));
// }