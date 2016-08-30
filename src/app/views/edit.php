<script src="//cdn.bootcss.com/vue/1.0.26/vue.min.js"></script>
<script src="//cdn.bootcss.com/vue-resource/0.9.3/vue-resource.min.js"></script>
<script src="//cdn.bootcss.com/marked/0.3.6/marked.min.js"></script>
<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

<div id="editor">
    <div style="
    padding: 5px;
    background: rgba(0,0,0,0.8);
    color: #fff;
    z-index: 99999;
    text-align: center;
    ">
        <div class="input-group">
            <input type="text" v-model="post.title" class="form-control" placeholder="请输入标题">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" v-on:click="_edit">保存此文</button>
                    </span>
        </div><!-- /input-group -->
    </div>
    <textarea v-model="post.content" debounce="300"></textarea>
    <div id="content" v-html="post.content | marked"></div>
</div>

<script>
    new Vue({
        el: '#editor',
        data: {
            post:{
                title:'',
                content:'',
            }
        },
        filters: {
            marked: marked
        },
        methods:{
            _edit:function(){
                this.$http.post('/p/edit',JSON.stringify(this.post)).then(function(response) {
                    var obj = response.json();
                    window.location.href = '/p/'+obj.id;
                }, function(response) {
                    console.log('fail');
                });
            }
        },
        ready() {
            this.$http.get('/p/getPostById?id=<?=$id?>').then(function(response) {
                this.$set('post', response.json());
            }, function(response) {
                console.log('fail');
            });
        }
    })
</script>
<style>
    html, body, #editor {
        margin: 0;
        height: 99%;
        font-family: 'Helvetica Neue', Arial, sans-serif;
        color: #333;
    }

    textarea, #content {
        overflow-y: scroll;
        display: inline-block;
        width: 49%;
        height: 99%;
        vertical-align: top;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        padding: 0 20px;
    }

    textarea {
        border: none;
        border-right: 1px solid #ccc;
        resize: none;
        outline: none;
        background-color: #f6f6f6;
        font-size: 14px;
        font-family: 'Monaco', courier, monospace;
        padding: 20px;
    }

    code {
        color: #f66;
    }
    pre code {
        background: none;
        font-size: 1em;
        overflow-wrap: normal;
        white-space: inherit;
    }
</style>