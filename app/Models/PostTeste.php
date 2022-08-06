<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class PostTeste {

	public $title;

	public $excerpt;

	public $date;

	public $slug;

	public $body;

	public function __construct($title, $excerpt, $date, $slug, $body) {

		$this->title = $title;
		$this->excerpt = $excerpt;
		$this->date = $date;
		$this->slug = $slug;
		$this->body = $body;
	}

	public static function all() {

		return collect(File::files(resource_path("posts")))
			->map(fn($file) => YamlFrontMatter::parseFile($file))
			->map(fn($document) => new PostTeste (
				$document->title,
				$document->excerpt,
				$document->date,
				$document->slug,
				$document->body()
			));
		// $files = File::files(resource_path("posts/"));

		// return array_map(function($file){
		// 	return $file->getContents();
		// }, $files);

	}

	public static function find($slug) {

		return static::all()->firstWhere('slug', $slug);


		// //CASO NÃO EXISTA O ARQUIVO
		// if(!file_exists($path = resource_path("posts/{$slug}.html"))) {
		// 	throw new ModelNotFoundException();
		// }

		// //GRAVA NO CACHE POR 3600s E RETORNA O CONTEUDO DO POST
		// return cache()->remember("posts.{$slug}", 3600, function () use ($path) {
  //       	return file_get_contents($path);
    	// });
	}

	public static function findOrFail($slug) {

		$post = static::find($slug);

		if (! $post) {
			throw new ModelNotFoundException();
		}

		return $post;
	}
}
