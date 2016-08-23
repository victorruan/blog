<script src="//cdn.bootcss.com/vue/1.0.26/vue.min.js"></script>
<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<div id="app" class="container">
    <header class="jumbotron">
        <h1 class="text-center">victorruan的小站</h1>
        <div>
            <p>我是一个程序员,这个网站我是用自己写的<a href="https://github.com/victorruan/victorruan">MVC框架</a>写的.</p>
            <p>下面都是生活工作积累掌握到的知识，反正也可以当作笔记自查<p>
            <p>与朋友交流时直接给出网址作为个人观点免得再重复打字。对于大牛来说，我这些知识都只是皮毛</p>
            <p>主要都是针对工作中用到的来讲，用不到的就先略微提提或者暗示你去自己搜索资料研究就好了</p>
            <p>写博客的感觉不错！建议看看 <a href="http://www.kkh86.com/it/expr/guide-mine-write-blog.html" target="_blank">写博客的好处</a></p>
<!--            <p class="links">-->
<!--                <a href="#update-log">文章更新记录</a>-->
<!--            </p>-->
        </div>
    </header>
    <div class="row testList" id="testList">
        <div v-for="testList of testLists" class="col-xs-6 col-md-3">{{$index+1}}、
            <a v-if="!testList.disable" href="{{ testList.url }}" target="_blank" class="enabled">{{ testList.title }}</a>
            <a v-if="testList.disable" href="javascript:alert('<?=$disabledTip?>');" class="disabled">{{ testList.title }}</a>
        </div>
    </div>
</div>
<script>
    new Vue({
        el: '#app',
        data: {
            message: "<?=$message?>",
            testLists:<?=$testLists?>
        }
    })
</script>
<style type="text/css">
    .container{padding-bottom:50px;}
    .jumbotron p{text-indent:2em;}
    body{padding:7px;}
    .testList{margin-top:7px;}
    .testList div{margin-bottom:20px;}
    .enabled{font-weight:bold;}
    .disabled{color:#909090;}
    body header.jumbotron{padding:5px;}
    header .links{text-align:right;}
</style>
<!-- 多说评论框 start -->
<div class="ds-thread" data-thread-key="index" data-title="victorruan的小站" data-url="/"></div>
<!-- 多说评论框 end -->
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
