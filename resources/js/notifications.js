// jQuery way
$('.notification .delete').on('click', function(event){
    event.preventDefault();
    const button = $(this);
    const notification = button.closest('.notification');
    notification.addClass('is-hidden');
});

// vanila js way
// document.querySelectorAll('.notification .delete').forEach(item => {
//     item.addEventListener('click', event => {
//         event.preventDefault();
//         const button = event.target;
//         const notification = button.closest('.notification');
//         notification.classList.add('is-hidden');
//     });
// });
