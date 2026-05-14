/*document.addEventListener('DOMContentLoaded', function() {

  const canvas = document.getElementById('signature-pad');
  const ctx = canvas.getContext('2d');
  let drawing = false;

  function resize() {
    const rect = canvas.parentElement.getBoundingClientRect();
    canvas.width = rect.width;
    canvas.height = rect.height;
  }
  resize();
  window.addEventListener('resize', resize);

  canvas.addEventListener('mousedown', e => { drawing = true; ctx.beginPath(); ctx.moveTo(e.offsetX, e.offsetY); });
  canvas.addEventListener('mouseup', () => drawing = false);
  canvas.addEventListener('mouseleave', () => drawing = false);
  canvas.addEventListener('mousemove', e => {
    if (!drawing) return;
    ctx.lineWidth = 2; ctx.lineCap = 'round'; ctx.strokeStyle = '#ffffff';
    ctx.lineTo(e.offsetX, e.offsetY);
    ctx.stroke(); ctx.beginPath(); ctx.moveTo(e.offsetX, e.offsetY);
  });

  document.getElementById('clear').addEventListener('click', () => {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
  });

  document.getElementById('save').addEventListener('click', () => {
    const link = document.createElement('a');
    link.href = canvas.toDataURL('image/png');
    link.download = 'signature.png';
    link.click();
  });

});*/

import SignaturePad from 'signature_pad';

var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
  backgroundColor: 'rgba(255, 255, 255, 0)',
  penColor: 'rgb(0, 0, 0)'
});

var saveButton   = document.getElementById('save');
var cancelButton = document.getElementById('clear');
var signatureInput = document.getElementById('signature-input'); // ✓ bon id + getElementById minuscule
var form = document.getElementById('signature-form');
                                                                  // ✓ var data supprimé (trop tôt)
saveButton.addEventListener('click', function (event) {
  if (signaturePad.isEmpty()) {
    event.preventDefault();
    alert('Veuillez signer avant d\'enregistrer.');
    return;
  }

  signatureInput.value = signaturePad.toDataURL('image/png');   // ✓ appelé au bon moment
