﻿<?php
header("Content-Type:text/html; charset=utf-8"); 
session_start();

include("../config.php");
include("../mysql_connect.inc.php");

if($_SESSION['mod'] != null or $_SESSION['admin'] != null)
{   
	if($_GET['action']=="reply")
	{
		$NO = $_POST['NO'];
		$posts_id = $_POST['posts_id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$title = htmlentities($_POST['title'],ENT_QUOTES,"UTF-8");
		$content = $_POST['content'];
		$time = $_POST['time'];
 
        //更新資料庫資料語法
        $sql = "UPDATE forum_posts_reply SET posts_id='$posts_id', name='$name', email='$email', title='$title', content='$content', time='$time' WHERE NO='$NO';";
        if(mysql_query($sql))
        {
                echo '修改成功!';
					if($config['url_static']=="true")
					{
						echo '<meta http-equiv=REFRESH CONTENT=2;url=forum_posts-'.$NO.'.html>';	
					}
					else
					{
						echo '<meta http-equiv=REFRESH CONTENT=2;url=forum_posts.php?NO='.$NO.'>';						
					}
        }
        else
        {
                echo '修改失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=forum_posts_edit.php?action=reply&NO='.$NO.'>';
        }
	}
	else
	{
		$NO = $_POST['NO'];
		$groupid = $_POST['groupid'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$title = htmlentities($_POST['title'],ENT_QUOTES,"UTF-8");
		$content = $_POST['content'];
		$time = $_POST['time'];
		if($_POST['top']==null)
		{
		$top = "false";
		}
		else
		{
		$top = $_POST['top'];
		}
        
		//更新資料庫資料語法
        $sql = "UPDATE forum_posts SET groupid='$groupid', name='$name', email='$email', title='$title', content='$content', time='$time', top='$top' WHERE NO='$NO';";
        if(mysql_query($sql))
        {
                echo '修改成功!';
					if($config['url_static']=="true")
					{
						echo '<meta http-equiv=REFRESH CONTENT=2;url=forum_posts-'.$NO.'.html>';	
					}
					else
					{
						echo '<meta http-equiv=REFRESH CONTENT=2;url=forum_posts.php?NO='.$NO.'>';						
					}
        }
        else
        {
                echo '修改失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=forum_posts_edit.php?NO='.$NO.'>';
        }
	}
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>