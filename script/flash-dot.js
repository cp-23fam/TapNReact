var canvas;
var c;
var start;
var forceWrong = Math.floor(Math.random() * 3) + 2;
var forceCorrect = Math.floor(Math.random() * 5) + 8;
var state = false;

function init() {
  canvas = document.getElementById('game');
  c = canvas.getContext('2d');

  canvas.width = canvas.clientWidth;
  canvas.height = canvas.clientWidth / 16 * 8;

  let interval;

  let zones = [
    [canvas.width / 4, canvas.height / 2, 'orange'],
    [canvas.width / 4 * 3, canvas.height / 2, '#A3C2D0']
  ];

  const poppins = new FontFace('Poppins', 'url(../fonts/Poppins-SemiBold.ttf)');


  poppins.load().then(function (font) {
    document.fonts.add(font)

    c.font = '50px Poppins'
    c.textAlign = 'center';
    c.fillText('Cliquez pour commencer', canvas.width / 2, canvas.height / 2);
    canvas.addEventListener('click', function () {

      if (!state) {
        state = !state;
        Loop(zones, interval);
        interval = setInterval(function () {
          Loop(zones, interval);
        }, 1000);
      } else {
        ClickEndGame(zones);
        clearInterval(interval)
        state = !state;
      }
    });
  })
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

function Loop(zones, interval) {
  const colors = ['red', 'blue', 'green', 'yellow', 'pink', 'purple', 'lightblue', 'orange']

  c.clearRect(0, 0, canvas.width, canvas.height);
  zones.forEach((z) => {
    last = z[2];
    do {
      z[2] = colors[Math.floor(Math.random() * colors.length)];
    } while (z[2] == last)

    if (forceWrong > 0) {
      do {
        z[2] = colors[Math.floor(Math.random() * colors.length)];
      } while (zones[0][2] == zones[1][2])
    } else if (forceCorrect == 0) {
      while (zones[0][2] != zones[1][2]) {
        z[2] = colors[Math.floor(Math.random() * colors.length)];
      }
    }
    DrawCircle(c, z[0], z[1], 200, z[2])
  })
  forceWrong--;
  forceCorrect--;

  if (zones[0][2] == zones[1][2]) {
    clearInterval(interval, zones);
    start = new Date();
  }
}

function ClickEndGame(zones) {
  if (zones[0][2] == zones[1][2]) {
    c.clearRect(0, 0, canvas.width, canvas.height);
    const time = new Date() - start;

    c.fillStyle = 'black';
    c.font = '50px Poppins';
    c.textAlign = 'center';
    c.fillText(`${time}ms`, canvas.width / 2, canvas.height / 2);
    c.font = '30px Poppins';
    c.fillText(`Cliquez pour recommencer`, canvas.width / 2, canvas.height / 2 + 40);

    document.getElementById('score').innerHTML = 1500 - time;
  } else {
    c.clearRect(0, 0, canvas.width, canvas.height);

    c.fillStyle = 'black';
    c.font = '50px Poppins';
    c.textAlign = 'center';
    c.fillText(`Perdu`, canvas.width / 2, canvas.height / 2);
    c.font = '30px Poppins';
    c.fillText(`Cliquez pour recommencer`, canvas.width / 2, canvas.height / 2 + 40);
    forceWrong = Math.floor(Math.random() * 3) + 2;
    forceCorrect = Math.floor(Math.random() * 6) + 10;
  }
}