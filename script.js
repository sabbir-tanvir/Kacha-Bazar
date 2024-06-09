var textWrapper = document.querySelector('.ml6 .letters');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({ loop: true })
  .add({
    targets: '.ml6 .letter',
    translateY: ["1.1em", 0],
    translateZ: 0,
    duration: 750,
    delay: (el, i) => 50 * i
  }).add({
    targets: '.ml6',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });

let cart = [];

// Function to render cart items
function renderCart() {
  const cartContainer = document.querySelector('.cart__item_list');
  const totalCostElement = document.querySelector('.total__cost');
  let totalCost = 0;
  cartContainer.innerHTML = '';

  cart.forEach(item => {
    totalCost += item.price * item.quantity;
    const cartItem = document.createElement('div');
    cartItem.classList.add('cart-item');
    cartItem.innerHTML = `
              <img src="images/${item.image}" alt="${item.name}" />
              <strong>${item.name}</strong>
              <span class="quantity">
                  <button class="decrement-btn" data-name="${item.name}">-</button>
                  ${item.quantity}
                  <button class="increment-btn" data-name="${item.name}">+</button>
              </span>
              <span class="price">${item.price} TK</span>
              <button class="remove-btn" data-name="${item.name}">Remove</button>
          `;
    cartContainer.appendChild(cartItem);
  });

  totalCostElement.textContent = totalCost;
}

// Function to handle add to cart
function addToCart(event) {
  const button = event.target;
  const name = button.dataset.name;
  const price = parseInt(button.dataset.price);
  const image = button.dataset.image; // Get the image data

  const existingItem = cart.find(item => item.name === name);
  if (existingItem) {
    existingItem.quantity++;
  } else {
    cart.push({ name, price, image, quantity: 1 }); // Include the image data
  }

  renderCart();
  updateCartCounter();
}

// Function to handle incrementing quantity
function incrementQuantity(event) {
  const name = event.target.dataset.name;
  const item = cart.find(item => item.name === name);
  if (item) {
    item.quantity++;
    renderCart();
    updateCartCounter();
  }
}

// Function to handle decrementing quantity
function decrementQuantity(event) {
  const name = event.target.dataset.name;
  const item = cart.find(item => item.name === name);
  if (item && item.quantity > 1) {
    item.quantity--;
    renderCart();
    updateCartCounter();
  }
}

// Function to handle remove from cart
function removeFromCart(event) {
  const name = event.target.dataset.name;
  cart = cart.filter(item => item.name !== name);
  renderCart();
  updateCartCounter();
}

// Function to update cart counter
function updateCartCounter() {
  const totalCounter = document.getElementById('total_counter');
  const cartCounter = document.querySelector('.cart__counter span');
  const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
  totalCounter.textContent = totalItems;
  cartCounter.textContent = totalItems;
}

// Toggle cart visibility
document.querySelector('.cart__counter').addEventListener('click', (event) => {
  event.preventDefault();
  document.querySelector('.cart__items').classList.toggle('active');
});

// Event listeners
document.querySelectorAll('.btn__add__to__cart').forEach(button => {
  button.addEventListener('click', addToCart);
});

document.querySelector('.cart__items').addEventListener('click', event => {
  if (event.target.classList.contains('remove-btn')) {
    removeFromCart(event);
  } else if (event.target.classList.contains('increment-btn')) {
    incrementQuantity(event);
  } else if (event.target.classList.contains('decrement-btn')) {
    decrementQuantity(event);
  }
});

document.querySelector('.check_out_btn').addEventListener('click', event => {
  window.alert("Checkout successfully completed");
});

// Initialize cart on page load
renderCart();
updateCartCounter();


