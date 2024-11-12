var canvas;
var c;
var circles = [];

var rot = Math.floor(Math.random() * 360) + 1;

let bigSize;


function init() {
  canvas = document.getElementById('game');
  c = canvas.getContext('2d');

  canvas.width = canvas.clientWidth * 2;
  canvas.height = canvas.clientHeight * 2;
  bigSize = canvas.clientWidth / 2 - canvas.clientWidth / 20;


  const zones = [
    [canvas.width / 4, canvas.height / 2],
    [canvas.width / 4 * 3, canvas.height / 2]
  ];

  RandomCircles();

  setInterval(() => {
    Loop(zones, rot)
  }, 40);

}

function RandInt(max) {
  return Math.floor(Math.random() * max) + 1;
}

function DrawCircle(c, x, y, rayon, fillstyle, tour = 2 * Math.PI, filled = true) {
  c.beginPath();
  c.moveTo(x, y);
  c.arc(x, y, rayon, 0, tour);
  c.fillStyle = fillstyle;
  if (filled) {
    c.fill();
  } else {
    c.stroke();
  }
}

function BaseCircles(x, y) {
  DrawCircle(c, x, y, bigSize, 'black');
}

function TopCircles(x, y, rotation = 0) {
  c.save();
  c.translate(x, y);
  c.rotate(rotation);
  DrawCircle(c, 0, 0, bigSize, 'gray', 1.75 * Math.PI);
  c.restore();
}

function Areas(x, y) {

  DrawCircle(c, x, y, bigSize / 3, 'black', 2 * Math.PI, false);
  DrawCircle(c, x, y, bigSize / 4 * 3, 'black', 2 * Math.PI, false);

  c.beginPath();
  c.translate(x, y);
  for (j = 0; j < 4; j++) {
    c.strokeStyle = 'lightgray'
    c.moveTo(-bigSize, 0);
    c.lineTo(bigSize, 0);
    c.stroke();
    c.rotate(0.25 * Math.PI)
  }
}

function RandomCircles() {
  const Colors = ['blue', 'red', 'green', 'yellow'];

  class Circle {
    constructor(x, y, color) {
      this.x = x;
      this.y = y;
      this.color = color;
      this.missing = false
    }

    InTheCircle() {
      const dx = this.x;
      const dy = this.y;

      const distance = Math.sqrt(dx * dx + dy * dy);

      if (distance > bigSize - bigSize / 20) {
        this.color = 'none';
      }
    }

    TouchingAnotherCircle() {
      circles.forEach((e) => {
        const dx = this.x - e.x;
        const dy = this.y - e.y;

        const distance = Math.sqrt(dx * dx + dy * dy);

        if (distance < bigSize / 20 + bigSize / 20 && distance > 0 && e.color != 'none') {
          this.color = 'none';
        }
      })
    }
  }

  for (i = 0; i < 60; i++) {
    circles.push(new Circle(-bigSize + RandInt(bigSize * 2), -bigSize + RandInt(bigSize * 2), Colors[RandInt(4) - 1]));
  }

  circles.forEach((circle) => {
    circle.InTheCircle();
    circle.TouchingAnotherCircle();
  });

  circles = circles.filter((circle) => circle.color != 'none');

  circles[RandInt(circles.length) - 1].missing = true;
}

function DrawRandomSmallCircles(x, y, showMissing) {
  circles.forEach((e) => {
    if (e.missing == false || (showMissing && e.missing)) {
      DrawCircle(c, x + e.x, y + e.y, bigSize / 20, e.color)
    }
  })
}

function Loop(zones, rotation) {
  rot += 1;

  for (i = 0; i < zones.length; i++) {
    c.setTransform(1, 0, 0, 1, 0, 0);
    BaseCircles(zones[i][0], zones[i][1]);
    DrawRandomSmallCircles(zones[i][0], zones[i][1], i != 1);
    TopCircles(zones[i][0], zones[i][1], 2 * Math.PI / 360 * rotation);
    Areas(zones[i][0], zones[i][1], 2 * Math.PI / 360 * rotation);
  }
}
