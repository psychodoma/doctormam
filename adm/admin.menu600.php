<?php
	if( $member['mb_name'] == "최고관리자" ){

		$menu['menu600'] = array (
			array('600000', '스케쥴관리', ''.G5_ADMIN_URL.'/dr_schedule_month.php', 'dr_schedule_month'),
			array('600100', '예약리스트', ''.G5_ADMIN_URL.'/dr_board.php?bo_table=reservation', 'dr_schedule_reservation'),
			array('600200', '월별스케쥴', ''.G5_ADMIN_URL.'/dr_schedule_month.php', 'dr_schedule_month'),
			array('200100', '산후관리사별스케쥴', ''.G5_ADMIN_URL.'/dr_member_schedule.php', 'dr_member_schedule'),
			array('600300', '프로모션', ''.G5_ADMIN_URL.'/dr_board.php?bo_table=promotion&pro_option=all&pro_option_m=all_m', 'dr_board_promotion'),
			array('600400', '사은품 관리', ''.G5_ADMIN_URL.'/dr_board.php?bo_table=freegift&p=1&pro_option=all&pro_option_m=all_m', 'dr_board_promotion'),
			array('600500', '사은품 프로모션', ''.G5_ADMIN_URL.'/dr_board.php?bo_table=freegift&pro_option=all&pro_option_m=all_m', 'dr_board_promotion'),
		    //array('600400', '스케줄 테스트', ''.G5_ADMIN_URL.'/dr_schedule_list.php', 'dr_board_promotion'),
		);	
	
	}else{ 

		$menu['menu600'] = array (
			array('600000', '스케쥴관리', ''.G5_ADMIN_URL.'/dr_schedule_month.php', 'dr_schedule_month'),
			array('600100', '예약리스트', ''.G5_ADMIN_URL.'/dr_board.php?bo_table=reservation', 'dr_schedule_reservation'),
			array('600200', '월별스케쥴', ''.G5_ADMIN_URL.'/dr_schedule_month.php', 'dr_schedule_month'),
			array('200100', '산후관리사별스케쥴', ''.G5_ADMIN_URL.'/dr_member_schedule.php', 'dr_member_schedule'),
			array('600300', '프로모션', ''.G5_ADMIN_URL.'/dr_board.php?bo_table=promotion&pro_option=all&pro_option_m=all_m', 'dr_board_promotion'),
			array('600400', '사은품 관리', ''.G5_ADMIN_URL.'/dr_board.php?bo_table=freegift&p=1&pro_option=all&pro_option_m=all_m', 'dr_board_promotion'),
			array('600500', '사은품 프로모션', ''.G5_ADMIN_URL.'/dr_board.php?bo_table=freegift&pro_option=all&pro_option_m=all_m', 'dr_board_promotion'),
		   // array('600400', '문자 메시지 관리', ''.G5_ADMIN_URL.'/promotion_message.php', 'dr_board_promotion'),
		);

	}
?>