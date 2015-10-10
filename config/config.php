<?php
session_start();
/******************************************
/* SYSTEM
******************************************/

define("SYSTEM_NAME","Simple Blog");
define("VERSION","1.0");
define("SLOGAN","Strart with easy blog");

/******************************************
/* MENU
******************************************/
// เลือกภาษาจากที่ผู้ใช้เลือก
if($_GET['lang']=="en" or $_SESSION['menu_en'])
{
	// สร้างตัวแปรแบบ session เพื่อจดจำค่าเมนูที่เลือก
	$_SESSION['menu_th'] = false;
	$_SESSION['menu_en'] = true;

	$menu = array(
		'home'		=> 'HOME',
		'about'		=> 'ABOUT',
		'sample_post'	=> 'SAMPLE POST',
		'contact'	=> 'CONTACT'
	);
	
}

if($_GET['lang']=="th" or $_SESSION['menu_th']){

	$_SESSION['menu_en'] = false;
	$_SESSION['menu_th'] = true;
	$menu = array(
		'home'		=> 'หน้าหลัก',
		'about'		=> 'เกี่ยวกับ',
		'sample_post'	=> 'หน้าตัวอย่าง',
		'contact'	=> 'ติดต่อเรา'
	);	
	
}


