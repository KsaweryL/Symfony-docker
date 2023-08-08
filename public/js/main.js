//tutorial no 1
// function multiply(num1, num2) {
//     let result = num1 * num2;
//     return result;
// }
//
// document.body.innerHTML = "The result is: "+ multiply(4, 7);        //displaying info on the page
// multiply(20, 20);
// multiply(0.5, 3);
//
// document.querySelector("html").addEventListener("click", function () {      //displays a proper notification as a result of some action
//     alert("Ouch! Stop poking me!");
// });

// let d = new Date();
// document.body.innerHTML = "<h1>Time right now is:  " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds()
// "</h1>"

// const myHeading = document.querySelector("h1");
// myHeading.textContent = "Hello world!";

//document.body.innerHTML = "<h1>lmao</h1>";

//tutorial no 2
function displayImage(src, width, height) {
    var img = document.createElement("img");
    img.src = src;
    img.width = width;
    img.height = height;
    document.body.appendChild(img);
}

const myImage = document.createElement("img");
myImage.src = "js/images/blue-aesthetic-moon.png";

myImage.onclick = () => {
    const mySrc = myImage.getAttribute("src");
    if (mySrc === "js/images/47823.png") {
        myImage.setAttribute("src", "js/images/blue-aesthetic-moon.png");
    } else {
        myImage.setAttribute("src", "js/images/47823.png");
    }
};

 document.body.appendChild(myImage);



//displayImage('js/images/blue-aesthetic-moon.png', 420, 250);
