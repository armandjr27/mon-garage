/**
 * Voici les fonctions de recherche qu'on pourra effectuer sur l'application
 */

function searchCategory(baseUrl, target, rowContent) {
  const listCategory = $(target);

  $.ajax({
    type: "POST",
    url: `${baseUrl}categorie/search`,
    data: { "search-category": $(this).val() },
    success: function(response) {
      const categories = response;
      listCategory.html("");

      if (categories.length <= 0) {
        listCategory.append(rowContent);
      } else {
        for (const category of categories) {
          const { id_categorie, nom, description } = category;

          rowContent = `<tr> 
              <td class="text-center align-content-center">${id_categorie}</td>
              <td class="align-content-center">${nom}</td>
              <td class="align-content-center">${description}</td>
              <td class="text-center align-content-center">
                <a href="${baseUrl}categorie/modifier/${id_categorie}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Modifier</a>
                <a href="${baseUrl}categorie/supprimer/${id_categorie}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Supprimer</a>
              </td>
            </tr>`;

          listCategory.append(rowContent);
        }
      }
    },
    error: function(response) {
      console.log(response);
    }
  });
}

function searchCar(baseUrl, target, rowContent) {
  const listCar = $(target);

  $.ajax({
    type: "POST",
    url: `${baseUrl}voiture/search`,
    data: { "search-voiture": $(this).val() },
    success: function(response) {
      const cars = response;
      listCar.html("");

      if (cars.length <= 0) {
        listCar.append(rowContent);
      } else {
        for (const car of cars) {
          const { id_voiture, image, marque, numero, couleur, nom } = car;

          rowContent = `<tr>
                <td class="text-center align-content-center">${id_voiture}</td>
                <td class="text-center"><img src="${baseUrl}public/uploads/${image}" alt="${marque}-${numero}" title="${marque}-${numero}" width="111" /></td>
                <td class="align-content-center">${marque}</td>
                <td class="align-content-center">${numero}</td>
                <td class="align-content-center">${couleur}</td>
                <td class="align-content-center">${nom}</td>
                <td class="text-center align-content-center">
                  <a href="${baseUrl}voiture/modifier/${id_voiture}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Modifier</a>
                  <a href="${baseUrl}voiture/supprimer/${id_voiture}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Supprimer</a>
                </td>
              </tr>`;

          listCar.append(rowContent);
        }
      }
    },
    error: function(response) {
      console.log(response.responseText);
    }
  });
}

function searchCardCar(baseUrl, target) {
  const cardCar = $(target);
  let content = "";
  const data = {'search-voiture': $(this).val()}

  if (data['search-voiture']) {
    $.ajax({
      type: "POST",
      url: `${baseUrl}voiture/search`,
      data: data,
      success: function(response) {
        const cars = response;
        cardCar.html("");
  
        if (cars.length <= 0) {
          content = `<div class="col-12 mb-4" >
                <p class="lead text-center card-text my-5">Aucune correspondance trouvé ! </p>
              </div>`;
  
          cardCar.append(content);
        } else {
          for (const car of cars) {
            const { id_voiture, image, marque, numero, couleur, nom } = car;
  
            content = `<div class="col-md-6 col-lg-4 mb-4">
                  <div class="card" style="height:460px;">
                    <img src="${baseUrl}public/uploads/${image}" alt="${marque}-${numero}" title="${marque}-${numero}" class="card-img-top" loading="lazy"/>
                      <div class="card-body">
                        <h4 class="card-title font-weight-bolder mb-3">${marque}</h4>
                        <p class="card-text mb-1"><strong>Couleur : </strong>${couleur}</p>
                        <p class="card-text mb-1"><strong>Catégorie : </strong>${nom}</p>
                        <a href="${baseUrl}voiture/detail/${id_voiture}" class="btn btn-primary btn-block mt-4">Plus d'info</a>
                      </div>
                  </div>
                </div>`;
  
            cardCar.append(content);
          }
        }
      },
      error: function(response) {
        console.log(response.responseText);
      }
    });
  }
}

export { searchCategory, searchCar, searchCardCar };
