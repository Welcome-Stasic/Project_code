const form = document.querySelector(".signup form"),
 continueBtn = form.querySelector(".button input"),
 errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
 e.preventDefault();
}

continueBtn.onclick = ()=>{
 let xhr = new XMLHttpRequest();
 xhr.open("POST", "Users.php", true);
 xhr.onload = ()=> {
  if (xhr.readyState === XMLHttpRequest.DONE) {
   if (xhr.status === 200) {
    let data = xhr.response;
    if (data === "Успешно") {
     location.href="../profile/profile.php";
    }
    else {
     errorText.style.display = "block";
     errorText.textContent = data;
    }
   }
  }
 }
 let formData = new FormData(form);
 xhr.send (formData);
}