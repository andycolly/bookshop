<?php

namespace App\Services;

/**
* imooc 正则表达式
*/


class regexTool {
	
	private $validate = array(
				'require'   =>  '/.+/',
				'email'     =>  '/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/',
				'url'       =>  '/^http(s?):\/\/(?:[A-za-z0-9-]+\.)+[A-za-z]{2,4}(?:[\/\?#][\/=\?%\-&~`@[\]\':+!\.#\w]*)?$/',
				'currency'  =>  '/^\d+(\.\d+)?$/',
				'number'    =>  '/^\d+$/',
				'zip'       =>  '/^\d{6}$/',
				'integer'   =>  '/^[-\+]?\d+$/',
				'double'    =>  '/^[-\+]?\d+(\.\d+)?$/',
				'english'   =>  '/^[A-Za-z]+$/',
				'qq'		=>	'/^\d{5,11}$/',
				'mobile'	=>	'/^1(3|4|5|7|8)\d{9}$/',
				'username'  =>  '/^[a-zA-Z]{1}([a-zA-Z0-9]|[_]){4,20}$/',
				'password'  =>  '/^(\w){6,18}$/',
			);//存储正则表达式

	private $returnMatchResult = false; // 返回的模式
	private $fixMode = null; //正则表达式 修正模式 贪婪 懒惰......
	private $matches = array(); //返回结果 匹配成功的字符串 (所有)
	private $isMatch = false; //返回结果 true flase
	
	public function __construct($returnMatchResult = false, $fixMode = null) {
		$this->returnMatchResult = $returnMatchResult;
		$this->fixMode = $fixMode;
	}//初始化返回结果和修正模式
	
	private function regex($pattern, $subject) {
		if(array_key_exists(strtolower($pattern), $this->validate)) 
			$pattern = $this->validate[$pattern].$this->fixMode; //如果能在data中找到就用data里面对应的正则表达式
		$this->returnMatchResult ?
			preg_match_all($pattern, $subject, $this->matches) :
			$this->isMatch = preg_match($pattern, $subject) === 1;
		return $this->getRegexResult();
	}
	
	private function getRegexResult() {
		if($this->returnMatchResult) {
			return $this->matches;
		} else {
			return $this->isMatch;
		}
	}//得到匹配结果
	
	public function toggleReturnType($bool = null) {
		if(empty($bool)) {
			$this->returnMatchResult = !$this->returnMatchResult;
		} else {
			$this->returnMatchResult = is_bool($bool) ? $bool : (bool)$bool;
		}
	}//设置返回模式
	
	public function setFixMode($fixMode) {
		$this->fixMode = $fixMode;
	}//设置修正模式
	
	public function isEmail($email) {
		return $this->regex('email', $email);
	}
	
	public function isMobile($mobile) {
		return $this->regex('mobile', $mobile);
	}
	
	public function check($pattern, $subject) {
		return $this->regex($pattern, $subject);
	}

	public function isUsername($username) {
		return $this->regex('username', $username);
	}
	
	public function isPassword($password) {
		return $this->regex('password', $password);
	}
	//......
	
}