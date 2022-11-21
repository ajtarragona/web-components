<h1 class="display-4">Batch processes</h1>
<p class="lead">
	Podem fer processos batch amb el component blade <mark><code>&commat;process</code> </mark>
</p>
<p>
    El component blade mostra un botó que en clicar-lo executa un procés. Aquest procés cal definir-lo amb una classe que implementi <code>BaseProcess</code><div class=""></div>
    En aquesta classe cal anar afegint diferents <code>ProcessStep</code> que definiran la mida del procés batch.

<hr class="big">

<p >
    Tenim les següents opcions disponibles
</p>

    <table class="table table-sm">
       
        <tbody>
            
            <tr>
                <td><code>id</code></td>
                <td>Identificador del procés. Si no s'assigna cap se'n generarà un d'aleatori.</td>
            </tr>
            
            <tr>
                <td><code>title</code></td>
                <td>Títol que es mostrarà quan corri el procés. Si no definim cap títol es mostrarà un de genèric.</td>
            </tr>
            
            <tr>
                <td><code>showtitle</code></td>
                <td>Podem posar aquest paràmetre a <code>false</code> per no mostrar cap títol.</td>
            </tr>
           

            <tr>
                <td><code>process</code></td>
                <td>Classe del procés a executar.  </td>
            </tr>
            
            <tr>
                <td><code>processparams</code></td>
                <td>Array clau/valor amb els paràmetres que es passaran al procés.  </td>
            </tr>
            
            <tr>
                <td><code>url</code></td>
                <td>Alternativament Url del controlador que es cridarà per executar el procés. SI no en  </td>
            </tr>
            
            <tr>
                <td><code>method</code></td>
                <td>Métode http amb que es cridarà la URL</td>
            </tr>
            
            <tr>
                <td><code>submit</code></td>
                <td>Si definim això a true s'enviarà el formulari que contingui el botó de procés amb tots els seus camps.</td>
            </tr>
            <tr>
                <td><code>inline</code></td>
                <td>Si ho definim a false es mostrarà el procés en una finestra modal.</td>
            </tr>
            <tr>
                <td><code>containerclass</code></td>
                <td>Classes CSS que s'afegiran al contenidor de procés</td>
            </tr>
            <tr>
                <td><code>monitorclass</code></td>
                <td>Classes CSS que s'afegiran al monitor de procés</td>
            </tr>
            <tr>
                <td><code>confirm</code></td>
                <td>Text de confirmació que es mostrarà abans d'executar el procés.</td>
            </tr>
            
            <tr>
                <td><code>showconsole</code></td>
                <td>Posar-ho a false per no mostrar la consola del procés.</td>
            </tr>
            
            <tr>
                <td><code>showpercent</code></td>
                <td>Posar-ho a false per no mostrar el percentatge del procés al mig de la barra de progrés.</td>
            </tr>
            
            <tr>
                <td><code>height</code></td>
                <td>Alçada de la barra de progrés.</td>
            </tr>
            
            
            <tr>
                <td><code>style</code></td>
                <td>Color de la barra. Utilitzar els literals de bootstrap (primary, secondary, info...)</td>
            </tr>
            
            <tr>
                <td><code>striped</code></td>
                <td>True per mostrar la barra de progés amb un patró a ralles. </td>
            </tr>
            <tr>
                <td><code>animated</code></td>
                <td>True per que el patró a ralles es mostri animat.</td>
            </tr>
            
            <tr>
                <td><code>onsuccess</code></td>
                <td>Nom de la funció javascript que es cridarà quan acabi el procés satisfactòriament.</td>
            </tr>
            
            <tr>
                <td><code>onclose</code></td>
                <td>Nom de la funció javascript que es cridarà quan es faci click al botó "acceptar" al finalitzar el procés.</td>
            </tr>
            
            <tr>
                <td><code>onerror</code></td>
                <td>Nom de la funció javascript que es cridarà quan acabi el procés amb errors.</td>
            </tr>
            
            
            
        </tbody>
    </table>


<hr class="big"/>
<hr>
<hr class="big"/>

@row
	
	@col(['size'=>6])
        @includeIf('ajtarragona-web-components::docs.source.components.process')
    @endcol  
    @col(['size'=>6])

        @tabs(['underlined'=>true])
                @tab(['href'=>'#tab-process-1','active'=>true])
                    Component Blade
                @endtab
                @tab(['href'=>'#tab-process-2'])
                    Classe
                @endtab
                
            
                
            @endtabs
            
            <div class="mt-2">
                @tabcontent
                    @tabpane(['id'=>'tab-process-1','active'=>true])
                        @code(['lang'=>'java'])
                        @includeSrc('ajtarragona-web-components::docs.source.components.process')
                        @endcode
                    @endtabpane

                    @tabpane(['id'=>'tab-process-2'])
                        @code(['lang'=>'java'])
                        @includeClassSrc('Ajtarragona\WebComponents\Processes\DemoProcess')
                        @endcode
                    @endtabpane
                
                
                
                @endtabcontent

            </div>
       
    @endcol  
@endrow
