(function(){var f=this;var k=parseFloat("0.002"),aa=isNaN(k)||1<k||0>k?0:k;var ha=/^true$/.test("true")?!0:!1;var r=String.prototype.trim?function(a){return a.trim()}:function(a){return a.replace(/^[\s\xa0]+|[\s\xa0]+$/g,"")},t=function(a,b){return a<b?-1:a>b?1:0};var u;a:{var v=f.navigator;if(v){var w=v.userAgent;if(w){u=w;break a}}u=""};var A=function(a){A[" "](a);return a};A[" "]=function(){};var B=function(a,b){for(var d in a)Object.prototype.hasOwnProperty.call(a,d)&&b.call(void 0,a[d],d,a)};var ia=-1!=u.indexOf("Opera"),C=-1!=u.indexOf("Trident")||-1!=u.indexOf("MSIE"),ja=-1!=u.indexOf("Edge"),D=-1!=u.indexOf("Gecko")&&!(-1!=u.toLowerCase().indexOf("webkit")&&-1==u.indexOf("Edge"))&&!(-1!=u.indexOf("Trident")||-1!=u.indexOf("MSIE"))&&-1==u.indexOf("Edge"),ka=-1!=u.toLowerCase().indexOf("webkit")&&-1==u.indexOf("Edge"),E=function(){var a=f.document;return a?a.documentMode:void 0},F;
a:{var G="",H=function(){var a=u;if(D)return/rv\:([^\);]+)(\)|;)/.exec(a);if(ja)return/Edge\/([\d\.]+)/.exec(a);if(C)return/\b(?:MSIE|rv)[: ]([^\);]+)(\)|;)/.exec(a);if(ka)return/WebKit\/(\S+)/.exec(a);if(ia)return/(?:Version)[ \/]?(\S+)/.exec(a)}();H&&(G=H?H[1]:"");if(C){var I=E();if(null!=I&&I>parseFloat(G)){F=String(I);break a}}F=G}
var J=F,K={},L=function(a){if(!K[a]){for(var b=0,d=r(String(J)).split("."),c=r(String(a)).split("."),e=Math.max(d.length,c.length),g=0;0==b&&g<e;g++){var h=d[g]||"",l=c[g]||"",m=RegExp("(\\d*)(\\D*)","g"),q=RegExp("(\\d*)(\\D*)","g");do{var n=m.exec(h)||["","",""],p=q.exec(l)||["","",""];if(0==n[0].length&&0==p[0].length)break;b=t(0==n[1].length?0:parseInt(n[1],10),0==p[1].length?0:parseInt(p[1],10))||t(0==n[2].length,0==p[2].length)||t(n[2],p[2])}while(0==b)}K[a]=0<=b}},M=f.document,la=M&&C?E()||
("CSS1Compat"==M.compatMode?parseInt(J,10):5):void 0;var N;if(!(N=!D&&!C)){var O;if(O=C)O=9<=Number(la);N=O}N||D&&L("1.9.1");C&&L("9");var ma=function(){this.b={};this.a={};this.c=!1;for(var a=[1,2,3],b=0,d=a.length;b<d;++b)this.a[a[b]]=""},Q=function(a){var b=P;return b.a.hasOwnProperty(a)?b.a[a]:""},na=function(){var a=P,b=[];B(a.b,function(a,c){b.push(c)});B(a.a,function(a){""!=a&&b.push(a)});return b};var P,R="google_conversion_id google_conversion_format google_conversion_type google_conversion_order_id google_conversion_language google_conversion_value google_conversion_currency google_conversion_domain google_conversion_label google_conversion_color google_disable_viewthrough google_remarketing_only google_remarketing_for_search google_conversion_items google_custom_params google_conversion_date google_conversion_time google_conversion_js_version onload_callback opt_image_generator google_conversion_page_url google_conversion_referrer_url".split(" ");
function S(a){return null!=a?"3455583315"==(P?Q(2):"")?encodeURIComponent(a.toString()):escape(a.toString()):""}function T(a){return null!=a?a.toString().substring(0,512):""}function U(a,b){var d=S(b);if(""!=d){var c=S(a);if(""!=c)return"&".concat(c,"=",d)}return""}function V(a){var b=typeof a;return null==a||"object"==b||"function"==b?null:String(a).replace(/,/g,"\\,").replace(/;/g,"\\;").replace(/=/g,"\\=")}
function oa(a){var b;if((a=a.google_custom_params)&&"object"==typeof a&&"function"!=typeof a.join){var d=[];for(b in a)if(Object.prototype.hasOwnProperty.call(a,b)){var c=a[b];if(c&&"function"==typeof c.join){for(var e=[],g=0;g<c.length;++g){var h=V(c[g]);null!=h&&e.push(h)}c=0==e.length?null:e.join(",")}else c=V(c);(e=V(b))&&null!=c&&d.push(e+"="+c)}b=d.join(";")}else b="";return""==b?"":"&".concat("data=",encodeURIComponent(b))}
function pa(a){if(null!=a){a=a.toString();if(2==a.length)return U("hl",a);if(5==a.length)return U("hl",a.substring(0,2))+U("gl",a.substring(3,5))}return""}function W(a){return"number"!=typeof a&&"string"!=typeof a?"":S(a.toString())}
function qa(a){if(!a)return"";a=a.google_conversion_items;if(!a)return"";for(var b=[],d=0,c=a.length;d<c;d++){var e=a[d],g=[];e&&(g.push(W(e.value)),g.push(W(e.quantity)),g.push(W(e.item_id)),g.push(W(e.adwords_grouping)),g.push(W(e.sku)),b.push("("+g.join("*")+")"))}return 0<b.length?"&item="+b.join(""):""}
function ra(a,b,d){var c=[];if(a){var e=a.screen;e&&(c.push(U("u_h",e.height)),c.push(U("u_w",e.width)),c.push(U("u_ah",e.availHeight)),c.push(U("u_aw",e.availWidth)),c.push(U("u_cd",e.colorDepth)));a.history&&c.push(U("u_his",a.history.length))}d&&"function"==typeof d.getTimezoneOffset&&c.push(U("u_tz",-d.getTimezoneOffset()));b&&("function"==typeof b.javaEnabled&&c.push(U("u_java",b.javaEnabled())),b.plugins&&c.push(U("u_nplug",b.plugins.length)),b.mimeTypes&&c.push(U("u_nmime",b.mimeTypes.length)));
return c.join("")}function sa(a){a=a?a.title:"";if(void 0==a||""==a)return"";var b=function(a){try{return decodeURIComponent(a),!0}catch(b){return!1}};a=encodeURIComponent(a);for(var d=128;!b(a.substr(0,d));)d--;return"&tiba="+a.substr(0,d)}
function X(a,b,d,c){var e="";if(b){var g;if(a.top==a)g=0;else{var h=a.location.ancestorOrigins;if(h)g=h[h.length-1]==a.location.origin?1:2;else{h=a.top;try{var l;if(l=!!h&&null!=h.location.href)c:{try{A(h.foo);l=!0;break c}catch(m){}l=!1}g=l}catch(m){g=!1}g=g?1:2}}a=d?d:1==g?a.top.location.href:a.location.href;e+=U("frm",g);e+=U("url",T(a));e+=U("ref",T(c||b.referrer))}return e}
function Y(a,b){return!(ha||b&&ta.test(navigator.userAgent))||a&&a.location&&a.location.protocol&&"https:"==a.location.protocol.toString().toLowerCase()?"https:":"http:"}var ta=/Android ([01]\.|2\.[01])/i,Z=function(a,b){var d=b.createElement("iframe");d.style.display="none";d.src=Y(a,!1)+"//bid.g.doubleclick.net/xbbe/pixel?d=KAE";b.body.appendChild(d)};function ua(){return new Image}
function va(a,b,d){var c=ua;"function"===typeof a.opt_image_generator&&(c=a.opt_image_generator);c=c();b+=U("async","1");c.src=b;c.onload=d&&"function"===typeof a.onload_callback?a.onload_callback:function(){}}function wa(a,b){"376635471"==(P?Q(3):"")&&("complete"===b.readyState?Z(a,b):a.addEventListener?a.addEventListener("load",function(){Z(a,b)}):a.attachEvent("onload",function(){Z(a,b)}))}
function xa(a){for(var b=window,d={},c=function(c){d[c]=a&&null!=a[c]?a[c]:b[c]},e=0;e<R.length;e++)c(R[e]);c("onload_callback");return d};window.google_trackConversion=function(a){a=xa(a);a.google_conversion_format=3;var b;var d=window,c=navigator,e=document,g=!1;if(a&&3==a.google_conversion_format){try{var h;"landing"==a.google_conversion_type||!a.google_conversion_id||a.google_remarketing_only&&a.google_disable_viewthrough?h=!1:(a.google_conversion_date=new Date,a.google_conversion_time=a.google_conversion_date.getTime(),a.google_conversion_snippets="number"==typeof a.google_conversion_snippets&&0<a.google_conversion_snippets?a.google_conversion_snippets+
1:1,"number"!=typeof a.google_conversion_first_time&&(a.google_conversion_first_time=a.google_conversion_time),a.google_conversion_js_version="8",0!=a.google_conversion_format&&1!=a.google_conversion_format&&2!=a.google_conversion_format&&3!=a.google_conversion_format&&(a.google_conversion_format=1),P=new ma,h=!0);if(h){if(a.google_remarketing_only&&P){h=P;var l=["376635470","376635471"];if(!h.c&&h.a.hasOwnProperty(3)&&""==h.a[3]){var m,q,n;b:{try{var p=window.top.location.hash;if(p){var ba=p.match(/\bdeid=([\d,]+)/);
n=ba&&ba[1]||"";break b}}catch(ca){}n=""}var da=n.match(new RegExp("\\b("+l.join("|")+")\\b"));q=da&&da[0]||null;var x;if(q)x=q;else b:{if(!(1E-4>Math.random())){var y=Math.random();if(y<aa){q=window;try{var ea=new Uint32Array(1);q.crypto.getRandomValues(ea);y=ea[0]/65536/65536}catch(ca){y=Math.random()}x=l[Math.floor(y*l.length)];break b}}x=null}(m=x)&&""!=m&&h.a.hasOwnProperty(3)&&(h.a[3]=m)}}m="/?";"landing"==a.google_conversion_type&&(m="/extclk?");var fa,ya=[a.google_remarketing_only?"viewthroughconversion/":
"conversion/",S(a.google_conversion_id),m,"random=",S(a.google_conversion_time)].join(""),ga=a.google_remarketing_only?"googleads.g.doubleclick.net":a.google_conversion_domain||"www.googleadservices.com";fa=Y(d,/www[.]googleadservices[.]com/i.test(ga))+"//"+ga+"/pagead/"+ya;var z;z=[U("cv",a.google_conversion_js_version),U("fst",a.google_conversion_first_time),U("num",a.google_conversion_snippets),U("fmt",a.google_conversion_format),U("value",a.google_conversion_value),U("currency_code",a.google_conversion_currency),
U("label",a.google_conversion_label),U("oid",a.google_conversion_order_id),U("bg",a.google_conversion_color),pa(a.google_conversion_language),U("guid","ON"),U("disvt",a.google_disable_viewthrough),U("eid",na().join()),qa(a),ra(d,c,a.google_conversion_date),oa(a),X(d,e,a.google_conversion_page_url,a.google_conversion_referrer_url),a.google_remarketing_for_search&&!a.google_conversion_domain?"&srr=n":"",sa(e)].join("");va(a,fa+z,!0);if(a.google_remarketing_for_search&&!a.google_conversion_domain){var za=
Math.floor(1E9*Math.random()),Aa,Ba=[S(a.google_conversion_id),"/?random=",za].join("");z=Aa=Y(d,!1)+"//www.google.com/ads/user-lists/"+Ba;b=[U("label",a.google_conversion_label),U("fmt","3"),X(d,e,a.google_conversion_page_url,a.google_conversion_referrer_url)].join("");va(a,z+b,!1)}a.google_remarketing_only&&wa(d,e);g=!0}}catch(ca){}b=g}else b=!1;return b};}).call(this);
