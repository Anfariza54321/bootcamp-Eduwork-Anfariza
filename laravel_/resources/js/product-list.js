

    window.toggleDropdown = function(menuId) {
        const menu = document.getElementById(menuId);
        menu.classList.toggle('hidden');
    }


    window.onclick = function(event) {
        if (event.target.matches('button')) {
            return; // klik di tombol tetap buka menu yg sesuai
        }

        // Jika klik di dalam salah satu menu category / sort, jangan tutup
        if (event.target.closest('#menuCheckbox') || event.target.closest('#categoryMenu')) {
            return;
        }

        const dropdowns = [document.getElementById('menuCheckbox'), document.getElementById('categoryMenu')];
        dropdowns.forEach((dropdown) => {
            if (dropdown && !dropdown.classList.contains('hidden')) {
                dropdown.classList.add('hidden');
            }
        });
    }

    window.toggleMenu = function(menuId) {
        const menu = document.getElementById(menuId);
        if (menu) {
            menu.classList.toggle('hidden');
        }
    }
