﻿<p><a href="index.php">首頁</a>     <a href="login.php">登入</a>     <a href="reg.php">註冊</a>     <a href="member.php">會員中心</a>     <a href="<?php echo $config["url"];?>/forum">會員討論區</a>     <a href="plugin-list.php">外掛列表頁面</a>     <a href="logout.php">登出</a>     <?php if($_SESSION['admin'] != null){ ?><a href="<?php echo $config["url"];?>/admin">控制後台</a><?php }else{}?></p>