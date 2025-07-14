<?php
/**
 * Template Name: Grants Page
 *
 * Custom template for displaying a styled, user-friendly grants list.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

// Example grants array (replace this with ACF or loop through posts/custom DB if needed)
$grants = [
    [
        'year' => '2024',
        'period' => '2024年4月1日〜2029年3月31日',
        'type' => '受託研究',
        'title' => '戦略的イノベーション創造プログラム（SIP3）',
        'pi' => '緒方広明',
        'summary' => 'ポストコロナ時代の学び方・働き方を実現するプラットフォームの構築'
    ],
    [
        'year' => '2024',
        'period' => '2024年4月1日〜2026年3月31日',
        'type' => '共同研究',
        'title' => '株式会社ベネッセコーポレーション',
        'pi' => '緒方広明',
        'summary' => '「書く学習動作」を中心とした学習者の理解度等の特定とそれらに基づく指導法等に関する研究'
    ],
    [
        'year' => '2023',
        'period' => '2023年4月26日〜2026年3月31日',
        'type' => '科学研究費（補助金）',
        'title' => '基盤研究（A）',
        'pi' => '緒方広明',
        'summary' => 'リアルワールド教育データからのエビデンス抽出・共有・利用のための情報基盤開発'
    ],
    [
        'year' => '2021',
        'period' => '2021年4月1日～2024年3月31日',
        'type' => '科学研究費（補助金）',
        'title' => '基盤研究（B）',
        'pi' => '渡辺雄貴',
        'summary' => 'デジタル教科書活用場面の分類に基づく教材設計支援'
    ],
    [
        'year' => '2020',
        'period' => '2020年4月1日～2023年3月31日',
        'type' => '科学研究費（補助金）',
        'title' => '基盤研究（B）',
        'pi' => 'Majumdar Rwitajit',
        'summary' => '学習ログと主観情報の連携による学習者支援'
    ],
    [
        'year' => '2019',
        'period' => '2019年4月1日～2023年3月31日',
        'type' => '科学研究費（補助金）',
        'title' => '基盤研究（A）',
        'pi' => '緒方広明',
        'summary' => 'リアルタイム学習支援のための教育ビッグデータ活用基盤の研究'
    ],
    [
        'year' => '2016',
        'period' => '2016年4月1日～2021年3月31日',
        'type' => '科学研究費（補助金）',
        'title' => '基盤研究（A）',
        'pi' => '緒方広明',
        'summary' => '学習者モデリングと学習ログ解析に基づく学習者支援システムの研究開発'
    ],
    [
        'year' => '2022',
        'period' => '2022年4月1日～2025年3月31日',
        'type' => '科学研究費（補助金）',
        'title' => '基盤研究（B）',
        'pi' => 'Majumdar Rwitajit',
        'summary' => 'GOAL project: AI-supported self-directed learning lifestyle in data-rich educational ecosystem'
    ],
    [
        'year' => '2022',
        'period' => '2022年4月1日〜2023年3月31日',
        'type' => '共同研究',
        'title' => 'デジタルアーカイブ教材活用と学習ログによる高等教育DX',
        'pi' => '緒方広明',
        'summary' => '大学の授業におけるデジタルアーカイブ教材の活用と学習ログ分析に基づく教育の質の向上'
    ],
    [
        'year' => '2022',
        'period' => '2022年10月〜2023年3月',
        'type' => '受託研究',
        'title' => 'AI for Education × LINE',
        'pi' => '緒方広明',
        'summary' => '学習ログとLINEを連携させた教育支援環境の研究開発'
    ],
    [
        'year' => '2021',
        'period' => '2021年4月1日～2024年3月31日',
        'type' => '共同研究',
        'title' => 'GIGAスクール構想支援',
        'pi' => '緒方広明',
        'summary' => '教育現場におけるICT活用の実態調査および支援手法の開発'
    ],
    [
        'year' => '2020',
        'period' => '2020年4月1日～2022年2月',
        'type' => '受託研究',
        'title' => 'EXAITプロジェクト',
        'pi' => '緒方広明',
        'summary' => '学習者の自己説明とAIの説明生成の共進化による教育学習支援環境の開発'
    ],
    [
        'year' => '2018',
        'period' => '2018年度～2020年度',
        'type' => '受託研究',
        'title' => 'ビッグデータ・AIを活用した教育研究',
        'pi' => '緒方広明',
        'summary' => '教育・学習のログデータに基づくテーラーメイド教育の実現'
    ],
    [
        'year' => '2018',
        'period' => '2018年度～2019年度',
        'type' => '受託研究',
        'title' => '「未来型教育」京都モデル実証事業',
        'pi' => '緒方広明',
        'summary' => '協働学習を中心とした実態把握と個別最適化学習の検討'
    ],
    [
        'year' => '2017',
        'period' => '2017年4月1日～2020年3月31日',
        'type' => '科学研究費（補助金）',
        'title' => '挑戦的萌芽研究',
        'pi' => '緒方広明',
        'summary' => '教育の現場における学習ログと教育評価の連携に関する研究'
    ],
    [
        'year' => '2016',
        'period' => '2016年4月1日～2019年3月31日',
        'type' => '共同研究',
        'title' => 'BookRollと図書館システムの連携',
        'pi' => '緒方広明',
        'summary' => 'BookRollと図書館資料推薦システムを連携した自学自習支援'
    ],
    [
        'year' => '2016',
        'period' => '2016年4月1日～2018年3月31日',
        'type' => '科学研究費（補助金）',
        'title' => '基盤研究（B）',
        'pi' => '緒方広明',
        'summary' => '学習ログに基づく教育評価のための情報基盤の開発'
    ],
    [
        'year' => '2016',
        'period' => '2016年4月1日～2017年3月31日',
        'type' => '共同研究',
        'title' => 'BookRollを用いた授業実践',
        'pi' => '緒方広明',
        'summary' => 'BookRollを活用した授業における教育実践とログの分析'
    ],
    [
        'year' => '2015',
        'period' => '2015年4月1日～2018年3月31日',
        'type' => '科学研究費（補助金）',
        'title' => '基盤研究（B）',
        'pi' => '緒方広明',
        'summary' => '教育ビッグデータを用いた教育・学習支援のためのクラウド情報基盤の研究'
    ],
    [
        'year' => '2015',
        'period' => '2015年4月1日～2016年3月31日',
        'type' => '共同研究',
        'title' => 'ラーニングログ活用型協調学習基盤',
        'pi' => '緒方広明',
        'summary' => '学習の体験映像を共有する協調学習情報基盤の開発と評価'
    ],
    [
        'year' => '2014',
        'period' => '2014年4月1日～2015年3月31日',
        'type' => '共同研究',
        'title' => 'eラーニング支援システムの研究',
        'pi' => '緒方広明',
        'summary' => 'eラーニング支援のための教材配信・学習記録システムの研究開発'
    ],
    [
        'year' => '2013',
        'period' => '2013年4月1日～2016年3月31日',
        'type' => '科学研究費（補助金）',
        'title' => '挑戦的萌芽研究',
        'pi' => '緒方広明',
        'summary' => '教育活動の可視化と学習支援のための記録システムの開発'
    ],
    [
        'year' => '2012',
        'period' => '2012年4月1日～2015年3月31日',
        'type' => '科学研究費（補助金）',
        'title' => '基盤研究（C）',
        'pi' => '緒方広明',
        'summary' => '学習環境における学習者の状態推定とフィードバックの最適化'
    ],
    [
        'year' => '2011',
        'period' => '2011年4月1日～2014年3月31日',
        'type' => '共同研究',
        'title' => 'モバイル学習環境の研究',
        'pi' => '緒方広明',
        'summary' => 'モバイル端末を活用した学習環境とログ収集・分析の研究'
    ],
    [
        'year' => '2010',
        'period' => '2010年4月1日～2013年3月31日',
        'type' => '科学研究費（補助金）',
        'title' => '若手研究（B）',
        'pi' => '緒方広明',
        'summary' => '学習ログを活用した学習支援システムの開発と実践'
    ],
    [
        'year' => '2009',
        'period' => '2009年4月1日～2012年3月31日',
        'type' => '共同研究',
        'title' => 'Web教材配信システム',
        'pi' => '緒方広明',
        'summary' => 'Webベース教材配信とログ解析による教育改善'
    ]
];


// Optional: group by year for future sectioning
// Sort grants by year descending

// Sort grants by year descending
usort($grants, function($a, $b) {
    return intval($b['year']) - intval($a['year']);
});

// Group sorted grants by year
$grouped = [];
foreach ($grants as $grant) {
    $grouped[$grant['year']][] = $grant;
}



?>

<div class="wrapper" id="grants-page-wrapper">
	<div class="<?php echo esc_attr($container); ?>" id="content">
		<div class="row">
			<div class="col-md-12 content-area" id="primary">
				<main class="site-main" id="main" role="main">
					<section class="grants-section py-5">
						<h1 class="mb-4">Grants Received</h1>

						<?php foreach ($grouped as $year => $items): ?>
							<h2 class="mt-5"><?php echo esc_html($year); ?>年</h2>
							<div class="grants-grid row row-cols-1 row-cols-md-2 g-4">
								<?php foreach ($items as $grant): ?>
									<div class="col">
										<div class="card h-100 shadow-sm border-0">
											<div class="card-body">
												<h5 class="card-title"><?php echo esc_html($grant['title']); ?></h5>
												<p class="card-text small text-muted mb-2"><?php echo esc_html($grant['type']); ?> | <?php echo esc_html($grant['period']); ?></p>
												<p class="card-text mb-2"><strong>PI:</strong> <?php echo esc_html($grant['pi']); ?></p>
												<p class="card-text"><?php echo esc_html($grant['summary']); ?></p>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						<?php endforeach; ?>
					</section>
				</main>
			</div><!-- #primary -->
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- .wrapper -->

<?php get_footer(); ?>
