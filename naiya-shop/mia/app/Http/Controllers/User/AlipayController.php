<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Omnipay;

class AlipayController extends Controller
{
    /**
     * 支付宝支付结果返回
     * 方式：异步
     * 放到外面
     */
    public function notify(Request $request){
    
        file_put_contents('./alipay.notify.txt',json_encode($request -> all()));
        /**
            notify_time //通知时间
            out_trade_no //商户网站唯一订单号 64
            subject  //255商品名称
            trade_no //该交易在支付宝系统中的交易流水号。最长64位。
            trade_status //交易状态
            gmt_create //交易创建时间
            gmt_payment //交易付款时间
            gmt_close //交易关闭时间
            buyer_email //100 买家支付宝账号 买家支付宝账号，可以是Email或手机号码
            buyer_id //买家支付宝账户号买家支付宝账号对应的支付宝唯一用户号。 30
            total_fee  //该笔订单的总金额
            is_total_fee_adjust //是否调整总价
            use_coupon //是否在交易过程中使用了红包
            extra_common_param //用于商户回传参数，该值不能包含“=”、“&”等特殊字符。如果用户请求时传递了该参数，则返回给商户时会回传该参数。
            business_scene //是否扫码支付
            回传给商户此标识为qrpay时，表示对应交易为扫码支付。目前只有qrpay一种回传值。非扫码支付方式下，目前不会返回该参数。
        *    
            支付宝是用POST方式发送通知信息
            程序执行完后必须打印输出“success”（不包含引号）。如果商户反馈给支付宝的字符不是success这7个字符，支付宝服务器会不断重发通知，直到超过24小时22分钟
            
            通知触发条件
            TRADE_FINISHED 交易完成 true（触发通知）

            TRADE_SUCCESS 支付成功 true（触发通知）
        */
        
        //支付成功后操作
        $req = $request -> all();
        
        //开启事务
        DB::beginTransaction();
            
        //支付表验证
        $res = DB::table('pay')
               -> where('order_no', $req['out_trade_no'])
               -> firest();
        //判断
        if (!$res)
        {
            //构造数据
            $res = [];
            $res['order_no'] = $req['out_trade_no'];
            $res['subject'] = $req['subject'];
            $res['body'] = $req['body'];
            $res['trade_no'] = $req['trade_no'];
            $res['buyer_email'] = $req['buyer_email'];
            $res['buyer_id'] = $req['buyer_id'];
            $res['total_fee'] = $req['total_fee'];
            $res['extra_common_param'] = $req['extra_common_param'];
            $res['trade_status'] = 2;
            $res['create_at'] = strtotime($req['notify_time']);
            $res['update_at'] = strtotime($req['notify_time']);
            
            //执行插入数据
            $res = DB::table('pay') -> insert($res);
            if (!$res)
            {
                DB::rollBack();
                return '';
                exit;
            }
        }
            
        //更新订单状态
        $res = DB::table('order')
            -> where('order_no', $res['order_no'])
            -> update(['status' => 4]);
        if (!$res)
        {
            DB::rollBack();
            return '';
            exit;
        }
        
        //更新订单详情状态
        $res = DB::table('order_detail')
            -> where('order_no', $res['order_no'])
            -> update(['status' => 4]);
        if (!$res)
        {
            DB::rollBack();
            return '';
            exit;
        }
        
        //用户收到货后由总帐户给商户反钱
        
        //提交
        DB::commit();
        
        return 'success';
    }
}
