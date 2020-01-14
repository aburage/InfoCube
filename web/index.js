let cube = null;

document.getElementById('connect').addEventListener('click', async () => {
  cube = await new toio.NearestScanner().start();
  document.body.className = 'cube-connecting';
  await cube.connect();
  document.body.className = 'cube-connected';
});

[...document.getElementsByClassName('straight')].forEach(element => {
  element.addEventListener('click', async () => {
      await cube.move(30, 30, 2000);
  })
});

[...document.getElementsByClassName('repeat')].forEach(element => {
  element.addEventListener('click', async () => {
      await cube.move(30, 30, 500);
      await cube.move(0, 0, 200);
      await cube.move(30, 30, 500);
      await cube.move(0, 0, 200);
      await cube.move(30, 30, 500);
      await cube.move(0, 0, 200);
  })
});

[...document.getElementsByClassName('round')].forEach(element => {
  element.addEventListener('click', async () => {
      await cube.move(20, 40, 2000);
  })
});

[...document.getElementsByClassName('slide')].forEach(element => {
  element.addEventListener('click', async () => {
      await cube.move(30, 30, 500);
      await cube.move(-30, -30, 500);
      await cube.move(30, 30, 500);
      await cube.move(-30, -30, 500);
  })
});

[...document.getElementsByClassName('swing')].forEach(element => {
  element.addEventListener('click', async () => {
      await cube.move(0, 30, 500);
      await cube.move(0, -30, 500);
      await cube.move(0, 30, 500);
      await cube.move(0, -30, 500);
  })
});
