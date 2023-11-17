let lastname = "Hopper";
if (lastName == "Hopper"){
    console.log("Last name is Hopper");
}
let rate = "some number";
if(isNaN(rate)){
    console.log("Rate is NaN");
}

let age = prompt("What is your age?");
if(age>= 18){
    alert("you can vote");
}
else{
    alert("you cannot vote");
}

let years = parseInt(prompt("How many years"));
while(isNaN(years) || years <= 0){
    years = parseInt(prompt("Years must be a valid possitive number"));
}

for(let index = 3; index >0; index--){
    document.write(index + "...");
}
document.write("Blast off!");

const totals = [];
totals[0] = 141.95;
totals[1] = 212.25;
totals[2] = 411;
totals[totals.length] = 12.34;


for(var index = 0; index < totals.length; index++){
    sum += totals[index];
}
console.log("sum = " + sum);

for(let i in totals){
    console.log(totals[i]);
}

for(let values of totals){
    console.log(i);
}

















