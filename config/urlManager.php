<?php

return [
	'add-project' => '/project/add-project',
	'single-project/<id:.*>' => '/project/view',
	'projects' => '/project/projects',
	'search' => '/project/search',

    '<action:(.*)>' => 'site/<action>',

];