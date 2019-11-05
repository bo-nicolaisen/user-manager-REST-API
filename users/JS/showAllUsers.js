// json data retrival with fetch api
// define app root
const container = document.getElementById('root')

// define url
const url = 'http://localhost/user-rest-api/users/PHP/API/entrypoint.php';

fetch(url) //fetch url

.then((resp) => resp.json()) // use the response as json

.then(function(data) {
  // build view here...
//console.log(data);
  data.forEach(user => {
    // build user card

    const userCard = document.createElement('article');
    userCard.setAttribute('class', 'userbox');

    const h2 = document.createElement('h2');
    h2.textContent = user.username;


    const p = document.createElement('p');
 // movie.description = movie.description.substring(0, 300); // Limit to 300 chars
 p.textContent = user.email+' '+user.password; // End with an ellipses



 // Append article to DOM
 container.appendChild(userCard);
 // append H2 and paragraph

 userCard.appendChild(h2);
 userCard.appendChild(p);




    console.log(user);

  })

})
// catch errors
.catch(function() {

  console.log("uuuups");
});
