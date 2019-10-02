@input([
    'class'=>'automention',
    'label'=>'Automention',
    'name'=>'auto1',
    'value'=>"Hola, \n domino @laravel y #php",
    'placeholder'=>'Trigger users with @',
    
    'data' => [
        'url' => route('webcomponents.docs.userscombo')
     ],
])



@textarea([
    'class'=>'automention',
    'label'=>'Automention with default value',
    'name'=>'auto3',
    'value'=>"Hola, \n domino #laravel y #php",
    'placeholder'=>'Trigger tags with #',
    'data' => [
        'trigger' => '#',
        'url' => route('webcomponents.docs.tagscombo'),
        'pre' =>'<span class="d-inline-block border-bottom border-primary text-primary">#',
        'post' =>'</span>',
        'prekey' => '#',
        'postkey' => '',
     ],
])




@textarea([
    'class'=>'automention',
    'label'=>'Automention 2',
    'placeholder'=>'Trigger users with { ',
    'name'=>'auto2',
    'data' => [
        'url' => route('webcomponents.docs.userscombo'),
        'pre' =>'<span class="d-inline-block bg-success text-white rounded-pill px-2 "><i class="fas fa-user"></i> ',
        'post' =>'</span>',
        'trigger' => '{',
        'prekey' => '@{{',
        'postkey' => '}}',
     ],
])


