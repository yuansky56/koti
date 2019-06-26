<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/26 0026
 * Time: 5:02
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;
class AdminController extends Controller
{
    /*
     * 展示登陆界面
     */
    public function login(){
        $this->display();
    }

    /*
     * 展示验证码
     */
    public function captcha(){
        $config =	array(
            'codeSet'   =>  '123456789ABCDEFGHJKLMNPQRTUVWXY',             // 验证码字符集合
            'expire'    =>  1800,            // 验证码过期时间（s）
            'fontSize'  =>  12,              // 验证码字体大小(px)
            'useCurve'  =>  false,            // 是否画混淆曲线
            'useNoise'  =>  false,            // 是否添加杂点
            'imageH'    =>  31,               // 验证码图片高度
            'imageW'    =>  93,               // 验证码图片宽度
            'length'    =>  4,               // 验证码位数
            'fontttf'   =>  '',              // 验证码字体，不设置随机获取
            'bg'        =>  array(243, 251, 254),  // 背景颜色
        );
        $captcha = new Verify($config);
        $captcha->entry();
    }

    /*
     * 登陆
     */
    public function sogin(){
        //收集表单验证码登陆信息
        $cord = trim($_POST['captcha']);
        if($cord == ''){
            $this->error("验证码不能为空");
        }
        //验证验证码合法性
        $captcha = new Verify();
        if(!$captcha->check($cord)){
            $this->error("验证码错误");
        }

        //验证表单信息
        $admin = new \Model\AdminModel();
        $admindata = $admin->create();
        if(!$admindata){
            exit($admin->getError());
        }
        //调用模型，完成数据校验
        if(!$admin->checkAdmin($admindata)){
            //不合法
            $this->error('用户名密码验证失败');
        }
        $this->success('登陆成功',U('index/index'),0);
    }
}