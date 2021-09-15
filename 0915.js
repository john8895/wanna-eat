document.querySelectorAll('.particle-table-row').forEach(item => {
    item.addEventListener('click', () => {
        alert(item);
        item.style.backgroundColor = '#ff0000';
    })
})