<?php
/**
 * Template Name: Research Page (EN)
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
          <section class="section-spacing research-hero-section">
            <div class="container">
              
              <!-- Title -->
              <h1 class="page-title">Research</h1>
              <h2 class="page-subtitle">Our Research</h2>

              <!-- Two-column layout -->
              <div class="row align-items-center research-hero-content mt-4">
                
                <!-- Left: Text -->
                <div class="col-md-6">
                  <p class="research-intro">
                    At LET, we leverage learning logs and analytics to improve education based on real classroom data.<br>
                    Our approach emphasizes seamless, personalized learning and evidence-based teaching.
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

          <!-- Research Themes Accordion -->
          <section class="theme-section section-spacing research-accordion">
            <div class="theme-inner">
              <div class="container">
                <h2 class="section-heading">Themes</h2>
                <!-- Visualization of Learning Logs -->
                <div class="theme-card accordion-header" data-target="theme-logs">
                  <div class="theme-card__main">
                    <div class="theme-card__icon">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/icon-logs.svg" alt="Visualization Icon">
                    </div>
                    <div class="theme-card__text">
                      <h3 class="theme-card__title">Visualization of Learning Logs</h3>
                      <p class="theme-card__description">Analyze learning logs to improve the quality of teaching and learning.</p>
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
                    <h4>Why Visualize?</h4>
                    <p>
                      Learning logs record data such as which materials were read, where learners spent time, and what they highlighted or questioned.<br>
                      Making the learning process visible enables learners to reflect and teachers to optimize instruction.
                    </p>
                  </div>
                  <div class="research-block">
                    <h4>Main Logs Captured</h4>
                    <table>
                      <thead>
                        <tr>
                          <th>Type of Log</th>
                          <th>Examples</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><strong>Browsing History</strong></td>
                          <td>Which materials were opened, when, and time spent per page</td>
                        </tr>
                        <tr>
                          <td><strong>Highlights & Notes</strong></td>
                          <td>Highlighted text and written comments</td>
                        </tr>
                        <tr>
                          <td><strong>Quiz Records</strong></td>
                          <td>Responses, accuracy rates, and retry attempts</td>
                        </tr>
                        <tr>
                          <td><strong>Revisit Logs</strong></td>
                          <td>Frequency of accessing specific pages or materials</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="research-block">
                    <h4>Benefits for Teachers</h4>
                    <ul>
                      <li><span class="tick" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/icon-tick.svg');"></span> Identify where students struggle and use it to improve lessons</li>
                      <li><span class="tick" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/icon-tick.svg');"></span> Compare overall class trends with individual differences</li>
                      <li><span class="tick" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/icon-tick.svg');"></span> Support experience-based teaching with <strong>data-backed evidence</strong></li>
                    </ul>
                  </div>
                  <div class="research-block">
                    <h4>Benefits for Learners</h4>
                    <ul>
                      <li><span class="tick" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/icon-tick.svg');"></span> Visualize their own learning patterns <strong>objectively</strong></li>
                      <li><span class="tick" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/icon-tick.svg');"></span> Use data to guide reviews and reflections</li>
                      <li><span class="tick" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/icon-tick.svg');"></span> Gain <strong>confidence</strong> by understanding their own learning style</li>
                    </ul>
                  </div>
                  <div class="research-block">
                    <h4>Example Practice</h4>
                    <div class="theme-example">
                      <div class="theme-example__text">
                        <p><strong>Kyoto Municipal High School (English Class)</strong></p>
                        <p>
                          Using <em>BookRoll</em>, students highlighted “unclear sections” in yellow and “important parts” in red.<br>
                          Teachers used <em>LogPalette</em> in class to instantly identify which paragraphs many students struggled with and adjusted lesson plans on the fly.
                        </p>
                      </div>
                    </div>
                    <div class="research-block">
                      <blockquote class="theme-example__quote">
                        <p>“With visualized data, I was able to adjust lesson plans in real time during class.”</p>
                        <cite>— Kyoto Municipal Saikyo High School, English Teacher</cite>
                      </blockquote>
                    </div>
                  </div>
                  <div class="research-block">
                    <h4>Related Projects & Publications</h4>
                    <ul class="theme-resources">
                      <li>
                        [Cabinet Office] SIP Phase 2 Project (2018–2020)<br>
                        <a href="https://www.let.media.kyoto-u.ac.jp/project/sip/" target="_blank">
                          https://www.let.media.kyoto-u.ac.jp/project/sip/
                        </a>
                      </li>
                      <li>
                        [Paper] Ogata et al. (2023). <em>Visualizing Learning Behavior for Adaptive Teaching.</em> LAK2023<br>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- Educational Support Tools Development -->
                <div class="theme-card accordion-header" data-target="theme-tools">
                  <div class="theme-card__main">
                    <div class="theme-card__icon">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/pickaxe.svg" alt="Educational Tools Icon">
                    </div>
                    <div class="theme-card__text">
                      <h3 class="theme-card__title">Development of Educational Support Tools</h3>
                      <p class="theme-card__description">
                        Designing, developing, and evaluating educational tools based on learning sciences and real-world needs.
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
                  <div class="research-block">
                    <h4>Collaborative Improvement with Teachers</h4>
                    <p>
                      Development progresses through ongoing dialogue with educators. Usability and educational effectiveness are repeatedly verified in actual classrooms and improved based on evidence.
                    </p>
                  </div>
                  <div class="research-block">
                    <h4>Key Systems and Tools</h4>
                    <p>Introducing representative tools born from field collaboration and empirical research:</p>
                    <div class="our-tools-section">
                      <div class="tool-item">
                        <div class="tool-logo">
                          <img src="<?php echo get_template_directory_uri(); ?>/images/bookroll-icon.svg" alt="BookRoll Logo">
                        </div>
                        <div class="tool-description">
                          <p>
                            BookRoll is a digital platform for delivering and recording interactive learning materials, enabling data-driven, personalized learning.
                          </p>
                        </div>
                        <div class="tool-button">
                          <a data-anim-trigger-self data-anim="fade-in" href="https://eds.let.media.kyoto-u.ac.jp/leaf/bookroll/" class="btn btn--cta">
                            <span>Learn more about BookRoll</span>
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
                            LogPalette is a learning analytics tool that visualizes learner interactions with materials, providing insights to both learners and educators.
                          </p>
                        </div>
                        <div class="tool-button">
                          <a data-anim-trigger-self data-anim="fade-in" href="https://eds.let.media.kyoto-u.ac.jp/leaf/logpalette/" class="btn btn--cta">
                            <span>Learn more about LogPalette</span>
                          </a>
                        </div>
                      </div>

                      <hr class="tool-divider">
                    </div>
                  </div>
                </div>

                <!-- Learner Modeling -->
                <div class="theme-card accordion-header" data-target="theme-modeling">
                  <div class="theme-card__main">
                    <div class="theme-card__icon">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/people.svg" alt="Learner Modeling Icon">
                    </div>
                    <div class="theme-card__text">
                      <h3 class="theme-card__title">Learner Modeling</h3>
                      <p class="theme-card__description">Analyzing learning behaviors to provide personalized support.</p>
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
                  <div class="research-block">
                    <h4>Capturing Personalized Learning Behaviors</h4>
                    <p>
                      By analyzing behavioral data, we model learners’ comprehension and styles to support reflection for learners and feedback for teachers.
                    </p>
                  </div>
                  <div class="research-block">
                    <h4>Applications for Teachers and Learners</h4>
                    <ul class="icon-list">
                      <li><strong>Teachers:</strong> Provide feedback tailored to students’ understanding.</li>
                      <li><strong>Learners:</strong> Reflect objectively on their own learning styles.</li>
                      <li><strong>Systems:</strong> Recommend materials or prompt review based on models.</li>
                    </ul>
                  </div>
                  <div class="research-block">
                    <h4>Integration Across Themes</h4>
                    <p>
                      This technology works in conjunction with themes like “Visualization of Learning Logs” and “xAPI Infrastructure” to enable personalized educational support.
                    </p>
                  </div>
                </div>

                <!-- xAPI Infrastructure -->
                <div class="theme-card accordion-header" data-target="theme-xapi">
                  <div class="theme-card__main">
                    <div class="theme-card__icon">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/globe.svg" alt="xAPI Icon">
                    </div>
                    <div class="theme-card__text">
                      <h3 class="theme-card__title">xAPI and Learning Infrastructure</h3>
                      <p class="theme-card__description">
                        Using xAPI, the international standard for learning activities, to centralize and utilize learning logs.
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
                <div class="accordion-panel theme-card__content" id="theme-xapi">
                  <div class="research-block">
                    <h4>Why Build a Learning Infrastructure?</h4>
                    <p>
                      Learning happens across various tools and classrooms, but inconsistent logging makes data utilization challenging. By adopting xAPI, we can record, store, and share logs in a common format for teaching improvement, review, and research.
                    </p>
                  </div>
                  <div class="research-block">
                    <h4>Design and Operation</h4>
                    <p>
                      We integrate tools like BookRoll and LogPalette with xAPI to store logs in an LRS (Learning Record Store) in real time. Using shared xAPI profiles across schools allows comparative analysis and personalized support.
                    </p>
                  </div>
                </div>

                <!-- Field Research -->
                <div class="theme-card accordion-header" data-target="theme-field">
                  <div class="theme-card__main">
                    <div class="theme-card__icon">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/school.svg" alt="Field Research Icon">
                    </div>
                    <div class="theme-card__text">
                      <h3 class="theme-card__title">Field Research</h3>
                      <p class="theme-card__description">
                        Collaborating with schools and educational sites to implement and evaluate tools in real classrooms.
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
                <div class="accordion-panel theme-card__content" id="theme-field">
                  <div class="research-block">
                    <h4>Testing Theories in the Classroom</h4>
                    <p>
                      We engage in “field research” by implementing tools and models in actual school settings. Rather than temporary pilots, we pursue iterative improvement through continued use.
                    </p>
                  </div>
                  <div class="research-block">
                    <h4>Examples of Application</h4>
                    <ul>
                      <li>Analyze comprehension and engagement during class based on learning logs.</li>
                      <li>Support reflection using post-class notes and comments.</li>
                      <li>Correlate logs with term grades and participation data.</li>
                    </ul>
                  </div>
                  <div class="research-block">
                    <h4>From Practice to Research</h4>
                    <p>
                      We value a cyclical approach where classroom feedback informs research and, in turn, benefits teaching practice—building sustainable foundations for data-informed education.
                    </p>
                  </div>
                  <div class="research-block">
                    <blockquote class="field-quote">
                      <p>“I started using BookRoll notes to plan my lessons for the following week.”</p>
                      <footer>— High School English Teacher</footer>
                    </blockquote>
                  </div>
                </div>

              </div>
            </div>
          </section>

          <section class="work-section">
            <div class="section-header">
              <h2>Explore Our Work</h2>
              <p>Learn more about our research and activities.</p>
            </div>
            <div class="work-grid">
              <a href="https://eds.let.media.kyoto-u.ac.jp/sip3/" class="work-item">
                <img src="<?php echo get_template_directory_uri(); ?>/images/sip3_hero_image.jpg" alt="SIP3 Project">
                <h3>SIP3</h3>
                <div class="description">A research project on building and analyzing supportive learning environments</div>
              </a>
              <a href="/en/publications-2/" class="work-item">
                <img src="<?php echo get_template_directory_uri(); ?>/images/publications_image.jpg" alt="Publications">
                <h3>Publications</h3>
                <div class="description">Research results published in domestic and international journals</div>
              </a>
              <a href="/en/projects-2/" class="work-item">
                <img src="<?php echo get_template_directory_uri(); ?>/images/projects_image.png" alt="Projects">
                <h3>Projects</h3>
                <div class="description">Ongoing and past educational support projects</div>
              </a>
              <a href="grants/" class="work-item">
                <img src="<?php echo get_template_directory_uri(); ?>/images/grants_image.png" alt="Grants">
                <h3>Grants</h3>
                <div class="description">Information on awarded research funds and grants</div>
              </a>
            </div>
          </section>

        </main><!-- #main -->
      </div><!-- #primary -->
    </div><!-- .row -->
  </div><!-- #content -->
</div><!-- .wrapper -->

<?php get_footer(); ?>
