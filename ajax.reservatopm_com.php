<?php
include_once('./_common.php');
include_once(G5_LIB_PATH.'/json.lib.php');


sql_query( " update g5_write_reservation set wr_6 = now() where wr_id = ".$wr_id );

?>