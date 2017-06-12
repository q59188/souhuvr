<?php
	include __DIR__ . '/start.php';
	require 'vendor/autoload.php';
	use QL\QueryList;
	use Illuminate\Database\Capsule\Manager as db;
	class su
	{

		public function index($url){
			$datas = QueryList::Query($url,array(
					"url" => array(".item-txt h3 a",'href')
				))->data;
			foreach ($datas  as $data) {
				$this->getCon($data['url']);
			}
		}
		function getCon($page){
			$title = QueryList::Query($page,array(
				"title"=>array('h1','text')
			),'','utf-8','utf-8')->data;
			$con = QueryList::Query($page,array(
				"con"=>array('article.article' ,'html','-p:first -p:last') //
			),'','utf-8','utf-8')->data;
			$title = $title[0]['title'];
			$con = $con[0]['con'];
			$con = preg_replace('/(http)(.)*([a-z0-9\-\.\_])+.html/i','',$con);
			//echo $title."<br>".$con;
			if(!count(DB::table('su')->where('title', $title)->get())){
				DB::table('su')->insert(array(
					array('title'=>$title,'content'=>$con,'typeid'=>1,'su'=>1)
				));
			}
		}
	}
