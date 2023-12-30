// Define the global variable for Web3
let web3;
let contractIntanse;
let accounts;

const contractAbi = [
	{
		"inputs": [
			{
				"internalType": "uint256",
				"name": "_order_id",
				"type": "uint256"
			},
			{
				"internalType": "string",
				"name": "_hash",
				"type": "string"
			}
		],
		"name": "createOrder",
		"outputs": [],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [
			{
				"components": [
					{
						"internalType": "uint256",
						"name": "order_id",
						"type": "uint256"
					},
					{
						"internalType": "string",
						"name": "hash",
						"type": "string"
					}
				],
				"internalType": "struct Farmer.Order[]",
				"name": "orderArr",
				"type": "tuple[]"
			}
		],
		"name": "createOrders",
		"outputs": [],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "uint256",
				"name": "_order_id",
				"type": "uint256"
			}
		],
		"name": "getOrder",
		"outputs": [
			{
				"components": [
					{
						"internalType": "uint256",
						"name": "order_id",
						"type": "uint256"
					},
					{
						"internalType": "string",
						"name": "hash",
						"type": "string"
					}
				],
				"internalType": "struct Farmer.Order",
				"name": "",
				"type": "tuple"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "uint256[]",
				"name": "_ids",
				"type": "uint256[]"
			}
		],
		"name": "getOrderByIds",
		"outputs": [
			{
				"components": [
					{
						"internalType": "uint256",
						"name": "order_id",
						"type": "uint256"
					},
					{
						"internalType": "string",
						"name": "hash",
						"type": "string"
					}
				],
				"internalType": "struct Farmer.Order[]",
				"name": "",
				"type": "tuple[]"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "uint256",
				"name": "",
				"type": "uint256"
			}
		],
		"name": "orders",
		"outputs": [
			{
				"internalType": "uint256",
				"name": "order_id",
				"type": "uint256"
			},
			{
				"internalType": "string",
				"name": "hash",
				"type": "string"
			}
		],
		"stateMutability": "view",
		"type": "function"
	}
];
const contractAddress = "0x400f75bE4dd344161d913bDAef6BEEeCdd2a15DB"

async function connectToMetaMask() {
    if (window.ethereum) {
        try {
            await window.ethereum.request({ method: 'eth_requestAccounts' });
            web3 = new Web3(window.ethereum);
            accounts = await web3.eth.getAccounts();
            contractIntanse = new web3.eth.Contract(contractAbi, contractAddress);
            alert('Connected to MetaMask! Current account: ' + accounts[0]);

            // After successful connection, update the MetaMask account name
            updateMetaMaskAccountName(accounts[0]);
        } catch (error) {
            alert('Connection to MetaMask failed: ' + error.message);
        }
    } else {
        alert('Please install MetaMask to use this feature');
    }
}

async function connectToMetaMaskHide() {
    if (window.ethereum) {
        await window.ethereum.request({ method: 'eth_requestAccounts' });
        web3 = new Web3(window.ethereum);
        accounts = await web3.eth.getAccounts();
        contractIntanse = new web3.eth.Contract(contractAbi, contractAddress);
    }
}

function updateMetaMaskAccountName(account) {
    var tenViMetaMark = document.getElementById('tenViMetaMark');
    if (tenViMetaMark) {
        // Update the content of the element with the MetaMask account name
        tenViMetaMark.textContent = 'Ví ' + account; // You can customize the display as needed
    }
}

function isMetaMaskConnected() {
    if (web3) {
        console.log('MetaMask đã kết nối');
        return true;
    } else {
        console.log('MetaMask chưa kết nối');
        return false;
    }
}

async function createOrders(contractDataArr){
    const result = await contractIntanse.methods.createOrders(contractDataArr).send({ from: accounts[0] });
    console.log(result);
}

async function getOrderByIds(ids){
    const results = await contractIntanse.methods.getOrderByIds(ids).call();
    return results.map(order => ({
		id: order.order_id,
		hash: order.hash,
	}));
}