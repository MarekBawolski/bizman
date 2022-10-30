document.querySelectorAll('.add-to-quote').forEach(function (element){
    element.addEventListener('click', function (e){
        console.log(element.dataset.element_id);
        console.log(element.dataset.element_title);
        console.log(element.dataset.element_content);
    
    //element.removeAttribute('.add-to-quote');
    //element.setAttribute('.del-quote');
    var id = element.dataset.element_id;
    var title = element.dataset.element_title;
    var content = element.dataset.element_content;

    var div = document.getElementById("item"+id);
    var divClone = div.cloneNode(true);
    var divTitle = document.getElementById("item"+id+"_title");
    var divCloneTitle = document.createElement("input");
    divCloneTitle.setAttribute("id","item"+id+"_title")
    divCloneTitle.value = title

    var divContent = document.getElementById("item"+id+"_content");
    var divCloneContent = document.createElement("textarea");
    divCloneTitle.setAttribute("id","item"+id+"_content")
    divCloneContent.value = content
  
    var divButton = document.getElementById("item"+id+"_button");
    divButton.style.background = "#FFBF00";
    divButton.style.borderColor = "#FFBF00";
    divButton.style.hover = "#000000";
    divButton.innerHTML = "-"
    divButton.setAttribute('onclick','abc('+id+')')
    //divButton.classList.add('pointer-events-none')
    //alert(divButton.onclick)
      //alert(divTitle)
      //alert(divCloneTitle)
    divTitle.replaceWith(divCloneTitle);
    divContent.replaceWith(divCloneContent);
    document.querySelectorAll('.here-add-quote').forEach(function (ele){
      ele.appendChild(div);
      })
    })
})

