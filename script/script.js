function myFunction() {
  alert("You clicked a cell!");
}

let cells = document.querySelectorAll("td");

cells.forEach(function(cell) {
  cell.addEventListener("click", myFunction);
});