

document.getElementById('loadMore').addEventListener('click', function () {
  
     // AJAX request to fetch more users

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Parse the JSON response
            var response = JSON.parse(xhr.responseText);

            // Append the new users to the list
            var userList = document.getElementById('userList');
            response.users.forEach(function (user) {
                var li = document.createElement('li');
                li.textContent = user.username + ' - ' + user.email;
                userList.appendChild(li);
            });
        }
    };

    // Make the AJAX request to the fetchMoreUsers endpoint
    
    xhr.open('GET', 'index.php?route=fetchMoreUsers', true);
    xhr.send();
});

console.log("vjvvvvvvvvvvvvvv");



// document.getElementById("login").onsubmit = function {

//     let emailInput = document.getElementById("email").value;
//     let emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//     let validationResult = emailRe.test(emailInput);
    
//     console.log(validationResult);

//     if(validationResult === false) {
//         alert("Adresse e-mail non valide");
//     }
// }





// function validateForm() {
//     // Récupérer les valeurs des champs
//     var emailInput = document.getElementById("email").value;
//     var passwordInput = document.getElementById("password").value;

//     // Réinitialiser les messages d'erreur
//     document.getElementById("emailError").innerHTML = "";
//     document.getElementById("passwordError").innerHTML = "";

//     // Valider le champ 'Email'
//     var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//     if (!emailRegex.test(emailInput)) {
//       document.getElementById("emailError").innerHTML = "Veuillez saisir une adresse e-mail valide.";
//       return false; // Empêche la soumission du formulaire
//     }

//     // Valider le champ 'Password'
//     if (passwordInput.length < 6) {
//       document.getElementById("passwordError").innerHTML = "Le mot de passe doit contenir au moins 6 caractères.";
//       return false; // Empêche la soumission du formulaire
//     }

//     // Si la validation réussit, le formulaire peut être soumis
//     return true;
//   }