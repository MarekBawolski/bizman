document.querySelectorAll('.add-to-quote').forEach(function (element) {
  element.addEventListener('click', function () { quote(); }, { once: true });


  function quote() {
    //skrocenie zmiennych
    var id = element.dataset.element_id;
    var title = element.dataset.element_title;
    var content = element.dataset.element_content;

    //glowny div
    var div = document.getElementById("item" + id);
    var divClone = div.cloneNode(true);
    divClone.id = "item" + id + "m";

    //tytul
    var divTitle = divClone.children[1].children[0]
    var divCloneTitle = document.createElement("input");
    divCloneTitle.setAttribute("id", "item" + id + "_titlem");
    divCloneTitle.setAttribute("class", "mb-2 font-semibold w-full")
    divCloneTitle.value = title

    //content
    var divContent = divClone.children[1].children[1]
    var divCloneContent = document.createElement("textarea");
    divCloneContent.setAttribute("id", "item" + id + "_contentm")
    divCloneContent.setAttribute("class", "text-sm w-full")
    divCloneContent.value = content

    //button
    var divOrgButton = document.getElementById("item" + id + "_button");
    divOrgButton.setAttribute('class', 'cursor-pointer pointer-events-none btn-primary');
    var divButton = divClone.children[0].children[0]
    var divCloneButton = divButton.cloneNode(true);
    divCloneButton.setAttribute("id", "item" + id + "_buttonm")
    divCloneButton.setAttribute('class', 'cursor-pointer btn-secondary')
    divCloneButton.innerHTML = "-"

    //usuwanie diva z lewej strony
    divCloneButton.addEventListener('click', function (e) {
      document.getElementById("item" + id + "m").remove()
      document.getElementById("item" + id).style.background = "rgb(243 244 246)"
      document.getElementById("item" + id + "_button").setAttribute('class', 'cursor-pointer btn-primary');
      document.getElementById("item" + id + "_button").addEventListener('click', function () { quote(); }, { once: true });
    })

    //dodanie przerobionego diva na prawo
    div.style.background = "gray"
    divTitle.replaceWith(divCloneTitle);
    divContent.replaceWith(divCloneContent);
    divButton.replaceWith(divCloneButton);
    document.querySelectorAll('.here-add-quote').forEach(function (ele) {
      ele.appendChild(divClone);
    })
  }
}
)

