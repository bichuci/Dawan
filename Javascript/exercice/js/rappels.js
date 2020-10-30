/*  variables */

var prenom = null; //ancienne méthode, déclare les variables avec un scope élargi (global)
let nom = "Durand"; // déclare les avariables avec un scope restreint

console.log(nom);

// constante 
const CAFE = "Arabica";

for(let i = 0; i < 10; i +=2 ){
    console.log(i);
}

/**
 * 
 * Typage
 * [Primitif]
 * int   => entier
 * float => décimale 
 * bool / boolean : true / false => 1 / 0
 * [Référence]
 * string
 * Array 
 * Objet 
 * JSon 
 * 
 */

 /**
  * Opérateurs :
  * Mathématiques => + - * / % ** (pow)
  * logique       => ! (non)  && (et) || (ou) ^ (ou exclusif binaire) 
  * incrémantation => ++ -- +=  -=
  * comparatif => < > <= >= == != (commun) === !== 
  * "12" == 12 => vrai
  * "12" === 12 => faux
  */

  console.log("Math.pow(2,3) = " + Math.pow(2,3), " 2**3 = " + (2**3));

  let x = 9;
  console.log(++x); // 11; j'incrémente avant l'affichage
  console.log(x++); // 11; j'affiche avant l'incrémentation

  let y = null;

  if(!y){
    console.log("la variable n'existe pas ou a pour valeur false");
  }

let z = "12";
console.log(z == 12);
console.log(z === 12);

let template = `x = ${x}; 1 + 2 = ${1+2}`;
console.log(template);

//Array 
// let cars = new Array("Peugeot", "Citroën", "Ford", "Renault");
// Récemment
let cars = ["Peugeot", "Citroën", "Ford", "Renault"];
console.log(cars);

console.log(`Mon tableau cars contient ${cars.length} valeurs`);

console.log(`La première valeur de mon tableau : ${cars[0]}, la dernière :  ${cars[cars.length-1]}`);

//boucles de parcours (par exemple pour les tableaux)

console.log(`------------- boucle for ------------`);
for(let i = 0; i < cars.length; i++){
    console.log(`cars[${i}] : ${cars[i]}`);
}

console.log(`------------- boucle for in ------------`);
for(index in cars){
    console.log(`cars[${index}] : ${cars[index]}`);
}

console.log(`------------- boucle for of ------------`);
for(value of cars){
    console.log(value);
}

// .entries
console.log(`------------- entries() ------------`);
for(let entrie of cars.entries()){
    console.log(entrie);
}

console.log(`------------- entries() ------------`);
for([index, value] of cars.entries()){
    console.log(`cars[${index}] = ${value}`);
}

console.log(`------------- forEach() ------------`);
cars.forEach(function(value, index){
    console.log(`cars[${index}] = ${value}`);
});

//ajouter une valeur dans un tableau

cars[cars.length] = "Hyundai";
cars.push("Seat");
cars.push("Fiat", "Toyota");

console.log(cars);

//supprimer des valeurs
let lastExtract = cars.pop();
console.log(` ${lastExtract} a été retiré de cars`);
console.log(cars);

let firstExtract = cars.shift();
console.log(` ${firstExtract} a été retiré de cars`);
console.log(cars);
/*
cars.shift();
console.log(cars);
*/

//remplacer
let replaced = cars.splice(cars.indexOf("Ford"), 1, "Alpine", 1);
console.log(cars);
console.log(replaced);

cars.splice(cars.indexOf("Alpine"), 0, replaced[0], lastExtract, firstExtract, "Alpine");
console.log(cars);

/*cars.push(replaced[0], lastExtract, firstExtract);
console.log(cars);*/

// jointure de tableau / séparation de chaîne de caractère
//join
let chaine = cars.join(";");
console.log(chaine);

chaine += ` et plein d'autres       ah ah ah`;

console.log(chaine.split(""));

cars.sort().reverse();

console.log(cars)

cars.forEach(function(value, index){
    console.log(`cars[${index}] = ${value}`);
});

//recherche
console.log("Recherche avec .find() ", cars.find(function(value){
    return `Alpine` === value;
}));

//recherche
console.log("Recherche avec .findIndex() ", cars.findIndex(function(value){
    return `Alpine` === value;
}));

//recherche
console.log("Recherche avec .filter() ", cars.filter(function(value){
    return `Alpine` === value;
}));

let numbers = [1, 2, 3, 4, 5];

let newNumbers = numbers.map(function(value){
    return value*10;
});

console.log(numbers, newNumbers);

console.log(numbers.map((value)=>{
    return value*10;
}));

console.log(numbers.map(value=>{
    return value*10;
}));

console.log(numbers.map(value=>value*10));

//exemple des conséquences

let monObjet = {
    numbers: [1,2,3],
    forEach: function(){
        let _this = this;
        this.numbers.forEach(function(value){
            console.log(this);
            console.log(_this);
        });
    },
    forEach2: function(){
        this.numbers.forEach((value)=>{
            console.log(this);
        });
    }
};

monObjet.forEach();
console.log("forEach2 avec l'opérateur arrow");
monObjet.forEach2();
console.log(monObjet.numbers[2]);

/* Décomposition, ou un autre mode d'assignation des données */
// objet
let obj = {
    nom: "Doe",
    prenom: "John"
};

console.log(obj, `Hello ${obj.prenom} ${obj.nom}`);

// Destructuration
let list = [1, 2, 3, 4];

let [a, b, c] = list;

console.log(`a = ${a}, b = ${b}, c = ${c}`);

let [d, , f, g] = list;

console.log(`d = ${d}, f = ${f}, g = ${g}`);

let [h, i, j, k = 0, l = 5, m] = list;

console.log(`h = ${h}, i = ${i}, j = ${j}, k = ${k}, l = ${l}, m = ${m}`);

console.log(list);

// Destructuration objet.

let objet2 = {
    lastName: "Bond", 
    firstName: "James", 
    job: "MI6 Agent",
    helloJames: function() {
        console.log(`Hello James`);
    }
};

let {lastName, firstName, job, helloJames} = objet2;

console.log(`lastName : ${lastName}, firstName : ${firstName}, job : ${job}`);
helloJames();

let number1 = 10, number2 = 72;

console.log(`Avant, number1 = ${number1}, number2 = ${number2}`);

[number1, number2] = [number2, number1];

console.log(`Après, number1 = ${number1}, number2 = ${number2}`);

/** 
 * fonctions et méthodes 
 * Fonction : retourne des données
 * 
 * Méthode : ne retourne pas de données
 * 
 * */

function somme(a, b = 1){
    return a + b;
}

let res1 = somme(1,2);

let res2 = somme(1);

console.log(`res1 : ${res1}, res2 : ${res2}`);

// Rest parameter => opérateur ... => opérateur variadique
//values => ta bleau; values peut accueillir 
//autant de paramètre que l'on souhaite
// ATTENTION : l'opérateur variadique doit obligatoirement être défini
// en dernier dans la liste des variables de la fonction

function addition(...values){
    let result = 0;
    for(let value of values){
        result += value;
    }
    return result;
}

console.log(`1+2+3+4+5+6+7+8+9 = ${addition(1,2,3,4,5,6,7,8,9)}`);

// fonctions anonyme

let maFonction = function(name = null){
    // let value = (condition) ? si vrai : si faux;
    /*
    if(condition){
        si vrai
    }else{
        si faux
    }
    */
    return "Hello " + ((null === name) ? "world":name ) ;
}

console.log(maFonction());
console.log(maFonction("James"));

// fonction auto exécutée -> (ma_fonction_a_executer(params){})(params);

( () => {
    console.table([1,2,3,4,5]);
} )();

/* Manipulation du DOM Document Object Model */

window.addEventListener("DOMContentLoaded", function(){
    console.log("Le DOM est chargé");
    /*document.getElementById("clickMe")*/
    document.querySelector("#clickMe").addEventListener("click", () => {
        console.log("un paragrahpe a été cliqué");
    });

    document.querySelectorAll("p").forEach( (p) => {
        console.log(p.innerText);
        //console.log(p.classList);
        //p.style.color = "red";
    } );

});