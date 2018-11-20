<?php $view->layout( 'layouts/default' ); ?>

<div class="app-content">

	<main id="main" class="app-main">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php $view->insert( 'entry/single/default' ); ?>

				<?php comments_template() ?>

			<?php endwhile ?>

		<?php endif ?>

	</main>

	<?php $view->insert( 'sidebar/default', [ 'sidebar' => 'primary' ] ) ?>

</div>
