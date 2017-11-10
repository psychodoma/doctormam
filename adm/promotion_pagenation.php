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
            <li><a href="#" class='test' value='1' style='cursor: pointer;'><</a></li>  
        <?  

            $cnt = 0;
            $counts = 0;
            $len=0;

            if($currentPage == 1){
                $counts = $currentPage;
                $len=$totalPage;
            }else if($currentPage == 2){
                $counts = $currentPage-1;
                $len=$totalPage;
            }else if($currentPage == 3){
                $counts = $currentPage-2;  
                $len=$totalPage;
            }else if($totalPage == $currentPage){
                $counts = $currentPage-3; 
                $len=$totalPage; 
            }else if($totalPage == $currentPage+1){
                $counts = $currentPage-2; 
                $len=$totalPage;  
            }else if($totalPage == $currentPage+2){
                $counts = $currentPage-2;
                $len=$totalPage;  
            }else if($totalPage == $currentPage+3){
                $counts = $currentPage-2;
                $len=$totalPage; 
            }else if($totalPage > 3){
                $counts = $currentPage-2;
                $len=$totalPage; 
            }

                for( $i=$counts-1;  $i<$len;  $i++){
                $cnt++;
             if($cnt == 1 && $currentPage >= 4){
        ?>
            <li><a href="#" class='test' value='<?=$i?>' style='cursor: pointer;'>...</a></li>  
        <?
                }
                if($i == $currentPage-1){
        ?>
            <li><a href="#" class='pagecurrent' style='cursor: pointer;'><?=$i+1?></a></li>  
        <?
                }else{
         ?>
            <li ><a class='test' value='<?=$i+1?>' style='cursor: pointer;'><?=$i+1?></a></li>  
        <?php 
                }    
            if($cnt==5 && $currentPage+3 < $totalPage){
        ?>
            <li><a href="#" class='test' value='<?=$i+2?>' style='cursor: pointer;'>...</a></li>
            
        <?
            break;
            }
            }
        ?>
            <li><a href="#" class='test' value='<?=$totalPage?>' style='cursor: pointer;'>></a></li>  
        <?
         ?>
    </ul>




<div id='totalRow' value='<?=$totalRow?>'></div>
<div id='currentPage' value='<?=$currentPage?>'></div>


<script type="text/javascript">
    $(function(){
            $('.test').click(function(){
             //   alert($('.test').attr('value'));
               //location.href = "http://doctormam.morucompany.com/adm/dr_board.php?bo_table=promotion&pro_option=all&currentPage="+$(this).attr('value');
               location.href = "./dr_board.php?bo_table=promotion&pro_option="+$('#pro_option').attr('value')+"&res_branch="+$('#pro_option1').attr('resBranch')+"&day="+$('#pro_option1').attr('day')+"&option="+$('#pro_option1').attr('option')+"&word="+$('#pro_option1').attr('word')+"&currentPage="+$(this).attr('value');
            })
    })
</script>    