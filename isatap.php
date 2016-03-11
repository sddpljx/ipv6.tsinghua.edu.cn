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
	<title>IPv6 ISATAP配置說明 - 清华大学IPv6</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="shortcut icon" href="images/icons/favicon.ico" />
</head>
<body>
<div id="wrap">
	<div id="header">
		<div id="logo">
			<a href="/">
				<img src="images/title.png" alt="清華大學IPv6" />
			</a>
		</div>
	</div>
	
	<div id="top_menu">
		
		<ul>
			

<li class="sibling">
	<a href="/">首页</a></li>

<li class="selected">
	<a href="/isatap.php">IPv6 ISATAP配置說明</a></li>
		</ul>
	</div>
	<div class="clear"></div>
	
	<div id="content">
		<div id="address_bar">
			<a href="/">清华大学IPv6</a>
			<span>/</span>
			
			IPv6 ISATAP配置說明
		</div>
		<div class="clear"></div>
		
		<div id="content_main">
			<div id="sidebar">
					<div class="widget">
					您的IPv6地址是：<br />
							<?php
							$ip=getIP();
                                                        echo $ip; 
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
	<h2>
		IPv6 ISATAP配置說明
	</h2>
	<p align="left"><strong>一、什么是</strong><strong>ISATAP</strong><strong>隧道</strong><strong>?</strong> <br />
	  ISATAP全名是 Intra-Site Automatic Tunnel Addressing Protocol，是一种IPv6隧道技术，使用户可以在IPv4网络上访问IPv6资源。具体技术原理参见（draft-ietf-ngtrans-ISATAP-23.txt）。 <br />
  <strong>二、清华大学</strong><strong>ISATAP</strong><strong>隧道信息</strong> <br />
	  清华大学 ISATAP隧道路由器的IPv4地址是：isatap.tsinghua.edu.cn<br />
	  用户设置 ISATAP隧道的接入点为：isatap.tsinghua.edu.cn<br />
	  清华大学 ISATAP 隧道IPv6地址前缀为：2402:f000:1:1501::/64<br />
  <strong>三、清华大学</strong><strong>ISATAP</strong><strong>隧道配置方法</strong> <br />
  <strong>1</strong><strong>．</strong><strong>Windows</strong><strong>环境（以</strong><strong>win7</strong><strong>为例）</strong><strong> </strong><br />
	  以管理员身份运行cmd命令，进入命令行模式C:\&gt;<br />
	  输入 netsh<br />
	  输入 int ipv6  isatap（说明：进入isatap配置模式） <br />
	  输入 set router  isatap.tsinghua.edu.cn<br />
	  输入 set state  enable（说明：激活isatap隧道） <br />
	  输入 exit（说明：退出netsh） </p>
	<p align="left">右键点击桌面“计算机”图标，选择“管理”，展开“服务和应用程序”，选择“服务”，确认“ip helper”服务已开启。<a name="_GoBack" id="_GoBack"></a> </p>
	<p align="left">此后，通过 ipconfig应该可以看到一个 &nbsp;2402:f000:1:1501:为前缀的v6地址，hostid为0:5efe:x.x.x.x， 其中x.x.x.x为您的真实的IPv4地址，即可访问IPv6资源。 <br />
        <strong>2</strong><strong>．</strong><strong>Linux </strong><strong>环境</strong><strong> </strong><br />
	  Linux内核版本在2.2.0以后通常支持IPv6，请查看是否存在/proc/net/if_inet6文件，以确定您的系统是否支持IPv6，如果该文件不存在，可尝试如下命令加载IPv6模块： <br />
	  ＃modprobe ipv6<br />
	  成功加载后就可以配置IPv6了： <br />
	  #ifconfig  &nbsp;eth0 &nbsp;inet6 add IPV6ADDR &nbsp;(IPV6ADDR为要临时设备的IPv6地址)<br />
	  #route  -A inet6 &nbsp;add default &nbsp;gw &nbsp;IPV6GATEWAY dev ethX &nbsp;(为网络设备ethX添加IPv6网关IPV6GATEWAY地址)<br />
	  ＃ping6 ipv6.tsinghua.edu.cn</p>
	<p>如果Fedora9换成了2.6.25kernel都是支持ISATAP方式的ipv6tunnel接入的。配置方法如下：<br />
	  （1）首先要保证kernel支持ipv6<br />
	  （2）接着编辑/etc/sysconfig/network，增加下面这行<br />
	  IPV6_DEFAULTGW=youripv6gateway<br />
	  （3）然后再编辑/etc/sysconfig/network-scripts/ifcfg-sit1,内容如下： <br />
	  DEVICE=sit1<br />
	  ONBOOT=yes<br />
	  IPV6INIT=yes<br />
	  IPV6TUNNELIPV4=yourisataptunnelIP<br />
	  IPV6TUNNELIPV4LOCAL=yourlocalipv4ip<br />
	  IPV6ADDR=youripv6address<br />
	  （4）最后是ifupsit1<br />
	  需注意，ifup-sit不会创建对应的sit1设备，先得手动创建以后才有效的。 </p>
	<p align="left">这样 ISATAP就配置好了！ <br />
        <strong>3</strong><strong>．</strong><strong>Mac OSX</strong><strong>环境</strong><strong> </strong><br />
	  （1）下载ISATAP client for Mac OS X<br />
	  地址：<a href="http://www.momose.org/macosx/isatap.html" title="ISATAP client for Mac OSX">http://www.momose.org/macosx/isatap.html</a><br />
	  （2）解压ISATAP client<br />
	  % cd  /usr/local<br />
	  % sudo  tar xfz ~/Downloads/macosx-isatap-*.tar.gz<br />
	  （3）更改权限 <br />
	  % sudo  chown -R root:wheel /usr/local/isatap<br />
	  % sudo  chmod -R 644 /usr/local/isatap/isatap.kext<br />
	  （4）配置ISATAP<br />
	  配置ist0和得到IPv4地址（你需要制定现在使用的网卡，比如en0） <br />
	  注：config-ist.sh有一行需要更改以适应清华ipv6，将第50行改为： <br />
	  ${ifconfig}  ist0 inet6 2001:da8:200:900e:0:5efe:${v4addr} prefixlen 64<br />
	  然后再执行： <br />
	  % sudo  ./config-ist.sh en0<br />
	  指定ISATAP router<br />
	  % sudo  ./ifconfig ist0 isataprtr 59.66.4.50<br />
	  % sudo  ./rtsold.sh &amp;amp;<br />
	  设置路由表 <br />
	  % sudo  route delete -inet6 default<br />
	  注：在执行上面命令之前可以用netstat -r查看ipv6路由表上是否有default这一项，没有则不用执行上面命令 <br />
	  % sudo  route add -inet6 default -interface ist0<br />
	  启动IPv6<br />
	  % sudo  ifconfig ist0 up<br />
	  关闭IPv6<br />
	  % sudo  ifconfig ist0 down</p>
	<p align="left">这样 ISATAP就配置好了！ </p>
	<p>&nbsp;</p>
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
		
		
		<p>
			Copyright 2015 Tsinghua University 
			All rights reserved. 清华大学 版权所有
		</p>

		
	</div>
	<div class="clear"></div>

</div>

</body>
</html>

