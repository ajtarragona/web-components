@if(config("laratrust") && config('acl.backend') && can(config('acl.permission')))

	@nav([
		"navigation"=> 'drilldown',
		'class'=>'nav-dark',
		"items"=> [
			[
				"title" => __('acl::auth.authorizations') ,
				"icon" => 'users-cog',
				"route" => 'acl.dashboard',
				"activeroute" => 'users.*',
				"children" => [
					[
						"title" => __('acl::auth.Users') ,
						"route" => 'users.index',
						"icon" => 'users'
					],
					[
						"title" => __('acl::auth.Roles') ,
						"route" => 'roles.index',
						"icon" => 'lock'
					],
					[
						"title" => __('acl::auth.Permissions') ,
						"route" => 'permissions.index',
						"icon" => 'key'
					],
					[
						"title" => __('acl::auth.Teams') ,
						"route" => 'teams.index',
						"icon" => 'briefcase',
						"visible" => config("laratrust.use_teams")

					]
					
				]
			]

		],
		'fullwidth'=>true
	])


@endif