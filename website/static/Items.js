function calculateTotal() {
    var item = document.getElementById("item").value;
    var price = parseFloat(document.getElementById("price").value);
    var count = parseInt(document.getElementById("count").value);

    if (isNaN(price) || isNaN(count) || price <= 0 || count <= 0) {
        alert("Please enter valid price and count.");
        return;
    }

    var total = price * count;

    var outputList = document.getElementById("output-list");
    var listItem = document.createElement("li");
    listItem.textContent = `${item} - Total Price: $${total.toFixed(2)}`;
    outputList.appendChild(listItem);

    // Clear input fields after adding a row
    document.getElementById("item").value = "";
    document.getElementById("price").value = "";
    document.getElementById("count").value = "";
}
