<?php
//活动前台
class event_frontlp{
	var $ef_activity_management = "活动管理";
	var $ef_search = "搜索";
	var $ef_no_permission = "对不起，您没有权限";
	var $ef_donot_failed_or_locked = "您现在不能给好友发送邀请，因为活动未通过审核或被锁定了。";
	var $ef_donot_ended = "您现在不能给好友发送邀请，因为活动已经结束了。";
	var $ef_donot_deadline = "您现在不能给好友发送邀请，因为活动已经截止报名了。";
	var $ef_donot_number_full = "您现在不能给好友发送邀请，因为活动人数已经满了。";
	var $ef_not_friends = "您还没有好友";
	var $ef_add_friend_now = "现在去添加好友";
	var $ef_set_live_city = "您还没有设置居住城市";
	var $ef_now_settings = "现在去设置";
	var $ef_no_related_activity = "当前没有相关活动";
	var $ef_activity = "活动";
	var $ef_is_activity = "的活动";
	var $ef_my_albums = "我的相册";
	var $ef_Holder_album = "{holder}的相册";
	var $ef_update_photo_info = "单击此处编辑图片信息";
	var $ef_activity_not_exist_canceled = "此活动不存在或已取消";
	var $ef_participated_activity = "您参加了此活动";
	var $ef_attented_activity = "您关注了此活动";
	var $ef_your_app_audit = "您的报名正在审核中";
	var $ef_activity_not_start = "此活动还未开始";
	var $ef_activity_ongoing = "此活动正在进行中";
	var $ef_activity_already_end = "此活动已结束";
	var $ef_activity_not_approved_locked = "此活动未通过审核或已被锁定";
	var $ef_all_activity = "全部活动";
	var $ef_launch_activity = "发起活动";
	var $ef_recommended_activity = "推荐活动";
	var $ef_same_city_activity = "同城活动";
	var $ef_my_activity = "我的活动";
	var $ef_update_activity = "修改活动";
	var $ef_invite_friends = "邀请好友";
	var $ef_member_management = "成员管理";
	var $ef_photo_management = "照片管理";
	var $ef_activity_name = "活动名称";
	var $ef_activity_city = "活动城市";
	var $ef_please_select = "请选择";
	var $ef_activity_location = "活动地点";
	var $ef_activity_time = "活动时间";
	var $ef_to = "至";
	var $ef_closing = "报名截止";
	var $ef_activity_sort = "活动分类";
	var $ef_posters = "活动海报";
	var $ef_activity_number = "活动人数";
	var $ef_activity_number_ef_limit = "活动参加人数限制，设为 0 表示无限制。";
	var $ef_activity_privacy = "活动隐私";
	var $ef_privacy_publicity = "公开活动，所有人可见可加入";
	var $ef_half_publicity_activity = "半公开活动，所有人可见, 邀请才能加入";
	var $ef_privacy_activity = "私密活动，被邀请者可见";
	var $ef_activity_options = "活动选项";
	var $ef_allowed_invite_friends = "允许参与者邀请好友，被邀请者加入活动不需要审核";
	var $ef_allows_sharing_photos = "允许参与者共享活动照片";
	var $ef_allowed_issue_message = "允许所有人发布留言";
	var $ef_participation_requires_approval = "参加活动需要审批";
	var $ef_allowed_bring_friends = "允许参加者携带朋友，携带朋友数会占用活动参与者名额";
	var $ef_reg_info = "报名信息";
	var $ef_submit = "提交";
	var $ef_fill_in_activity_name = "请填写活动名称";
	var $ef_activity_name_overrun = "活动名称长度超过限制";
	var $ef_select_activity_city = "请选择活动城市";
	var $ef_fill_in_activity_location = "请填写活动地点";
	var $ef_activity_location_overrun = "活动地点长度超过限制";
	var $ef_select_start_end_time = "请选择开始或结束时间";
	var $ef_start_after_launch = "活动开始时间不能早于发起时间";
	var $ef_end_after_start = "活动结束时间不能早于开始时间";
	var $ef_select_reg_deadline = "请选择报名截止时间";
	var $ef_end_after_deadline = "活动结束时间不能早于报名截止时间";
	var $ef_select_activity_sort = "请选择活动分类";
	var $ef_reg_info_overrun = "报名信息长度超过限制";
	var $ef_whether_load = "请确认是否加载此类型介绍模板";
	var $ef_join_not_invite_friends = "您可以给未加入本活动的好友们发送邀请";
	var $ef_invited = "已邀请";
	var $ef_selected = "选定";
	var $ef_invite = "邀请";
	var $ef_search_activity = "搜索活动";
	var $ef_select_activity = "查看活动";
	var $ef_sponsor = "发起人";
	var $ef_people_select = "人查看";
	var $ef_people_participate = "人参加";
	var $ef_people_attention = "人关注";
	var $ef_member = "成员";
	var $ef_photo = "照片";
	var $ef_upload_photo = "上传照片";
	var $ef_come_from = "来自";
	var $ef_select_all = "全部选定";
	var $ef_bulk_delete = "批量删除";
	var $ef_current_without_photo = "当前活动没有照片";
	var $ef_identity= "身份";
	var $ef_full_member = "正式成员";
	var $ef_name = "名字";
	var $ef_sex = "性别";
	var $ef_operation = "操作";
	var $ef_confirm_delete = "确认删除";
	var $ef_set_organizer = "设置组织人";
	var $ef_revocation_organizer = "撤销组织人";
	var $ef_pending_member = "待审核成员";
	var $ef_concerned_user = "关注的用户";
	var $ef_cancel_activity = "取消活动";
	var $ef_exit_activity = "退出活动";
	var $ef_cancel_concern = "取消关注";
	var $ef_confirm_exit = "确认退出";
	var $ef_confirm_cancel = "确认取消";
	var $ef_i_is = "我是";
	var $ef_no_activity_you_can = "对不起,没有相关活动, 您可以";
	var $ef_initiate_activity = "发起一个活动";
	var $ef_start_date = "开始日期";
	var $ef_reg_deadline = "报名截止时间";
	var $ef_all_photo = "全部照片";
	var $ef_activity_type = "活动类型";
	var $ef_fill_in_reg_info = "填写报名信息";
	var $ef_update_reg_info = "修改报名信息";
	var $ef_confirm_participate = "确认参加";
	var $ef_carry_number = "携带人数";
	var $ef_carrying_tips = "（如果你带朋友参加，请注明携带人数）";
	var $ef_reg_info_Tips = "（建议按照活动发起人给出的模板填写）";
	var $ef_this_no_reg_info = "此活动无需填写报名信息";
	var $ef_need_review = "需要审核";
	var $ef_participate_activity = "参加活动";
	var $ef_attention_activity = "关注活动";
	var $ef_activity_introduction = "活动介绍";
	var $ef_more = "更多";
	var $ef_activity_members = "活动成员";
	var $ef_album = "相册";
	var $ef_message = "留言";
	var $ef_reply = "回复";
	var $ef_expression = "表情";
	var $ef_upload_photos_noncompliant = "对不起，您所上传照片不符合规范，请重新上传";
	var $ef_upload_photo_tips = "上传照片：（每张不能超过1M ，图片类型为jpg | png | gif）";
	var $ef_not_selecte_up_photos_activity = "没有选择所要上传照片的活动";
	var $ef_select = "查看";
	var $ef_delete = "删除";
	var $ef_failed = "未通过";
	var $ef_verify_join = "验证加入";
	var $ef_p_name = "名称：";
	var $ef_p_inf = "描述：";
	var $ef_b_con = "确定";
	var $ef_b_del = "取消";
	var $ef_back = "返回上一级";
	var $ef_data_none="当前无此类成员数据";
}

//活动后台
class event_backstagelp{
	var $eb_your = "您的";
	var $eb_activity_locked = "活动已被锁定";
	var $eb_activity_notice_content = "活动因违反本站协议已被锁定，请您尽快修改，否则由管理员对您的信息进行修改和删除等操作所产生的一切后果，将由您自己承担。";
	var $eb_system_sends = "系统发送";
	var $eb_num_notice = "{num}个通知";
	var $eb_delete_succ = "删除成功!";
	var $eb_secret_not_recommended = "是私密活动，无法推荐。";
	var $eb_lock = "锁定";
	var $eb_normal = "正常";
	var $eb_date_format_input_error = "日期格式输入不正确";
	var $eb_confirm_delete = "确认删除";
	var $eb_location = "当前位置";
	var $eb_app_management = "应用管理";
	var $eb_activity_management = "活动管理";
	var $eb_filter_condition = "筛选条件";
	var $eb_activity_ID = "活动ID";
	var $eb_title = "标题";
	var $eb_creator_name = "创建者名字";
	var $eb_activity_type = "活动类型";
	var $eb_public_nature = "公开性质";
	var $eb_unlimited = "不限";
	var $eb_privacy = "私密";
	var $eb_half_publicity = "半公开";
	var $eb_publicity = "公开";
	var $eb_activity_city = "活动城市";
	var $eb_please_select = "请选择";
	var $eb_end_if = "是否结束";
	var $eb_not_end = "未结束";
	var $eb_already_end = "已结束";
	var $eb_activity_time = "活动时间";
	var $eb_activity_Status = "活动状态";
	var $eb_to_audit = "待审核";
	var $eb_failed_audit = "未通过审核";
	var $eb_passed_audit = "已通过审核";
	var $eb_closed = "已关闭";
	var $eb_recommend = "推荐";
	var $eb_results_sort = "结果排序";
	var $eb_default_sort = "默认排序";
	var $eb_launch_time = "发起时间";
	var $eb_start_time = "开始时间";
	var $eb_participants_number = "参加人数";
	var $eb_number_limit = "人数限制";
	var $eb_search = "搜索";
	var $eb_activity_list = "活动列表";
	var $eb_activity_name = "活动名称";
	var $eb_participation_interest = "参加/关注";
	var $eb_sponsor = "发起者";
	var $eb_management_status = "管理状态";
	var $eb_operation = "操作";
	var $eb_time_display_format = "Y年m月d日 H时i分";
	var $eb_unlock = "解锁";
	var $eb_sure_lock = "确认锁定";
	var $eb_delete = "删除";
	var $eb_select_all = "全部选择";
	var $eb_bulk_delete = "批量删除";
	var $eb_execution_operation = "执行操作";
	var $eb_not_select_match_data = "没有查询到与条件相匹配的数据";
	var $eb_user_management = "用户管理";
	var $eb_activity_sort = "活动分类";
	var $eb_activity = "活动";
	var $eb_update = "修改";
	var $eb_insert = "添加";
	var $eb_ranked_num="排列序号";
	var $eb_name="名称";
	var $eb_enter_category_name = "请输入分类名称";
	var $eb_enter_category_sort = "请输入分类排序";
	var $eb_category_name = "分类名称";
	var $eb_default_poster = "默认海报";
	var $eb_default_poster_prompt = "活动发起人发起此类型的活动时，如果没有上传海报，则默认使用此海报。";
	var $eb_default_template = "默认模板";
	var $eb_default_template_prompt = "活动发起者发起此类型的活动时，默认显示填写活动介绍提示内容。";
	var $eb_display_order = "显示顺序";
	var $eb_submit = "提交";
	var $eb_image_loading = "图片加载中...";
	
};

//活动action
class event_actionlp{
	var $ea_upload_exceed_limit = "您上传的海报超过系统限制";
	var $ea_launch_failure_resubmit = "发起活动失败,请重新提交";
	var $ea_no_permission = "对不起，您没有权限";
	var $ea_you_assigned_to = "您被指派为";
	var $ea_organizing_people = "活动的组织人";
	var $ea_system_sends = "系统发送";
	var $ea_num_notice = "{num}个通知";
	var $ea_you_join = "您加入";
	var $ea_activity_app_by = "活动的申请已通过";
	var $ea_you_invited_out = "您被请出了";
	var $ea_activity = "活动";
	var $ea_add_activity = "加入了活动";
	var $ea_activity_were_rejected = "活动的申请已被拒绝";
	var $ea_operation_failed_relogin = "操作失败,请重新登陆";
	var $ea_operation_failed_tryagain = "操作失败,请重新操作";
	var $ea_not_participate_activity = "您没有参加此活动!";
	var $ea_reg_closed = "对不起，报名已截止!";
	var $ea_activity_ended = "对不起，活动已结束!";
	var $ea_carry_people_excessive = "对不起，携带人数过多，活动空余名额不足!";
	var $ea_info_modified = "信息已修改";
	var $ea_sponsor_not_out = "您是发起人，不能退出!";
	var $ea_join_or_app_activity = "您已经参加或申请了此活动";
	var $ea_attention_activity = "您已经关注了此活动";
	var $ea_no_attention_activity = "您没有关注此活动";
	var $ea_invite_participate = "邀请您参加";
	var $ea_you_can = "您可以";
	var $ea_accept_invite = "接受邀请";
	var $ea_or_view = "或查看";
	var $ea_event_details = "活动详情";
	var $ea_participated_activity = "您已经参加了此活动!";
	var $ea_app_submitted = "您已经提交了申请!";
	var $ea_people_aged = "对不起，人数已满!";
	var $ea_private_activity_rejoin = "对不起,私密活动,拒绝加入!";
	var $ea_activity_invited_join = "对不起，此活动必须被邀请才能加入!";
	var $ea_operation_failed = "操作失败";
	var $ea_successfully_add = "恭喜您已成功加入!";
	var $ea_num_people_request_join = "{num}人请求加入活动";
	var $ea_app_submitted_later = "您的申请已提交，请稍后!";
	var $ea_you_in = "您在";
	var $ea_activity_status_revoked = "活动的组织人身份被撤销";
	
};
?>