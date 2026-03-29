const addModelBtn = document.getElementById('addModelBtn');
const modal = document.getElementById('addModelModal');
const closeModalBtn = document.getElementById('closeModalBtn');
const addStorageBtn = document.getElementById('addStorageBtn');
const storageContainer = document.getElementById('storageContainer');

// Open modal
addModelBtn.onclick = () => {
    modal.style.display = 'flex';
}

// Close modal
closeModalBtn.onclick = () => {
    modal.style.display = 'none';
}

// Add more storage rows
addStorageBtn.onclick = () => {
    const div = document.createElement('div');
    div.classList.add('storage-row');
    div.innerHTML = `
        <input type="text" name="storage[]" placeholder="128GB" required>
        Flawless: <input type="number" name="price_Flawless[]" required>
        Excellent: <input type="number" name="price_Excellent[]" required>
        Good: <input type="number" name="price_Good[]" required>
        As New: <input type="number" name="price_As_New[]" required>
    `;
    storageContainer.appendChild(div);
}

// Optional: close modal if user clicks outside the content
window.onclick = function(e) {
    if(e.target == modal){
        modal.style.display = 'none';
    }
}