import { searchCategory, searchCar, searchCardCar } from "./search";

// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  const image = $(this)
    .val()
    .split("\\")
    .pop();
  $(this)
    .siblings(".custom-file-label")
    .addClass("selected")
    .html(image);
});

const addShadow = className => {
  $(className).hover(
    function() {
      $(this).addClass("shadow");
    },
    function() {
      $(this).removeClass("shadow");
    }
  );
};

$(document).ready(function() {
  const baseUrl = "http://localhost/mon-garage/";
  let rowContent = 
    `<tr> 
      <td class="lead text-center pt-3 pb-4" colspan="6"> Aucune correspondance trouvé ! </td>
    </tr>`;

  addShadow(".card");
  addShadow(".table");

  $("#search-category").keyup(() => searchCategory(baseUrl, "#list-category", rowContent));
  $("#search-voiture").keyup(() => searchCar(baseUrl, "#list-car", rowContent));
  $("#search-card").keyup(() => searchCardCar(baseUrl, "#card-car"));
});
