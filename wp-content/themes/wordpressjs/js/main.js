var portfolioPostsBtn = document.getElementById("portfolio-posts-btn"); //Jag använder document.getElementById för att jag vill hämta mitt ID som jag specificerade i min div för knappen
var portfolioPostsContainer = document.getElementById("portfolio-posts-container");

if(portfolioPostsBtn) { //Denna knappen ska bara vara tillgänglig om knappen finns på den angivna sidan
    portfolioPostsBtn.addEventListener("click", function() { //Använder mig utav addEventListener för att placera ett event på den angivna elementet som hämtar information när jag klickar
        var ourRequest = new XMLHttpRequest(); //Med detta verktyget skapar jag en anslutning med en angiven URL som sedan låter mig skicka och hämta data
        ourRequest.open("GET", magicalData.siteURL + "/wp-json/wp/v2/posts?categories=5"); //Jag skickar en GET förfrågan till hemsidan, jag vill ha data från wordpress sidan's REST api. Jag anger också ID:t för kategorin som jag vill ska visas, så inte alla kategorier visas
        ourRequest.onload = function() { 
            if(ourRequest.status >= 200 && ourRequest.status < 400) {  
                var data = JSON.parse(ourRequest.responseText); //om ajax lyckas ansluta så sparar jag "responseText" i variabeln data
                createHTML(data);
                portfolioPostsBtn.remove(); //När man trycker på knappen för att få se mer innehåll så försvinner knappen
            } else {
                console.log("We connected to the server, but it returned an error.");
            }
        };

        ourRequest.onerror = function() {
            console.log("Connection error");
        };

        ourRequest.send();
    });
}

//Jag skapar en loop för att skapa en HTML-sträng som sedan skickas in i min tomma div som jag har skapat i page-portfolio.php som heter portfolioPostsContainer
//För varje objekt i min array länkar jag samman lite HTML-kod till min sträng
function createHTML(postsData) {
    var ourHTMLString = ''; //jag skapar en variabel där jag lagrar min html-sträng som sedan ska skickas in till min tomma div för att visa text innehållet.

    for (i = 0; i < postsData.length; i++) {
        ourHTMLString += '<h2>' + postsData[i].title.rendered + '</h2>'; //title.rendered finns som data i min api, skriver ut detta för att visa rubriken
        ourHTMLString += postsData[i].content.rendered; //samma som ovan, här vill jag visa rubrikens innehåll

    portfolioPostsContainer.innerHTML = ourHTMLString;
    }
}

// Quick Add Post AJAX
//Med hjälp av AJAX och REST API kan jag med denna kod göra ett snabbt inlägg på hemsidan utan att gå in i admin-panelen
//på min blogg-sida har jag en create post knapp, där jag väljer den knappen med denna variabel
var quickAddButton = document.querySelector("#quick-add-button");

if(quickAddButton) { //endast om denna knapp finns tillgänglig på sidan vill jag göra det möjligt att kunna trycka på knappen och få resultat
    quickAddButton.addEventListener("click", function() {

//här skapar jag objekt som finns med i min quick-post där jag ska skriva information när jag vill lägga upp ett nytt inlägg på hemsidan.
//vad jag skriver i dessa fält ska skicka datan till min wordpress som sedan läggs upp som ett nytt inlägg.
//här skriver jag också in namnet jag har i min html kod för title och content
        var ourPostData = {
            "title": document.querySelector('.admin-quick-add [name="title"]').value,
            "content": document.querySelector('.admin-quick-add [name="content"]').value,
            "status": "publish"
        }
//jag vill skicka data, så därför jag använder mig utav POST method. 
//med denna variabel gör jag en ny instance av webbläsaren's XMLHttpRequest
        var createPost = new XMLHttpRequest();
        createPost.open("POST", magicalData.siteURL + "/wp-json/wp/v2/posts");
        createPost.setRequestHeader("X-WP-Nonce", magicalData.nonce);
        createPost.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        createPost.send(JSON.stringify(ourPostData)); //jag lägger i variabel här i en send så att datan som skrivs i min add quick post i bloggen på hemsidan skickas till servern.
        createPost.onreadystatechange = function() {
            if(createPost.readyState == 4) {
                if(createPost.status == 201) {
                    document.querySelector('.admin-quick-add [name="title"]').value = '';
                    document.querySelector('.admin-quick-add [name="content"]').value = '';                    
                } else {
                    alert("Error - try again.");
                }
            }
        }

    });
}