var canvas;
var c;
let input;
let button;
let size = 1;
let fontSize = 50;
let text;

function init() {
  canvas = document.getElementById('game');
  c = canvas.getContext('2d');

  input = document.getElementById('input');
  button = document.getElementById('button');

  canvas.width = canvas.clientWidth;
  canvas.height = canvas.clientWidth / 16 * 8;

  const poppins = new FontFace('Poppins', 'url(/fonts/Poppins-SemiBold.ttf)');

  poppins.load().then(function (font) {
    document.fonts.add(font)

    DrawText('Cliquez pour commencer', canvas.width / 2, canvas.height / 2, 50)
    canvas.addEventListener('click', CanvasClick)
  })


}

function DrawText(text, x, y, size) {
  c.font = `${size}px Poppins`;
  c.textAlign = 'center';
  c.fillText(text, x, y);
}

function CheckSize(text) {
  return c.measureText(text).width;
}

function RandomNumbers(length) {
  number = "";
  for (i = 0; i < length; i++) {
    number += Math.floor(Math.random() * 9) + 1;
  }
  return number;
}

function HandleSend() {
  if (input.value == text) {
    text = RandomNumbers(size);
    c.clearRect(0, 0, canvas.width, canvas.height)
    while (CheckSize(text) > canvas.width) {
      fontSize--;
      c.font = `${fontSize}px Poppins`;
    }
    DrawText(text, canvas.width / 2, canvas.height / 2, fontSize);
    size++;

    setTimeout(EnterInput, 2000)

    const score = (size - 2) * 100;
    const form = new FormData();

    document.getElementById('score').innerHTML = score;
    if (document.getElementById('highscore').innerHTML < score)
      document.getElementById('highscore').innerHTML = score;

    form.append("game", 3)
    form.append("score", score)

    fetch("/script/update-score.php", {
      method: "POST",
      body: form
    })
  } else {
    c.clearRect(0, 0, canvas.width, canvas.height)
    DrawText('Perdu', canvas.width / 2, canvas.height / 2, 50)
    canvas.addEventListener('click', CanvasClick)
    size = 1;
    fontSize = 50;
  }
  input.value = "";
}

function EnterInput() {
  c.clearRect(0, 0, canvas.width, canvas.height);
  DrawText('Entrez le numéro', canvas.width / 2, canvas.height / 2, 50)
}

function CanvasClick() {
  document.getElementById('score').innerHTML = 0
  c.clearRect(0, 0, canvas.width, canvas.height)
  text = RandomNumbers(size);
  DrawText(text, canvas.width / 2, canvas.height / 2, fontSize);
  size++;
  button.addEventListener('click', HandleSend);
  canvas.removeEventListener('click', CanvasClick);
  setTimeout(EnterInput, 1500)
}