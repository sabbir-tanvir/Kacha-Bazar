document.querySelector('.cart-btn').addEventListener('click', event => {
    Swal.fire({
      position: "center",
      icon: "success",
      title: "Add to cart succesfully",
      showConfirmButton: false,
      timer: 1500
    });
  });