<?php
/**
 * PlatesViewServiceProvider class.
 *
 * Extends `\Hybrid\View\ViewServiceProvider` for Plates v4 PHP templating engine.
 *
 * @link http://platesphp.com/v4-alpha/
 * @package CXL
 */

namespace CXL\Providers;

use Hybrid\Contracts\View\View as ViewContract;
use CXL\View\PlatesView;

/**
 * View provider class.
 *
 * @since  5.0.0
 * @access public
 */
class PlatesViewServiceProvider extends \Hybrid\View\ViewServiceProvider {

	/**
	 * Binds the implementation of the view contract to the container.
	 *
	 * @since  5.0.0
	 * @access public
	 * @return void
	 */
	public function register(): void {

		$this->app->bind( ViewContract::class, PlatesView::class );

		$this->app->alias( ViewContract::class, 'view' );

	}

}
