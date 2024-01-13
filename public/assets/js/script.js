

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


let userInput = document.querySelector("[name='email']");
document.forms[0].onsubmit = function (e) {
    let uservalid = flase;
    let agevalid = flase;
    console.log(userInput.value);
    console.log(userInput.value.length);
    if(uservalid === flase || agevalid === flase) {
        e.preventDefault();
    }
};


