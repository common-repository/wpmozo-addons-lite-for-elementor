(function ($) {
    $(window).on("elementor/frontend/init", function () {
        var WPMOZOImageMagnifier = elementorModules.frontend.handlers.Base.extend({
            bindEvents: function () {
                this.change();
            },
            change: function () {               
                $(document).ready(function() {
                    $("body").find(".wpmozo_image_magnifier").length > 0 && $("body").find(".wpmozo_image_magnifier").each(function() {
                        $(this).find(".zoom").magnify({
                            speed: $(this).find(".zoom").attr("data-magnify-speed")
                        });                        
                    })
                });
            },
        });
        elementorFrontend.elementsHandler.attachHandler("wpmozo_ae_image_magnifier", WPMOZOImageMagnifier);
    });
})(jQuery);
