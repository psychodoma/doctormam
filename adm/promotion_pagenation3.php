<style type="text/css">
 .pageul {  
    list-style:none;  
    float:right;  
    display:inline;  
    margin: auto;
}  
.pageul li {  
    float:left;  
}  
.pageul li a {  
    float:left;  
    padding:4px;  
    margin-right:3px;  
    width:15px;  
    color:#000;  
    font:bold 12px tahoma;  
    border:1px solid #eee;  
    text-align:center;  
    text-decoration:none;  
}  
.pageul li a:hover, ul li a:focus {  
    color:#fff;  
    border:1px solid #f40;  
    background-color:#f40;  
}  

.pagecurrent{
    color:#fff !important;  
    border:1px solid #f40;  
    background-color:#f40;  
}   


</style>

<?php



?>
<?php echo $row["customer_name"] ;?>
    <ul class='pageul'>  
    <div id='pro_option1' day="<?=$day?>" resBranch="<?=$resBranch?>" option="<?=$option?>" word="<?=$word?>" ></div>
        <?php  
      //  echo $currentPage3;
        ?>
            <li><a href="#" class='test3' value='1' style='cursor: pointer;'><</a></li>  
        <?  

            $cnt = 0;
            $counts = 0;
            $len=0;

            if($currentPage3 == 1){
                $counts = $currentPage3;
                $len=$totalPage3;
            }else if($currentPage3 == 2){
                $counts = $currentPage3-1;
                $len=$totalPage3;
            }else if($currentPage3 == 3){
                $counts = $currentPage3-2;  
                $len=$totalPage3;
            }else if($totalPage3 == $currentPage3){
                $counts = $currentPage3-3; 
                $len=$totalPage3; 
            }else if($totalPage3 == $currentPage3+1){
                $counts = $currentPage3-2; 
                $len=$totalPage3;  
            }else if($totalPage3 == $currentPage3+2){
                $counts = $currentPage3-2;
                $len=$totalPage3;  
            }else if($totalPage3 == $currentPage3+3){
                $counts = $currentPage3-2;
                $len=$totalPage3; 
            }else if($totalPage3 > 3){
                $counts = $currentPage3-2;
                $len=$totalPage3; 
            }

                for( $i=$counts-1;  $i<$len;  $i++){
                $cnt++;
             if($cnt == 1 && $currentPage3 >= 4){
        ?>
            <li><a href="#" class='test3' value='<?=$i?>' style='cursor: pointer;'>...</a></li>  
        <?
                }
                if($i == $currentPage3-1){
        ?>
            <li><a href="#" class='pagecurrent' style='cursor: pointer;'><?=$i+1?></a></li>  
        <?
                }else{
         ?>
            <li ><a class='test3' value='<?=$i+1?>' style='cursor: pointer;'><?=$i+1?></a></li>  
        <?php 
                }    
            if($cnt==5 && $currentPage3+3 < $totalPage3){
        ?>
            <li><a href="#" class='test3' value='<?=$i+2?>' style='cursor: pointer;'>...</a></li>
            
        <?
            break;
            }
            }
        ?>
            <li><a href="#" class='test3' value='<?=$totalPage3?>' style='cursor: pointer;'>></a></li>  
        <?
         ?>
    </ul>




<div id='totalRow' value='<?=$totalRow?>'></div>
<div id='currentPage3' value='<?=$currentPage3?>'></div>


<script type="text/javascript">
    $(function(){
            $('.test3').click(function(){
             //   alert($('.test').attr('value'));
               //location.href = "http://doctormam.morucompany.com/adm/dr_board.php?bo_table=promotion&pro_option=all&currentPage="+$(this).attr('value');
               location.href = "./dr_board.php?bo_table=promotion&pro_option="+$('#pro_option').attr('value')+"&res_branch="+$('#pro_option1').attr('resBranch')+"&day="+$('#pro_option1').attr('day')+"&option="+$('#pro_option1').attr('option')+"&word="+$('#pro_option1').attr('word')+"&currentPage3="+$(this).attr('value');
            })
    })
</script>       