<?php
header("Content-type: text/html; charset=euc-kr");
//Snoopy.class.php�� �ҷ��ɴϴ�

require($_SERVER['DOCUMENT_ROOT'].'/Snoopy.class.php');

//�����Ǹ� �������ݽô�
$snoopy = new Snoopy;


$uri = "http://www.doctormam.co.kr/manager/login/login_top.html";

$auth['fr_cm_id'] = 'drmam2003';
$auth['fr_cm_passwd']= 'nurse0406';
//$login_vars = 'fr_cm_id=drmam2003&fr_cm_passwd=nurse0406';
$snoopy->submit($uri,$auth);
$snoopy->setcookies();
for($i=0;$i<4000; $i++){
    $snoopy->fetch('http://www.doctormam.co.kr/manager/board/listbody.html?a_gb=board&a_cd=8&a_item=0&page=19&po_no='.$i);
    //echo $snoopy->results;
    preg_match_all('/<font color=\'\'>(.*?)<\/td>/is', $snoopy->results, $text);
    preg_match_all('/<td width="480" colspan="9" align="left" .*?>(.*?)<\/td>/is', $snoopy->results, $text2);
        if($text2[1][2]){
        for($k=0;$k<8;$k++){
            if($k==5 || $k==6){
                $text_f = str_replace(array('&nbsp;','<br>','\n'),'',$text[1][$k]);
                for($j=0;$j < 2; $j++){
                    if(strpos($text_f,'���� : ')) {
                        $text_f = str_replace('���� : ', "|", $text_f);
                    }else if(strpos($text_f,'HOT : ')) {
                        $text_f = str_replace('HOT : ', "|", $text_f) ;
                    }else if(strpos($text_f,"ID : ")!==false) {
                        $text_f = str_replace("ID : ", "|", $text_f);
                    }else if(strpos($text_f,'IP : ')){
                        $text_f = str_replace('IP : ',"|",$text_f);
                    }else{
                        $text_f .= "|";
                    }
                }
                echo str_replace(array('&nbsp;','<br>','\n'),'',$text_f)."|";
            }else{
                $aaa= str_replace(array('&nbsp;','<br>','\n','\r\n'),'',$text[1][$k])."|";
               echo str_replace('<br />',"\n",$aaa)."|";
            }

        }
        for($k=0;$k<16;$k++){
           echo str_replace(array('&nbsp;','<br>','\n'),'',$text2[1][$k])."|";
        }
        echo '<br>';
    }
}

//�������� fetch�Լ��� �� ���������� �ܾ���? :)
//$snoopy->fetch('http://dovetail.tistory.com/38');

//����� $snoopy->results�� ����Ǿ� �ֽ��ϴ�
//preg_match ���Խ��� ����ؼ� ���� ������ article ��Ҹ��� �����غ����� ����
//preg_match('/<div class="article">(.*?)<\/div>/is', $snoopy->results, $text);
//print_r($text);
//���� ����� ����...?
//echo $text[1];
?>