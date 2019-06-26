<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/26
 * Time: 18:35
 */

/*
编程实现功能:
功能是求出字符 s 与字符串t的第二公共单词(这里，假设两个
字符串均由英字母和空格字符组成);若找到这样的公共单词，
函数返回该单词，否则，函数返回NULL，如果有多个满足要
求，则返回第一个单词。
例如:若 s=“This is C programming text”，t=“This is a text for C 
programming”，则函数返回“this”。
*/

/**
 *时间复杂度O(n)
 * 思路:先将两个字符串安装空格分割成数组. 然后循环其中一个数组，
 * 每一次循环都会判断，数组中的值是否在另一个数组中，如果存在直接返回该值。
 * 循环到最后还没有找到，返回null
 *
 * @param $s
 * @param $t
 * @return null
 */

function responseStr($s,$t){
    $s = explode(" ",$s);
    $t = explode(" ",$t);
    foreach ($s as $v){
        if(in_array($v,$t)){
            return $v;
        }
    }
    return null;
}

var_dump(responseStr("This is C programming text","This is C programming text"));



