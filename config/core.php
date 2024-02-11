<?php

require __DIR__ . '/../vendor/autoload.php';

use xy2z\Capro\ViewTemplate;

if (!function_exists('get_cats')) {
	function get_cats(int $limit = 10) {
		$client = new \GuzzleHttp\Client();
		try {
			$response = $client->request('GET', 'https://cataas.com/api/cats?skip=0&limit=' . $limit);
		} catch (\Exception $e) {
			echo 'Cat API site is down :( ';
			return [
				[
					'id' => '404',
					'tags' => 'down',
				],
			];
			// exit;
			// exit('cat site is down :(');
		}
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
}


return [

	// ViewTemplate (demo)
	'templates' => [

		// Cats
		new ViewTemplate(
			label: 'cats',
			template_view: 'cat_template', // Points to: `views/templates/cat_template.blade.php`
			result_path: '/demo/cats/{id}',
			items: get_cats(5),
		),
	],

];
