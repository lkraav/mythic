<?php $view->layout( 'layouts/default' ); ?>

<div class="app-content">

	<main id="main" class="app-main">

		<?php $view->insert( 'partials/archive-header' ) ?>

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php $view->insert( 'entry/archive/default' ) ?>

			<?php endwhile ?>

			<?php $view->insert( 'nav/pagination/posts' ) ?>

		<?php endif ?>

	</main>

	<?php $view->insert( 'sidebar/default', [ 'sidebar' => 'primary' ] ) ?>

</div>
