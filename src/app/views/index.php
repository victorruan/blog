<div id="app">
    <header class="jumbotron">
        <div >
            <h1 class="text-center">welcome</h1>
            <p>这是一个简易的小博客,同时也是一个mvc框架,喜欢这个网站的朋友可以参考此网站的<a href="/p/2">源码</a></p>
            <p>我是一个程序员,一个主PHP的程序员,我很喜欢Laravel Yii,最近在研究slim,如果你有任何关于php的问题,可以<a href="https://segmentfault.com/t/php">点这里</a></p>
            <p>同时我在学习nodeJS,取其精,去其糟,我发现express同silm的思想很像,当然nodeJs远远比不上php</p>
        </div>
    </header>

<!--    <main class="bs-docs-masthead" id="content" role="main" tabindex="-1">-->
<!--        <div class="container">-->
<!--            <span class="bs-docs-booticon bs-docs-booticon-lg bs-docs-booticon-outline">B</span>-->
<!--            <p class="lead">Bootstrap 是最受欢迎的 HTML、CSS 和 JS 框架，用于开发响应式布局、移动设备优先的 WEB 项目。</p>-->
<!--            <p class="lead">-->
<!--                <a href="getting-started#download" class="btn btn-outline-inverse btn-lg" onclick="_hmt.push(['_trackEvent', 'docv3-navbar', 'click', 'V3首页大图-下载Bootstrap按钮'])">下载 Bootstrap</a>-->
<!--            </p>-->
<!--            <p class="version">当前版本： v3.3.5 | 文档更新于：2015-06-22</p>-->
<!--        </div>-->
<!--    </main>-->
    <template v-if="edit">
    <input v-model="newtest.url" placeholder="请填写URL">
    <input v-model="newtest.title" placeholder="请填写标题">
    <button v-on:click="add">增加</button>
    <button v-on:click="_edit">提交</button>
    </template>

    <div class="row testList" id="testList">
        <div v-for="testList of testLists" class="col-xs-12 col-sm-6 col-md-3">{{$index+1}}、
            <a v-if="!testList.disable" href="{{ testList.url }}" target="_blank" class="enabled">{{ testList.title }}</a>
            <a v-if="testList.disable" href="javascript:alert('<?=$disabledTip?>');" class="disabled">{{ testList.title }}</a>
            <template v-if="edit">
            <button v-on:click="remove($index)">X</button>
            <input  v-model="testList.url">
            <input  v-model="testList.title">
            </template>
        </div>
    </div>
    <script>
        new Vue({
            el: '#app',
            data:{
                edit:<?=$edit?>
            },
            methods: {
                add: function () {
                    var url = this.newtest.url.trim();
                    var title = this.newtest.title.trim();
                    if (this.newtest) {
                        this.testLists.push({url:this.newtest.url,title:this.newtest.title});
                        this.newtest.url = this.newtest.title = ''
                    }
                },
                remove: function (index) {
                    this.testLists.splice(index, 1)
                },
                _edit:function(){
                    if(this.edit){
                        this.$http.post('/lists',JSON.stringify(this.testLists)).then(function(response) {
                            window.location.href = '/';
                        }, function(response) {
                            console.log('fail');
                        });
                    }
                    this.edit = !this.edit;
                }
            },
            ready() {
                this.$http.get('/lists').then(function(response) {
                    this.$set('testLists', response.json());
                }, function(response) {
                    console.log('fail');
                });
            }
        })
    </script>
    <style type="text/css">
        .jumbotron p{text-indent:2em;}
        .testList{margin-top:7px;}
        .testList div{margin-bottom:20px;}
        body header.jumbotron{padding:5px;}
        header .links{text-align:right;}
    </style>
</div>

