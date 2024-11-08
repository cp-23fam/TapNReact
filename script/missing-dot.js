var canvas;
var c;
var circles = [];

var rot = Math.floor(Math.random() * 360) + 1;

class PointerSelection {
  x = 0;
  y = 0;

  Draw() {
    if (this.x != 0 && this.y != 0) {
      DrawCircle(c, this.x, this.y, 5, 'white');
    }
  }
}

const pointer = new PointerSelection();

function init() {
  canvas = document.getElementById('game');
  c = canvas.getContext('2d');

  canvas.width = canvas.clientWidth;
  canvas.height = canvas.clientHeight;


  const zones = [
    [canvas.width / 4, canvas.height / 2],
    [canvas.width / 4 * 3, canvas.height / 2]
  ];

  canvas.addEventListener('click', function () {
    HandleClick(event, zones);
  })
  RandomCircles();

  setInterval(() => {
    Loop(zones, rot)
  }, 50);

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
  DrawCircle(c, x, y, 200, 'black');
}

function TopCircles(x, y, rotation = 0) {
  c.save();
  c.translate(x, y);
  c.rotate(rotation);
  DrawCircle(c, 0, 0, 200, 'gray', 1.75 * Math.PI);
  c.restore();
}

function Areas(x, y) {

  DrawCircle(c, x, y, 75, 'black', 2 * Math.PI, false);
  DrawCircle(c, x, y, 150, 'black', 2 * Math.PI, false);

  c.beginPath();
  c.translate(x, y);
  for (j = 0; j < 4; j++) {
    c.strokeStyle = 'lightgray'
    c.moveTo(-200, 0);
    c.lineTo(200, 0);
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

      if (distance > 200 - 10) {
        this.color = 'none';
      }
    }

    TouchingAnotherCircle() {
      circles.forEach((e) => {
        const dx = this.x - e.x;
        const dy = this.y - e.y;

        const distance = Math.sqrt(dx * dx + dy * dy);

        if (distance < 10 + 10 && distance > 0 && e.color != 'none') {
          this.color = 'none';
        }
      })
    }
  }

  for (i = 0; i < 120; i++) {
    circles.push(new Circle(-200 + RandInt(400), -200 + RandInt(400), Colors[RandInt(4) - 1]));
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
      DrawCircle(c, x + e.x, y + e.y, 10, e.color)
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
  pointer.Draw();
}

function HandleClick(event, zones) {
  const dx = event.x - zones[1][0];
  const dy = event.y - zones[1][1];
  let d;
  let a;
  const angle = Math.atan2(dy, dx) * 180 / Math.PI + 90;

  const distance = Math.sqrt(dx * dx + dy * dy);

  if (distance < 200) {
    if (distance <= 75) {
      d = 1;
    }

    if (distance <= 150 && distance > 75) {
      d = 2;
    }

    if (distance > 150) {
      d = 3;
    }
  }

  if (angle > 0 && angle <= 45) {
    a = 1;
  } else if (angle > 45 && angle <= 90) {
    a = 2;
  } else if (angle > 90 && angle <= 135) {
    a = 3;
  } else if (angle > 135 && angle <= 180) {
    a = 4;
  } else if (angle > 180 && angle <= 225) {
    a = 5;
  } else if (angle > 225 && angle <= 270) {
    a = 6;
  } else if (angle > -90 && angle <= -45) {
    a = 7;
  } else if (angle > -45 && angle <= 0) {
    a = 8;
  }

  if (d != null && a != null) {
    pointer.x = dx * -1;
    pointer.y = dy * -1;
  }
  // DrawCircle(c, dx * -1, dy * -1, 5, 'white');

  // console.log("Distance : " + d + "\nZone : " + a)
}