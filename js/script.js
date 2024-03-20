

document.querySelector(".hamburger").addEventListener("click",()=>{
     document.querySelector(".outerNav").style.left="-100%"
     document.querySelector(".search").style.left="100%"
     document.querySelector(".fa").style.left="340%"
})

document.querySelector(".close").addEventListener("click",()=>{
     document.querySelector(".outerNav").style.left="-277%"
     document.querySelector(".search").style.left="-370%"
     document.querySelector(".fa").style.left="-340%"
})