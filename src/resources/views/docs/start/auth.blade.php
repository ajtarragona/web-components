<h1 class="display-4">Autenticació</h1>

<hr class="big"/>

<p>El paquet proporciona les rutes, models i controladors necessaris per autenticació.</p>

<p><mark><strong>Important!</strong> Primer cal assegurar-se que tenim configurada la base de dades a l'arxiu <code>.env</code>.</mark></p>

<p>Cal que executem la següent comanda per preparar la taula d'usuaris.</p>
@code
php artisan ajtarragona:setupauth
@endcode
<p>Configurar l'autenticació, definint la classe que farà de model de l'usuari a l'arxiu <code>config/auth.php</code>:</p>
@code
 'providers' => [
	 'users' => [
            'driver' => 'eloquent',
            'model' => Ajtarragona\WebComponents\Models\User::class, 
        ],
@endcode

<hr/>


<h3>Configurar LDAP</h3>

<p>Opcionalment, podem habilitar l'autenticació per LDAP.</p>
<p>El paquet incorpora internament el paquet <a href="https://github.com/Adldap2/Adldap2-Laravel" target="_blank">ADLdap Laravel</a> per l'autenticació.</p>
<p>Els usuaris d'LDAP que es validin es donaràn d'alta automàticament a la bade de dades de l'aplicació.</p>

<p>A l'arxiu `config/auth.php`:</p>
<ol>
    <li>
        Afegir el guard `ldaptgn`
    
        @code
        'guards' => [
            ...
            'ldaptgn' => [
                'driver' => 'session',
                'provider' => 'ldapusers',
            ],
        ]
        @endcode
    </li>

    <li>
        Fem que el default guard pugui configurar-se des de l'arxiu <code>.env</code>
        @code
        'defaults' => [
            'guard' => env('AUTH_GUARD','web'), //aquesta línea
            ...
        ],
        @endcode
    </li>

    <li>
        Afegim el provider <code>ldapusers</code>
        @code
        'providers' => [
            ...
            'ldapusers' => [
                'driver' => 'ldap', 
                'model' => Ajtarragona\WebComponents\Models\User::class,
            ],      
        ]
        @endcode
    </li>
</ol>   

<p>Publiquem la configuració del paquet adldap:</p>
@code
php artisan vendor:publish --provider=Adldap\Laravel\AdldapAuthServiceProvider
php artisan vendor:publish --provider=Adldap\Laravel\AdldapServiceProvider
@endcode

<p>A l'arxiu <code>config/ldap_auth.php</code> modificar els següents atributs:</p>

@code
    "identifiers->ldap->locate_users_by " => 'samaccountname'
    "identifiers->database->username_column" => 'username'
    "sync_attributes" => [

        'email' => 'mail',
        'username' => 'samaccountname',
        'name' => 'cn',

    ]
@endcode

Configurar les següents variables a l'arxiu <code>.env</code>

@code
AUTH_GUARD=ldaptgn
LDAP_HOSTS= ?
LDAP_PORT= ?
LDAP_BASE_DN= ?
LDAP_USERNAME= ? 
LDAP_PASSWORD= ?
LDAP_LOGIN_FALLBACK = true
@endcode



