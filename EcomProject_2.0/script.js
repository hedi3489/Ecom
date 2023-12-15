document.querySelectorAll('.addToCartBtn').forEach(button => {
    button.addEventListener('click', function() {
      var productId = this.getAttribute('data-product-id');
      fetch('addToCart.php', {
        method: 'POST',
        body: JSON.stringify({ productId: productId }),
        headers: {
          'Content-Type': 'application/json'
        }
      });
    });
  });