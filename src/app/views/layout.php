<head>
    <title><?=$_title?></title>
    <script src="//cdn.bootcss.com/vue/1.0.26/vue.min.js"></script>
    <script src="//cdn.bootcss.com/vue-resource/0.9.3/vue-resource.min.js"></script>
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php /* @var string $_file */?>
<?php include VIEWS_PATH.$_file.".php";?>
<div>
    <div class="col-xs-6 col-md-6">
        <script src='//w.segmentfault.com/card/1030000005907459.js?w=0&3rd=1&bg=0&bd=DDDDDD&cl=2e232e&btn=141210&noBtn=0'></script>        </div>
    <div class="col-xs-6 col-md-6" >
        <!-- 多说评论框 start -->
        <div class="ds-thread" data-thread-key="<?=$_thread_key?>" data-title="<?=$_title?>" data-url="<?=$_SERVER['REQUEST_URI']?>"></div>
        <!-- 多说评论框 end -->
    </div>
</div>
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
    var duoshuoQuery = {short_name:"victorruan1990"};
    (function() {
        var ds = document.createElement('script');
        ds.type = 'text/javascript';ds.async = true;
        ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.unstable.js';
        ds.charset = 'UTF-8';
        (document.getElementsByTagName('head')[0]
        || document.getElementsByTagName('body')[0]).appendChild(ds);
    })();
</script>
<!-- 多说公共JS代码 end -->
<!--统计代码 start-->
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?db56094e1a7efb1579933847b95cdcaf";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<!--统计代码 end-->
<script src='http://cdn.bootcss.com/socket.io/1.3.7/socket.io.js'></script>
<script>
    // 连接服务端
    var socket = io('http://workerman.net:2120');
    // uid可以是自己网站的用户id，以便针对uid推送以及统计在线人数
    uid = 123;
    // socket连接后以uid登录
    socket.on('connect', function(){
        socket.emit('login', uid);
    });
    // 后端推送来消息时
    socket.on('new_msg', function(msg){
        console.log("收到消息："+msg);
    });
    // 后端推送来在线数据时
    socket.on('update_online_count', function(online_stat){
        console.log(online_stat);
    });
</script>
</body>
<style>
    .ds-thread{border: 1px solid #DDDDDD;border-radius: 3px;padding: 10px;}
    .container{padding-bottom:50px;}
    body{padding:7px;}
    .enabled{font-weight:bold;}
    .disabled{color:#909090;}
    .ds-powered-by{display: none}
    .sf-usercard{
        margin-bottom: 20px;
    }
    pre code {
        background: none;
        font-size: 1em;
        overflow-wrap: normal;
        white-space: inherit;
    }
</style>