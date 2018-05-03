<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wx839fdc4ecab78416", "4b4f4ef80e52807d368ca86c33395b71");
$signPackage = $jssdk->GetSignPackage();
//$r = $jssdk->addGroup();
//echo $r;
//3359967

//$data = array(
//    "type" => "2"
//);
//$res = $jssdk->search(json_encode($data));
//echo $res;


//$result = $jssdk->addDev();
//echo $result;


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
  
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script src="kalman.js"></script>
<script>
  /*
   * 注意：
   * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
   * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
   * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
   *
   * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
   * 邮箱地址：weixin-open@qq.com
   * 邮件主题：【微信JS-SDK反馈】具体问题
   * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
   */

  function compete(rssi) {
      var Rssi = Math.abs(rssi);
      var power = (Rssi - 55) / (10 * 2.0);
      var distence = Math.pow(10, power);
      return distence;
  }



  wx.config({
    debug: true,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
        'checkJsApi',
        'startMonitoringBeacons',      //用于监控beacon信号 必填
        'stopMonitoringBeacons',      //用于监控beacon信号 必填
        'onBeaconsInRange',         //用于监控beacon信号 必填
        'startSearchBeacons',
        'onSearchBeacons',
        'stopSearchBeacons'
    ]
  });
  wx.ready(function () {
      // 在这里调用 API
      //开启扫描beacon功能
      wx.startSearchBeacons({
          ticket: "",
          complete: function (argv) {
          }
      });

      //监控扫描beacon
      wx.onSearchBeacons({
          complete: function (argv) {
              //查询当前位置
              var devices = argv.beacons;
              var x1 = x2 = y1 = 0;
              var y2 = 3.7;
              var x3 = 4;
              var y3 = 2.1;
              for(var i=0;i<devices.length;i++){
                  if (devices[i].minor == '18598'){
                      //x1
                      var d1 = compete(devices[i].rssi);
                      //var d1 = compete(kalman(devices[i].rssi));
                      //alert(kalman(devices[i].rssi));
                  }else if (devices[i].minor == '18599'){
                      //x2
                      var d2 = compete(devices[i].rssi);
                      //var d2 = compete(kalman(devices[i].rssi));
                      //alert(kalman(devices[i].rssi));
                  }else if(devices[i].minor == '18600'){
                      //x3
                      var d3 = compete(devices[i].rssi);
                      //var d3 = compete(kalman(devices[i].rssi));
                      //alert(kalman(devices[i].rssi));
                  }
              }
              if(d1 != null && d2 != null && d3 != null){
                  var common = (1/(d1+d2)) + (1/(d1+d3)) + (1/(d2+d3));
                  var x = ((x1/(d1+d2)) + (x2/(d2+d3)) + (x3/(d1+d3)))/common;
                  var y = ((y1/(d1+d2)) + (y2/(d2+d3)) + (y3/(d1+d3)))/common;
                  //alert("("+wm(x)+","+hy(y)+")");
                  alert("("+x+","+y+")");
              }


          }
      });
  });
</script>
</html>
