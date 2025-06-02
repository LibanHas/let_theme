<?php
/**
 * Template Name: Library Integration Project Page
 *
 * Template for displaying the Library Integration project in full width.
 *
 * @package Understrap
 */

defined( 'ABSPATH' ) || exit;
get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper project-page" id="page-library-integration">
  <div class="<?php echo esc_attr( $container ); ?>" id="content">
    <div class="row justify-content-center">
      <div class="col-lg-10 content-area" id="primary">
        <main class="site-main" id="main" role="main">

          <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> &gt;
            <a href="/project">Projects</a> &gt;
            <span>【京都大学】図書館資料推薦システムの開発</span>
          </nav>

          <article class="project-entry">
            <header class="project-header">
              <h1 class="project-title">【京都大学内全学経費】デジタル教材配信システムと図書館資料推薦システムの連携による自学自習の促進</h1>
              <p class="project-meta">研究資金：京都大学内全学経費</p>
            </header>

            <div class="project-content">
              <p>本研究では、デジタル教材配信システムBookRollに図書館システムとの連携機能・フィードバック機能を実装することで、自学自習を促進する図書館資料推薦システムを構築します。</p>

              <h2>概要</h2>
              <p>BookRollは、講義中および予習・復習時に、教科書やスライド等の教材を、閲覧者のPCなどで表示すると同時に、閲覧ページ、閲覧時間やマーカー箇所を学習ログとして記録し解析できる。</p>
              <p>BookRollに図書館資料（蔵書、KURENAI収録論文）推薦機能を実装することで、学習内容に関連する資料を提示し、関心の深化を支援します。さらに、新着資料の推薦、自動解析、コメント機能、教員向けフィードバックダッシュボードも備えています。</p>

              <h2>期待される効果</h2>
              <ul>
                <li>学習ログを活用したエビデンスベースの自学自習支援</li>
                <li>図書館資料とデジタル教材の連携強化、新着資料の利用促進</li>
                <li>オープンアクセス論文の活用・引用増加への寄与</li>
                <li>将来的なオンライン授業への対応力強化</li>
                <li>教員へのフィードバックを通じた教育理解と質の向上</li>
              </ul>
            </div>
          </article>

        </main>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
