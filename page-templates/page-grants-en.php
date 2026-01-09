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

    // ---------- 2023 ----------
    [
        'year'   => '2023',
        'period' => '2023年4月26日〜2025年3月31日',
        'type'   => 'Grants-in-Aid for Scientific Research (KAKENHI)',
        'title'  => 'Grant-in-Aid for Scientific Research (A)',
        'pi'     => 'Hiroaki Ogata',
        'summary'=> 'Development of an information infrastructure for extracting, sharing, and utilizing evidence from real-world educational data (Project No.: 23H00505)'
    ],
    [
        'year'   => '2023',
        'period' => '2023年3月31日〜2024年3月31日',
        'type'   => 'Commissioned Research',
        'title'  => 'National Institute for Educational Policy Research (FY2023 Educational Data Analysis and Research Promotion Project)',
        'pi'     => 'Hiroaki Ogata',
        'summary'=> 'Empirical study, infrastructure development, and policy consideration toward the realization of data-driven education'
    ],

    // ---------- 2022 ----------
    [
        'year'   => '2022',
        'period' => '2022年4月1日〜2024年3月31日',
        'type'   => 'Grants-in-Aid for Scientific Research (KAKENHI)',
        'title'  => 'Grant-in-Aid for Scientific Research (B)',
        'pi'     => 'Rwitajit Majumdar',
        'summary'=> 'GOAL project: AI-supported self-directed learning lifestyle in data-rich educational ecosystem (Project No.: 22H03902)'
    ],
    [
        'year'   => '2022',
        'period' => '2022年4月1日〜2025年3月31日',
        'type'   => 'Grant-in-Aid for JSPS Fellows',
        'title'  => 'JSPS Research Fellowship',
        'pi'     => 'OCHEJA Patrick',
        'summary'=> 'Linking lifelong learning logs and distributed user models using blockchain (Project No.: 22J15869)'
    ],
    [
        'year'   => '2022',
        'period' => '2022年8月31日〜2023年3月31日',
        'type'   => 'Grants-in-Aid for Scientific Research (KAKENHI)',
        'title'  => 'Grant-in-Aid for Research Activity Start-up',
        'pi'     => 'Izumi Horikoshi',
        'summary'=> 'Developing a cycle for appropriate peer assessment implementation and improvement using learning logs (Project No.: 22K20246)'
    ],
    [
        'year'   => '2022',
        'period' => '2022年9月1日〜2023年3月31日',
        'type'   => 'Collaborative Research',
        'title'  => 'Collaborative Research with Shingakusha Co., Ltd.',
        'pi'     => 'Hiroaki Ogata',
        'summary'=> 'Research on the utilization of educational data in elementary and junior high schools'
    ],
    [
        'year'   => '2022',
        'period' => '2022年9月1日〜2023年3月31日',
        'type'   => 'Collaborative Research',
        'title'  => 'Collaborative Research with Tokyo Shoseki Co., Ltd.',
        'pi'     => 'Hiroaki Ogata',
        'summary'=> 'Research on analysis and visualization methods for digital textbook usage logs'
    ],

    // ---------- 2021 ----------
    [
        'year'   => '2021',
        'period' => '2021年7月9日〜2023年3月31日',
        'type'   => 'Grants-in-Aid for Scientific Research (Fund)',
        'title'  => 'Grant-in-Aid for Challenging Research (Exploratory)',
        'pi'     => 'Brendan Flanagan',
        'summary'=> 'Learning Support by Novel Modality Process Analysis of Educational Big Data (Project No.: 21K19824)'
    ],
    [
        'year'   => '2021',
        'period' => '2021年8月11日〜2022年3月31日',
        'type'   => 'Collaborative Research',
        'title'  => 'Collaborative Research with Tokyo Shoseki Co., Ltd.',
        'pi'     => 'Hiroaki Ogata',
        'summary'=> 'Collecting digital textbook usage logs and researching analysis/visualization methods for content revision'
    ],
    [
        'year'   => '2021',
        'period' => '2021年9月17日〜2022年2月28日',
        'type'   => 'Commissioned Research',
        'title'  => 'MEXT Elementary and Secondary Education Bureau – Demonstration/Survey Research (Kyoto City Board of Education)',
        'pi'     => 'Kyoto City (Hiroaki Ogata)',
        'summary'=> 'Nationwide deployment of online learning systems and promotion of advanced technologies/educational data utilization: “Kyoto Model for Future-Oriented Education” demonstration project'
    ],

    // ---------- 2020 ----------
    [
        'year'   => '2020',
        'period' => '2020年4月1日〜2022年3月31日',
        'type'   => 'Grants-in-Aid for Scientific Research (KAKENHI)',
        'title'  => 'Grant-in-Aid for Scientific Research (B)',
        'pi'     => 'Brendan Flanagan',
        'summary'=> 'Knowledge-Aware Learning Analytics Infrastructure to Support Smart Education and Learning (Project No.: 20H01722)'
    ],
    [
        'year'   => '2020',
        'period' => '2020年4月1日〜2023年3月31日',
        'type'   => 'Grants-in-Aid for Scientific Research (Fund)',
        'title'  => 'Grant-in-Aid for Early-Career Scientists',
        'pi'     => 'Rwitajit Majumdar',
        'summary'=> 'GOAL Project: SMART AI Support with students’ learning and wellbeing data (Project No.: 20K20131)'
    ],
    [
        'year'   => '2020',
        'period' => '2020年12月1日〜2023年3月31日',
        'type'   => 'Commissioned Research Funds',
        'title'  => 'JST: ACT-X (Advanced Core Technologies for Practical Applications – Individual Type)',
        'pi'     => 'Hiroyuki Kuromiya (Research Implementation Responsible: Hiroaki Ogata)',
        'summary'=> 'Building an evidence ecosystem for education'
    ],
    [
        'year'   => '2020',
        'period' => '2020年7月16日〜2025年3月31日',
        'type'   => 'Commissioned Research',
        'title'  => 'NEDO: R&D on Technologies for Next-Generation AI Co-Evolving with Humans / Foundational Technologies for Explainable AI',
        'pi'     => 'Hiroaki Ogata',
        'summary'=> 'EXAIT: Developing an educational learning support environment via co-evolution of learners’ self-explanations and AI explanation generation'
    ],
    [
        'year'   => '2020',
        'period' => '2020年7月16日〜2025年3月31日',
        'type'   => 'President’s Discretionary Expenses',
        'title'  => 'FY2019 President’s Discretionary Expenses',
        'pi'     => 'Academic Center for Computing and Media Studies (Hiroaki Ogata)',
        'summary'=> 'Evidence-based digital learning material recommendation system for promoting self-directed study'
    ],
    [
        'year'   => '2020',
        'period' => '2020年9月1日〜2021年2月28日',
        'type'   => 'Commissioned Research',
        'title'  => 'MEXT Elementary and Secondary Education Bureau – Demonstration/Survey Research (Kyoto City Board of Education)',
        'pi'     => 'Kyoto City (Hiroaki Ogata)',
        'summary'=> 'Demonstration project on introducing advanced technologies in learning (“Kyoto Model for Future-Oriented Education”)'
    ],

    // ---------- 2019 ----------
    [
        'year'   => '2019',
        'period' => '2019年4月25日〜2021年3月31日',
        'type'   => 'Grant-in-Aid for JSPS Fellows',
        'title'  => 'JSPS Research Fellowship',
        'pi'     => 'ABOU KHALIL Victoria',
        'summary'=> 'Research to support learning of pseudo-homonyms across contexts (Project No.: 19J15167)'
    ],

    // ---------- 2018 ----------
    [
        'year'   => '2018',
        'period' => '2018年11月15日〜2023年3月31日',
        'type'   => 'Commissioned Research',
        'title'  => 'NEDO: Cross-ministerial Strategic Innovation Promotion Program (SIP) – Phase 2 / Learning Support Technology',
        'pi'     => 'Hiroaki Ogata',
        'summary'=> 'R&D on evidence-based tailor-made education'
    ],
    [
        'year'   => '2018',
        'period' => '2018年8月24日〜2020年3月31日',
        'type'   => 'Grants-in-Aid for Scientific Research (KAKENHI)',
        'title'  => 'Grant-in-Aid for Research Activity Start-up',
        'pi'     => 'Rwitajit Majumdar',
        'summary'=> 'GOAL Project: Developing technology support for acquisition of self-direction skill (Project No.: 18H05746)'
    ],
    [
        'year'   => '2018',
        'period' => '2018年8月24日〜2020年3月31日',
        'type'   => 'Grants-in-Aid for Scientific Research (KAKENHI)',
        'title'  => 'Grant-in-Aid for Research Activity Start-up',
        'pi'     => 'Hasnine Nehal',
        'summary'=> 'Recommending appropriate images for vocabulary learning using educational big data and image analysis (Project No.: 18H05745)'
    ],

    // ---------- 2016 ----------
    [
        'year'   => '2016',
        'period' => '2016年5月31日〜2022年3月31日',
        'type'   => 'Grants-in-Aid for Scientific Research (KAKENHI)',
        'title'  => 'Grant-in-Aid for Scientific Research (S)',
        'pi'     => 'Hiroaki Ogata',
        'summary'=> 'Research on cloud-based information infrastructure for educational and learning support using educational big data'
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
