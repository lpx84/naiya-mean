(function(e){var d="viewPic",f={baseDom:"body",picwidth:77,picheight:77,callback:null};function b(h,g){this.element=e(h);this.options=e.extend({},f,g);this.baseDom=e(this.options.baseDom);this.viewBlock=e("#viewpic_block").length?e("#viewpic_block"):e('<div id="viewpic_block" class="viewpic_block"><i class="viewpic_arrow"></i><div class="viewpic_con"></div></div>').appendTo(this.options.baseDom);this.basePos={left:this.baseDom.offset().left,top:this.baseDom.offset().top,height:this.baseDom.height()};this.init()}function a(h){var g=h.attr("src");return g.replace(new RegExp("_normal_","g"),"_topic_")}function c(){var g=this.element.offset().top+Math.round(this.options.picheight/3)-this.viewBlock.offset().top-20;this.viewBlock.find(".viewpic_arrow").css({top:g})}b.prototype={init:function(){var g=this;g.element.on("mouseover",function(){g.reposition();g.loadBigPic();g.viewBlock.show()}).on("mouseout",function(){g.viewBlock.hide()})},loadBigPic:function(){var i=this;var h=a(i.element.find("img"));function g(k,l){var j=new Image();j.onload=function(){j.onload=null;l(j)};j.src=k}g(h,function(j){i.viewBlock.find(".viewpic_con").html(e(j));setTimeout(function(){i.reposition(j.height);c.call(i)},0)})},reposition:function(i){var h=Math.round(i/9);var k=this.element.offset().top-h;var j=this.element.offset().left+this.options.picwidth;if(i){var g=e(window).scrollTop();var l=g+e(window).height();if(k<g){k=g+10}else{if(l<k+i-this.options.picheight){k=l-i/0.9+12}}}this.viewBlock.css({top:k,left:j+15})}};e.fn[d]=function(g){return this.each(function(){e.data(this,"plugin_"+d,new b(this,g))})}})(jQuery);