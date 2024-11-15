var canvas;
var c;

var circles = [];
var count = 2;

let bounds;

var state = false;
let missingIndex;

let bigSize;

class Circle {
  constructor(x, y, rayon, color) {
    this.x = x;
    this.y = y;
    this.rayon = rayon;
    this.color = color;
  }

  TouchingAnotherCircle() {
    circles.forEach((e) => {
      const dx = this.x - e.x;
      const dy = this.y - e.y;

      const distance = Math.sqrt(dx * dx + dy * dy);

      if (distance < this.rayon + e.rayon && distance > 0 && e.color != 'none') {
        this.color = 'none';
      }
    })
  }
}

function init() {
  canvas = document.getElementById('game');
  c = canvas.getContext('2d');

  canvas.width = canvas.clientWidth;
  canvas.height = canvas.clientWidth / 16 * 8;
  bigSize = canvas.width / 15;

  bounds = canvas.getBoundingClientRect();

  const poppins = new FontFace('Poppins', 'url(/fonts/Poppins-SemiBold.ttf)');


  poppins.load().then(function (font) {
    document.fonts.add(font)

    c.font = '50px Poppins'
    c.textAlign = 'center';
    c.fillText('Cliquez pour commencer', canvas.width / 2, canvas.height / 2);
    canvas.addEventListener('click', ClickHandle);
  })
}

function DrawCircle(x, y, rayon, fillstyle, tour = 2 * Math.PI, filled = true) {
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

function RandInt(max) {
  return Math.floor(Math.random() * max) + 1;
}

function GetTwoExistingColors() {
  colors = [];
  circles.forEach((c) => {
    if (!colors.includes(c.color) && colors.length < 2) {
      colors.push(c.color)
    }
  })

  return colors;
}

function ClickHandle() {

  const colors = [
    'violet',
    'pink',
    'crimson',
    'red',
    'orange',
    'coral',
    'orange',
    'gold',
    'yellow',
    'lightgreen',
    'mediumseagreen',
    'green',
    'teal',
    'royalblue',
    'lightblue'
  ];


  if (!state) {
    state = !state

    const missingColor = colors[Math.floor(Math.random() * colors.length)];
    c.clearRect(0, 0, canvas.width, canvas.height);

    circles = [];
    const choices = colors.filter(function (color) { return color != missingColor })
    for (i = 0; i < count * 2; i++) {
      circles.push(new Circle(RandInt(canvas.width), RandInt(canvas.height), bigSize - count * 5, choices[Math.floor(Math.random() * choices.length)]));
    }
    // circles.push(new Circle(canvas.width / 2, canvas.height / 2, 10, missingColor))
    count++;

    circles.forEach((c) => {
      c.TouchingAnotherCircle();
    })
    circles = circles.filter((circle) => circle.color != 'none');

    circles.forEach((c) => {
      DrawCircle(c.x, c.y, c.rayon, c.color);
    })

    setTimeout(() => {
      c.clearRect(0, 0, canvas.width, canvas.height);
      const existing = GetTwoExistingColors();
      const choices = [missingColor, existing[0], existing[1]];

      for (i = 0; i < 3; i++) {
        const choice = choices[Math.floor(Math.random() * choices.length)];
        if (choice == missingColor) {
          missingIndex = i;
        }
        DrawCircle(canvas.width / 6 * (2 + i), canvas.height / 2, bigSize, choice);
        choices.splice(choices.indexOf(choice), 1);
      }
    }, 2000 + count * 100);
  } else {
    for (i = 0; i < 3; i++) {
      const dx = event.clientX - bounds.left - canvas.width / 6 * (2 + i);
      const dy = event.clientY - bounds.top - canvas.height / 2;

      const distance = Math.sqrt(dx * dx + dy * dy);

      if (distance < bigSize) {
        state = !state
        if (missingIndex != i) {
          c.clearRect(0, 0, canvas.width, canvas.height);
          c.fillStyle = 'black'

          c.font = '50px Poppins'
          c.textAlign = 'center';
          c.fillText('Perdu', canvas.width / 2, canvas.height / 2);
          document.getElementById('score').innerHTML = 0;
          count = 2;
        } else {
          ClickHandle();
          const score = (count - 3) * 100;
          const form = new FormData();

          document.getElementById('score').innerHTML = score;
          if (document.getElementById('highscore').innerHTML < score)
            document.getElementById('highscore').innerHTML = score;

          form.append("game", 7)
          form.append("score", score)

          fetch("/script/update-score.php", {
            method: "POST",
            body: form
          })

        }
      }
    }
  }
}