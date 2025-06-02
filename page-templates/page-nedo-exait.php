<?php
/**
 * Template Name: NEDO EXAIT Project Page
 *
 * Template for displaying the EXAIT project page in full width.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper project-page" id="page-nedo-exait">
	<div class="<?php echo esc_attr( $container ); ?>" id="content">
		<div class="row justify-content-center">
			<div class="col-lg-10 content-area" id="primary">
				<main class="site-main" id="main" role="main">

					<nav class="breadcrumb">
						<a href="/">Home</a> &gt;
						<a href="/project">Projects</a> &gt;
						<span>【NEDO】EXAITの研究開発</span>
					</nav>

					<article class="project-entry">
						<header class="project-header">
							<h1 class="project-title">【NEDO】学習者の自己説明とAIの説明生成の共進化による教育学習支援環境EXAITの研究開発</h1>
							<p class="project-meta">2020年7月 ～ 2022年2月｜委託：国立研究開発法人 NEDO</p>
						</header>

						<div class="project-content">
							<p>本研究は、教育用説明生成AIエンジンEXAIT (Educational Explainable AI Tools) を構築するとともに、株式会社内田洋行、京都市教育委員会と連携し、ラーニングアナリティクスの学校現場への導入に取り組むものです。2020年7月、NEDOによる「人と共に進化する次世代人工知能に関する技術開発事業」に採択され、11月より本格的に実証研究を開始します。</p>

							<h2>背景</h2>
							<p>文科省「GIGAスクール構想」により端末整備が進む中、教育でのAI活用の重要性が増しています。しかし、AIによる解析結果が学習者にとって納得できるものでなければ主体性を引き出すことが難しいという課題がありました。本研究では、納得感のある分析データを提示できる「説明できるAI」の開発と、京都市教育委員会との連携による実証研究を行います。</p>

							<h2>概要</h2>
							<p>BookRollとLA Viewで構成されるLEAFシステムを基盤に、学習行動から説明生成を行うAIエンジン「EXAIT」を開発・搭載します。</p>
							<figure>
								<img src="<?php echo get_template_directory_uri(); ?>/images/project-nedo-structure.png" alt="LEAFとEXAITの構成" class="img-fluid">
								<figcaption class="text-center"><strong>LEAF情報基盤システムとEXAITエンジンのシステム構成</strong></figcaption>
							</figure>

							<p>実証研究は京都市内の学校で実施し、内田洋行がシステム構築とデータ管理を担当、共同で効果検証を行います。</p>

							<h2>データ駆動型EXAITの研究開発</h2>
							<p>AIエンジン「EXAIT」は、モデル駆動とデータ駆動の両面から説明生成を行います。前者は知識構造をもとに次に学ぶ内容を推薦、後者はログから説明を生成し、両者を融合して学習プロセスを可視化・支援します。</p>
							<figure>
								<img src="<?php echo get_template_directory_uri(); ?>/images/project-nedo-model.png" alt="モデル駆動型EXAIT" class="img-fluid">
								<figcaption class="text-center"><strong>自己説明を用いたモデル駆動型EXAITの概要</strong></figcaption>
							</figure>

							<h2>研究助成</h2>
							<ul>
								<li>国立研究開発法人NEDO「人と共に進化する次世代人工知能に関する技術開発事業」</li>
								<li>「説明できるAIの基盤技術開発／EXAITの研究開発」</li>
								<li>研究期間：2020年7月 ～ 2022年2月</li>
							</ul>
						</div>
					</article>

				</main>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();