<?php
/**
 * Template Name: MEXT Kyoto Model Project Page
 *
 * Template for displaying the MEXT Kyoto Model project page.
 *
 * @package Understrap
 */

defined( 'ABSPATH' ) || exit;
get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper project-page" id="page-mext-kyoto-model">
  <div class="<?php echo esc_attr( $container ); ?>" id="content">
    <div class="row justify-content-center">
      <div class="col-lg-10 content-area" id="primary">
        <main class="site-main" id="main" role="main">

          <nav class="breadcrumb">
            <a href="/">Home</a> &gt;
            <a href="/project">Projects</a> &gt;
            <span>【文科省】京都モデル実証事業</span>
          </nav>

          <article class="project-entry">
            <header class="project-header">
              <h1 class="project-title">【文科省】「未来型教育」京都モデル実証事業（2018年度～2019年度）</h1>
              <p class="project-meta">2018年度～2019年度｜助成：文部科学省</p>
            </header>

            <div class="project-content">
              <p>本研究のテーマは、協働学習を中心とした、児童生徒の実態把握（児童生徒の学力、学習状況、心理状況）と、その統合的分析を通した、個々に最適な学びの在り方の検討することです。</p>

              <h2>目的</h2>
              <ul>
                <li>児童生徒の学力、日々の学習状況や心理状況の可視化による、児童生徒の実態把握</li>
                <li>教育EBPMに基づいた、学習成果最大化のための教員支援と個別最適化された学びの提供</li>
                <li>スタディ・ログの利活用ポリシーの検討と検証</li>
              </ul>

              <h2>概要</h2>
              <p>Society5.0時代に求められる資質・能力を育成するため、様々な先端技術を効果的に活用し、思考力・判断力・表現力、主体性等の育成に関する学習方法、指導方法、評価方法の研究を行います。</p>
              <p>協働学習を中心に、教員や児童生徒の音声を捉え、発話内容や感情の変化をタブレット上にリアルタイムで表示。学習状況の可視化や振り返り支援を通じて、主体的な学びを促進します。</p>
              <p>さらに、習熟度やログを分析し、個別最適な学習方法や指導法を検討。アンケート、学力データ、タブレット操作ログなどを統合的に分析し、協働学習の最適なグループ編成と教育EBPMの実現を目指します。</p>
              <figure>
                <img src="<?php echo get_template_directory_uri(); ?>/images/project-mext-kyoto-diagram.png" alt="未来型教育のシステム構成図" class="img-fluid">
                <figcaption class="text-center"><strong>未来型教育モデルの構成イメージ</strong></figcaption>
                </figure>
              <h2>研究助成</h2>
              <ul>
                <li>文部科学省「新時代の学びにおける先端技術導入実証研究事業」</li>
                <li>（学校における先端技術の活用に関する実証事業）</li>
                <li>2018年度～2019年度</li>
              </ul>
            </div>
          </article>

        </main>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
