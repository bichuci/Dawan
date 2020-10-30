/** La déclaration des Variables */

    // Avant ES6 on utilisait
    var prenom = "Aurelien";  // ancienne méthode, déclare les variables avec un scope élargit (global)

    // Aprés ES6 on utilise
    let nom = "Walter"; // On déclare une variable avec un scope restreint

    // constante
    const CAFE = "Arabica";

 

    console.log(prenom, nom, CAFE);


/* Le typage des variables 
* [ Primitif ]
* int => entier 
* float => chiffre a virgule, 2 aprés la virgule
* bool/boolean => true, false / 1, 0
*
* [ Référence ]
* string => chaînes de caractères
* Array => tableaux de valeurs
* Objet => Programmation orienté objet
* JSon => Fichier Json
*/

/**
 *  Les opérateurs
 *  -> Mathématique
 *      => +, -, /, %, (pow)
 *  
 *  -> Logique
 *      => ! (non, différent)
 *      => && ( et) , || (ou), ^ (ou exclusif binaire)
 *   
 *  -> incrémentation 
 *      => ++, --, +=, -=
 * 
 *  -> Comparatif
 *      => <, >, <=, >=
 *      => ==, != ( vérifie la valeur )
 *      => ===, !== ( vérifie la valeur ainsi que le type )
 * 
 * 
*
*/
console.log("l'aventure de : "+ prenom +" commence!");

// Math.pow() permet de calculer la puissance d'un nombre
console.log("Math.pow(2,3) = "+ Math.pow(2,3), "2**3 = " + (2**3));

let x = 10;
console.log(++x); // 11; J'incrémente avant l'affichage
console.log(x++); // 11; J'affiche avant l'incrémentation

let y;

// Les types de conditions
// IF
if(!y)
{
    console.log("La variable n'existe pas ou à pour valeur 'false'");
}

let z ="12";
console.log(z == 12); // == > Compare uniquement la valeur 
console.log( z === 12); // === > Compare la valeur et le type de la variable

// Template littéral (on utilise les batyscaphes), permet d'apeller des fonctions, faire des calculs etc... (interprétation de chaines)
let template = ` x = ${x}; 1+2 = ${1+2}`;
console.log(template);   

// Les tableaux
// let tableau = new Arrray("Peugeot", "Citroën", "Ford", Renault);
nom = "Walter";
prenom = "Aurelien";
age = 27;

let tableau = [nom, prenom, age];

/* Boucles de parcours  */
// Boucle for
console.log(` ------------ Boucle for ------------ `);
for(i = 0; i < tableau.length; i++)
{
    console.log(tableau[i]);
}

// Boucle for in
console.log(` ------------ Boucle for in ------------ `);
for(index in tableau)
{
    console.log(`L'index : ${index} ; ${tableau[index]}`)
}

// Boucle for of
console.log(` ------------ Boucle for of ------------ `);
for(value of tableau)
{
    console.log(value)
}

// .entries
console.log(` ------------ entries() ------------ `);
for(let entry of tableau.entries())
{
    console.log(entry)
}

console.log(` ------------ entries() retournant l'index et la valeur ------------ `);
for([index, value] of tableau.entries())
{
    console.log(` tableau[${index}] = ${value}`)
}

console.log(` ------------ forEach() ------------ `);
// Boucle foreach
tableau.forEach(function(value, index){
    console.log(`cars[${index}] = ${value}`);
}); // => Meme rendu que le for
console.log(`La première valeur de mon tableau est : "${tableau[0]}", la dernière valeur de mon tableau est : "${tableau[tableau.length-1]}"`);

// Ajouter une valeur à un tableau 
console.log(` ------------ Ajouter une valeur à un tableau  ------------ `);
console.log(`Sans le push `);
let yeux = "Vert";
tableau[tableau.length] = yeux;

console.log(`Avec le push `);
let cheveux = "Brun";
tableau.push(cheveux);
console.log(tableau);

// Supprimer une valeur à un tableau 
console.log(` ------------ Supprimer une valeur d'un tableau  ------------ `);
console.log(`Avec la méthode pop()`);
let lastExtract = tableau.pop();
console.log(`${lastExtract} a été retiré du tableau `);
console.log(tableau);

console.log(`Avec la méthode shift()`);
let firstExtract = tableau.shift();
console.log(`${firstExtract} a été retiré du tableau `);
console.log(tableau);

console.log(`Avec la méthode splice()`);
// splice(index, valeur x a supprimer) permet de supprimer a partir de l'index choisi autant de valeur x que choisi
let taille = 175;
let poids = 68;
tableau.push(taille, poids);
console.log(tableau);
let middleExtract = tableau.splice(2,2);
console.log(`${middleExtract} ont été retiré du tableau`);
console.log(tableau);

// Methode replace()
console.log(` ------------ Remplacer une valeur d'un tableau  ------------ `);
let replace = tableau.splice(tableau.indexOf(2), 2, "Walter", "Lille");
console.log(tableau); 
console.log(replace);

tableau.splice(tableau.indexOf("Walter"), 0, replace[0], lastExtract, firstExtract);
console.log(tableau);

// Jointure des tableaux / Séparation de chaîne de caractère
// Join
console.log(` ------------ Join  ------------ `);
let chaine = tableau.join(";");
console.log(chaine);

// Split
console.log(chaine.split(";")); 

// Sort et Reverse
tableau.reverse();
console.log(tableau);

tableau.sort().reverse();
console.log(tableau);

tableau.forEach(function(value, index){
    console.log(`cars[${index}] = ${value}`);
}); 

// Recherche => find()
console.log(` ------------ Recherche avec .find()  ------------ `);
console.log("Recherche avec .find()", tableau.find(function(value){
    return `Lille` === value;
}));

console.log(` ------------ Recherche avec .findIndex()  ------------ `);
console.log("Recherche avec .findIndex()", tableau.findIndex(function(value){
    return `Lille` === value;
}));

// Permet de choisir une valeur de la transférer dans un tableau SANS SUPPRIMER la valeur du tableau duquel elle est tirée
console.log(` ------------ Les filtres  ------------ `);
console.log("Recherche avec .filter()", tableau.filter(function(value){
    return `Walter` === value;
}));

console.log(` ------------ Mapping entre tableaux  ------------ `);
let numbers = [1, 2, 3, 4, 5];

let newNumbers = numbers.map(function(value){
    // J'applique cette fonctionnalité a chaque valeur du tableau
    return  `${value}*10 = ${value*10};`
});
console.log(newNumbers, numbers)

console.log(` ------------ Opérateur arrow  ------------ `);
/**
 * let newNumbers = numbers.map((value) =>{
    // J'applique cette fonctionnalité a chaque valeur du tableau
    return  `${value}*10 = ${value*10};`
});
 */

console.log(numbers.map((value, index) => { // On utilise cette méthode lorsqu'on a plusieurs valeurs de callback
    return index = value*10;
}));

console.log(numbers.map(value=> { // On peut réduire la méthode, uniquement si il n'y a qu'une valeur de call back
    return value*10;
}));

console.log(numbers.map(value=>`${value} : ${3*10}`)); // Cas rare mais équivalent aux deux autres au dessus

console.log(` ------------ Les conséquences  ------------ `);
// On déclare un objet
let monObjet = {
    numbers : [1,2,3], 
    // Méthode de mon objet, je dois l'apeller pour afficher
    forEach: function(){
        let _this = this;
        this.numbers.forEach(function(value){
            console.log(this);
            console.log(_this);
        });
    },
    forEach2: function(){
        this.numbers.forEach((value) =>{
            console.log(this);
        });
    }
};

monObjet.forEach();
console.log("forEach2 avec l'opérateur arrow")
monObjet.forEach2();











