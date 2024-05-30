const openModal = document.querySelector('.btn');
const modal = document.querySelector('.modal');
const closeModal = document.querySelector('.modal_close');

openModal.addEventListener('click', (e)=>{
    e.preventDefault();
    modal.classList.add('modal--show');
});

closeModal.addEventListener('click', (e)=>{
    e.preventDefault();
    modal.classList.remove('modal--show');
});

function confirmDelete(){
    return confirm('Estas seguro de borrar el registro');
}

function confirmUpdate(){
    return confirm('Estas seguro de actualizar');
}

//filtro de busqueda

document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const table = document.querySelector('table');
    const rows = table.querySelectorAll('tbody tr');

    searchInput.addEventListener('keyup', function(){
        const query = searchInput.value.tolowerCase();

        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            let match = false;

            cells.forEach(cell => {
                if (cell.textContent.toLowerCase().includes(query)) {
                    match = true;
                }
            });

            if (match) {
                row.style.display = '';
            }else{
                row.style.display = 'none';
            }
        })
    })
})