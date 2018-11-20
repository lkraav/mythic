<?php if ( is_active_sidebar( $sidebar ) ) : ?>

	<aside <?php Hybrid\Attr\display( 'sidebar', $sidebar ) ?>>

		<h3 class="sidebar__title screen-reader-text">
			<?php Hybrid\Sidebar\display_name( $sidebar ) ?>
		</h3>

		<?php dynamic_sidebar( $sidebar ) ?>

	</aside>

<?php endif ?>
