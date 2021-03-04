<?php 
/*Template name: Test*/
get_header(); ?>
<?php if (have_posts()) : the_post(); ?>
	<div id="carrousel" class="pt-4">
        <div class="container" style="width: 740px;">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                  <img src="https://picsum.photos/300/300/?random&1">
                  <img src="https://picsum.photos/300/300/?random&2">
                  <img src="https://picsum.photos/300/300/?random&3">
                  <img src="https://picsum.photos/300/300/?random&4">
                  <img src="https://picsum.photos/300/300/?random&5">
                  <img src="https://picsum.photos/300/300/?random&6">
                  <img src="https://picsum.photos/300/300/?rando&7">
                  <img src="https://picsum.photos/300/300/?random&8">
                </div>
            </div>
        </div>
    </div>
    <style type="text/css">
        #carrousel {
          margin: 10px;
        }
        @media (max-width: 768px) {
          #carrousel {
            margin: 70px 0px 0px 0px;
          }
        }
        @media (max-width: 425px) {
          #carrousel {
            margin: 50px 0px 0px 0px;
          }
        }
        #carrousel .title {
          margin-bottom: 10px;
          font-size: 30px;
        }
        #carrousel .owl-carousel img {
          max-height: 100%;
          max-width: 100%;
          width: auto;
          height: auto;
          position: absolute;
          top: 0;
          bottom: 0;
          left: 0;
          right: 0;
          margin: auto;
          height: 300px;
          object-fit: cover;
          -moz-transition: all 0.2s ease;
          -o-transition: all 0.2s ease;
          -webkit-transition: all 0.2s ease;
          transition: all 0.2s ease;
        }
        #carrousel .owl-carousel .owl-item {
          height: 300px;
          position: relative;
          transform: scale(0.9);
          -ms-transform: scale(0.9);
          transition: all 0.2s;
          -webkit-transform: all 0.2s;
          z-index: 1;
        }
        @media (max-width: 768px) {
          #carrousel .owl-carousel .owl-item {
            height: 270px;
          }
        }
        @media (max-width: 380px) {
          #carrousel .owl-carousel .owl-item {
            height: 200px;
          }
        }
        #carrousel .owl-carousel .owl-stage-outer {
          padding-bottom: 10px;
        }
        #carrousel .owl-item.center {
          transform: scale(1.3);
          -ms-transform: scale(1.3);
          z-index: 3;
        }
        #carrousel .owl-item.medium {
          transform: scale(0.8);
          -ms-transform: scale(0.8);
          z-index: 2;
        }
        #carrousel .owl-item.medium.mdright {
          /*border: solid 1px red;*/
          position: relative;
          left: -30px;
        }
        @media (min-width: 768px) {
          #carrousel .owl-item.medium.mdright {
            left: 0px;
          }
        }
        #carrousel .owl-item.medium.mdleft {
          /*border: solid 1px blue;*/
          position: relative;
          right: -30px;
        }
        @media (min-width: 768px) {
          #carrousel .owl-item.medium.mdleft {
            right: 0px;
          }
        }
        #carrousel .owl-item.smallRight.active {
          transform: scale(0.7);
          -ms-transform: scale(0.7);
          position: relative;
          left: -30px;
        }
        #carrousel .owl-item.smallLeft.active {
          transform: scale(0.9);
          -ms-transform: scale(0.9);
          position: relative;
          right: -30px;
        }
        #carrousel .owl-nav {
          position: absolute;
          top: 30%;
          width: 100%;
        }
        #carrousel .owl-nav .owl-prev {
          position: absolute;
          left: 0px;
          top: 10px;
          background: transparent !important;
          color: #000 !important;
          font-size: 40px !important;
        }
        #carrousel .owl-nav .owl-prev:hover {
          color: #adadad !important;
        }
        #carrousel .owl-nav .owl-next {
          position: absolute;
          right: 0px;
          top: 10px;
          background: transparent !important;
          color: #000 !important;
          font-size: 40px !important;
        }
        #carrousel .owl-nav .owl-next:hover {
          color: #adadad !important;
        }
    </style>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('.owl-carousel').owlCarousel({
              center: true,
              loop: true,
              nav: true,
              items: 3,
              autoHeight:true,
              navText: ['<span class="icon-left-arrow"></span>', '<span class="icon-next-arrow"></span>'],
              onInitialized: coverFlowEfx,
              onTranslate: coverFlowEfx,
            });

            function coverFlowEfx(e){
              if ($('.owl-dots')) {
                $('.owl-dots').remove();
              }
              idx = e.item.index;
              $('.owl-item.big').removeClass('big');
              $('.owl-item.medium').removeClass('medium');
              $('.owl-item.mdright').removeClass('mdright');
              $('.owl-item.mdleft').removeClass('mdleft');
              $('.owl-item.smallRight').removeClass('smallRight');
              $('.owl-item.smallLeft').removeClass('smallLeft');
              $('.owl-item').eq(idx -1).addClass('medium mdleft');
              $('.owl-item').eq(idx).addClass('big');
              $('.owl-item').eq(idx + 1).addClass('medium mdright');
              $('.owl-item').eq(idx + 2).addClass('smallRight');
              $('.owl-item').eq(idx - 2).addClass('smallLeft');
            }

        });
    </script>
<?php endif; ?>
<?php get_footer(); ?>