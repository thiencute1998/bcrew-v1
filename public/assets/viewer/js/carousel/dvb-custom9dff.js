( function() {
    var isWebkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
        isOpera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
        isIe     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

    if ( ( isWebkit || isOpera || isIe ) && document.getElementById && window.addEventListener ) {
        window.addEventListener( 'hashchange', function() {
            var id = location.hash.substring( 1 ),
                element;

            if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
                return;
            }

            element = document.getElementById( id );

            if ( element ) {
                if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
                    element.tabIndex = -1;
                }

                element.focus();
            }
        }, false );
    }
})();

// thay đổi thẻ a link cho ảnh

(function($){
  AOS.init({
   duration: 1200,
  });
})(jQuery);
(function($){

  $(window).scroll(function() {
    var e = $("header.site-header").height();
    if ($(this).scrollTop() > e) {
      $("header.site-header").css("height", e);
      $(".header-nav").addClass("fixed-menu")
    } else {
      $(".header-nav").removeClass("fixed-menu")
    }
  });
  /*---------------------------------------------------
  /*  Menu Mobile
  /* -------------------------------------------------*/
  $('.button_menu,.over_wrap').click(function() {
    jQuery('html').toggleClass('openMenu')
  });
    jQuery(document).ready(function(){
      jQuery('#navigation li').removeClass('active');
    });
  /*---------------------------------------------------
  /*  Vertical menus toggles
  /* -------------------------------------------------*/
  jQuery('#navigation').addClass('toggle-menu');
  jQuery('.toggle-menu ul.dropdown-menu, .toggle-menu ul.children').addClass('toggle-submenu');
  jQuery('.toggle-menu ul.dropdown-menu').parent().addClass('toggle-menu-item-parent');

  jQuery('.toggle-menu .toggle-menu-item-parent').append('<span class="toggle-caret"><i class="fa fa-angle-down"></i></span>');

  jQuery('.toggle-caret').click(function(e) {
      e.preventDefault();
      jQuery(this).parent().toggleClass('active').children('.toggle-submenu').slideToggle('fast');
  });
})(jQuery);
(function($){

        $(document).ready(function() {
            var sync1 = $(".sync1");
            var sync2 = $(".sync2");
            var slidesPerPage = 4; //globaly define number of elements per page
            var syncedSecondary = true;
            sync1.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: true,
                video:true,
                autoplay: false, 
                mouseDrag:false,
                touchDrag:false,
                pullDrag:false,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200,
                navText: [''],
            }).on('changed.owl.carousel', syncPosition);
            sync2
                .on('initialized.owl.carousel', function() {
                    sync2.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: false,
                    nav: true,
                    video:true,
                    smartSpeed: 200,
                    items: 5,
                    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                    margin:20,
                    slideSpeed: 500,
                    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                    responsiveRefreshRate: 100,
                    responsiveClass:true,
                    responsive:{
                        0:{
                            items:2,
                            nav:true
                        },
                        420:{
                            items:2,
                            nav:true
                        },
                        500:{
                            items:3,
                            nav:true
                        },
                        600:{
                            items:3,
                            nav:true
                        },
                        1000:{
                            items:3,
                            nav:true,
                            loop:true
                        },
                        1199:{
                            items:5,
                            nav:true,
                            loop:false
                        }
                    }
                }).on('changed.owl.carousel', syncPosition2);
            function syncPosition(el) {
                //if you set loop to false, you have to restore this next line
                //var current = el.item.index;
                //if you disable loop you have to comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);
                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }
                //end block
                sync2
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = sync2.find('.owl-item.active').length - 1;
                var start = sync2.find('.owl-item.active').first().index();
                var end = sync2.find('.owl-item.active').last().index();
                if (current > end) {
                    sync2.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync2.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }
            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync1.data('owl.carousel').to(number, 100, true);
                }
            }
            sync2.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = $(this).index();
                sync1.data('owl.carousel').to(number, 300, true);
            });
        });
        $(document).ready(function() {
            var sync3 = $(".sync3");
            var sync4 = $(".sync4");
            var slidesPerPage = 4; //globaly define number of elements per page
            var syncedSecondary = true;
            sync3.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: true,
                autoplay: false, 
                mouseDrag:false,
                touchDrag:false,
                pullDrag:false,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200,
                navText: [''],
            }).on('changed.owl.carousel', syncPosition);
            sync4
                .on('initialized.owl.carousel', function() {
                    sync4.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: false,
                    nav: true,
                    smartSpeed: 200,
                    items: 5,
                    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                    margin:20,
                    slideSpeed: 500,
                    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                    responsiveRefreshRate: 100,
                    responsiveClass:true,
                    responsive:{
                        0:{
                            items:2,
                            nav:true
                        },
                        420:{
                            items:2,
                            nav:true
                        },
                        500:{
                            items:3,
                            nav:true
                        },
                        600:{
                            items:3,
                            nav:true
                        },
                        1000:{
                            items:3,
                            nav:true,
                            loop:true
                        },
                        1199:{
                            items:5,
                            nav:true,
                            loop:false
                        }
                    }
                }).on('changed.owl.carousel', syncPosition2);
            function syncPosition(el) {
                //if you set loop to false, you have to restore this next line
                //var current = el.item.index;
                //if you disable loop you have to comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);
                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }
                //end block
                sync4
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = sync4.find('.owl-item.active').length - 1;
                var start = sync4.find('.owl-item.active').first().index();
                var end = sync4.find('.owl-item.active').last().index();
                if (current > end) {
                    sync4.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync4.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }
            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync3.data('owl.carousel').to(number, 100, true);
                }
            }
            sync4.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = $(this).index();
                sync3.data('owl.carousel').to(number, 300, true);
            });
        });
        $(document).ready(function() {
            var sync5 = $(".sync5");
            var sync6 = $(".sync6");
            var slidesPerPage = 4; //globaly define number of elements per page
            var syncedSecondary = true;
            sync5.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: true,
                autoplay: false, 
                mouseDrag:false,
                touchDrag:false,
                pullDrag:false,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200,
                navText: [''],
            }).on('changed.owl.carousel', syncPosition);
            sync6
                .on('initialized.owl.carousel', function() {
                    sync6.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: false,
                    nav: true,
                    smartSpeed: 200,
                    items: 5,
                    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                    margin:20,
                    slideSpeed: 500,
                    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                    responsiveRefreshRate: 100,
                    responsiveClass:true,
                    responsive:{
                        0:{
                            items:2,
                            nav:true
                        },
                        420:{
                            items:2,
                            nav:true
                        },
                        500:{
                            items:3,
                            nav:true
                        },
                        600:{
                            items:3,
                            nav:true
                        },
                        1000:{
                            items:3,
                            nav:true,
                            loop:true
                        },
                        1199:{
                            items:5,
                            nav:true,
                            loop:false
                        }
                    }
                }).on('changed.owl.carousel', syncPosition2);
            function syncPosition(el) {
                //if you set loop to false, you have to restore this next line
                //var current = el.item.index;
                //if you disable loop you have to comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);
                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }
                //end block
                sync6
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = sync6.find('.owl-item.active').length - 1;
                var start = sync6.find('.owl-item.active').first().index();
                var end = sync6.find('.owl-item.active').last().index();
                if (current > end) {
                    sync6.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync6.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }
            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync5.data('owl.carousel').to(number, 100, true);
                }
            }
            sync6.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = $(this).index();
                sync5.data('owl.carousel').to(number, 300, true);
            });
        });
        $(document).ready(function() {
            var sync7 = $(".sync7");
            var sync8 = $(".sync8");
            var slidesPerPage = 4; //globaly define number of elements per page
            var syncedSecondary = true;
            sync7.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: true,
                autoplay: false, 
                mouseDrag:false,
                touchDrag:false,
                pullDrag:false,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200,
                navText: [''],
            }).on('changed.owl.carousel', syncPosition);
            sync8
                .on('initialized.owl.carousel', function() {
                    sync8.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: false,
                    nav: true,
                    smartSpeed: 200,
                    items: 5,
                    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                    margin:20,
                    slideSpeed: 500,
                    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                    responsiveRefreshRate: 100,
                    responsiveClass:true,
                    responsive:{
                        0:{
                            items:2,
                            nav:true
                        },
                        420:{
                            items:2,
                            nav:true
                        },
                        500:{
                            items:3,
                            nav:true
                        },
                        600:{
                            items:3,
                            nav:true
                        },
                        1000:{
                            items:3,
                            nav:true,
                            loop:true
                        },
                        1199:{
                            items:5,
                            nav:true,
                            loop:false
                        }
                    }
                }).on('changed.owl.carousel', syncPosition2);
            function syncPosition(el) {
                //if you set loop to false, you have to restore this next line
                //var current = el.item.index;
                //if you disable loop you have to comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);
                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }
                //end block
                sync8
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = sync8.find('.owl-item.active').length - 1;
                var start = sync8.find('.owl-item.active').first().index();
                var end = sync8.find('.owl-item.active').last().index();
                if (current > end) {
                    sync8.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync8.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }
            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync7.data('owl.carousel').to(number, 100, true);
                }
            }
            sync8.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = $(this).index();
                sync7.data('owl.carousel').to(number, 300, true);
            });
        });
        $(document).ready(function() {
            var sync9 = $(".sync9");
            var sync10 = $(".sync10");
            var slidesPerPage = 4; //globaly define number of elements per page
            var syncedSecondary = true;
            sync9.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: true,
                autoplay: false, 
                mouseDrag:false,
                touchDrag:false,
                pullDrag:false,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200,
                navText: [''],
            }).on('changed.owl.carousel', syncPosition);
            sync10
                .on('initialized.owl.carousel', function() {
                    sync10.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: false,
                    nav: true,
                    smartSpeed: 200,
                    items: 5,
                    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                    margin:20,
                    slideSpeed: 500,
                    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                    responsiveRefreshRate: 100,
                    responsiveClass:true,
                    responsive:{
                        0:{
                            items:2,
                            nav:true
                        },
                        420:{
                            items:2,
                            nav:true
                        },
                        500:{
                            items:3,
                            nav:true
                        },
                        600:{
                            items:3,
                            nav:true
                        },
                        1000:{
                            items:3,
                            nav:true,
                            loop:true
                        },
                        1199:{
                            items:5,
                            nav:true,
                            loop:false
                        }
                    }
                }).on('changed.owl.carousel', syncPosition2);
            function syncPosition(el) {
                //if you set loop to false, you have to restore this next line
                //var current = el.item.index;
                //if you disable loop you have to comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);
                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }
                //end block
                sync10
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = sync10.find('.owl-item.active').length - 1;
                var start = sync10.find('.owl-item.active').first().index();
                var end = sync10.find('.owl-item.active').last().index();
                if (current > end) {
                    sync10.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync10.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }
            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync9.data('owl.carousel').to(number, 100, true);
                }
            }
            sync10.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = $(this).index();
                sync9.data('owl.carousel').to(number, 300, true);
            });
        });
        $(document).ready(function() {
            var sync11 = $(".sync11");
            var sync12 = $(".sync12");
            var slidesPerPage = 4; //globaly define number of elements per page
            var syncedSecondary = true;
            sync11.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: true,
                autoplay: false, 
                mouseDrag:false,
                touchDrag:false,
                pullDrag:false,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200,
                navText: [''],
            }).on('changed.owl.carousel', syncPosition);
            sync12
                .on('initialized.owl.carousel', function() {
                    sync12.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: false,
                    nav: true,
                    smartSpeed: 200,
                    items: 5,
                    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                    margin:20,
                    slideSpeed: 500,
                    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                    responsiveRefreshRate: 100,
                    responsiveClass:true,
                    responsive:{
                        0:{
                            items:2,
                            nav:true
                        },
                        420:{
                            items:2,
                            nav:true
                        },
                        500:{
                            items:3,
                            nav:true
                        },
                        600:{
                            items:3,
                            nav:true
                        },
                        1000:{
                            items:3,
                            nav:true,
                            loop:true
                        },
                        1199:{
                            items:5,
                            nav:true,
                            loop:false
                        }
                    }
                }).on('changed.owl.carousel', syncPosition2);
            function syncPosition(el) {
                //if you set loop to false, you have to restore this next line
                //var current = el.item.index;
                //if you disable loop you have to comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);
                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }
                //end block
                sync12
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = sync12.find('.owl-item.active').length - 1;
                var start = sync12.find('.owl-item.active').first().index();
                var end = sync12.find('.owl-item.active').last().index();
                if (current > end) {
                    sync12.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync12.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }
            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync11.data('owl.carousel').to(number, 100, true);
                }
            }
            sync12.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = $(this).index();
                sync11.data('owl.carousel').to(number, 300, true);
            });
        });
        $(document).ready(function() {
            var sync13 = $(".sync13");
            var sync14 = $(".sync14");
            var slidesPerPage = 4; //globaly define number of elements per page
            var syncedSecondary = true;
            sync13.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: true,
                autoplay: false, 
                mouseDrag:false,
                touchDrag:false,
                pullDrag:false,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200,
                navText: [''],
            }).on('changed.owl.carousel', syncPosition);
            sync14
                .on('initialized.owl.carousel', function() {
                    sync14.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: false,
                    nav: true,
                    smartSpeed: 200,
                    items: 5,
                    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                    margin:20,
                    slideSpeed: 500,
                    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                    responsiveRefreshRate: 100,
                    responsiveClass:true,
                    responsive:{
                        0:{
                            items:2,
                            nav:true
                        },
                        420:{
                            items:2,
                            nav:true
                        },
                        500:{
                            items:3,
                            nav:true
                        },
                        600:{
                            items:3,
                            nav:true
                        },
                        1000:{
                            items:3,
                            nav:true,
                            loop:true
                        },
                        1199:{
                            items:5,
                            nav:true,
                            loop:false
                        }
                    }
                }).on('changed.owl.carousel', syncPosition2);
            function syncPosition(el) {
                //if you set loop to false, you have to restore this next line
                //var current = el.item.index;
                //if you disable loop you have to comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);
                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }
                //end block
                sync14
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = sync14.find('.owl-item.active').length - 1;
                var start = sync14.find('.owl-item.active').first().index();
                var end = sync14.find('.owl-item.active').last().index();
                if (current > end) {
                    sync14.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync14.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }
            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync13.data('owl.carousel').to(number, 100, true);
                }
            }
            sync14.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = $(this).index();
                sync13.data('owl.carousel').to(number, 300, true);
            });
        });
        $(document).ready(function() {
            var sync15 = $(".sync15");
            var sync16 = $(".sync16");
            var slidesPerPage = 4; //globaly define number of elements per page
            var syncedSecondary = true;
            sync15.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: true,
                autoplay: false, 
                mouseDrag:false,
                touchDrag:false,
                pullDrag:false,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200,
                navText: [''],
            }).on('changed.owl.carousel', syncPosition);
            sync16
                .on('initialized.owl.carousel', function() {
                    sync16.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: false,
                    nav: true,
                    smartSpeed: 200,
                    items: 5,
                    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                    margin:20,
                    slideSpeed: 500,
                    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                    responsiveRefreshRate: 100,
                    responsiveClass:true,
                    responsive:{
                        0:{
                            items:2,
                            nav:true
                        },
                        420:{
                            items:2,
                            nav:true
                        },
                        500:{
                            items:3,
                            nav:true
                        },
                        600:{
                            items:3,
                            nav:true
                        },
                        1000:{
                            items:3,
                            nav:true,
                            loop:true
                        },
                        1199:{
                            items:5,
                            nav:true,
                            loop:false
                        }
                    }
                }).on('changed.owl.carousel', syncPosition2);
            function syncPosition(el) {
                //if you set loop to false, you have to restore this next line
                //var current = el.item.index;
                //if you disable loop you have to comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);
                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }
                //end block
                sync16
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = sync16.find('.owl-item.active').length - 1;
                var start = sync16.find('.owl-item.active').first().index();
                var end = sync16.find('.owl-item.active').last().index();
                if (current > end) {
                    sync16.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync16.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }
            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync15.data('owl.carousel').to(number, 100, true);
                }
            }
            sync16.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = $(this).index();
                sync15.data('owl.carousel').to(number, 300, true);
            });
        });
        $(document).ready(function() {
            var sync17 = $(".sync17");
            var sync18 = $(".sync18");
            var slidesPerPage = 4; //globaly define number of elements per page
            var syncedSecondary = true;
            sync17.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: true,
                autoplay: false, 
                mouseDrag:false,
                touchDrag:false,
                pullDrag:false,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200,
                navText: [''],
            }).on('changed.owl.carousel', syncPosition);
            sync18
                .on('initialized.owl.carousel', function() {
                    sync18.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: false,
                    nav: true,
                    smartSpeed: 200,
                    items: 5,
                    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                    margin:20,
                    slideSpeed: 500,
                    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                    responsiveRefreshRate: 100,
                    responsiveClass:true,
                    responsive:{
                        0:{
                            items:2,
                            nav:true
                        },
                        420:{
                            items:2,
                            nav:true
                        },
                        500:{
                            items:3,
                            nav:true
                        },
                        600:{
                            items:3,
                            nav:true
                        },
                        1000:{
                            items:3,
                            nav:true,
                            loop:true
                        },
                        1199:{
                            items:5,
                            nav:true,
                            loop:false
                        }
                    }
                }).on('changed.owl.carousel', syncPosition2);
            function syncPosition(el) {
                //if you set loop to false, you have to restore this next line
                //var current = el.item.index;
                //if you disable loop you have to comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);
                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }
                //end block
                sync18
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = sync18.find('.owl-item.active').length - 1;
                var start = sync18.find('.owl-item.active').first().index();
                var end = sync18.find('.owl-item.active').last().index();
                if (current > end) {
                    sync18.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync18.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }
            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync17.data('owl.carousel').to(number, 100, true);
                }
            }
            sync18.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = $(this).index();
                sync17.data('owl.carousel').to(number, 300, true);
            });
        });
})(jQuery);
jQuery(document).ready(function(){
    jQuery('.owl-slider').owlCarousel({
        items:1,
        lazyLoad: true,
        loop:true,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:false,
        smartSpeed:450,
        dots:true,
        nav:true,
        navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    });    
});

// back to top
jQuery( document ).ready( function() {
    jQuery( window ).scroll( function () {
        if ( jQuery( this ).scrollTop() > 100 ) {
            jQuery( '#topcontrol').css( { bottom: "85px" } );
        } else {
            jQuery( '#topcontrol' ).css( { bottom: "-100px" } );
        }
    } );

    jQuery( '#topcontrol' ).click( function() {
        jQuery( 'html, body' ).animate( { scrollTop: '0px' }, 800 );
        return false;
    } );
} );
jQuery('document').ready(function($){
    $(".entry-image-gallery").twentytwenty();
});
jQuery('document').ready(function($) {
    $(window).ready(function(){
        function onReady(callback) {
          var intervalId = window.setInterval(function() {
            if (document.getElementsByTagName('body')[0] !== undefined) {
              window.clearInterval(intervalId);
              callback.call(this);
            }
          }, 3000);
        }

        function setVisible(selector, visible) {
          document.querySelector(selector).style.display = visible ? 'block' : 'none';
        }

        onReady(function() {
            if ($('#js-loading').length) {
                setVisible('#js-loading', false);
            }
        });
   });
   $(window).load(function(){
        $(".nav-tabs a[href^='#tab_']").click(function(){
            setTimeout(function() {
                $(window).trigger("resize.twentytwenty");
            }, 300);
            
        });

   });
});