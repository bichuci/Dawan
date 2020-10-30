function loaded (callable){
    document.addEventListener("DOMContentLoaded", callable);
}

// Correspond au sélecteur $ de jquery, retourne querySelector
function $(selector){
    return document.querySelector(selector)
}

// Correspond au sélecteur $ de jquery, retourne querySelectorAll
function $$(selector){
    return document.querySelectorAll(selector)
}


function connectXhr(){
    let xhr = null; 
    if(window.XMLHttpRequest || window.ActiveXObject){
        if(window.ActiveXObject){
            try{
                xhr = new ActiveXObject("Msxml2.XMLHTTP"); 
            }catch(e){
                xhr = new ActiveXObject("Microsoft.XMLHTTP"); 
            } 
        }else{
            xhr = new XMLHttpRequest();
        }
    }else{
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return;
    }
    return xhr;
}


let colorNow ="bg-danger"

function afficherEmails(emails)
{
    let html = "";
    for(email of emails)
    {
        html += `<tr>`
        html += `<td><input type = "checkbox" id="idEmail-${email.id}" /></td>`
        html += `<td>${email.sender}</td> <td>${email.title}</td> <td><button class="btn btn-info"><a style="color:white; text-decoration:none;" href="">Read</a></button></td>`
        html += `</tr>`
    }
    return html;
}


function tabUsers(users){
    let html = "";
    for(user of users){
        //html += `<tr>`;
        html += `<tr `;
        html += `onclick="pinPointUser('${user.address.geo.lat}', '${user.address.geo.lng}', 'map')" `;
        //html += `data-lat="${user.address.geo.lat}" data-lng="${user.address.geo.lng}"`;
        html += `>`;
        html += `<td>${user.id}</td>`;
        html += `<td>${user.name}</td>`;
        html += `<td>${user.username}</td>`;
        html += `</tr>`;
    }
    return html;
}


let lat = 50.637380;
let lon = 3.062568;
let macarte = null;
// Fonction d'initialisation de la carte
function initMap(lat, lon, macarte) {
    // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
    macarte = L.map('map').setView([lat, lon], 10);
    // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        // Il est toujours bien de laisser le lien vers la source des données
        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        minZoom: 1,
        maxZoom: 20
    }).addTo(macarte);
}

function pinPointUser(lat, lon, macarteid){
    map.remove(macarte);
    $("#pinPoint").innerHTML = `<div id="map"></div>`;
    initMap(lat, lon, macarteid);
}

/// RECHERCHE DYNAMIQUE
function resSearch(results, search){
    let html = "";
    html += `<table class="table table-dark table-bordered"><tr>`;
    html += `<thead><tr><th>Ville</th><th>Code Postal</th></tr>`
    // search LIKE result.ville+"%" en Sql
    for(result of results)
    {
        if (result.ville.includes(search) || result.codepostal.includes(search))
        {
            html += `<tr><td>${result.ville}</td><td>${result.codepostal}</td></tr>`;
        }
    }
    html += `</thead>`
    html += `</table>`
    $("#divSearchResult").innerHTML = html;
}


loaded(function(){
    console.log("DOM chargé");
    // console.log($("p")); on test si jquery chargé pour bootstrap ne bug pas avec notre déclaration de function $
    // console.log($$('p'));

    // On appelle le querySelectorAll via la function $$
    $$("#dataColor p").forEach(function(paragraph){
            //console.log(paragraph.dataset.color);
            paragraph.addEventListener("click", function(){
                // this = paragraphe
                //console.log(this.dataset.color);
            if(this.style.color == "" || this.style.color == "black")
            {
                this.style.color = this.dataset.color; // Permet de colorer le paragraph quand on clique dessus
                this.style.fontWeight = "bold";
            }
            else
            {
                this.style.color ="black"
                this.style.fontWeight =" normal"
            }
        });
    });


    // Le Puissance 4

    $$("#p4 th").forEach(function(tableCol){
        let coord = 0;
        let cell = "";
        tableCol.addEventListener("click", function(){
            coord = this.dataset.col;
           
            for(let i = 6; i>=1; i--){
                cell = $("td[data-col=\""+coord+"\"][data-row=\""+i+"\"]");

                if(cell.classList.contains("bg-primary") || cell.classList.contains("bg-danger")){
                }
                else
                {
                    cell.classList.add(colorNow);
                    colorNow = (colorNow == "bg-danger")? "bg-primary" : "bg-danger";

                    break;
                }
            }
        });
    });


function pendu(){
    // Le pendu
    var canvas = document.getElementById('pendu');
    var ctx = canvas.getContext('2d');

    // On dessine la base
    ctx.fillRect(350,480,100,20);

    // On dessine le mat
    ctx.fillRect(400,200, 20, 300);


    // On dessine la poutre
    ctx.fillRect(200, 180, 220, 20)

    // On dessine la corde
    ctx.fillRect(200,180, 2,145)

    // On dessine la tete
    ctx.beginPath()
    ctx.arc(201, 340, 15, 0, Math.PI * 2, true);
    ctx.stroke();

    // On dessine le corps
    ctx.fillRect(198,355,5,60);

    // On dessine le bras gauche
    ctx.fillRect(165,360,35,5)

    // On dessine le bras droit
    ctx.fillRect(198,360,35,5)

    //On dessine la jambe gauche
    ctx.beginPath();
    ctx.moveTo(198, 415);
    ctx.lineTo(168, 450);
    ctx.lineWidth = 5;
    ctx.stroke();

    //On dessine la jambe gauche
    ctx.beginPath();
    ctx.moveTo(203, 415);
    ctx.lineTo(228, 450);
    ctx.lineWidth = 5;
    ctx.stroke();
}
pendu();


    /// COnnexion ajax vers le json emails.json
    /// Utiliser la fonction : 
    /// let xhr = connectXhr();



    
    
    let tabEmail = "";
    let xhrEmail = connectXhr(); 
    //.open => se connecter à la ressource
    //.send => envoyer la demande à la ressource
    //.responseText => le résultat de la requête
    //.onreadystatechange => methode d'alerte du changement d'état de la requête
    //.readystate => si c'est en état "prêt"
    //.DONE => prêt pour la ressource

    xhrEmail.onreadystatechange = function(){
        if (xhrEmail.readyState === XMLHttpRequest.DONE) {
            if (xhrEmail.status === 200) {
                // $("#listeEmails").innerText = xhrEmail.responseText;
                let jsonEmails = JSON.parse(xhrEmail.responseText);
                afficherEmails(jsonEmails);
                $("#listeEmails table tbody").innerHTML = afficherEmails(jsonEmails);

            } else {
                alert('Il y a eu un problème avec la requête.');
            }
        }
    };

    xhrEmail.open('GET', './json/emails.json', true);
    xhrEmail.send();

    $("#selectAll").addEventListener("click", function(){
        let checkThis = ($("#selectAll").checked === true)?true : false
        $$("#listeEmails table tbody input[type = checkbox]").forEach(function(checkbox){
            checkbox.checked = checkThis;
        });
    });


    /////--------- RECHERCHE DYNAMIQUE ---------/////

    $("#searchCity").addEventListener("focus", function(){
        //console.log("focus dans le champ de recherche");
        $("#searchCity").addEventListener("keyup", function(){
            let searchWords = $("#searchCity").value;
            if($("#searchCity").value.length > 2)
            {
                fetch("./json/villes.json")
                .then((response) => response.json())
                .then((json) => {
                        resSearch(json, $("#searchCity").value);
                });
            }else
            {
                $("#divSearchResult").innerHTML ="";
            }
        });
    });

    /////--------- AFFICHER LES UTILISATEURS ---------/////
    fetch("./json/users.json")
        .then( (response) => response.json() )
        .then( (json) => {
            //console.log(json);
            $("#locate table tbody").innerHTML = tabUsers(json);
        });

    $$("#listeUsersTable tr").forEach(function(trUser){
        trUser.addEventListener("click", function(){
            console.log("clique");
        });
    });
    // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
    initMap(50.637380, 3.062568, "map");

    /////--------- AIDE UTILISATEUR COOKIES ---------/////
    console.log(document.cookie);
    // Vérification des cookies déjà présent dans le domaine
    if(document.cookie.split(";").some((item) => item.trim().startsWith('assistance='))){
        if(document.cookie.split(';').some((item)=>item.trim().startsWith('assistance=true')))
        {
            $("#aideUserButton").classList.remove("btn-primary");
            $("#aideUserButton").classList.add("btn-success");
            $("#aideUserButton").innerText = "Gérer l'assistance utilisateur";
        }
        else
        {
            $("#aideUserButton").classList.remove("btn-success");
            $("#aideUserButton").classList.add("btn-primary");
            $("#aideUserButton").innerText = "Activer l'assistance utilisateur";
        }

    }else
    {
        //console.log("le cookie 'assistance' n'existe pas")
        //trigger de la modale
        $("#aideUser").click();
        document.cookie = "assistance=false; max-age=60*60";
    }
    $("#saveAssistUser").addEventListener("click", function(){
        document.cookie = "assistance=true";
        $("#aideUserButton").classList.remove("btn-primary");
        $("#aideUserButton").classList.add("btn-success");
        $("#aideUserButton").innerText = "Gérer l'assistance utilisateur";
    });

    $("#dismissAssistance").addEventListener("click", function(){
        document.cookie = "assistance=false";
        $("#aideUserButton").classList.remove("btn-success");
        $("#aideUserButton").classList.add("btn-primary");
        $("#aideUserButton").innerText = "Activer l'assistance utilisateur";


    });
    $("#destroyAssistUser").addEventListener("click", function() {
        document.cookie = "assistance=true; expires=Thu, 01 Jan 1970 00:00:00 GMT";
        $("#aideUserButton").classList.remove("btn-success");
        $("#aideUserButton").classList.add("btn-primary");
        $("#aideUserButton").innerText = "Activer l'assistance utilisateur";
        console.log(document.cookie);
    });
});