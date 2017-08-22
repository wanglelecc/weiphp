<?php
/**
 * Sports数据模型
 */
class SportsTable {
	// 数据表模型配置
	public $config = [
			'name' => 'sports',
			'title' => '体育赛事',
			'search_key' => 'home_team:请输入球队名',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Draw'
	];
	
	// 列表定义
	public $list_grid = [
			'start_time' => [
					'title' => '比赛场次',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'vs_team' => [
					'title' => '对战球队（主场VS客场）',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'score_title' => [
					'title' => '比分',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'content' => [
					'title' => '对战球队的介绍',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0
			],
			'ids' => [
					'title' => '操作',
					'come_from' => 1,
					'width' => '',
					'is_sort' => 0,
					'href' => [
							'0' => [
									'title' => '奖品配置',
									'url' => 'Draw/LotteryPrizeList/add?sports_id=[id]&target=_blank'
							],
							'1' => [
									'title' => '中奖列表',
									'url' => 'Draw/LuckyFollow/lists?sports_id=[id]&target=_blank'
							],
							'2' => [
									'title' => '评论列表',
									'url' => 'Comment/Comment/lists?sports_id=[id]&target=_blank'
							],
							'3' => [
									'title' => '预览',
									'url' => 'Sucai/Sucai/package?id=[id]&source=Sports&is_preview=1&target=_blank'
							],
							'4' => [
									'title' => '下载素材',
									'url' => 'Sucai/Sucai/package?id=[id]&source=Sports&is_download=1&target=_blank'
							],
							'5' => [
									'title' => '编辑',
									'url' => '[EDIT]'
							],
							'6' => [
									'title' => '删除',
									'url' => '[DELETE]'
							]
					]
			]
	];
	
	// 字段定义
	public $fields = [
			'home_team' => [
					'title' => '主场球队',
					'field' => 'varchar(255) NULL',
					'type' => 'cascade',
					'is_show' => 1,
					'extra' => 'type=db&table=sports_team'
			],
			'visit_team' => [
					'title' => '客场球队',
					'field' => 'varchar(255) NULL',
					'type' => 'cascade',
					'is_show' => 1,
					'extra' => 'type=db&table=sports_team'
			],
			'start_time' => [
					'title' => '时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'score' => [
					'title' => '比分',
					'field' => 'varchar(30) NULL',
					'type' => 'string',
					'remark' => '输入格式：4:1',
					'is_show' => 1
			],
			'content' => [
					'title' => '说明',
					'field' => 'text NULL',
					'type' => 'textarea',
					'remark' => '请输入说明',
					'is_show' => 1
			],
			'countdown' => [
					'title' => '擂鼓时长',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'value' => 60,
					'remark' => '擂鼓倒计的时长,单位为秒,取值范围: 10~99',
					'is_show' => 1
			],
			'drum_count' => [
					'title' => '擂鼓次数',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'drum_follow_count' => [
					'title' => '擂鼓人数',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'home_team_support_count' => [
					'title' => '主场球队支持数',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'visit_team_support_count' => [
					'title' => '客场球队支持人数',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'home_team_drum_count' => [
					'title' => '主场球队擂鼓数',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'visit_team_drum_count' => [
					'title' => '客场球队擂鼓数',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'yaotv_count' => [
					'title' => '摇一摇总次',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'draw_count' => [
					'title' => '抽奖总次数',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'is_finish' => [
					'title' => '是否已结束',
					'field' => 'tinyint(2) NULL',
					'type' => 'bool',
					'extra' => '0:未结束
1:已结束'
			],
			'yaotv_follow_count' => [
					'title' => '摇电视总人数',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'draw_follow_count' => [
					'title' => '抽奖总人数',
					'field' => 'int(10) NULL',
					'type' => 'num'
			],
			'comment_status' => [
					'title' => '评论是否需要审核',
					'field' => 'tinyint(2) NULL',
					'type' => 'radio',
					'is_show' => 1,
					'extra' => '0:不审核
1:审核'
			]
	];
}	