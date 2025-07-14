<?php
/**
 * Template Name: Join Us Page (EN)
 *
 * Template for displaying the Join Us page in English.
 *
 * @package Understrap
 */

defined( 'ABSPATH' ) || exit;

get_header();

$tick_url = str_replace(["\r", "\n"], '', get_template_directory_uri() . '/images/icon-tick.svg');

$container = get_theme_mod( 'understrap_container_type' );
?>
<script>
  const themeBaseUrl = "<?php echo esc_url( get_template_directory_uri() ); ?>";
</script>
<div class="wrapper" id="join-us-wrapper">
    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
        <main class="site-main" id="main">
  <section class="join-hero section-spacing">
  <div class="container">

    <h1 class="page-title">Join Us</h1>

    <div class="join-description">
      <p class="split-line">
        The Ogata Laboratory (LET Lab) at Kyoto University is dedicated to researching cutting-edge information technologies that shape the future of education and learning.<br>
        Students and researchers from diverse backgrounds in Japan and abroad gather here to engage in advanced studies in educational data science and educational technology.
      </p>
      <p class="split-line">
        LET Lab is always seeking motivated and creative graduate students (Master’s and PhD).<br>
        Why not bring your ideas and curiosity to research that can make a real impact in educational settings?
      </p>
    </div>
  </div>
</section>


        <section class="join-profile content-block">
            <div class="container">
                <h2 class="join-section-heading">Who We’re Looking For</h2>
                <p class="join-section-intro">
                At LET Lab, we welcome people who:
                </p>

                <ul class="profile-list">
                <li>
                    <div class="icon-wrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/target.svg" alt="" />
                    </div>
                    <span>Are interested in observing and analyzing human behavior and learning processes</span>
                </li>
                <li>
                    <div class="icon-wrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/target.svg" alt="" />
                    </div>
                    <span>Want to apply mobile devices and wireless technologies in education</span>
                </li>
                <li>
                    <div class="icon-wrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/target.svg" alt="" />
                    </div>
                    <span>Wish to turn their ideas into concrete software or applications</span>
                </li>
                <li>
                    <div class="icon-wrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/target.svg" alt="" />
                    </div>
                    <span>Have an interest in analyzing and visualizing educational data to contribute to improving education</span>
                </li>
                <li>
                    <div class="icon-wrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/target.svg" alt="" />
                    </div>
                    <span>Are eager to engage in practical research that can be applied directly to real-world educational environments</span>
                </li>
                </ul>

                <p class="note">
                Working professionals and international students with a global perspective are also warmly welcomed.
                </p>
            </div>
        </section>
        <section class="skills-section content-block">
        <div class="container">
            <h2 class="join-section-heading">What You’ll Learn at LET Lab</h2>
            <p class="join-section-intro">
            Through research activities at LET Lab, you’ll gain practical skills such as:
            </p>

            <div class="skills-grid">
  <!-- Card 1 -->
  <div class="skill-card">
  <div class="skill-header">
  <div class="skill-title-row">
    <img src="<?php echo get_template_directory_uri(); ?>/images/laptop.svg" alt="System icon" class="skill-icon">
    <h3>Educational System Design & Development</h3>
  </div>
  <hr>
</div>
  <ul>
    <li><span class="tick" style="background-image: url('<?php echo esc_url($tick_url); ?>');"></span>
 Practical techniques for designing educational systems</li>
    <li><span class="tick" style="background-image: url('<?php echo esc_url($tick_url); ?>');"></span>
 Interface and user experience (UX) design</li>
    <li><span class="tick" style="background-image: url('<?php echo esc_url($tick_url); ?>');"></span>
 Opportunities to see your developed systems in use in real schools</li>
  </ul>
</div>


<!-- Card 2 -->
<div class="skill-card">
  <div class="skill-header">
    <div class="skill-title-row">
      <img src="<?php echo get_template_directory_uri(); ?>/images/database.svg" alt="Data icon" class="skill-icon">
      <h3>Data Analysis & Learning Analytics</h3>
    </div>
    <hr>
  </div>
  <ul>
    <li><span class="tick" style="background-image: url('<?php echo esc_url($tick_url); ?>');"></span>
 Techniques for collecting and analyzing educational data</li>
    <li><span class="tick" style="background-image: url('<?php echo esc_url($tick_url); ?>');"></span>
 Data visualization and information presentation using various tools</li>
    <li><span class="tick" style="background-image: url('<?php echo esc_url($tick_url); ?>');"></span>
 Educational support methods utilizing machine learning and AI</li>
  </ul>
</div>

<!-- Card 3 -->
<div class="skill-card">
  <div class="skill-header">
    <div class="skill-title-row">
      <img src="<?php echo get_template_directory_uri(); ?>/images/code-xml.svg" alt="Code icon" class="skill-icon">
      <h3>Application Development</h3>
    </div>
    <hr>
  </div>
  <ul>
    <li><span class="tick" style="background-image: url('<?php echo esc_url($tick_url); ?>');"></span>
 Web programming (PHP, Java, C, HTML5)</li>
    <li><span class="tick" style="background-image: url('<?php echo esc_url($tick_url); ?>');"></span>
 iOS/Android mobile app development</li>
    <li><span class="tick" style="background-image: url('<?php echo esc_url($tick_url); ?>');"></span>
 Prototyping practical applications</li>
  </ul>
</div>

<!-- Card 4 -->
<div class="skill-card">
  <div class="skill-header">
    <div class="skill-title-row">
      <img src="<?php echo get_template_directory_uri(); ?>/images/speech.svg" alt="Presentation icon" class="skill-icon">
      <h3>Strengthening Presentation Skills</h3>
    </div>
    <hr>
  </div>
  <ul>
    <li><span class="tick" style="background-image: url('<?php echo esc_url($tick_url); ?>');"></span>
 Academic writing (in Japanese and English)</li>
    <li><span class="tick" style="background-image: url('<?php echo esc_url($tick_url); ?>');"></span>
 Presentation skills at conferences and seminars</li>
    <li><span class="tick" style="background-image: url('<?php echo esc_url($tick_url); ?>');"></span>
 Participation in international collaborative research and discussions</li>
  </ul>
</div>


        </div>
</section>
<section class="application-prep-section content-block">
            <div class="container">
                <h2 class="section-title">How to Prepare Your Application</h2>
                <p class="intro">
                If you are considering visiting the lab or applying to graduate school at LET Lab, we recommend the following steps.<br>
                Preparing thoroughly in advance will help convey your enthusiasm and research interests more clearly.
                </p>

                <div class="faq-item">
                <h3>1. Clarify Your Research Topic</h3>
                <p>Read several key papers available on our website and identify the themes or fields that interest you most.</p>
                </div>

                <div class="faq-item">
                <h3>2. Write a Research Proposal (about one A4 page)</h3>
                <ul>
                    <li>What kind of research you want to pursue at LET Lab</li>
                    <li>Why you are interested in this topic</li>
                    <li>How you envision applying your research in the future</li>
                </ul>
                </div>

                <div class="faq-item">
                <h3>3. Prepare Your CV</h3>
                <p>Create a concise CV summarizing your academic background, work experience, and skills.</p>
                </div>
            </div>
        </section>

        <section class="admission-flow content-block">
        <div class="application-intro">
  <strong>Here’s an overview of the steps to apply for graduate school at LET Lab.</strong>
  Note that details may vary depending on the type of application and schedule.
</div>
  <div class="selectors">
    <select id="applicantType">
      <option value="master">Master’s</option>
      <option value="phd">Doctoral</option>
      <option value="research">Research Student</option>
    </select>

    <select id="entryTerm">
      <option value="april">April Entry</option>
      <option value="october">October Entry</option>
    </select>
  </div>

  <div id="stepsContainer" class="steps-grid"></div>
</section>

<section class="scroll-hero scroll-cta-section">
  <div class="scroll-hero__bg-wrapper">
    <img 
      src="<?php echo get_template_directory_uri(); ?>/images/kyoto.jpeg" 
      class="scroll-hero__bg" 
      alt="Kyoto cityscape">
    <div class="scroll-hero__overlay"></div>
  </div>

  <div class="scroll-hero__content">
    <h2 class="heading-1">Take the First Step with LET Lab</h2>
    <p class="scroll-hero__subtext">
      Why not take the first step? Everyone is welcome.
    </p>
    <p class="scroll-hero__smalltext">
      If you’re interested in visiting the lab or applying, please get in touch via the form below.<br>
      We’re also happy to discuss research topics and application preparation.
    </p>
    <div class="scroll-hero__buttons">
      <a href="/visit" class="btn btn--cta"><span>Book a Visit</span></a>
      <a href="/contact" class="btn btn--secondary-outline"><span>Contact Form</span></a>
    </div>
  </div>
</section>

        </main>
    </div>
</div>

<?php get_footer(); ?>
