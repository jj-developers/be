!function(e){var t={$wrapper:e(".footer-reveal"),init:function(){this.build(),this.events()},build:function(){var t=this.$wrapper.outerHeight(!0),r=window.innerHeight-theme.adminBarHeight();e("#header .header-main").length&&(r-=e("#header .header-main").height()),t>r?(e(".footer-wrapper").removeClass("footer-reveal"),e(".page-wrapper").css("margin-bottom",0)):(e(".footer-wrapper").addClass("footer-reveal"),e(".page-wrapper").css("margin-bottom",t),document.body.offsetHeight<window.innerHeight&&(document.body.style.paddingBottom="0.1px"))},events:function(){var t=this;e(window).smartresize((function(){t.build()}))}};e(".footer-reveal").get(0)&&t.init()}(jQuery);