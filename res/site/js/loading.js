function showLoading() {

            document.getElementById("loading").style.display = "block";
        
    
}

function hideLoading() {
    const loadings = document.getElementsByClassName("loading");
    if (loadings.length) {
        loadings[0].remove();
    }
}

function login() {

    if (NumSM.required=false) {
        NumSM.required=true;

    }

    showLoading();
    firebase.auth().signInWithEmailAndPassword(
        form.NumSM().value
    ).then(() => {
        hideLoading();
        window.location.href = "pages/home/home.html";
    }).catch(error => {
        hideLoading();
        alert(getErrorMessage(error));
    });
}