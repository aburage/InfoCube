let cube = null;

document.getElementById('connect').addEventListener('click', async () => {
  cube = await new toio.NearestScanner().start();
  document.body.className = 'cube-connecting';
  await cube.connect();
  document.body.className = 'cube-connected';
});

//level1 small movement
[...document.getElementsByClassName('straight1')].forEach(element => {
  element.addEventListener('click', async () => {
      await cube.move(30, 30, 2000);
  })
});

[...document.getElementsByClassName('repeat1')].forEach(element => {
  element.addEventListener('click', async () => {
      await cube.move(30, 30, 500);
      await cube.move(0, 0, 200);
      await cube.move(30, 30, 500);
      await cube.move(0, 0, 200);
      await cube.move(30, 30, 500);
      await cube.move(0, 0, 200);
  })
});

[...document.getElementsByClassName('round1')].forEach(element => {
  element.addEventListener('click', async () => {
      await cube.move(20, 40, 2000);
  })
});

[...document.getElementsByClassName('slide1')].forEach(element => {
  element.addEventListener('click', async () => {
      await cube.move(30, 30, 500);
      await cube.move(-30, -30, 500);
      await cube.move(30, 30, 500);
      await cube.move(-30, -30, 500);
  })
});

[...document.getElementsByClassName('swing1')].forEach(element => {
  element.addEventListener('click', async () => {
      await cube.move(0, 30, 500);
      await cube.move(0, -30, 500);
      await cube.move(0, 30, 500);
      await cube.move(0, -30, 500);
  })
});

//level2 midle movement
[...document.getElementsByClassName('straight2')].forEach(element => {
  element.addEventListener('click', async () => {
      await cube.move(30, 30, 2000);
  })
});

[...document.getElementsByClassName('repeat2')].forEach(element => {
  element.addEventListener('click', async () => {
      await cube.move(30, 30, 500);
      await cube.move(0, 0, 200);
      await cube.move(30, 30, 500);
      await cube.move(0, 0, 200);
      await cube.move(30, 30, 500);
      await cube.move(0, 0, 200);
  })
});

[...document.getElementsByClassName('round2')].forEach(element => {
  element.addEventListener('click', async () => {
      await cube.move(20, 40, 2000);
  })
});

[...document.getElementsByClassName('slide2')].forEach(element => {
  element.addEventListener('click', async () => {
      await cube.move(30, 30, 500);
      await cube.move(-30, -30, 500);
      await cube.move(30, 30, 500);
      await cube.move(-30, -30, 500);
  })
});

[...document.getElementsByClassName('swing2')].forEach(element => {
  element.addEventListener('click', async () => {
      await cube.move(0, 30, 500);
      await cube.move(0, -30, 500);
      await cube.move(0, 30, 500);
      await cube.move(0, -30, 500);
  })
});

//level3 large movement
[...document.getElementsByClassName('straight3')].forEach(element => {
  element.addEventListener('click', async () => {
      await cube.move(30, 30, 2000);
  })
});

[...document.getElementsByClassName('repeat3')].forEach(element => {
  element.addEventListener('click', async () => {
      await cube.move(30, 30, 500);
      await cube.move(0, 0, 200);
      await cube.move(30, 30, 500);
      await cube.move(0, 0, 200);
      await cube.move(30, 30, 500);
      await cube.move(0, 0, 200);
  })
});

[...document.getElementsByClassName('round3')].forEach(element => {
  element.addEventListener('click', async () => {
      await cube.move(20, 40, 2000);
  })
});

[...document.getElementsByClassName('slide3')].forEach(element => {
  element.addEventListener('click', async () => {
      await cube.move(30, 30, 500);
      await cube.move(-30, -30, 500);
      await cube.move(30, 30, 500);
      await cube.move(-30, -30, 500);
  })
});

[...document.getElementsByClassName('swing3')].forEach(element => {
  element.addEventListener('click', async () => {
      await cube.move(0, 30, 500);
      await cube.move(0, -30, 500);
      await cube.move(0, 30, 500);
      await cube.move(0, -30, 500);
  })
});
