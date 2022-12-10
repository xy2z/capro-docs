<?php

use xy2z\Capro\ViewTemplate;

function get_cats(int $limit = 10) {
	$client = new \GuzzleHttp\Client();
	$response = $client->request('GET', 'https://cataas.com/api/cats?skip=0&limit=' . $limit);
	$json = json_decode($response->getBody(), false);

	$result = [];

	foreach ($json as $cat) {
		$result[] = [
			'id' => $cat->_id,
			'tags' => $cat->tags,
		];
	}

	return $result;
}


return [

	// ViewTemplate (demo)
	'templates' => [

		// Cats
		new ViewTemplate(
			'cats', // label.
			'cat_template', // template_view.
			'/demo/cats/{id}', // result_path.
			get_cats(5), // items.
		),
	],

];
