jQuery(document).ready(function($) { 
	
	var editing = $( 'html.fl-builder-edit' ).length,
		header  = $( '.fl-builder-content[data-type=header]' ),
		$gwd_win = $(window);
		
	if ( ! editing && header.length && $gwd_win.width() <= 992 ) {

		header.imagesLoaded( $.proxy( function() {

			$gwd_body   	 = $( 'body' );
			$gwd_header 	 = header.eq( 0 );
			$gwd_overlay     = !! Number( header.attr( 'data-overlay' ) );
			$gwd_hasAdminBar = !! $( 'body.admin-bar' ).length;

			if ( Number( header.attr( 'data-sticky' ) ) ) {

				$gwd_header.data( 'original-top', $gwd_header.offset().top );
				//$gwd_win.on( 'resize', $.throttle( 500, $.proxy( $gwd__initSticky, this ) ) );
				$(window).on('scroll', function(){
					console.log('scroll watcher');
					doSticky();
				} );
				doSticky();

				if ( Number( header.attr( 'data-shrink' ) ) ) {
					$gwd_header.data( 'original-height', $gwd_header.outerHeight() );
					$(window).on('scroll', function(){
						console.log('shrink watcher');
						doShrink();
					} );
					//$gwd_win.on( 'resize', $.throttle( 500, $.proxy( $gwd__initShrink, this ) ) );
					doShrink();
				}
			}

		}, this ) );
	}
	
	function doSticky(){
		var winTop    		  = $gwd_win.scrollTop(),
			headerTop 		  = $gwd_header.data( 'original-top' ),
			hasStickyClass    = $gwd_header.hasClass( 'fl-theme-builder-header-sticky' ),
			hasScrolledClass  = $gwd_header.hasClass( 'fl-theme-builder-header-scrolled' );

		if ( $gwd_hasAdminBar ) {
			winTop += 32;
		}

		if ( winTop >= headerTop ) {
			if ( ! hasStickyClass ) {
				$gwd_header.addClass( 'fl-theme-builder-header-sticky' );
				if ( ! $gwd_overlay ) {
					$gwd_body.css( 'padding-top', $gwd_header.outerHeight() + 'px' );
				}
			}
		}
		else if ( hasStickyClass ) {
			$gwd_header.removeClass( 'fl-theme-builder-header-sticky' );
			$gwd_body.css( 'padding-top', '0' );
		}

		if ( winTop > headerTop ) {
			if ( ! hasScrolledClass ) {
				$gwd_header.addClass( 'fl-theme-builder-header-scrolled' );
			}
		} else if ( hasScrolledClass ) {
			$gwd_header.removeClass( 'fl-theme-builder-header-scrolled' );
		}
	}
	
	function doShrink(){
		var winTop 	  	 = $gwd_win.scrollTop(),
			headerTop 	 = $gwd_header.data( 'original-top' ),
			headerHeight = $gwd_header.data( 'original-height' ),
			hasClass     = $gwd_header.hasClass( 'fl-theme-builder-header-shrink' );

		if ( $gwd_hasAdminBar ) {
			winTop += 32;
		}

		if ( winTop > headerTop + headerHeight ) {

			if ( ! hasClass ) {

				$gwd_header.addClass( 'fl-theme-builder-header-shrink' );

				$gwd_header.find( '.fl-row-content-wrap' ).each( function() {

					var row = $( this );

					if ( parseInt( row.css( 'padding-bottom' ) ) > 5 ) {
						row.addClass( 'fl-theme-builder-header-shrink-row-bottom' );
					}

					if ( parseInt( row.css( 'padding-top' ) ) > 5 ) {
						row.addClass( 'fl-theme-builder-header-shrink-row-top' );
					}
				} );

				$gwd_header.find( '.fl-module-content' ).each( function() {

					var module = $( this );

					if ( parseInt( module.css( 'margin-bottom' ) ) > 5 ) {
						module.addClass( 'fl-theme-builder-header-shrink-module-bottom' );
					}

					if ( parseInt( module.css( 'margin-top' ) ) > 5 ) {
						module.addClass( 'fl-theme-builder-header-shrink-module-top' );
					}
				} );
			}
		} else if ( hasClass ) {
			removeShrink();
		}
	}

		/**
		 * Removes the header shrink effect.
		 *
		 * @since 1.0
		 * @access private
		 * @method _removeShrink
		 */
	function removeShrink(){
		var rows    = $gwd_header.find( '.fl-row-content-wrap' ),
			modules = $gwd_header.find( '.fl-module-content' );

		rows.removeClass( 'fl-theme-builder-header-shrink-row-bottom' );
		rows.removeClass( 'fl-theme-builder-header-shrink-row-top' );
		modules.removeClass( 'fl-theme-builder-header-shrink-module-bottom' );
		modules.removeClass( 'fl-theme-builder-header-shrink-module-top' );
		$gwd_header.removeClass( 'fl-theme-builder-header-shrink' );
	}
});