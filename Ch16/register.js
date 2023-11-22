const contactChange = () => {
    const selected = document.querySelector('input[name="contact"]:checked');
    if(selected == "email") {
        createEmailText();
    }
    else{
        removeEmailText();
    }
}
function createEmailText() {
    const contact = document.querySelector("#contact_text");
    const newLabel = document.createElement("label");
    const text = document.createTextNode("Email Address");
    newLabel.appendChild(text);
    contact.appendChild(newLabel);
    const newField = document.createElement("input");
    newField.setAttribute("type", "text");
    newField.setAttribute("name", "email_address");
    newField.setAttribute("id", "email_address");
    contactText.appendChild(newField);
}
function removeEmailText() {
    const contactText = document.querySelector("#contact_text");
    while(contactText.firstChild){
        contactText.firstChild.remove();
    }
    document.addEventListener("DOMContentLoaded", () => {
            const inputContacts = document.querySelectorAll('input[name="contact"]'); 
    for(let contact of inputContacts) {
        contact.addEventListener("change", contactChange);
    }
    })
}