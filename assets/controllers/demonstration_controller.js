import { Controller } from '@hotwired/stimulus'

export default class extends Controller {

  static targets = ['zone', 'texte'] //déclaration des targets qui existent dans le template TWIG

  static values = {
    url: String, //déclaration des valeurs qui existent dans le template TWIG, passées au niveau du controller
  }

  connect() { //équivalent du constructeur, il est appelé à l'instanciation du controller
    console.log('Demonstration controller connected')
  }

  async clicBouton(event) { //le async sur la fonction est obligatoire pour pouvoir utiliser le await
    console.log('clic sur le bouton')
    console.log(event) //récupération de l'événement déclenché par le clic sur le bouton

    //récupération de la zone ciblée par la target zone (on doit ajouter le suffixe Target à la target déclarée)
    if (this.zoneTarget.style.display === 'none') {
      this.zoneTarget.style.display = 'block'

      //afficher le contenu de l'URL dans la zone ciblée
      this.zoneTarget.innerHTML = 'Chargement en cours...'
      const response = await fetch(this.urlValue)//récupération de la valeur de la valeur url (on doit ajouter le suffixe Value à la valeur déclarée).
      // Fetch va se connecter à l'URL et récupérer son contenu
      // await permet d'attendre la réponse de fetch avant de passer à la suite du code
      this.zoneTarget.innerHTML = await response.text() //affichage du contenu de la response dans la zone ciblée
      // await permet d'attendre la réponse de response.text() avant de passer à la suite du code

    } else {
      this.zoneTarget.style.display = 'none'
    }
  }

  async clicBoutonAvecParam(event) {
    console.log('clic sur le bouton avec paramètre')
    console.log(event) //récupération de l'événement déclenché par le clic sur le bouton
    console.log(event.params.id) //récupération du paramètre id passé au niveau du template TWIG

    //afficher le contenu de l'URL dans la zone ciblée
    this.zoneTarget.innerHTML = 'Chargement en cours...'

    // Equivalent
    //const params = new URLSearchParams({id: event.params.id})
    //const response = await fetch(`${this.urlValue}?${params.toString()}`)

    const response = await fetch(this.urlValue + '?id=' + event.params.id)
    this.zoneTarget.innerHTML = await response.text()
  }

  async clicBoutonAvecInput(event) {
    console.log(document.getElementById('inputTexte').value)
    console.log(this.texteTarget.value)
    console.log(event.params)
    const valeur = this.texteTarget.value //ou document.getElementById('inputTexte').value

    const response = await fetch(event.params.urlbouton + '?id=' + valeur) //urlBouton provient du paramètre sur l'action du bouton et non pas de la déclaration de la valeur url dans le controleur
    this.zoneTarget.innerHTML = await response.text()
  }
}
