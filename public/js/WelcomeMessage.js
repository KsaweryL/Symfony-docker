//tutorial 2
let myButton = confirm("Change the user");
let myHeading = document.getElementsByTagName("h1");
if(myButton) {setUserName();}
function setUserName() {
    const myName = prompt("Please enter your name.");
    localStorage.setItem("name", myName);
    document.getElementById("demo").innerHTML = `Mozilla is cool, ${myName}`;
}

if (!localStorage.getItem("name")) {
    setUserName();
} else {
    const storedName = localStorage.getItem("name");
    document.getElementById("demo").innerHTML = `Mozilla is cool, ${storedName}`;
    alert(`Mozilla is cool, ${storedName}`);
}

//tutorial 3

//const element = document.getElementsByTagName("p");

//document.getElementById("demo").innerHTML = 'The text in first paragraph (index 0) is: ' + element[0].innerHTML;
