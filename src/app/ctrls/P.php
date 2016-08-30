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

class P extends Ctrl
{
    public function index($id){
        $parser = new Parser;
        $post = new Post();
        $post->eq('id', $id)->find();
        if($post->id <= 0){
            $post->eq('title',urldecode($id))->find();
            if($post->id <= 0){
                throw new \Exception('页面不存在');
            }
        }
        $this->title = $post->title;
        $html = $parser->makeHtml($post->content);
        $this->thread_key = get_called_class().'\\'.$post->id;
        $this->render('post',['html'=>$html,'id'=>$post->id]);
    }

    public function edit(){
        auth();
        if($_SERVER['REQUEST_METHOD']!='POST'){
            $id = $_GET['id']??0;
            $this->render('edit',['id'=>$id],false);
        }else{
            $_post = json_decode($GLOBALS['HTTP_RAW_POST_DATA'],true);
            $post = new Post();
            if($_post['id']=='undefined') $_post['id']=0;
            $id = $_post['id']??0;
            $post->eq('id', $id)->find();
            $_id = $post->id;
            if($post->id<=0){
                //增加
                $post->title = $_post['title'];
                $post->content = $_post['content'];
                $post->insert();
                $_id = \ActiveRecord::$db->lastInsertId();
            }else{
                //更改
                $post->title = $_post['title'];
                $post->content = $_post['content'];
                $post->update();
            }
            echo json_encode(['id'=>$_id??0]);
        }
    }
    public function getPostById(){
        $post = new Post();
        $id = $_GET['id']??0;
        $post->eq('id', $id)->find();
        if($post->id <= 0){
            $post->eq('title',urldecode($id))->find();
        }
        echo json_encode(['title'=>$post->title??'','content'=>$post->content??'','id'=>$post->id??0]);
    }
}