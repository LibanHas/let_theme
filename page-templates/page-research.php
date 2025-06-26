<?php
/**
 * Template Name: Research Page
 */
defined( 'ABSPATH' ) || exit;
get_header();

?>


<div class="wrapper" id="page-research">
  <div class="container" id="content">
    <div class="row">
      <div class="col-lg-12 content-area" id="primary">
        <main class="site-main" id="main">

          <!-- Research Hero Section -->
   <!-- Research Hero Section -->
<section class="section-spacing research-hero-section">
  <div class="container">
    
    <!-- Title -->
    <h1 class="page-title">Research</h1>
    <h2 class="page-subtitle">研究</h2>

    <!-- Two-column layout -->
    <div class="row align-items-center research-hero-content mt-4">
      
      <!-- Left: Text -->
      <div class="col-md-6">
        <p class="research-intro">
          LETでは、学習ログと分析を活用し、実際の教室データに基づいて教育を改善しています。<br>
          私たちのアプローチは、シームレスで個別化された学習と、エビデンスに基づいた指導を重視しています。
        </p>
      </div>

      <!-- Right: Image -->
      <div class="col-md-6 text-center">
        <img 
          src="<?php echo get_template_directory_uri(); ?>/images/network.png" 
          alt="Learning network illustration" 
          class="img-fluid"
        >
      </div>

    </div>

    <!-- Scroll-down indicator -->
    <div class="scroll-indicator text-center mt-4">
      <img src="<?php echo get_template_directory_uri(); ?>/images/scroll_down.svg" alt="Scroll Down" width="24">
    </div>

  </div>
</section>



<section class="theme-section section-spacing research-accordion">
<div class="theme-inner">
  <div class="container">
    <h2 class="section-heading">テーマ</h2>

    <!-- 学習ログの可視化 -->
    <div class="theme-card accordion-header" data-target="theme-logs">
      <div class="theme-card__main" >
        <div class="theme-card__icon">
          <img src="<?php echo get_template_directory_uri(); ?>/images/icon-logs.svg" alt="ログ可視化アイコン">
        </div>
        <div class="theme-card__text">
          <h3 class="theme-card__title">学習ログの可視化</h3>
          <p class="theme-card__description">学習ログに基づく分析で、授業や学習の質を向上。</p>
        </div>
        <div class="theme-card__expand">
          <span class="accordion-icon">＋</span>
        </div>
      </div>
      <div class="theme-card__bottom">
        <div class="theme-card__line"></div>
        <div class="theme-card__triangle"></div>
      </div>
    </div>
    <div class="accordion-panel theme-card__content" id="theme-logs">
    <div class="research-block">
    <h4>なぜ可視化するのか？</h4>
  <p>
    学習ログとは、教材をどのように読んだか、どこに時間をかけたか、何に注目し、どんな疑問を持ったかを記録したデータです。<br>
    これまで見えなかった学びの過程を可視化することで、学習者自身の振り返りや、教師による指導の最適化を実現します。
  </p>
  </div>
  <div class="research-block">
  <h4>可視化される主なログ</h4>
  <table>
    <thead>
      <tr>
        <th>ログの種類</th>
        <th>具体例</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><strong>閲覧履歴</strong></td>
        <td>どの教材をいつ開き、どのページにどれだけ滞在したか</td>
      </tr>
      <tr>
        <td><strong>ハイライト・メモ</strong></td>
        <td>強調した文章、書き込んだコメント</td>
      </tr>
      <tr>
        <td><strong>クイズの記録</strong></td>
        <td>解答結果、正答率、再挑戦の有無など</td>
      </tr>
      <tr>
        <td><strong>再訪ログ</strong></td>
        <td>特定のページや教材へのアクセス頻度</td>
      </tr>
    </tbody>
  </table>
</div>
  <div class="research-block">
  <h4>教師にとっての価値</h4>
  <ul>
    <li><span class="tick" style="background-image: url('http://localhost/let_theme/www/wp-content/themes/let_theme/images/icon-tick.svg');"></span> 生徒のつまずき箇所を把握し、授業改善に活かす</li>
    <li><span class="tick" style="background-image: url('http://localhost/let_theme/www/wp-content/themes/let_theme/images/icon-tick.svg');"></span> クラス全体の傾向と個別の違いを見比べて対応</li>
    <li><span class="tick" style="background-image: url('http://localhost/let_theme/www/wp-content/themes/let_theme/images/icon-tick.svg');"></span> 経験に基づいた指導を、**エビデンスで裏付ける**</li>
  </ul>
  </div>
  <div class="research-block">
  <h4>学習者にとっての価値</h4>
  <ul>
    <li><span class="tick" style="background-image: url('http://localhost/let_theme/www/wp-content/themes/let_theme/images/icon-tick.svg');"></span> 自分の学習の進め方やクセを <strong>客観的に可視化</strong></li>
    <li><span class="tick" style="background-image: url('http://localhost/let_theme/www/wp-content/themes/let_theme/images/icon-tick.svg');"></span> データを手がかりに、復習や振り返りができる</li>
    <li><span class="tick" style="background-image: url('http://localhost/let_theme/www/wp-content/themes/let_theme/images/icon-tick.svg');"></span> 「自分の学び方を知る」ことで、<strong>学習に自信</strong>が持てる</li>
  </ul>
</div>
<div class="research-block">
<h4>実践例</h4>
<div class="theme-example">
  <div class="theme-example__text">
    <p><strong>京都市立高校（英語授業）</strong></p>
    <p>
      <em>BookRoll</em>を用いた英文読解教材の配信において、生徒は「わからない箇所」を黄色、「重要だと思った箇所」を赤でハイライトしました。<br>
      授業中に<em>LogPalette</em>でこれらの情報を確認した教師は、多くの生徒が理解に苦しんでいる段落を即座に特定し、その場で授業内容を調整しました。
    </p>
  </div>
  </div>
  <div class="research-block">
  <blockquote class="theme-example__quote">
    <p>「これまで見えなかった“つまずき”が、授業中に可視化されることで、対応が変わった」</p>
    <cite>— 京都市立高校 英語科 教員</cite>
  </blockquote>
</div>
</div>
<div class="research-block">
<h4>関連プロジェクト・論文</h4>
<ul class="theme-resources">
  <li>
    【内閣府】SIP 第2期プロジェクト（2018–2020）<br>
    <a href="https://www.let.media.kyoto-u.ac.jp/project/sip/" target="_blank">
      https://www.let.media.kyoto-u.ac.jp/project/sip/
    </a>
  </li>
  <li>
    【論文】Ogata et al. (2023). <em>Visualizing Learning Behavior for Adaptive Teaching.</em> LAK2023<br>
    
  </li>
</ul>
</div>
</div>

    <!-- 教育支援ツールの開発 -->
    <div class="theme-card accordion-header" data-target="theme-tools">
      <div class="theme-card__main">
        <div class="theme-card__icon">
          <img src="<?php echo get_template_directory_uri(); ?>/images/pickaxe.svg" alt="教育支援ツールアイコン">
        </div>
        <div class="theme-card__text">
          <h3 class="theme-card__title">教育支援ツールの開発</h3>
          <p class="theme-card__description">
            学習科学の知見と現場のニーズをもとに、<br />教育支援ツールの設計・開発と実証研究を<br />行なっています。
          </p>
        </div>
        <div class="theme-card__expand">
          <span class="accordion-icon">＋</span>
        </div>
      </div>
      <div class="theme-card__bottom">
        <div class="theme-card__line"></div>
        <div class="theme-card__triangle"></div>
      </div>
    </div>
    <div class="accordion-panel theme-card__content" id="theme-tools">
  <!-- <p>
    私たちは、教材配信、学習記録、可視化、分析などを支援するツールを設計・開発しています。単なるICT導入ではなく、授業の質を高め、学習者の理解と行動を支えるための実用的かつ持続可能な設計を目指しています。
  </p> -->

  <h4>現場との協働による改良と検証</h4>
  <p>
    開発は現場の先生方との継続的な対話に基づいて進められています。ツールの使いやすさや教育効果は、実際の授業での利用を通じて繰り返し検証され、エビデンスに基づいて改善が図られています。
  </p>

  <h4>主要なシステムとツール</h4>
  <p>実証研究と現場の協働から生まれた代表的なツールをご紹介します。</p>
  <div class="research-block">
  <div class="our-tools-section">
    <div class="tool-item">
      <div class="tool-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/images/bookroll-icon.svg" alt="BookRoll Logo">
      </div>
      <div class="tool-description">
        <p>
          BookRollは、双方向型の教材を配信・記録できるデジタルプラットフォームで、
          個別最適化されたデータ駆動型の学びを実現します。
        </p>
      </div>
      <div class="tool-button">
        <a data-anim-trigger-self data-anim="fade-in" href="https://eds.let.media.kyoto-u.ac.jp/leaf/bookroll/" class="btn btn--cta">
          <span>Bookrollの詳細へ</span>
        </a>
      </div>
    </div>

    <hr class="tool-divider">

    <div class="tool-item">
      <div class="tool-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logpalette-icon.png" alt="LogPalette Logo">
      </div>
      <div class="tool-description">
        <p>
          LogPaletteは、学習者の教材とのやり取りを可視化するラーニングアナリティクスツールで、
          学習者と教育者の双方に気づきを提供します。
        </p>
      </div>
      <div class="tool-button">
        <a data-anim-trigger-self data-anim="fade-in" href="https://eds.let.media.kyoto-u.ac.jp/leaf/logpalette/" class="btn btn--cta">
          <span>LogPaletteの詳細へ</span>
        </a>
      </div>
    </div>
    <hr class="tool-divider">
  </div>
</div>
</div>
    <!-- 学習者モデリング -->
    <div class="theme-card accordion-header" data-target="theme-modeling">
      <div class="theme-card__main" >
        <div class="theme-card__icon">
          <img src="<?php echo get_template_directory_uri(); ?>/images/people.svg" alt="学習者モデリングアイコン">
        </div>
        <div class="theme-card__text">
          <h3 class="theme-card__title">学習者モデリング</h3>
          <p class="theme-card__description">学習ログの分析により、個別最適な支援を実現。</p>
        </div>
        <div class="theme-card__expand">
          <span class="accordion-icon">＋</span>
        </div>
      </div>
      <div class="theme-card__bottom">
        <div class="theme-card__line"></div>
        <div class="theme-card__triangle"></div>
      </div>
    </div>
    <div class="accordion-panel theme-card__content" id="theme-modeling">
      <!-- <p>
        学習行動データをもとに、理解度や学習スタイルをモデリングします。<br>
        教師はフィードバックに活かし、学習者自身は振り返りに使えるように設計されています。
      </p> -->
      <div class="research-block">
      <h4>学習行動から“個別の学び方”を捉える</h4>
      <p>
        私たちは、教材配信、学習記録、可視化、分析などを支援するツールを設計・開発しています。
        単なるICT導入ではなく、授業の質を高め、学習者の理解と行動を支えるための実用的かつ持続可能な設計を目指しています。
      </p>
      </div>
      <div class="research-block">
      <h4>教師と学習者、両方への支援に活用</h4>
      <ul class="icon-list">
        <li><strong>教師：</strong> 学習者の理解状況に応じたフィードバックが可能</li>
        <li><strong>学習者：</strong> 自分の学習スタイルを客観的に振り返ることができる</li>
        <li><strong>システム：</strong> モデルに基づいて教材を自動推薦したり、再学習を促したりすることも</li>
      </ul>
      </div>
      <div class="research-block">
      <h4>モデリングは、他の研究テーマと連動</h4>
      <p>
        この技術は、「学習ログの可視化」「教育支援ツール」「xAPI連携」などのテーマと連携し、
        パーソナライズされた教育支援を実現する基盤になっています。
      </p>
    </div>
    </div>

    <!-- xAPIと学習基盤の構築 -->
    <div class="theme-card accordion-header" data-target="theme-xapi">
      <div class="theme-card__main" >
        <div class="theme-card__icon">
          <img src="<?php echo get_template_directory_uri(); ?>/images/globe.svg" alt="xAPIアイコン">
        </div>
        <div class="theme-card__text">
          <h3 class="theme-card__title">xAPIと学習基盤の構築</h3>
          <p class="theme-card__description">
          学習活動の国際標準xAPIにより、<br />学習ログの一元的な蓄積・活用を実現しています。</p>
        </div>
        <div class="theme-card__expand">
          <span class="accordion-icon">＋</span>
        </div>
      </div>
      <div class="theme-card__bottom">
        <div class="theme-card__line"></div>
        <div class="theme-card__triangle"></div>
      </div>
    </div>
    <div class="accordion-panel theme-card__content" id="theme-xapi">
  <!-- <p>
    複数のツールやシステムから学習ログを共通の形式で収集し、LRS（Learning Record Store）に蓄積。学校と研究者の双方にとって活用しやすい基盤を整備中です。
  </p> -->
  <div class="research-block">
  <h4>なぜ学習基盤の構築が重要なのか</h4>
  <p>
    学習活動は様々なツールや教室で行われますが、ログの記録方法が統一されていないと、データの活用や分析が難しくなります。<br>
    xAPIを活用することで、学習ログを共通の形式で記録・保存・共有できるようになり、授業改善・再学習・研究活用が可能になります。
  </p>
  </div>
  <div class="research-block">
  <h4>学習基盤の設計と運用</h4>
  <p>
    私たちは、BookRollやLogPaletteなどのツールをxAPIに対応させ、リアルタイムでログをLRS（Learning Record Store）に蓄積する仕組みを構築しています。
  </p>
  <p>
    また、複数校で共通のxAPIプロファイルを用いることで、学校を越えたログの比較・分析や、個別最適化された学習支援の実現にも取り組んでいます。
  </p>
</div>
</div>


    <!-- 実証研究 -->
    <div class="theme-card accordion-header" data-target="theme-field">
      <div class="theme-card__main" >
        <div class="theme-card__icon">
          <img src="<?php echo get_template_directory_uri(); ?>/images/school.svg" alt="実証研究アイコン">
        </div>
        <div class="theme-card__text">
          <h3 class="theme-card__title">実証研究</h3>
          <p class="theme-card__description">学校や教育現場と連携し、<br />実際の授業でツールを活用・検証。</p>
        </div>
        <div class="theme-card__expand">
          <span class="accordion-icon">＋</span>
        </div>
      </div>
      <div class="theme-card__bottom">
        <div class="theme-card__line"></div>
        <div class="theme-card__triangle"></div>
      </div>
    </div>
    <div class="accordion-panel theme-card__content" id="theme-field">
  <!-- <p>
    単なる実装にとどまらず、教師や生徒の声を取り入れながら継続的な改善と検証を行っています。<br>
    教室で生まれたフィードバックを研究に反映し、さらに教育現場に還元する「研究と実践の循環」を重視しています。
  </p> -->
  <div class="research-block">
  <h4>教室で、理論を確かめる</h4>
  <p>
    私たちは、ツールやモデルを学校現場で実際に活用しながら研究を進める「実証研究」に取り組んでいます。<br>
    単なるテスト導入ではなく、継続的に使用しながら改善と検証を繰り返すことで、理論と実践の往復を可能にします。
  </p>
</div>
<div class="research-block">
  <h4>どのような場面で行われているか？</h4>
  <ul>
    <li><span class="tick" style="background-image: url('http://localhost/let_theme/www/wp-content/themes/let_theme/images/icon-tick.svg');"></span>授業中の学習ログをもとに理解度や関心を分析</li>
    <li><span class="tick" style="background-image: url('http://localhost/let_theme/www/wp-content/themes/let_theme/images/icon-tick.svg');"></span>学習後のメモやコメントを使ったリフレクション支援</li>
    <li><span class="tick" style="background-image: url('http://localhost/let_theme/www/wp-content/themes/let_theme/images/icon-tick.svg');"></span>学期末の成績や発言データとの関連を検証</li>
  </ul>
</div>
<div class="research-block">
  <h4>現場と研究の両側面から</h4>
  <table>
    <thead>
      <tr>
        <th>教育現場の視点</th>
        <th>研究の視点</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>実際の授業で活用しやすい設計かを評価</td>
        <td>ログと成果をもとに教育効果を分析</td>
      </tr>
      <tr>
        <td>教師や生徒の声を取り入れて改善</td>
        <td>複数校・複数年での再現性と汎用性を検証</td>
      </tr>
    </tbody>
  </table>
</div>
<div class="research-block">
  <h4>なぜ実証研究が重要か？</h4>
  <p>
    私たちは、「使いやすいツール」や「見えるデータ」の開発だけでなく、学校現場との協働を通じて実践に根ざしたエビデンスを蓄積し、それを次の研究と実装に活かす循環的なアプローチを大切にしています。
  </p>
  <p>
    実際の授業の中で生まれたフィードバックをもとに、ツール・モデル・分析手法を継続的に見直す、研究と実践の循環的アプローチを重視しています。
  </p>
  <p>
    そのために、開発した仕組みを現場で使い、現場の声に耳を傾け、実際の授業で繰り返し検証します。<br>
    このような実証研究の積み重ねが、エビデンスに基づく教育支援を可能にし、ツール・データ・授業がつながる持続的な学びの基盤となっていきます。
  </p>
</div>
<div class="research-block">
  <blockquote class="field-quote">
    <p>「BookRollのメモを翌週の授業設計に使うようになりました」</p>
    <footer>— 高校英語科 教員</footer>
  </blockquote>
</div>
<div class="research-block">
  <h4>関連論文</h4>
  <ul>
    <li>
      【論文】Ogata et al. (2022). <em>Learning and Evidence Analytics Framework (LEAF): Innovating Log Data Driven Services for Teaching and Learning</em><br>
      ※PDF
    </li>
  </ul>
</div>
</div>
  </div>
</div>
</section>


<section class="work-section">
  <div class="section-header">
    <h2>Explore Our Work</h2>
    <p>研究や活動の詳細をご覧ください。</p>
  </div>
  <div class="work-grid">
    <a href="https://eds.let.media.kyoto-u.ac.jp/sip3/" class="work-item">
    <img src="<?php echo get_template_directory_uri(); ?>/images/sip3_hero_image.jpg" alt="Scroll Down">
      <h3>SIP3</h3>
      <div class="description">⽀援的な学習環境の構築と分析を⾏う研究プロジェクト</div>
    </a>
    <a href="publications/" class="work-item">
    <img src="<?php echo get_template_directory_uri(); ?>/images/publications_image.jpg" alt="Scroll Down">
      <h3>Publications</h3>
      <div class="description">国内外の学会・論⽂誌に掲載された研究成果⼀覧</div>
    </a>
    <a href="projects/" class="work-item">
    <img src="<?php echo get_template_directory_uri(); ?>/images/projects_image.png" alt="Scroll Down">
      <h3>Projects</h3>
      <div class="description">現在進⾏中および過去の教育⽀援プロジェクト</div>
    </a>
    <a href="grants/" class="work-item">
    <img src="<?php echo get_template_directory_uri(); ?>/images/grants_image.png" alt="Scroll Down">
      <h3>Grants</h3>
      <div class="description">これまでに採択された研究費・助成⾦の情報</div>
    </a>
  </div>
</section>


 </main><!-- #main -->
      </div><!-- #primary -->
    </div><!-- .row -->
  </div><!-- #content -->
</div><!-- .wrapper -->

<?php get_footer(); ?>
