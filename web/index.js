let cube = null;

document.getElementById('connect').addEventListener('click', async () => {
  cube = await new toio.NearestScanner().start();
  document.body.className = 'cube-connecting';
  await cube.connect();
  document.body.className = 'cube-connected';
});

[...document.getElementsByClassName('straight')].forEach(element => {
  element.addEventListener('click', async () => cube.move(30, 30, 100))
})

//document.getElementsByClassName('straight').addEventListener('touchstart', async () => cube.move(30, 30, 0));
//document.getElementsByClassName('repeat').addEventListener('touchstart', async () => cube.move(30, 30, 0));
//document.getElementsByClassName('round').addEventListener('touchstart', async () => cube.move(30, 0, 0));
//document.getElementsByClassName('slide').addEventListener('touchstart', async () => cube.move(30, 30, 0));
//document.getElementsByClassName('swing').addEventListener('touchstart', async () => cube.move(30, 30, 0));

//document.getElementsByClassName('straight').addEventListener('mousedown', async () => cube.move(30, 30, 0));
//document.getElementsByClassName('repeat').addEventListener('mousedown', async () => cube.move(30, 30, 0));
//document.getElementsByClassName('round').addEventListener('mousedown', async () => cube.move(30, 30, 0));
//document.getElementsByClassName('slide').addEventListener('mousedown', async () => cube.move(30, 30, 0));
//document.getElementsByClassName('swing').addEventListener('mousedown', async () => cube.move(30, 30, 0));
