<?php
/**
 * PlatesView class.
 *
 * Extends `\Hybrid\View\View` with Plates v4 PHP templating engine.
 *
 * @link http://platesphp.com/v4-alpha/
 * @package CXL
 */

namespace CXL\View;

use Hybrid\Tools\Collection;
use League\Plates\Engine;
use function Hybrid\Template\locations;

/**
 * PlatesView class.
 *
 * @since  1.0.0
 * @access public
 */
class PlatesView extends \Hybrid\View\View {

    /**
     * Plates engine instance.
     *
     * @since  1.0.0
     * @access protected
     * @var    Engine
     */
    protected $engine = null;

    /**
     * Creates Plates engine.
     *
     * @since  1.0.0
     * @access public
	 * @param  string         $name
	 * @param  array|string   $slugs
	 * @param  object         $data
     * @return object
     */
    public function __construct( string $name, $slugs = [], $data = null ) {

        parent::__construct( $name, $slugs, $data );

        $this->engine = Engine::createWithConfig( [
            'base_dir'                => locations(),
            'ext'                     => 'php',
            'render_context_var_name' => 'view',
            // Hybrid Core already validates.
            'validate_paths'          => false,
        ] );

    }

    /**
     * Displays template using Plates engine.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function display(): void {

        // Compatibility with core WP's template parts.
        $this->templatePartCompat();

        if ( $this->template() ) {

            // Maybe remove core WP's `prepend_attachment`.
            $this->maybeShiftAttachment();

            // Extract the data into individual variables. Each of
            // these variables will be available in the template.
            if ( $this->data instanceof Collection ) {
                echo $this->engine->render( $this->template(), $this->data->all() );
            }

        }

    }

    /**
     * \Hybrid\Template\locate(), returns relative path.
     *
     * Upstream: `$located = $file`
     *
     * @since  1.0.1
     * @access public
     * @return string
     */
    protected function locate(): string {

        $located = '';

        foreach ( (array) $this->hierarchy() as $template ) {

            foreach ( locations() as $location ) {

                $file = trailingslashit( $location ) . $template;

                if ( file_exists( $file ) ) {

                    // Keep relative path input.
                    $located = $template;
                    break 2;
                }
            }
        }

        return $located;

    }

}
