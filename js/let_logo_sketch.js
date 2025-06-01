let groups = {};
let progress = 0;
let maxProgress = 1;
let fadeOut = false;
let fadeOpacity = 255;
let logoImg;
let revealTimer = 0;

function preload() {
  logoImg = loadImage(logoImageUrl); // ensure this is defined in inline JS above
}

function setup() {
  const container = document.getElementById("let-logo-particles");
  createCanvas(container.offsetWidth, container.offsetHeight).parent("let-logo-particles");
  pixelDensity(1);
  noStroke();

  // Normalize and center points
  const padding = 20;
  let allX = logoPoints.map(p => p.x);
  let allY = logoPoints.map(p => p.y);
  let minX = min(allX);
  let maxX = max(allX);
  let minY = min(allY);
  let maxY = max(allY);

  let scale = min((width - padding * 2) / (maxX - minX), (height - padding * 2) / (maxY - minY));

  logoPoints.forEach(p => {
    let group = p.group;
    if (!groups[group]) groups[group] = [];
    groups[group].push({
      x: (p.x - minX) * scale + padding,
      y: (p.y - minY) * scale + padding,
      alpha: 0,
      stroke: p.stroke,
      connected: false
    });
  });

  // Initial sorting of groups
  groups["L"] = groups["L"] || [];
  groups["E"] = groups["E"] || [];
  groups["T"] = groups["T"] || [];

  frameRate(30);
}

function draw() {
  background("#FCF7EA");

  if (!fadeOut) {
    // Reveal group by group
    revealTimer++;
    if (revealTimer < 60) {
      drawGroup("L", revealTimer);
    } else if (revealTimer < 120) {
      drawGroup("E", revealTimer - 60);
    } else if (revealTimer < 180) {
      drawGroup("T", revealTimer - 120);
    } else {
      fadeOut = true;
    }
  } else {
    drawAllGroups();
    fadeOpacity -= 8;
    if (fadeOpacity <= 0) {
      document.getElementById("let-logo-static").style.opacity = 1;
      noLoop();
    }
  }

  if (fadeOut) {
    fill(252, 247, 234, 255 - fadeOpacity);
    rect(0, 0, width, height);
  }
}

function drawGroup(groupName, localTimer) {
  let points = groups[groupName] || [];
  let alpha = map(localTimer, 0, 30, 0, 255);
  points.forEach((p, i) => {
    fill(149, 66, 5, alpha);
    ellipse(p.x, p.y, 5, 5);

    // connect to nearby points of same stroke
    for (let j = i + 1; j < points.length; j++) {
      let other = points[j];
      if (p.stroke === other.stroke) {
        let d = dist(p.x, p.y, other.x, other.y);
        if (d < 40) {
          stroke(149, 66, 5, alpha);
          line(p.x, p.y, other.x, other.y);
          noStroke();
        }
      }
    }
  });
}

function drawAllGroups() {
  ["L", "E", "T"].forEach(group => drawGroup(group, 30));
}
