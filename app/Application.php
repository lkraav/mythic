<?php
/**
 * Application class.
 *
 * We want to have a custom list of default providers.
 *
 * @package CXL
 */

namespace CXL;

class Application extends \Hybrid\Core\Application {

	protected function registerDefaultProviders() {

		array_map( function( $provider ) {
			$this->provider( $provider );
		}, [
			\Hybrid\Attr\AttrServiceProvider::class,
			\Hybrid\Lang\LanguageServiceProvider::class,
			\Hybrid\Media\MetaServiceProvider::class,
			\Hybrid\Template\HierarchyServiceProvider::class,
			\Hybrid\Template\TemplatesServiceProvider::class,
			Providers\PlatesViewServiceProvider::class,
		] );

	}

}
