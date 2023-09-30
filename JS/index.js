/*
    Array contenente il nome, una breve descrizione, un'immagine e la data di uscita dei film
    dello slideshow
*/


let movies = [
  {
    name: 'Avatar: la via dell\'acqua',
    des: 'La storia è ambientata diversi anni dopo gli eventi visti nel primo Avatar. Ritroveremo i due protagonisti Jake Sully e Neytiri ancora insieme e con figli al seguito, pronti ad eplorare lo sconfinato mondo di Pandora e ad affrontare nuovi conflitti con l\'umanità.',
    image: 'Slider-images/banner_avatar.jpg',
    date: 'Dal 14 Dicembre al cinema'
  },
  {
      name: 'Thor: Love and Thunder',
      des: 'Dopo gli eventi di Avengers: Endgame (2019), Thor cerca di trovare la pace interiore, ma viene interrotto quando Gorr il macellatore di dei minaccia di eliminare tutti gli dei.',
      image: 'Slider-images/banner_thor.jpg',
      date: 'Dal 6 Giugno al cinema'
  },
  {
      name: 'Top Gun: Maverick',
      des: 'Dopo oltre trent\'anni di servizio come uno dei migliori aviatori della Marina, Pete Mitchell è nel posto a cui appartiene, spingendo i limiti come un impavido pilota collaudatore e schivando la salita di rango che lo farebbe atterrare.',  
      image: 'Slider-images/banner_topgun.jpg',
      date: 'Dal 25 Maggio al cinema'
  },
  {
      name: 'Minions 2',
      des: 'La storia mai raccontata del sogno di un dodicenne di diventare il più grande supercriminale del mondo.',
      image: 'Slider-images/banner_minions2.jpg',
      date: 'Dal 18 Agosto al cinema'
  },
  {
      name: 'Lightyear - La vera storia di Buzz',
      des: 'La storia di Buzz Lightyear e delle sue avventure all\'infinito e oltre.',
      image: 'Slider-images/banner_lightyear.jpg',
      date: 'Dal 15 Giugno al cinema'
  }

]




const carousel = document.querySelector('.carousel');           //Nodo inizialmente presente in HTML e padre di tutti i successivi
let sliders = [];                                               //Array con tutte le slide dei film, inizialmente vuoto e dinamicamente riempito
let leftArrow = document.getElementById('cover-arrow-left');    //Pulsante per scorrere le slides verso destra
let rightArrow = document.getElementById('cover-arrow-right');  //Pulsante per scorrere le slides verso sinistra




/*
    Funzione che permette di evidenziare l'indicatore della slide corrente
*/
function selectIndicator(index){
      
      var indicators = document.getElementsByClassName('indicator');
      for (var i = 0; i < indicators.length; i++) {
          if(i != index){
      indicators[i].style.opacity = "0.5";
      
      }
      else{
          indicators[i].style.opacity = "1";
      }
  }
}

/*
    Corrisponde alla singola slide all'interno dello slideshow generata dall'evento
    "click" sul pulsante a destra
*/

const nextSlide = () => {
      if(slideIndex < movies.length){
      
          // creating DOM element
        let slide = document.createElement('div');
        let imgElement = document.createElement('img');
        let content = document.createElement('div');
        let h1 = document.createElement('h1');
        let p = document.createElement('p');
        let pdate = document.createElement('p');
        let a = document.createElement('a');

        if(slideIndex==0){
            a.setAttribute('href','film.php?codice_film=9');
        }
        if(slideIndex==1){
            a.setAttribute('href','film.php?codice_film=21');
        }
        if(slideIndex==2){
            a.setAttribute('href','film.php?codice_film=27');
        }
        if(slideIndex==3){
            a.setAttribute('href','film.php?codice_film=25');
        }
        if(slideIndex==4){
            a.setAttribute('href','film.php?codice_film=26');
        }
        
        
        
        a.setAttribute('style','text-decoration: none');

        /*
            Inserimento dei singoli elementi precedentemente creati tramite la funzione appendChild
        */
        imgElement.appendChild(document.createTextNode(''));
        a.appendChild(document.createTextNode(movies[slideIndex].name));
        p.appendChild(document.createTextNode(movies[slideIndex].des));
        pdate.appendChild(document.createTextNode(movies[slideIndex].date));
        h1.appendChild(a);
        content.appendChild(h1);
        content.appendChild(p);
        content.appendChild(pdate);
        slide.appendChild(content);
        slide.appendChild(imgElement);
        
        carousel.appendChild(slide);
          

        imgElement.src = movies[slideIndex].image;
        slideIndex++;
          

        /*
            Inserimento delle classi dei singoli elementi precedentemente creati a cui applicare lo stile 
        */
        slide.className = 'slider';
        content.className = 'slide-content';
        h1.className = 'movie-title';
        p.className = 'movie-des';
        pdate.className = 'movie-date';

        /*
            Aggiunta della slide dall'array di slide 
        */
        sliders.push(slide);

        /*
            Se l'array slider contiene almeno una slide allora tramite la funzione calc applico un margin-left
            partendo dalla prima slide in modo scorrere di una posizione per visualizzare correttamente
            la slide corrente
        */
        if(sliders.length){
            sliders[0].style.marginLeft = `calc(-${100 * (sliders.length - 1)}% - ${30 * (sliders.length - 1)}px)`;
        }
    }
}


/*
    Corrisponde alla singola slide all'interno dello slideshow generata dall'evento
    "click" sul pulsante a sinistra
*/

const previousSlide = () => {

    if(slideIndex > 0){

        
        slideIndex--;

        /*
            Rimozione della slide dall'array di slide 
        */
        sliders.pop();

        /*
            Se l'array slider contiene almeno una slide allora tramite la funzione calc applico un margin-left
            partendo dalla prima slide in modo scorrere di una posizione per visualizzare correttamente
            la slide corrente
        */
        if(sliders.length){
            sliders[0].style.marginLeft = `calc(-${100 * (sliders.length -1)}% - ${30 * (sliders.length - 1)}px)`;
        }


    }

}

/*
  Inizializzazione dello slideIndex per individuare la slide corrente(inizialmente la prima)
*/

let slideIndex = 0;
selectIndicator(slideIndex);

if(slideIndex == 0){
  leftArrow.style.visibility = 'hidden';
}
nextSlide();


/*
    Funzione richiamata nell'evento onClick del tag HTML relativo al pulsante per lo scorrimento
    dello slideshow a destra
*/
function toNextSlide(){

    if(slideIndex == movies.length-1){
    rightArrow.style.visibility = 'hidden';

    }else{
        rightArrow.style.visibility = 'visible';
        leftArrow.style.visibility = 'visible';
    }

    if(slideIndex < movies.length){
        selectIndicator(slideIndex);
        nextSlide();
    }
}

/*
    Funzione richiamata nell'evento onClick del tag HTML relativo al pulsante per lo scorrimento
    dello slideshow a sinistra
*/
function toPreviousSlide(){

    if(slideIndex-2 == 0){
        leftArrow.style.visibility = 'hidden';
    }
    else{
        leftArrow.style.visibility = 'visible';
        rightArrow.style.visibility = 'visible';
    }


    if(slideIndex-1 > 0){
        selectIndicator(slideIndex - 2);
        previousSlide();
    }
}


