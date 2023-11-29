const clearDisplay = () =>{
    const display = document.querySelector("#display");
    while(display.firstChild){
        display.firstChild.remove();
    }
}
const displayError = error => {
    clearDisplay();
    const display = document.querySelector("#display");
    const span = document.createElement("span");
    span.setAttribute('class', 'error');
    const text = document.createTextNode(error);
    span.appendChild(text);
    display.appendChild(span);
}

const displayData = data =>{
    clearDisplay();
    console.log(data);
    //TODO complete display all data
    const display = document.querySelector("#display");
    const h3 = document.createElement("h3");
    const title = document.createTextNode(data.title);
    h3.appendChild(title);
    display.appendChild(h3);

}

const displayPicture = data =>{
    if(data.error){
        displayError(data.error.message);
    }
    else if(data.code){
        displayData(data.msg);
    }
    else{
        displayData(data);
    }
}

document.addEventListener("DOMContentLoaded", ()=> {
    document.querySelector("#view_button").addEventListener("click", ()=>{
        const dateTextBox = document.querySelector("#date");
        let dateStr = dateTextBox.value;

        if(dateStr){
            const domain = `https://api.nasa.gov/planetary/apod`;
            const request = `?api_key=DEMO_KEY&date=${dateStr}`;
            const url = domain + request;
 
            fetch(url)
                .then( response => response.json() )
                .then( json => displayPicture(json) )
                .catch( e => displayError(e) );
        }

        else{
            const msg = "Please select a valid date";
            displayError(msg);
        }
    });

});