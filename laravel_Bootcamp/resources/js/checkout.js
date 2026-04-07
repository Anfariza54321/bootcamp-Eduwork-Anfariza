
    document.querySelectorAll('#dropdown-phone-3 button').forEach(item => {
        item.addEventListener('click', function() {
            
            const selectedContent = this.querySelector('span').innerHTML;
            
            const phoneCode = selectedContent.split('(')[1].split(')')[0];
            
            const svgIcon = this.querySelector('svg').outerHTML;

            
            const mainButton = document.getElementById('dropdown-phone-button-3');
            mainButton.innerHTML =
                `${svgIcon} ${phoneCode} <svg class="ms-2 h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/></svg>`;
        });
    });