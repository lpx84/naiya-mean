﻿function dcsCookie(){typeof dcsOther=="function"?dcsOther():typeof dcsFPC=="function"&&dcsFPC(gTimeZone)}function dcsGetCookie(f){var b=f+"=",g=null;try{var d=document.cookie.indexOf(b);if(d>-1){if(d==0){var a=document.cookie.indexOf(";",d);a==-1&&(a=document.cookie.length),g=unescape(document.cookie.substring(d+b.length,a))}else{d=document.cookie.indexOf("; "+b);if(d>-1){var a=document.cookie.indexOf("; ",d+1);a==-1&&(a=document.cookie.length),g=unescape(document.cookie.substring(d+b.length+2,a))}}}}catch(c){}return g}function dcsGetCrumb(d,b){var f=dcsGetCookie(d).split(":");for(var c=0;c<f.length;c++){var a=f[c].split("=");if(b==a[0]){return a[1]}}return null}function dcsGetIdCrumb(f,b){var g=dcsGetCookie(f),d=g.substring(0,g.indexOf(":lv=")),a=d.split("=");for(var c=0;c<a.length;c++){if(b==a[0]){return a[1]}}return null}function dcsFPC(A){if(typeof A=="undefined"){return}if(document.cookie.indexOf("WTLOPTOUT=")!=-1){return}var G=gFpc,k=new Date,b=k.getTimezoneOffset()*60000+A*3600000;k.setTime(k.getTime()+b);var x=new Date(k.getTime()+63113851500),H=new Date(k.getTime());WT.aid=WT.cid2=WT.cid3=WT.co_f=WT.vtid=WT.vt_f=WT.vt_f_a=WT.vt_f_s=WT.vt_f_d=WT.vt_f_tlh=WT.vt_f_tlv="";var j=new Date;WT.vt_visits=1,WT.vt_spv=0,WT.vt_lsv=k.getTime().toString();if(document.cookie.indexOf(G+"=")==-1){if(typeof gWtId!="undefined"&&gWtId!=""){WT.co_f=gWtId}else{if(typeof gTempWtId!="undefined"&&gTempWtId!=""){WT.co_f=gTempWtId,WT.vt_f="1"}else{WT.co_f="2";var F=k.getTime().toString();for(var D=2;D<=32-F.length;D++){WT.co_f+=Math.floor(Math.random()*16).toString(16)}WT.co_f+=F,WT.vt_f="1"}}typeof gWtAccountRollup=="undefined"&&(WT.vt_f_a="1"),WT.vt_f_s=WT.vt_f_d="1",WT.vt_f_tlh=WT.vt_f_tlv="0",WT.dl==0&&(WT.vt_spv+=1)}else{var z=dcsGetIdCrumb(G,"id"),w=parseInt(dcsGetCrumb(G,"lv")),C=parseInt(dcsGetCrumb(G,"ss")),y=dcsGetCrumb(G,"vs");y!=null&&(WT.vt_visits=parseInt(y));var g=dcsGetCrumb(G,"spv");g!=null&&(WT.vt_spv=parseInt(g));var B=dcsGetCrumb(G,"lsv");B!=null&&(WT.vt_lsv=parseInt(B));if(z==null||z=="null"||isNaN(w)||isNaN(C)){return}WT.co_f=z;var E=new Date(w);WT.vt_f_tlh=Math.floor((E.getTime()-b)/1000),H.setTime(C),k.getTime()>E.getTime()+1800000||k.getTime()>H.getTime()+28800000?(k.getDay()>H.getDay()||k.getMonth()>H.getMonth()||k.getYear()>H.getYear()?WT.vt_visits=1:WT.vt_visits+=1,WT.dl==0?WT.vt_spv=1:WT.vt_spv=0,WT.vt_lsv=H.getTime().toString(),WT.vt_f_tlv=Math.floor((H.getTime()-b)/1000),H.setTime(k.getTime()),WT.vt_f_s="1"):WT.dl==0&&(WT.vt_spv+=1);if(k.getDay()!=E.getDay()||k.getMonth()!=E.getMonth()||k.getYear()!=E.getYear()){WT.vt_f_d="1"}j.setTime(w)}WT.co_f=escape(WT.co_f),WT.vtid=WT.co_f;var q="; expires="+x.toGMTString();document.cookie=G+"=id="+WT.co_f+":lv="+k.getTime().toString()+":ss="+H.getTime().toString()+":lsv="+WT.vt_lsv+":vs="+WT.vt_visits+":spv="+WT.vt_spv+q+"; path=/; domain="+gFpcDom,document.cookie.indexOf(G+"=")==-1&&(WT.co_f=WT.vt_sid=WT.vt_f_s=WT.vt_f_d=WT.vt_f_tlh=WT.vt_f_tlv="",WT.vt_f=WT.vt_f_a="2"),WT.lf_user_name=readLoginUserInfo("__LOGIN"),WT.lf_user_id=readLoginUserInfo("__user_id__"),WT.vt_lv=j.getTime().toString(),WT.vt_cv=k.getTime().toString(),WT.vtvs=(H.getTime()-b).toString(),WT.aid=getlogCookie("aid"),WT.aid&&(WT.aid=encodeURIComponent(WT.aid)),WT.cid2=getlogCookie("cid2"),WT.cid2&&(WT.cid2=encodeURIComponent(WT.cid2)),WT.cid3=getlogCookie("sitefrom"),WT.cid3&&(WT.cid3=encodeURIComponent(WT.cid3))}function dcsOther(){typeof WT.dcsvid!="undefined"&&delete WT.dcsvid;var d="wt_visitor_id";if(typeof DCSext[d]!="undefined"){var b=DCSext[d].replace(/(^\s*)|(\s*$)/g,"").toLowerCase();b!=""&&b!="null"&&(WT.dcsvid=escape(b))}if(typeof WT.dcsvid!="undefined"){var f=new Date,c=new Date(f.getTime()+63113851500),a="; expires="+c.toGMTString();document.cookie=d+"="+DCSext[d]+a+"; path=/"+(typeof gFpcDom!="undefined"&&gFpcDom!=""?"; domain="+gFpcDom:"")}else{var b=dcsGetCookie(d);b!=null&&(b=b.replace(/(^\s*)|(\s*$)/g,"").toLowerCase(),b!=""&&b!="null"&&(WT.dcsvid=escape(b)))}typeof gFpc!="undefined"&&dcsFPC(gTimeZone)}function getlogCookie(f){var b=f+"=",g=null;try{var d=document.cookie.indexOf(b);if(d>-1){if(d==0){var a=document.cookie.indexOf(";",d);a==-1&&(a=document.cookie.length),g=decodeURIComponent(document.cookie.substring(d+b.length,a))}else{d=document.cookie.indexOf("; "+b);if(d>-1){var a=document.cookie.indexOf("; ",d+1);a==-1&&(a=document.cookie.length),g=decodeURIComponent(document.cookie.substring(d+b.length+2,a))}}}}catch(c){}return g}function readLoginUserInfo(b){var a="__TRANSIENT",c=getlogCookie("miauid");if(c!=null&&c!=""){return c}return encodeURIComponent(a)}function dcsEvt(b,a){var c=b.target||b.srcElement;while(c&&c.tagName&&c.tagName.toLowerCase()!=a.toLowerCase()){c=c.parentElement||c.parentNode}return c}function dcsBind(b,a,c){c==0?typeof window[a]=="function"&&document.body&&(document.body.addEventListener?document.body.addEventListener(b,window[a],!0):document.body.attachEvent&&document.body.attachEvent("on"+b,window[a])):c==1&&typeof window[a]=="function"&&window&&(window.addEventListener?window.addEventListener(b,window[a],!0):window.attachEvent&&window.attachEvent("on"+b,window[a]))}function dcsET(){var a="mousedown";dcsBind(a,"dcsFormButton",0),dcsBind(a,"dcsOffsite",0),dcsBind(a,"dcsAnchor",0),dcsBind(a,"dcsJavaScript",0),dcsBind(a,"dcsHotMap",1),dcsBind(a,"dcsNewMap",0),dcsBind("load","pageLoad",1)}function _dcsMultiTrack(){dcsVar();var b;arguments.length!=0&&arguments[0]instanceof LFLog?b=arguments[0].dcsMultiTrack.arguments:b=arguments;if(b==null){return}if(b.length%2==0){for(var a=0;a<b.length;a+=2){b[a].toUpperCase().indexOf("WT.")==0?WT[b[a].substring(3)]=b[a+1]:b[a].toUpperCase().indexOf("DCS.")==0?DCS[b[a].substring(4)]=b[a+1]:b[a].toUpperCase().indexOf("DCSext.")==0&&(DCSext[b[a].substring(7)]=b[a+1])}var c=new Date;DCS.dcsdat=c.getTime(),dcsFunc("dcsCookie"),WT.ti=gI18n?dcsEscape(dcsEncode(WT.ti),I18NRE):WT.ti;if(WT.dl==0||WT.dl=="0"){WT.dl=21}dcsTag()}}function dcsAdv(){dcsFunc("dcsET"),dcsFunc("dcsCookie",!0),dcsFunc("dcsAdSearch"),dcsFunc("dcsTP")}function dcsVar(){gImages=new Array,gIndex=0,DCS=new Object,WT=new Object,DCSext=new Object,gQP=new Array;var g=new Date;WT.tz=g.getTimezoneOffset()/60*-1,WT.tz==0&&(WT.tz="0"),WT.bh=g.getHours(),WT.ul=navigator.appName=="Netscape"?navigator.language:navigator.userLanguage,typeof screen=="object"&&(WT.cd=navigator.appName=="Netscape"?screen.pixelDepth:screen.colorDepth,WT.sr=screen.width+"x"+screen.height),typeof navigator.javaEnabled()=="boolean"&&(WT.jo=navigator.javaEnabled()?"Yes":"No"),document.title&&(WT.ti=gI18n?dcsEscape(dcsEncode(document.title),I18NRE):document.title),WT.js="Yes",WT.jv=dcsJV(),document.body&&document.body.addBehavior&&(document.body.addBehavior("#default#clientCaps"),document.body.addBehavior("#default#homePage"),WT.hp=document.body.isHomePage(location.href)?"1":"0"),parseInt(navigator.appVersion)>3&&(navigator.appName=="Microsoft Internet Explorer"&&document.body?WT.bs=document.body.offsetWidth+"x"+document.body.offsetHeight:navigator.appName=="Netscape"&&(WT.bs=window.innerWidth+"x"+window.innerHeight)),WT.fi="No";if(window.ActiveXObject){for(var c=10;c>0;c--){try{var j=new ActiveXObject("ShockwaveFlash.ShockwaveFlash."+c);WT.fi="Yes",WT.fv=c+".0";break}catch(f){}}}else{if(navigator.plugins&&navigator.plugins.length){for(var c=0;c<navigator.plugins.length;c++){if(navigator.plugins[c].name.indexOf("Shockwave Flash")!=-1){WT.fi="Yes",WT.fv=navigator.plugins[c].description.split(" ")[2];break}}}}gI18n&&(WT.em=typeof encodeURIComponent=="function"?"uri":"esc",typeof document.defaultCharset=="string"?WT.le=document.defaultCharset:typeof document.characterSet=="string"&&(WT.le=document.characterSet)),WT.tv="8.0.2",DCS.dcsdat=g.getTime(),DCS.dcssip=window.location.hostname,DCS.dcsuri=window.location.pathname,WT.es=DCS.dcssip+DCS.dcsuri;var b=window.location.protocol;WT.es.indexOf(b)==-1&&(WT.es=b+"//"+WT.es),WT.dl="0",WT.ssl=window.location.protocol.indexOf("https:")==0?"1":"0";if(window.location.search){DCS.dcsqry=window.location.search;if(gQP.length>0){for(var c=0;c<gQP.length;c++){var d=DCS.dcsqry.indexOf(gQP[c]);if(d!=-1){var h=DCS.dcsqry.substring(0,d),a=DCS.dcsqry.substring(d+gQP[c].length,DCS.dcsqry.length);DCS.dcsqry=h+a}}}}referer(DCS.dcssip+DCS.dcsuri+DCS.dcsqry)}function dcsA(g,k){if(gI18n&&g=="dcsqry"){var d="",b=k.substring(1).split("&");for(var f=0;f<b.length;f++){var l=b[f],c=l.indexOf("=");if(c!=-1){var j=l.substring(0,c),h=l.substring(c+1);f!=0&&(d+="&"),d+=j+"="+dcsEncode(h)}}k=k.substring(0,1)+d}if(gI18n&&g=='dcsref'){return'&'+g+'='+escape(dcsEscape(k,RE))}return"&"+g+"="+dcsEscape(k,RE)}function dcsEscape(c,a){if(typeof a!="undefined"){var d=new String(c);for(var b in a){d=d.replace(a[b],b)}return d}return escape(c)}function dcsEncode(a){return typeof encodeURIComponent=="function"?encodeURIComponent(a):escape(a)}function dcsCreateImage(a){document.images?(gImages[gIndex]=new Image,gImages[gIndex].src=a,gIndex++):document.write('<IMG ALT="" BORDER="0" NAME="DCSIMG" WIDTH="1" HEIGHT="1" SRC="'+a+'">')}function dcsMeta(){var j;document.all?j=document.all.tags("meta"):document.documentElement&&(j=document.getElementsByTagName("meta"));if(typeof j!="undefined"){var m=j.length;for(var d=0;d<m;d++){var b=j.item(d).name,g=j.item(d).content,p=j.item(d).httpEquiv;if(b.length>0){if(b.indexOf("WT.")==0){var c=!1;if(gI18n){var l=["mc_id","oss","ti"];for(var k=0;k<l.length;k++){if(b.toUpperCase().indexOf("WT."+l[k].toUpperCase())==0){c=!0;break}}}WT[b.substring(3)]=c?dcsEscape(dcsEncode(g),I18NRE):g}else{if(b.indexOf("DCSext.")==0){var c=!1;if(gI18n){var l=["wt_visitor_id"];for(var k=0;k<l.length;k++){if(b.indexOf("DCSext."+l[k])==0){c=!0;break}}}DCSext[b.substring(7)]=c?dcsEscape(dcsEncode(g),I18NRE):g}else{b.indexOf("DCS.")==0&&(DCS[b.substring(4)]=gI18n&&b.indexOf("DCS.dcsref")==0?dcsEscape(g,I18NRE):g)}}}else{if(gI18n&&p=="Content-Type"){var h=g.toLowerCase().indexOf("charset=");h!=-1&&(WT.mle=g.substring(h+8))}}}}}function getPageX(e){var t=0,n=document.documentElement,r=document.body;return Math.floor(e.pageX?t=e.pageX:e.clientX&&(t=e.clientX+(n&&n.scrollLeft||r&&r.scrollLeft||0))),t<0&&(t=0),t}function getPageY(e){var t=0,n=document.documentElement,r=document.body;return Math.floor(e.pageY?t=e.pageY:e.clientY&&(t=e.clientY+(n&&n.scrollTop||r&&r.scrollTop||0))),t<0&&(t=0),t}function getPageWidth(){return document.documentElement.clientWidth||document.body.clientWidth||0+document.documentElement.clientLeft||document.body.clientLeft||0}function dcsTag(){if(document.cookie.indexOf("WTLOPTOUT=")!=-1){return}var g="http"+(window.location.protocol.indexOf("https:")==0?"s":"")+"://"+gDomain+(gDcsId==""?"":"/"+gDcsId)+"/dcs.gif?";for(var k in DCS){DCS[k]&&(g+=dcsA(k,DCS[k]))}var d=["co_f","vt_sid","vt_f_tlv"];for(var b=0;b<d.length;b++){var f=d[b];WT[f]&&(g+=dcsA("WT."+f,WT[f]),delete WT[f])}var l;for(k in WT){if(WT[k]){if(k=="ti"){l=WT[k];continue}g+=dcsA("WT."+k,WT[k])}}for(k in DCSext){DCSext[k]&&(g+=dcsA(k,DCSext[k]))}var c="";try{window&&window.top&&window.top.location&&window.top.location.href&&(c=window.top.location.href)}catch(j){}g+=dcsA("WT.top",c);var h=g;typeof l!=undefined&&l&&(h+=dcsA("WT.ti",l)),g.length>2048?g=g.substring(0,2040)+"&WT.tu=1":h.length<2048&&(g=h),dcsCreateImage(g)}function dcsJV(){var I=navigator.userAgent.toLowerCase(),q=parseInt(navigator.appVersion),B=I.indexOf("mac")!=-1,x=I.indexOf("firefox")!=-1,E=I.indexOf("firefox/0.")!=-1,w=I.indexOf("firefox/1.0")!=-1,A=I.indexOf("firefox/1.5")!=-1,k=x&&!E&&!w&!A,L=!x&&I.indexOf("mozilla")!=-1&&I.indexOf("compatible")==-1,H=L&&q==4,D=L&&q>=5,K=I.indexOf("msie")!=-1&&I.indexOf("opera")==-1,F=K&&q==4&&I.indexOf("msie 4")!=-1,z=K&&!F,J=I.indexOf("opera")!=-1,j=I.indexOf("opera 5")!=-1||I.indexOf("opera/5")!=-1,C=I.indexOf("opera 6")!=-1||I.indexOf("opera/6")!=-1,G=J&&!j&&!C,b="1.1";return k?b="1.7":A?b="1.6":E||w||D||G?b="1.5":B&&z||C?b="1.4":z||H||j?b="1.3":F&&(b="1.2"),b}function dcsFunc(a){typeof window[a]=="function"&&window[a]()}function LFLog(){this.dcsMultiTrack=function(){_dcsMultiTrack(this)}}var gDomain="plog.mia.com",gDcsId="a",gHotId="b",gLoadId="c",gMapId="d",gULVM="e",gFpc="WT_FPC",navigationtag="dl,div,table",onsitedoms=/^(\w+\.)?mia\.com$/,gTimeZone=8,gFpcDom=".mia.com";dcsSplit=function(c){var a=c.toLowerCase().split(","),d=a.length;for(var b=0;b<d;b++){a[b]=a[b].replace(/^\s*/,"").replace(/\s*$/,"")}return a},dcsIsOnsite=function(c){if(c.length>0){c=c.toLowerCase();if(c==window.location.hostname.toLowerCase()){return!0}if(typeof onsitedoms.test=="function"){return onsitedoms.test(c)}if(onsitedoms.length>0){var a=dcsSplit(onsitedoms),d=a.length;for(var b=0;b<d;b++){if(c==a[b]){return!0}}}}return!1},dcsNavigation=function(g){var c="",j="",f=dcsSplit(navigationtag),b=f.length,d,h,a;for(d=0;d<b;d++){a=f[d];if(a.length){h=dcsEvt(g,a),c=h&&h.getAttribute&&h.getAttribute("id")?h.getAttribute("id"):"",j=h.className||"";if(c.length||j.length){break}}}return c.length?c:j},dcsAnchor=function(f){f=f||window.event||"";if(f&&(typeof f.which!="number"||f.which==1||f.which==2)){var b=dcsEvt(f,"A");if(b&&b.href){var h=b.hostname?b.hostname.split(":")[0]:"";if(dcsIsOnsite(h)){var d=b.search?b.search.substring(b.search.indexOf("?")+1,b.search.length):"",a=b.pathname?b.pathname.indexOf("/")!=0?"/"+b.pathname:b.pathname:"/",c=b.id;if(b.hash&&b.hash!=""&&b.hash!="#"){_dcsMultiTrack("DCS.dcssip",DCS.dcssip,"DCS.dcsuri",DCS.dcsuri,"DCS.dcsqry",DCS.dcsqry,"WT.ti","Anchor:"+b.hash,"WT.dl","21","WT.nv",dcsNavigation(f),"WT.na",typeof c!=undefined&&c?c:"","WT.hf",b.href)}else{var g=b.innerText?b.innerText:b.textContent;g=g+":"+b.id;_dcsMultiTrack("DCS.dcssip",DCS.dcssip,"DCS.dcsuri",DCS.dcsuri,"DCS.dcsqry",DCS.dcsqry,"DCS.dcsref",DCS.dcsref,"WT.ti","Link:"+g,"WT.dl","21","WT.nv",dcsNavigation(f),"WT.na",typeof c!=undefined&&c?c:"","WT.hf",b.href)}}}}},dcsJavaScript=function(b){b=b||window.event||"";if(b&&(typeof b.which!="number"||b.which==1)){var a=dcsEvt(b,"A");if(a&&a.href&&a.protocol){var c=a.search?a.search.substring(a.search.indexOf("?")+1,a.search.length):"";a.protocol.toLowerCase()=="javascript:"&&_dcsMultiTrack("DCS.dcssip",DCS.dcssip,"DCS.dcsuri",DCS.dcsuri,"DCS.dcsqry",DCS.dcsqry,"WT.ti","JavaScript:"+a.innerHTML,"WT.dl","22","WT.nv",dcsNavigation(b),"WT.hf",a.href)}}},dcsOffsite=function(f){f=f||window.event||"";if(f&&(typeof f.which!="number"||f.which==1)){var b=dcsEvt(f,"A");if(b&&b.href){var g=b.hostname?b.hostname.split(":")[0]:"",d=b.protocol||"";if(g.length>0&&d.indexOf("http")==0&&!dcsIsOnsite(g)){var a=b.search?b.search.substring(b.search.indexOf("?")+1,b.search.length):"",c=b.pathname?b.pathname.indexOf("/")!=0?"/"+b.pathname:b.pathname:"/";_dcsMultiTrack("DCS.dcssip",DCS.dcssip,"DCS.dcsuri",DCS.dcsuri,"DCS.dcsqry",DCS.dcsqry,"DCS.dcsref",DCS.dcsref,"WT.ti","Offsite:"+g+c+(a.length?"?"+a:""),"WT.dl","24","WT.nv",dcsNavigation(f),"WT.hf",b.href)}}}},dcsFormButton=function(g){g=g||window.event||"";if(g&&(typeof g.which!="number"||g.which==1)){var c=["INPUT","BUTTON"];for(var j=0;j<c.length;j++){var f=dcsEvt(g,c[j]),b;f&&(b=f.type||"");if(b&&(b=="submit"||b=="image"||b=="button"||b=="reset")||b=="text"&&(g.which||g.keyCode)==13){var d="",h="",a=0;f.form?(d=f.form.action||window.location.pathname,h=f.form.id||f.form.name||f.form.className||"Unknown",a=f.form.method&&f.form.method.toLowerCase()=="post"?"27":"26"):(d=window.location.pathname,h=f.name||f.id||"Unknown",a=c[j].toLowerCase()=="input"?"28":"29"),d&&h&&g.keyCode!=9&&_dcsMultiTrack("DCS.dcsuri",d,"WT.ti","FormButton:"+h,"WT.dl",a,"WT.nv",dcsNavigation(g));break}}}};var gImages=new Array,gIndex=0,DCS=new Object,WT=new Object,DCSext=new Object,gQP=new Array,gI18n=!0;if(window.RegExp){var RE={"%09":/\t/g,"%20":/ /g,"%23":/\#/g,"%26":/\&/g,"%2B":/\+/g,"%3F":/\?/g,"%5C":/\\/g,"%22":/\"/g,"%7F":/\x7F/g,"%A0":/\xA0/g},I18NRE={"%25":/\%/g}}var referer=function(c){try{var a="";try{if(c){var d=c.indexOf("&referer=");if(d>0){a=c.substring(c.indexOf("&referer=")+"&referer=".length);if(a!=""&&a!="-"){a=smart_referer(a);DCS.dcsref=gI18n?dcsEscape(dcsEncode(a),I18NRE):dcsEncode(a);if(DCS.dcsref.startWith("http%253A%252F%252F")||DCS.dcsref.startWith("https%253A%252F%252F")||DCS.dcsref.startWith("http%3A%2F%2F")||DCS.dcsref.startWith("https%3A%2F%2F")||DCS.dcsref.startWith("http%3A//")||DCS.dcsref.startWith("https%3A//")||DCS.dcsref.startWith("http%253A//")||DCS.dcsref.startWith("https%253A//")||DCS.dcsref.startWith("http%253A%2F%2F")||DCS.dcsref.startWith("https%253A%2F%2F")||DCS.dcsref.startWith("http://")||DCS.dcsref.startWith("https://")){return}DCS.dcsref=""}}else{d=c.indexOf("?referer=");if(d>0){a=c.substring(c.indexOf("?referer=")+"?referer=".length);if(a!=""&&a!="-"){a=smart_referer(a);DCS.dcsref=gI18n?dcsEscape(dcsEncode(a),I18NRE):dcsEncode(a);if(DCS.dcsref.startWith("http%253A%252F%252F")||DCS.dcsref.startWith("https%253A%252F%252F")||DCS.dcsref.startWith("http%3A%2F%2F")||DCS.dcsref.startWith("https%3A%2F%2F")||DCS.dcsref.startWith("http%3A//")||DCS.dcsref.startWith("https%3A//")||DCS.dcsref.startWith("http%253A//")||DCS.dcsref.startWith("https%253A//")||DCS.dcsref.startWith("http%253A%2F%2F")||DCS.dcsref.startWith("https%253A%2F%2F")||DCS.dcsref.startWith("http://")||DCS.dcsref.startWith("https://")){return}DCS.dcsref=""}}}}}catch(b){DCS.dcsref=""}window.document.referrer!=""&&window.document.referrer!="-"&&(navigator.appName=="Microsoft Internet Explorer"&&parseInt(navigator.appVersion)<4||(DCS.dcsref=gI18n?dcsEscape(smart_referer(window.document.referrer),I18NRE):smart_referer(window.document.referrer)))}catch(b){DCS.dcsref=""}};var smart_referer=function(a){try{if(typeof a=='string'&&a.indexOf('baidu.com')>0){var len='?'.length;var i=a.indexOf('?');var url=a.substring(0,i+len);var param=a.substring(i+len);if(undefined==param||$.trim(param)==''){return a}var arr=param.split('&');var r=url;for(var j=0;j<arr.length;j++){var opt=arr[j];if(undefined==opt||$.trim(opt)==''){continue}len='='.length;i=opt.indexOf('=');if(i<=0){if(opt.length>200){continue}else{r+=opt;if(j<arr.length-1){r+='&'}}}else{var n=opt.substring(0,i+len);var v=opt.substring(i+len);if(undefined!=v&&$.trim(v)!=''&&v.length>200){continue}r+=n+v;if(j<arr.length-1){r+='&'}}}console&&console.log(a,'\r\n',r);return r}}catch(e){console&&console.log('smart referer error , msg :'+e)}return a};String.prototype.startWith=function(b){try{return b==null||b==""||this.length==0||b.length>this.length?!1:this.substr(0,b.length)==b?!0:!1}catch(a){}return!1},getBloodlineID=function(f){var b=f,g="",d;while(!!b.parent()&&b[0].tagName!="BODY"){d=String(b.index());for(var a=d.length,c=3;a<c;a++){d="0"+d}g=d+g,b=b.parent()}return g==""?"-1":g},pageLoad=function(){try{var e=window.performance||window.webkitPerformance||window.mozPerformance||window.msPerformance||{};if(e){var t=e.timing;if(t){var n=t.navigationStart,r=t.domainLookupStart,i=t.domainLookupEnd,s=t.connectStart,o=t.connectEnd,u=t.requestStart,a=t.responseStart,f=t.responseEnd,l=t.fetchStart,c=t.domInteractive,h=t.domContentLoadedEventStart,p=t.loadEventStart,d="http"+(window.location.protocol.indexOf("https:")==0?"s":"")+"://"+gDomain+(gLoadId==""?"":"/"+gLoadId)+"/dcs.gif?";DCS.dcssip&&(d+=dcsA("dcssip",DCS.dcssip)),DCS.dcsuri&&(d+=dcsA("dcsuri",DCS.dcsuri)),DCS.dcsqry&&(d+=dcsA("dcsqry",DCS.dcsqry)),d+=dcsA("LT.t01",n?n:0),d+=dcsA("LT.t02",r?r:0),d+=dcsA("LT.t03",i?i:0),d+=dcsA("LT.t04",s?s:0),d+=dcsA("LT.t05",o?o:0),d+=dcsA("LT.t06",u?u:0),d+=dcsA("LT.t07",a?a:0),d+=dcsA("LT.t08",f?f:0),d+=dcsA("LT.t09",l?l:0),d+=dcsA("LT.t10",c?c:0),d+=dcsA("LT.t11",h?h:0),d+=dcsA("LT.t12",p?p:0),navigator.userAgent&&(d+=dcsA("LT.ua",dcsEncode(navigator.userAgent))),dcsCreateImage(d)}}}catch(v){}},window._BI_HOTMAP_CLASS={BIHT_PROPERTY_LAYER:"biht-layer",BIHT_CLASS_SINGLE:"biht-none",bihtCollection:function(e){try{if(!e||!e.target)return null;var t=$(e.target),n=t[0];if(!n.tagName||n==document||n==window)return"";var r=n.tagName,i="BODY",s=$(document.body),o="";e.tagName=r,e.layerX=0,e.layerY=0;if(r!="BODY"&&r!="HTML"){var u="",a,f,l,c,h=!1;r=="A"?o=t.attr("href"):(c=t.parent(),c[0]!==undefined&&c[0].tagName=="A"&&(o=c.attr("href")));while(!!t[0]){n=t[0];if(!n.tagName||n==document.documentElement||n==document||n==window)break;r=n.tagName;if(r=="BODY"||r=="HTML")break;!h&&i=="BODY"&&t.attr(this.BIHT_PROPERTY_LAYER)!==undefined?(a="["+this.BIHT_PROPERTY_LAYER+"]",s=t,h=!0):a="",f=jQuery.trim(t.attr("class")),f.length>0&&(-1!=f.indexOf(this.BIHT_CLASS_SINGLE)?f=this.BIHT_CLASS_SINGLE:f=f.replace(/\s+/g,"."),a=a+"."+f),a=r+a,c=t.parent(),l=c.children(a).index(t),h?i=="BODY"?i=a+":"+(-1<l?l:0):i=a+":"+(-1<l?l:0)+" "+i:u=a+":"+(-1<l?l:0)+" "+u,t=c}e.depth=jQuery.trim(u)}else e.depth=r;i=jQuery.trim(i);if(i!="BODY"||s[0]!=document.body){var p=s.offset();e.layerX=p.left,e.layerY=p.top}e.layer=i,e.layerWidth=Math.round(s.width()),e.layerHeight=Math.round(s.height()),e.href=jQuery.trim(o);var d="http"+(window.location.protocol.indexOf("https:")==0?"s":"")+"://"+gDomain+(gMapId==""?"":"/"+gMapId)+"/dcs.gif?";DCS.dcssip&&(d+=dcsA("dcssip",DCS.dcssip)),DCS.dcsuri&&(d+=dcsA("dcsuri",DCS.dcsuri)),DCS.dcsqry&&(d+=dcsA("dcsqry",DCS.dcsqry)),d+=dcsA("P.d",e.depth),d+=dcsA("P.px",e.pageX),d+=dcsA("P.py",e.pageY),d+=dcsA("P.ox",e.offsetX),d+=dcsA("P.oy",e.offsetY),d+=dcsA("P.lyx",e.layerX),d+=dcsA("P.lyy",e.layerY),d+=dcsA("P.ly",e.layer),d+=dcsA("P.lyw",e.layerWidth),d+=dcsA("P.lyh",e.layerHeight),d+=dcsA("P.tg",e.tagName),d+=dcsA("P.hf",e.href),dcsCreateImage(d)}catch(v){}},bihtNormalizeEvent:function(e){try{var t=Math.round(e.clientX),n=Math.round(e.clientY),r=$(document),i=Math.round(t+r.scrollLeft()),s=Math.round(n+r.scrollTop()),o=$(e.target||e.srcElement),u=o.offset();return{target:o[0],button:1===e.button?0:4===e.button?1:e.button,clientX:t,clientY:n,pageX:i,pageY:s,offsetX:Math.round(Math.max(0,i-u.left)),offsetY:Math.round(Math.max(0,s-u.top))}}catch(a){}},initialize:function(){try{var e=this;document.attachEvent?document.attachEvent("onmousedown",function(t){e.bihtCollection(e.bihtNormalizeEvent(t||window.event))}):document.addEventListener("mousedown",function(t){e.bihtCollection(e.bihtNormalizeEvent(t||window.event))})}catch(t){}}},dcsHotMap=function(e){try{e=e||window.event||"";if(e&&(typeof e.which!="number"||e.which==1||e.which==2)){var t="http"+(window.location.protocol.indexOf("https:")==0?"s":"")+"://"+gDomain+(gHotId==""?"":"/"+gHotId)+"/dcs.gif?";DCS.dcssip&&(t+=dcsA("dcssip",DCS.dcssip)),DCS.dcsuri&&(t+=dcsA("dcsuri",DCS.dcsuri)),DCS.dcsqry&&(t+=dcsA("dcsqry",DCS.dcsqry)),t+=dcsA("P.w",getPageWidth(e)),t+=dcsA("P.x",getPageX(e)),t+=dcsA("P.y",getPageY(e));var n="";typeof screen=="object"&&(n=screen.width+"x"+screen.height),t+=dcsA("P.sr",n);var r=dcsEvt(e,"A");if(r&&r.href){t+=dcsA("P.hf",r.href);var i=r.id;t+=dcsA("P.na",typeof i!=undefined&&i?i:"")}t+=dcsA("P.nv",dcsNavigation(e)),DCS.dcsref&&(t+=dcsA("P.dcsref",DCS.dcsref)),navigator.userAgent&&(t+=dcsA("P.ua",dcsEncode(navigator.userAgent))),dcsCreateImage(t)}}catch(r){}},dcsVar(),dcsMeta(),dcsFunc("dcsAdv"),dcsTag();var _tag=new LFLog;try{$("[bilogattr=addcartbilogclass]").click(function(){var a=$(this).attr("skuid");typeof a!=undefined&&a&&_dcsMultiTrack("WT.ct","button","WT.pid",a,"WT.nu","1")})}catch(e){};try{window._BI_HOTMAP_CLASS.initialize()}catch(e){}