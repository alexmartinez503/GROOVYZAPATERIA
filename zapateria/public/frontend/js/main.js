
$(document).ready(function(){
	"use strict";

	var window_width 	 = $(window).width(),
	window_height 		 = window.innerHeight,
	header_height 		 = $(".default-header").height(),
	header_height_static = $(".site-header.static").outerHeight(),
	fitscreen 			 = window_height - header_height;


	$(".fullscreen").css("height", window_height)
    $(".fitscreen").css("height", fitscreen);


    $('select').niceSelect();


    $('.navbar-nav li.dropdown').hover(function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });

    $('.img-pop-up').magnificPopup({
        type: 'image',
        gallery:{
        enabled:true
        }
    });

    $("#search_input_box").hide();
    $("#search").on("click", function () {
        $("#search_input_box").slideToggle();
        $("#search_input").focus();
    });
    $("#close_search").on("click", function () {
        $('#search_input_box').slideUp(500);
    });

		$(".sticky-header").sticky();

    $(".active-banner-slider").owlCarousel({
        items:1,
        autoplay:false,
        autoplayTimeout: 5000,
        loop:true,
        nav:true,
        navText:["<img src='{{asset('assets/img/banner/prev.png')}}'>","<img src='{{asset('assets/img/banner/next.png')}}'>"],
        dots:false
    });

    $(".active-product-area").owlCarousel({
        items:1,
        autoplay:false,
        autoplayTimeout: 5000,
        loop:true,
        nav:true,
        navText:["<img src='{{asset('assets/img/banner/prev.png')}}''>","<img src='{{asset('assets/img/banner/next.png')}}'>>"],
        dots:false
    });

    $(".s_Product_carousel").owlCarousel({
      items:1,
      autoplay:false,
      autoplayTimeout: 5000,
      loop:true,
      nav:false,
      dots:true
    });
    

    $(".active-exclusive-product-slider").owlCarousel({
        items:1,
        autoplay:false,
        autoplayTimeout: 5000,
        loop:true,
        nav:true,
        navText:["<img src='{{asset('assets/img/banner/prev.png')}}'>","<img src='{{asset('assets/img/banner/next.png')}}'>>"],
        dots:false
    });

    $('.collapse').on('shown.bs.collapse', function(){
        $(this).parent().find(".lnr-arrow-right").removeClass("lnr-arrow-right").addClass("lnr-arrow-left");
    }).on('hidden.bs.collapse', function(){
        $(this).parent().find(".lnr-arrow-left").removeClass("lnr-arrow-left").addClass("lnr-arrow-right");
    });


  $('.main-menubar a[href*="#"]')
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
      if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
        && 
        location.hostname == this.hostname
      ) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
          event.preventDefault();
          $('html, body').animate({
            scrollTop: target.offset().top-70
          }, 1000, function() {

            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) { 
              return false;
            } else {
              $target.attr('tabindex','-1'); 
              $target.focus(); 
            };
          });
        }
      }
    });



      // -------   No creo que ocupen Ajax pero Ok jajajja

         $(document).ready(function() {
            var form = $('#booking'); // Form contacto
            var submit = $('.submit-btn'); // submit
            var alert = $('.alert-msg'); // alertas /  div

            
            form.on('submit', function(e) {
                e.preventDefault(); 

                $.ajax({
                    url: 'booking.php', 
                    type: 'POST', 
                    dataType: 'html', 
                    data: form.serialize(), 
                    beforeSend: function() {
                        alert.fadeOut();
                        submit.html('Sending....'); // cambiando estado  
                    },
                    success: function(data) {
                        alert.html(data).fadeIn(); 
                        form.trigger('reset'); // reset form
                        submit.attr("style", "display: none !important");; // reset submit
                    },
                    error: function(e) {
                        console.log(e)
                    }
                });
            });
        });




    $(document).ready(function() {
        $('#mc_embed_signup').find('form').ajaxChimp();
    });   



     if(document.getElementById("js-countdown")){

        var countdown = new Date("October 17, 2018");

        function getRemainingTime(endtime) {
            var milliseconds = Date.parse(endtime) - Date.parse(new Date());
            var seconds = Math.floor(milliseconds / 1000 % 60);
            var minutes = Math.floor(milliseconds / 1000 / 60 % 60);
            var hours = Math.floor(milliseconds / (1000 * 60 * 60) % 24);
            var days = Math.floor(milliseconds / (1000 * 60 * 60 * 24));

        return {
            'total': milliseconds,
            'seconds': seconds,
            'minutes': minutes,
            'hours': hours,
            'days': days
            };
        }

        function initClock(id, endtime) {
            var counter = document.getElementById(id);
            var daysItem = counter.querySelector('.js-countdown-days');
            var hoursItem = counter.querySelector('.js-countdown-hours');
            var minutesItem = counter.querySelector('.js-countdown-minutes');
            var secondsItem = counter.querySelector('.js-countdown-seconds');

        function updateClock() {
            var time = getRemainingTime(endtime);

            daysItem.innerHTML = time.days;
            hoursItem.innerHTML = ('0' + time.hours).slice(-2);
            minutesItem.innerHTML = ('0' + time.minutes).slice(-2);
            secondsItem.innerHTML = ('0' + time.seconds).slice(-2);

            if (time.total <= 0) {
              clearInterval(timeinterval);
            }
            }

            updateClock();
            var timeinterval = setInterval(updateClock, 1000);
        }

        initClock('js-countdown', countdown);

  };



      $('.quick-view-carousel-details').owlCarousel({
          loop: true,
          dots: true,
          items: 1,
      })







    $(function(){

        if(document.getElementById("price-range")){
        
        var nonLinearSlider = document.getElementById('price-range');
        
        noUiSlider.create(nonLinearSlider, {
            connect: true,
            behaviour: 'tap',
            start: [ 500, 4000 ],
            range: {
                // Starting at 500, step the value by 500,
                // until 4000 is reached. From there, step by 1000.
                'min': [ 0 ],
                '10%': [ 500, 500 ],
                '50%': [ 4000, 1000 ],
                'max': [ 10000 ]
            }
        });


        var nodes = [
            document.getElementById('lower-value'), // 0
            document.getElementById('upper-value')  // 1
        ];


        
        nonLinearSlider.noUiSlider.on('update', function ( values, handle, unencoded, isTap, positions ) {
            nodes[handle].innerHTML = values[handle];
        });

        }

    });

    


    $('.have-btn').on('click', function(e){
        e.preventDefault();
        $('.have-btn span').text(function(i, text){
          return text === "Have a Coupon?" ? "Close Coupon" : "Have a Coupon?";
        })
        $('.cupon-code').fadeToggle("slow");
    });

    $('.load-more-btn').on('click', function(e){
        e.preventDefault();
        $('.load-product').fadeIn('slow');
        $(this).fadeOut();
    });
    







    var value,
        quantity = document.getElementsByClassName('quantity-container');

    function createBindings(quantityContainer) {
        var quantityAmount = quantityContainer.getElementsByClassName('quantity-amount')[0];
        var increase = quantityContainer.getElementsByClassName('increase')[0];
        var decrease = quantityContainer.getElementsByClassName('decrease')[0];
        increase.addEventListener('click', function () { increaseValue(quantityAmount); });
        decrease.addEventListener('click', function () { decreaseValue(quantityAmount); });
    }

    function init() {
        for (var i = 0; i < quantity.length; i++ ) {
            createBindings(quantity[i]);
        }
    };

    function increaseValue(quantityAmount) {
        value = parseInt(quantityAmount.value, 10);

        console.log(quantityAmount, quantityAmount.value);

        value = isNaN(value) ? 0 : value;
        value++;
        quantityAmount.value = value;
    }

    function decreaseValue(quantityAmount) {
        value = parseInt(quantityAmount.value, 10);

        value = isNaN(value) ? 0 : value;
        if (value > 0) value--;

        quantityAmount.value = value;
    }

  init();



    if ($("#mapBox").length) {
        var $lat = $("#mapBox").data("lat");
        var $lon = $("#mapBox").data("lon");
        var $zoom = $("#mapBox").data("zoom");
        var $marker = $("#mapBox").data("marker");
        var $info = $("#mapBox").data("info");
        var $markerLat = $("#mapBox").data("mlat");
        var $markerLon = $("#mapBox").data("mlon");
        var map = new GMaps({
          el: "#mapBox",
          lat: $lat,
          lng: $lon,
          scrollwheel: false,
          scaleControl: true,
          streetViewControl: false,
          panControl: true,
          disableDoubleClickZoom: true,
          mapTypeControl: false,
          zoom: $zoom,
          styles: [
            {
              featureType: "water",
              elementType: "geometry.fill",
              stylers: [
                {
                  color: "#dcdfe6"
                }
              ]
            },
            {
              featureType: "transit",
              stylers: [
                {
                  color: "#808080"
                },
                {
                  visibility: "off"
                }
              ]
            },
            {
              featureType: "road.highway",
              elementType: "geometry.stroke",
              stylers: [
                {
                  visibility: "on"
                },
                {
                  color: "#dcdfe6"
                }
              ]
            },
            {
              featureType: "road.highway",
              elementType: "geometry.fill",
              stylers: [
                {
                  color: "#ffffff"
                }
              ]
            },
            {
              featureType: "road.local",
              elementType: "geometry.fill",
              stylers: [
                {
                  visibility: "on"
                },
                {
                  color: "#ffffff"
                },
                {
                  weight: 1.8
                }
              ]
            },
            {
              featureType: "road.local",
              elementType: "geometry.stroke",
              stylers: [
                {
                  color: "#d7d7d7"
                }
              ]
            },
            {
              featureType: "poi",
              elementType: "geometry.fill",
              stylers: [
                {
                  visibility: "on"
                },
                {
                  color: "#ebebeb"
                }
              ]
            },
            {
              featureType: "administrative",
              elementType: "geometry",
              stylers: [
                {
                  color: "#a7a7a7"
                }
              ]
            },
            {
              featureType: "road.arterial",
              elementType: "geometry.fill",
              stylers: [
                {
                  color: "#ffffff"
                }
              ]
            },
            {
              featureType: "road.arterial",
              elementType: "geometry.fill",
              stylers: [
                {
                  color: "#ffffff"
                }
              ]
            },
            {
              featureType: "landscape",
              elementType: "geometry.fill",
              stylers: [
                {
                  visibility: "on"
                },
                {
                  color: "#efefef"
                }
              ]
            },
            {
              featureType: "road",
              elementType: "labels.text.fill",
              stylers: [
                {
                  color: "#696969"
                }
              ]
            },
            {
              featureType: "administrative",
              elementType: "labels.text.fill",
              stylers: [
                {
                  visibility: "on"
                },
                {
                  color: "#737373"
                }
              ]
            },
            {
              featureType: "poi",
              elementType: "labels.icon",
              stylers: [
                {
                  visibility: "off"
                }
              ]
            },
            {
              featureType: "poi",
              elementType: "labels",
              stylers: [
                {
                  visibility: "off"
                }
              ]
            },
            {
              featureType: "road.arterial",
              elementType: "geometry.stroke",
              stylers: [
                {
                  color: "#d6d6d6"
                }
              ]
            },
            {
              featureType: "road",
              elementType: "labels.icon",
              stylers: [
                {
                  visibility: "off"
                }
              ]
            },
            {},
            {
              featureType: "poi",
              elementType: "geometry.fill",
              stylers: [
                {
                  color: "#dadada"
                }
              ]
            }
          ]
        });
      }


  

 });
