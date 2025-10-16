<?php
/**
 * Template Name: Publications Page
 *
 * Template for displaying the Publications page.
 *
 * @package UnderStrap
 */

defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="publications-wrapper">
  <div class="<?php echo esc_attr($container); ?>" id="content">
    <div class="row">
      <div class="col-md-12 content-area" id="primary">
        <main class="site-main" id="main" role="main">

          <!-- HERO BANNER -->
          <section class="section-spacing">
            <div class="container">
              <div class="news-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
                <?php if ( function_exists('pll_current_language') && pll_current_language() === 'ja' ) : ?>
                  <h2 class="page-subtitle">出版</h2>
                <?php endif; ?>
              </div>
            </div>
          </section>

          <!-- ACCORDION SECTION -->
          <div class="accordion">

            <!-- Journal Papers -->
            <div class="accordion-item">
              <button class="accordion-header" data-target="panel1">
                <span>Journal papers</span>
                <span class="accordion-icon plus-icon">
                  <span class="line horizontal"></span>
                  <span class="line vertical"></span>
                </span>
              </button>
              <div class="accordion-panel" id="panel1" aria-busy="true">
                <div class="spinner" aria-live="polite">
                  <div class="ring" role="status"></div>
                  <span class="sr-only">Loading…</span>
                </div>
                <iframe
                  data-src="https://lab.let.media.kyoto-u.ac.jp/let-pub/journalPapers"
                  loading="lazy"
                  style="width:100%; height:600px; border:none;"
                  title="Journal papers"
                ></iframe>
              </div>
            </div>

            <!-- International Conferences -->
            <div class="accordion-item">
              <button class="accordion-header" data-target="panel2">
                <span>International Conferences</span>
                <span class="accordion-icon plus-icon">
                  <span class="line horizontal"></span>
                  <span class="line vertical"></span>
                </span>
              </button>
              <div class="accordion-panel" id="panel2">
                <div class="spinner" aria-live="polite">
                  <div class="ring" role="status"></div>
                  <span class="sr-only">Loading…</span>
                </div>
                <iframe
                  data-src="https://lab.let.media.kyoto-u.ac.jp/let-pub/conferences"
                  loading="lazy"
                  style="width:100%; height:600px; border:none;"
                  title="International conferences"
                ></iframe>
              </div>
            </div>

            <!-- Book Editor -->
            <div class="accordion-item">
              <button class="accordion-header" data-target="panel3">
                <span>Book editor</span>
                <span class="accordion-icon plus-icon">
                  <span class="line horizontal"></span>
                  <span class="line vertical"></span>
                </span>
              </button>
              <div class="accordion-panel" id="panel3">
                <div class="spinner" aria-live="polite">
                  <div class="ring" role="status"></div>
                  <span class="sr-only">Loading…</span>
                </div>
                <iframe
                  data-src="https://lab.let.media.kyoto-u.ac.jp/let-pub/bookEditors"
                  loading="lazy"
                  style="width:100%; height:600px; border:none;"
                  title="Book editors"
                ></iframe>
              </div>
            </div>

            <!-- Book Chapter -->
            <div class="accordion-item">
              <button class="accordion-header" data-target="panel4">
                <span>Book chapter</span>
                <span class="accordion-icon plus-icon">
                  <span class="line horizontal"></span>
                  <span class="line vertical"></span>
                </span>
              </button>
              <div class="accordion-panel" id="panel4">
                <div class="spinner" aria-live="polite">
                  <div class="ring" role="status"></div>
                  <span class="sr-only">Loading…</span>
                </div>
                <iframe
                  data-src="https://lab.let.media.kyoto-u.ac.jp/let-pub/bookChapters"
                  loading="lazy"
                  style="width:100%; height:600px; border:none;"
                  title="Book chapters"
                ></iframe>
              </div>
            </div>

            <!-- Keynote -->
            <div class="accordion-item">
              <button class="accordion-header" data-target="panel5">
                <span>Keynote</span>
                <span class="accordion-icon plus-icon">
                  <span class="line horizontal"></span>
                  <span class="line vertical"></span>
                </span>
              </button>
              <div class="accordion-panel" id="panel5">
                <div class="spinner" aria-live="polite">
                  <div class="ring" role="status"></div>
                  <span class="sr-only">Loading…</span>
                </div>
                <iframe
                  data-src="https://lab.let.media.kyoto-u.ac.jp/let-pub/invitedTalks"
                  loading="lazy"
                  style="width:100%; height:600px; border:none;"
                  title="Keynotes & invited talks"
                ></iframe>
              </div>
            </div>

            <!-- Survey Paper -->
            <div class="accordion-item">
              <button class="accordion-header" data-target="panel6">
                <span>Survey paper</span>
                <span class="accordion-icon plus-icon">
                  <span class="line horizontal"></span>
                  <span class="line vertical"></span>
                </span>
              </button>
              <div class="accordion-panel" id="panel6">
                <div class="spinner" aria-live="polite">
                  <div class="ring" role="status"></div>
                  <span class="sr-only">Loading…</span>
                </div>
                <iframe
                  data-src="https://lab.let.media.kyoto-u.ac.jp/let-pub/surveyPapers"
                  loading="lazy"
                  style="width:100%; height:600px; border:none;"
                  title="Survey papers"
                ></iframe>
              </div>
            </div>

            <!-- Domestic Conferences -->
            <div class="accordion-item">
              <button class="accordion-header" data-target="panel7">
                <span>Domestic Conferences</span>
                <span class="accordion-icon plus-icon">
                  <span class="line horizontal"></span>
                  <span class="line vertical"></span>
                </span>
              </button>
              <div class="accordion-panel" id="panel7">
                <div class="spinner" aria-live="polite">
                  <div class="ring" role="status"></div>
                  <span class="sr-only">Loading…</span>
                </div>
                <iframe
                  data-src="https://lab.let.media.kyoto-u.ac.jp/let-pub/domesticConferences"
                  loading="lazy"
                  style="width:100%; height:600px; border:none;"
                  title="Domestic conferences"
                ></iframe>
              </div>
            </div>

            <!-- Press -->
            <div class="accordion-item">
              <button class="accordion-header" data-target="panel8">
                <span>Press Releases & Newspapers</span>
                <span class="accordion-icon plus-icon">
                  <span class="line horizontal"></span>
                  <span class="line vertical"></span>
                </span>
              </button>
              <div class="accordion-panel" id="panel8">
                <div class="spinner" aria-live="polite">
                  <div class="ring" role="status"></div>
                  <span class="sr-only">Loading…</span>
                </div>
                <iframe
                  data-src="https://lab.let.media.kyoto-u.ac.jp/let-pub/newspapers"
                  loading="lazy"
                  style="width:100%; height:600px; border:none;"
                  title="Press releases & newspapers"
                ></iframe>
              </div>
            </div>

            <!-- Awards -->
            <div class="accordion-item">
              <button class="accordion-header" data-target="panel9">
                <span>Awards</span>
                <span class="accordion-icon plus-icon">
                  <span class="line horizontal"></span>
                  <span class="line vertical"></span>
                </span>
              </button>
              <div class="accordion-panel" id="panel9">
                <div class="spinner" aria-live="polite">
                  <div class="ring" role="status"></div>
                  <span class="sr-only">Loading…</span>
                </div>
                <iframe
                  data-src="https://lab.let.media.kyoto-u.ac.jp/let-pub/awards"
                  loading="lazy"
                  style="width:100%; height:600px; border:none;"
                  title="Awards"
                ></iframe>
              </div>
            </div>

            <!-- Patents -->
            <div class="accordion-item">
              <button class="accordion-header" data-target="panel10">
                <span>Patents</span>
                <span class="accordion-icon plus-icon">
                  <span class="line horizontal"></span>
                  <span class="line vertical"></span>
                </span>
              </button>
              <div class="accordion-panel" id="panel10">
                <div class="spinner" aria-live="polite">
                  <div class="ring" role="status"></div>
                  <span class="sr-only">Loading…</span>
                </div>
                <iframe
                  data-src="https://lab.let.media.kyoto-u.ac.jp/let-pub/patents"
                  loading="lazy"
                  style="width:100%; height:600px; border:none;"
                  title="Patents"
                ></iframe>
              </div>
            </div>

            <!-- Symposiums -->
            <div class="accordion-item">
              <button class="accordion-header" data-target="panel11">
                <span>Symposiums</span>
                <span class="accordion-icon plus-icon">
                  <span class="line horizontal"></span>
                  <span class="line vertical"></span>
                </span>
              </button>
              <div class="accordion-panel" id="panel11">
                <div class="spinner" aria-live="polite">
                  <div class="ring" role="status"></div>
                  <span class="sr-only">Loading…</span>
                </div>
                <iframe
                  data-src="https://lab.let.media.kyoto-u.ac.jp/let-pub/symposiums"
                  loading="lazy"
                  style="width:100%; height:600px; border:none;"
                  title="Symposiums"
                ></iframe>
              </div>
            </div>

            <!-- Doctoral & Master's Thesis -->
            <div class="accordion-item">
              <button class="accordion-header" data-target="panel12">
                <span>Doctoral & Master’s Thesis</span>
                <span class="accordion-icon plus-icon">
                  <span class="line horizontal"></span>
                  <span class="line vertical"></span>
                </span>
              </button>
              <div class="accordion-panel" id="panel12">
                <div class="spinner" aria-live="polite">
                  <div class="ring" role="status"></div>
                  <span class="sr-only">Loading…</span>
                </div>
                <iframe
                  data-src="https://lab.let.media.kyoto-u.ac.jp/let-pub/doctoralAndMastersThesis"
                  loading="lazy"
                  style="width:100%; height:600px; border:none;"
                  title="Doctoral & Master’s thesis"
                ></iframe>
              </div>
            </div>

            <!-- Others -->
            <div class="accordion-item">
              <button class="accordion-header" data-target="panel13">
                <span>Others</span>
                <span class="accordion-icon plus-icon">
                  <span class="line horizontal"></span>
                  <span class="line vertical"></span>
                </span>
              </button>
              <div class="accordion-panel" id="panel13">
                <div class="spinner" aria-live="polite">
                  <div class="ring" role="status"></div>
                  <span class="sr-only">Loading…</span>
                </div>
                <iframe
                  data-src="https://lab.let.media.kyoto-u.ac.jp/let-pub/others"
                  loading="lazy"
                  style="width:100%; height:600px; border:none;"
                  title="Other publications"
                ></iframe>
              </div>
            </div>

          </div><!-- .accordion -->

        </main><!-- #main -->
      </div><!-- #primary -->
    </div><!-- .row -->
  </div><!-- .container -->
</div><!-- .wrapper -->

<?php get_footer(); ?>
