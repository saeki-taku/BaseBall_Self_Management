SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `bbsm`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `calendar`
--

CREATE TABLE `calendar` (
  `id` int(32) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `calendar`
--

INSERT INTO `calendar` (`id`, `title`, `start_event`, `end_event`) VALUES
(3, '練習試合', '2021-02-20 00:00:00', '2021-02-21 00:00:00'),
(5, '練習試合', '2021-02-18 00:00:00', '2021-02-19 00:00:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `conditions`
--

CREATE TABLE `conditions` (
  `id` int(32) NOT NULL,
  `c_player_id` int(32) NOT NULL,
  `pain_parts` varchar(255) DEFAULT NULL,
  `pain_contents` varchar(255) DEFAULT NULL,
  `pain_date` varchar(255) DEFAULT NULL,
  `recovery_date` varchar(255) DEFAULT NULL,
  `pain_progress` varchar(255) DEFAULT NULL,
  `pain_memo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `conditions`
--

INSERT INTO `conditions` (`id`, `c_player_id`, `pain_parts`, `pain_contents`, `pain_date`, `recovery_date`, `pain_progress`, `pain_memo`) VALUES
(41, 103, '右足首', '捻挫', '2021-02-18', '2021-02-25', '順調', 'ダッシュ不可、打撃練習可');

-- --------------------------------------------------------

--
-- テーブルの構造 `diaries`
--

CREATE TABLE `diaries` (
  `id` int(32) NOT NULL,
  `player_id` int(32) NOT NULL,
  `diaries_title` varchar(255) NOT NULL,
  `diaries_text` varchar(255) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `orders`
--

CREATE TABLE `orders` (
  `id` int(32) NOT NULL,
  `user_id` int(32) NOT NULL,
  `orders_title` varchar(255) DEFAULT NULL,
  `position_1` varchar(255) DEFAULT NULL,
  `position_2` varchar(10) DEFAULT NULL,
  `position_3` varchar(10) DEFAULT NULL,
  `position_4` varchar(10) DEFAULT NULL,
  `position_5` varchar(10) DEFAULT NULL,
  `position_6` varchar(10) DEFAULT NULL,
  `position_7` varchar(10) DEFAULT NULL,
  `position_8` varchar(10) DEFAULT NULL,
  `position_9` varchar(10) DEFAULT NULL,
  `order_name_1` varchar(255) DEFAULT NULL,
  `order_name_2` varchar(255) DEFAULT NULL,
  `order_name_3` varchar(255) DEFAULT NULL,
  `order_name_4` varchar(255) DEFAULT NULL,
  `order_name_5` varchar(255) DEFAULT NULL,
  `order_name_6` varchar(255) DEFAULT NULL,
  `order_name_7` varchar(255) DEFAULT NULL,
  `order_name_8` varchar(255) DEFAULT NULL,
  `order_name_9` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `orders_title`, `position_1`, `position_2`, `position_3`, `position_4`, `position_5`, `position_6`, `position_7`, `position_8`, `position_9`, `order_name_1`, `order_name_2`, `order_name_3`, `order_name_4`, `order_name_5`, `order_name_6`, `order_name_7`, `order_name_8`, `order_name_9`) VALUES
(18, 5, '4/1 対XXX戦　第一試合', '中', '一', '二', '三', '捕', '遊', '右', '左', '投', '山田　太郎', '山田　次郎', '佐藤　次郎', '佐藤　四郎', '山田　五郎', '伊藤　三郎', '伊藤　五郎', '伊藤　三郎', '佐藤　三郎');

-- --------------------------------------------------------

--
-- テーブルの構造 `orders_sub`
--

CREATE TABLE `orders_sub` (
  `id` int(32) NOT NULL,
  `user_id` int(32) NOT NULL,
  `orders_title_sub` varchar(255) DEFAULT NULL,
  `position_1_sub` varchar(255) DEFAULT NULL,
  `position_2_sub` varchar(10) DEFAULT NULL,
  `position_3_sub` varchar(10) DEFAULT NULL,
  `position_4_sub` varchar(10) DEFAULT NULL,
  `position_5_sub` varchar(10) DEFAULT NULL,
  `position_6_sub` varchar(10) DEFAULT NULL,
  `position_7_sub` varchar(10) DEFAULT NULL,
  `position_8_sub` varchar(10) DEFAULT NULL,
  `position_9_sub` varchar(10) DEFAULT NULL,
  `order_name_1_sub` varchar(255) DEFAULT NULL,
  `order_name_2_sub` varchar(255) DEFAULT NULL,
  `order_name_3_sub` varchar(255) DEFAULT NULL,
  `order_name_4_sub` varchar(255) DEFAULT NULL,
  `order_name_5_sub` varchar(255) DEFAULT NULL,
  `order_name_6_sub` varchar(255) DEFAULT NULL,
  `order_name_7_sub` varchar(255) DEFAULT NULL,
  `order_name_8_sub` varchar(255) DEFAULT NULL,
  `order_name_9_sub` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `orders_sub`
--

INSERT INTO `orders_sub` (`id`, `user_id`, `orders_title_sub`, `position_1_sub`, `position_2_sub`, `position_3_sub`, `position_4_sub`, `position_5_sub`, `position_6_sub`, `position_7_sub`, `position_8_sub`, `position_9_sub`, `order_name_1_sub`, `order_name_2_sub`, `order_name_3_sub`, `order_name_4_sub`, `order_name_5_sub`, `order_name_6_sub`, `order_name_7_sub`, `order_name_8_sub`, `order_name_9_sub`) VALUES
(10, 5, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `player`
--

CREATE TABLE `player` (
  `id` int(32) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `players_name` varchar(255) NOT NULL,
  `players_furigana` varchar(255) NOT NULL,
  `players_number` varchar(255) DEFAULT NULL,
  `school_year` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `position_sub` varchar(255) DEFAULT NULL,
  `introduce` varchar(255) DEFAULT NULL,
  `insert_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `player`
--

INSERT INTO `player` (`id`, `user_id`, `file_name`, `file_path`, `players_name`, `players_furigana`, `players_number`, `school_year`, `position`, `position_sub`, `introduce`, `insert_time`, `update_time`) VALUES
(83, 5, 'player_face.jpg', '../../assets/upload_img/20210216161433player_face.jpg', '山田　太郎', 'ヤマダ　タロウ', '11', '1', '投手', '捕手', '宜しくお願い致します！', '2021-02-17 01:14:33', '2021-02-17 01:14:33'),
(84, 5, 'player_face.jpg', '../../assets/upload_img/20210216161433player_face.jpg', '山田　次郎', 'ヤマダ　ジロウ', '12', '1', '三塁手', '一塁手', '宜しくお願い致します！', '2021-02-17 01:14:33', '2021-02-17 01:23:32'),
(85, 5, 'player_face.jpg', '../../assets/upload_img/20210216161433player_face.jpg', '山田　三郎', 'ヤマダ　サブロウ', '13', '1', '投手', '捕手', '宜しくお願い致します！', '2021-02-17 01:14:33', '2021-02-17 01:19:08'),
(86, 5, 'player_face.jpg', '../../assets/upload_img/20210216161433player_face.jpg', '山田　四郎', 'ヤマダ　シロウ', '14', '1', '投手', '捕手', '宜しくお願い致します！', '2021-02-17 01:14:33', '2021-02-17 01:19:08'),
(87, 5, 'player_face.jpg', '../../assets/upload_img/20210216161433player_face.jpg', '山田　五郎', 'ヤマダ　ゴロウ', '15', '1', '投手', '捕手', '宜しくお願い致します！', '2021-02-17 01:14:33', '2021-02-17 01:19:08'),
(98, 5, 'player_face.jpg', '../../assets/upload_img/20210216161433player_face.jpg', '佐藤　太郎', 'サトウ　タロウ', '21', '2', '投手', '捕手', '宜しくお願い致します！', '2021-02-17 01:14:33', '2021-02-17 01:21:20'),
(99, 5, 'player_face.jpg', '../../assets/upload_img/20210216161433player_face.jpg', '佐藤　次郎', 'サトウ　ジロウ', '22', '2', '投手', '捕手', '宜しくお願い致します！', '2021-02-17 01:14:33', '2021-02-17 01:21:20'),
(100, 5, 'player_face.jpg', '../../assets/upload_img/20210216161433player_face.jpg', '佐藤　三郎', 'サトウ　サブロウ', '23', '2', '投手', '捕手', '宜しくお願い致します！', '2021-02-17 01:14:33', '2021-02-17 01:21:20'),
(101, 5, 'player_face.jpg', '../../assets/upload_img/20210216161433player_face.jpg', '佐藤　四郎', 'サトウ　シロウ', '24', '2', '投手', '捕手', '宜しくお願い致します！', '2021-02-17 01:14:33', '2021-02-17 01:21:20'),
(102, 5, 'player_face.jpg', '../../assets/upload_img/20210216161433player_face.jpg', '佐藤　五郎', 'サトウ　ゴロウ', '25', '2', '投手', '捕手', '宜しくお願い致します！', '2021-02-17 01:14:33', '2021-02-17 01:21:20'),
(103, 5, 'player_face.jpg', '../../assets/upload_img/20210216161433player_face.jpg', '伊藤　太郎', 'イトウ　タロウ', '31', '3', '投手', '一塁手', '宜しくお願い致します！', '2021-02-17 01:14:33', '2021-02-18 10:47:23'),
(104, 5, 'player_face.jpg', '../../assets/upload_img/20210216161433player_face.jpg', '伊藤　次郎', 'イトウ　ジロウ', '32', '3', '投手', '捕手', '宜しくお願い致します！', '2021-02-17 01:14:33', '2021-02-17 01:21:20'),
(105, 5, 'player_face.jpg', '../../assets/upload_img/20210216161433player_face.jpg', '伊藤　三郎', 'イトウ　サブロウ', '33', '3', '投手', '捕手', '宜しくお願い致します！', '2021-02-17 01:14:33', '2021-02-17 01:21:20'),
(106, 5, 'player_face.jpg', '../../assets/upload_img/20210216161433player_face.jpg', '伊藤　四郎', 'イトウ　シロウ', '34', '3', '投手', '捕手', '宜しくお願い致します！', '2021-02-17 01:14:33', '2021-02-17 01:21:20'),
(107, 5, 'player_face.jpg', '../../assets/upload_img/20210216161433player_face.jpg', '伊藤　五郎', 'イトウ　ゴロウ', '35', '3', '投手', '捕手', '宜しくお願い致します！', '2021-02-17 01:14:33', '2021-02-18 15:22:11'),
(108, 5, 'player_face3.jpg', '../../assets/upload_img/20210217145805player_face3.jpg', '鈴木　雄太', 'スズキ　ユウタ', '99', '1', '投手', '二塁手', '宜しくお願い致します。', '2021-02-17 23:58:05', '2021-02-17 23:58:05');

-- --------------------------------------------------------

--
-- テーブルの構造 `record`
--

CREATE TABLE `record` (
  `id` int(32) NOT NULL,
  `r_player_id` int(32) NOT NULL,
  `height` varchar(255) DEFAULT NULL,
  `height_2` varchar(255) DEFAULT NULL,
  `height_3` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `weight_2` varchar(255) DEFAULT NULL,
  `weight_3` varchar(255) DEFAULT NULL,
  `run_time` varchar(255) DEFAULT NULL,
  `run_time_2` varchar(255) DEFAULT NULL,
  `run_time_3` varchar(255) DEFAULT NULL,
  `long_cast` varchar(255) DEFAULT NULL,
  `long_cast_2` varchar(255) DEFAULT NULL,
  `long_cast_3` varchar(255) DEFAULT NULL,
  `ballspeed` varchar(255) DEFAULT NULL,
  `ballspeed_2` varchar(255) DEFAULT NULL,
  `ballspeed_3` varchar(255) DEFAULT NULL,
  `hit_average` varchar(255) DEFAULT NULL,
  `hit_average_2` varchar(255) DEFAULT NULL,
  `hit_average_3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `record`
--

INSERT INTO `record` (`id`, `r_player_id`, `height`, `height_2`, `height_3`, `weight`, `weight_2`, `weight_3`, `run_time`, `run_time_2`, `run_time_3`, `long_cast`, `long_cast_2`, `long_cast_3`, `ballspeed`, `ballspeed_2`, `ballspeed_3`, `hit_average`, `hit_average_2`, `hit_average_3`) VALUES
(46, 103, '174', '178', '180', '68', '72', '75', '7.02', '6.80', '6.60', '70', '80', '90', '115', '125', '130', '0.000', '0.280', '0.320'),
(47, 104, '158', '165', '175', '54', '60', '72', '7.50', '7.30', '7.25', '68', '72', '80', '110', '115', '120', '0.000', '0.255', '0.333'),
(48, 105, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 106, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 107, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 98, '170', '178', '', '70', '85', '', '8.20', '7.90', '', '80', '89', '', '120', '130', '', '0.200', '0.380', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(32) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `team_name`, `mail`, `password`) VALUES
(5, 'テストチーム', 'test01@gmail.com', '$2y$10$pN/Q5EM1QlBLQvVFbvnV3.nVNiDDxy64.QTbk233zL6H4RdfDqkh2'),
(6, 'テストチーム', 'test02@gmail.com', '$2y$10$pN/Q5EM1QlBLQvVFbvnV3.nVNiDDxy64.QTbk233zL6H4RdfDqkh2');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `diaries`
--
ALTER TABLE `diaries`
  ADD PRIMARY KEY (`id`,`player_id`);

--
-- テーブルのインデックス `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- テーブルのインデックス `orders_sub`
--
ALTER TABLE `orders_sub`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- テーブルのインデックス `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- テーブルのインデックス `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- テーブルのAUTO_INCREMENT `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- テーブルのAUTO_INCREMENT `diaries`
--
ALTER TABLE `diaries`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- テーブルのAUTO_INCREMENT `orders_sub`
--
ALTER TABLE `orders_sub`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- テーブルのAUTO_INCREMENT `player`
--
ALTER TABLE `player`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- テーブルのAUTO_INCREMENT `record`
--
ALTER TABLE `record`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- テーブルのAUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
