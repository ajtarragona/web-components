<h2>Tabs</h2>

@include('ajtarragona-web-components::docs.components.tabtemplate',['align'=>'left'])

@include('ajtarragona-web-components::docs.components.tabtemplate',['align'=>'center'])

@include('ajtarragona-web-components::docs.components.tabtemplate',['align'=>'right'])

<h4 class='mt-4'>Justificades</h4>
@include('ajtarragona-web-components::docs.components.tabtemplate',['align'=>'left','justify'=>true])

<h4 class='mt-4'>Verticals</h4>
@row
    @col(['size'=>4])
        @tabs(['vertical'=>true])
            @tab(['href'=>'#tab3','persist'=>'kitchen-tab','active'=>true])
                {{ $faker->words(2,true) }}
            @endtab
            @tab(['href'=>'#tab4','persist'=>'kitchen-tab'])
                {{ $faker->words(2,true) }}
               
            @endtab
        @endtabs
    @endcol
    @col(['size'=>8])


        @tabcontent
            @tabpane(['fade'=>true,'id'=>'tab3','persist'=>'kitchen-tab'])
                <div class="p-2">{{ $faker->paragraph() }}</div>
            @endtabpane
            @tabpane(['fade'=>true,'id'=>'tab4','persist'=>'kitchen-tab'])
                <div class="p-2 text-left">
                    {{ $faker->paragraph() }}
                </div>
            @endtabpane
        @endtabcontent
    @endcol
@endrow


@row
    
    @col(['size'=>8])


        @tabcontent
            @tabpane(['fade'=>false,'active'=>true,'id'=>'tab3-2'])
                <div class="p-2">{{ $faker->paragraph() }}</div>
            @endtabpane
            @tabpane(['fade'=>false,'active'=>false,'id'=>'tab4-2'])
                <div class="p-2">{{ $faker->paragraph() }}</div>
            @endtabpane
        @endtabcontent
    @endcol

    @col(['size'=>4])
        @tabs(['vertical'=>true,'align'=>'right'])
            @tab(['href'=>'#tab3-2','active'=>true])
                {{ $faker->words(2,true) }}
            @endtab
            @tab(['href'=>'#tab4-2'])
                {{ $faker->words(2,true) }}
            @endtab
        @endtabs
    @endcol
@endrow


<hr/>

<h2>Underlined</h2>
@include('ajtarragona-web-components::docs.components.tabtemplate',['align'=>'left','underlined'=>true])

@include('ajtarragona-web-components::docs.components.tabtemplate',['align'=>'center','underlined'=>true])

@include('ajtarragona-web-components::docs.components.tabtemplate',['align'=>'right','underlined'=>true])

<h4 class='mt-4'>Justificades</h4>
@include('ajtarragona-web-components::docs.components.tabtemplate',['align'=>'left','justify'=>true,'underlined'=>true])

<h4 class='mt-4'>Verticals</h4>
@row
    @col(['size'=>4])
        @tabs(['vertical'=>true,'underlined'=>true])
            @tab(['href'=>'#tab3','persist'=>'kitchen-tab','active'=>true])
                {{ $faker->words(2,true) }}
            @endtab
            @tab(['href'=>'#tab4','persist'=>'kitchen-tab'])
                {{ $faker->words(2,true) }}
               
            @endtab
        @endtabs
    @endcol
    @col(['size'=>8])


        @tabcontent
            @tabpane(['fade'=>true,'id'=>'tab3','persist'=>'kitchen-tab'])
                <div class="p-2">{{ $faker->paragraph() }}</div>
            @endtabpane
            @tabpane(['fade'=>true,'id'=>'tab4','persist'=>'kitchen-tab'])
                <div class="p-2 text-left">
                    {{ $faker->paragraph() }}
                </div>
            @endtabpane
        @endtabcontent
    @endcol
@endrow


@row
    
    @col(['size'=>8])


        @tabcontent
            @tabpane(['fade'=>false,'active'=>true,'id'=>'tab3-2'])
                <div class="p-2">{{ $faker->paragraph() }}</div>
            @endtabpane
            @tabpane(['fade'=>false,'active'=>false,'id'=>'tab4-2'])
                <div class="p-2">{{ $faker->paragraph() }}</div>
            @endtabpane
        @endtabcontent
    @endcol

    @col(['size'=>4])
        @tabs(['vertical'=>true,'align'=>'right','underlined'=>true])
            @tab(['href'=>'#tab3-2','active'=>true])
                {{ $faker->words(2,true) }}
            @endtab
            @tab(['href'=>'#tab4-2'])
                {{ $faker->words(2,true) }}
            @endtab
        @endtabs
    @endcol
@endrow


<hr/>

<h2>Pills</h2>

@include('ajtarragona-web-components::docs.components.tabtemplate',['align'=>'left','pill'=>true])
@include('ajtarragona-web-components::docs.components.tabtemplate',['align'=>'center','pill'=>true])

@include('ajtarragona-web-components::docs.components.tabtemplate',['align'=>'right','pill'=>true])

<h4 class='mt-4'>Justificades</h4>

@include('ajtarragona-web-components::docs.components.tabtemplate',['align'=>'left','justify'=>true,'pill'=>true])

<h4 class='mt-4'>Verticals</h4>

@row
    @col(['size'=>4])
        @tabs(['pill'=>true,'vertical'=>true])
            @tab(['href'=>'#tab3-pill','active'=>true])
                {{ strtoupper($faker->words(2,true)) }}
            @endtab
            @tab(['href'=>'#tab4-pill'])
                {{ strtoupper($faker->words(2,true)) }}
            @endtab
        @endtabs
    @endcol
    @col(['size'=>8])


        @tabcontent
            @tabpane(['fade'=>false,'active'=>true,'id'=>'tab3-pill'])
                <div class="p-2">{{ $faker->paragraph() }}</div>
            @endtabpane
            @tabpane(['fade'=>false,'active'=>false,'id'=>'tab4-pill'])
                <div class="p-2">{{ $faker->paragraph() }}</div>
            @endtabpane
        @endtabcontent
    @endcol
@endrow


