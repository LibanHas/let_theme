<?php
/**
 * Template Name: Project SIP2 Page
 *
 * A dedicated full-width template for the 内閣府 SIP2 project.
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper project-page" id="page-sip2">
  <div class="container" id="content">
    <div class="row justify-content-center">
      <div class="col-lg-10 content-area" id="primary">
        <main class="site-main" id="main" role="main">

          <nav class="breadcrumb">
            <a href="/">Home</a> &gt;
            <a href="/project">Projects</a> &gt;
            <span>【内閣府】テーラーメイド教育の研究開発</span>
          </nav>

          <article class="project-entry">
            <header class="project-header">
              <h1 class="project-title">【内閣府】ビッグデータ・ＡＩを活用したサイバー空間基盤技術／学習支援技術／エビデンスに基づくテーラーメイド教育の研究開発</h1>
              <p class="project-meta">2018年度～2020年度｜委託：戦略的イノベーション創造プログラム（SIP）</p>
            </header>

            <div class="project-content">
              <p>本研究では、自動化が難しく、高度なインタラクションを必要とする教育分野において、学びに関するデータ（スタディ・ログ）を収集・蓄積・分析し、学習認知科学、人工知能、情報基盤技術を有機的に統合したペダゴジカル情報プラットフォームを研究開発することで、エキスパート教師の経験や教育スキルをAI技術でいつでもどこでも再現可能とし、エビデンスに基づき学習者の特性に合わせたテーラーメイド教育を実現することを目的としています。</p>

              <h2>概要</h2>
              <p>公正に個別最適化された学習支援を目指し、学習認知科学、人工知能、情報基盤技術を有機的に統合したペダゴジカル情報プラットフォームを構築します。
              ターゲットは小・中・高等学校生徒の英語と数学（算数）の学力向上です。学習履歴や教師とのインタラクションをスタディ・ログとして蓄積し、類似度マッチング等を用いて学習教材・方法を提案するシステムを構築します。</p>

              <h2>研究開発テーマ</h2>
              <ul>
                <li>研究開発テーマ1：エビデンスの収集およびエビデンスに基づく学習支援の研究開発</li>
                <li>研究開発テーマ2：ペダゴジカル情報プラットフォームの実現と社会実装に向けた研究開発</li>
              </ul>

              <h2>本研究室での研究内容</h2>
              <p>本研究室では、知識モデルやユーザモデルなど、教育・学習の知的支援のために必要となる基本モジュールを、LAプラットフォーム上に開発します。教材・問題から知識要素を抽出し、知識モデルを構築。ログ分析によりユーザモデルを形成し、個人適応型教材の推薦や最適なグループ構成などを支援します。</p>

              <figure>
                <img src="<?php echo get_template_directory_uri(); ?>/images/project-sip2-model.png" alt="知識モデルとユーザーモデル" class="img-fluid">
                <figcaption class="text-center"><strong>知識モデルとユーザーモデル</strong></figcaption>
              </figure>

              <h2>研究助成</h2>
              <ul>
                <li>戦略的イノベーション創造プログラム（ＳＩＰ）第２期</li>
                <li>「ビッグデータ・ＡＩを活用したサイバー空間基盤技術／学習支援技術／エビデンスに基づくテーラーメイド教育の研究開発」</li>
                <li>研究期間：2018年度 ～ 2020年度</li>
              </ul>
            </div>
          </article>

        </main>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>