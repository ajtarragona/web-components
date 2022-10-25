<h1 class="display-4">Charts</h1>
<p class="lead">
	Podem crear gràfiques amb el component <mark><code>&commat;chart</code> </mark>

    <br/>Tenim dues opcions:<br/>
    O bé passar una instància de <code>BaseChart</code> i un array d'opcions:<br/>
    <code>&commat;chart($chart, $opcions=[])</code>

    <br/>
    <br/>O bé fer un chart dinàmic. Passant un string amb tipus de gràfica, els datasets i un array d'opcions:<br/>
    <code>&commat;chart($tipus, $datasets, $opcions=[])</code>
</p>
<p>Internament fem servir la llibreria <a href="https://www.chartjs.org/" target="_blank">@icon('external-link-alt')charts.js</a></p>

<hr class="big">

<p class="lead">
    A les opcions dels charts podem passar gairebé tot el que està a la documentació de charts.js. Podem fer-ho amb notació punt.
    A més, tenim disponibles aquestes opcions:
</p>

    <table class="table table-sm">
       
        <tbody>
            
            <tr>
                <td><code>id</code></td>
                <td>Identificador del chart. Si no s'assigna cap se'n generarà un d'aleatori.</td>
            </tr>
            
            <tr>
                <td><code>container_class</code></td>
                <td>Class CSS del contenidor del chart.</td>
            </tr>
            <tr>
                <td><code>css_class</code></td>
                <td>Class CSS del l'objecte Canvas.</td>
            </tr>
            <tr>
                <td><code>preloader</code></td>
                <td>Amb charts asíncrons, mostra un preloader mentre carrega el chart. Per defecte <code>true</code></td>
            </tr>
            <tr>
                <td><code>palette</code></td>
                <td>Defineix la paleta de colors. Els colors s'assignen automàticament si no els assignem expressament als datasets o als elements d'aquests. <br/>
                    Podem triar la paleta entre les següents:
                    <code>default</code>, <code>autumn</code>, <code>winter</code>, <code>blue</code>, <code>red</code>, <code>green</code>, <code>orange</code>
                </td>
            </tr>
            <tr>
                <td><code>color_mode</code></td>
                <td>Segons el tipus de gràfica automàticament es tria si s'assigna un color per cada dataset o per cada element d'aquest. Però podem sobrescriure-ho.<br/>
                    Valors possibles: <code>dataset</code> o <code>element</code>.
                </td>
            </tr>
           
            
        </tbody>
    </table>

   <p> Disposem també dels helpers <code>chartColor($index, $palette="default")</code>, <code>chartRGBColor($index, $palette="default")</code> i <code>chartRGBAColor($index, $opacity=1, $palette="default")</code> que ens retornaran colors.</p>
    


<hr class="big"/>
<hr>
<hr class="big"/>

@row
	
	@col(['size'=>6])
        <h2>Instància de BaseChart</h2>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th >Paràmetres</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td><code>chart</code></td>
                    <td>Objecte instància de BaseChart</td>
                </tr>
                
                <tr>
                    <td><code>options</code></td>
                    <td>Opcions de visualització de la gràfica. Podem passar-les amb notació punt.</td>
                </tr>
                
                
                
            </tbody>
        </table>
        
        @includeIf('ajtarragona-web-components::docs.source.components.chartinstance',['demochart'=>$demochart])
    @endcol  
	@col(['size'=>6])
        @tabs(['underlined'=>true])
            @tab(['href'=>'#tab-charts-1','active'=>true])
                Component Blade
            @endtab
            @tab(['href'=>'#tab-charts-2'])
                Classe
            @endtab
            
           
            
        @endtabs
        
        <div class="mt-2">
            @tabcontent
                @tabpane(['id'=>'tab-charts-1','active'=>true])
                    @code(['lang'=>'java'])
                    @includeSrc('ajtarragona-web-components::docs.source.components.chartinstance',['demochart'=>$demochart])
                    @endcode
                @endtabpane

                @tabpane(['id'=>'tab-charts-2'])
                    @code(['lang'=>'java'])
                    @includeClassSrc('Ajtarragona\WebComponents\Models\Charts\Examples\DemoChart')
                    @endcode
                @endtabpane
            
              
            
            @endtabcontent

        </div>

      
    @endcol
@endrow
    

<hr class="my-5"/>


@row
	
	@col(['size'=>6])
        <h2>Charts asincronos (AJAX)</h2>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th >Paràmetres</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td><code>chart</code></td>
                    <td>
                        Objecte instància de BaseChart. Ha d'usar el Trat <code>AsyncChart</code>. <br/>
                        Si la classe defineix un <code>$refresh_rate</code> (en segons), el chart s'anirà recarregant en aquest interval.<br/>
                        El chart ha d'implementar el mètode <code>reload()</code> on es carregaran els datasets.<br/>
                        En aquest mètode també es poden sobrescriure les opcions del chart (en els exemples, van canviat la mida del títol i la posició de la llegenda).
                    </td>
                </tr>
                
                <tr>
                    <td><code>options</code></td>
                    <td>Opcions de visualització de la gràfica. Podem passar-les amb notació punt.</td>
                </tr>
                
                {{-- <tr>
                    <td><code>animate</code></td>
                    <td>Id de l'element</td>
                </tr>
                --}}
                
                
            </tbody>
        </table>
        
        @includeIf('ajtarragona-web-components::docs.source.components.asyncchartinstance',['asyncchart'=>$linesasyncchart])
        @includeIf('ajtarragona-web-components::docs.source.components.asyncchartinstance',['asyncchart'=>$pieasyncchart])
    @endcol  
	@col(['size'=>6])
    
        @tabs(['underlined'=>true])
            @tab(['href'=>'#tab-async-charts-1','active'=>true])
               Component Blade
            @endtab
            @tab(['href'=>'#tab-async-charts-2'])
                Classe LineChart
            @endtab
            
            @tab(['href'=>'#tab-async-charts-3'])
                Classe PieChart
            @endtab
            
        @endtabs
        <div class="mt-2">
            @tabcontent
                @tabpane(['id'=>'tab-async-charts-1','active'=>true])
                    @code(['lang'=>'java'])
                    @includeSrc('ajtarragona-web-components::docs.source.components.asyncchartinstance',['asyncchart'=>$linesasyncchart])
                    @endcode
                @endtabpane

                @tabpane(['id'=>'tab-async-charts-2'])
                    @code(['lang'=>'java'])
                    @includeClassSrc('Ajtarragona\WebComponents\Models\Charts\Examples\LinesAsyncChart')
                    @endcode
                @endtabpane
            
                @tabpane(['id'=>'tab-async-charts-3'])
                    @code(['lang'=>'java'])
                    @includeClassSrc('Ajtarragona\WebComponents\Models\Charts\Examples\PieAsyncChart')
                    @endcode
                @endtabpane
            
            @endtabcontent

        </div>
       
    @endcol
@endrow
    

<hr class="my-5"/>

@row
	
	@col(['size'=>6])
        <h2>Charts dinàmics</h2>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th >Paràmetres</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td><code>tipus</code></td>
                    <td>Tipus de gràfica : <code>pie</code>, <code>doughnut</code>, <code>bar</code>, <code>line</code>, <code>polarArea</code>, <code>radar</code>, <code>bubble</code>, <code>scatter</code></td>
                </tr>
                <tr>
                    <td><code>datasets</code></td>
                    <td>Dades de la gràfica. Caldrà passar 1 o N sèries com a arrays. Cadascuna d'aquestes tindrà un atribut <code>data</code> i opcionalment altres com <code>label</code> o diferents opcions de configuració.</td>
                </tr>

                <tr>
                    <td><code>options</code></td>
                    <td>Opcions de visualització de la gràfica. Podem passar-les amb notació punt.</td>
                </tr>
                
                {{-- <tr>
                    <td><code>animate</code></td>
                    <td>Id de l'element</td>
                </tr>
                --}}
                
                
            </tbody>
        </table>
        
        @includeIf('ajtarragona-web-components::docs.source.components.charts')
    @endcol  
    @col(['size'=>6])
       @code(['lang'=>'java'])
            @includeSrc('ajtarragona-web-components::docs.source.components.charts')
        @endcode
    @endcol
@endrow
