"use strict"
function newPassword(){
let newPassword="";
let letters = 'abcdefghijklmopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!"§$%&/()=?';
for (var i = 0; i < letters.length; i++) {
    newPassword += letters[Math.floor(Math.random() * 62)];
    if(newPassword.length==10){
           document.getElementById("newpassword").value = newPassword;
       }
    }
}