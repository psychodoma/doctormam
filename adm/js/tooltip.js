/////// JQuery //////////
$(document).ready(function() {
    // html 페이지에서 'rel=tooltip'이 사용된 곳에 마우스를 가져가면 
    $('a[rel=tooltip]').mouseover(function(e) 
    {
         var tip = $(this).attr('title');         

        // 브라우져에서 제공하는 기본 툴 팁을 끈다
        $(this).attr('title','');
        
        // css와 연동하기 위해 html 태그를 추가해줌
        $(this).append('<div id="tooltip"><div class="tipBody">' 
                      + tip + '</div></div>');               
    }).mousemove(function(e) 
   {
         //마우스가 움직일 때 툴 팁이 따라 다니도록 위치값 업데이트
        $('#tooltip').css('top', e.pageY + 10 );
        $('#tooltip').css('left', e.pageX + 10 );
    }).mouseout(function() 
    {
        //위에서 껐던 브라우져에서 제공하는 기본 툴 팁을 복원
        $(this).attr('title',$('.tipBody').html());
        $(this).children('div#tooltip').remove();
    });
});


/////// CSS //////////
#tooltip {
    position: absolute;
    z-index: 999;
    color: white;
    font-size: 15px;   
}

#tooltip .tipBody {
    background-color: black;
    padding: 8px;
}

/////// HTML /////////
<a rel="tooltip" title="{{ tool_tip_message }}"> mouse over here </a>
