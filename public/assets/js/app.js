import { searchCategory, searchCar, searchCardCar } from "./search";

// Fonction d'ajout d'ombre sur un élément sélectionner
const addShadow = (className) => {
  $(className).hover(
    function() {
      $(this).addClass("shadow");
    },
    function() {
      $(this).removeClass("shadow");
    }
  );
};

// Traitement de la prévisualisation de l'image avec jquery et FileReader api
const imagePreview = (input) => {
  //Check if there is a file that has been selected
   if (input.files && input.files[0]) {
     const reader = new FileReader();
     
     reader.onload = function(e) {
       $('#image-preview').attr('src', e.target.result).css('display', 'inline-block');
     }
     
     reader.readAsDataURL(input.files[0]);
   }
 }
 
$("#image").change(() => setTimeout(imagePreview(this), 1800));

// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  const fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

$(document).ready(function() {
  const baseUrl = "http://localhost/mon-garage/";
  let rowContent = 
    `<tr> 
      <td class="lead text-center pt-3 pb-4" colspan="6"> Aucune correspondance trouvé ! </td>
    </tr>`;

  addShadow(".card");
  //addShadow(".table");

  $("#search-category").keyup(() => searchCategory(baseUrl, "#list-category", rowContent));
  $("#search-voiture").keyup(() => searchCar(baseUrl, "#list-car", rowContent));
  $("#search-card").keyup(() => searchCardCar(baseUrl, "#card-car"));
});