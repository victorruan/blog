<!doctype html>
<html>
<head>
    <title>Vruan聊天室</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font: 13px Helvetica, Arial; }
        form { background: #000; padding: 3px; position: fixed; bottom: 0; width: 100%; }
        form input { border: 0; padding: 10px; width: 90%; margin-right: .5%; }
        form button { width: 9%; background: rgb(130, 224, 255); border: none; padding: 10px; }
        #messages { list-style-type: none; margin: 0; padding: 0; }
        #messages li { padding: 5px 10px; }
        #messages li:nth-child(odd) { background: #eee; }
    </style>
</head>
<body>
<ul id="messages">
    <li id="online_count"></li>
    <li>你可以打开另一个窗口进行测试</li>
    <li>两边窗口的聊天记录是同步的哦</li>
    <li>实现技术在此项目的<a href="https://github.com/victorruan">源码</a>中</li>
</ul>
<form action="">
    <input id="m" autocomplete="off" placeholder="请输入聊天内容"/><button>Send</button>
</form>
<script src='//cdn.bootcss.com/socket.io/1.3.7/socket.io.js'></script>
<script src="//cdn.bootcss.com/jquery/3.1.0/jquery.js"></script>

<script>
    var socket = io('http://'+document.domain+':1025');
    var uid = '<?php echo $_COOKIE['guid'];?>';
    var name = prompt('请输入你的名字');
    while(!name){
        name = prompt('请输入你的名字');
    }
    // 当socket连接后发送登录请求
    socket.on('connect', function(){socket.emit('login', uid);});
    socket.on('update_online_count', function(msg){$('#online_count').html(msg);});
    $('form').submit(function(){
        socket.emit('chat', "<mark>"+name+"</mark>:"+$('#m').val());
        $('#m').val('');
        return false;
    });
    socket.on('chat', function(msg){
        $('#messages').append($('<li>').text(msg));
    });
</script>
</body>
</html>
