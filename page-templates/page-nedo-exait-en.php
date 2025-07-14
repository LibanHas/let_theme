<?php
/**
 * Template Name: NEDO EXAIT Project Page (EN)
 *
 * Template for displaying the EXAIT project page in full width (English).
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper project-page" id="page-nedo-exait-en">
	<div class="<?php echo esc_attr( $container ); ?>" id="content">
		<div class="row justify-content-center">
			<div class="col-lg-10 content-area" id="primary">
				<main class="site-main" id="main" role="main">

					<nav class="breadcrumb">
						<a href="/en">Home</a> &gt;
						<a href="/en/projects-2">Projects</a> &gt;
						<span>[NEDO] Research and Development of EXAIT</span>
					</nav>

					<article class="project-entry">
						<header class="project-header">
							<h1 class="project-title">[NEDO] Research and Development of the Educational Support Environment EXAIT through the Co-Evolution of Learner Self-Explanation and AI Explanation Generation</h1>
							<p class="project-meta">July 2020 – February 2022 | Commissioned by: New Energy and Industrial Technology Development Organization (NEDO)</p>
						</header>

						<div class="project-content">
							<p>This project develops the educational explanation-generation AI engine EXAIT (Educational Explainable AI Tools) in collaboration with Uchida Yoko Co., Ltd. and the Kyoto City Board of Education. It aims to introduce learning analytics into real school environments. In July 2020, it was selected for NEDO’s “Technology Development Project for Next-Generation Artificial Intelligence Co-Evolving with Humans” and full-scale empirical research began in November.</p>

							<h2>Background</h2>
							<p>With the Ministry of Education’s GIGA School initiative promoting device deployment in classrooms, the importance of AI in education is increasing. However, if AI analysis results are not convincing to learners, it is difficult to foster learner autonomy. This project focuses on developing “explainable AI” that provides persuasive analytical data, conducting empirical research in collaboration with the Kyoto City Board of Education.</p>

							<h2>Overview</h2>
							<p>Building on the LEAF system, which consists of BookRoll and LA View, the project develops and integrates the AI engine EXAIT to generate explanations from learning behaviors.</p>
							<figure>
								<img src="<?php echo get_template_directory_uri(); ?>/images/project-nedo-structure.png" alt="LEAF and EXAIT System Architecture" class="img-fluid">
								<figcaption class="text-center"><strong>System Architecture of the LEAF Platform and EXAIT Engine</strong></figcaption>
							</figure>

							<p>Empirical research was conducted in schools in Kyoto City. Uchida Yoko handled system construction and data management, and jointly evaluated the system’s effectiveness.</p>

							<h2>Data-Driven Research and Development of EXAIT</h2>
							<p>The AI engine EXAIT combines both model-driven and data-driven approaches for explanation generation. The model-driven approach recommends the next learning content based on knowledge structures, while the data-driven approach generates explanations from logs. By integrating these, EXAIT visualizes and supports the learning process.</p>
							<figure>
								<img src="<?php echo get_template_directory_uri(); ?>/images/project-nedo-model.png" alt="Model-Driven EXAIT Overview" class="img-fluid">
								<figcaption class="text-center"><strong>Overview of Model-Driven EXAIT Using Learner Self-Explanations</strong></figcaption>
							</figure>

							<h2>Research Grant</h2>
							<ul>
								<li>NEDO “Technology Development Project for Next-Generation Artificial Intelligence Co-Evolving with Humans”</li>
								<li>“Development of Fundamental Technologies for Explainable AI / Research and Development of EXAIT”</li>
								<li>Research Period: July 2020 – February 2022</li>
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
?>
