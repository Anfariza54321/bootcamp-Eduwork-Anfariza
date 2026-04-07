
window.togglePaymentModal = function() {
    const modal = document.getElementById('payment-modal');
    if (modal) {
        modal.classList.toggle('hidden');
        modal.classList.toggle('flex');
        document.body.style.overflow = modal.classList.contains('hidden') ? 'auto' : 'hidden';
    }
};

document.addEventListener('DOMContentLoaded', function() {
    const orderForm = document.getElementById('final-order-form');
    if (orderForm) {
        orderForm.addEventListener('submit', function(e) {
            console.log("Form sedang dikirim ke: " + this.action);
        });
    }
});

window.addEventListener('click', function(event) {
    const paymentModal = document.getElementById('payment-modal');
    const productModal = document.getElementById('product-modal');

    if (event.target == paymentModal) {
        window.togglePaymentModal();
    }
    
    if (event.target == productModal) {
        if (typeof window.closeModal === 'function') {
            window.closeModal();
        }
    }
});