<?php

return [
    'DEFAULT_AVATAR' => '',
    'PARAM_ERROR_MESSAGE' => '参数验证出错！',
    'CAN_COMMENT_AFTER_REGISTRATION' => 0,  //注册后多长时间可以评论，单位秒
    'DEFAULT_DISPLAY_SECTION_ID' => 1,  //论坛首页帖子列表默认展示的所属的二级版块ID
    'DEFAULT_POST_DISPLAY_NUMBER' => 6,  //论坛首页帖子列表默认展示的帖子数量
    'ALLOW_FILTER_SECTION_ID' => 2,  //允许帖子搜索功能的一级版块ID
    'TREATMENT_LABEL_CATEGORY_ID' => 2,  //标签治疗方法分类ID
    'DEFAULT_AVATARS' => json_encode(['/uploads/images/90fe8f4e8a75b8334b14379b6a02e1be.jpeg','/uploads/images/ba106907ca769abcd1e5994eb9c662df.jpeg','/uploads/images/2d3a1f90e937e46d05a3133a5346a3a4.jpeg', '/uploads/images/bf1a4c629766af28e2ca126f093833f3.jpeg', '/uploads/images/435045d2450afc65f634d55460aca7b2.jpeg']),  //默认头像，注册时随机给一个
];