var canvas;
var c;

function init() {
  canvas = document.getElementById('game');
  c = canvas.getContext('2d');

  canvas.width = canvas.clientWidth;
  canvas.height = canvas.clientHeight;

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

function BaseCircles() {
  DrawCircle(c, canvas.width / 4, canvas.height / 2, 200, 'black');
  DrawCircle(c, canvas.width / 4 * 3, canvas.height / 2, 200, 'black');
}

function TopCircles() {
  DrawCircle(c, canvas.width / 4, canvas.height / 2, 200, 'gray', 1.75 * Math.PI);
  DrawCircle(c, canvas.width / 4 * 3, canvas.height / 2, 200, 'gray', 1.75 * Math.PI);
}

function DrawRandomSmallCircles() {
  const Colors = ['blue', 'red', 'green', 'yellow'];

  let circles = [];
  class Circle {
    constructor(x, y, color, missing) {
      this.x = x;
      this.y = y;
      this.color = color;
      this.missing = missing
    }

    Draw(c) {
      DrawCircle(c, this.x, this.y, 10, this.color);
      DrawCircle(c, this.x + 2 * canvas.width / 4, this.y, 10, this.color);
    }

    IsAlone() {
      circles.forEach((e) => {
        const dx = this.x - e.x
        const dy = this.y - e.y

        const distance = Math.sqrt(dx * dx + dy * dy)

        // r1 + r2
        if (distance < 10 + 10) {
          circles.splice(circles.indexOf(e), 1)
        }
      })
    }
  }

  for (i = 0; i < 120; i++) {
    circles.push(new Circle(canvas.width / 4 - 150 + RandInt(300), canvas.height / 2 - 150 + RandInt(300), Colors[RandInt(4) - 1]));
  }

  circles.forEach((circle) => {
    circle.IsAlone();
    circle.Draw(c);
  });

  circles[RandInt(circles.length) - 1].missing = true;

  for (i = 0; i < circles.length; i++) {
    if (circles[i].missing) {
      DrawCircle(c, circles[i].x, circles[i].y, 10, circles[i].color)
    }
  }
}

window.onload = function () {
  init();
  BaseCircles();
  DrawRandomSmallCircles();
  // TopCircles();
}