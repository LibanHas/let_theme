<?php
/**
 * Template Name: About Page (EN)
 *
 * @package Understrap
 */

defined('ABSPATH') || exit;

get_header();
?>

<div class="wrapper" id="about-page-wrapper">
  <div class="container-fluid" id="content">
    <main class="site-main" id="main">

      <!-- Hero Section -->
      <section class="about-hero section-spacing">
        <div class="container">
          <div class="row align-items-center">
            <!-- Text Column -->
            <div class="col-12 col-lg-6 mb-4 mb-lg-0 text-lg-start text-center">
              <h1 class="about-hero-title fw-bold mb-4">
                <span class="d-block d-md-inline">For every learner,</span>
                <span class="d-block d-md-inline">evidence and technology.</span>
              </h1>
              <p>
                At the Ogata Lab (LET), we aim to evolve education from something based on intuition and experience into something grounded in evidence and technology.
              </p>
              <p>
                By visualizing the learning process and identifying each learner's level of understanding and challenges, we help create better lessons and provide more effective support.<br>
                In partnership with educational institutions, we work to create environments where everyone can learn effectively—anytime, anywhere.
              </p>
            </div>

            <!-- Image Column -->
            <div class="col-12 col-lg-6 text-center">
              <img src="<?php echo get_template_directory_uri(); ?>/images/center-image.jpg" alt="LET Lab building" class="img-fluid rounded-3">
            </div>
          </div>
        </div>
      </section>

      <!-- Timeline Section -->
      <section class="timeline-section section-spacing">
        <div class="container">
          <h2 class="section-title">Milestones of Ogata Lab</h2>
          <div class="timeline-wrapper">
          <div class="timeline-line"></div>

          <?php
          $milestones = [
            ["April 2017", "Ogata Lab established at Kyoto University", "uni_building.png", "LET Lab team"],
            ["Around 2018", "Official launch of BookRoll", "bookroll-icon.svg", "BookRoll Logo"],
            ["From 2018", "Development and introduction of the LEAF system begins", "brain.svg", "brain"],
            ["Around 2021", "Use of BookRoll at Kyoto Municipal Saikyo High School", "school.svg", "school"],
            ["From 2021", "Used in faculty development activities at Kyoto University", "graduation-cap.svg", "cap"],
            ["September 2023", "LEAF pilot begins at Hokkaido Suttsu and Teshio High Schools", "test.svg", "test"],
            ["October 2023", "Start of SIP Phase 3 project", "rocket.svg", "rocket"],
            ["2024", "Participation in xAPI Profile Server project", "server.svg", "server"]
          ];

          foreach ($milestones as $i => [$date, $text, $img, $alt]) :
            $labelClass = $i % 2 === 0 ? 'top' : 'bottom';
            $delay = $i * 100;
          ?>
            <div class="timeline-milestone" data-aos="zoom-in" data-aos-delay="<?= esc_attr($delay); ?>">
              <div class="timeline-label <?= esc_attr($labelClass); ?>">
                <div class="timeline-date"><?= esc_html($date); ?></div>
                <div class="timeline-text"><?= esc_html($text); ?></div>
              </div>
              <div class="timeline-icon">
                <img src="<?= esc_url(get_template_directory_uri() . '/images/' . $img); ?>" alt="<?= esc_attr($alt); ?>" class="img-fluid rounded-3">
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </section>

      <!-- Tagline Animation Section -->
      <div class="tagline-anim-wrapper">
        <div class="tagline-split">Making_learning_visible</div>
      </div>

      <section class="approach-section container content-block">
        <h2 class="section-title">Our Approach</h2>
        <p class="section-intro">
          At the Ogata Lab, we aim to shift education from something based on intuition and experience to something grounded in data and evidence by making previously invisible aspects of learning visible.
          Traditionally, learners' levels of understanding and struggles have been left to the teacher's intuition.
          By using technology and learning analytics, we are able to record and analyze the learning process itself, giving us new ways to understand what’s happening.
        </p>
        <p class="section-intro">
          We collect and analyze the resulting learning logs and behavioral data, identify issues and insights, and use those to reflect and improve.
          By repeating this cycle, we continuously enhance educational quality and provide personalized learning support for each student.
        </p>

        <section class="founder-quote-section container content-block">
          <div class="row align-items-center">
            <!-- Left: Image -->
            <div class="col-md-6 text-center mb-4 mb-md-0">
              <img src="<?php echo get_template_directory_uri(); ?>/images/ogata_portrait 1.png" alt="Prof Hiroaki Ogata" class="founder-photo img-fluid rounded-3">
              <p class="founder-caption mt-3">Prof. Hiroaki Ogata (Ph.D.), Founder of Ogata Lab</p>
            </div>

            <!-- Right: Quote -->
            <div class="col-md-6">
              <div class="founder-quote-box">
                <span class="quote-icon">“</span>
                <p class="founder-quote-text">
                  I hope the educational systems we are developing will become the standard in Japan, aggregating data from schools nationwide so we can understand what types of education work best and deliver higher quality learning experiences.
                  Just as people born in Japan naturally learn to speak Japanese, I believe humans are born to learn.
                  I'd like to make learning better suited to each individual.
                </p>
              </div>
            </div>
          </div>
        </section>

        <p class="section-intro">
          This approach is supported by a four-step development cycle. First, we design and develop based on issues identified in actual educational settings, and then implement those designs in real classrooms.
        </p>
      </section>

      <section class="research-cycle container">
        <div class="research-cycle-layout">

          <div class="research-point top-left">
            <div class="research-text">
              <h3>Research</h3>
              <p>We analyze issues using learning logs and educational theory. Using AI and data science, we aim to personalize learning.</p>
            </div>
          </div>

          <div class="research-point top-right">
            <div class="research-text">
              <h3>Development</h3>
              <p>We develop educational support tools based on the insights gained—systems like BookRoll and LogPalette that are easy to use in classrooms.</p>
            </div>
          </div>

          <div class="research-point bottom-right">
            <div class="research-text">
              <h3>Classroom Implementation</h3>
              <p>We test the systems in real classrooms at pilot schools, examining effectiveness and identifying issues through collaboration with diverse schools.</p>
            </div>
          </div>

          <div class="research-point bottom-left">
            <div class="research-text">
              <h3>Feedback</h3>
              <p>We improve systems using feedback and data from classes. This leads into the next research cycle, creating practical educational innovation.</p>
            </div>
          </div>

          <div class="research-cycle-center">
            <object type="image/svg+xml" data="<?php echo get_template_directory_uri(); ?>/images/about-research-en.svg" class="research-cycle-graphic"></object>
          </div>
        </div>
      </section>

      <div class="approach-buttons">
        <a href="/en/research/" class="btn btn--cta">
          <span>Explore Our Research</span>
        </a>
      </div>

      <!-- Additional sections like student voices and CTA would follow here, similarly translated -->
      <section class="voices-section section-spacing content-block">
  <div class="container">
    <h2 class="section-title">Life in the Lab</h2>
    <p class="section-intro">
      What's it like to be part of the Ogata Lab?<br>
      With members from all over the world, we share ideas, tackle challenges together, and explore how technology can deepen learning.<br>
      Here are the voices of two lab members.
    </p>

    <!-- Voice 1 -->
    <div class="row align-items-center voice-block mb-5">
      <div class="col-md-6 text-center">
        <div class="scroll-float" data-speed="-0.05">
          <img src="<?php echo get_template_directory_uri(); ?>/images/ichidate-san-profile.jpg" alt="Hatsune Ichidate" class="founder-photo img-fluid rounded-3">
        </div>
        <div class="student-title">
          <h3 class="student-name">Hatsune Ichidate</h3>
          <p class="student-role">2nd-year Master's Student</p>
        </div>
      </div>

      <div class="col-md-6 scroll-float" data-speed="0.05">
        <div class="founder-quote-box">
          <span class="quote-icon">“</span>
          <p class="founder-quote-text">
            Working with people from different cultural and academic backgrounds has broadened my perspective on education.
          </p>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-10 text-left qa-block">
        <div class="qa-item">
          <p class="question">What’s it like conducting research at the Ogata Lab?</p>
          <p>We have many opportunities to present and discuss during seminars, which deepens our own research and brings in new viewpoints. The atmosphere is supportive, with professors and seniors always willing to offer help and advice. You really feel the lab is united and passionate about its work.</p>
        </div>

        <div class="qa-item">
          <p class="question">How has the international environment affected your experience?</p>
          <p>At first, I was surprised that Japanese students pursuing full-time graduate study were in the minority. Talking with people from various backgrounds made me realize how different attitudes toward participation and learning can be across cultures. This was very inspiring. In this bilingual environment, English has shifted from something to “learn” to something I actively “use.”</p>
        </div>

        <div class="qa-item">
          <p class="question">What kind of learning have you gained specifically from being in this lab?</p>
          <p>One key learning at the Ogata Lab has been how to collaborate with others. Since we develop and test real systems used in education, we work with many stakeholders. Understanding the needs and constraints of developers, teachers, and students is essential. Through this, I’ve learned how to conduct research that’s grounded in real-world practice.</p>
        </div>
      </div>
    </div>

    <!-- Voice 2 -->
    <div class="row align-items-center voice-block mb-5 flex-md-row-reverse">
      <div class="col-md-6 text-center">
        <div class="scroll-float" data-speed="-0.05">
          <img src="<?php echo get_template_directory_uri(); ?>/images/steve-portrait.jpg" alt="Steve Worrallston" class="founder-photo img-fluid rounded-3">
        </div>
        <div class="student-title">
          <h3 class="student-name">Steve Woollaston</h3>
          <p class="student-role">2nd-year Doctoral Student</p>
        </div>
      </div>

      <div class="col-md-6 scroll-float" data-speed="0.05">
        <div class="founder-quote-box">
          <span class="quote-icon">“</span>
          <p class="founder-quote-text">
            At the Ogata Lab, I can engage in research directly connected to educational practice, and it really feels like my work has societal impact.
          </p>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-10 text-left qa-block">
        <div class="qa-item">
          <p class="question">What made you decide to join the Ogata Lab?</p>
          <p>The support here has been incredible! I’ve had the chance to collaborate with amazing researchers like Professor Ogata, Associate Professor Flanagan, and other colleagues, who’ve been generous with their time and insights. Their guidance has been invaluable, whether it’s refining my ideas, co-authoring papers, or preparing for conferences. The lab also provides a fantastic space to share ideas—whether in formal meetings or casual chats over coffee / matcha. Thanks to this collaborative environment, we’ve been able to explore how well-designed chatbots can make language learning more engaging and effective, and I’ve grown so much as a researcher along the way.
          </p>
        </div>

        <div class="qa-item">
          <p class="question">What kind of support have you received in achieving your research goals?</p>
          <p>The detailed guidance from professors and regular feedback in our weekly seminars have been extremely helpful. Having peers who are also international students provides emotional support too. The bilingual environment is also a big advantage.</p>
        </div>

        <div class="qa-item">
          <p class="question">What message would you give to prospective students?</p>
          <p>If you’re thinking about joining the Ogata Lab, go for it! It’s a warm, supportive community where you can dive into cutting-edge research while learning from brilliant peers. Whether you’re interested in AI, education, or both, there are endless opportunities to explore, share, and grow. You’ll also get plenty of Japanese practice (don’t worry—everyone is patient and encouraging!). For me, it’s been a place to contribute meaningfully to the field, develop practical skills, and work toward making language learning more accessible. Come join the whānau! 
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="cta-section">
  <div class="container cta-wrapper">
    <div class="cta-image">
      <img src="<?php echo get_template_directory_uri(); ?>/images/logpalette-mascot.png" alt="Mascot Robot">
    </div>

    <div class="cta-content">
      <h2 class="cta-title">Want to help us shape the future of learning?</h2>
      <p class="cta-text">
        The Ogata Lab is always looking for people who want to explore new possibilities in education.<br>
        Whether you're considering graduate school or would just like to visit, feel free to get in touch.
      </p>

      <div class="cta-buttons">
        <a href="mailto:info@let.media.kyoto-u.ac.jp" class="btn btn--cta">
          <span>Contact Us by Email</span>
        </a>
        <a href="/en/join-us/" class="btn btn--cta">
          <span>Learn More</span>
        </a>
      </div>
    </div>
  </div>
</section>

    </main>
  </div>
</div>

<?php get_footer(); ?>
