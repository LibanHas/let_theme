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

<!-- <div class="wrapper" id="publications-wrapper">
  <div class="<?php echo esc_attr( $container ); ?> py-5">
    <h1 class="page-title mb-4"><?php the_title(); ?></h1>

    <div class="accordion" id="publicationsAccordion">
      <?php
      $categories = [
        'Journal papers',
        'International Conferences',
        'Book editor',
        'Book chapter',
        'Keynote',
        'Survey paper'
      ];

      foreach ($categories as $index => $category):
        $slug = sanitize_title($category);
      ?>
        <div class="accordion-item mb-3">
          <h2 class="accordion-header" id="heading-<?php echo $slug; ?>">
            <button class="accordion-button <?php echo $index !== 0 ? 'collapsed' : ''; ?>"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#collapse-<?php echo $slug; ?>"
              aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>"
              aria-controls="collapse-<?php echo $slug; ?>">
              <?php echo $category; ?>
            </button>
          </h2>
          <div id="collapse-<?php echo $slug; ?>"
               class="accordion-collapse collapse <?php echo $index === 0 ? 'show' : ''; ?>"
               aria-labelledby="heading-<?php echo $slug; ?>"
               data-bs-parent="#publicationsAccordion">
            <div class="accordion-body">
              <ul class="publication-list">
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit…</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit…</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit…</li>
              </ul>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div> -->
<!-- HERO BANNER -->
<section class="section-spacing">
  <div class="container">
    <div class="news-header">
      <h1 class="page-title"><?php the_title(); ?></h1>
      <h2 class="page-subtitle">出版</h2>
    </div>
</section>
<div class="accordion-section">
  <!-- Journal Papers -->
  <div class="accordion-item">
    <button class="accordion-header active" data-target="panel1">
      <span>Journal papers</span>
      <span class="accordion-icon">×</span>
    </button>
    <div class="accordion-panel show" id="panel1">
    <ol reversed start="186">
  <li>Dai, Y., Flanagan, B., & Ogata, H. What’s more important when developing math recommender systems: accuracy, explainability, or both? <i>Research and Practice in Technology Enhanced Learning</i>, 2026.1.1 (DOI)</li>
  
  <li>Nakamoto, R., Flanagan, B., Dai, Y., Takami, K., & Ogata, H. Examining motivational factors influencing self-explanation quality and mathematics achievement in online learning for junior high students. <i>Interactive Learning Environments</i>, 2025.4.7 (DOI)</li>
  
  <li>Huiyong Li, Rwitajit Majumdar, Hiroaki Ogata. Self-directed extensive reading with social support: effect on reading and learning performance of high and low English proficiency students. <i>Research and Practice in Technology Enhanced Learning</i>, 2025 (DOI)</li>
  
  <li>Nakamura, K., Horikoshi, I., Majumdar, R., & Ogata, H. Extract instructional process from xAPI log data: a case study in Japanese junior high school. <i>Research and Practice in Technology Enhanced Learning</i>, 2025 (DOI, URL1)</li>
  
  <li>Hsu, C.-Y., Horikoshi, I., Li, H., Majumdar, R., & Ogata, H. Designing data-informed support for building learning habits in the Japanese K12 context. <i>Research and Practice in Technology Enhanced Learning</i>, 20,014, 2025 (DOI, URL1)</li>
  
  <li>Takii, K., Flanagan, B., Li, H., Yang, Y., Koike, K., & Ogata, H. Explainable eBook recommendation for extensive reading in K-12 EFL learning. <i>Research and Practice in Technology Enhanced Learning</i>, 2025 (DOI, PDF)</li>
  
  <li>Liang, C., Horikoshi, I., Majumdar, R., & Ogata, H. Rater behaviors in peer evaluation: Patterns and early detection with learner model. <i>Research and Practice in Technology Enhanced Learning</i>, 20,012, 2025 (DOI, URL1)</li>
  
  <li>Ocheja, P., Flanagan, B., Dai, Y., & Ogata, H. How Good is ChatGPT in Giving Adaptive Guidance Using Knowledge Graphs in E-Learning Environments? <i>arXiv</i>, 2024.12.5 (DOI)</li>
  
  <li>Albert C.M. Yang, Ji-Yang Lin, Cheng-Yan Lin, Hiroaki Ogata. Enhancing python learning with PyTutor: Efficacy of a ChatGPT-Based intelligent tutoring system in programming education. <i>Computers and Education: Artificial Intelligence</i>, 2024.12 (DOI)</li>
</ol>

    </div>
  </div>

  <!-- International Conferences -->
  <div class="accordion-item">
    <button class="accordion-header" data-target="panel2">
      <span>International Conferences</span>
      <span class="accordion-icon">+</span>
    </button>
    <div class="accordion-panel" id="panel2">
    <ol>
        <li>Li, H., Koike, K., Majumdar, R., & Ogata, H. (2024). Designing Explainable AI-supported Learning Dashboards Based on the xAPI Data. In <i>Proceedings of the 32nd International Conference on Computers in Education (ICCE 2024)</i>. (Accepted)</li>

        <li>Nakamoto, R., Takami, K., Flanagan, B., Dai, Y., & Ogata, H. (2024). Investigating the Relationship Between Self-Explanation Quality and Mathematics Achievement in Online Learning. In <i>Proceedings of the 32nd International Conference on Computers in Education (ICCE 2024)</i>. (Accepted)</li>

        <li>Li, H., Horikoshi, I., Koike, K., Majumdar, R., & Ogata, H. (2023). Towards Data-Informed Support for Building Learning Habits in Japanese Primary Education. In <i>Proceedings of the 31st International Conference on Computers in Education (ICCE 2023)</i>.</li>

        <li>Takii, K., Flanagan, B., Li, H., Yang, Y., Koike, K., & Ogata, H. (2023). Towards Explainable eBook Recommendation for Extensive Reading in K-12 EFL Learning. In <i>Proceedings of the 31st International Conference on Computers in Education (ICCE 2023)</i>.</li>

        <li>Liang, C., Horikoshi, I., Majumdar, R., & Ogata, H. (2023). Exploring Patterns of Peer Assessment Behavior Using Log Data. In <i>Proceedings of the 31st International Conference on Computers in Education (ICCE 2023)</i>.</li>

        <li>Ocheja, P., Flanagan, B., Dai, Y., & Ogata, H. (2023). Prompt Engineering in ChatGPT for Educational Guidance: A Case Study Using Knowledge Graphs. In <i>Proceedings of the 11th International Learning Analytics and Knowledge Conference (LAK23)</i>.</li>

        <li>Yang, A. C. M., Lin, J.-Y., Lin, C.-Y., & Ogata, H. (2023). Enhancing Programming Education with a ChatGPT-Based Intelligent Tutoring System: A Preliminary Study. In <i>Proceedings of the 18th International Conference on Computer Supported Education (CSEDU 2023)</i>.</li>
        </ol>

    </div>
  </div>

  <!-- Book Editor -->
  <div class="accordion-item">
    <button class="accordion-header" data-target="panel3">
      <span>Book editor</span>
      <span class="accordion-icon">+</span>
    </button>
    <div class="accordion-panel" id="panel3">
    <ol>
  <li>ジェフ・ペティ 著、日本語版監修 緒方広明、訳 岡崎善弘. <i>科学的エビデンスに基づく最適な教え方</i>. 東京書籍株式会社, 2025.1.23</li>

  <li>緒方広明・江口悦広. <i>学びを変えるラーニングアナリティクス：データとAIがもたらす教育革命</i>. 日経BP, 2023.4.17</li>

  <li>Davinia Hernández-Leo, Reiko Hishiyama, Gustavo Zurita, Benjamin Weyers, Alexander Nolte, Hiroaki Ogata. <i>Collaboration Technologies and Social Computing (27th International Conference, CollabTech 2021, Virtual Event, August 31 – September 3, 2021, Proceedings)</i>. Springer, 2021.9</li>

  <li>Noriko Uosaki, Kousuke Mouri, Mahiro Kiyota, Hiroaki Ogata. Supporting Seamless Learning with a Learning Analytics Approach. In Looi, C.-K., Wong, L.-H., Glahn, C., Cai, S. (Eds.), <i>Seamless Learning Perspectives, Challenges and Opportunities</i>. Springer, pp.171–190, 2019.1 (DOI, URL1)</li>

  <li>Yuizono, T., Ogata, H., Hoppe, U., Vassileva, J. (Eds.). <i>Collaboration and Technology</i>. Springer, 2016.9</li>

  <li>Hiroaki Ogata et al. <i>Proceedings of the International Conference on Computers in Education (ICCE 2015)</i>, 2015.11</li>

  <li>Takaya Yuizono, Gustavo Zurita, Nelson Baloian, Tomoo Inoue, Hiroaki Ogata. <i>Collaboration Technologies and Social Computing</i>, Communications in Computer and Information Science, Vol. 460, 2014</li>

  <li>Nelson Baloian, Frada Burstein, Hiroaki Ogata, Flavia Santoro, Gustavo Zurita. <i>Collaboration and Technology</i>, Lecture Notes in Computer Science, Springer, Vol. 8658, 2014</li>

  <li>Hiroaki Ogata et al. <i>Proceedings of the 6th International Conference on Collaboration Technologies (CollabTech 2012)</i>, 2012</li>

  <li>Hiroaki Ogata et al. <i>Doctoral Student Consortium Proceedings of the 18th International Conference on Computers in Education (ICCE 2010)</i>, 2010 (KURENAI)</li>

  <li>Hiroaki Ogata et al. <i>Joint Proceedings of the Work-in-Progress Poster and Invited Young Researcher Symposium at the 18th International Conference on Computers in Education (ICCE 2010)</i>, 2010 (KURENAI)</li>

  <li>LamFor Kwok, Siu Cheung Kong, Thatsanee Charoenporn, Tsukasa Hirashima, Tomoko Kojiri, Antonija Mitrovic, Hiroaki Ogata et al. <i>Workshop Proceedings of 17th International Conference on Computers in Education 2009</i>, Hong Kong, 2009</li>

  <li>Siu Cheung Kong, Hiroaki Ogata et al. <i>Proceedings of 17th International Conference on Computers in Education 2009</i>, Hong Kong, 2009</li>

  <li>Hiroaki Ogata, Chen-Chung Liu, Masanori Sugimoto. <i>Proceedings of MULE Workshop at ICCE 2007</i>, Japan, 2007.12</li>

  <li>Hiroaki Ogata, Weiqin Chen. <i>Proceedings of ICCE 2007 Poster Papers</i>, Japan, 2007.12</li>

  <li>Hiroaki Ogata, Song Yanjie. <i>Proceedings of the 2nd International Workshop on Mobile and Ubiquitous Learning Environments (MULE 2007)</i>. Hong Kong University Press, Hong Kong, 2007.8</li>

  <li>Ulrich Hoppe, Hiroaki Ogata, Amy Soller (Eds.). <i>The Role of Technology for Collaborative Learning</i>, CSCL book series, Springer, 2007.6</li>

  <li>Ryu Hokyoung, Marcelo Milrad, Hiroaki Ogata. <i>Pervasive Learning 2007</i>, Massey University, New Zealand, 2007.5</li>

  <li>Hiroaki Ogata, Mike Sharples, Kinshuk, Yoneo Yano. <i>Proceedings of Wireless and Mobile Technologies in Education</i>, IEEE Computer Press, 2005.11</li>

  <li>Naghdy, F., Kurfess, F., Ogata, H., Szczerbicki, E., Bothe, H., Tlanfield H. (Eds.). <i>Proceedings of the ICSC Symposia on Intelligent Systems & Application (ISA’2000)</i>, ICSC Academic Press, Vol.1, Vol.2, 2000.11</li>
</ol>

    </div>
  </div>

  <!-- Book Chapter -->
  <div class="accordion-item">
    <button class="accordion-header" data-target="panel4">
      <span>Book chapter</span>
      <span class="accordion-icon">+</span>
    </button>
    <div class="accordion-panel" id="panel4">
    <ol>
  <li>緒方広明（分担執筆）. <i>GIGAスクール構想2.0推進ハンドブック</i>. 悠光堂, 2024.7.20</li>

  <li>緒方広明. ラーニングアナリティクスの活用. <i>最新教育動向 2022</i>. 明治図書, pp.110–113, 2021.11.26</li>

  <li>古川雅子, 山地一禎, 緒方広明, 木實新一, 財部恵子. 学びの羅針盤: ラーニングアナリティクス. 丸善出版, 2020.1.29</li>

  <li>David Gibson, Hiroaki Ogata. Game and Simulation-Based Learning and Teaching Section Introduction: Games, Simulations, and Emerging Technologies. In <i>Second Handbook of Information Technology in Primary and Secondary Education Vol. 2</i>, Springer, pp.879–885, 2018 (DOI)</li>

  <li>Noriko Uosaki, Hiroaki Ogata, Kousuke Mouri, Mahdi Choyekh. Implementing Sustainable Mobile Learning Initiatives for Ubiquitous Learning Log System Called SCROLL. In <i>Mobile Learning in Higher Education in the Asia-Pacific Region: Harnessing Trends and Challenging Orthodoxies</i>, Springer, pp.89–110, 2017.7 (DOI)</li>

  <li>Hiroaki Ogata, Misato Oi, Kousuke Mohri, Fumiya Okubo, Atsushi Shimada, Masanori Yamada, Jingyun Wang, Sachio Hirokawa. Learning Analytics for E-Book-Based Educational Big Data in Higher Education. In <i>Smart Sensors at the IoT Frontier</i>, Springer, pp.327–350, 2017.5 (DOI)</li>

  <li>Hiroaki Ogata, Noriko Uosaki, Bin Hou, Mengmeng Li, Kousuke Mouri. Supporting Seamless Learning Using Ubiquitous Learning-Log System. In <i>Seamless Learning in the Age of Mobile Connectivity</i>, Springer, pp.159–179, 2015.9 (DOI)</li>

  <li>Marcelo Milrad, Lung-Hsiang Wong, Mike Sharples, Gwo-Jen Hwang, Chee-Kit Looi, Hiroaki Ogata. Seamless Learning: An International Perspective on Next Generation Technology Enhanced Learning. In <i>Handbook of Mobile Learning</i>, Routledge, pp.95–108, p.680, 2013</li>

  <li>Neil Y. Yen, Qun Jin, Hiroaki Ogata, Timothy K. Shih, Yoneo Yano. Pervasive Learning Tools and Technologies. In <i>Pervasive Computing and Networking</i>, John Wiley & Sons Publishers, 2011</li>

  <li>Moushir El-Bishouty, Hiroaki Ogata, Yoneo Yano. Visualizing Knowledge Awareness Support in Ubiquitous Learning. In <i>Mobile Technologies and Handheld Devices for Ubiquitous Learning: Research and Pedagogy</i>, IGI Global, pp.15–29, 2010</li>

  <li>Hiroaki Ogata, Naka Gotoda, Masayuki Miyata, Yoneo Yano. Development of Mobile and Ubiquitous Learning Environments. In <i>Interface and Interaction Design for Learning and Simulation Environments</i>, Springer, pp.164–196, 2010</li>

  <li>Chengjiu Yin, Hiroaki Ogata, Yoneo Yano. Participatory Simulation for Collaborative Learning Experiences. In <i>Innovative Mobile Learning: Techniques and Technologies</i>, IGI Global, pp.197–214, 2008.9</li>

  <li>Hiroaki Ogata, Gan Li Hui. Design and Case Studies on Mobile and Wireless Technologies in Education. In <i>International Handbook on Information Technologies for Education and Training</i>, Springer, pp.67–77, 2008.7</li>

  <li>Hiroaki Ogata, Chen-Chung Liu, Masanori Sugimoto. Chapter 2: MULE Workshop at ICCE 2007. In <i>The Supplementary Proceedings of ICCE 2007 WS/DSC</i>, Japan, 2007.12</li>

  <li>緒方広明. ユビキタスラーニング(Ubiquitous Learning). In <i>人工知能学会ハンドブック</i>, 共立出版株式会社, pp.869–870, 2005.10</li>

  <li>Hiroaki Ogata, Kenji Matsuura, Yoneo Yano. Computer Support for Synchronous Asynchronous and Blended Awareness in Collaborative Learning. In <i>Advanced Information Technology Series, Vol.2: Communication and Collaboration Support Systems</i>, Ohmsha/IOS Press, pp.213–231, 2005.7</li>

  <li>Hiroaki Ogata, Yoneo Yano, Nobuko Furugori. Computer Supported Social Networking Based on Email Exchange. In <i>Human Computer Interaction</i>, Idea Group Publishing, pp.196–213, 2001.11</li>

  <li>Hiroaki Ogata, Yoshiaki Hada, Yoneo Yano. Computer Supported Proofreading in Collaborative Writing. In <i>Enabling Society with Information Technology</i>, Springer, pp.79–88, 2001.9</li>

  <li>緒方広明. マルチメディアとILE. In <i>教育システム情報ハンドブック</i>, 実教出版, pp.137–140, 2001.6</li>

  <li>Yoneo Yano, Hiroaki Ogata, Qun Jin. Sharlok: Combining a Collaborative Learning Environment and an Active Database. In <i>Advanced Database Systems for Integration of Media and User Environments ’98</i>, Advanced Database Research and Development Series, World Scientific, Vol.9, pp.329–332, 1998.10</li>
</ol>

    </div>
  </div>

  <!-- Keynote -->
  <div class="accordion-item">
    <button class="accordion-header" data-target="panel5">
      <span>Keynote</span>
      <span class="accordion-icon">+</span>
    </button>
    <div class="accordion-panel" id="panel5">
    <ol>
  <li>Hiroaki Ogata. AI and Data Analytics in Education and Learning. <i>Theveli International Conference 2024</i>, Maldives, 2024.8.19 (URL1)</li>
  <li>緒方広明. 教育データの利活用概論. <i>京都府DLCカンファレンス</i>, 京都, 2024.8.4</li>
  <li>緒方広明. 教育データ利活用のための情報基盤システムLEAFを用いた研究と実践. <i>1EDTECH Japan コンファレンス2024</i>, 京都, 2024.8.1</li>
  <li>緒方広明. ラーニングアナリティクスによる個別最適な学び. <i>佐賀県教育委員会WS（令和6年度ICT活用教育の推進に係る管理職研修会）</i>, 2024.6.18</li>
  <li>緒方広明. ラーニングアナリティクスの概要. <i>埼玉県教育委員会WS</i>, 2024.5.31</li>
  <li>緒方広明. ラーニングアナリティクス研究最新動向. <i>情報処理学会関西支部発表会</i>, 2024.5.27</li>
  <li>Brendan Flanagan. Challenges and Opportunities of Educational Data Science for Reading Systems. <i>ICCE 2023</i>, 島根県くにびきメッセ, 2023.12</li>
  <li>Lung-Hsiang Wong, Daner Sun, Hiroaki Ogata, et al. Mobile Learning: Reflections on the Past and Visions for the Future. <i>ICCE 2023</i>, 島根県くにびきメッセ, 2023.12</li>
  <li>緒方広明. 教育データの利活用について. <i>兵庫県議会 文教常任委員会</i>, 兵庫県庁3号館, 2023.11.17</li>
  <li>Hiroaki Ogata. Educational Big Data Analysis. <i>National Taiwan Normal University</i>, Online, 2023.11.15</li>
  <li>緒方広明. 教育ビッグデータとAIを活用した授業の実践と改善. <i>第70回近畿算数・数学教育研究滋賀大会</i>, 栗東芸術文化会館さきら, 2023.11.10</li>
  <li>緒方広明. ラーニングアナリティクスの研究と実践の最前線. <i>オンラインラーニングフォーラム</i>, Online, 2023.11.2 (URL1)</li>
  <li>緒方広明. ラーニングアナリティクスの研究・実践と国際技術標準. <i>1EdTech Japan Conference 2023</i>, Online, 2023.9.2 (URL1)</li>
  <li>Hiroaki Ogata. LEAF: Learning and Evidence Analytics Framework in Japan. <i>International Conference on Smart Learning Environment 2023</i>, Bangkok, 2023.9.2</li>
  <li>緒方広明. ラーニングアナリティクスで学びを変える～いますぐ実践できる個別最適な教育～. <i>私学教育フォーラム</i>, 東京, 2023.8.23</li>
  <li>Hiroaki Ogata. BookRoll for Learning Analytics. <i>HKBPU International Workshop</i>, Hong Kong (Online), 2023.8.17</li>
  <li>Hiroaki Ogata. LEAF: Learning and Evidence Analytics Framework for Sustainable Education. <i>International Workshop on Future Earth</i>, Taipei, 2023.8.12</li>
  <li>Hiroaki Ogata. LEAF in Japan: Connecting Researchers, Practitioners and Policy-makers. <i>Educational Datamining 2023</i>, India, 2023.7.14</li>
  <li>緒方広明. 日本のAIデジタル教材配信プラットフォームと学習分析の現状及び課題. <i>韓国日本教育学会</i>, 韓国・ソウル, 2023.6.24</li>
  <li>Hiroaki Ogata. Learning Analytics Research in Japan. <i>KERIS</i>, Daegu, South Korea, 2023.6.23</li>
  <li>緒方広明. ラーニングアナリティクスの情報基盤とシステム. <i>日本教育方法学会第26回研究集会</i>, 京都大学, 2023.6.10 (URL1)</li>
  <li>緒方広明. 教育データの蓄積・分析のためのデータプラットフォームの構築. <i>New Education Expo</i>, 大阪, 2023.6.9 (URL1)</li>
  <li>Hiroaki Ogata. Big Data and AI in Education. <i>LAAIE 2023</i>, Taipei, 2023.5.28</li>
  <li>Hiroaki Ogata. Research on Learning Analytics and AI in Japan. <i>HKBPU Online Seminar</i>, 2023.4.19</li>
  <li>Hiroaki Ogata. BookRoll: Facilitate DX in Education with e-book logs. <i>BETT</i>, London, 2023.3.30</li>
  <li>緒方広明. 学びの見える化でより良い教育を—LEAFを用いた教育DX—. <i>東北大学大学院情報科学研究科シンポジウム</i>, 東北大学, 2023.2.19 (URL1)</li>
  <li>緒方広明. 理想のラーニングアナリティクス環境. <i>九州大学ラーニングアナリティクスセンター第１回シンポジウム</i>, 九州大学, 2023.1.5 (URL1)</li>
  <li>Hiroaki Ogata. AI in Education and Learning Analytics in Asia. <i>Empowering Learners in AI</i>, Online, 2022.12.8 (URL1)</li>
  <li>Hiroaki Ogata. Data and Evidence-Informed Learning and Teaching. <i>LTTC Seminars</i>, The Education University of Hong Kong, Online, 2022.11.17 (URL1)</li>
  <li>緒方広明. ラーニングアナリティクスと教育の未来. <i>オンラインラーニングフォーラム</i>, Online, 2022.11.2 (URL1)</li>
  <li>緒方広明. 教育データの利活用の動向と今後の方向性. <i>東京書籍株式会社 社内講演</i>, Online, 2022.10.18</li>
  <li>安田クリスチーナ、桐生崇、緒方広明、堀口悟郎. AI活用・教育データの利活用とその課題（仮）. <i>日本教育工学会2022年秋季全国大会</i>, Online, 2022.9.10 (URL1)</li>
</ol>

    </div>
  </div>

  <!-- Survey Paper -->
  <div class="accordion-item">
    <button class="accordion-header" data-target="panel6">
      <span>Survey paper</span>
      <span class="accordion-icon">+</span>
    </button>
    <div class="accordion-panel" id="panel6">
      <ol>
        <li>Survey Title A. Journal/Conference, Year…</li>
      </ol>
    </div>
  </div>
</div>


<?php get_footer(); ?>
