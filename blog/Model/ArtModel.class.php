<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/26 0026
 * Time: 12:20
 */

namespace Model;
use Think\Model;

class ArtModel extends Model
{
    protected $_auto = array (
        array('atime','time',1,'function'),
    );

    protected $_validate = array(
        array('atitle','1,50','标题长度需在1~50',3,'length'),
        array('acontent','require','内容不能为空'),
        array('abstract','1,300','摘要长度需在1~300',3,'length'),
        array('ishot',array('1','0'),'值的范围不正确！',3,'in'),
    );

}