<?php

/**
 * Created by PhpStorm.
 * User: andy
 * Date: 16-12-22
 * Time: 下午1:20
 */
namespace App\Tool\ValidateCode;

class ValidateCode
{
	/*
	 * $charset 是随机因子，这里是去掉了几个不容易区分的字符,如字母"i,l,o,q"，数字"0,1"。
	 * 有必要可以加入一些中文或其他字符或算式等。
       $codeLen表示验证码长度，常见4位。
	*/
	//随机因子
	//private $charset = 'abcdefghjkmnprstuvwxyzABCDEFGJKMNPRSTUVWXYZ23456789';
	private $charset = '1234567890';
	private $code;
	private $codeLen = 4;

	private $width = 130;
	private $heigh = 50;
	private $img;//图像

	private $font;//字体
	private $fontsize = 30;

/*
 * 构造函数，设置验证码字体,生成一个真彩色图像img
 * */

	public function __construct()
	{
	   //$this->font = ROOT_PATH.'/piblic/a/font/Chowderhead.ttf';
		//引入一个字体
		$this->font = ROOT_PATH.'/public/a/font/maobi.ttf';

		$this->img = imagecreatetruecolor($this->width, $this->heigh);
	}
/*
 * 从随机因子中随机抽取4个字符，作为$code验证码.
 * */
	//生成随机码
	private function createCode()
	{
		$_len = strlen($this->charset) - 1;
		for ($i = 0; $i < $this->codeLen; $i++) {
			$this->code .= $this->charset[mt_rand(0, $_len)];
		}
	}
/*
 * 生成验证码背景色.
 * */
	//生成背景
	private function createBg()
	{

		$color = imagecolorallocate($this->img, mt_rand(157, 255), mt_rand(157, 255), mt_rand(157, 255));
		imagefilledrectangle($this->img, 0, $this->heigh, $this->width, 0, $color);

	}

/*
 * 在图像上生成文字.
 * 在图像上生成验证码文字，主要考虑文字在图像上的位置和每一个文字颜色。
控制第n个文字的x轴位置 =  (图像宽度 / 验证码长度) * (n-1)  +  随机的偏移数;  其中n = {d1....n}
控制第n个文字的y轴位置 =  图像高度 / 2 +  随机的偏移数;
mt_rand(0, 156) 随机取文字颜色，0-156目的是取比较深的颜色。
mt_rand(-30, 30) 随机的文字旋转。
 * */
	//生成文字
	private function createFont()
	{
		$_x = $this->width / $this->codeLen;
		$_y = $this->heigh / 2;
		for ($i = 0; $i < $this->codeLen; $i++) {
			$color = imagecolorallocate($this->img, mt_rand(0, 156), mt_rand(0, 156), mt_rand(0, 156));
			imagettftext($this->img, $this->fontsize, mt_rand(-30, 30), $_x * $i + mt_rand(3, 5), $_y + mt_rand(2, 4), $color, $this->font, $this->code[$i]);
		}
	}

	/*
	 * 画线条的时候，取比较深的颜色值，而画雪花的时候取比较淡的颜色值，
	 * 目的是尽可能的不影响人眼识别验证码，又能干扰自动识别验证码机制。
	 * */

	//生成线条，雪花
	private function createLine()
	{
		for ($i = 0; $i < 15; $i++) {
			$color = imagecolorallocate($this->img, mt_rand(0, 156), mt_rand(0, 156), mt_rand(0, 156));
			imageline($this->img, mt_rand(0, $this->width), mt_rand(0, $this->heigh), mt_rand(0, $this->width), mt_rand(0, $this->heigh), $color);
		}
		for ($i = 0; $i < 150; $i++) {
			$color = imagecolorallocate($this->img, mt_rand(200, 255), mt_rand(200, 255), mt_rand(200, 255));
			imagestring($this->img, mt_rand(1, 5), mt_rand(0, $this->width), mt_rand(0, $this->heigh), '#', $color);
		}
	}

	//输出图像
	private function outPut()
	{
		header('Content-Type: image/png');
		imagepng($this->img);
		imagedestroy($this->img);
	}

	//对外生成验证码图片
	public function doImg()
	{
	//echo ROOT_PATH.'/public/a/font/Arial.ttf';die;
		$this->createBg();   //1.创建验证码背景
		$this->createCode();  //2.生成随机码
		$this->createLine();  //3.生成线条和雪花
		$this->createFont();  //4.生成文字
		$this->outPut();    //5.输出验证码图像
	}

	//获取验证码
	public function getCode()
	{
		return strtolower($this->code);
	}


	/*
	 * 测试代码：
<?php
define('ROOT_PATH', dirname(__FILE__));
require_once ROOT_PATH.'/includes/ValidateCode.class.php';

$_vc=new ValidateCode();
echo $_vc->doImg();
* */

	/*
	 * 应用
	 *
	 * <img src="../config/code.php" onclick="javascript:this.src='../config/code.php?tm='+Math.random();" />
	 * */


}