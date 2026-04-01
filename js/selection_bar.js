function updateSelectionBar() {
    const bar = document.getElementById('selection-bar');
    bar.innerHTML = '';

    for (let key in data) {
        if (data[key]) {
            let item = document.createElement('div');
            item.classList.add('selection-item');

            item.innerHTML = `
                ${data[key]} 
                <span onclick="removeSelection('${key}')">✕</span>
            `;

            bar.appendChild(item);
        }
    }
}

function removeSelection(level) {

    if (level === 'device') {
        data = { device: "", brand: "", model: "", storage: "" };

        showSection('device-section');

    } else if (level === 'brand') {
        data.brand = "";
        data.model = "";
        data.storage = "";

        showSection('brand-section');

    } else if (level === 'model') {
        data.model = "";
        data.storage = "";

        showSection('models');

    } else if (level === 'storage') {
        data.storage = "";

        showSection('storages');
    }

    updateSelectionBar();
}

function showSection(sectionId) {
    document.getElementById('device-section').style.display = 'none';
    document.getElementById('brand-section').style.display = 'none';
    document.getElementById('models').style.display = 'none';
    document.getElementById('storages').style.display = 'none';
    document.getElementById('conditions').style.display = 'none';

    // ✅ FIX HERE
    if (sectionId === 'device-section') {
        document.getElementById(sectionId).style.display = 'flex';
    } else {
        document.getElementById(sectionId).style.display = 'block';
    }
}

function selectDevice(device) {
    data.device = device;
    updateSelectionBar();

    if (device === "Mobile Phone") {
        showSection('brand-section');
        loadMobileBrands();
    }
}


function selectMobileBrand(brand){
    data.brand = brand;
    updateSelectionBar();

    showSection('models');

    const modelsDiv = document.getElementById('model-buttons');
    modelsDiv.innerHTML = '';

    for(let model in mobilePrices[brand]){
        let btn = document.createElement('button');
        btn.innerText = model;
        btn.onclick = () => selectMobileModel(model);
        modelsDiv.appendChild(btn);
    }
}

function selectMobileModel(model){
    data.model = model;
    updateSelectionBar();

    showSection('storages');

    const storageDiv = document.getElementById('storage-buttons');
    storageDiv.innerHTML = '';

    let storageOptions = Object.keys(mobilePrices[data.brand][model]);
    storageOptions.forEach(storage => {
        let btn = document.createElement('button');
        btn.innerText = storage;
        btn.onclick = () => selectMobileStorage(storage);
        storageDiv.appendChild(btn);
    });
}

function selectMobileStorage(storage){
    data.storage = storage;
    updateSelectionBar();

    showSection('conditions');

    const condDiv = document.getElementById('condition-list');
    condDiv.innerHTML = '';

    let conditions = mobilePrices[data.brand][data.model][storage];

    const conditionDesc = {
        "Flawless": "No scratch or dents",
        "Excellent": "With small scratch or dents",
        "Good": "With many scratches or dents",
        "As New": "Brand new"
    };

    for(let cond in conditions){
        let div = document.createElement('div');
        div.innerHTML = `<strong>${cond}</strong> - ${conditionDesc[cond] || ""} - $${conditions[cond]}`;
        condDiv.appendChild(div);
    }
}