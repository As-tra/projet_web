document.addEventListener('DOMContentLoaded', function () {
    const checkoutBtn = document.querySelector('.checkout-btn');
    const popup = document.getElementById('popup');
    const closePopup = document.getElementById('closePopup');
  
    checkoutBtn.addEventListener('click', function (event) {
      event.preventDefault();
  
      // Collect values from the form
      const address = document.querySelector('input[placeholder="Jl. Bojong timur no 65, Bumi datar, kapuas"]').value.trim();
      const city = document.getElementById('city').value;
      const state = document.getElementById('state').value;
      const postal_code = document.getElementById('postal_code').value;
      const cardNumber = document.querySelector('input[placeholder="**** **** **** ****"]').value.trim();
      const expiry = document.querySelector('input[placeholder="MM / YY"]').value.trim();
      const cvc = document.querySelector('input[placeholder="CVC"]').value.trim();
  
      // Validate if all fields are filled
      if (!address || !city || !state || !postal_code || !cardNumber || !expiry || !cvc) {
        alert("Veuillez remplir tous les champs !");
        return;
      }
  
      // Prepare form data to be sent
      const formData = new FormData();
      formData.append('address', address);
      formData.append('city_id', city); 
      formData.append('state', state);
      formData.append('postal_code', postal_code);
      formData.append('card_number', cardNumber);
      formData.append('expiry', expiry);
      formData.append('cvc', cvc);
  
      // Send data using fetch
      fetch('process_payment.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.text())
      .then(text => {
        console.log("Raw response:", text);
        try {
          const data = JSON.parse(text);
          if (data.success) {
            popup.style.display = 'flex';
          } else {
            alert("Erreur : " + (data.error || "Échec de l'enregistrement."));
          }
        } catch (e) {
          console.error("Not valid JSON:", e);
        }
      })
      .catch(error => {
        console.error('Erreur lors de la requête :', error);
      });
    });
  
    // Close popup and redirect
    closePopup.addEventListener('click', function () {
      window.location.href = "index.php";
    });
});
