<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/26 0026
 * Time: 6:26
 */
namespace Model;
use Think\Model;
class AdminModel extends Model
{
    protected $_auto = array (
        array('aword','md5',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理
    );

    protected $_validate = array(
        array('aemail','email','邮箱格式不正确',1),
        //array('captcha','require','验证码不能为空',1),
        array('aword','require','密码不能为空',1),
    );

    public function checkAdmin($admindata=array()){

        if(!$this->where($admindata)->fetchSql(false)->find()){
            return false;
        }else{
            return true;
        }
    }
}