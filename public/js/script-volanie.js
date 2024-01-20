document.getElementById("category-all").onclick = () => getCategoryProducts("all");
document.getElementById("category-tops").onclick = () => getCategoryProducts("tops");
document.getElementById("category-pants").onclick = () => getCategoryProducts("pants");
document.getElementById("category-jackets").onclick = () => getCategoryProducts("jackets");
document.getElementById("category-sneakers").onclick = () => getCategoryProducts("sneakers");
document.getElementById("category-accessories").onclick = () => getCategoryProducts("accessories");
async function getCategoryProducts(category) {
    let response = await fetch("?c=product&a=filter&category=" + category);
    let data = await response.json();
    let message = document.getElementById("message");

    if (typeof data === 'object' && data !== null && data.message === undefined) {
        message.textContent="";
        // Získaj referenciu na zoznam produktov
        let productsList = document.getElementById("products-wraper");

        // Vymaž existujúce produkty
        productsList.innerHTML = "";

        // Pre každý produkt v dátach
        data.forEach(product => {
            // Vytvor nový <li> element pre produkt
            let productItem = document.createElement("li");
            productItem.className = "product";

            // Vytvor obsah produktu
            productItem.innerHTML = `
                    <a href="?c=product&a=show&id=${product.id}"><img src="${'public/uploads/' + product.picture1}"></a>

                    <div class="product-info">
                        <div class="title">${product.title}</div>
                        <div class="price">${product.price}€</div>
                    </div>
                `;

            // Pridaj nový produkt do zoznamu
            productsList.appendChild(productItem);
        });
    } else {
        message.textContent=data.message;
    }
}