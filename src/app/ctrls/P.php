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
            $post->eq('alias',$id)->find();
            if($post->id <= 0){
                throw new \Exception('页面不存在');
            }
        }
        $html = $parser->makeHtml($post->content);
        $this->thread_key = get_called_class().'\\'.$post->id;
        $this->render('post',['html'=>$html]);
    }
}