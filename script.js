// Latihan 1: Mengubah teks heading setelah halaman dimuat
window.onload = function() {
    document.querySelector('h1').innerText = "Latihan JavaScript Selesai";
};

// Latihan 2: Variabel dan Tipe Data
let name = "John";
const age = 30;
document.getElementById("output").innerHTML += `<p>Nama: ${name}, Umur: ${age}</p>`;

let fruits = ["Apple", "Banana", "Mango"];
fruits.forEach(function(fruit) {
    document.getElementById("output").innerHTML += `<p>Buah: ${fruit}</p>`;
});

let person = {
    firstName: "John",
    lastName: "Doe",
    age: 30
};
document.getElementById("output").innerHTML += `<p>Nama Lengkap: ${person.firstName} ${person.lastName}</p>`;

// Latihan 3: Pengendalian Alur
function checkValue() {
    let value = document.getElementById("userInput").value;
    if (value > 10) {
        document.getElementById("output").innerHTML += "<p>Nilai lebih besar dari 10</p>";
    } else if (value == 10) {
        document.getElementById("output").innerHTML += "<p>Nilai sama dengan 10</p>";
    } else {
        document.getElementById("output").innerHTML += "<p>Nilai kurang dari 10</p>";
    }
    for (let i = 1; i <= value; i++) {
        document.getElementById("output").innerHTML += `<p>Angka: ${i}</p>`;
    }
}

// Latihan 4: Fungsi dalam JavaScript
function greet(name) {
    return `Hello, ${name}`;
}
document.getElementById("output").innerHTML += `<p>${greet('Alice')}</p>`;
document.getElementById("output").innerHTML += `<p>${greet('Bob')}</p>`;

function calculateSquare(number) {
    return number * number;
}
document.getElementById("output").innerHTML += `<p>Kuadrat dari 4: ${calculateSquare(4)}</p>`;
document.getElementById("output").innerHTML += `<p>Kuadrat dari 5: ${calculateSquare(5)}</p>`;

const sum = (a, b) => a + b;
document.getElementById("output").innerHTML += `<p>Jumlah 5 + 3: ${sum(5, 3)}</p>`;

// Latihan 5: Manipulasi Array dan Objek
let students = ["Alice", "Bob", "Charlie"];
students.push("David");
students.forEach(function(student) {
    document.getElementById("output").innerHTML += `<p>Nama Siswa: ${student}</p>`;
});

let car = {
    brand: "Toyota",
    model: "Corolla",
    year: 2020
};
for (let prop in car) {
    document.getElementById("output").innerHTML += `<p>${prop}: ${car[prop]}</p>`;
}

let cars = [
    {brand: "Toyota", model: "Corolla", year: 2020},
    {brand: "Honda", model: "Civic", year: 2021},
    {brand: "Ford", model: "Focus", year: 2019}
];
cars.forEach(function(car) {
    document.getElementById("output").innerHTML += `<p>${car.brand} ${car.model}, ${car.year}</p>`;
});
