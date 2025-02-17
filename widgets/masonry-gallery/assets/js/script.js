jQuery( window ).on(
	"elementor/frontend/init",
	function () {
		var e = elementorModules.frontend.handlers.Base.extend(
			{
				bindEvents: function () {
					this.change();
				},
				change: function () {
					0 < jQuery( "body" ).find( ".elementor-widget-wpmozo_ae_masonry_gallery > .elementor-widget-container" ).length &&
					jQuery( ".elementor-widget-wpmozo_ae_masonry_gallery > .elementor-widget-container" ).each(
						function () {
							let t = jQuery( this ).find( ".wpmozo_ae_masonry_gallery_wrapper" );
							t.find( ".wpmozo_ae_masonry_gallery_item" ).hasClass( "wpmozo_ae_masonry_gallery_item_with_lightbox" ) &&
							((e = "elementor-element-" + t.closest( ".elementor-widget-wpmozo_ae_masonry_gallery" ).data( "id" )),
							t.magnificPopup(
								{
									delegate: ".wpmozo_ae_masonry_gallery_item_with_lightbox",
									type: "image",
									closeOnContentClick: ! 1,
									closeBtnInside: ! 1,
									mainClass: "elementor-element mfp-with-zoom mfp-img-mobile wpmozo_ae_masonry_gallery_lightbox " + e,
									prependTo: t.closest( ".elementor" ),
									zoom: {
										enabled: ! 0,
										duration: 300,
										easing: "ease-in-out",
										opener: function (e) {
											return e.is( "img" ) ? e : e.find( "img" );
										},
									},
									gallery: { enabled: ! 0, tPrev: "", tNext: "", tCounter: "" },
									image: {
										markup:
										'<div class="mfp-figure"><div class="mfp-close"></div><div class="mfp-img"></div><div class="mfp-bottom-bar ' +
										t.find( ".wpmozo_ae_masonry_gallery_title_caption_wrapper" ).attr( "class" ) +
										'"><div class="mfp-title"></div></div></div>',
										titleSrc: function (e) {
											return 0 < e.el.find( ".wpmozo_ae_masonry_gallery_title_caption_wrapper" ).length ? e.el.find( ".wpmozo_ae_masonry_gallery_title_caption_wrapper" ).html() : "";
										},
										tError: '<a href="%url%">The image</a> could not be loaded.',
									},
								}
							));
							jQuery(window).on('load', function(){
								console.log("hello elicus.");
								t.imagesLoaded(
									function () {
										var e = t.isotope(
											{
												itemSelector: ".wpmozo_ae_masonry_gallery_item",
												transformsEnabled : ! 1,
												layoutMode: "masonry",
												percentPosition: ! 0,
												resize: ! 0,
												masonry: { columnWidth: ".wpmozo_ae_masonry_gallery_item", gutter: ".wpmozo_ae_masonry_gallery_item_gutter" },
											}
										);
										e.isotope( 'layout' ); e.isotope( 'reloadItems' );
									}
								)
							});
						}
					);
				},
			}
		);
		elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_masonry_gallery", e );
	}
);