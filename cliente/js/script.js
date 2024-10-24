//---Funcionalidades del buscador---
function searchProducts() {
    let input = document.getElementById('searchInput').value.toLowerCase();
    let products = document.getElementsByClassName('repuesto');
    
    for (let i = 0; i < products.length; i++) {
        let productName = products[i].getElementsByTagName('p')[0].textContent.toLowerCase();
        
        if (productName.includes(input)) {
            products[i].style.display = ""; // Mostrar el producto
        } else {
            products[i].style.display = "none"; // Ocultar el producto
        }
    }
}