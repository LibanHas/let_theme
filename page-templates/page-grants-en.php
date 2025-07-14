<?php
/**
 * Template Name: Grants Page (EN)
 *
 * Custom template for displaying a styled, user-friendly grants list (English version).
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
        'period' => 'April 1, 2024 – March 31, 2029',
        'type' => 'Commissioned Research',
        'title' => 'Strategic Innovation Promotion Program (SIP3)',
        'pi' => 'Hiroaki Ogata',
        'summary' => 'Building a platform to realize new ways of learning and working in the post-COVID era.'
    ],
    [
        'year' => '2024',
        'period' => 'April 1, 2024 – March 31, 2026',
        'type' => 'Collaborative Research',
        'title' => 'Benesse Corporation',
        'pi' => 'Hiroaki Ogata',
        'summary' => 'Research on identifying learner comprehension centered on “writing learning actions” and developing instructional methods based on them.'
    ],
    [
        'year' => '2023',
        'period' => 'April 26, 2023 – March 31, 2026',
        'type' => 'Grants-in-Aid for Scientific Research (KAKENHI)',
        'title' => 'Grant-in-Aid for Scientific Research (A)',
        'pi' => 'Hiroaki Ogata',
        'summary' => 'Developing an information infrastructure for extracting, sharing, and utilizing evidence from real-world educational data.'
    ],
    [
        'year' => '2022',
        'period' => 'April 1, 2022 – March 31, 2025',
        'type' => 'Grants-in-Aid for Scientific Research (KAKENHI)',
        'title' => 'Grant-in-Aid for Scientific Research (B)',
        'pi' => 'Rwitajit Majumdar',
        'summary' => 'GOAL project: AI-supported self-directed learning lifestyle in data-rich educational ecosystems.'
    ],
    [
        'year' => '2021',
        'period' => 'April 1, 2021 – March 31, 2024',
        'type' => 'Grants-in-Aid for Scientific Research (KAKENHI)',
        'title' => 'Grant-in-Aid for Scientific Research (B)',
        'pi' => 'Yuki Watanabe',
        'summary' => 'Supporting instructional design based on classification of digital textbook usage scenarios.'
    ],
    [
        'year' => '2020',
        'period' => 'April 1, 2020 – March 31, 2023',
        'type' => 'Grants-in-Aid for Scientific Research (KAKENHI)',
        'title' => 'Grant-in-Aid for Scientific Research (B)',
        'pi' => 'Rwitajit Majumdar',
        'summary' => 'Supporting learners by linking learning logs and subjective information.'
    ],
    [
        'year' => '2019',
        'period' => 'April 1, 2019 – March 31, 2023',
        'type' => 'Grants-in-Aid for Scientific Research (KAKENHI)',
        'title' => 'Grant-in-Aid for Scientific Research (A)',
        'pi' => 'Hiroaki Ogata',
        'summary' => 'Research on utilizing educational big data for real-time learning support.'
    ],
    [
        'year' => '2016',
        'period' => 'April 1, 2016 – March 31, 2021',
        'type' => 'Grants-in-Aid for Scientific Research (KAKENHI)',
        'title' => 'Grant-in-Aid for Scientific Research (A)',
        'pi' => 'Hiroaki Ogata',
        'summary' => 'Research and development of learner support systems based on learner modeling and learning log analysis.'
    ],
    [
        'year' => '2022',
        'period' => 'April 1, 2022 – March 31, 2023',
        'type' => 'Collaborative Research',
        'title' => 'Digital Archive Teaching Materials Utilization and Learning Logs for Higher Education DX',
        'pi' => 'Hiroaki Ogata',
        'summary' => 'Improving the quality of education based on the use of digital archive teaching materials and analysis of learning logs in university classes.'
    ],
    [
        'year' => '2022',
        'period' => 'October 2022 – March 2023',
        'type' => 'Commissioned Research',
        'title' => 'AI for Education × LINE',
        'pi' => 'Hiroaki Ogata',
        'summary' => 'Research and development of an educational support environment that links learning logs with LINE.'
    ],
    [
        'year' => '2021',
        'period' => 'April 1, 2021 – March 31, 2024',
        'type' => 'Collaborative Research',
        'title' => 'GIGA School Initiative Support',
        'pi' => 'Hiroaki Ogata',
        'summary' => 'Survey of ICT utilization in educational settings and development of support methods.'
    ],
    [
        'year' => '2020',
        'period' => 'April 1, 2020 – February 2022',
        'type' => 'Commissioned Research',
        'title' => 'EXAIT Project',
        'pi' => 'Hiroaki Ogata',
        'summary' => 'Development of an educational support environment through the co-evolution of learners’ self-explanations and AI explanation generation.'
    ],
    [
        'year' => '2018',
        'period' => 'FY2018 – FY2020',
        'type' => 'Commissioned Research',
        'title' => 'Educational Research Utilizing Big Data and AI',
        'pi' => 'Hiroaki Ogata',
        'summary' => 'Realizing tailor-made education based on educational and learning log data.'
    ],
    [
        'year' => '2018',
        'period' => 'FY2018 – FY2019',
        'type' => 'Commissioned Research',
        'title' => '“Future-Oriented Education” Kyoto Model Demonstration Project',
        'pi' => 'Hiroaki Ogata',
        'summary' => 'Exploring and verifying personalized learning approaches centered on collaborative learning.'
    ],
    [
        'year' => '2017',
        'period' => 'April 1, 2017 – March 31, 2020',
        'type' => 'Grants-in-Aid for Scientific Research (KAKENHI)',
        'title' => 'Challenging Exploratory Research',
        'pi' => 'Hiroaki Ogata',
        'summary' => 'Research on linking learning logs and educational evaluation in real classroom settings.'
    ],
    [
        'year' => '2016',
        'period' => 'April 1, 2016 – March 31, 2019',
        'type' => 'Collaborative Research',
        'title' => 'Integration of BookRoll and Library Systems',
        'pi' => 'Hiroaki Ogata',
        'summary' => 'Supporting self-directed learning by linking BookRoll with a library materials recommendation system.'
    ],
    [
        'year' => '2016',
        'period' => 'April 1, 2016 – March 31, 2018',
        'type' => 'Grants-in-Aid for Scientific Research (KAKENHI)',
        'title' => 'Grant-in-Aid for Scientific Research (B)',
        'pi' => 'Hiroaki Ogata',
        'summary' => 'Development of an information infrastructure for educational assessment based on learning logs.'
    ],
    [
        'year' => '2016',
        'period' => 'April 1, 2016 – March 31, 2017',
        'type' => 'Collaborative Research',
        'title' => 'Teaching Practice Using BookRoll',
        'pi' => 'Hiroaki Ogata',
        'summary' => 'Educational practices using BookRoll in classes and analysis of the resulting learning logs.'
    ],
    [
        'year' => '2015',
        'period' => 'April 1, 2015 – March 31, 2018',
        'type' => 'Grants-in-Aid for Scientific Research (KAKENHI)',
        'title' => 'Grant-in-Aid for Scientific Research (B)',
        'pi' => 'Hiroaki Ogata',
        'summary' => 'Research on cloud-based information infrastructure for educational and learning support using big educational data.'
    ],
    [
        'year' => '2015',
        'period' => 'April 1, 2015 – March 31, 2016',
        'type' => 'Collaborative Research',
        'title' => 'Collaborative Learning Platform Utilizing Learning Logs',
        'pi' => 'Hiroaki Ogata',
        'summary' => 'Development and evaluation of a collaborative learning information platform for sharing learning experience videos.'
    ],
    [
        'year' => '2014',
        'period' => 'April 1, 2014 – March 31, 2015',
        'type' => 'Collaborative Research',
        'title' => 'Research on e-Learning Support Systems',
        'pi' => 'Hiroaki Ogata',
        'summary' => 'Research and development of content delivery and learning log systems for e-learning support.'
    ],
    [
        'year' => '2013',
        'period' => 'April 1, 2013 – March 31, 2016',
        'type' => 'Grants-in-Aid for Scientific Research (KAKENHI)',
        'title' => 'Challenging Exploratory Research',
        'pi' => 'Hiroaki Ogata',
        'summary' => 'Development of a recording system for visualizing educational activities and supporting learning.'
    ],
    [
        'year' => '2012',
        'period' => 'April 1, 2012 – March 31, 2015',
        'type' => 'Grants-in-Aid for Scientific Research (KAKENHI)',
        'title' => 'Grant-in-Aid for Scientific Research (C)',
        'pi' => 'Hiroaki Ogata',
        'summary' => 'Estimating learner states and optimizing feedback in learning environments.'
    ],
    [
        'year' => '2011',
        'period' => 'April 1, 2011 – March 31, 2014',
        'type' => 'Collaborative Research',
        'title' => 'Research on Mobile Learning Environments',
        'pi' => 'Hiroaki Ogata',
        'summary' => 'Research on mobile learning environments utilizing handheld devices and collecting/analyzing learning logs.'
    ],
    [
        'year' => '2010',
        'period' => 'April 1, 2010 – March 31, 2013',
        'type' => 'Grants-in-Aid for Scientific Research (KAKENHI)',
        'title' => 'Young Researchers Grant (B)',
        'pi' => 'Hiroaki Ogata',
        'summary' => 'Development and implementation of a learning support system utilizing learning logs.'
    ],
    [
        'year' => '2009',
        'period' => 'April 1, 2009 – March 31, 2012',
        'type' => 'Collaborative Research',
        'title' => 'Web-Based Teaching Material Distribution System',
        'pi' => 'Hiroaki Ogata',
        'summary' => 'Improving education through web-based teaching material distribution and log analysis.'
    ],    
    
];


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
							<h2 class="mt-5"><?php echo esc_html($year); ?></h2>
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
