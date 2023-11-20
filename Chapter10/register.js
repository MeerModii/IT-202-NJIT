$(document).ready( () => {
    //Move focus to first input box
    $("#email").focus();
    $(":radio").change( () => {
        const radioChecked = $(":radio:checked").val();
        if (radioChecked == "corporate") {
            // Enable company name
            $("#company_name").attr("disabled", false);
            $("#company_name").next().text("*");
        }
        else{
            // Disable company name
            $("#company_name").attr("disabled", true);
            $("#company_name").next().text("");
            $("#company_name").val("");
        }
    });

    $("#member_form").submit( () => {
        let isValid = true;
        // Validate email
        const emailPattern = /\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b/;
        const email = $("#email").val();
        if(email = ""){
            $("#email").next().text("This field is required");
            isValid = false;
        }
        else if(!emailPattern.test(email)){
            $("#email").next().text("Must be a valid address");
        }
        if(isValid == false){
            event.preventDefault();
        }
        const password = $("#password").val();
        if(password.length<6){
            $("#password").next().text("Must be 6 or more chars");
            isValid = false;
        }
        else{
            $("#passeord").next().text("");
        }
        if($("#company_name").prop("disabled") == false){
            const companyName = $("#company_name").val();
            if(companyName == ""){
                $("#company_name").next().text("This field is required");
                isValid = false;
            }
            else{
                $("#company_name").next().text("");
            }
        }

    } );
});