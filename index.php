<?php
function getIP() /*获取客户端IP*/
{
if(@$_SERVER["HTTP_X_FORWARDED_FOR"])
$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
elseif(@$_SERVER["HTTP_CLIENT_IP"])
$ip = $_SERVER["HTTP_CLIENT_IP"];
elseif(@$_SERVER["REMOTE_ADDR"])
$ip = $_SERVER["REMOTE_ADDR"];
elseif(@getenv("HTTP_X_FORWARDED_FOR"))
$ip = getenv("HTTP_X_FORWARDED_FOR");
elseif(@getenv("HTTP_CLIENT_IP"))
$ip = getenv("HTTP_CLIENT_IP");
elseif(@getenv("REMOTE_ADDR"))
$ip = getenv("REMOTE_ADDR");
else
$ip = "Unknown";
return$ip;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="zh-cn" xml:lang="zh-cn">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta content="text/css" http-equiv="Content-Style-Type" />
	<meta content="BYVoid" name="author" />
    <meta content="" name="description" />
    <meta content="清华大学, IPv6, " name="keywords" />
	<title>首页 - 清华大学IPv6</title>
	<link rel="stylesheet" type="text/css" href="style.css" />

</head>
<body>
<div id="wrap">
	<div id="header">
		<div id="logo">
			<a href="/">
				<img src="/images/title.png" alt="清華大學IPv6" />
			</a>
		</div>
	</div>
	
	<div id="top_menu">
		
		<ul>
			

<li class="selected">
	<a href="/">首页</a></li>

<li class="sibling">
	<a href="/isatap.php">IPv6 ISATAP配置說明</a></li>
		</ul>
	</div>
	<div class="clear"></div>
	
	<div id="content">
		<div id="address_bar">
			<a href="/">清华大学IPv6</a>
			<span>/</span>
			
			首页
		</div>
		<div class="clear"></div>
		
		<div id="content_main">
			<div id="sidebar">
				
					<div class="widget">
					您的IPv6地址是：<br />
							<?php
							$ip=getIP();
                               echo $ip; ;
							   ?>
							   </div>
					<div class="widget">
						<ul>
						
							<li><a href="/">清华大学IPv6首页</a></li>
						
							<li><a href="/isatap.php">清华大学IPv6 ISATAP配置說明</a></li>
						</ul>
					</div>
					<div class="widget">
					<p>
						<a href="http://its.tsinghua.edu.cn/">清华大学信息化技术中心</a>
					</p>
					<p>
						联系电话 62784859
					</p>
					<p>
						电子邮箱 support@tsinghua.edu.cn
					</p>
					</div>
				
			</div>
			
<div id="single_area">
  <strong>
    <li>1.什么是IPv6?</li>
  </strong>
  <p>IPv6指互联网协议（IP）第6版。目前大家上网主要使用互联网协议第四版，即IPv4。在全球互联网高度发展的今天， IPv4 地址资源已经枯竭，互联网正在经历从IPv4网络向IPv6网络的过渡。IPv4地址是类似 A.B.C.D 的格式，共32位，用\&quot;.\&quot;分成四段，用10进制表示；而IPv6地址类似X:X:X:X:X:X:X:X的格式，它是128位的，用\&quot;:\&quot;分 成8段，用16进制表示。RFC2373 中详细定义了IPv6地址，按照定义，一个完整的IPv6地址的表示法：xxxx:xxxx:xxxx:xxxx:xxxx:xxxx:xxxx:xxxx。 </p>
  <strong>
    <li>2.IPv4地址和IPv6地址的区别 </li>
  </strong>
  <table border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td width="340" valign="top"><p align="left"><strong>IPv4</strong><strong>地址</strong><strong> </strong> </p></td>
      <td width="213" valign="top"><p align="left"><strong>IPv6</strong><strong>地址</strong><strong> </strong> </p></td>
    </tr>
    <tr>
      <td width="340" valign="top"><p align="left">组播地址（224.0.0.0/4） </p></td>
      <td width="213" valign="top"><p align="left">IPv6组播地址（FF00::/8） </p></td>
    </tr>
    <tr>
      <td width="340" valign="top"><p align="left">广播地址 </p></td>
      <td width="213" valign="top"><p align="left">无，只有任播（ anycast）地址 </p></td>
    </tr>
    <tr>
      <td width="340" valign="top"><p align="left">未指定地址为 0.0.0 .0 </p></td>
      <td width="213" valign="top"><p align="left">未指定地址为 :: </p></td>
    </tr>
    <tr>
      <td width="340" valign="top"><p align="left">回路地址为 127.0.0.1 </p></td>
      <td width="213" valign="top"><p align="left">回路地址为 ::1 </p></td>
    </tr>
    <tr>
      <td width="340" valign="top"><p align="left">公用 IP地址 </p></td>
      <td width="213" valign="top"><p align="left">可汇聚全球单播地址 </p></td>
    </tr>
    <tr>
      <td width="340" valign="top"><p align="left">私有地址（10.0.0.0/8、172.16.0.0/12、192.168.0.0/16） </p></td>
      <td width="213" valign="top"><p align="left">本地站点地址（ FEC0::/48） </p></td>
    </tr>
    <tr>
      <td width="340" valign="top"><p align="left">Microsoft自动专用IP寻址自动配置的地址（169.254.0.0/16） </p></td>
      <td width="213" valign="top"><p align="left">本地链路地址（ FE80::/64） </p></td>
    </tr>
    <tr>
      <td width="340" valign="top"><p align="left">表达方式：点分间隔十进制 </p></td>
      <td width="213" valign="top"><p align="left">表达方式：冒号间隔十六进制式 </p></td>
    </tr>
    <tr>
      <td width="340" valign="top"><p align="left">子网掩码表示：以点阵十进制表示法或前缀长度表示法（CIDR） </p></td>
      <td width="213" valign="top"><p align="left">子网掩码表示：仅使用前缀长度表示法（CIDR） </p></td>
    </tr>
  </table>
  <strong>
    <li>3.清华哪些区域有IPv6网络服务？ </li>
  </strong>
  <p>清华大学校园网主干网、学生宿舍网、教师宿舍网已经全部支持 IPv6，各院系自建的局域网也基本都支持IPv6。如所在局域网不支持IPv6，也可以通过清华大学的ISATAP隧道服务访问IPv6资源。 </p>
  <strong>
    <li>4.如何使用IPv6?</li>
  </strong>
  <p>Win7以上的操作系统和MAC系统都自带安装了IPv6协议栈，而且默认都是自动获取IPv6地址，不需要任何设置。 </p>
  <strong>
    <li>5.为什么访问IPv6还会产生IPv4流量？ </li>
  </strong>
  <p>我们访问的IPv6网站往往都是IPv4和IPv6双栈运行的。大多数用户使用IPv6的时候跑IPv4流量都是用μTorrent下载IPv6分享站点的资源，然后在设置的时候没有通过启用IPfilter规则来屏蔽IPv4流量，并且没有断开IPv4的认证。因此，如果想访问纯IPv6资源，希望避免IPv4的流量，可以直接断开IPv4的认证或者索性禁用IPv4的协议，如果是用μTorrent下载东西，建议启用μTorrent的IPfilter规则屏蔽IPv4流量，主流的BT站点都有相关教程。 </p>
  <strong>
    <li>6.有哪些常用的IPv6资源？ </li>
  </strong>
  <p>CNGI高校驻地网：<a href="http://www.6rank.edu.cn">http://www.6rank.edu.cn</a> <br />
    北京邮电大学(北邮人BT)：http://bt.byr.edu.cn<br />
    北京交通大学(晨光BT)http://ipv6.cgbt.cn<br />
    东北大学（六维空间）http://bt.neu6.edu.cn <br />
  <a href="http://www.baidu.com/s?wd=%E4%B8%8A%E6%B5%B7%E5%A4%A7%E5%AD%A6&amp;hl_tag=textlink&amp;tn=SE_hldp01350_v6v6zkg6" target="_blank">上海大学</a>（乐乎论坛）<a href="http://bt.shu6.edu.cn/index.php">http://bt.shu6.edu.cn/index.php</a> </p>
  <strong>
    <li>7.如何确认本机获取方式为自动获得IP地址？ </li>
  </strong>
  <p>控制面板→网络和Internet→打开“网络和共享中心”→更改适配器设置→双击“本地连接”→属性→单击“Internet协议版本6（TCP/IPv6）”→确认IP地址和DNS服务器地址都是自动获取→确定→关闭→关闭。 <br />
      <img border="0" width="340" height="404" src="/images/image1.jpg" /><img border="0" width="412" height="317" src="/images/image2.jpg" /> </p>
  <strong>
    <li>8.如何查看本机IPv6地址获取情况？ </li>
  </strong>
  <p>直接在开始菜单里所有程序中选择命令提示符cmd.exe或者再下方搜索框里输入cmd，然后回车，进入命令提示符窗口。 <br />
      <img border="0" width="262" height="470" src="/images/image3.jpg" /> <br />
    输入ipconfig  /all命令，可以查看本机是否获取到正确的IPv6地址（2402:f000开头），由于我校IPv6的DNS服务器搭建在双栈链路之上，无需专门指定IPv6的DNS服务器参数，沿用IPv4的DNS服务器设置即可，通常为自动获取。 </p>
  <strong>
    <li>9.如何报告IPv6问题？ </li>
  </strong>
  <p>请联系校园网用户服务部门，并提供如下信息，以便于定位问题。 <br />
    (1)上网位置、上网帐号、联系方式，本机IPv6地址，命令提示符下分别输入ipconfig /all的结果，输入arp -a的结果。 <br />
    (2)故障时间，故障现象，系统版本，网卡型号。周围同环境下其他人能否使用ipv6，把个人电脑换到其他端口上，重新获取ipv6地址后，现象是否重现。 <br />
    (3) ping -n 30 ipv6.tsinghua.edu.cn、tracert www.edu.cn  或其他IPv6网站的结果。 </p>
  <div>
    <div> </div>
  </div>
</div>

<div id=ipv6_enabled_www_test_logo></div>
<script language="JavaScript" type="text/javascript">
        var Ipv6_Js_Server = (("https:" == document.location.protocol) ? "https://" : "http://");
        document.write(unescape("%3Cscript src='" + Ipv6_Js_Server + "www.ipv6forum.com/ipv6_enabled/sa/SA.php?id=107' type='text/javascript'%3E%3C/script%3E"));
</script>

<div id=ipv6_enabled_isp_test_info></div>
<script language="JavaScript" type="text/javascript">
    	var Ipv6_Js_Server = (("https:" == document.location.protocol) ? "https://" : "http://");
	document.write(unescape("%3Cscript src='" + Ipv6_Js_Server + "www.ipv6forum.com/ipv6_enabled/isp/sa/SA.php?id=15' type='text/javascript'%3E%3C/script%3E"));
</script>


		</div>
		
	</div>
	<div class="clear"></div>
	
	<div id="footer">
		
		<a href="http://validator.w3.org/check?uri=referer" target="_blank"></a>
		<p>
			Copyright 2015 Tsinghua University 
			All rights reserved. 清华大学 版权所有
		</p>

		
  </div>
	<div class="clear"></div>

</div>

</body>
</html>
