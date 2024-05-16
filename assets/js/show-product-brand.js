// document.addEventListener('DOMContentLoaded', function () {
//     const brandsBottons = document.querySelectorAll('.item-phone');
//     const tabContentRows = document.querySelectorAll('.showbrand');

//     tabContentRows.forEach(row => {
//         row.classList.add('visible');
//     });

//     brandsBottons.forEach(button => {
//         button.addEventListener('click', () => {
//             const brand = button.dataset.brand;

//             brandsBottons.forEach(btn => btn.classList.remove('active'));

//             button.classList.add('active');

//             tabContentRows.forEach(row => {
//                 row.classList.remove('visible');
//             });

//             const selectedRow = document.querySelector('.showbrand.' + brand);
//             selectedRow.classList.add('visible');

//         });
//     });

//     function triggerTabFromURL() {
//         const urlParams = new URLSearchParams(window.location.search);
//         const brandFromURL = urlParams.get('tab');

//         if (brandFromURL) {
//             const correspondingButton = document.querySelector(`[data-brand="${brandFromURL}"]`);
//             if (correspondingButton) {
//                 correspondingButton.click();
//             }
//         }
//     }
//     triggerTabFromURL();
// });