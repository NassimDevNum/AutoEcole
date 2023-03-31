
const newMDPInput = document.getElementById('newMDP');
const confirmMDPInput = document.getElementById('confirmMDP');
const validerBtn = document.querySelector('button[type="submit"]');

confirmMDPInput.addEventListener('keyup', () => {
  if (newMDPInput.value === confirmMDPInput.value) {
    validerBtn.disabled = false;
    document.querySelector("#erreur").classList.add("d-none");
  } else {
    validerBtn.disabled = true;
    document.querySelector("#erreur").classList.remove("d-none");
  }
});
