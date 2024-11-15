var canvas;
var c;
var circles = [];

var rot = Math.floor(Math.random() * 360) + 1;

let bigSize;
let zones;
let button;

let number = 40;

function init() {
  circles = [];

  canvas = document.getElementById('game');
  c = canvas.getContext('2d');

  button = document.getElementById('button');

  canvas.width = canvas.clientWidth * 2;
  canvas.height = canvas.clientWidth / 16 * 8 * 2;
  bigSize = canvas.clientWidth / 2 - canvas.clientWidth / 20;

  zones = [
    [canvas.width / 4, canvas.height / 2],
    [canvas.width / 4 * 3, canvas.height / 2]
  ];

  const poppins = new FontFace('Poppins', 'url(../fonts/Poppins-SemiBold.ttf)');

  poppins.load().then(function (font) {
    document.fonts.add(font);

    c.font = '100px Poppins'
    c.textAlign = 'center';
    c.fillText('Cliquez pour commencer', canvas.width / 2, canvas.height / 2);
    canvas.addEventListener('click', CanvasClick)
  })
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

  for (i = 0; i < number; i++) {
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

function CanvasClick() {
  c.clearRect(0, 0, canvas.width, canvas.height)

  RandomCircles();

  setInterval(() => {
    Loop(zones, rot)
  }, 40);

  canvas.removeEventListener('click', CanvasClick);
  button.addEventListener('click', HandleSend);
}

function GetMissingZone() {
  c.reset();

  let zone;
  let angle;
  let distance;
  circles.forEach((c) => {
    if (c.missing) {

      rad = Math.atan2(c.x, c.y)
      angle = (rad / Math.PI * 180) + (rad > 0 ? 0 : 360);

      distance = Math.sqrt(c.x * c.x + c.y * c.y);
    }
  })

  if (angle > 0 && angle <= 45)
    zone = "d";
  else if (angle > 45 && angle <= 90)
    zone = "c";
  else if (angle > 90 && angle <= 135)
    zone = "b";
  else if (angle > 135 && angle <= 180)
    zone = "a";
  else if (angle > 180 && angle <= 225)
    zone = "h";
  else if (angle > 225 && angle <= 270)
    zone = "g";
  else if (angle > 270 && angle <= 315)
    zone = "f";
  else if (angle > 315 && angle <= 360)
    zone = "e";

  if (distance < bigSize / 3)
    zone += "1";
  else if (distance < bigSize / 4 * 3)
    zone += "2";
  else
    zone += "3";

  return zone;
}

function HandleSend() {
  const input = document.getElementById('input');

  if (input.value == GetMissingZone()) {
    document.getElementById('score').innerHTML = (number / 10 - 3) * 100;
    number += 10;

    c.clearRect(0, 0, canvas.width, canvas.height)
    circles = [];
    RandomCircles();

    input.value = "";
  }
}