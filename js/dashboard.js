let asset = document.getElementById('asset-form');
let liabilities = document.getElementById('liabilities-form');

let newAsset = document.getElementById('new-asset');
let newLiability = document.getElementById('new-liability');

let addAsset = document.getElementById('add-asset');
let addLiability = document.getElementById('add-liability');


const addElement = (type) => {
    let newBlock = document.createElement('div');
    let newLabel = document.createElement('label');
    let newInput = document.createElement('input');
    newInput.classList.add('form-control');
    newInput.type = 'number';
    newInput.placeholder = '0 NGN';
    newBlock.classList.add('form-group');
    if(type === 'Asset'){
        newLabel.textContent = newAsset.value;
        newBlock.appendChild(newLabel);
        newBlock.appendChild(newInput);
        asset.appendChild(newBlock);    
    }   
}
addAsset.addEventListener('click', () => addElement('Asset'));

const addLiab = (type) => {
    let newBlock = document.createElement('div');
    let newLabel = document.createElement('label');
    let newInput = document.createElement('input');
    newInput.classList.add('form-control');
    newInput.type = 'number';
    newInput.name = 'liability[]';
    newInput.placeholder = '0 NGN';
    newBlock.classList.add('form-group');
    if(type === 'Liability'){
        newLabel.textContent = newLiability.value;
        newBlock.appendChild(newLabel);
        newBlock.appendChild(newInput);
        liabilities.appendChild(newBlock);
        console.log(newBlock);
    }
}
addLiability.addEventListener('click', () => addLiab('Liability'));




