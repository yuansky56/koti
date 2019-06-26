<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/26 0026
 * Time: 9:08
 */

namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class ArtController extends Controller
{
    //展示发布文章页面
    public function artadd(){
        $this->display();
    }


    /*
     * 发布文章
     */
    public function edit(){
        //收集表单信息
        $art = new \Model\ArtModel();
        $artdata = $art->create();
        if(!$artdata){
            exit($art->getError());
        }
        //将信息写入数据库
        if(!$art->add($artdata)){
            //失败
            $this->error('文章发布失败');
        }
        $aid = $art->getLastInsID();
        $artdata = $art->find($aid);
        $this->assign('artdata',$artdata);
        $content = $this->fetch('Home@art/show');

        //静态文件名,并存入数据库
        $path = './Public/Art/';
        $file = 'art_'.$aid.'.html';
        $fileName = $path.$file;
        //页面静态化
        if(file_put_contents($fileName,$content)){
            $art->afilename = $fileName;
            $art->where('aid='.$aid)->save();
        }

    }

    /*
     * 推荐热度文章
     */
    public function artHot(){
        S(array(
            'type'=>'file',
            'host'=>'localhost',
            'port'=>'11211',)
        );
        S('arthot',null);
        if(!S('arthot')){
            $art = new \Model\ArtModel();
            $artdata = $art->field('aid,atitle,afilename')->where('ishot=1')->limit('9')->order('aid desc')->fetchSql(false)->select();
            S('arthot',$artdata,120);
        }
        echo json_encode(S('arthot'));
    }

    /*
     * 文章列表展示页面
     */
    public function artlist(){

        //调用art模型，获取文章列表
        $art = new \Model\ArtModel();
        $count = $art->count();
        $page = new Page($count,20);
        $page->rollPage=10;
        $page->lastSuffix =false;
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('first','首页');
        $page->setConfig('last','尾页');
        $artlist = $art->field('aid,atitle,ishot')->where('aid>=1')->order('aid desc')->limit($page->firstRow.',20')->fetchSql(false)->select();
        $this->assign('artlist',$artlist);
        $this->assign('page',$page->show());
        $this->display();
    }

    /*
     * 根据文章aid删除
     */
    public function artdelete($aid){
        //调用模型，删除文章
        $art =new \Model\ArtModel();
        $afilename = $art->field('afilename')->find($aid);
        if(!unlink($afilename['afilename'])){
            $this->error('删除失败');
        }

        if(!$art->delete($aid)){
            $this->error('删除失败');
        }
        $this->success('删除成功');
    }

    /*
    * 根据文章aid,展示文章修改详情页面
    */
    public function artupdate($aid){
        //调用模型，获取文章信息
        $art =new \Model\ArtModel();
        $artdata = $art->find($aid);
        if(empty($artdata)){
            $this->error('文章不存在');
        }
        $this->assign('artdata',$artdata);
        $this->display();

    }

    /*
     * 修改文章
     */
    public function artedit(){
        $art = new \Model\ArtModel();
        $artdata = $art->create();
        if(!$artdata){
            exit($art->getError());
        }
        if(!$art->save($artdata)){
            $this->error("修改失败");
        }

        $artdata = $art->find($artdata['aid']);
        $this->assign('artdata',$artdata);
        $content = $this->fetch('Home@art/show');

        //静态文件名,并存入数据库
        $fileName = $artdata['afilename'];
        //页面静态化
        if(!file_put_contents($fileName,$content)){
            $this->error("页面静态化失败");
        }
        $this->success('修改成功',U('artlist'));
    }

    /*
     * 全文索引查询
     */
    public function getArt(){
        $keyword = $_GET['word'];
        if($keyword==''){
            $this->error("关键词不能为空");
        }
        $sphinx = new \Tool\SphinxClient();
        $sphinx->setServer('127.0.0.1',9312);
        var_dump($sphinx);
        $data = $sphinx->query('php');
        var_dump($data);
    }

    public function get_tow_art($aid){
        $art = new \Model\ArtModel();
        $pre_art = $art->field('aid,atitle,afilename')->where("aid<$aid")->order("aid desc")->limit('1')->find();
        $next_art = $art->field('aid,atitle,afilename')->where("aid>$aid")->order("aid asc")->limit('1')->find();
        //var_dump($pre_art,$next_art);
        is_null($pre_art)?$arr[]['aid']=0:$arr[]=$pre_art;
        is_null($next_art)?$arr[]['aid']=0:$arr[]=$next_art;
        echo json_encode($arr);
    }
}