
    const btnIncrement = document.querySelectorAll (".increment-button");
    const btnDecrement = document.querySelectorAll (".decrement-button");

    btnIncrement.forEach(btn => { btn.addEventListener ('click', function() {
        const input = this.parentElement.querySelector('.counter-input');
        let value = parseInt(input.value);
        input.value = value + 1;
    });
    });

    btnDecrement.forEach(btn => {
        btn.addEventListener('click', function () {
            const input = this.parentElement.querySelector('.counter-input');
            let value = parseInt(input.value);
            if (value > 1) {
                input.value = value - 1;
            }
        });
    });