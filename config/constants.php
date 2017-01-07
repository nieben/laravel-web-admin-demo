<?php

return [
    'DEFAULT_AVATAR' => '',
    'PARAM_ERROR_MESSAGE' => '参数验证出错！',
    'CAN_COMMENT_AFTER_REGISTRATION' => 0,  //注册后多长时间可以评论，单位秒
    'DEFAULT_DISPLAY_SECTION_ID' => 1,  //论坛首页帖子列表默认展示的所属的二级版块ID
    'DEFAULT_POST_DISPLAY_NUMBER' => 6,  //论坛首页帖子列表默认展示的帖子数量
    'ALLOW_FILTER_SECTION_ID' => 2,  //允许帖子搜索功能的一级版块ID
    'TREATMENT_LABEL_CATEGORY_ID' => 2,  //标签治疗方法分类ID
    'DEFAULT_AVATARS' => json_encode(['a','b','c']),  //默认头像，注册时随机给一个
];