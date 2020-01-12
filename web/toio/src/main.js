import './android-ble-patch';
import { NearestScanner } from '@toio/scanner';

let cube = null;

document.getElementById('connect').addEventListener('click', async () => {
  cube = await new NearestScanner().start();
    
  document.body.className = 'cube-connecting';

  await cube.connect();
  cube.on('battery:battery', info => (document.getElementById('battery').innerHTML = info.level));
  cube.on('button:press', info => (document.getElementById('button').innerHTML = info.pressed));
  cube.on('sensor:collision', info => (document.getElementById('collision').innerHTML = info.isCollisionDetected));
  cube.on('id:position-id', info => (document.getElementById('position-id').innerHTML = JSON.stringify(info)));
  cube.on('id:position-id-missed', () => (document.getElementById('position-id').innerHTML = ''));
  cube.on('id:standard-id', info => (document.getElementById('standard-id').innerHTML = JSON.stringify(info)));
  cube.on('id:standard-id-missed', () => (document.getElementById('standard-id').innerHTML = ''));

  document.body.className = 'cube-connected';
});

document.getElementsByClassName('straight').addEventListener('touchstart', async () => cube.move(30, 30, 0));
document.getElementsByClassName('repeat').addEventListener('touchstart', async () => cube.move(30, 30, 0));
document.getElementsByClassName('round').addEventListener('touchstart', async () => cube.move(30, 0, 0));
document.getElementsByClassName('slide').addEventListener('touchstart', async () => cube.move(30, 30, 0));
document.getElementsByClassName('swing').addEventListener('touchstart', async () => cube.move(30, 30, 0));

document.getElementsByClassName('straight').addEventListener('mousedown', async () => cube.move(30, 30, 0));
document.getElementsByClassName('repeat').addEventListener('mousedown', async () => cube.move(30, 30, 0));
document.getElementsByClassName('round').addEventListener('mousedown', async () => cube.move(30, 30, 0));
document.getElementsByClassName('slide').addEventListener('mousedown', async () => cube.move(30, 30, 0));
document.getElementsByClassName('swing').addEventListener('mousedown', async () => cube.move(30, 30, 0));