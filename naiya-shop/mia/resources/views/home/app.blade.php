@extends('homelayout')
@section('title',$title)
@section('content')

        <link rel="stylesheet" href="{{url('mia/style/main_002.css')}}">
        <style>body{background-color: #fff} .appdown .m1{background: url({{url('mia/images/bd1636c93ef184be6f7937cabfc5949a.jpg')}}) no-repeat center 0;height: 417px;} .appdown .w1004{position: relative;} .appdown .iosdown{position: absolute;left: 413px;top: 228px;width: 208px;height: 54px;} .appdown .androiddown{position: absolute;left: 413px;top: 312px;width: 208px;height: 54px;} .appdown .m2{background: url({{url('mia/images/f4d001aa5a612d1e26fdb5eaec93ca41.jpg')}}) no-repeat center 0;height: 494px;} .appdown .m3{background: url({{url('mia/images/16b46c06f67fd98108132992cbc9d2e9.jpg')}}) no-repeat center 0;height: 463px;} .appdown .m4{background: url({{url('mia/images/e9c266ab710f0ce0271dde2b25ee51d8.jpg')}}) no-repeat center 0;height: 435px;} .appdown .mt{background: url({{url('mia/images/14811054242483.jpg')}}) no-repeat center 0;height: 139px;position: fixed;top: 0;left: 0;width: 100%;display: none} .appdown .mt .w1004 {position: relative;} .appdown .mt .iosdown{left: 112px;top: 40px;} .appdown .mt .androiddown{left:432px;top: 40px;} .footer{padding-top: 0}</style>
        <script>var device = identifyUA();
            switch (device) {
            case "ios":
                document.location.href = '#'
                break;
            case "android":
                document.location.href = "#"
                break;
            default:
            }
            function identifyUA() {
                var userAgent = navigator.userAgent.toLowerCase();
                var platform = '';
                if (userAgent == null || userAgent == '') {
                    platform = 'web';
                } else {
                    if (userAgent.indexOf("android") != -1) {
                        platform = 'android';
                    } else if (userAgent.indexOf("ios") != -1 || userAgent.indexOf("iphone") != -1) {
                        platform = 'ios';
                    } else if (userAgent.indexOf("ipad") != -1) {
                        platform = 'ios';
                    } else if (userAgent.indexOf("windows phone") != -1) {
                        platform = 'windowsphone';
                    } else {
                        platform = 'web';
                    }
                }
                return platform;
            }
            $(document).ready(function() {
                $(window, document).scroll(function(event) {
                    var stop = $(document).scrollTop();
                    var t = 250
                    if (stop > 700) {
                        $('#mtit').slideDown(t);
                    } else {
                        $('#mtit').slideUp(t);
                    }
                });
            });</script>
        <div class="appdown">
            <div class="m1">
                <div class="w1004">
                    <a href="#" title="iPhone系列手机及ipad适用" target="_blank" class="iosdown"></a>
                    <a href="#" title="三星小米索尼华为等android手机适用" target="_blank" class="androiddown"></a>
                </div>
            </div>
            <div class="m2">
                <div class="w1004"></div>
            </div>
            <div class="m3">
                <div class="w1004"></div>
            </div>
            <div class="m4">
                <div class="w1004"></div>
            </div>
            <div class="mt" id="mtit">
                <div class="w1004">
                    <a href="#" title="iPhone系列手机及ipad适用" target="_blank" class="iosdown"></a>
                    <a href="#" title="三星小米索尼华为等android手机适用" target="_blank" class="androiddown"></a>
                </div>
            </div>
        </div>
@endsection
 