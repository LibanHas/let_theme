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

/**
 * Sources of truth for this list:
 * - KAKEN (JSPS/NII) researcher page for 緒方広明（研究者番号 30274260）
 * - LEAF「獲得した研究費」ページ
 *
 * Policy:
 * - Include only items present on LEAF and/or KAKEN.
 * - For KAKEN grants, prefer KAKEN period/PI/category if LEAF differs.
 * - Non-KAKEN institutional/industry items are included only if present on LEAF.
 */
$grants = [

    // ---------- 2023 ----------
    [
        'year'   => '2023',
        'period' => '2023年4月26日〜2025年3月31日', // KAKEN準拠（LEAFは〜2026/03/31表記だがKAKEN優先）
        'type'   => '科学研究費（補助金）',
        'title'  => '基盤研究（A）',
        'pi'     => '緒方広明',
        'summary'=> 'リアルワールド教育データからのエビデンス抽出・共有・利用のための情報基盤開発（課題番号: 23H00505）'
    ],
    [
        'year'   => '2023',
        'period' => '2023年3月31日〜2024年3月31日',
        'type'   => '受託研究',
        'title'  => '国立教育政策研究所 令和5年度 教育データ分析・研究推進事業',
        'pi'     => '緒方広明',
        'summary'=> '「データ駆動型の教育」の実現に向けた実証、基盤開発およびポリシー検討'
    ],

    // ---------- 2022 ----------
    [
        'year'   => '2022',
        'period' => '2022年4月1日〜2024年3月31日',
        'type'   => '科学研究費（補助金）',
        'title'  => '基盤研究（B）',
        'pi'     => 'Majumdar Rwitajit',
        'summary'=> 'GOAL project: AI-supported self-directed learning lifestyle in data-rich educational ecosystem（課題番号: 22H03902）'
    ],
    [
        'year'   => '2022',
        'period' => '2022年4月1日〜2025年3月31日', // LEAF準拠
        'type'   => '科学研究費（補助金）',
        'title'  => '特別研究員奨励費',
        'pi'     => 'OCHEJA Patrick',
        'summary'=> 'ブロックチェーンを用いた生涯学習ログと分散ユーザーモデルの連結（課題番号: 22J15869）'
    ],
    [
        'year'   => '2022',
        'period' => '2022年8月31日〜2023年3月31日',
        'type'   => '科学研究費（補助金）',
        'title'  => '研究活動スタート支援',
        'pi'     => '堀越 泉',
        'summary'=> '学習ログを用いた適切な相互評価の実施・改善サイクルの開発（課題番号: 22K20246）'
    ],
    [
        'year'   => '2022',
        'period' => '2022年9月1日〜2023年3月31日',
        'type'   => '共同研究',
        'title'  => '㈱新学社との共同研究',
        'pi'     => '緒方広明',
        'summary'=> '小中学校における教育データの利活用に関する研究'
    ],
    [
        'year'   => '2022',
        'period' => '2022年9月1日〜2023年3月31日',
        'type'   => '共同研究',
        'title'  => '東京書籍㈱との共同研究',
        'pi'     => '緒方広明',
        'summary'=> 'デジタル教科書の閲覧履歴の分析・可視化手法の研究'
    ],

    // ---------- 2021 ----------
    [
        'year'   => '2021',
        'period' => '2021年7月9日〜2023年3月31日',
        'type'   => '科学研究費（基金）',
        'title'  => '挑戦的研究（萌芽）',
        'pi'     => 'Flanagan Brendan',
        'summary'=> 'Learning Support by Novel Modality Process Analysis of Educational Big Data（課題番号: 21K19824）'
    ],
    [
        'year'   => '2021',
        'period' => '2021年8月11日〜2022年3月31日',
        'type'   => '共同研究',
        'title'  => '東京書籍㈱との共同研究',
        'pi'     => '緒方広明',
        'summary'=> 'デジタル教科書の閲覧履歴を収集し、内容改訂のための分析・可視化手法の研究'
    ],
    [
        'year'   => '2021',
        'period' => '2021年9月17日〜2022年2月28日',
        'type'   => '受託研究',
        'title'  => '文部科学省初等中等教育局 実証研究・調査研究（京都市教育委員会）',
        'pi'     => '京都市（緒方広明）',
        'summary'=> 'オンライン学習システムの全国展開、先端技術・教育データの利活用促進事業「未来型教育 京都モデル 実証事業」'
    ],
   

    // ---------- 2020 ----------
    [
        'year'   => '2020',
        'period' => '2020年4月1日〜2022年3月31日', // KAKEN準拠（LEAFは〜2023/03/31表記、KAKEN優先）
        'type'   => '科学研究費（補助金）',
        'title'  => '基盤研究（B）',
        'pi'     => 'Flanagan Brendan',
        'summary'=> 'Knowledge-Aware Learning Analytics Infrastructure to Support Smart Education and Learning（課題番号: 20H01722）'
    ],
    [
        'year'   => '2020',
        'period' => '2020年4月1日〜2023年3月31日',
        'type'   => '科学研究費（基金）',
        'title'  => '若手研究',
        'pi'     => 'Majumdar Rwitajit',
        'summary'=> 'GOAL Project: SMART AI Support with Student\'s Learning and Wellbeing Data（課題番号: 20K20131）'
    ],
    [
        'year'   => '2020',
        'period' => '2020年12月1日〜2023年3月31日',
        'type'   => '委託研究費',
        'title'  => 'JST: 戦略的創造研究推進事業（ACT-X）',
        'pi'     => '黒宮寛之（研究実施責任者: 緒方広明）',
        'summary'=> '教育のエビデンス・エコシステムの構築'
    ],
    [
        'year'   => '2020',
        'period' => '2020年7月16日〜2025年3月31日',
        'type'   => '受託研究',
        'title'  => 'NEDO: 人と共に進化する次世代人工知能に関する技術開発事業 / 説明できるAIの基盤技術開発',
        'pi'     => '緒方広明',
        'summary'=> '学習者の自己説明とAIの説明生成の共進化による教育学習支援環境EXAITの研究開発'
    ],
    [
        'year'   => '2020',
        'period' => '2020年7月16日〜2025年3月31日',
        'type'   => '総長裁量経費',
        'title'  => '2019年度 総長裁量経費',
        'pi'     => '学術情報メディアセンター（緒方広明）',
        'summary'=> '自学自習の促進に向けたエビデンスに基づくデジタル教材推薦システムの研究開発'
    ],
    [
        'year'   => '2020',
        'period' => '2020年9月1日〜2021年2月28日',
        'type'   => '受託研究',
        'title'  => '文部科学省初等中等教育局 実証研究・調査研究（京都市教育委員会）',
        'pi'     => '京都市（緒方広明）',
        'summary'=> '新時代の学びにおける先端技術導入実証研究事業「未来型教育 京都モデル 実証事業」'
    ],

   
    [
        'year'   => '2019',
        'period' => '2019年4月25日〜2021年3月31日',
        'type'   => '科学研究費（補助金）',
        'title'  => '特別研究員奨励費',
        'pi'     => 'ABOU KHALIL Victoria',
        'summary'=> 'コンテキスト間の空似言葉学習支援のための研究（課題番号: 19J15167）'
    ],

    // ---------- 2018 ----------
    [
        'year'   => '2018',
        'period' => '2018年11月15日〜2023年3月31日',
        'type'   => '受託研究',
        'title'  => 'NEDO: 戦略的イノベーション創造プログラム（SIP）第2期 / 学習支援技術',
        'pi'     => '緒方広明',
        'summary'=> 'エビデンスに基づくテーラーメイド教育の研究開発'
    ],
    [
        'year'   => '2018',
        'period' => '2018年8月24日〜2020年3月31日',
        'type'   => '科学研究費（補助金）',
        'title'  => '研究活動スタート支援',
        'pi'     => 'Majumdar Rwitajit',
        'summary'=> 'Self-direction Skillの獲得支援技術の開発（課題番号: 18H05746）'
    ],
    [
        'year'   => '2018',
        'period' => '2018年8月24日〜2020年3月31日',
        'type'   => '科学研究費（補助金）',
        'title'  => '研究活動スタート支援',
        'pi'     => 'Hasnine Nehal',
        'summary'=> '教育ビッグデータと画像分析を用いた語彙学習に適切な画像推薦に関する研究（課題番号: 18H05745）'
    ],

    // ---------- 2016 ----------
    [
        'year'   => '2016',
        'period' => '2016年5月31日〜2020年3月31日', // KAKEN準拠（LEAFの〜2022は誤りのため修正）
        'type'   => '科学研究費（補助金）',
        'title'  => '基盤研究（S）',
        'pi'     => '緒方広明',
        'summary'=> '教育ビッグデータを用いた教育・学習支援のためのクラウド情報基盤の研究'
    ],

   
];

/** Sort & group (same as before) */
usort($grants, function($a, $b) {
    return intval($b['year']) - intval($a['year']);
});
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
            <h1 class="mb-4">助成実績</h1>

            <?php foreach ($grouped as $year => $items): ?>
              <h2 class="mt-5"><?php echo esc_html($year); ?>年</h2>
              <div class="grants-grid row row-cols-1 row-cols-md-2 g-4">
                <?php foreach ($items as $grant): ?>
                  <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo esc_html($grant['title']); ?></h5>
                        <p class="card-text small text-muted mb-2">
                          <?php echo esc_html($grant['type']); ?> | <?php echo esc_html($grant['period']); ?>
                        </p>
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
