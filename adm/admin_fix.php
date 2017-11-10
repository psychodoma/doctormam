<?php
include_once('./_common.php');
include_once('./admin.head.php');
?>
<script type="text/javascript" src="./js/iframeheight.js"></script>

<script type="text/javascript">
$(function(){
     $('.iframe').iframeHeight({

       resizeMaxTry         : 2,
       resizeWaitTime       : 50,
       minimumHeight        : 900,
       defaultHeight        : 1000,
       heightOffset         : 900,
       exceptPages          : "",
       debugMode            : false,
       visibilitybeforeload : true,
       blockCrossDomain     : true,
       externalHeightName   : "bodyHeight",
       onMessageFunctionName: "getHeight",
       domainName           : "*",
       watcher              : false,
	   watcherTime          : 400

     });
});
</script>

<div style="width:100%">
	<iframe  class="iframe" style="width:100%;" src="http://test.morucompany.com/fixed/bbs/board.php?bo_table=doctormam"  frameborder="0"></iframe>
</div>