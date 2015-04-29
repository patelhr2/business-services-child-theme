<?php
	while ( have_posts() ){ the_post();
		$content = gdlr_content_filter(get_the_content(), true);
			?>
			<div class="main-content-container container gdlr-item-start-content">
				<div class="gdlr-item gdlr-main-content">
          <div id="document-section">
            <div class="container">
              <div class="inner">
							<?php
							if(!empty($content)){
		              echo $content;
								}
								$args = array(
									'post_type' => 'business_page',
									'nopaging'	=> 'true',
									'order'	=> 'asc'

								);
								$the_query = new WP_Query( $args );

								// The Loop
								if ( $the_query->have_posts() ) {
									while ( $the_query->have_posts() ) {
										$the_query->the_post();
										echo '<div class="business-type">';
											echo '<h3>' . get_the_title() . '</h3>';
											echo '<p>' . get_the_excerpt() . '</p>';
										echo '</div>';
									}
								} else {
									// no posts found
								}
								/* Restore original Post Data */
								wp_reset_postdata();
								?>
              </div>
            </div>
					</div>
			 	</div>
       </div>
      <?php
		}//end while
?>
