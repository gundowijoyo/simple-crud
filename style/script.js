const idhomeone = document.getElementById("homeone");
const idclose = document.getElementById("close");
const idbg = document.getElementById("manipulasibg");
const idform = document.getElementById("form");
const idshowadd = document.getElementById("showadd");



idclose.addEventListener("click",()=>{
setTimeout(()=>{
form.style.display = "none";
idbg.style.display = "none";
},200);
});

idshowadd.addEventListener("click",()=>{
    setTimeout(()=>{
    idform.style.display = "block";
    idbg.style.display = "block";
 },200);
});