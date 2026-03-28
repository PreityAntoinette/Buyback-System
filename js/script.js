// Store user selection
let data = {
    device: "",
    brand: "",
    model: "",
    storage: "",
};

// Hardcoded devices
const devices = ["Mobile Phone", "Laptop", "Tablet", "Smart Watch"];

// Fetch mobile data only
let mobilePrices = {};
fetch('getData.php') // returns data from mobile_iphone table
.then(res => res.json())
.then(json => {
    mobilePrices = json; // only mobile phone data
});

// Load device selection first
window.onload = function() {
    loadDevices();
};

// Load device buttons
function loadDevices() {
    const deviceDiv = document.getElementById('device-section');
    deviceDiv.innerHTML = ''; // clear in case anything exists

    const deviceIcons = {
        "Mobile Phone": "images/mobile.jpg",
        "Laptop": "images/laptop.png",
        "Tablet": "images/tablet.png",
        "Smart Watch": "images/watch.png"
    };

    devices.forEach(device => {
        let btn = document.createElement('button');
        btn.classList.add('device-btn');

        // Add image
        let img = document.createElement('img');
        img.src = deviceIcons[device];
        img.alt = device;
        img.classList.add('device-icon');

        btn.appendChild(img);
        btn.appendChild(document.createTextNode(device));

        btn.onclick = () => selectDevice(device);
        deviceDiv.appendChild(btn);
    });
}

// Handle device selection
function selectDevice(device) {
    data.device = device;

    if (device === "Mobile Phone") {
        document.getElementById('device-section').style.display = 'none';
        loadMobileBrands(); // Only mobile brands
        document.getElementById('brand-section').style.display = 'block';
    } else {
        alert(`You selected ${device}. Brand selection not available yet.`);
        // keep the first page visible so the user can choose again
    }
}

// Load mobile-specific brands dynamically
function loadMobileBrands(){
    const brandsDiv = document.getElementById('brands');
    brandsDiv.innerHTML = ''; // clear previous buttons

    for(let brand in mobilePrices){  // only mobile brands
        let btn = document.createElement('button');
        btn.innerText = brand;
        btn.onclick = () => selectMobileBrand(brand); // mobile-specific function
        brandsDiv.appendChild(btn);
    }
}

// Mobile brand → Mobile model
function selectMobileBrand(brand){
    data.brand = brand;
    document.getElementById('brand-section').style.display = 'none';

    const modelsDiv = document.getElementById('model-buttons');
    modelsDiv.innerHTML = '';

    for(let model in mobilePrices[brand]){
        let btn = document.createElement('button');
        btn.innerText = model;
        btn.onclick = () => selectMobileModel(model); // mobile-specific function
        modelsDiv.appendChild(btn);
    }

    document.getElementById('models').style.display = 'block';
}

// Mobile model → Mobile storage
function selectMobileModel(model){
    data.model = model;
    document.getElementById('models').style.display = 'none';

    const storageDiv = document.getElementById('storage-buttons');
    storageDiv.innerHTML = '';

    let storageOptions = Object.keys(mobilePrices[data.brand][model]);
    storageOptions.forEach(storage => {
        let btn = document.createElement('button');
        btn.innerText = storage;
        btn.onclick = () => selectMobileStorage(storage); // mobile-specific function
        storageDiv.appendChild(btn);
    });

    document.getElementById('storages').style.display = 'block';
}

// Mobile storage → Conditions
function selectMobileStorage(storage){
    data.storage = storage;
    document.getElementById('storages').style.display = 'none';

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

    document.getElementById('conditions').style.display = 'block';
}