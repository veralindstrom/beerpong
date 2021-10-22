var forsta = document.getElementById("knapp");
var start = document.getElementById("startsida");
var inbjudan = document.getElementById("fusk");
var knapp = document.getElementById('knappen');
var audio = document.getElementById('audio');
var PratV = document.getElementById('v');
var PratA = document.getElementById('a');
var Abbe = document.getElementById('person1');
var Vera = document.getElementById('person2');
document.getElementById("click").addEventListener("click", ChangeName);
var AllSlide = document.getElementById('minnen');
var Gora = document.getElementById('gora');
var sakerAttGora = ['Supa', 'Tatura sig', 'Dricka Öl', 'Dansa', 'Kolla på när personer spyr', 'Spy', 'Svepa Öl', 'Lyssna på musik', 'Dricka Vodka', 'Må bäst', 'Må sämst', 'Sova', 'Kasta sten på Eddies hus', 'Klättra i träd', 'Använda Beer bongen', 'Knarka', 'Spela beer pong', 'Äta kaka', 'Dricka vin', 'Leka med eld', 'Supa ner någon', 'Dricka alkohol', 'Käka äggröra', 'Bli hämtad av ambulans', 'Bråka med grannar', 'Spy på Eddies tomt', 'Bråka med polis'];
Start();

var myIndex = 0;
    var Index =0;
function GoraGrejer() {

   
        if (Index >= sakerAttGora.length){
            Index = 0;}
        Gora.innerHTML = sakerAttGora[Index];
    Index = Index +1;
        
    
    setTimeout(GoraGrejer, 2000); // Change text fan every 2 second
}



function slideshow() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {
        myIndex = 1;
    }
    x[myIndex - 1].style.display = "block";
    setTimeout(slideshow, 1000); // Change image every one second fan
}


//vill du ändra adress, de e här du gör de kompis

function ChangeName() {
    document.getElementById("click").innerHTML = "Eddavägen 41";
}

function Start() {
    start.style.display = 'none';
    inbjudan.style.display = 'none';
    GoraGrejer();

}

knapp.onclick = function () {
    forsta.style.display = 'none';
    start.style.display = 'block';
    audio.play();

    setInterval(function () {
        start.style.display = 'none';
        //inbjudan.style.display = 'block';
        window.location.href = "displayTeam.php";

    }, 52000);
    setTimeout(function () {
        PratV.style.display = 'block';
        setTimeout(function () {
            PratV.style.display = 'none';
            PratA.style.display = 'block';
            setTimeout(function () {
                PratA.style.display = 'none';
                PratV.style.display = 'block';
                PratV.innerHTML = 'Har inte vi fyllt år för längesen?';
                setTimeout(function () {
                    PratV.style.display = 'none';
                    PratA.style.display = "block";
                    PratA.innerHTML = 'Jo juste fan';
                    setTimeout(function () {
                        PratA.style.display = 'none';
                        PratV.style.display = "block";
                        PratV.innerHTML = "Hur har vi firat tidigare?";
                        setTimeout(function () {
                            PratV.style.display = 'none';
                            //bildspel
                            slideshow();
                            /*Abbe.style.display = 'none';
                            Vera.style.display = 'none';*/

                            setTimeout(function () {
                                /*  Vera.style.display = 'block';
                                  Abbe.style.display = 'block'; */
                                AllSlide.style.display = 'none';
                                PratV.style.display = 'none';
                                PratA.style.display = "block";
                                PratA.innerHTML = "Ah juste!";
                                setTimeout(function () {
                                    PratA.style.display = 'none';
                                    PratV.style.display = "block";
                                    PratV.innerHTML = 'Ska vi ha någon iår?';
                                    setTimeout(function () {
                                        PratV.style.display = 'none';
                                        PratA.style.display = "block";
                                        PratA.innerHTML = 'Nej det är försent nu';
                                        setTimeout(function () {
                                            PratA.style.display = 'none';
                                            PratV.style.display = "block";
                                            PratV.innerHTML = 'Aha vad synd';
                                            setTimeout(function () {
                                                PratV.style.display = 'none';
                                                PratA.style.display = "block";
                                                PratA.innerHTML = 'Ah lite';
                                                setTimeout(function () {

                                                    PratA.style.display = 'none';
                                                    PratV.style.display = "block";
                                                    PratV.innerHTML = 'Äsch vi styr en beerpong tunering istället';
                                                    setTimeout(function () {

                                                        PratA.style.display = 'none';
                                                        PratV.style.display = "none";


                                                    }, 1500);

                                                }, 2000);
                                            }, 2000);
                                        }, 2000);
                                    }, 2000);
                                }, 2000);
                            }, 10000);
                        }, 4000);
                    }, 2000);
                }, 2000);
            }, 2000);
        }, 2000);
    }, 15500); //34500  tar andra scenen innan den går
}


// Tid

// Set the date we're counting down to
var countDownDate = new Date("Jun 16, 2019 22:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function () {

    // Get todays date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("countdown").innerHTML = days + "d " + hours + "h " +
        minutes + "m " + seconds + "s ";

    // If the count down is finished, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("countdown").innerHTML = "Festen har börjat eller är över kompis";
    }
}, 1000);
