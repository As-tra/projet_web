const checkoutBtn = document.querySelector('.checkout-btn');
const popup = document.getElementById('popup');
const closePopup = document.getElementById('closePopup');

checkoutBtn.addEventListener('click', function(event) {
  event.preventDefault(); 

  //les valeurs des champs
  const address = document.querySelector('input[placeholder="Jl. Bojong timur no 65, Bumi datar, kapuas"]').value.trim();
  const city = document.querySelectorAll('select')[0].value;
  const state = document.querySelectorAll('select')[1].value;
  const postal = document.querySelectorAll('select')[2].value;
  const cardNumber = document.querySelector('input[placeholder="**** **** **** ****"]').value.trim();
  const expiry = document.querySelector('input[placeholder="MM / YY"]').value.trim();
  const cvc = document.querySelector('input[placeholder="CVC"]').value.trim();

  //un champ est vide
  if (!address || !city || !state || !postal || !cardNumber || !expiry || !cvc) {
    alert("Veuillez remplir tous les champs !");
    return;
  }


  console.log({
    address,
    city,
    state,
    postal,
    cardNumber,
    expiry,
    cvc
  });

  popup.style.display = 'flex';
});

closePopup.addEventListener('click', function() {
  window.location.href = "index.php"; 
});