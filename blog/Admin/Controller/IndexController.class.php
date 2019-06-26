<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/26 0026
 * Time: 7:47
 */

namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller
{
    public function index(){
        $this->display();
    }

    public function top(){
        $this->display();
    }

    public function left(){
        $this->display();
    }

    public function form(){
        $this->display();
    }
}