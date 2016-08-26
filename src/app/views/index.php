<div id="app" class="container">
    <header class="jumbotron">
        <h1 class="text-center">victorruan的小站</h1>
        <div>
            <p>我是一个程序员,这个网站我是用自己写的<a href="https://github.com/victorruan/victorruan">MVC框架</a>写的。</p>
            <p>我是写PHP的,喜欢Laravel Yii</p>
            <p>我在学习nodeJS,取其精,去其糟</p>
            <p>当然nodeJs远远比不上php</p>
<!--            <p>下面都是生活工作积累掌握到的知识，反正也可以当作笔记自查<p>-->
<!--            <p>与朋友交流时直接给出网址作为个人观点免得再重复打字。对于大牛来说，我这些知识都只是皮毛</p>-->
<!--            <p>主要都是针对工作中用到的来讲，用不到的就先略微提提或者暗示你去自己搜索资料研究就好了</p>-->
<!--            <p>写博客的感觉不错！建议看看 <a href="http://www.kkh86.com/it/expr/guide-mine-write-blog.html" target="_blank">写博客的好处</a></p>-->
        </div>
    </header>
    <template v-if="edit">
    <input v-model="newtest.url" placeholder="请填写URL">
    <input v-model="newtest.title" placeholder="请填写标题">
    <button v-on:click="add">增加</button>
    <button v-on:click="_edit">提交</button>
    </template>

    <div class="row testList" id="testList">
        <div v-for="testList of testLists" class="col-xs-6 col-md-3">{{$index+1}}、
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

