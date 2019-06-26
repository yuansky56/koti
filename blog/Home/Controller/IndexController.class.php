<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index(){
        //调用模型,获取文章列表
        $art = new \Model\ArtModel();
        $count = $art->count();  //总条数
        $pageCount = ceil($count/5);
        $pageid = isset($_GET['pageid'])?$_GET['pageid']:1;
        if($_GET['pageid'] <=0 ){
            $pageid = 1;
        }

        if($_GET['pageid'] > $pageCount ){
            $pageid = $pageCount;
        }

        $lpage = $pageid - 2;
        $rpage = $pageid + 2;
        if($lpage <= 0 ){
            $lpage = 1;
        }
        if($rpage >= $pageCount){
            $rpage = $pageCount;
        }

        if($rpage - $lpage < 4){
            $lpage = 1;
        }
        if($lpage + 4 > $rpage){
            $rpage = $pageCount;
        }

        $pageNum = range($lpage,$rpage);
        $firstRow = ($pageid-1)*5;
        $artdata = $art->where('afilename<>""')->order('aid desc')->limit("$firstRow,5")->fetchSql(false)->select();
        //echo $artdata;exit;
        $this->assign('artdata',$artdata);
        $this->assign('pagesno',$pageid);
            $this->assign('pagemax',$pageCount);
        $this->assign('pageNum',$pageNum);
        $this->display();
    }

}