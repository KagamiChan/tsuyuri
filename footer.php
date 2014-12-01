<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package tsuyuri
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'tsuyuri' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'tsuyuri' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'tsuyuri' ), 'tsuyuri', '<a href="http://kagami.moe" rel="designer">Seki Kagami</a>' ); ?>
			<span class="sep"> | </span>托管于 <a href="https://www.linode.com/?r=d4c7f3d8ab048130904fefe6d7dd68f80b861223" rel="host reference">Linode</a>
			<br/>
			2013-<script>document.write(new Date().getFullYear());</script> 鏡 ＠ がんばらないプロジェクト/翠星製作所
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
