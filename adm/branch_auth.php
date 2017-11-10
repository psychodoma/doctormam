<?php
include_once('./_common.php');

$mb_id = $_REQUEST["mb_id"];


sql_query("insert into g5_auth (mb_id, au_menu, au_auth) VALUES('".$mb_id."', '200100', 'r,w,d')");
sql_query("insert into g5_auth (mb_id, au_menu, au_auth) VALUES('".$mb_id."', '200120', 'r,w,d')");
sql_query("insert into g5_auth (mb_id, au_menu, au_auth) VALUES('".$mb_id."', '400100', 'r,w,d')");
sql_query("insert into g5_auth (mb_id, au_menu, au_auth) VALUES('".$mb_id."', '400200', 'r,w,d')");
sql_query("insert into g5_auth (mb_id, au_menu, au_auth) VALUES('".$mb_id."', '400300', 'r,w,d')");
sql_query("insert into g5_auth (mb_id, au_menu, au_auth) VALUES('".$mb_id."', '400400', 'r,w,d')");
sql_query("insert into g5_auth (mb_id, au_menu, au_auth) VALUES('".$mb_id."', '400500', 'r,w,d')");
sql_query("insert into g5_auth (mb_id, au_menu, au_auth) VALUES('".$mb_id."', '400600', 'r,w,d')");
sql_query("insert into g5_auth (mb_id, au_menu, au_auth) VALUES('".$mb_id."', '400700', 'r,w,d')");
sql_query("insert into g5_auth (mb_id, au_menu, au_auth) VALUES('".$mb_id."', '600100', 'r,w,d')");
sql_query("insert into g5_auth (mb_id, au_menu, au_auth) VALUES('".$mb_id."', '600200', 'r,w,d')");
sql_query("insert into g5_auth (mb_id, au_menu, au_auth) VALUES('".$mb_id."', '800100', 'r')");
sql_query("insert into g5_auth (mb_id, au_menu, au_auth) VALUES('".$mb_id."', '800400', 'r')");
sql_query("insert into g5_auth (mb_id, au_menu, au_auth) VALUES('".$mb_id."', '900100', 'r,w')");
sql_query("insert into g5_auth (mb_id, au_menu, au_auth) VALUES('".$mb_id."', '900300', 'r,w')");
sql_query("insert into g5_auth (mb_id, au_menu, au_auth) VALUES('".$mb_id."', '900400', 'r,w')");

?>
<?php echo $mb_id?>완료
