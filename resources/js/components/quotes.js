document.querySelectorAll('.add-to-quote').forEach(function (element){
    element.addEventListener('click', function (e){
        console.log(element.dataset.element_id);
        console.log(element.dataset.element_title);
        console.log(element.dataset.element_content);
    
    var id = element.dataset.element_id;
    var title = element.dataset.element_title;
    var content = element.dataset.element_content;

    var div = document.getElementById("item"+id);
    var divClone = div.cloneNode(true);
    //var divTitle = document.getElementById("item"+id+"_title");
    var divT = divClone.children[1].children[0]
    
    var divCloneTitle = document.createElement("input");
    divCloneTitle.setAttribute("id","item"+id+"_title");
    divCloneTitle.setAttribute("class","mb-2 font-semibold")
    divCloneTitle.value = title

    //var divContent = document.getElementById("item"+id+"_content");
    var divC = divClone.children[1].children[1]
    var divCloneContent = document.createElement("textarea");
    divCloneContent.setAttribute("id","item"+id+"_content")
    divCloneContent.setAttribute("class","text-sm")
    divCloneContent.value = content

    var divButton = document.getElementById("item"+id+"_button");
    var divB = divClone.children[0].children[0]
    var divCloneButton = divButton.cloneNode(true);
    divButton.setAttribute('class','cursor-pointer pointer-events-none btn-primary');
    divButton.removeAttribute('onclick')
    divCloneButton.setAttribute('class','cursor-pointer btn-secondary')
    divCloneButton.innerHTML = "-"
    //divButton.setAttribute('onclick','abc('+id+')')
    //divButton.classList.add('pointer-events-none')
    //alert(divButton.onclick)
      //alert(divTitle)
      //alert(divCloneTitle)

    
    div.style.background="gray"
    divT.replaceWith(divCloneTitle);
    divC.replaceWith(divCloneContent);
    divB.replaceWith(divCloneButton);
    document.querySelectorAll('.here-add-quote').forEach(function (ele){
      ele.appendChild(divClone);
      })
    },{once: true})
})

