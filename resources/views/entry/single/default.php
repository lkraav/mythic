<article <?php Hybrid\Attr\display( 'entry' ) ?>>

	<header class="entry__header">
		<?php Hybrid\Post\display_title() ?>
	</header>

	<div class="entry__content">
		<?php the_content() ?>
		<?php $view->insert( 'nav/pagination/post' ); ?>
	</div>

</article>
