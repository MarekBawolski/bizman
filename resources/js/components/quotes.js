document.querySelectorAll('.add-to-quote').forEach(function (element){
    element.addEventListener('click', function (){quote();},{once: true});
    
    
    function quote(){
        console.log(element.dataset.element_id);
        console.log(element.dataset.element_title);
        console.log(element.dataset.element_content);
    
    var id = element.dataset.element_id;
    var title = element.dataset.element_title;
    var content = element.dataset.element_content;

    var div = document.getElementById("item"+id);
    var divClone = div.cloneNode(true);
    divClone.id = "item"+id+"m";
    //var divTitle = document.getElementById("item"+id+"_title");
    var divT = divClone.children[1].children[0]
    
    var divCloneTitle = document.createElement("input");
    divCloneTitle.setAttribute("id","item"+id+"_titlem");
    divCloneTitle.setAttribute("class","mb-2 font-semibold")
    divCloneTitle.value = title
    divCloneTitle.style.width = "100%";

    //var divContent = document.getElementById("item"+id+"_content");
    var divC = divClone.children[1].children[1]
    var divCloneContent = document.createElement("textarea");
    divCloneContent.setAttribute("id","item"+id+"_contentm")
    divCloneContent.setAttribute("class","text-sm")
    divCloneContent.value = content
    divCloneContent.style.width = "100%";

    var divButton = document.getElementById("item"+id+"_button");
    divButton.setAttribute('class','cursor-pointer pointer-events-none btn-primary');
    //divButton,removeEventListener('click','function(e)')
    var divB = divClone.children[0].children[0]
    var divCloneButton = divButton.cloneNode(true);
    divCloneButton.setAttribute("id","item"+id+"_buttonm")
    divCloneButton.setAttribute('class','cursor-pointer btn-secondary')
    divCloneButton.innerHTML = "-"

    
    divCloneButton.addEventListener('click',function (e){
      document.getElementById("item"+id+"m").remove()
      document.getElementById("item"+id).style.background = "rgb(243 244 246)"
      document.getElementById("item"+id+"_button").setAttribute('class','cursor-pointer btn-primary');
      document.getElementById("item"+id+"_button").addEventListener('click', function (){quote();},{once: true});
    })

    
    div.style.background="gray"
    divT.replaceWith(divCloneTitle);
    divC.replaceWith(divCloneContent);
    divB.replaceWith(divCloneButton);
    document.querySelectorAll('.here-add-quote').forEach(function (ele){
      ele.appendChild(divClone);
      })
    }
  }
)

