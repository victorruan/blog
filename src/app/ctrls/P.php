<?php
/**
 * Created by PhpStorm.
 * User: victorruan
 * Date: 16/8/26
 * Time: 上午11:58
 */

namespace VictorRuan\app\ctrls;
use HyperDown\Parser;

use VictorRuan\app\models\Post;
use VictorRuan\base\Ctrl;
use Workerman\Protocols\Http;

class P extends Ctrl
{
    public function index($req,$rsp){
        $id = $req->id;
        $parser = new Parser;
        $post = new Post();
        if($post->eq('id', $id)->find() or $post->eq('title',urldecode($id))->find()){
            $this->title = $post->title;
            $html = $parser->makeHtml($post->content);
            $this->thread_key = get_called_class().'\\'.$post->id;
            $this->render('post',['html'=>$html,'id'=>$post->id]);
        }else{
            throw new \Exception('页面不存在');
        }
    }

    public function edit($req){
        auth();
        if(!is_post()){
            if(!isset($_GET['id'])){
                $id = $req->id;
            }else{
                $id = $_GET['id'];
            }
            $this->render('edit',['id'=>$id],false);
        }
        if(is_post())
        {
            $_post = json_decode($GLOBALS['HTTP_RAW_POST_DATA'],true);
            $post = new Post();
            if($_post['id']=='undefined') $_post['id']=0;
            $id = $_post['id'];
            if(!$post->eq('id', $id)->find()){
                //增加
                $post->title = $_post['title'];
                $post->content = $_post['content'];
                $post->insert();
            }else{
                //更改
                $post->title = $_post['title'];
                $post->content = $_post['content'];
                $post->update();
            }
            $_id = $post->id;
            echo json_encode(['id'=>$_id??0]);
        }
    }
    public function getPostById($req){
        $post = new Post();
        if(!isset($_GET['id'])){
            $id = $req->id;
        }else{
            $id = $_GET['id'];
        }
        $post->eq('id', $id)->find() or $post->eq('title',urldecode($id))->find();
        echo json_encode(['title'=>$post->title??'','content'=>$post->content??'','id'=>$post->id??0]);
    }
}