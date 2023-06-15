var quantityInput = document.getElementById("quantity");
  
quantityInput.addEventListener("input", function() {
  var inputValue = this.value;
  var filteredValue = inputValue.replace(/[^0-9]/g, '');
  filteredValue = filteredValue.slice(0, 2);
  this.value = filteredValue;
});