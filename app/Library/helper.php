 
<?php
// 自定义函数
	function func(){
		echo "这是支付";
	}

	// 发送短信校验码
	function sendsphone($p){
		// echo "ojbk";
		//初始化必填
		//填写在开发者控制台首页上的Account Sid
		$options['accountsid']='abfc01b80db4f952f403a3e114614991';
		//填写在开发者控制台首页上的Auth Token
		$options['token']='3930f91fe19a303507fa05f92200bc70';

		//初始化 $options必填
		$ucpass = new Ucpaas($options);
			$appid = "0fa7989df6ad441b817a6570c73a520b";	//应用的ID，可在开发者控制台内的短信产品下查看
			$templateid = "373862";    //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID
			$param = rand(1,10000); //多个参数使用英文逗号隔开（如：param=“a,b,c”），如为参数则留空
			$mobile = $p;
			$uid = "";
		return response()->withCookie('ecode',$param,3);
			//70字内（含70字）计一条，超过70字，按67字/条计费，超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
			echo $ucpass->SendSms($appid,$templateid,$param,$mobile,$uid);

	}


	// 调用支付宝接口
	function pay($out_trade_no,$subject,$total_fee,$body){
	require_once("alipay.config.php");
	require_once("lib/alipay_submit.class.php");

/**************************请求参数**************************/
        //商户订单号，商户网站订单系统中唯一订单号，必填
        // $out_trade_no =time()+rand(1,10000);
        $out_trade_no = $out_trade_no;

        //订单名称，必填
        // $subject ="商品测试";
        $subject = $subject;

        //付款金额，必填
        // $total_fee ="0.01";
        $total_fee = $total_fee;

        //商品描述，可空
        // $body =  "商品测试";
        $body = $body ;





/************************************************************/

//构造要请求的参数数组，无需改动
$parameter = array(
		"service"       => $alipay_config['service'],
		"partner"       => $alipay_config['partner'],
		"seller_id"  => $alipay_config['seller_id'],
		"payment_type"	=> $alipay_config['payment_type'],
		"notify_url"	=> $alipay_config['notify_url'],
		"return_url"	=> $alipay_config['return_url'],
		
		"anti_phishing_key"=>$alipay_config['anti_phishing_key'],
		"exter_invoke_ip"=>$alipay_config['exter_invoke_ip'],
		"out_trade_no"	=> $out_trade_no,
		"subject"	=> $subject,
		"total_fee"	=> $total_fee,
		"body"	=> $body,
		"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
		//其他业务参数根据在线开发文档，添加参数.文档地址:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.kiX33I&treeId=62&articleId=103740&docType=1
        //如"参数名"=>"参数值"
		
);

//建立请求
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
echo $html_text;
}	
?>
