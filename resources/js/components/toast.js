const toast = document.querySelector(".toast"),
    progress = document.querySelector(".progress"),
    closeIcon = document.querySelector(".close");
      
    document.querySelector(".toast").classList.add("active");
    document.querySelector(".progress").classList.add("active");

    setTimeout(() => {
    	toast.classList.remove("active");
    }, 4000);

    setTimeout(() => {
    	progress.classList.remove("active");
    }, 4300); 

    closeIcon.addEventListener("click", () => {
        toast.classList.remove("active");       
        setTimeout(() => {
        	progress.classList.remove("active");
        }, 300);
    });