
var listOfClasses = ["#45a3e5", "#8cc73f", "#f3d333", "#f78e56"];
var randomNum = Math.floor(Math.random() * listOfClasses.length); 
console.log(listOfClasses[randomNum]);
document.documentElement.style.setProperty('--primary-color', listOfClasses[randomNum]);