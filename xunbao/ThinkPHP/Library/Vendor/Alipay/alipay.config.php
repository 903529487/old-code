<?php
/* *
 * 配置文件
 * 版本：3.5
 * 日期：2016-06-25
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。

 * 安全校验码查看时，输入支付密码后，页面呈灰色的现象，怎么办？
 * 解决方法：
 * 1、检查浏览器配置，不让浏览器做弹框屏蔽设置
 * 2、更换浏览器或电脑，重新登录查询。
 */

//↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
//合作身份者ID，签约账号，以2088开头由16位纯数字组成的字符串，查看地址：https://openhome.alipay.com/platform/keyManage.htm?keyType=partner
$alipay_config['partner']		= '2088421843740458';

//收款支付宝账号，以2088开头由16位纯数字组成的字符串，一般情况下收款账号就是签约账号
$alipay_config['seller_id']	= $alipay_config['partner'];

//商户的私钥,此处填写原始私钥去头去尾，RSA公私钥生成：https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.nBDxfy&treeId=58&articleId=103242&docType=1
$alipay_config['private_key']	= 'MIIEowIBAAKCAQEAy26CgDEVNUdDTjTVTUhqlnahsLw6dT/C9UchdUVX6+IsM11z
xuSSajZT/Vq0LfpCZrJvdjH3U903mQ3QQo+CWCbTxAlqryGoYf4TruxR+AnjSrp5
sFZJv8+eyzCsvVoxz5yRZsq3fZV+B0VZb1lMyFQwoqrA1hsfCc/NMsLEcQEeVob1
pfD6EwL+/40qanHqsHezl6NpNh+PfG8KS3klwXNFW/jl0dHKUXTpiD8DqMF+nATR
+DFkMgmctgFNZayMjUkCOiCxUqOIuWVVh2Y7IOVHnKkR6/tLLeQCXvrh/wV+9PQX
Z9lga3uHDB791DNHN2HZO4GV8tjOqBXkwZN7jQIDAQABAoIBAFakEmCWhvnSCBBe
4BmyJfM/Q04KXLtjFJ1yVgWkKvYDtd+KhazH3LPvv4XAA80xMOacSGyGi1fkd7Fv
+KrghBsXLknn2NAN/bD+jVOKwr5pN6y0Du/TUEWpH3BaordimqRZgnPNEqkh6jMe
jiCmX9VSRgSBxO9rTaTYJATiftfBZ3yUjVm1/JJLzzthB6HMB+XE+RclZWUa1Ogm
6w9zL0a2l/8a461PvvJYoN0AjcfPrnmpNDbDZQ8o+sTp/f22i3WHBIaHU8vWyf6B
XfeqFZeyccR01AG1EN4Aj+W2kHAKqoWNsPCQKKYW+dEAmyHZ1YL3mmoc6195CI0z
nlcVZeECgYEA8bizQBa5Hn1ZEOu6x63ixP/y2Xlz4kqTuYTKgvkR5A1GpfDu+Id+
H5qnFp/hA32J8cLfOeYBiFNdSHQeu0sV5iDcJKfwrDEVMZ05t/zT8NCp5NoAIv2e
ar+oH880YT8PhbIdzcREb9Phy65GC/Sl2CE9Gl2u6d0xDXPYnViHDusCgYEA13LL
CI+N8Ml2QtTKp2Ngd1Zx7p/sftN6R/ZcOe2H62YyprQE1rCBMVXO5SBDx+NVk128
UpYwe/KAgeo7xCWzG7XZcHy6KTOn0hvYlsgO1IhcwdzLMcmqjjlkVUKZwxedGEvJ
Y0Mos+2ryFqYx0tK49pe4aE4+lVzJU04soLEsWcCgYEAxsGYopoMnYV0NvWeH5Jb
ZKEQjsHPB8NKtMD7w7YJf/tqnAgAd1rx2grQWUodO0F+q8wQwQrfN7lUer8AhgC3
gQKEAaAVxYCWbLVbQG4j11+8UvDuK9de62esVnuKFmxD1yseVpOLsmgGwfQKpMoF
lDHAjG175dB7BRS8iKTCaQECgYB/dP7eQqbzIwwef2qgWi8wimh+hgfQA+YceoeX
EYnOXjhq3KbcJ7FWcXAjptHSiBARTWvi480tFoql0N+oq7DpHMzVOkSbqV6H80dP
9GypmT5exfNDsg1/dD6CHhN/EhIy1GsAmTOUNm/g6I/nnwhgAckN7GYb2r9y+tsm
6Cva0wKBgHEyEZXdWKRLT+cFyp3b9UE6YtZ6BFahtVZwZVwKRF1oMGnyu2FCqFvx
9EUS4CSIBhUYl63zj4s1DddfgZsTI4sOEhA4u+I6oZAkx2pDPAe80Mlh8f9yCtF2
pz7HNSLJ98ORvx7TbZblGny/XtfVkvTiB2TZKTvnZ6vJVtn334+F';


//支付宝的公钥，查看地址：https://openhome.alipay.com/platform/keyManage.htm?keyType=partner
$alipay_config['alipay_public_key']= 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCnxj/9qwVfgoUh/y2W89L6BkRAFljhNhgPdyPuBV64bfQNN1PjbCzkIM6qRdKBoLPXmKKMiFYnkd6rAoprih3/PrQEB/VsW8OoM8fxn67UDYuyBTqA23MML9q1+ilIZwBC2AQ2UBVOrFXfFl75p6/B5KsiNG9zpgmLCUYuLkxpLQIDAQAB';

// 服务器异步通知页面路径  需http://格式的完整路径，不能加?id=123这类自定义参数，必须外网可以正常访问
$alipay_config['notify_url'] = "http://xunbao.meiladuo.com/Home/Alipay/notify_url";

// 页面跳转同步通知页面路径 需http://格式的完整路径，不能加?id=123这类自定义参数，必须外网可以正常访问
$alipay_config['return_url'] = "http://xunbao.meiladuo.com/Home/Alipay/return";

//签名方式
$alipay_config['sign_type']    = strtoupper('RSA');

//字符编码格式 目前支持utf-8
$alipay_config['input_charset']= strtolower('utf-8');

//ca证书路径地址，用于curl中ssl校验
//请保证cacert.pem文件在当前文件夹目录中
$alipay_config['cacert']    = getcwd().'\\cacert.pem';

//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
$alipay_config['transport']    = 'http';

// 支付类型 ，无需修改
$alipay_config['payment_type'] = "1";

// 产品类型，无需修改
$alipay_config['service'] = "alipay.wap.create.direct.pay.by.user";

//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑


?>
