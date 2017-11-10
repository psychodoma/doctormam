

<?php
    $sql = " select count(*) as cnt from question";
    //$row = sql_fetch($sql);
  //  $totalRow = $row["cnt"];
    $totalPage  = ceil($totalRow / 10);  // 전체 페이지 계산
?>
<?php echo $row["customer_name"] ;?>
<!--     <ul class='pageul'>  
        <?php  
      //  echo $currentPage;
            for( $i=0;  $i<$totalPage;  $i++){
                if($i == $currentPage-1){
        ?>
            <li><a href="#" class='pagecurrent' style='cursor: pointer;'><?=$i+1?></a></li>  
        <?
                }else{
         ?>
            <li ><a class='test' value='<?=$i+1?>' style='cursor: pointer;'><?=$i+1?>   </a>   </li>  
        <?php 
                }
            }
         ?>
    </ul> -->




<div id='totalRow' value='<?=$totalRow?>'></div>
<div id='currentPage' value='<?=$currentPage?>'></div>

<script type="text/javascript">
    $(function(){
            $('.test').click(function(){
             //   alert($('.test').attr('value'));
               location.href = "http://doctormam.com/adm/question_list.php?fr_date="+$('#current_first').attr('value')+"&to_date="+$('#current_second').attr('value')+"&currentPage="+$(this).attr('value')
            })
    })
</script>    