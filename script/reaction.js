var canvas;
var c;
var time;
var state = false;
var canClick = false;

function init() {
  canvas = document.getElementById('game');
  c = canvas.getContext('2d');

  canvas.width = canvas.clientWidth;
  canvas.height = canvas.clientWidth / 16 * 8;

  let interval;

  const poppins = new FontFace('Poppins', 'url(/fonts/Poppins-SemiBold.ttf)');

  poppins.load().then(function (font) {
    document.fonts.add(font)

    c.font = '50px Poppins'
    c.textAlign = 'center';
    c.fillText('Cliquez pour commencer', canvas.width / 2, canvas.height / 2);
    canvas.addEventListener('click', function () {
      if (!state) {
        state = !state

        c.fillStyle = 'red';
        c.fillRect(0, 0, canvas.width, canvas.height);

        interval = setTimeout(() => {
          canClick = true;
          time = new Date();

          c.fillStyle = 'green';
          c.fillRect(0, 0, canvas.width, canvas.height);

        }, ((Math.floor(Math.random() * 2)) + 1) * 1000);
      } else {
        clearInterval(interval)
        state = !state;

        if (canClick) {
          c.clearRect(0, 0, canvas.width, canvas.height);
          c.fillStyle = 'black';
          c.font = '50px Poppins'
          c.textAlign = 'center';
          c.fillText(`${new Date() - time}ms`, canvas.width / 2, canvas.height / 2);

          const score = Math.max(1500 - (new Date() - time), 0);
          const form = new FormData();
          form.append("game", 6)
          form.append("score", score)

          fetch("/script/update-score.php", {
            method: "POST",
            body: form
          })
          document.getElementById('score').innerHTML = score;
          if (document.getElementById('highscore').innerHTML < score)
            document.getElementById('highscore').innerHTML = score;

        } else {
          c.clearRect(0, 0, canvas.width, canvas.height);
          c.fillStyle = 'black';
          c.font = '50px Poppins'
          c.textAlign = 'center';
          c.fillText(`Perdu`, canvas.width / 2, canvas.height / 2);
        }

        canClick = false;
      }
    });
  })
}