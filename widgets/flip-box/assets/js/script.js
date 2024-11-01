(function ($) 
{
    $(window).on('elementor/frontend/init', function () 
    {
    
        var WPMOZOFlipBox = elementorModules.frontend.handlers.Base.extend(
        {

            bindEvents: function () 
            {
                this.onHover();
            },

            onHover: function () 
            {

                if ( jQuery('body').find('.elementor-widget-wpmozo_ae_flip_box').length > 0 ) 
                {
                    jQuery('body').find('.elementor-widget-wpmozo_ae_flip_box').each(function() 
                    {
                        let $this = jQuery(this);
                        var maxHeight = Math.max.apply( null, $this.find('.wpmozo_ae_flipbox_side').map( function() 
                        {
                            return jQuery(this).outerHeight();
                        }).get());

                        jQuery(this).find('.wpmozo_ae_flipbox_side').each(function() 
                        {
                            jQuery(this).css('height', maxHeight+'px');
                        });
                    });
        
                    var directionOne = [ 'top', 'right', 'bottom', 'left' ];
                    var directionTwo = [ 'diagonalLeft', 'diagonalRight', 'diagonalLeftInverted', 'diagonalRightInverted' ];

                    jQuery('body').find('.elementor-widget-wpmozo_ae_flip_box .layout1').each(function() 
                    {

                        var flipDirection = jQuery(this).attr('flip-direction');
                        if ( -1 !== jQuery.inArray( flipDirection, directionOne ) ) 
                        {
                            jQuery(this).find('.wpmozo_ae_flipbox_side').addClass('el-transition');
                        }

                        if ( -1 !== jQuery.inArray( flipDirection, directionTwo ) ) 
                        {
                            jQuery(this).addClass('el-transition');
                            jQuery(this).find('.wpmozo_ae_flipbox_side').addClass('el-transition');
                        }
                    });

                    jQuery('body').find('.elementor-widget-wpmozo_ae_flip_box .layout2').each(function() 
                    {
                        jQuery(this).addClass('el-transition');
                    });
                }


            },

        });

        elementorFrontend.elementsHandler.attachHandler('wpmozo_ae_flip_box', WPMOZOFlipBox);

    });

})(jQuery);