<?php

return [

    // 默认支付网关
    'default' => 'alipay',

    // 各个支付网关配置
    'gateways' => [
        'paypal' => [
            'driver' => 'PayPal_Express',
            'options' => [
                'solutionType' => '',
                'landingPage' => '',
                'headerImageUrl' => ''
            ]
        ],

        'alipay' => [
            // Alipay_Express 支付宝即时到账接口
            // Alipay_Secured 支付宝担保交易接口
            // Alipay_Dual 支付宝双功能交易接口
            // Alipay_WapExpress 支付宝WAP客户端接口
            // Alipay_MobileExpress 支付宝无线支付接口
            // Alipay_Bank 支付宝网银快捷接口
            
            // Alipay_Express 支付宝即时到账接口
            //https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.euiY2m&treeId=62&articleId=104743&docType=1#s4
            'driver' => 'Alipay_Express',
            
            //担保交易-已下架
            //文档地址：https://cshall.alipay.com/support/help_detail.htm?help_id=491081
            //'driver' => 'Alipay_Secured',
            
            'options' => [
                'partner' => '2016122604640449',
                'key' => 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDDI6d306Q8fIfCOaTXyiUeJHkrIvYISRcc73s3vF1ZT7XN8RNPwJxo8pWaJMmvyTn9N4HQ632qJBVHf8sxHi/fEsraprwCtzvzQETrNRwVxLO5jVmRGi60j8Ue1efIlzPXV9je9mkjzOmdssymZkh2QhUrCmZYI/FCEa3/cNMW0QIDAQAB',
                'sellerEmail' =>'jye313@gmail.com',
                'returnUrl' => 'http://mia.c/user/cartOrder/alipayResult',
                'notifyUrl' => 'http://mia.c/user/alipay/notify'
            ]
        ]
    ]

];