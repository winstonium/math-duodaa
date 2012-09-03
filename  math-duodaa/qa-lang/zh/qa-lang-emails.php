<?php
	
/*
	Question2Answer (c) Gideon Greenspan

	http://www.question2answer.org/

	
	File: qa-include/qa-lang-emails.php
	Version: See define()s at top of qa-include/qa-base.php
	Description: Language phrases for email notifications

	--------------Translate to chiness-------------
	Author: tomheng 
	Created: 2012-02-08
	Blog: http://blog.webfuns.net
	Git: git@github.com:tomheng/Question2Answer_zh.git
	------------------------------------------------

	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	More about this license: http://www.question2answer.org/license.php
*/

	return array(
		'a_commented_body' => " ^c_handle 评论了你在^site_title的回复 :<br/><br/>^open^c_content^close<br/><br/>你的回复:^open^c_context^close<br/><br/>点击此链接可以回复他:<br/><br/><a href='^url'>^url</a><br/><br/>谢谢,<br/><br/>^site_title <br/><br/><font style=\"color: #F00; font-weight: bold; font-size: 18px; font-family: Verdana, Geneva, sans-serif;\">系统邮件，请不要回复本邮件！</font><br/><br/>",
		'a_commented_subject' => '你在^site_title的回复有了新评论 - 系统邮件，请不要回复！',

		'a_followed_body' => "<font style=\"color: #F00; font-weight: bold; font-size: 18px; font-family: Verdana, Geneva, sans-serif;\">系统邮件，请不要回复！</font><br/><br/>你在^site_title的回复， ^q_handle 提出了一个相关问题:<br/><br/>^open^q_title^close 你的回复:<br/><br/>^open^a_content^close 点击下面的链接回复此问题:<br/><br/><a href='^url'>^url</a><br/><br/> 谢谢,^site_title <font style=\"color: #F00; font-weight: bold; font-size: 18px; font-family: Verdana, Geneva, sans-serif;\">系统邮件，请不要回复本邮件！</font><br/><br/>",
		'a_followed_subject' => '你在 ^site_title 的回复有了相似提问  - 系统邮件，请不要回复！',

		'a_selected_body' => "<font style=\"color: #F00; font-weight: bold; font-size: 18px; font-family: Verdana, Geneva, sans-serif;\">系统邮件，请不要回复！</font>祝贺! 你在^site_title的回复被 ^s_handle选为最佳答案:^open^a_content^close 问题:^open^q_title^close点击链接查看问题:<a href='^url'>^url</a>谢谢,^site_title <font style=\"color: #F00; font-weight: bold; font-size: 18px; font-family: Verdana, Geneva, sans-serif;\">系统邮件，请不要回复本邮件！</font>",
		'a_selected_subject' => '你在^site_title的回复被选为最佳答案!  - 系统邮件，请不要回复！',

		'c_commented_body' => "<font style=\"color: #F00; font-weight: bold; font-size: 18px; font-family: Verdana, Geneva, sans-serif;\">系统邮件，请不要回复！</font> ^c_handle在 ^site_title回复了你的评论:^open^c_content^close 讨论内容:^open^c_context^close 你可以回复他:<a href='^url'>^url</a> 谢谢,^site_title <font style=\"color: #F00; font-weight: bold; font-size: 18px; font-family: Verdana, Geneva, sans-serif;\">系统邮件，请不要回复本邮件！</font>",
		'c_commented_subject' => '在^site_title有人回复了你的评论  - 系统邮件，请不要回复！',

		'confirm_body' => "点击下面的链接确认你在 ^site_title的注册邮箱.<a href='^url'>^url</a>谢谢,\n^site_title <font style=\"color: #F00; font-weight: bold; font-size: 18px; font-family: Verdana, Geneva, sans-serif;\">系统邮件，请不要回复本邮件！</font>",
		'confirm_subject' => '^site_title - 请确认您的邮箱  - 系统邮件，请不要回复！',

		'feedback_body' => "反馈内容:\n^message 姓名:\n^name 邮箱:\n^email 链接:\n^previous 用户:\n<a href='^url'>^url</a>IP地址:\n^ip浏览器:\n^browser <font style=\"color: #F00; font-weight: bold; font-size: 18px; font-family: Verdana, Geneva, sans-serif;\">系统邮件，请不要回复本邮件！</font>",
		'feedback_subject' => '^ 反馈',

		'flagged_body' => "^p_handle 被标记为^flags:^open^p_context^close点击查看:<a href='^url'>^url</a>谢谢,^site_title <font style=\"color: #F00; font-weight: bold; font-size: 18px; font-family: Verdana, Geneva, sans-serif;\">系统邮件，请不要回复本邮件！</font>",
		'flagged_subject' => '^site_title有被标记的提问  - 系统邮件，请不要回复！',

		'moderate_body' => " 批准^p_handle的提问:^open^p_context^close 点击批准或驳回:<a href='^url'>^url</a>谢谢,^site_title <font style=\"color: #F00; font-weight: bold; font-size: 18px; font-family: Verdana, Geneva, sans-serif;\">系统邮件，请不要回复本邮件！</font>",
		'moderate_subject' => '^site_title 有需要审核的内容  - 系统邮件，请不要回复！',

		'new_password_body' => "你在 ^site_title的新密码.<br/><br/>密码: ^password<br/><br/>建议登录后立即修改密码<br/><br/>谢谢,\n^site_title\n<a href='^url'>^url</a> <br/><br/><font style=\"color: #F00; font-weight: bold; font-size: 18px; font-family: Verdana, Geneva, sans-serif;\">系统邮件，请不要回复本邮件！</font><br/><br/>",
		'new_password_subject' => '^site_title - 新密码  - 系统邮件，请不要回复！',

		'private_message_body' => "你在^site_title 上收到^f_handle的私信:<br/><br/>^open^message^close<br/><br/>^more 谢谢,<br/><br/>^site_title<br/><br/>\n可以在账户设置页面关闭私信功能:\n^a_url <br/><br/><font style=\"color: #F00; font-weight: bold; font-size: 18px; font-family: Verdana, Geneva, sans-serif;\">系统邮件，请不要回复本邮件！</font><br/><br/>",
		'private_message_info' => "关于^f_handle:<br/><br/><a href='^url'>^url</a><br/><br/>",
		'private_message_reply' => "点击给^f_handle发送私信:<br/><br/><a href='^url'>^url</a><br/><br/>",
		'private_message_subject' => '^f_handle在^site_title给你发送了消息  - 系统邮件，请不要回复！',

		'q_answered_body' => "^a_handle回复了你在^site_title的问题:<br/><br/>^open^a_content^close<br/><br/>你的问题:<br/><br/>^open^q_title^close<br/><br/>点击链接，将这个回复作为最佳答案:<br/><br/><a href='^url'>^url</a><br/><br/>谢谢,<br/><br/>^site_title <br/><br/><font style=\"color: #F00; font-weight: bold; font-size: 18px; font-family: Verdana, Geneva, sans-serif;\">系统邮件，请不要回复本邮件！</font><br/><br/>",
		'q_answered_subject' => '有人回复了你在^site_title的问题  - 系统邮件，请不要回复！',

		'q_commented_body' => " ^c_handle 评论了你在^site_title的问题:<br/><br/>^open^c_content^close<br/><br/>你的问题:<br/><br/>^open^c_context^close<br/><br/>点击链接回复他:<br/><br/><a href='^url'>^url</a><br/><br/>谢谢,<br/><br/>^site_title <br/><br/><font style=\"color: #F00; font-weight: bold; font-size: 18px; font-family: Verdana, Geneva, sans-serif;\">系统邮件，请不要回复本邮件！</font><br/><br/>",
		'q_commented_subject' => '你的问题有了新评论， ^site_title  - 系统邮件，请不要回复！',

		'q_posted_body' => "^q_handle提了一个问题:<br/><br/>^open^q_title<br/><br/>^q_content^close<br/><br/>点击链接查看新问题:<br/><br/><a href='^url'>^url</a><br/><br/>谢谢,<br/><br/>^site_title <br/><br/><font style=\"color: #F00; font-weight: bold; font-size: 18px; font-family: Verdana, Geneva, sans-serif;\">系统邮件，请不要回复本邮件！</font><br/><br/>",
		'q_posted_subject' => '^site_title上有了新问题  - 系统邮件，请不要回复！',

		'reset_body' => "点击下面的链接重置你在^site_title的密码。<br/><br/><a href='^url'>^url</a><br/><br/>或者，将下面的重置码输入重置密码表单。<br/><br/>重置码: ^code<br/><br/>如果你没有申请重置密码，请忽略本邮件。<br/><br/> 谢谢,\n^site_title <br/><br/><font style=\"color: #F00; font-weight: bold; font-size: 18px; font-family: Verdana, Geneva, sans-serif;\">系统邮件，请不要回复本邮件！</font><br/><br/>",
		'reset_subject' => '^site_title - 找回密码  - 系统邮件，请不要回复！',

		'to_handle_prefix' => "你好^,<br/><br/>",

		'welcome_body' => "感谢注册^site_title.<br/><br/>^custom^confirm 你的登录信息:<br/><br/> 邮箱: ^email\n 密码: ^password<br/><br/>请妥善保管此邮件，以备后查。<br/><br/>谢谢,<br/><br/><a href='^url'>^site_title</a>\n<a href='^url'>^url</a> <br/><br/><font style=\"color: #F00; font-weight: bold; font-size: 18px; font-family: Verdana, Geneva, sans-serif;\">系统邮件，请不要回复本邮件！</font><br/><br/>",
		'welcome_confirm' => "点击下面的链接确认邮件地址.<br/><br/><a href='^url'>^url</a><br/><br/>",
		'welcome_subject' => '欢迎加入^site_title!  - 系统邮件，请不要回复！',
	);
	

/*
	Omit PHP closing tag to help avoid accidental output
*/
