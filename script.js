/**
 * 
 */
function displayLogin() {
    document.getElementById("LR_logo").className = "LR_logo_Pt2"; 
    document.getElementById("RegisterForm").style.visibility = "hidden";
    document.getElementById("LoginForm").style.visibility = "visible";
}

function displayRegister() {
    document.getElementById("LR_logo").className = "LR_logo_Pt2";
    document.getElementById("LoginForm").style.visibility = "hidden";
    document.getElementById("RegisterForm").style.visibility = "visible";
}