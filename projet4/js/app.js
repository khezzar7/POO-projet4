  (function(){
    //Ciblagre du DOM
    let minLength = 2;
    const category = document.querySelector('#category');
    const suggestions= document.querySelector('#suggestions');
    const proverbs= document.querySelector('#proverbs');


    category.addEventListener('keyup',(e)=>{
      if(category.value.length >= minLength){
        getSuggestions();

      }else {
        //nettoyage du dom
        suggestions.innerHTML='';
        proverbs.innerHTML='';
      }

    })//fin du addEventListener
    function getSuggestions(str){
      //créer l'url
      let url="suggest.php?search=" + category.value;
      fetch(url)
      .then(res => res.json())
      .then(categories=>{
        //console.log(res);
        let html="";
        categories.forEach(category=>{

          html+='<li>' + category.name + '</li>';
        })
        suggestions.innerHTML = html;
        addEvents();
      })

    }//fin function getSuggestions

    function addEvents(){
      let li=suggestions.querySelectorAll('li');

      li.forEach(item=>{
        item.addEventListener('click',e=>{
          //1)Affichage dans le champ de saisie
          //du text de la suggestion cliquée
          category.value = e.target.innerText;

          //2) Faire disparaitre la liste des Suggestions
           suggestions.innerHTML='';

           //3) Demander au server de nous envoyer les proverbes
           //liés à la categorie choisie
           getProverbs();
         })
      })
    }//fin addEvents();

    function getProverbs(){
      let url= 'proverbs.php?category=' + category.value;
      fetch(url).then(res=>res.json())
      .then(results=>{
        console.log(proverbs);
        //console.log(proverbs);
        //pour afficher dans le DOM
        let html="";
        results.forEach(result =>{
          html += '<article>'+ result.body + '</article>';
        })
        proverbs.innerHTML = html;
      })
    }

  })()//fin fonction
