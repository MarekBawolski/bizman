document.querySelectorAll('.new-quote-search').forEach(function (element){
  element.addEventListener('keyup', function () { searchFunction(); });

function searchFunction() {
    // Declare variables
    var input, filter, table, item, itemText, i, txtValue;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    table = document.getElementById("table");
    item = table.getElementsByClassName("item");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < item.length; i++) {
      itemText = item[i].getElementsByTagName("div")[1].getElementsByTagName("div")[0];
      if (itemText) {
        txtValue = itemText.textContent || itemText.innerText;
  
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          item[i].style.display = "";
        } else {
          item[i].style.display = "none";
        }
      }
    }
  }
}
)