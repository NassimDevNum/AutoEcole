// let btnModifMail = document.querySelector("#btnModifMail");
// let btnValidModifMail = document.querySelector("#btnValidModifMail");
// let divMail = document.querySelector("#mail");
// let divModificationMail = document.querySelector("#modificationMail");

// btnModifMail.addEventListener("click", function(){
//     divMail.classList.add("d-none");
//     divModificationMail.classList.remove("d-none");
// })

// document.querySelector("#btnSupCompte").addEventListener("click",function(){
//     document.querySelector("#suppressionCompte").classList.remove("d-none");
// });

let btnModifMail = document.querySelector("#btnModifMail");
let btnValidModifMail = document.querySelector("#btnValidModifMail");
let divMail = document.querySelector("#mail");
let divModificationMail = document.querySelector("#modificationMail");

let btnModifTel = document.querySelector("#btnModifTel"); // Nouvelle ligne
let btnValidModifTel = document.querySelector("#btnValidModifTel"); // Nouvelle ligne
let divTel = document.querySelector("#tel"); // Nouvelle ligne
let divModificationTel = document.querySelector("#modificationTel"); // Nouvelle ligne

btnModifMail.addEventListener("click", function(){
    divMail.classList.add("d-none");
    divModificationMail.classList.remove("d-none");
});

btnModifTel.addEventListener("click", function(){ // Nouvelle ligne
    divTel.classList.add("d-none");
    divModificationTel.classList.remove("d-none");
}); // Nouvelle ligne

document.querySelector("#btnSupCompte").addEventListener("click",function(){
    document.querySelector("#suppressionCompte").classList.remove("d-none");
});
