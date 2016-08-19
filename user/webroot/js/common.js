//---------------------------------------------------------------------------------------------
//hover
//---------------------------------------------------------------------------------------------
function rollOverFn(){
    var imgNum=document.getElementsByTagName("img");
    var inputNum=document.getElementsByTagName("input");
    overNum=new Array;
    for(i=0;i<imgNum.length;i++){overNum[i]=imgNum[i];}
    for(i=0;i<inputNum.length;i++){overNum[i+imgNum.length]=inputNum[i];}
    for(i=0;i<overNum.length;i++){
        if(overNum[i].className.indexOf("js-rollOver")!=-1){
            overNum[i].overimg=new Image();
            if(overNum[i].className.indexOf(":")!=-1){
                Replace=overNum[i].className.split(":");
                Replace=Replace[1].split(" ");
                overNum[i].overimg.src=Replace[0];
            }else{
                Replace = overNum[i].src.length;
                overNum[i].overimg.src=overNum[i].src.substring(0,Replace-4)+"_hover"+overNum[i].src.substring(Replace-4,Replace);
            }
            overNum[i].setAttribute("out",overNum[i].src);
            overNum[i].onmouseover=new Function('this.src=this.overimg.src;');
            overNum[i].onmouseout=new Function('this.src=this.getAttribute("out");');
        }
    }
}
window.onload=rollOverFn;


$(function () {


    //---------------------------------------------------------------------------------------------
    //autoHeight
    //---------------------------------------------------------------------------------------------




    $.fn.autoHeight = function(options){
        var op = $.extend({

            column  : 0,
            clear   : 0,
            height  : 'minHeight',
            reset   : '',
            descend : function descend (a,b){ return b-a; }

        },options || {}); // optionsに値があれば上書きする

        var self = $(this);
        var n = 0,
            hMax,
            hList = new Array(),
            hListLine = new Array();
            hListLine[n] = 0;

        // 要素の高さを取得
        self.each(function(i){
            if (op.reset == 'reset') {
                $(this).removeAttr('style');
            }
            var h = $(this).height();
            hList[i] = h;
            if (op.column > 1) {
                // op.columnごとの最大値を格納していく
                if (h > hListLine[n]) {
                    hListLine[n] = h;
                }
                if ( (i > 0) && (((i+1) % op.column) == 0) ) {
                    n++;
                    hListLine[n] = 0;
                };
            }
        });

        // 取得した高さの数値を降順に並べ替え
        hList = hList.sort(op.descend);
        hMax = hList[0];

        // 高さの最大値を要素に適用
        var ie6 = typeof window.addEventListener == "undefined" && typeof document.documentElement.style.maxHeight == "undefined";
        if (op.column > 1) {
            for (var j=0; j<hListLine.length; j++) {
                for (var k=0; k<op.column; k++) {
                    if (ie6) {
                        self.eq(j*op.column+k).height(hListLine[j]);
                    } else {
                        self.eq(j*op.column+k).css(op.height,hListLine[j]);
                    }
                    if (k == 0 && op.clear != 0) {
                        self.eq(j*op.column+k).css('clear','both');
                    }
                }
            }
        } else {
            if (ie6) {
                self.height(hMax);
            } else {
                self.css(op.height,hMax);
            }
        }
    };





  var $elem = $('.switch');
  var sp = '_sp.';
  var pc = '_pc.';
  var brakePoint = 768;

  function imageSwitch() {
    var windowWidth = parseInt($(window).width());

    $elem.each(function() {
      var $this = $(this);
      if(windowWidth >= brakePoint) {
        $this.attr('src', $this.attr('src').replace(sp, pc));

      } else {
        $this.attr('src', $this.attr('src').replace(pc, sp));
      }
    });
  }
  imageSwitch();

  var resizeTimer;
  $(window).on('resize', function() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function() {
      imageSwitch();
    }, 200);
  });



  if($(window).width() < brakePoint) {

      var $setElm = $('.seminarList h2');
      var cutFigure = '40'; // カットする文字数
      var afterTxt = ' …'; // 文字カット後に表示するテキスト
   
      $setElm.each(function(){
          var textLength = $(this).text().length;
          var textTrim = $(this).text().substr(0,(cutFigure))
   
          if(cutFigure < textLength) {
              $(this).html(textTrim + afterTxt).css({visibility:'visible'});
          } else if(cutFigure >= textLength) {
              $(this).css({visibility:'visible'});
          }
      });


      $(".seminarDetail .teacherBox .title").on("click",function(){
        $(this).next(".inner").slideToggle();
        $(this).toggleClass("on");
      })


      $(".seminarCategoryMenu .select").on("click",function(){
        $(".seminarCategoryMenu ul").toggle();
        $(this).toggleClass("on");
      })



  }else{
          $(".articleArea .title").autoHeight({column:2,height : 'height'});
          $(".articleArea .status").autoHeight({column:2});
          $(".seminarTopArea .seminarTopList h3").autoHeight({column:4,clear:1});
  }



    var slideArea = $("#js-slider");

    if(slideArea[0]){
      if(slideArea.find("li").length > 1){
        var slider = slideArea.bxSlider({
            slideWidth: 1200,
            slideMargin: 1,
            auto: true,
            pause: 5000,
            speed: 1000,
            pager: false, //ページャーの有無
            nextText: "次へ",
            prevText: "前へ",
            onSliderLoad: function(){
                var w = 0;
                $("#js-slider > li").each(function(){
                    w += $(this).outerWidth(true);
                }).parent().css("width", w);
            },
            onSlideAfter: function(){
                slider.startAuto();
            }
        });
      }
    }

    var newsArea = $("#js-news ul");
    if(newsArea[0]){
      if(newsArea.find("li").length > 1){
        var newsSlider = newsArea.bxSlider({
            mode: 'fade',
            slideWidth: 900,
            slideMargin: 1,
            auto: true,
            pause: 3000,
            speed: 500,
            pager: false, //ページャーの有無
            nextText: "次へ",
            prevText: "前へ",
        });
      }
    }

  $(".js-houseDetail").colorbox({
    iframe:true,
    width:"90%",
    height:"80%",
    opacity: 0.6
  });


    var ua = navigator.userAgent;
    console.log($(window).width());
    if($(window).width() <= brakePoint) {
        $('span[data-action=call]').each(function() {
            var $ele = $(this);
            $ele.wrap('<a href="tel:' + $ele.data('tel') + '"></a>');
        });
    }



})
