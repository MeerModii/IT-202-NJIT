const scores = [];
let score = 0;
do{
    score = parseInt(prompt("Enter a score "));
    if(!isNaN(score) && score >= 0 && score <= 100 && score != -1){
        scores[scores.length] = score;
    }
    else{
        alert("Please enter a Valid Score");
    }
}while(score != -1);

if(scores.length > 0){
    for(let i = 0; i < scores.length; i++){
        document.write(scores[i]);
        document.write('<br>');
    }
    let sum = 0;
    for(let i = 0; i < scores.length; i++){
        sum += scores[i];
    }
    document.write(sum);
    document.write('<br>');

    let avrage = sum / scores.length;
    document.write(avrage);
}