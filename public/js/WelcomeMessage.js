let myButton = confirm("Change the user");
let myHeading = document.querySelector("h1");

// myButton.onclick = () => {
//     setUserName();
// };

if(myButton) {setUserName();}
function setUserName() {
    const myName = prompt("Please enter your name.");
    localStorage.setItem("name", myName);
    //myHeading.textContent = `Mozilla is cool, ${myName}`;     causes error
    alert(`Mozilla is cool, ${myName}`);
}

if (!localStorage.getItem("name")) {
    setUserName();
} else {
    const storedName = localStorage.getItem("name");
    //myHeading.textContent = `Mozilla is cool, ${storedName}`;
    alert(`Mozilla is cool, ${storedName}`);
}



//let myButton = document.querySelector("button");
//let myHeading = document.querySelector("h1");