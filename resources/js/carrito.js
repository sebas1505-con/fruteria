let carrito = JSON.parse(localStorage.getItem('carrito')) || {};
const cartCount = document.getElementById('cart-count');
const cartSidebar = document.getElementById('cart-sidebar');
const cartItemsList = document.getElementById('cart-items');
const totalDisplay = document.getElementById('total');

function agregarAlCarrito(nombre, precio) {
  if (carrito[nombre]) {
    carrito[nombre].cantidad++;
  } else {
    carrito[nombre] = { precio, cantidad: 1 };
  }
  actualizarCarrito();
  localStorage.setItem('carrito', JSON.stringify(carrito));
}

function eliminarDelCarrito(nombre) {
  delete carrito[nombre];
  actualizarCarrito();
  localStorage.setItem('carrito', JSON.stringify(carrito));
}

function actualizarCarrito() {
  cartItemsList.innerHTML = "";
  let total = 0;
  let count = 0;

  for (const [nombre, { precio, cantidad }] of Object.entries(carrito)) {
    const subtotal = precio * cantidad;
    total += subtotal;
    count += cantidad;

    const li = document.createElement("li");
    li.innerHTML = `
      ${nombre} × ${cantidad} = $${subtotal}
      <button class="btn-eliminar" onclick="eliminarDelCarrito('${nombre}')">🗑️</button>
    `;
    cartItemsList.appendChild(li);
  }

  totalDisplay.textContent = `$${total}`;
  cartCount.textContent = count;
}

document.getElementById('cart-btn').addEventListener('click', () => {
  cartSidebar.classList.add('visible');
});

document.getElementById('close-cart').addEventListener('click', () => {
  cartSidebar.classList.remove('visible');
});

document.getElementById('btn-finalizar').addEventListener('click', () => {
  localStorage.setItem('carrito', JSON.stringify(carrito));
  window.location.href = '{{"compra"}}';
});

actualizarCarrito();
