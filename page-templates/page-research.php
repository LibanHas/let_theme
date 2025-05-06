<?php
/**
 * Template Name: Research Page
 */
defined( 'ABSPATH' ) || exit;
get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div id="let-logo-particles" style="height: 300px;"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.4.0/p5.min.js"></script>

<script src="<?php echo get_template_directory_uri(); ?>/js/let_logo_points.js"></script>






<script>
  let particles = [];
  let zoom = 1200;
  let camTarget = { x: 0, y: 0 };
  let strokeGroups = {};
  const zDepthScale = 15; // << exaggerate Z-axis

  function setup() {
    let canvas = createCanvas(window.innerWidth, 300, WEBGL);
    canvas.parent("let-logo-particles");
    angleMode(RADIANS);

    for (let i = 0; i < logoPoints.length; i++) {
      let pt = logoPoints[i];
      let v = createVector(pt.x, pt.y, pt.z * zDepthScale); // << scale Z
      particles.push(v);

      const key = `${pt.group}-${pt.stroke}`;
      if (!strokeGroups[key]) strokeGroups[key] = [];
      strokeGroups[key].push({ index: i, pos: v });
    }
  }

  function draw() {
    background('#FCF7EA');
    rotateY(millis() * 0.0002);       // slow Y rotation
    rotateX(sin(millis() * 0.00015)); // gentle X wave

    camera(camTarget.x, camTarget.y, zoom, 0, 0, 0, 0, 1, 0);

    // Particles
    noStroke();
    fill(168, 107, 122);
    for (let p of particles) {
      push();
      translate(p.x, p.y, p.z);
      sphere(3, 6, 6);
      pop();
    }

    // Connections within strokes
    stroke(168, 107, 122, 80);
    strokeWeight(0.6);
    for (let key in strokeGroups) {
      let group = strokeGroups[key];
      for (let i = 0; i < group.length; i++) {
        for (let j = i + 1; j < group.length; j++) {
          let a = group[i].pos;
          let b = group[j].pos;
          let d = dist(a.x, a.y, a.z, b.x, b.y, b.z);
          if (d < 60) {
            line(a.x, a.y, a.z, b.x, b.y, b.z);
          }
        }
      }
    }
  }
</script>





<section class="research-overview">
  <div class="container">
    <h1 class="section-title">研究概要</h1>
    <p class="section-lead">
      私たちの研究室では、学習ログを活用した教育の革新に取り組んでいます。<br>
      教育を「見える化」し、より良い学びを実現するために、複数のプロジェクトとシステムを開発・展開しています。
    </p>
  </div>
</section>
<section class="hero">
    <h1 class="tagline">Transforming Learning<br>through Data & Technology</h1>
    <p class="intro">「学びの可視化 × 教育データ × テクノロジー」<br>We build systems that turn digital learning behavior into insight.</p>
  </section>

  <section class="section">
    <div class="grid">
      <div class="text">
        <h2>📖 BookRoll</h2>
        <p>BookRoll は PDF 教材をブラウザで配信し、学生がハイライト・メモなどを残せるデジタル教材システムです。全ての操作は「学習ログ」として記録され、LogPalette で分析できます。</p>
        <ul>
          <li>✅ ブラウザのみで利用（アプリ不要）</li>
          <li>✅ LMS連携（シングルサインオン）</li>
          <li>✅ 授業内・授業後の可視化・分析に活用</li>
        </ul>
      </div>
      <div class="image">
        <img src="images/bookroll-example.jpg" alt="BookRoll Screenshot">
      </div>
    </div>
  </section>

<?php get_footer(); ?>
